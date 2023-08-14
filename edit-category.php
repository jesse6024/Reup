<?php 

include('adminMiddleware.php'); 

include('myfunctions.php');

include('alertify.php');
include('db.php');

if(isset($_POST['update_category_btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0' ;
    $popular = isset($_POST['popular']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "uploads";

    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description', 
    meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', 
    status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id' ";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("uploads".$old_image))
            {
                unlink("uploads".$old_image);
            }
        }
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.success('Category Edited Successfully');
            });
        </script>
        <?php
        // echo '<script>alert("Edited Category Successfully")</script>';
        // redirect("edit-cat-successful.php", "");
       
    }
    else
    {
        redirect("edit-category.php?id=$category_id", "Something Went wrong");
    }

}


?>
 <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <li><a href="add-category.php">Add Category</a></li>
          <li><a href="add-product.php">Add Product</a></li>
          <li><a href="categories.php"> Show Categories</a></li>
          <li><a href="category.php">Categories</a></li>
          <li class="active"><a href="edit-category.php">Edit Category</a></li>
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
           <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $category = getByID("categories", $id);

                if(mysqli_num_rows($category) > 0)
                {
                    $data = mysqli_fetch_array($category);
                    ?>
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h4 class="text-white">Edit Category
                                    <a href="category.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Category Name" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Slug</label>
                                                <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter slug" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Description</label>
                                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control"><?= $data['description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Upload Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <label for="">Current Image</label>
                                                <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                                <img src="uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Title</label>
                                                <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" placeholder="Enter meta title" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Description</label>
                                                <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control"><?= $data['meta_description'] ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Meta Keywords</label>
                                                <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Status</label>
                                                <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Popular</label>
                                                <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    <?php
                  
                }
                else
                {
                    echo "Category not found";
                }
            }
            else
            {
                echo "Id missing from url";
            } 

            
                ?>
                </div>
       </div>
    </div>
</div>

