<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">
    <link href="./assets/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="./assets/css/owl.carousel.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- alertify js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <title>Foodies Bistro & Garden</title>
</head>


<?php

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);

?>
<button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#side" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
  <span class="navbar-toggler-icon"></span>
</button>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

  <div class="sidenav-header">

    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">

      <span class="ms-1 font-weight-bold text-white">Foodies Bistro & Garden</span>

    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">


    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "index.php" ? 'active bg-gradient-primary' : ''  ?>" href="index.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "category.php" ? 'active bg-gradient-primary' : ''  ?>" href="category.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">All Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "addCategory.php" ? 'active bg-gradient-primary' : ''  ?> " href="addCategory.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Add Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "product.php" ? 'active bg-gradient-primary' : ''  ?>" href="product.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">All Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "addProduct.php" ? 'active bg-gradient-primary' : ''  ?>" href="addProduct.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Add Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "order.php" ? 'active bg-gradient-primary' : ''  ?>" href="order.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "reservation.php" ? 'active bg-gradient-primary' : ''  ?>" href="reservation.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">table_view</i>
          </div>
          <span class="nav-link-text ms-1">Reservations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white <?= $page == "addReservation.php" ? 'active bg-gradient-primary' : ''  ?>" href="addReservation.php">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">add</i>
          </div>
          <span class="nav-link-text ms-1">Add new Reservation</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn bg-gradient-primary mt-4 w-100" href="../logout.php">Log out</a>
    </div>
  </div>
</aside>