<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="adminHeader.css">
    <script src="../../js/adminScript.js"></script>
    <title>Foodies</title>
</head>

<body>
    <header>
        <div class="headerContainer">
            <div class="floater container">
                <a href="../../adminPanel/adminDashboard/dashboard.php">
                    <img src="./../../img/logo.svg">
                </a>

                <div class="fa-solid fa-user rightFloater" id="userIcon"></div>
            </div>

            <div class=" accountHover">
                <div class=" container accountContent">
                    <div class="avatar">
                        <img src="../../img/exavt.svg" />
                    </div>
                    <div class="hoverOption">
                        <a href="../../adminPanel/adminProfileDetail/adminProfileDetail.php" class="btn navBtn viewProfileBtn">View Profile</a>
                        <a href="../../components/adminLogout.php" onclick="return confirm('Logout from this website?');" class="btn navBtn logoutBtn">Logout</a>
                    </div>
                </div>
            </div>
            <div class="sideBar">
                <div class="sideBarContent">
                    <div class="sideBarProfile">
                        <img src="../../img/exavt.svg" />
                        <p>name</p>
                    </div>
                    <div class="navBar">
                        <ul>
                            <li class="liCon "><a href="../../adminPanel/adminDashboard/dashboard.php"><i class="icon fa-solid fa-house"></i>DASHBOARD</a></li>
                            <li class="liCon "><a href="../../adminPanel/addProduct/addProduct.php"><i class="icon fa-solid fa-square-plus"></i>Add Product</a></li>
                            <li class="liCon "><a href="../../adminPanel/viewProduct/viewProduct.php"><i class="icon fa-brands fa-product-hunt"></i>View Product</a></li>
                            <li class="liCon "><a href="../../adminPanel/userAccount/userAccount.php"><i class="icon fa-solid fa-address-card"></i>User Account</a></li>
                            <li class="liCon "><a href="../adminLogout.php"><i class="icon fa-solid fa-right-from-bracket"></i>Logout</a></li>
                        </ul>
                    </div>
                    <div class="socialLink">
                        <i class="socialIcon fa-brands fa-facebook"></i>
                        <i class="socialIcon fa-brands fa-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>