<?php include"home.php"?>
<?php include"conection.php"?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="login.jpg">
	<table align="center" width="20%">
		<tr>
				<td align="center">
					
					<?php 
					$message="";

					if (isset($_POST['name'])) 
					{


						if ($_SESSION['username']!="admn") 
						{
							$message="cant register agent when not not admin";
							# code...
						}
						else
						{
							$user=$_POST['name'];
							$pass="1234";
							$get="SELECT * from login where username='$user'";
							$qq=mysqli_query($con,$get);
							if (!$qq)
							 {
							 	$message="cant conect to database";
								# code...
							}

							else
							{
								
								if (mysqli_num_rows($qq)<1) 
								{
									$message="done";
									$add="INSERT INTO login (username,password) values('$user','$pass')";
									$add1=mysqli_query($con,$add);
									if (!$add1) {
										$message="AGENT NOT ADDED";
										# code...
									}
									else
									{
										$message="AGENT ACCOUNT CREATED";
									}
									# code...
								}
								else
								{
									$message="agent name used";
								}
							}
						}

						# code...
					}
					echo $message;

					?>

				</td>
			</tr>
		<form  action="add_agent.php" method="POST">

			<tr>
				<td>
					<input type="text" name="name" placeholder="agent name" required>
					
				</td>
				<td>
					<input type="psaswprd" name="pass" placeholder="start password" hidden>
					
				</td>
				
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="submit" >
				</td>
			</tr>
		</form>
	</table>


	<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>

</body>
</html>