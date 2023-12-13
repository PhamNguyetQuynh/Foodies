<?php
// session_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('../config/dbconn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('../PHPMailer-master/src/Exception.php');
require_once('../PHPMailer-master/src/PHPMailer.php');
require_once('../PHPMailer-master/src/SMTP.php');


function getAll($table)
{
    global $conn;
    $query = "SELECT* FROM $table";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getByID($table, $id)
{
    global $conn;
    $query = "SELECT* FROM $table WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location:' . $url);
    exit();
}
function getAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function checkTrackingNoExist($trackingNo)
{
    global $conn;
   
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return mysqli_query($conn, $query);
}

function getOrderHistory()
{
    global $conn;
   
    $query="SELECT * FROM orders WHERE status != '0'";
    return mysqli_query($conn, $query);
}
// verify email registration
function sendRegistrationEmail($name, $email, $verification_code)
{
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'foodiesbistrongarden@gmail.com';   
        $mail->Password   = 'hbrb cmvj taxm qzak';  
        $mail->SMTPSecure = 'tls';                  
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('foodiesbistrongarden@gmail.com', 'Foodies');  
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Email Verification from Foodies";
        $mail_template = "
            <h2> You have Registered with Foodies </h2>
            <h5> Verify your email address to Login with the below given link </h5>
            <br/><br/>
            <a href ='http://localhost/IS207/1/emaillll/Foodies/FoodiesBistro&Garden/verifyEmail.php?token=$verification_code'> Click me </a>
        ";

        $mail->Body = $mail_template;

        $mail->send();
        echo 'Email has been sent'; 
        return true;
     
    } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     return false;
    } 
}

// email for reset Password
function sendPasswordResetEmail($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'foodiesbistrongarden@gmail.com';   
        $mail->Password   = 'hbrb cmvj taxm qzak';  
        $mail->SMTPSecure = 'tls';                  
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('foodiesbistrongarden@gmail.com', 'Foodies');  
        $mail->addAddress($get_email, $get_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Reset Password Notification";
        $mail_template = "
            <h2> Hello </h2>
            <h5> You are receiving this email because we received a password reset request for your account </h5>
            <br/><br/>
            <a href ='http://localhost/IS207//1/emaillll/Foodies/FoodiesBistro&Garden/passwordUpdate.php?token=$token&email=$get_email'> Click me </a>
        ";

        $mail->Body = $mail_template;

        $mail->send();
        echo 'Email has been sent'; 
        return true;
     
    } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     return false;
    }
   
    
}


