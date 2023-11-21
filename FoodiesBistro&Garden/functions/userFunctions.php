<?php
session_start();
include('config/dbconn.php');
function getAllActive($table)
{
    global $conn;
    $query = "SELECT* FROM $table WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getAllTrending()
{
    global $conn;
    $query = "SELECT* FROM products WHERE trending='1'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location:' . $url);
    exit();
}
function getByIDActive($table, $id)
{
    global $conn;
    $query = "SELECT* FROM $table WHERE id='$id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getBySlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT* FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getProductsByCate($category_id)
{
    global $conn;
    $query = "SELECT* FROM products WHERE category_id='$category_id' AND status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getCartItems()
{
    global $conn;
    $userID = $_SESSION['auth_user']['user_id'];
    $query = "SELECT carts.id as cid, carts.product_qty, products.id as pid, products.name, products.image, products.selling_price 
    FROM carts, products
    WHERE carts.product_id=products.id
    AND carts.user_id='$userID'
    ORDER BY carts.id DESC";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getOrders()
{
    global $conn;
    $userID = $_SESSION['auth_user']['user_id'];

    $query="SELECT * FROM orders WHERE user_id='$userID' ORDER BY created_at DESC";
    $query_run=mysqli_query($conn, $query);
    return $query_run;
}
function checkTrackingNoExist($trackingNo)
{
    global $conn;
    $userID = $_SESSION['auth_user']['user_id'];

    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userID'";
    return mysqli_query($conn, $query);
}