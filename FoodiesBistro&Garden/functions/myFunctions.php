<?php
session_start();
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

function sendRegistrationEmail($name, $email)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Thay bằng địa chỉ SMTP server của bạn
        $mail->SMTPAuth   = true;
        $mail->Username   = 'foodiesbistrongarden@gmail.com';   // Thay bằng tên đăng nhập SMTP của bạn
        $mail->Password   = 'hbrb cmvj taxm qzak';   // Thay bằng mật khẩu SMTP của bạn
        $mail->SMTPSecure = 'tls';                   // Sử dụng TLS
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('foodiesbistrongarden@gmail.com', 'Foodies');  // Thay bằng địa chỉ email của bạn và tên của bạn
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Registration Successful';
        $mail->Body    = 'Dear ' . $name . ',<br><br>Thank you for registering on our website.';

        $mail->send();
        // echo 'Email has been sent';  // Thông báo nếu muốn kiểm tra, có thể comment lại dòng này nếu không cần
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}