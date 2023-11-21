<?php
include '../../components/connect.php';
if (isset($_POST['submit'])) {
    $id = generateUniqueId();

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_UNSAFE_RAW);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_UNSAFE_RAW);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_UNSAFE_RAW);

    $cpass = sha1(($_POST['cpass']));
    $cpass = filter_var($cpass, FILTER_UNSAFE_RAW);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_UNSAFE_RAW);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = generateUniqueId() . '.' . $ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../../uploadedFiles/' . $rename;

    $select_seller = $conn->prepare("SELECT *FROM `sellers` WHERE email=?");
    $select_seller->execute([$email]);

    if ($select_seller->rowCount() > 0) {
        $warning_msg[] = 'email already exist';
    } else {
        if ($pass != $cpass) {
            $warning_msg[] = 'confirm password not matched';
        } else {
            $insert_seller = $conn->prepare("INSERT INTO `sellers` (id, name, email, password, image) VALUES(?, ?, ?, ?, ?)");
            $insert_seller->execute([$id, $name, $email, $cpass, $rename]);
            move_uploaded_file($image_tmp_name, $image_folder);
            $success_msg[] = 'new seller registered';
        }
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
    <link rel="stylesheet" href="../adminRegister/adminRegister.css">
    <link rel="stylesheet" href="../../css/responsive.css">
    <title>Foodies-Admin Register page</title>
</head>

<body>

    <div class="wrapper">
        <div class="formWrapper container">
            <form action="" method="post" enctype="multipart/form-data" class="register">
                <h1>REGISTER NOW</h1>
                <div class="field">
                    <div class="col">
                        <div class="input">
                            <p>Your Name <span class="requiredFiled">*</span></p>
                            <input type="text" name="name" placeholder="Enter your name" maxlength="50" required class="box">
                        </div>
                        <div class="input">
                            <p>Your Email <span class="requiredFiled">*</span></p>
                            <input type="text" name="email" placeholder="Enter your email" maxlength="50" required class="box">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input">
                            <p>Your Password <span class="requiredFiled">*</span></p>
                            <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required class="box">
                        </div>
                        <div class="input">
                            <p>Confirm Password <span class="requiredFiled">*</span></p>
                            <input type="password" name="cpass" placeholder="Re-enter your password" maxlength="50" required class="box">
                        </div>
                    </div>
                </div>
                <div class="input selectPic">
                    <p>Select Pic <span class="requiredFiled">*</span></p>
                    <input type="file" name="image" accept="image/" required class="box">
                </div>
                <div class="registerSec">
                    <p class="navToLogin">Already have an account? <a href="../adminLogin/adminLogin.php">Login now</a></p>
                    <input type="submit" name="submit" value="Register Now" class="registerButton btn">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="../../js/adminScript.js"></script>
    <?php include '../../components/alert.php'; ?>
</body>

</html>