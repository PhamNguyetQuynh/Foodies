<header class="header ">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css"> -->
    <section class="flex container">
        <a href="../../customerPanel/home/home.php" class="logo"><img src="../../img/logo.svg" </a>
            <nav class="navbar">
                <a href="../../customerPanel/home/home.php">Home</a>
                <a href="../../customerPanel/aboutUs/aboutUs.php">About Us</a>
                <a href="../../customerPanel/shop/shop.php">Shop</a>
                <a href="../../customerPanel/order/order.php">Order</a>
                <a href="../../customerPanel/contact/contact.php">Contact</a>
            </nav>
            <form action="" method="post" class="searchForm">
                <div class="searchInputContainer">
                    <input type="text" name="searchProduct" placeholder="Search..." required maxlength="100" class="searchArea">
                    <button type="submit" class="box fa-solid fa-magnifying-glass" id="searchButton"></button>
                </div>
            </form>
            <div class="user">
                <a href="../../customerPanel/wishlist/wishlist.php"><i class="fa-regular fa-heart"></i><sup>0</sup></a>
                <a href="../../customerPanel/cart/shoppingCart.php"><i class="fa-solid fa-cart-shopping"></i><sup>0</sup></a>
                <div class="box fa-solid fa-user userIcon" id="userIcon"></div>
            </div>
    </section>
    <div class="accountHover">
        <div class=" container accountContent">
            <div class="hoverOption">
                <p class="someText">Please Login or Register</p>
                <a href="../../customerPanel/customerLogin/customerLogin.php" class="btn navBtn loginButton">Login</a>
                <a href="../../customerPanel/customerRegister/customerRegister.php" class="btn navBtn registerBtn">Register</a>
            </div>
        </div>
    </div>

</header>