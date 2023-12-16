<?php
session_start();
include('../config/dbconn.php');

if (isset($_SESSION['auth'])) {
    // Check if the user is not an admin (role_as != 1)
    if ($_SESSION['role_as'] != 1) {
        if (isset($_POST['scope'])) {
            $scope = $_POST['scope'];

        switch ($scope) {
            case "add":
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];

                $user_id = $_SESSION['auth_user']['user_id'];
                // $check_existing = "SELECT * FROM wishlist WHERE product_id='$product_id' AND user_id='$user_id'";
                // $check_existing_run = mysqli_query($conn, $check_existing);

                $check_existing_query = "SELECT * FROM wishlist WHERE product_id=? AND user_id=?";
                $stmt = mysqli_prepare($conn, $check_existing_query);
                mysqli_stmt_bind_param($stmt, 'ii', $product_id, $user_id);
                mysqli_stmt_execute($stmt);
                $check_existing_run = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($check_existing_run) > 0) {
                    echo "existing";
                } else {
                    // $insert_query = "INSERT INTO wishlist (user_id, product_id, product_qty) VALUES ('$user_id','$product_id','$product_qty')";
                    // $insert_query_run = mysqli_query($conn, $insert_query);

                    $insert_query = "INSERT INTO wishlist (user_id, product_id, product_qty) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $insert_query);
                    mysqli_stmt_bind_param($stmt, 'iii', $user_id, $product_id, $product_qty);
                    $insert_query_run = mysqli_stmt_execute($stmt);

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
    
                // $check_existing = "SELECT * FROM wishlist WHERE id='$wishlist_id' AND user_id='$user_id'";
                // $check_existing_run = mysqli_query($conn, $check_existing);

                $check_existing_query = "SELECT * FROM wishlist WHERE id=? AND user_id=?";
                $stmt = mysqli_prepare($conn, $check_existing_query);
                mysqli_stmt_bind_param($stmt, 'ii', $wishlist_id, $user_id);
                mysqli_stmt_execute($stmt);
                $check_existing_run = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($check_existing_run) > 0) {
                    // $delete_query = "DELETE FROM wishlist WHERE id='$wishlist_id'";
                    // $delete_query_run = mysqli_query($conn, $delete_query);
                    $delete_query = "DELETE FROM wishlist WHERE id=?";
                    $stmt = mysqli_prepare($conn, $delete_query);
                    mysqli_stmt_bind_param($stmt, 'i', $wishlist_id);
                    $delete_query_run = mysqli_stmt_execute($stmt);
                    if ($delete_query_run) {
                        echo 201;
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
    echo 403; // Forbidden: Admins are not allowed to perform cart actions
    }
} else {
    echo 401;
}