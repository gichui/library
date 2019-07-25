<?php 

include"home.php";
include"conection.php";
$view="SELECT * FROM borrow";
$view_result=mysqli_query($con,$view);
echo "<table Border = 1 align=center CellSpacing =3 width=90% bgcolor=green>";
echo "<tr bgcolor=yellow width=99%>";
			echo "<td>";
				echo "ID NUMBER";

			echo "</td>";
			echo "<td>";
				echo "FIRST NAME";

			echo "</td>";
			echo "<td>";
				echo "LAST NAME";

			echo "</td>";
			echo "<td>";
				echo "BOOK ID";

			echo "</td>";
			echo "<td>";
				echo "TITLE";

			echo "</td>";
			echo "<td>";
				echo "PHONE NUMBER";

			echo "</td>";
			echo "<td>";
				
				echo "DEADLINE";

			echo "</td>";
			echo "<td>";
				
				echo "served by";

			echo "</td>";

$count=0;
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
				echo $row['ID_NO'];

			echo "</td>";
			echo "<td>";
				echo $row['F_NAME'];

			echo "</td>";
			echo "<td>";
				echo $row['L_NAME'];

			echo "</td>";
			echo "<td>";
				echo $row['Book_id'];

			echo "</td>";
			echo "<td>";
				echo $row['title'];

			echo "</td>";
			echo "<td>";
				echo $row['phone'];

			echo "</td>";
			echo "<td>";
				$date=$row['return_date'];
				$date1=date('d/m/y',$date);
				echo $date1;

			echo "</td>";
			echo "<td>";
				echo $row['AGENT'];

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