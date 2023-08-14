<?php 
//include("myfunctions.php");
include("db.php");
include("userfunctions.php");
if (isset($_GET['category']))
{

$category_slug = $_GET['category'];
$category_data = getSlugActive("categories", $category_slug);
$category = mysqli_fetch_array($category_data);
if($category)
{
    $cid = $category['id'];
}


?>
<head>
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Products</title>
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
        <li><a href="homepage.php">Home</a></li>
          <li><a href="vendor.php">Vendor</a></li>
          <li><a href="add-product.php">Add Product</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="categories.php"> Show Categories</a></li>
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
<div class="py-3 bg-primary" style="color: #fff;
    background-color: black;">
    <div class="container">
        <h6 class="text-white"> 
        <a class="text-white" href="categories.php">    
        Home / 
</a>
<a class="text-white" href="categories.php">    
        Categories / 
</a>
        <?=$category['name'];?></h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?$category['name']; ?></h3>
                <hr>
                <div class="row" style="">
                    <?php 
                        $products = getProdByCategory($cid);

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="product-view.php?product=<?= $item['slug'];?>">
                                            <div class="card shadow">
                                                <div class="card-body" style="    
                                                  
                                                  width: 300px;
                                                  height: 700px;
                                                  display:inline-block;
                                                  text-align:center;
                                                  ">
                                                  
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100" width="50%" height="10%">
                                                    <h4 class="text-center"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }else{
                            echo "No products under this category";
                        }
                    }
                        else
                        {
                            echo "Something Went Wrong";
                        }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
                    </div>