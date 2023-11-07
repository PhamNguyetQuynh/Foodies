<?php
include '../../components/connect.php';
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_UNSAFE_RAW);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_UNSAFE_RAW);

    $select_seller = $conn->prepare("SELECT *FROM `sellers` WHERE email=? AND password=?");
    $select_seller->execute([$email, $pass]);
    $row = $select_seller->fetch(PDO::FETCH_ASSOC);

    if ($select_seller->rowCount() > 0) {
        setcookie('seller_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:../adminDashboard/dashboard.php');
    } else {
        $warning_msg[] = 'incorrect email or password';
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../adminLogin/adminLogin.css">
    <title>Foodies-Admin Login page</title>
</head>

<body>
    <div class="wrapper">
        <div class="formWrapper container">
            <form action="" method="post" enctype="multipart/form-data" class="login" id="loginForm">
                <h1>WELCOME BACK</h1>
                <div class="field">
                    <div class="input">
                        <p>Your Email <span class="requiredFiled">*</span></p>
                        <input type="text" name="email" placeholder="Enter your email" maxlength="50" required class="box">
                    </div>
                    <div class="input">
                        <p>Your Password <span class="requiredFiled">*</span></p>
                        <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required class="box">
                    </div>

                </div>
                <div class="LoginBtn">
                    <p class="navToLogin">Don't have an account? <a href="../adminRegister/adminRegister.php">Register now</a></p>
                    <input type="submit" name="submit" value="Login Now" class="loginButton btn">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../../js/adminScript.js"></script>
    <?php include '../../components/alert.php'; ?>
</body>
</body>

</html>