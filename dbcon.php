<?
$host = "localhost";
$username = "root";
$password = "";
$database = "market";

// creating database connection
$con = mysqli_connect($host,$username,$passsword,$database);

//Check database connection
if($con)
{
    die("Connection Failed ". mysqli_connect_error());
}

?>
