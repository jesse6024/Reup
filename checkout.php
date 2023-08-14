<?php 

include('userfunctions.php');

$cartItems = getCartItems();

if(mysqli_num_rows($cartItems) == 0)
{
    header('Location: index.php');
}

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


<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold ">Name</label>
                                    <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold ">E-mail</label>
                                    <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                                    <small class="text-danger email"></small>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold ">Phone</label>
                                    <input type="text" name="phone" id="phone" required placeholder="Enter your phone number" class="form-control">
                                    <small class="text-danger phone"></small>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold ">Pin Code</label>
                                    <input type="text" name="pincode" id="pincode" required placeholder="Enter your pin code" class="form-control">
                                    <small class="text-danger pincode"></small>

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold ">Address</label>
                                    <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                    <small class="text-danger address"></small>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                                <?php $items = getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem) 
                                {
                                    ?>
                                    <div class="mb-1 border">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                            </div>
                                            <div class="col-md-5">
                                                <label><?= $citem['name'] ?></label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>$<?= $citem['selling_price'] ?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>x <?= $citem['prod_qty'] ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                                ?>
                                <hr>
                            <h5>Total Price : <span class="float-end fw-bold">$ <?= $totalPrice ?> </span> </h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">Confirm and place order | COD</button>
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php //include('includes/footer.php'); ?>

<!-- Replace "YOUR_CLIENT_ID_HERE" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=<YOUR_CLIENT_ID_HERE>&currency=USD"></script>

<script>

    paypal.Buttons({
        onClick(){
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address = $('#address').val();
            
            if(name.length == 0)
            {
                $('.name').text("*This field is required");
            }else{
                $('.name').text("");
            }
            if(email.length == 0)
            {
                $('.email').text("*This field is required");
            }else{
                $('.email').text("");
            }
            if(phone.length == 0)
            {
                $('.phone').text("*This field is required");
            }else{
                $('.phone').text("");
            }
            if(pincode.length == 0)
            {
                $('.pincode').text("*This field is required");
            }else{
                $('.pincode').text("");
            }
            if(address.length == 0)
            {
                $('.address').text("*This field is required");
            }else{
                $('.address').text("");
            }

            if(name.length == 0 || email.length == 0 || phone.length == 0|| pincode.length == 0|| address.length == 0)
            {
                return false;
            }
        },
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {

            return actions.order.create({
            purchase_units: [{
                amount: {
                value: '0.1'//'<?= $totalPrice ?>' // Can also reference a variable or function
                }
            }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            const transaction = orderData.purchase_units[0].payments.captures[0];

            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address = $('#address').val();

            var data = {
                'name': name,
                'email': email,
                'phone': phone,
                'pincode': pincode,
                'address': address,
                'payment_mode': "Paid by PayPal",
                'payment_id': transaction.id,
                'placeOrderBtn': true
            };

            $.ajax({
                method: "POST",
                url: "functions/placeorder.php",
                data: data,
                success: function (response) {
                    if(response == 201)
                    {
                        alertify.success("Order Placed Successfully");
                        // actions.redirect('my-orders.php');

                        window.location.href = 'my-orders.php';
                    }
                }
            });
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
</script>
