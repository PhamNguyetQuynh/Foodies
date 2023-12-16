<?php
session_start();

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

include('../config/dbconn.php');
include('./myFunctions.php');
require_once('../PHPMailer-master/src/Exception.php');
require_once('../PHPMailer-master/src/PHPMailer.php');
require_once('../PHPMailer-master/src/SMTP.php');

if (isset($_POST['registerBtn'])) {
    //to prevent sql injection -> mysqli_real...
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $verification_code = sprintf('%06d', mt_rand(0, 999999));
    //check unique email
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email has already existed";
        header('location: ../register.php');
    } else {
        if ($password == $cpassword) {
            // $subject='Registration Successful';
            // $content='Dear ' . $name . ',<br><br>Thank you for registering on our website.';
            // sendRegistrationEmail($name, $email,$subject,$content);

            //         echo 'Email sent successfully.';
            //         $insert_query = "INSERT INTO users(name, email, phone, password) VALUES('$name','$email','$phone','$password')";
            //         $insert_query_run = mysqli_query($conn, $insert_query);

            $insert_query = "INSERT INTO users(name, email, phone, password, verification_code) VALUES('$name','$email','$phone','$password','$verification_code')";
            $insert_query_run = mysqli_query($conn, $insert_query);
            //insert

            if ($insert_query_run) {
                // $_SESSION['message'] = 'Registerd successfully';

                // header('location: ../login.php');
                // exit();

                sendRegistrationEmail("$name", "$email", "$verification_code");
            } else {
                $_SESSION['message'] = 'Something went wrong';
                header('location: ../register.php');
            }
        } else {
            //use session so add session_start(); at the start of the page
            $_SESSION['message'] = "Password do not match";
            header('location: ../register.php');
        }
    }
} else if (isset($_POST['loginBtn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $login_query = "SELECT* FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        //$_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);


        if ($userdata['verify_status'] == 1) {
            $_SESSION['auth'] = true;

            $userid = $userdata['id'];
            $username = $userdata['name'];
            $useremail = $userdata['email'];
            $userphone = $userdata['phone'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail,
                'phone' => $userphone
            ];
            $_SESSION['role_as'] = $role_as;

            // 1==admin
            if ($role_as == 1) {
                redirect("../admin/index.php", "Welcome to dashboard");
            } else {
                redirect("../index.php", "Logged in");
            }
        } else {
            // verify email
            redirect("../login.php", "You need to verify your email first");
        }
    } else {
        redirect("../login.php", "Invalid");
    }
} else if (isset($_POST["ResetBtn"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = sprintf('%06d', mt_rand(0, 999999));

    // Check if the user is not an admin (role_as != 1)
    $check_user_role_query = "SELECT role_as FROM users WHERE email='$email'";
    $check_user_role_query_run = mysqli_query($conn, $check_user_role_query);

    if ($check_user_role_query_run) {
        $user_role = mysqli_fetch_assoc($check_user_role_query_run)['role_as'];

        if ($user_role != 1) {  // Check if the user is not an admin
            $check_email_query = "SELECT email FROM users WHERE email='$email'";
            $check_email_query_run = mysqli_query($conn, $check_email_query);
            if (mysqli_num_rows($check_email_query_run) > 0) {
                $row = mysqli_fetch_array($check_email_query_run);
                $get_name = $row["name"];
                $get_email = $row["email"];

                $update_token = "UPDATE users SET verification_code= '$token' WHERE email = '$get_email' LIMIT 1";
                $update_token_run = mysqli_query($conn, $update_token);

                if ($update_token_run) {
                    sendPasswordResetEmail($get_name, $get_email, $token);
                    $_SESSION['message'] = 'We have sent you a Reset Password email';
                    header('location: ../passwordReset.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = 'Something went wrong';
                    header('location: ../passwordReset.php');
                    exit(0);
                }
            } else {
                $_SESSION['message'] = 'No Email Found';
                header('location: ../passwordReset.php');
                exit(0);
            }
        } else {
            $_SESSION['message'] = 'Admins are not allowed to reset passwords';
            header('location: ../passwordReset.php');
            exit(0);
        }
    }
}
if (isset($_POST["updatePasswordBtn"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    $token = mysqli_real_escape_string($conn, $_POST['passwordToken']);

    if (!empty($token)) {
        if (!empty($email) && !empty($newPassword) && !empty($confirmPassword)) {
            //check token is valid
            $check_token = "SELECT verification_code FROM users WHERE verification_code='$token' LIMIT 1";
            $check_token_run = mysqli_query($conn, $check_token);

            if (mysqli_num_rows($check_token_run) > 0) {
                if ($newPassword == $confirmPassword) {
                    $update_password = "UPDATE users SET password= '$newPassword' WHERE verification_code='$token' LIMIT 1";
                    $update_password_run = mysqli_query($conn, $update_password);

                    if ($update_password_run) {
                        // update verification_code
                        $new_verification_code = sprintf('%06d', mt_rand(0, 999999));
                        $update_new_verification_code = "UPDATE users SET verification_code= '$new_verification_code', verify_status = '1' WHERE verification_code='$token' LIMIT 1";
                        $update_new_verification_code_run = mysqli_query($conn, $update_new_verification_code);

                        $_SESSION['message'] = "New Password Update Successfully!!";
                        header('location: ../login.php');
                        exit(0);
                    } else {
                        $_SESSION['message'] = "Have you updated your password yet? Something went wrong";
                        header("location: ../passwordUpdate.php?token=$token&email=$email");
                        exit(0);
                    }
                } else {
                    $_SESSION['message'] = "Password do not match";
                    header("location: ../passwordUpdate.php?token=$token&email=$email");
                    exit(0);
                }
            } else {
                $_SESSION['message'] = 'Invalid Token';
                header("location: ../passwordUpdate.php?token=$token&email=$email");
                exit(0);
            }
        } else {
            $_SESSION['message'] = 'Please fill out all fields';
            header("location: ../passwordUpdate.php?token=$token&email=$email");
            exit(0);
        }
    } else {
        $_SESSION['message'] = 'No Token Available';
        header('location: ../passwordUpdate.php');
        exit(0);
    }
}
