<?php
//include('connect_i.php');

require_once('pm_check.php');
$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");
$query=mysqli_query($connect,$sql);
 



$sql="SELECT * FROM  pm_imbox WHERE userid='$pid' ORDER by id DESC";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);


?>
<head>
 <title>Inbox</title> 
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <div style="text-align:center;">
  
    <h3 style="text-align:center;">Inbox</h3>
<table width="800" border="1" style=    
"   
    width: 100%;
    position: absolute;
    top: 325px;
    ">

<form action="pm_inbox.php" method="post" name="form1">
<tr>
<td width="41"></td>
<td width="255">TItle:</td>
<td width="255">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from:</td>
<td width="255">Message:</td>
<td width="255">Receive Date:</td>

</tr>
</div>
<?php 
while($rows=mysqli_fetch_array($result)){
?>
<?php if($rows['viewed']==0){//show message in bold ?>
<tr>
<td width="41"style= text-align:center;> <input type="checkbox" name="checkbox[]"  id="checkbox[]" value="<?php echo $rows['id']; ?>"></td>
<td  width="200"><a href="pm_view_in.php?in=<?php echo $rows['id'];?>"><b><?php echo $rows['title'];?></b></a></td> 
<td width="200"><?php echo $rows['from_username'];?></td><td> <?php echo $rows['content'];?></td><td> <?php echo $rows['recieve_date'];?></td>
</tr>

<?php   //Donotn show message in bold if it is viewed ,So remove <b>    ?>

<?php } else if($rows['viewed']==1){?>
<tr>
<td width="41" style= text-align:center;> <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php  echo $rows['id']; ?>"></td>
<td  width="260"><a href="pm_view_in.php?in=<?php echo $rows['id'];?>"><?php echo $rows['title'];?></a></td>
<td width="260"><?php echo $rows['from_username'];?></td><td> <?php echo $rows['content'];?></td>
</tr>

<?php } ?>
<?php } ?>
 <td colspan="3" align="center">
</tr>
<input type="submit" name="delete" id="delete" value="Delete Message" style="position:absolute; margin-top:40%; right:10%">
</form>

</table>
<?php
 
if(isset($_POST['delete'])){
$checkbox = $_POST['checkbox'];
$delete = $_POST['delete'];
if($delete){
for($i=0; $i<$count; $i++){
$del_id=$checkbox[$i];

$sql="delete from pm_imbox where id='$del_id'";
$result=mysqli_query($connect,$sql);
}
 
if($result){
 echo  "<meta http-equiv=\"refresh\"content=\"0;URL=pm_inbox.php\">";
}
}mysqli_close($connect);
} 
else{
}


?>

</div> 
</body>
</html>