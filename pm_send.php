<?php
//include("connect_i.php");
include("db.php");
$con = mysqli_connect("localhost","root","","market")or die("cannot connect");
$sql="select id,user from users where showing='1'";
$result=mysqli_query($con,$sql);

$options="";

while($row=mysqli_fetch_array($result)){
$USERid=$row['id'];
$USERname=$row['username'];
$options.="<OPTION VALUE=\"$USERid\">".$USERname."</OPTION>";
}
?>
<?php
$username=$_SESSION['username'];

?>
<head>
<meta charset="utf-8">
  <title>Send Message</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  

</head>
<body style="height:100%; width:100%;">
<div style= "width:100%; position:absolute; top:1%;">
<h1> REUP MARKET</h1>
   <!--<h5>Dashboard</h5>-->
   <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="homepage.php">REUP MARKET</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="homepage.php">Home</a></li>
          <li><a href="vendor.php">Vendor</a></li>
          <li class="active"><a href="pm_check.php">Messages</a></li>
          <li><a href="chat-index-page.php">Chat</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
        <div style="float:right;">
          <?php include("bitcoin-ticker.php"); ?>

        </div>
      </div>
    </nav>

  </div>
<table width="800" border="0">

</table>
<table width="800" border="1">
</div>
</table>
<p style="position:absolute; top: 178px;left: 375px;">You are currently logged in as, &nbsp;&nbsp;<?php  echo $username; ?></p>
<h2></h2>
<form style="position:absolute;" action="pm_send_to.php" id="form" method="post" onSubmit="return validate_form();">
<tr>
<input style="margin-top:200px; margin-left: 400px; width: 60%;" type="text" id="to_username" name="to_username" placeholder="Send message to..."></label><br><br>

</OPTION></select></td>
</tr>
<tr> <td colspan="2"><input type="submit" style="color:white; background-color:#1a6cdd;position:absolute; right: -160px;" id="submit" value="Select User"/></td>
</tr>
</div>
</form>
</table>
</body>
</html>








