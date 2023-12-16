<?php
session_start();
include('../config/dbconn.php');

function generateUniqueId()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $uniqueId = '';

    for ($i = 0; $i < 20; $i++) {
        $randomIndex = mt_rand(0, $charLength - 1);
        $uniqueId .= $characters[$randomIndex];
    }

    return $uniqueId;
}

if (isset($_POST['reserveBtn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $adult = mysqli_real_escape_string($conn, $_POST['adult']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    // Sử dụng Prepared Statements để ngăn chặn SQL injection
    $insert_query = "INSERT INTO reservations (name, phone, adult, date, time, note) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);

    // Kiểm tra lỗi trong quá trình chuẩn bị truy vấn
    if ($stmt === false) {
        die('Error during prepare: ' . htmlspecialchars($conn->error));
    }

    // Bind các giá trị và thực hiện truy vấn
    $stmt->bind_param('ssisss', $name, $phone, $adult, $date, $time, $note);
    $insert_query_run = $stmt->execute();

    // Kiểm tra lỗi trong quá trình thực hiện truy vấn
    if ($insert_query_run) {
        $_SESSION['message'] = 'Reserved successfully. We will contact with you in a minute!';
        header('location: ../reservation.php');
    } else {
        $_SESSION['message'] = 'Something went wrong';
        header('location: ../reservation.php');
    }

    // Đóng statement sau khi sử dụng
    $stmt->close();
}

?>