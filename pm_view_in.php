<?php 
include('connect_i.php');
$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");
$testString = "";
  
if(!$_GET['in']){
$pageid2='1';
}
else{
$pageid2 = preg_replace("[^0-9]","",$_GET['in']);

}

$sql="SELECT id,username from register where username='".$_SESSION['username']."'";
$query=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($query)){
$pid=$row['id'];
$username=$row['username'];

}
//mysql_free_result($query);




$sql="SELECT id,userid,from_id,from_username,title ,content,recieve_date from pm_imbox where id='$pageid2' AND userid='$pid'";
$query=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($query)){
$Hid=$row['id'];
$Huserid=$row['userid'];
$Hfrom_id=$row['from_id'];
$Hfrom_username=$row['from_username'];
$Htitle=$row['title'];
$Hcontent=$row["content"];
$Hrecievedata=$row['recieve_date'];

}
//mysql_free_result($query);
$query=mysqli_query($connect, "update pm_imbox set viewed='1' where id='$pageid2'");

?>
<head>
<meta charset="utf-8">
  <title>Inbox Messages</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
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
          <li><a href="add-category.php">Add Category</a></li>
          <li><a href="category.php">All Categories</a></li>
          <li><a href="edit-category.php">Edit Category</a></li>
          <li class="active"><a href="pm_check.php">Messages</a></li>
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
<table width="800" border="0" style="position:absolute; top:350px;">

<div class="container" style="    
    display: inline-block;
    position: absolute;
    top: 151px;
    width: 50%;">
 <h3>Inbox Messages</h3>
 <p style="    position: absolute; top: 178px; left:200px;">You are currently logged in as, &nbsp;&nbsp;<?php  echo $username; ?></p>
Private Messaging System:<a href="pm_inbox.php">Inbox</a>
 Total: 1| <a href="pm_outbox.php">Outbox</a> Total: 1|<a href="pm_send.php">Send New Message</a>|<a href="outlog.php">logOut</a></div>
<tr>
<td width="185">Message Subject:</td>
<td><?php echo $Htitle;   ?></td>

</tr>
<tr>
<td width="185">Message From:</td>
<td><?php print $Hfrom_username ?></td>
</tr>

<tr>
<td width="185">Date Recieved:</td>
<td><?php print $Hrecievedata  ?></td>
</tr>

<tr>
<td width="185">Message Content:</td>
<textarea rows="4" cols="50" readonly style="height:118px; position:absolute; top:48%; left: 20%;"
><?php print $Hcontent ?></textarea>

</tr>
<a href="pm_send.php" style="z-index:6;"><input type="submit" name="submit" id="submit" style="z-index:3; margin-left: 400px; position:absolute; top:1000px; color: white; background-color: #14a1ed;" value="Reply"></a>

</div>

</table>
</body>
</html>







