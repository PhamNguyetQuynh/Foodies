<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../customerLogin/customerLogin.css">
    <title>Foodies-Admin Login page</title>
</head>

<body>
    <div class="wrapper">
        <div class="formWrapper container">
            <form action="../adminDashboard/dashboard.php" method="post" enctype="multipart/form-data" class="login" id="loginForm">
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
</body>

</html>