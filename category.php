<?php
include('alertify.php');
include('db.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con,$query);
}

function redirect($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();
}

if(isset($_POST['delete_category_btn']))
{
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run)
    {
        
        if(file_exists("uploads".$image))
        {
            unlink("uploads".$image);
        }
        ?>
        <script>
            $(document).ready(function () {
                
                alertify.set('notifier','position', 'top-right');
                alertify.success('Category deleted Successfully');
            });
        </script>
        <?php
        // redirect("category.php", "Category deleted Successfully");
        // echo '<p>Category Deleted Successfully</p>';
        // echo '<a href="category.php">Back</a>';
    }
    else{
        // redirect("category.php", "Something went wrong");
        echo 500;
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

?>
<html>
<head>
  <meta charset="utf-8">
  <title>All Categories</title>
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
    height: 300%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);">


    <h1 style="/*margin-left:700px;*/ text-align:center;">REUP MARKET</h1>
   
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
          <li class="active"><a href="category.php"> All Categories</a></li>
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
   
  <header></header>
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white"> Categories</h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0)
                                {
                                    foreach($category as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['name']; ?></td>
                                                <td>
                                                    <img src="uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td> 
                                                    <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                                                </td>
                                               
                                                <td>
                                                    <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                        <button type="submit" onclick="confirm('Are you sure to delete this?')" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                    </form> 
                                                  

                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }
                            ?>
                           
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</tbody>
</table>
</div>
</div>
</div>
</div>
                            </div>
</body>
</html>