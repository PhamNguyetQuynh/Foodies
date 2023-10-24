<!DOCTYPE html>
<html>
    <head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/adminHeader/adminHeader.css">
    <link rel="stylesheet" href="../../adminPanel/adminProfileDetail/adminProfileDetail.css">
    <title>Foodies-Admin Dashboard page</title></head>
    <body>
        <div class="wrapper">
            <?php include '../../components/adminHeader/adminHeader.php' ?>
        </div>
        <b class="profile-details">Profile Details</b>
        <div class="admin-profile-details-child"></div>
        <b class="name">name</b>
        <div class="seller">seller</div>
        <img
            class="admin-profile-avt"
            alt=""
            src="../../img/exavt.svg" />

       

        <div class="rectangle-group">
            <div class="group-child"></div>
            <b class="products-added">Products Added</b>
            <b class="view-details" id="viewDetails">View details &gt;&gt;&gt;</b>
            <b class="b">17</b>
        </div>
        <div class="rectangle-container">
            <div class="group-child"></div>
            <b class="total-orders">Total Orders</b>
            <b class="view-details1" id="viewDetails1">View details &gt;&gt;&gt;</b>
            <b class="b1">20</b>
        </div>
        <div class="group-div" id="groupContainer4">
            <div class="group-inner"></div>
            <div class="update-profile" id="updateProfileText">Update profile</div>
        </div>
        </div>

        <script>
        var rectangle = document.getElementById("rectangle");
        if (rectangle) {
            rectangle.addEventListener("click", function (e) {
            // Please sync "Admin dashboard" to the project
            });
        }
      
        var rectangle1 = document.getElementById("rectangle1");
        if (rectangle1) {
            rectangle1.addEventListener("click", function (e) {
             // Please sync "Add Product" to the project
            });
        }
      
        var rectangle3 = document.getElementById("rectangle3");
        if (rectangle3) {
            rectangle3.addEventListener("click", function (e) {
            // Please sync "Account - registered users" to the project
            });
        }
      
        var vIEWPRODUCTSText = document.getElementById("vIEWPRODUCTSText");
        if (vIEWPRODUCTSText) {
            vIEWPRODUCTSText.addEventListener("click", function (e) {
            // Please sync "View product - Main" to the project
            });
      }
      
      var viewDetails = document.getElementById("viewDetails");
      if (viewDetails) {
        viewDetails.addEventListener("click", function (e) {
          // Please sync "View product - Main" to the project
        });
      }
      
      var viewDetails1 = document.getElementById("viewDetails1");
      if (viewDetails1) {
        viewDetails1.addEventListener("click", function (e) {
          // Please sync "Admin total orders" to the project
        });
      }
      
      var updateProfileText = document.getElementById("updateProfileText");
      if (updateProfileText) {
        updateProfileText.addEventListener("click", function (e) {
          window.location.href = "AdminProfileDetails.html";
        });
      }
      
      var groupContainer4 = document.getElementById("groupContainer4");
      if (groupContainer4) {
        groupContainer4.addEventListener("click", function (e) {
          // Please sync "Admin update profile" to the project
        });
      }
      </script>
    </body>


</html>
