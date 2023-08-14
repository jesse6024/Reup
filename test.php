<?php
session_start();
//include('auth.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Homepage</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="width: 100%;">
  <div class="container" style="    
    top: 2%;
    width: 98%;
    height: 100%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);">


    
   
    <h1 style="text-align:center;">REUP MARKET</h1>
   
     <!--<h5>Dashboard</h5>-->
     <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">REUP MARKET</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="homepage.php">Home</a></li>
          <li><a href="vendor.php">Vendor</a></li>
          <li><a href="add-product.php">Add Product</a></li>
          <li ><a href="products.php">Products</a></li>
          <li><a href="categories.php">Show Categories</a></li>
          <li><a href="add-category.php">Add Category</a></li>
          <li><a href="category.php">All Categories</a></li>
          <li><a href="edit-category.php">Edit Category</a></li>
          <li><a href="pm_check.php">Messages</a></li>
          <li><a href="chat-index-page.php">Chat</a></li>
          <li> <a href="registration2.php">Register</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <div style="float:right;">
          <?php include("bitcoin-ticker.php"); ?>

        </div>
      </div>
    </nav>
  </div>
  <header></header>

  <div id="row-1" style="width: 100%; display: flex; flex-direction: row; justify-content: center; margin-top: 60px;">

    <div class="user-profile" style=" 
    border: none;
    height: auto;
    width: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    padding-bottom: 30px;
    margin-right: 40px;
">
      <!--<h2>DASHBOARD</h2>-->
      <div class="form" style="border: none;">
        <p>Profile</p>
        <img src="default-profile-pic.jfif"><br>

        <div id="profile-info" style="display: flex; flex-direction: column; align-items: space-evenly; justify-content: space-evenly; height: 200px;">


          <?php echo "Username: " . $_SESSION["username"] . "<br>"; ?>
          <?php echo "Date Joined: " . $_SESSION["dateJoined"] . "<br>"; ?>
          <?php echo "Account Role: " . $_SESSION["account_role"] . "<br>"; ?>
  