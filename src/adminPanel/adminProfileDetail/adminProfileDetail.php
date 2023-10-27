<!DOCTYPE html>
<html>
    <head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="../../adminPanel/adminProfileDetail/adminProfileDetail.css">
    <title>Foodies-Admin Profile Detail</title></head>
    <body>
        <div class="wrapper">
            <?php include '../../components/adminHeader/adminHeader.php' ?>
        </div>

        <b class="ProfileDetail">Profile Details</b>
        <div class="adminProfileDetailChild ">
        <b class="name">name</b>
        <div class="seller">seller</div>
        <img
            class="adminProfileAvt"
            alt=""
            src="../../img/exavt.svg" />

       

        <div class="boxProduct">
            <div class="group-child">
            <b class="ProductAdded">Products Added</b>
            <b class="ViewDetail" id="viewDetails">View details &gt;&gt;&gt;</b>
            <b class="b">17</b>
            </div>
        </div>
        <div class="boxTotalOrder">
            <div class="group-child">
            <b class="TotalOrder">Total Orders</b>
            <b class="ViewDetail1" id="viewDetails1">View details &gt;&gt;&gt;</b>
            <b class="b1">20</b>
            </div>
        </div>
        <div class="group-div" id="groupContainer4">
            <div class="group-inner">
            <div class="update-profile" id="updateProfileText">Update profile</div>
            </div>
        </div>
        </div>
    
    </body>
      
  
      


</html>