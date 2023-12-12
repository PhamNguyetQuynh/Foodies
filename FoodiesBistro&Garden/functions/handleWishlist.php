<?php
session_start();
include('../config/dbconn.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];

        switch ($scope) {
            case "add":
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];

                $user_id = $_SESSION['auth_user']['user_id'];
                $check_existing = "SELECT * FROM wishlist WHERE product_id='$product_id' AND user_id='$user_id'";
                $check_existing_run = mysqli_query($conn, $check_existing);

                if (mysqli_num_rows($check_existing_run) > 0) {
                    echo "existing";
                } else {
                    $insert_query = "INSERT INTO wishlist (user_id, product_id, product_qty) VALUES ('$user_id','$product_id','$product_qty')";
                    $insert_query_run = mysqli_query($conn, $insert_query);

                    if ($insert_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                }

                break;
            case "delete":
                $wishlist_id = $_POST['wishlist_id'];

                $user_id = $_SESSION['auth_user']['user_id'];
    
                $check_existing = "SELECT * FROM wishlist WHERE id='$wishlist_id' AND user_id='$user_id'";
                $check_existing_run = mysqli_query($conn, $check_existing);
                if (mysqli_num_rows($check_existing_run) > 0) {
                    $delete_query = "DELETE FROM wishlist WHERE id='$wishlist_id'";
                    $delete_query_run = mysqli_query($conn, $delete_query);
                    if ($delete_query_run) {
                        echo 200;
                    } else {
                        echo "Something went wrong";
                    }
                } else {
                    echo "Something went wrong";
                }
                break;
            default:
                echo 500;
        }
    }
} else {
    echo 401;
}