<?php 
include('connect_i.php');

$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");
$testString = "";
  
if(!$_GET['out']){
$pageid2='1';
}
else{
$pageid2 = preg_replace("[^0-9]","",$_GET['out']);
}

$sql="SELECT id,username from register where username='".$_SESSION['username']."'";

$query=mysqli_query($connect,$sql);

while($row=mysqli_fetch_array($query)){
$pid=$row['id'];
$username=$row['username'];
}
//mysql_free_result($query);




$sql="SELECT id, userid, to_userid, to_username, title, content, senddate from pm_outbox where id='$pageid2' AND username='$username'";
$query=mysqli_query($connect,$sql);
while($row=mysqli_fetch_array($query)){
$Hid=$row['id'];
$Huserid=$row['userid'];
$Hfrom_id=$row['to_userid'];
$Hfrom_username=$row['to_username'];
$Htitle=$row['title'];
$Hcontent=$row["content"];
$Hrecievedata=$row['senddate'];

}
//mysql_free_result($query);
$query=mysqli_query($connect, "UPDATE pm_imbox set viewed='1' where id='$pageid2'");

?>
<html>
  <head>
    <title>Outbox</title>
  </head>
<body>
<div class="container" style="    
    top: 0%;
    width: 98%;
    height: 100%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    position:absolute;">


   

 

<td><?php require_once("pm_check.php");?></td>
<table width="800" border="0" style="background-color:white; position:absolute; margin-top: 10%; margin-left: 40%;">
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
<td><?php print $Hcontent ?></td>

</tr>




</table>
</div>
</body>
</html>







