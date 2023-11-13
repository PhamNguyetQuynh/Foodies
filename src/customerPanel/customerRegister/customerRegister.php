<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="..//customerRegister/customerRegister.css">
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
                            <input type="password" name="confirmPass" placeholder="Re-enter your password" maxlength="50" required class="box">
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
</body>



</html>