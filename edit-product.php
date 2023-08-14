<?php 
include("myfunctions.php");


include('alertify.php');
include('db.php');

if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    //$meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0' ;
    $trending = isset($_POST['trending']) ? '1':'0';

    $path = "uploads";

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

    $update_product_query = "UPDATE products SET category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='$meta_title',
        meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_filename' WHERE id='$product_id' ";
    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("uploads".$old_image))
            {
                unlink("uploads".$old_image);
            }
        }
        //redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
        // alertify replacement code
        // echo '<p>Product Updated Successfully</p>';
        // echo '<a href="products.php">Back</a>';
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.success('Product Updated Successfully');
            });
        </script>
        <?php
    }
    else
    {
        redirect("edit-product.php?id=$product_id", "Something Went wrong");
    }
}

?>
<head>
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Edit Product</title>
</head>
<body style="width: 100%;">
  <div class="container" style="    
    top: 2%;
    width: 98%;
    height: 100%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);">

<div class="container">
    <div class="row">
       <div class="col-md-12">
           <?php 
                if(isset($_GET['id']))
                {

                    $id = $_GET['id'];

                    $product = getByID("products",$id);

                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        
                        ?>
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h4 class="text-white">Edit Product
                                        <a href="products.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
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
                                                                        <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
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
                                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Name</label>
                                                    <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Slug</label>
                                                    <input type="text" required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Small Description</label>
                                                    <textarea rows="3" required name="small_description" placeholder="Enter small description" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Description</label>
                                                    <textarea rows="3" required name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Original Price</label>
                                                    <input type="text" required name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter Original Price" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Selling Price</label>
                                                    <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Selling Price" class="form-control mb-2">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                    <input type="file" name="image" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="mb-0">Quantity</label>
                                                        <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity" class="form-control mb-2">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="mb-0">Status</label> <br>
                                                        <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="mb-0">Trending</label> <br>
                                                        <input type="checkbox" name="trending" <?= $data['trending'] == '0'?'':'checked' ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Meta Title</label>
                                                    <input type="text" required name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control mb-2">
                                                </div>
                                             <!--<div class="col-md-12">
                                                    <label class="mb-0">Meta Description</label>
                                                    <textarea rows="3" required name="meta_description" placeholder="Enter meta description" class="form-control mb-2"><?= $data['meta_description']; ?></textarea>
                                                </div>-->
                                            <div class="col-md-12">
                                                    <label class="mb-0">Meta Keywords</label>
                                                    <textarea rows="3" required name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                                                </div>
                                            
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        <?php 
                    }
                    else
                    {
                        echo "Product Not found for given id";
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
            </body>
            </html>
