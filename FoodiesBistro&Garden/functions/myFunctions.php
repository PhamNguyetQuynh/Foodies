<?php
session_start();
include('../config/dbconn.php');
function getAll($table)
{
    global $conn;
    $query = "SELECT* FROM $table";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function getByID($table, $id)
{
    global $conn;
    $query = "SELECT* FROM $table WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location:' . $url);
    exit();
}
function getOnGoingOrders()
{
    global $conn;
    $query = "SELECT * FROM orders WHERE status='0'";
    $query_run = mysqli_query($conn, $query);
    return $query_run;
}
function checkTrackingNoExist($trackingNo)
{
    global $conn;
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return mysqli_query($conn, $query);
}

function getAllOrders()
{
    global $conn;
   
    $query="SELECT * FROM orders";
    return mysqli_query($conn, $query);
}