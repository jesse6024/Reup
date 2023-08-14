<?php 
include('alertify.php');
include('db.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0' ;
    $popular = isset($_POST['popular']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO categories 
    (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image) 
    VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$status','$popular','$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        //need alertify replacement code instead of redirect
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.success('Category Added Successfully');
            });
        </script>
        <?php
        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        // redirect("cat-succesful.php", "");
    }
    else
    {
        // redirect("add-category.php", "Something Went Wrong");
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.error('Something Went Wrong');
            });
        </script>
        <?php
    }
    
}
?>
<head>
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Add Category</title>
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
         <li><a href="categories.php">Show Categories</a></li>
         <li class="active"><a href="add-category.php">Add Category</a></li>
         <li><a href="category.php">All Categories</a></li>
         <li><a href="edit-category.php">Edit Category</a></li>
         <li><a href="pm_check.php">Messages</a></li>
         <li><a href="chat-index-page.php">Chat</a></li>
         <li> <a href="register.php">Register</a></li>
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
                   <h4 class="text-white">Add Category</h4>
               </div>
               <div class="card-body">
                    <form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" autocomplete="off" required name="name" placeholder="Enter Category Name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" autocomplete="off" required name="slug" placeholder="Enter slug" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" autocomplete="off" required name="description" placeholder="Enter description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Upload Image</label>
                                <input type="file" autocomplete="off" required name="image" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Title</label>
                                <input type="text" autocomplete="off" required name="meta_title" placeholder="Enter meta title" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea rows="3" autocomplete="off" required name="meta_description" placeholder="Enter meta description" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea rows="3" autocomplete="off" required name="meta_keywords" placeholder="Enter meta keywords" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <input type="checkbox" autocomplete="offt" name="status">
                            </div>
                            <div class="col-md-6">
                                <label for="">Popular</label>
                                <input type="checkbox" autocomplete="false" name="popular">
                            </div>
                            <div class="col-md-12">
                                
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
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
  