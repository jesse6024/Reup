<?php

require_once("connect_i.php");
$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");
$sql="SELECT id,username from register where username='".$_SESSION['username']."'";
$query=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($query)){
$pid=$row['id'];
$username=$row['username'];
}

// check for New Message

$sqlCommand="SELECT count(id) as numbers from pm_imbox where userid='$pid' and viewed='0'" ;
$query=mysqli_query($connect,$sqlCommand);
$result=mysqli_fetch_assoc($query);

$inboxMessagesNew=$result['numbers'];

//check for all Message in the in box;

$sqlCommand="select count(id) as numbers from pm_imbox where userid='$pid'" ;
$query=mysqli_query($connect,$sqlCommand);
$result=mysqli_fetch_assoc($query);

$inboxMessagesTotal=$result['numbers'];

//outbox message
$sqlCommand="select count(id) as numbers from pm_outbox where userid='$pid'" ;
$query=mysqli_query($connect,$sqlCommand);
$result=mysqli_fetch_assoc($query);

$outboxMessages=$result['numbers'];

?>


<?php // if ($_SESSION['username']){?>
<body style="width:100%;">
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="width: 100%;">
  <div class="container" style="    
    position: absolute;
    height: 100%;
    width: 100%;
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
        <li><a href="add-product.php">Add Products</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="categories.php"> Show Categories</a></li>
          <li><a href="add-category.php">Add Category</a></li>
          <li><a href="category.php">All Category</a></li>
          <li><a href="edit-category.php">Edit Category</a></li>
          <li class="active"><a href="pm_check.php">Messages</a></li>
          <li><a href="chat-index-page.php">Chat</a></li>
          <li> <a href="register.php">Register</a></li>
          <li><a href="logout.php">Log Out</a></li>
        <div style="position: absolute;
    display: inline-block;
    right: 2%;">
          <?php include("bitcoin-ticker.php"); ?>

        </div>
      </div>
    </nav>

     <h1 style="text-align:center;">Messages</h1>
    <div class="container" 
style="position:absolute; top:25%; text-align:center; left:20%;">
<p>You are currently logged in as, &nbsp;&nbsp;<?php  echo $username; ?></p>
Private Messaging System:<a href="pm_inbox.php">Inbox</a>
<?php if($inboxMessagesNew > 0) {   
    print "<b><font color='red'>(".$inboxMessagesNew.")</font></b>";
}else{

}
?>
<?php print " Total: ".$inboxMessagesTotal;?>| <a href="pm_outbox.php">Outbox</a><?php print " Total: ".$outboxMessages;?>|<a href="pm_send.php">Send New Message</a>|<a href="logOut.php">logOut</a><?php //}	else{ print "You must be logged in first";}?>
</div>

</body>
</html>