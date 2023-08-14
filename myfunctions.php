<?php


include('db.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' ";
    return $query_run = mysqli_query($con, $query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit(0);
}

function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='0'";
    return $query_run = mysqli_query($con, $query);
}

function getOrderHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status !='0' ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $con;

    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
    return mysqli_query($con, $query);
}

function todayMoney()
{
    global $con;

    $todayDate = date('Y-m-d');
    $query = "SELECT SUM(total_price) FROM orders WHERE created_at LIKE '$todayDate%' ";
    return mysqli_query($con, $query);
}

function todayUsers()
{
    global $con;

    $todayDate = date('Y-m-d');
    $query = "SELECT id FROM users WHERE created_at LIKE '$todayDate%' ";
    return mysqli_query($con, $query);
}

function totalUsers()
{
    global $con;

    $query = "SELECT id FROM users";
    return mysqli_query($con, $query);
}

function totalSales()
{
    global $con;

    $query = "SELECT SUM(total_price) FROM orders";
    return mysqli_query($con, $query);
}


?>