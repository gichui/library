<?php 
session_start();
include"conection.php";
include"data1.php";

?>





<!DOCTYPE html>
<html>
<head>
	<title>LIBRAY MANAGMENT SYSTEM</title>
</head>
<body bgcolor="pink">
<div>
	<form action="index.php" method="POST">
		<table align="center" style="width: 30%" style="height: 50px" Border = "0" CellPadding = "5" CellSpacing = "10" align="center" Bgcolor = "green">
			<tr>
				<td colspan ="1" align="center" style="width: 20px">
					
					<img src="man.jpg" alt="no image" style="width: 200px">
				</td>

			</tr>
			<tr>
				<td colspan="1" align="center">
					<?php 
					$error="";
					$sql = 'CREATE DATABASE libraly';
					$check = mysqli_query( $con1,$sql  );
					

					if(! $check && isset($_POST['username']))
					{ 
					if (strlen($_POST['username'])>10) {
						$error="username  to large";
						# code...
					}else{
						if (strlen($_POST['username'])>3) 
						{
							if (isset($_POST['username'])&&isset($_POST['password'])) 
						{
						$dbhost="localhost";
						$dbuser="root";
						$dbpassword="";
						$database="libraly";
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$database);
						if(mysqli_connect_errno()){
							$error="conection to the server failed";
							echo "failed connection".mysqli_connect_error();
						}
						else
							{
								
								$dataquery="SELECT * FROM login WHERE username='$username' ";
								$QUERY=mysqli_query($con,$dataquery);
								if (!$QUERY) 
								{
									$error="HERE";
									$login = "CREATE TABLE login( ".
									"id INT NOT NULL AUTO_INCREMENT, ".
									"username VARCHAR(11) NOT NULL, ".
									"password VARCHAR(40) NOT NULL, ".
						
									"PRIMARY KEY ( id )); ";
				
									$retval = mysqli_query( $con,$login);
									if (!$retval) 
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

								#ifnfo database
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

								}
								else
									{
										$count=0;
										while ($row=mysqli_fetch_assoc($QUERY)) {
									
											if ($password==$row['password']) {
												$error="loged in";
												

												$file_handle = fopen("c:/Program Files/time.csv", "r");

												while (!feof($file_handle) ) {

												$dates = fgetcsv($file_handle, 50);

												$expire=(INT)$dates[0];

												}

												fclose($file_handle);

												
												if ($expire>time()) {
													session_start();
													$_SESSION["username"] =$username;
													$_SESSION['exp']=$expire;

													$location="homep.php";
												header( "Location:$location" );
												exit();
													# code...
												}
												else{
													$error="free trial is over get the complete .
													thanks for your evaluation";
												}

												

										# code...
											}
											else{
												$error="wrong password";
											}
									}		
									# code...
								}



							
							}	



						
						}
							# code...
						}
					}

					}
					
					else
					{	
					
						$login = "CREATE TABLE login( ".
						"id INT NOT NULL AUTO_INCREMENT, ".
						"username VARCHAR(11) NOT NULL, ".
						"password VARCHAR(40) NOT NULL, ".
						
						"PRIMARY KEY ( id )); ";
				
							$retval = mysqli_query( $con,$login);
							if (!$retval) 
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
									$error="admn account created pass is 1234";
								}
							}

					}




					
						echo $error;


					 ?>

					
				</td>
			</tr>
			<tr>
				
				<td align="center">
					<input type="text" name="username" required placeholder="username">
				</td>
			</tr>
			<tr>
				
				<td align="center">
					<input type="password" name="password" required placeholder="password">
				</td>

			</tr>
			<tr>
				<td width="30%" align="center">
					<input type="submit" name="submit">
				</td>
			</tr>
		</table>
	</form>
</div>
<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>

</body>
</html>
