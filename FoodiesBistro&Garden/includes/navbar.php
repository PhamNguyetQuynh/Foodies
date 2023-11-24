<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container py-2 px-4">
    <div class="row">
      <div class="col-md-4">
        <a class="navbar-brand fs-4" href="index.php" style="font-weight: bolder; ">Foodies</a>
      </div>

      <div class="col-md-4">
        <form class="d-flex justify-content-between">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="width: 300px">
          <button class="btn" type="submit" style="background-color: white;">
            <i class="fa fa-search" style="color: #7D6323;"></i>
          </button>
        </form>
      </div>

      <div class="col-md-3">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width:95px;" href="aboutUs.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width:100px;" href="category.php">Our Menu </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="wishlist.php">Wishlist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li>

          </ul>

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <?php
              if (isset($_SESSION['auth'])) {
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['auth_user']['name'];   ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="myOrder.php">My Orders</a></li>
                    <li><a class="dropdown-item" href="myProfile.php">My Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
              <?php
              } else {
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>