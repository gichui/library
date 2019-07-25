<?php include"home.php";

include"conection.php"?>
<!DOCTYPE html>
<html>
<head>
	<title>loan books</title>
</head>
<body>
	<form method="POST" action="loan.php">
		<table align="center" style="width: 50%">
			<TR>
				<TD colspan="2" align="center" bgcolor="white"> <H1>
					<?php
					$error="";
					if (isset($_POST['id_no']) && isset($_POST['book_id'])) 

					{
						$ID_NO=$_POST['id_no'];
						$Book_id=$_POST['book_id'];
						$duration=$_POST['duration'];
						$sql = "CREATE TABLE bookshop( ".
						"id INT NOT NULL AUTO_INCREMENT, ".
						"Book_id VARCHAR(10) NOT NULL, ".
						"Title VARCHAR(40) NOT NULL, ".
						"author VARCHAR(50) NOT NULL, ".
						"PRIMARY KEY ( id )); ";
						mysql_select_db( 'libraly' );
						$retval = mysqli_query($con, $sql);
						if(! $retval )
						{
							$query1="SELECT * FROM per_ifo WHERE ID_NO='$ID_NO'";
					 		$CREATE=mysqli_query($con,$query1);
							if (mysqli_num_rows($CREATE)!=1) 
							{
								# code...

								$error="first regester the member";
							}
							else
							{

								
								while ($row=mysqli_fetch_assoc($CREATE)) {
									$phone=$row['phone'];
									$f_name=$row['F_NAME'];
									$l_name=$row['L_NAME'];

									$BB="SELECT * FROM  bookshop WHERE Book_id='$Book_id'";
									$bb1=mysqli_query($con,$BB);
					 				if (mysqli_num_rows($bb1)!=1)
					 				{
					 					$error="BOOK NOT FOUND";


					 				}
					 				else
					 				{
					 					while ($row1=mysqli_fetch_assoc($bb1)) 
					 					{
					 						$AGENT=$_SESSION['username'];
					 						
					 						$title=$row1['Title'];
					 						$author=$row1['author'];
					 						$d1=time()+($duration*60*60*24)+(60*60);
					 						$return_date1=$d1;
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
											"PRIMARY KEY ( id )); ";
											mysql_select_db( 'libraly' );
											$ask = mysqli_query(  $con,$add_borrow );
											if(! $ask )
											{
												
												$query4="INSERT INTO borrow (ID_NO,F_NAME,L_NAME,Book_id,title,phone,return_date,AGENT) values('$ID_NO','$f_name','$l_name','$Book_id','$title','$phone','$return_date1','$AGENT')";
												mysql_select_db( 'libraly' );


												$reg2=mysqli_query($con,$query4);
												if (!$reg2) {
													$error="cant send data";

													# code...
												}else
												{
													$error="book loaned";
													$DEL="DELETE  FROM bookshop WHERE Book_id='$Book_id'";
													mysql_select_db('libraly');
					 								$DELT=mysqli_query($con,$DEL);
					 								if (!$DELT) 
					 								{
					 									$error=" DATA SENT BUT NOT UPDATED";
					 									# code...
					 								}
					 								else
					 								{
					 									$error="DATA SENT AND UPDATED";
					 								}

												}
											}
											else
											{
												$error="database created successfully";


												
											}
					 						

					 						
					 					}
					 				} 
									# code...
								}
							}
						
						}
						else{

							$error="Table created successfully\n";

						}
						
					}

					 echo $error;?>

					<H1></TD>
			</TR>
			<tr>
				<td>
					ID NUMBER
				</td>
				<TD>
					BOOK ID NUMBER
				</TD>
			</tr>
			<tr>
				<td>
				<input type="text" name="id_no" required placeholder="id number">
				
				</td>
				<td>
				<input type="text" name="book_id" required placeholder="book id">
				
				</td>
				<td>
				<input type="text" name="duration" required placeholder="how many days" value="7">
				
				</td>
			</tr>
			<tr>
				<td>
				<input type="hidden" name="">
				
			</td>
				<td align="right">
				<input type="submit" name="submit">
				
			</td>
			</tr>
		</table>
		
	</form>
	<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>

</body>
</html>