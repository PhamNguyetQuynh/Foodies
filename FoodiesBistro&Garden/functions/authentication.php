<?php
session_start();
include('../config/dbconn.php');
include('./myFunctions.php');
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
            // Hash the password before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $insert_query = "INSERT INTO users(name, email, phone, password) VALUES('$name','$email','$phone','$hashedPassword')";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = 'Registered successfully';
                header('location: ../login.php');
            } else {
                $_SESSION['message'] = 'Something went wrong';
                header('location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Password do not match";
            header('location: ../register.php');
        }
    }
} else if (isset($_POST['loginBtn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email'";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);
        $hashedPasswordFromDatabase = $userdata['password'];

        if (password_verify($password, $hashedPasswordFromDatabase)) {
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

            if ($role_as == 1) {
                redirect("../admin/index.php", "Welcome to the dashboard");
            } else {
                redirect("../index.php", "Logged in");
            }
        } else {
            redirect("../login.php", "Invalid");
        }
    } else {
        redirect("../login.php", "Invalid");
    }
}