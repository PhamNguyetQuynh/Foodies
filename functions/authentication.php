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

    // use Prepared Statements to prevent sql injection
    $check_email_query = "SELECT email FROM users WHERE email=?";
    $check_email_stmt = $conn->prepare($check_email_query);
    $check_email_stmt->bind_param('s', $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        $_SESSION['message'] = "Email has already existed";
        header('location: ../register.php');
    }
    else {
        if ($password == $cpassword) {
            // Hash the password before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // $insert_query = "INSERT INTO users(name, email, phone, password, verification_code) VALUES('$name','$email','$phone','$hashedPassword','$verification_code')";
            // $insert_query_run = mysqli_query($conn, $insert_query);    
            
            $insert_query = "INSERT INTO users(name, email, phone, password, verification_code) VALUES(?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bind_param('sssss', $name, $email, $phone,  $hashedPassword, $verification_code);
            $insert_query_run = $insert_stmt->execute();
          
            // use Prepared Statements
            if ($insert_query_run) {
                sendRegistrationEmail("$name", "$email","$verification_code");      
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


    //$login_query = "SELECT * FROM users WHERE email='$email'";
    //$login_query_run = mysqli_query($conn, $login_query);

    //to prevent sql injection
    $login_query = "SELECT * FROM users WHERE email=?";
    $login_stmt = $conn->prepare($login_query);
    $login_stmt->bind_param('s', $email);
    $login_stmt->execute();
    $login_result = $login_stmt->get_result();

    if ($login_result->num_rows > 0) {
        //$userdata = mysqli_fetch_array($login_query_run);
        $userdata = $login_result->fetch_assoc();
        $hashedPassword = $userdata['password'];
        $verifyStatus = $userdata['verify_status'];

        if (password_verify($password, $hashedPassword)) {
            if ($verifyStatus == 1) {
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
                    redirect("../admin/index.php", "Welcome to the dashboard");
                } else {
                    redirect("../index.php", "Logged in");
                }
            } else {
                // verify email
                redirect("../login.php", "You need to verify your email first");
            }
        } else {
            redirect("../login.php", "Something went wrong");
        }
    } else {
        // invalid
        redirect("../login.php", "Invalid");
    }
}
else if (isset($_POST["ResetBtn"])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = sprintf('%06d', mt_rand(0, 999999));

    //$check_email_query = "SELECT email FROM users WHERE email='$email'";
    //$check_email_query_run = mysqli_query($conn, $check_email_query);

    $check_user_role_query = "SELECT role_as FROM users WHERE email=?";
    $check_user_role_stmt = $conn->prepare($check_user_role_query);
    $check_user_role_stmt->bind_param('s', $email);
    $check_user_role_stmt->execute();
    $check_user_role_result = $check_user_role_stmt->get_result();

    if ($check_user_role_result) {
        $user_role = $check_user_role_result->fetch_assoc()['role_as'];

        if ($user_role != 1) {
            $check_email_query = "SELECT email FROM users WHERE email=?";
            $check_email_stmt = $conn->prepare($check_email_query);
            $check_email_stmt->bind_param('s', $email);
            $check_email_stmt->execute();
            $check_email_result = $check_email_stmt->get_result();

            if ($check_email_result->num_rows > 0) {
                $row = $check_email_result->fetch_assoc();
                $get_name = $row["name"];
                $get_email = $row["email"];

                $update_token_query = "UPDATE users SET verification_code=? WHERE email=? LIMIT 1";
                $update_token_stmt = $conn->prepare($update_token_query);
                $update_token_stmt->bind_param('ss', $token, $get_email);
                $update_token_run = $update_token_stmt->execute();

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
if (isset($_POST["updatePasswordBtn"]))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    $token = mysqli_real_escape_string($conn, $_POST['passwordToken']);

    if (!empty($token))
    {
        if (!empty($email) && !empty($newPassword) && !empty($confirmPassword))
        {
            //check token is valid
            //$check_token = "SELECT verification_code FROM users WHERE verification_code='$token' LIMIT 1";
            //$check_token_run = mysqli_query($conn, $check_token);
            $check_token_query = "SELECT verification_code FROM users WHERE verification_code=? LIMIT 1";
            $check_token_stmt = $conn->prepare($check_token_query);
            $check_token_stmt->bind_param('s', $token);
            $check_token_stmt->execute();
            $check_token_result = $check_token_stmt->get_result();

            if ($check_token_result->num_rows > 0)
            {
                if ($newPassword == $confirmPassword)
                {
                    // Hash the new password
                    $hashednewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    //$update_password = "UPDATE users SET password= '$hashednewPassword' WHERE verification_code='$token' LIMIT 1";
                    //$update_password_run = mysqli_query($conn, $update_password);
                    $update_password_query = "UPDATE users SET password=? WHERE verification_code=? LIMIT 1";
                    $update_password_stmt = $conn->prepare($update_password_query);
                    $update_password_stmt->bind_param('ss', $newPassword, $token);
                    $update_password_run = $update_password_stmt->execute();

                    if ($update_password_run)
                    {
                        // update verification_code
                        $new_verification_code = sprintf('%06d', mt_rand(0, 999999));
                        $update_new_verification_code_query = "UPDATE users SET verification_code=?, verify_status='1' WHERE verification_code=? LIMIT 1";
                        $update_new_verification_code_stmt = $conn->prepare($update_new_verification_code_query);
                        $update_new_verification_code_stmt->bind_param('ss', $new_verification_code, $token);
                        $update_new_verification_code_run = $update_new_verification_code_stmt->execute();

                        $_SESSION['message'] = "New Password Update Successfully!!";
                        header('location: ../login.php');
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['message'] = "Have you updated your password yet? Something went wrong";
                        header("location: ../passwordUpdate.php?token=$token&email=$email");
                        exit(0);
                    }
                }
                else 
                {
                    $_SESSION['message'] = "Password do not match";
                    header("location: ../passwordUpdate.php?token=$token&email=$email");
                    exit(0);
                }
            }
            else
            {
                $_SESSION['message'] = 'Invalid Token';
                header("location: ../passwordUpdate.php?token=$token&email=$email");
                exit(0);
            }
        }
        else
        {
            $_SESSION['message'] = 'Please fill out all fields';
            header("location: ../passwordUpdate.php?token=$token&email=$email");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = 'No Token Available';
        header('location: ../passwordUpdate.php');
        exit(0);
    }
}