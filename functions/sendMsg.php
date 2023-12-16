<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['sendMsgBtn'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    // Sử dụng Prepared Statements để ngăn chặn SQL injection
    $insert_query = "INSERT INTO messages (first_name, last_name, email, msg) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);

    // Kiểm tra lỗi trong quá trình chuẩn bị truy vấn
    if ($stmt === false) {
        die('Error during prepare: ' . htmlspecialchars($conn->error));
    }

    // Bind các giá trị và thực hiện truy vấn
    $stmt->bind_param('ssss', $firstName, $lastName, $email, $msg);
    $insert_query_run = $stmt->execute();

    // Kiểm tra lỗi trong quá trình thực hiện truy vấn
    if ($insert_query_run) {
        $_SESSION['message'] = 'Message sent successfully';
        header('location: ../contactUs.php');
    } else {
        $_SESSION['message'] = 'Something went wrong';
        header('location: ../contactUs.php');
    }

    // Đóng statement sau khi sử dụng
    $stmt->close();
}

?>