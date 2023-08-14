<?php 

include('userfunctions.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Homepage</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="day.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>

</head>

<body style="width: 100%;">
 
    <div class="container" style="    
    top: 2%;
    width: 98%;
    height: 100%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    padding-top:20px;">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">REUP MARKET</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="homepage.php">Home</a></li>
        <li class="active"><a href="cart.php">Orders</a></li>
         <li><a href="#">Listings</a></li>
          <li ><a href="#">Messages</a></li>
          <li><a href="#">Wallet</a></li>
          <li><a href="#">Support</a></li>
         
         <li><h1 style="text-align:center; margin-top:5px; margin-left:50px;">REUP MARKET</h1></li>
        <!--Replace with code from product-view.php -->
        <li style=" display:inline-flex; font-weight: bold; margin-left:150px;"><a href="category.php">Become A Merchant</a></li>
        <li style="
              color: #010204;
              top: -5px;
              position: absolute;
              right: 300px;
          ">
          <a href="cart.php"><i class="fa-sharp fa-regular fa-cart-shopping">
                <img src="../phpecom/images/shopping-cart.png"><span id="cartItemsQuantityCount">0</span></i></a></li>
          
        </ul>
        <div style="float:right;">
          <?php include("bitcoin-ticker.php"); ?>

        </div>
      </div>
    </nav>
  </div>
  
</div>
  <header></header>


<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                    <?php 
                        $items = getCartItems();
                        
                        if(mysqli_num_rows($items) > 0) { 
                            ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Remove</h6>
                                </div>
                            </div>
                            <div id="">
                                <?php
                                    foreach ($items as $citem) 
                                    {
                                        ?>
                                        <div class="card product_data shadow-sm mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5><?= $citem['name'] ?></h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>USD <?= $citem['selling_price'] ?></h5>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                    <div class="input-group mb-3" style="width:130px">
                                                        <button class="input-group-text decrement-btn updateQty">-</button>
                                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled>
                                                        <button class="input-group-text increment-btn updateQty">+</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>"> 
                                                    <i class="fa fa-trash me-2"></i>Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="card card-body shadow text-center">
                                <h4 class="py-3">Your cart is empty</h4>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php //include('includes/footer.php'); ?>
   