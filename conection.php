<?php 
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$database="libraly";

$con1=mysqli_connect($dbhost,$dbuser,$dbpassword);
if (!$con1) 
{
	$con=mysqli_connect($con1,$database);
}
else{
	$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$database);
	

}
?>