<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="adminHeader.css">


    <div class="headerContainer">
        <div class="floater container">
            <img src="./../../img/logo.svg">
            <i class="fa-solid fa-user rightFloater"></i>
        </div>
        <div class="accountHoverConatiner">
            <div class="container accountHover">
                <div class="avatar">
                    <img src="../../img/exavt.svg" />
                </div>

                <div class="hoverOption">
                    <a href="../../adminPanel/profile.php" class="btn navBtn viewProfileBtn">View Profile</a>
                    <a href="../../components/adminLogout.php" onclick="return confirm('Logout from this website?');" class="btn navBtn logoutBtn">Logout</a>
                </div>
            </div>
        </div>

        <div class="sideBar">
            <div class="sideBarProfile">
                <img src="../../img/exavt.svg" />
                <p>name</p>
            </div>
            <div class="navBar">
                <ul>
                    <li class="container liCon"><a href="dashboard.php" ><i class="icon fa-solid fa-house"></i>Dashboard</a></li>
                    <li class="container liCon"><a href="addProduct.php"><i class="icon fa-solid fa-square-plus"></i>Add Product</a></li>
                    <li class="container liCon"><a href="viewProduct.php"><i class="icon fa-brands fa-product-hunt"></i>View Product</a></li>
                    <li class="container liCon"><a href="userAccount.php"><i class="icon fa-solid fa-address-card"></i>User Account</a></li>
                    <li class="container liCon"><a href="../adminLogout.php"><i class="icon fa-solid fa-right-from-bracket"></i>Logout</a></li>
                </ul>
            </div>
            <!-- social link -->
            <div class="socialLink">
                <i class="facebookIcon fa-brands fa-facebook"></i>
                <i class="instagramIcon fa-brands fa-instagram"></i>
            </div>
        </div>
    </div>


</header>