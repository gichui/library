<?php 
include"conection.php";
$sql = 'CREATE DATABASE libraly';
$check = mysqli_query( $con1,$sql  );
if ($check) {
	$file_handle = fopen("c:/Program Files/time.csv", "w");
					$date=time()+(60*60*24*7);
					$list=($date);
					
					fwrite($file_handle, $date);
					fclose($file_handle);
	# code...
}

$login = "CREATE TABLE login( ".
"id INT NOT NULL AUTO_INCREMENT, ".
"username VARCHAR(11) NOT NULL, ".
"password VARCHAR(40) NOT NULL, ".
						
"PRIMARY KEY ( id )); ";
				
$loginTB = mysqli_query( $con,$login);
if (!$loginTB) 
{
	$error="";
# code...
}
else
{
	$error="table created";


	$ad = "INSERT INTO login ".
	"(username,password) "."VALUES "."('admn','1234')";
		$add=mysqli_query($con,$ad);

	if (!$add) 
	{
		$error="admin acount not set";
# code...
	}
	else
	{
		$error="admn account created pass is 12348";
	}

}

$add_borrow = "CREATE TABLE BORROW( ".
"id INT NOT NULL AUTO_INCREMENT, ".
"ID_NO VARCHAR(50) NOT NULL , ".
"F_NAME VARCHAR(40) NOT NULL , ".
"L_NAME VARCHAR(40) NOT NULL , ".
"Book_id VARCHAR(40) NOT NULL , ".
"title VARCHAR(60) NOT NULL , ".
"phone VARCHAR(40) NOT NULL , ".
"return_date INT(100) NOT NULL , ".
"AGENT VARCHAR(40) NOT NULL , ".
"author VARCHAR(40) NOT NULL , ".
"PRIMARY KEY ( id )); ";
mysql_select_db( 'libraly' );
$ask = mysqli_query(  $con,$add_borrow );


$add_per = "CREATE TABLE per_ifo( ".
"id INT NOT NULL AUTO_INCREMENT, ".
"ID_NO VARCHAR(50) NOT NULL , ".
"F_NAME VARCHAR(40) NOT NULL , ".
"L_NAME VARCHAR(40) NOT NULL , ".
"phone INT(11) NOT NULL , ".
"AGENT VARCHAR(60) NOT NULL , ".

"PRIMARY KEY ( id )); ";
mysql_select_db( 'libraly' );
$ask1 = mysqli_query(  $con,$add_per );

$sql = "CREATE TABLE bookshop( ".
"id INT NOT NULL AUTO_INCREMENT, ".
"Book_id VARCHAR(10) NOT NULL, ".
"Title VARCHAR(40) NOT NULL, ".
"author VARCHAR(50) NOT NULL, ".
"PRIMARY KEY ( id )); ";
mysql_select_db( 'libraly' );
$retval = mysqli_query($con, $sql);

?>