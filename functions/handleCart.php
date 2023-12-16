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
                //$check_existing = "SELECT * FROM carts WHERE product_id='$product_id' AND user_id='$user_id'";
                //$check_existing_run = mysqli_query($conn, $check_existing);

                if ($product_id && $product_qty) {
                    $check_existing = "SELECT * FROM carts WHERE product_id=? AND user_id=?";
                    $stmt = $conn->prepare($check_existing);
                    $stmt->bind_param('ii', $product_id, $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "existing";
                    } else {
                        //$insert_query = "INSERT INTO carts(user_id, product_id, product_qty) VALUES ('$user_id','$product_id','$product_qty')";
                        //$insert_query_run = mysqli_query($conn, $insert_query);

                        $insert_query = "INSERT INTO carts(user_id, product_id, product_qty) VALUES (?,?,?)";
                        $stmt = $conn->prepare($insert_query);
                        $stmt->bind_param('iii', $user_id, $product_id, $product_qty);
                        $stmt->execute();


                        if ($stmt->affected_rows > 0) {
                            echo 201;
                        } else {
                            echo 500;
                        }
                    }
                } else {
                echo 500;
            }

                break;
            case "update":
                $product_id = $_POST['product_id'];
                $product_qty = $_POST['product_qty'];

                $user_id = $_SESSION['auth_user']['user_id'];

                if ($product_id && $product_qty) {
                    //$check_existing = "SELECT * FROM carts WHERE product_id='$product_id' AND user_id='$user_id'";
                    //$check_existing_run = mysqli_query($conn, $check_existing);

                    $check_existing = "SELECT * FROM carts WHERE product_id=? AND user_id=?";
                    $stmt = $conn->prepare($check_existing);
                    $stmt->bind_param('ii', $product_id, $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        //$update_query = "UPDATE carts SET product_qty='$product_qty' WHERE product_id='$product_id' AND user_id='$user_id'";
                        //$update_query_run = mysqli_query($conn, $update_query);
                        $update_query = "UPDATE carts SET product_qty=? WHERE product_id=? AND user_id=?";
                        $stmt = $conn->prepare($update_query);
                        $stmt->bind_param('iii', $product_qty, $product_id, $user_id);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            echo 200;
                        } else {
                            echo 500;
                        }
                    }
                } else {
                    echo "Something went wrong";
                }
                break;
            case "delete":
                $cart_id = $_POST['cart_id'];

                $user_id = $_SESSION['auth_user']['user_id'];

                if ($cart_id) {
                    $check_existing = "SELECT * FROM carts WHERE id=? AND user_id=?";
                    $stmt = $conn->prepare($check_existing);
                    $stmt->bind_param('ii', $cart_id, $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    //$check_existing = "SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id'";
                    //$check_existing_run = mysqli_query($conn, $check_existing);
                    if ($result->num_rows > 0) {
                        //$delete_query = "DELETE FROM carts WHERE id='$cart_id'";
                        //$delete_query_run = mysqli_query($conn, $delete_query);
                        $delete_query = "DELETE FROM carts WHERE id=? AND user_id=?";
                        $stmt = $conn->prepare($delete_query);
                        $stmt->bind_param('ii', $cart_id, $user_id);
                        $stmt->execute();
                        if ($stmt->affected_rows > 0) {
                            echo 200;
                        } else {
                            echo "Something went wrong";
                        }
                    } else {
                        echo "Something went wrong";
                    }
            } else {
                echo 500;
            }
                break;
        }
    }
} else {
    echo 401;
}
