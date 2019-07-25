
<?php include"home.php"?>
<?php include"conection.php"?>
<!DOCTYPE html>
<html>
<head>
	<title>regestration</title>
</head>
<body>
	<form action="regester.php" method="POST">
		<table align="center" style="width: 80%">
			<th>regestration</th>
			<tr>
				<td colspan="2" align="center" style="color: red">

					
					<?php 
					$ERROR="";
					$USER=$_SESSION['username'];
					if (isset($_POST['id_no']) &&isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']))

					 {
					 	$id_no=$_POST['id_no'];
					 	$F_NAME=$_POST['first_name'];
					 	$L_NAME=$_POST['last_name'];
					 	$phone=$_POST['phone'];
					 	$query1="SELECT * FROM per_ifo WHERE ID_NO='$id_no'";
					 	$CREATE=mysqli_query($con,$query1);
					 	if (mysqli_num_rows($CREATE)==0) 
					 	{
					 		$ERROR="MEMBER REGEISTERED";

					 		$query2="INSERT INTO per_ifo (ID_NO,F_NAME,L_NAME,phone,AGENT) values('$id_no','$F_NAME','$L_NAME','$phone','$USER')";


							$reg=mysqli_query($con,$query2);

					 	}
					 	else{
					 		$ERROR="USER EXIST";
					 	}
					 	
						# code...
					 }
					 else{
					 	$ERROR="";
					 }


					 echo $ERROR;


					?>
				</td>
			</tr>
			<tr>
				<td>
					<label>ID NUMBER</label>
				</td>
				<td>
					<label>FIRST NAME</label>
				</td>
				<td>
					<label>LAST NAME</label>
				</td>
				<td>
					<label>PHONE NUMBER</label>
				</td>
			</tr>
			<tr >
				<td>
					<input type="nuumber" name="id_no" required>
				</td>
				<td>
					<input type="text" name="first_name"required>
				</td>
				<td>
					<input type="text" name="last_name" required>
				</td>
				
				<td>
					<input type="nuumbers " name="phone" required>
				</td>

		
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="right" colspan="3">
					<input type="submit" name="submit">
				</td>
			</tr>
		</table>
	
	</form<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>	
</body>
</html>