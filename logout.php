<?php 
session_start();

session_unset();
session_destroy();
$location="index.php";
header( "Location:$location" );
exit();
?>