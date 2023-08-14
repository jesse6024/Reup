<?php 
include('alertify.php');

include('userfunctions.php');


//include('includes/header.php');
// To do import custom.js and get the button to work
if(isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);

    if($product)
    {
        ?>
<html>
    <head>
    <meta charset="utf-8">
    <title>Product View</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="password-strength-indicator.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    </head>




    <h1 style="text-align:center;">REUP MARKET</h1>
    
    <!--<h5>Dashboard</h5>-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">REUP MARKET</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="homepage.php">Home</a></li>
          <li><a href="vendor.php">Vendor</a></li>
          <li><a href="add-product.php">Add Product</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="categories.php">Show Categories</a></li>
          <li><a href="add-category.php">Add Category</a></li>
          <li><a href="category.php">All Categories</a></li>
          <li><a href="edit-category.php">Edit Category</a></li>
          <li><a href="pm_check.php">Messages</a></li>
          <li><a href="chat-index-page.php">Chat</a></li>
          <li> <a href="registration2.php">Register</a></li>
          <li style="
              color: #010204;
              top: -5px;
              position: absolute;
              right: 300px;
          ">
          <a href="cart.php"><i class="fa-sharp fa-regular fa-cart-shopping">
                <img src="../phpecom/images/shopping-cart.png"><span id="cartItemsQuantityCount">0</span></i></a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <div style="float:right;">
          <?php include("bitcoin-ticker.php"); ?>

        </div>
      </div>
    </nav>

    </div>
    <header></header>
    <body>

    <div class="py-3 bg-primary"  style="color: #fff;
        background-color:black;">
            <div class="container">
                <h6 class="text-white"> 
                    <a class="text-white" href="index.php">
                        Home / 
                    </a>
                    <a class="text-white" href="categories.php">
                        Categories / 
                    </a>
                    <?= $product['name']; ?></h6>
            </div>
        </div>

        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4" style="padding-top:10px;">
                        <div class="shadow">
                            <img style="height:200px;width:300px;" src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-end text-danger"><?php if($product['trending']){ echo "Trending"; } ?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Price:  <span class="text-success fw-bold"> <?= $product['selling_price'];?> USD</span></h4>
                            </div>
                            <div class="col-md-6">
                                <h5>Original Price:<s class="text-danger"> <?= $product['original_price']; ?> USD</s></h5>
                            </div>
                        </div>
                         
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px;">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <!--<button class="input-group-text decrement-btn">-</button>-->
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1">
                                    <!--<button class="input-group-text increment-btn">+</button>-->
                                </form>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Not adding to the cart database no data is being submitted.-->
                                <button type="button" class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"> <i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                         <div class="col-md-6">
                                <button class="btn btn-danger px-4"> <i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                            </div>
                        </div>
                        <hr>

                        <h6>Product Description:</h6>

                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    
        <?php
    }
    else
    {
        echo "Product Not Found";
    }
}
else
{
    echo "Something Went wrong";
}
?>        

</body>
</html>