<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="../../customerPanel/customerProfileDetail/customerProfileDetail.css">

    <script src="../../js/customerScript.js"></script>
    <title>Customer Update Profile</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>
    <div class="head">
        <b class="ProfileDetail">Profile Details</b>
    </div>
    <div class="adminProfileDetailChild ">
        <img class="adminProfileAvt" alt="" src="../../img/exavt.svg" />
        <div class="name">name</div>
        <div class="seller">seller</div>
        <div class="group-div" id="groupContainer4">
            <div class="group-inner">
                <div class="update-profile" id="updateProfileText">Update profile</div>
            </div>
        </div>
        <div class="boxWrap">
            <div class="boxProduct">
                <div class="group-child">
                    <b class="ProductAdded">My Order</b>
                    <b class="ViewDetail" id="viewDetails">View details &gt;&gt;&gt;</b>
                    <b class="b">17</b>
                </div>
            </div>
            <div class="boxTotalOrder">
                <div class="group-child">
                    <b class="TotalOrder">My Comment</b>
                    <b class="ViewDetail1" id="viewDetails1">View details &gt;&gt;&gt;</b>
                    <b class="b1">20</b>
                </div>
            </div>
        </div>

        
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>

</html>