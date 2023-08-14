<?php
include('connect_i.php');

require_once('pm_check.php');
$connect = mysqli_connect("localhost","root","","market")or die("cannot connect");


$sql="SELECT * FROM  pm_outbox WHERE userid='$pid' ORDER by id DESC";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);


?>
<head>
<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="password-strength-indicator.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Outbox</title>
</head>
<div>
<h3 style="text-align:center;">Outbox</h3>
<body>

<table width="800" border="o" style="width:100%; position:absolute; top:30%;">
<form action="pm_outbox.php" method="post" name="form1">
<tr>
<td width="41"></td>
<td width="490">TItle:</td>
<td width="255">from:</td>

</tr>
</div>
<?php 
while($rows=mysqli_fetch_array($result)){
?>

<tr>
<!-- <td width="41" align="center"></td> -->
<td><input type="checkbox" name="checkbox[]" id="checkbox[]"  value="<?php echo $rows['id']; ?>"/> </td>
<td  width="490"><a href="pm_view_out.php?out=<?php echo $rows['id'];?>"><b><?php echo $rows['title'];?></b></a>
<td width="225"><?php echo $rows['to_username'];?></td>

<?php } ?>
</div>
</tr>

  <td colspan="3" align="center">
    <?php if($outboxMessages>0){?>
<input type="submit" name="delete" id="delete" value="Delete Selected Message"/>
<?php } else { echo "There is no message in your outbox";}?></td>
</tr>
 

</form>

<?php
 
 if(isset($_POST['delete'])){
 $checkbox=$_POST['checkbox'];
 $delete=$_POST['delete'];
 if($delete){
 for($i=0; $i<$count; $i++){
 $del_id=$checkbox[$i];
 
 $sql="delete from pm_outbox where id='$del_id'";
 $result=mysqli_query($connect,$sql);
 }
  
 if($result){
 echo  "<meta http-equiv=\"refresh\"content=\"0;URL=pm_outbox.php\">";
 }
 }mysqli_close($connect);
 } 
 else{
 }
 
 
 ?>
 </div>
 </body>
 </html>