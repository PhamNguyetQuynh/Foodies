<?php
session_start();

include('./config/dbconn.php');


if (isset($_GET['token'])) {

    $token = $_GET['token'];
    $verify_query = "SELECT verification_code, verify_status FROM users WHERE verification_code = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    
    if (mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if ($row["verify_status"] == '0') {
            $clicked_token = $row['verification_code'];
            $update_verify_query = "UPDATE users SET verify_status='1' WHERE verification_code='$clicked_token' LIMIT 1";
            $update_verify_query_run = mysqli_query($conn, $update_verify_query);

            if($update_verify_query_run) {
                $_SESSION['message'] = "Your Account has been verified successfully !!";
                header("Location: login.php");
                exit(0);
            }
            else{
                $_SESSION['message'] = "Verification Failed !!";
                header("Location: login.php");
                exit(0);
            }

        } else {
            $_SESSION['message'] = "Email Already Verified. Please Login!!";
            header("Location: login.php");
            exit(0);
        }

    } else {
        $_SESSION['message'] = "This Token does not exists";
        header("Location: login.php");
    }
}
else{
    $_SESSION["message"] = "Not Allowed";
    header("Location: login.php");
} 
