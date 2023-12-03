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
    //check unique email
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email has already existed";
        header('location: ../register.php');
    } else {
        if ($password == $cpassword) {
            $subject='Registration Successful';
            $content='Dear ' . $name . ',<br><br>Thank you for registering on our website.';
            sendRegistrationEmail($name, $email,$subject,$content);
                
                    echo 'Email sent successfully.';
                    $insert_query = "INSERT INTO users(name, email, phone, password) VALUES('$name','$email','$phone','$password')";
                    $insert_query_run = mysqli_query($conn, $insert_query);
                
            //insert
          
            if ($insert_query_run) {
                $_SESSION['message'] = 'Registerd successfully';

                header('location: ../login.php');
                exit();
                
            } else {
                $_SESSION['message'] = 'Something went wrong';
                header('location: register.php');
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
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);

        
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $userphone = $userdata['phone'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail,
            'phone'=>$userphone
        ];
        $_SESSION['role_as'] = $role_as;
        //1==admin
        if ($role_as == 1) {
            redirect("../admin/index.php", "Welcome to dashboard");
        } else {
            redirect("../index.php", "Logged in");
        }
    } else {
        redirect("../login.php", "Invalid");
    }
}
