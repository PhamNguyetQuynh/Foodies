<?php
session_start();
include('../config/dbconn.php');
if (isset($_POST['sendMsgBtn'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    $insert_query = "INSERT INTO messages(first_name, last_name, email, msg) VALUES('$firstName','$lastName','$email','$msg')";
    $insert_query_run = mysqli_query($conn, $insert_query);

    if ($insert_query_run) {
        $_SESSION['message'] = 'Message sent successfully';
        header('location: ../contactUs.php');
    } else {
        $_SESSION['message'] = 'Something went wrong';
        header('location: ../contactUs.php');
    }
}