
  

<?php 
include('alertify.php');
include('db.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}


if(isset($_POST['add_product_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0' ;
    $trending = isset($_POST['trending']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name != "" && $slug != "" && $description != "")
    {
        $product_query = "INSERT INTO products (category_id,name,slug,small_description,description,original_price,selling_price,
        qty,meta_title,meta_keywords,status,trending,image) VALUES 
        ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title','$meta_keywords','$status','$trending','$filename')";

        $product_query_run = mysqli_query($con, $product_query);

        if($product_query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            ?>
            <script>
                $(document).ready(function () {
                    
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('Product Added Successfully');
                });
            </script>
            <?php
           
        }
        else
        {
            //redirect("add-product.php", "Something went wrong");
            ?>
            <script>
                $(document).ready(function () {
                    
                    alertify.set('notifier','position', 'top-right');
                    alertify.error('Something went wrong');
                });
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.error('Something went wrong');
            });
        </script>
        <?php
        // redirect("products.php", "All fields are mandatory");
    }


}


?>
<head>
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Add Product</title>
</head>
<body style="width: 100%;">
  <div class="container" style="    
    top: 2%;
    width: 98%;
    height: 112%;
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
          <li class="active"><a href="add-product.php">Add Product</a></li>
          <li><a href="products.php">Products</a></li>
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


  <header></header>

    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Add Product</h4>
                </div>
                <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0">Select Category</label>
                                    <select name="category_id" class="form-select mb-2" >
                                        <option selected>Select Category</option>
                                        <?php 
                                            $categories = getAll("categories");

                                            if(mysqli_num_rows($categories) > 0)
                                            {
                                                foreach ($categories as $item) {
                                                    ?>
                                                        <option class="form-control" value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No category available";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Name</label>
                                    <input type="text" autocomplete="false" required name="name" placeholder="Enter Product Name" class="form-control mb-2">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Slug</label>
                                    <input type="text" autocomplete="false" required name="slug" placeholder="Enter slug" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Small Description</label>
                                    <textarea rows="3" autocomplete="false" required name="small_description" placeholder="Enter small description" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Description</label>
                                    <textarea rows="3" autocomplete="false" required name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Original Price</label>
                                    <input type="text" autocomplete="false" required name="original_price" placeholder="Enter Original Price" class="form-control mb-2">
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Selling Price</label>
                                    <input type="text" autocomplete="false" required name="selling_price" placeholder="Selling Price" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Upload Image</label>
                                    <input type="file" autocomplete="false" required name="image" class="form-control mb-2">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-0">Quantity</label>
                                        <input type="number" autocomplete="false" required name="qty" placeholder="Enter Quantity" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Status</label> <br>
                                        <input type="checkbox" autocomplete="false" name="status">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Trending</label> <br>
                                        <input type="checkbox" autocomplete="false" name="trending">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Title</label>
                                    <input type="text" autocomplete="false" required name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Description</label>
                                    <textarea rows="3" autocomplete="false" required name="meta_description" placeholder="Enter meta description" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Meta Keywords</label>
                                    <textarea rows="3" autocomplete="false" required name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2"></textarea>
                                </div>
                            
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                                
                                    <a href="products.php" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                                
                                    
                            </div>
                        </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>     





</body>
</html>

