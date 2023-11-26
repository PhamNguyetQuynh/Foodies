<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link rel="stylesheet" href="../../components/customerHeader/customerHeader.css">
    <link rel="stylesheet" href="../../components/customerFooter/customerFooter.css">
    <link rel="stylesheet" href="../../customerPanel/customerUpdateProfile/customerUpdateProfile.css">

    <script src="../../js/customerScript.js"></script>
    <title>Customer Update Profile</title>
</head>
<body>
    <?php include '../../components/customerHeader/customerHeader.php'; ?>    
    <div class="adminUpdateProfileChild">
        <div class="rectangle-parent">
            <!-- <div class="group-child"></div> -->
            <div class="upper">
                <img class="admin-profile-avt" alt="" src="../../img/exavt.svg" />
                <b class="UpdateProfile">Update Profile</b>
            </div>

            <table>
                <tr>
                    <td>
                        <label for="YourName">Your Name</label>
                        <b class="b1">*</b>
                    </td>
                    <td>
                        <label for="UpdatePic">Update Pic</label>
                        <b class="b1">*</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="YourNameText" type="text" placeholder="enter your name" />
                    </td>
                    <td>
                        <div class="input selectpic">
                            <input type="file" name="image" accept="image/" required class="box" lang="en">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="YourEmail">Your Email</label>
                        <b class="b1">*</b>
                    </td>
                    <td>
                        <label for="OldPassword">Old Password</label>
                        <b class="b1">*</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="YourName" type="text" placeholder="enter your email" />
                    </td>
                    <td>
                        <input class="YourOldPasswordText" type="text" placeholder="enter your old password" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="NewPassword">New Password</label>
                        <b class="b1">*</b>
                    </td>
                    <td>
                        <label for="ConfirmPassword">Confirm Password</label>
                        <b class="b1">*</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="YourNewPasswordText" type="text" placeholder="enter your new password" />
                    </td>
                    <td>
                        <input class="YourConfirmText" type="text" placeholder="confirm your new password" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button id="update-button" class="btn" type="button">Update Now</button>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <?php include '../../components/customerFooter/customerFooter.php'; ?>
</body>

</html>