<?php
session_start();
include('./includes/header.php');

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are not logged in";
    header('location: login.php');
    exit();
}

// Lấy thông tin người dùng từ session
$user = $_SESSION['auth_user'];
?>

<style>
    .user-profile-avatar {
        width: 150px;
        height: 150px;
        margin-bottom: 10px;
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-warning text-white text-center">
                        <h4 class="mb-0">My Profile</h4>
                    </div>
                    <div class="card-body text-center">


                        <img src="<?= isset($user['image']) && $user['image'] === 'default.jpg'? './avt-image/avt.jpg':'./avt-image/' . $user['image']  ; ?>" alt="Avatar" class="rounded-circle avatar-img mb-4 user-profile-avatar">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Name:</strong> <?= $user['name']; ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= $user['email']; ?></li>
                            <li class="list-group-item"><strong>Phone:</strong> <?= isset($user['phone']) ? $user['phone'] : 'N/A'; ?></li>

                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Go Back</a>
                        <a href="updateProfile.php" class="btn btn-warning">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php'); ?>
