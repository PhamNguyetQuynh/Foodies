<?php
session_start();
include('./includes/header.php');
include('./config/dbconn.php');

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are not logged in";
    header('location: login.php');
    exit();
}

// Lấy thông tin người dùng từ session
$user = $_SESSION['auth_user'];

// Xử lý form cập nhật thông tin
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Thực hiện truy vấn cập nhật thông tin người dùng
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=" . $user['user_id'];

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Cập nhật thông tin người dùng trong session
        $_SESSION['auth_user']['name'] = $name;
        $_SESSION['auth_user']['email'] = $email;
        $_SESSION['auth_user']['phone'] = $phone;
        $_SESSION['auth_user']['image'] = $image;


        // Xử lý avatar nếu có được tải lên
        if ($_FILES['avatar']['name'] != "") {
            $avatar_path = "./avt-image/";
            $avatar_filename =  $_FILES['avatar']['name'];
            
            if (file_exists($_FILES['avatar']['tmp_name'])) {
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_path . $avatar_filename);

                // Lưu đường dẫn avatar vào cơ sở dữ liệu

        
                $update_avatar_query = "UPDATE users SET image='$avatar_filename' WHERE id=" . $user['user_id'];
                $update_avatar_query_run = mysqli_query($conn, $update_avatar_query);

                if (!$update_avatar_query_run) {
                    echo "Error updating avatar: " . mysqli_error($conn);
                } else {
                    // Cập nhật đường dẫn avatar trong session
                    $_SESSION['auth_user']['image'] = $avatar_filename;
                }
            } else {
                echo "Error: File not found!";
            }
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<style>
    .avatar-preview {
        margin-right: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <div class="d-flex align-items-center">
                                    <img src="<?= isset($user['image']) && $user['image'] === 'default.jpg'? './avt-image/avt.jpg':'./avt-image/' . $user['image']  ?>" alt="Avatar Preview" class="avatar-preview mr-2">
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./includes/footer.php'); ?>