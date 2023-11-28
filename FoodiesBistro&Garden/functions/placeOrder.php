<?php
session_start();
include('../config/dbconn.php');
function generateUniqueId()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charLength = strlen($characters);
    $uniqueId = '';

    for ($i = 0; $i < 20; $i++) { // Generating a 20-character ID
        $randomIndex = mt_rand(0, $charLength - 1);
        $uniqueId .= $characters[$randomIndex];
    }

    return $uniqueId;
}

if (isset($_SESSION['auth'])) {
    if (isset($_POST['placeOrderBtn'])) {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
        $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $address == "") {
            $_SESSION['message'] = "All field are mandatory";
            header('location: ../checkout.php');
            exit(0);
        }

        $userID = $_SESSION['auth_user']['user_id'];
        $query = "SELECT carts.id as cid, carts.product_qty, products.id as pid, products.name, products.image, products.selling_price 
        FROM carts, products
        WHERE carts.product_id=products.id
        AND carts.user_id='$userID'
        ORDER BY carts.id DESC";
        $query_run = mysqli_query($conn, $query);


        $totalPrice = 0;
        foreach ($query_run as $citem) {
            $totalPrice += $citem['selling_price'] * $citem['product_qty'];
        }

        $tracking_no = generateUniqueId();

        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, phone, address, comments, total_price, payment_mode, payment_id)
        VALUES('$tracking_no', '$userID', '$name', '$email', '$phone', '$address', '$comments', '$totalPrice', '$payment_mode', '$payment_id')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($conn);
            foreach ($query_run as $citem) {

                $product_id = $citem['pid'];
                $product_qty = $citem['product_qty'];
                $price = $citem['selling_price'];
                $insert_items_query = "INSERT INTO order_items (order_id, product_id, qty, price) 
                VALUES ('$order_id','$product_id', '$product_qty', '$price')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);


                $product_fetch_query = "SELECT * FROM products WHERE id='$product_id' LIMIT 1";
                $product_fetch_query_run = mysqli_query($conn, $product_fetch_query);

                $productData = mysqli_fetch_array($product_fetch_query_run);
                $current_qty = $productData['qty'];

                $new_qty = $current_qty - $product_qty;

                $update_productQty_query = "UPDATE products SET qty='$new_qty' WHERE id='$product_id' ";
                $update_productQty_query_run = mysqli_query($conn, $update_productQty_query);
            }
            //after place order -> cart need to be empty
            $delete_cart_query = "DELETE FROM carts WHERE user_id='$userID'";
            $delete_cart_query_run = mysqli_query($conn, $delete_cart_query);


            $_SESSION['message'] = "Order placed sucessfully";
            header('location: ../myOrder.php');
        }
    }
} else {
    header('location: ../index.php');
}
