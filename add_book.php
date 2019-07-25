<?php include"home.php";
include"conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>add books</title>
</head>
<body>
	<table align="center" width="10%">
		<form action="add_book.php" method="POST">
			<tr>
			<td>
				<?php 
				$message="";
					if (isset($_POST['book_id'])) 
					{
						$book_id=$_POST['book_id'];
						$title=$_POST['title'];
						$author=$_POST['author'];
						if ($_SESSION['username']!="admn") 
						{
							$message="that fuction is only for admn";
							# code...
						} 
						else
						{

							$request="SELECT * FROM  bookshop WHERE Book_id='$book_id'";
						$EXCUTE=mysqli_query($con,$request);
						if (mysqli_num_rows($EXCUTE)<1) {
							
							$request2="INSERT INTO bookshop (Book_id,Title ,author)
							VALUES('$book_id','$title','$author')";
							$add=mysqli_query($con,$request2);
							if (!$add) {
								$message=alerts("about to add a book");
								# code...
							}

							# code...
						}
						else
						{
							$message='book id aready in the database';
						}


						}
						
						

					}



				echo $message;

				?>
				
				
			</td>
		</tr>
			<tr>
			<td width="20%">
				<input type="text" name="book_id" placeholder="enter book id" maxlength="10" minlength="5"><br>
				
				
				
				
			</td>

		</tr>
		<tr>
			<td>
				<input type="text" name="title" placeholder="title" minlength="4" maxlength="10"><br>
				
			</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="author" placeholder="author" minlength="4" maxlength="10"><br>
				
			</td>
		</tr>
		<tr>
			<td width="50%">
				<input type="submit" name="submit ">
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