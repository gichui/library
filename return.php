
<?php include"home.php";

include"conection.php"?>
<!DOCTYPE html>
<html>
<head>
	<title>return  books</title>
</head>
<body>
	<table align="center">
		<tr>
	<form action="return.php" method="POST">
		<td>
		<input type="text" name="id_no" placeholder="enter id number" required>
	</td>
	<td>
		<input type="text" name="book_id" placeholder="enter_book_id formart" required>
	</td>
	<td>
		<input type="submit" name="submit">
	</td>

		
	</form>
</tr>
	</table>
	<?php 
	if (isset($_POST['id_no'])) 
	{
		$id_no=$_POST['id_no'];
		$book_id=$_POST['book_id'];
		$message="";
		$queryt1="SELECT * FROM per_ifo WHERE ID_NO='$id_no' ";
		$query1=mysqli_query($con,$queryt1);
		if (!$query1) {
			$message="cant conect to the database";


			# code...
		}
		else
		{
			$message="lodaded";
			$queryt2="SELECT * FROM borrow WHERE  (ID_NO='$id_no' AND Book_id='$book_id')";
			$query2=mysqli_query($con,$queryt2);
			if (!$queryt2)
			 {
				$message="conection lost";

				# code...
			}
			else
			{
				
				#get all the dequired data
				echo mysqli_num_rows($query2);
				if (mysqli_num_rows($query2)!=1) 
				{
					$message="no record found";
					# code...
				}
				else
				{
					$message="database selected";
					while ($row=mysqli_fetch_assoc($query2)) 
					{
						echo "<table>";
								echo "<tr>";
										echo "<td>";

										
										echo "<td>";
								echo "</tr>";
						echo "</table>";
						#define variables
						$title=$row['title'];
						$author=$row['author'];
						echo $title.$author;
						#insert in to the bookshop table
						$queryt3="INSERT INTO bookshop (Book_id,Title,author) values('$book_id','$title','$author')";
						$query3=mysqli_query($con,$queryt3);
						if (!$query3) {
							$message="not yet";
							# code...
						}
						else
						{
							$message="sent";
							$DEL="DELETE  FROM borrow WHERE Book_id='$book_id'";
							mysql_select_db('libraly');
			 				$DELT=mysqli_query($con,$DEL);
			 				if (!$DELT) 
			 				{
			 					$message=" DATA SENT BUT NOT UPDATED";
			 									# code...
			 				}
			 				else
			 				{
			 						$message="DATA SENT AND UPDATED";
			 				}
						}
						# code...
					}
				}
			}
		}
		echo $message;
		# code...
	}

	?>

	<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>

</body>
</html>