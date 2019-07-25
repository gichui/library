<?php 
include"home.php";
include"conection.php";
$view="SELECT * FROM bookshop";
$view_result=mysqli_query($con,$view);
echo "<table Border = 1 align=center CellSpacing =3 width=90% bgcolor=green>";
echo "<tr bgcolor=yellow width=99%>";
			echo "<td>";
				echo "BOOK ID";

			echo "</td>";
			echo "<td>";
				echo "TITLE";

			echo "</td>";
			echo "<td>";
				echo "AUTHOR";

			echo "</td>";
			

$count=0;
if (!$view_result) 
{	
	# code...
}
while ($row=mysqli_fetch_assoc($view_result))
 	{
 		if (($count%2)==0) {

 			
 			$col="blue";
 			# code...
 		}
 		else{
 		
 			$col="gray";
 		}
 		
 		

 		echo "<tr bgcolor=$col>";
			echo "<td>";
				echo $row['Book_id'];

			echo "</td>";
			echo "<td>";
				echo $row['Title'];

			echo "</td>";
			echo "<td>";
				echo $row['author'];

			echo "</td>";
		echo "</tr>";
		$count++;

	# code...
	}
	echo "<tr>";
		echo "<td align=center colspan=8>";
					echo "</td>";
	echo "</tr>";
	

echo "</table>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table align="center">		<footer align="center">
		PROGRAMED BY JACKMAN<br>
		COPYWRITE © 2019<br>

	</footer>

	</table>

</body>
</html>