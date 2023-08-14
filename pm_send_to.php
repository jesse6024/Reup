<?php
include('connect_i.php');
require_once("pm_check.php");
$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");
//logedin person info
$sql="SELECT id,username from register where username='".$_SESSION['username']."'";
$query=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($query)){
  $pid=$row['id'];
  $username=$row['username'];
}

if (isset($_POST['to_username'])) {

  mysqli_free_result($query);
  //to send message to particular user because threre is no $_SESSION['username']
  $to_username=$_POST['to_username'];
  $sqlCommand="SELECT id,username from register where username='$to_username' limit 1";
  $query=mysqli_query($connect,$sqlCommand);
  
  while($row=mysqli_fetch_array($query)){
    $TOid=$row['id'];
    $TOuser=$row['username'];
  }
  
  mysqli_free_result($query);
}
?>
<html>
  <head>
  <meta charset="utf-8">
  <title>Send Message</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
</html>
<body>
<table width="800" border="0">
<tr>
<th style="text-align:center; position:absolute; left:45%;"><h1>Send Message</h1></th>
<td></td>

</tr>
</table>

<table width="800" border="0" style="position: absolute; top: 20;"><?php ?></td>
</tr>
</tr>
</table>

<table width="800" border="0" style="position: absolute; top: 35%; z-index: 5; text-align:center; left:30%;">

<form action="pm_send_to.php" method="post">

<tr>

<td width="185">SENDING TO:</td>
<td width="805"><input name="to_username" type="text" id="to_username" readonly="readonly" value="<?php  print $TOuser ?>" size="140" style="border: hidden;"/>
</td>
</tr>
<tr>
<td width="185" style="display:inline-block">Title:</td>
<td width="605"><input name="title"  type="text" id="title" size="40" style="border:1px solid orange; width:58%;"/></td>
</tr>


<tr>
<td width="185">Message:</td>
<td width="605"><textarea name="message" style="width:60%; border:1px solid orange;"  cols="20" rows="10"></textarea></td></tr>


<tr>
<td colspan="2" align="center"><input type="submit" name="submit" id="submit" style="    margin-left: -362px; color: white; background-color: #14a1ed;"  value="Send"/>
<input name="to_userid" type="hidden" id="to_userid" value="<?php print $TOid;?>"/>
<input name="userid" type="hidden" id="userid" value="<?php print $pid ;?>"/>
<input name="from_username" type="hidden" id="from_username" value="<?php print $username;?>"/> 
<input name="senddate" type="hidden" id="sender" value="<?php echo date("l,jS F Y,g:i:s:a"); ?>"/></td>
</tr>

<?php
//require_once"connect_i.php";
if(isset($_POST['submit'])){
$to_username=$_POST['to_username'];
$title=$_POST['title'];
$message=$_POST['message'];
$to_userid=$_POST['to_userid'];
$userid=$_POST['userid'];
$from_username=$_POST['from_username'];
$senddate=$_POST['senddate'];

//special character fix
//this function allows user to send message characters like ?,/,#,$,%,& etc.if this function from 78line to 86 not used then user cannot send
//such  caracters.
function filterFunction($var){
$var=nl2br(htmlspecialchars($var));
//$var=eregi_replace("'","&#39;",($var));

//$var=eregi_replace("'","$#39;",($var));
return $var;
}

$message=filterFunction($message);// this $message from line number 70

require_once("connect_i.php");

$query=mysqli_query($connect,"insert into pm_outbox(userid,username,to_userid,to_username,title,content,senddate)values('$userid','$from_username','$to_userid','$to_username','$title','$message','$senddate')");


$query=mysqli_query($connect,"insert into pm_imbox(userid,username,from_id,from_username,title,content,recieve_date)values('$to_userid','to_username','$userid','$from_username','$title','$message','$senddate')");

  echo "<meta http-equiv=\"refresh\"content=\"0;URL=pm_outbox.php\">";
  exit();
}

?>
</body>
</html>