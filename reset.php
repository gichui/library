<?php
include"home.php";
include 'conection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table align="center">
		<tr>
			<td>
				<?php 
				$message="";

				if (isset($_POST['username'])) 
				{
					$user=$_POST['username'];
					$pass=$_POST['password'];
					$reset=$_POST['reset'];
					if ($_SESSION['username']!="admn") 
					{	
						
						if ($_SESSION['username']!=$user) 
						{

							$message="such action can only be done when your are an admn";


							# code...
						}
						else
						{
							$get="SELECT * FROM login where username='$user'";
							$check=mysqli_query($con,$get);
							while ($row=mysqli_fetch_assoc($check))
								if (mysqli_num_rows($check)==1) {
									
									$now= $row['password'];
								if ($now!==$pass) 
								{
									$message="the password is incorect";
									# code...
								}
								else{
									$change="UPDATE login SET password='$reset' WHERE username='$user'";
									$update=mysqli_query($con,$change);
									if (!$update) 
									{
										$message="password not set";
										# code...
									}else{
										$message="password reset susefully";
									}
								}
									# code...
								}
							 

						}
						# code...
					}
					else
					{
						
						$get="SELECT * FROM login where username='$user'";
							$check=mysqli_query($con,$get);
							while ($row=mysqli_fetch_assoc($check))
								if (mysqli_num_rows($check)==1) {
									
									$now= $row['password'];
								if ($now!==$pass) 
								{
									$message="the password is incorect";
									# code...
								}
								else{
									$change="UPDATE login SET password='$reset' WHERE username='$user'";
									$update=mysqli_query($con,$change);
									if (!$update) 
									{
										$message="password not set";
										# code...
									}else{
										$message="password reset susefully";
									}
								}
									# code...
								}


					}
				}
				echo $message;
					
					
				 ?>
			</td>
		</tr>
		<form action="reset.php" method="POST">
			<tr>
				<td>
					<input type="text" name="username" placeholder="username" required>

				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password" placeholder="enter old password" required>
				</td>
			</tr>
			</tr>
			<tr>
				<td>
					<input type="password" name="reset" placeholder="enter new password" required>
				</td>
			</tr>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit">
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