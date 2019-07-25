<?php 
session_start();
if (isset($_SESSION['username'])) {
	
	# code...
}else
{
	
	$location="index.php";
header( "Location:$location" );
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
</head>
<body bgcolor="pink">
	<header bgcolor="blue">
		<table bgcolor="blue" align="center" style="width: 99%">
			<tr>
				<td align="center">
					
					<img src="logo.png" style="width: 60px" style="height: 80px">
				</td>
			</tr>
			<tr>
				<td align="left">logedin as:<?php echo $_SESSION['username']?> </td>

			</tr>
			<tr>
				<td>
					<?php 
					$count=0;

					if ($count==60) {
						$count=0;
						# code...
					}
					while ($count<60) {
						$time=time()+(60*60);
						$datetime=date('l:d/m/Y',time());
					$datetime1=date('H:i:s',$time);
					
					$count ++;
						# code...
					}
					
					echo "DATE:".$datetime."<br>";
					echo "TIME  : ".$datetime1."<br>";
					echo "NO of day for free trial is:";
					$ex=(INT)$_SESSION['exp'] ;
					
					
					$dif=$ex-time();
					$fix=$dif/(60*60*24);
					$free=round($fix,3);
					 echo"". $free."";
					

					
					
					

					?>
			
				</td>
				<td align="right" width="100px">
					<button >
						<a href="logout.php"> log out</a>
					</button>
				</td>
			</tr>
		</table>
	</header>

	<hr>
	<table align="center" bgcolor="yellow">
		<tr>
			<td>
				<BUTTON>
		
					<a href="add_book.php" target="home">add books</a>
				</BUTTON>
				
			</td>
			<td>
				<td>
				<BUTTON>
		
					<a href="reset.php" target="reset password">reset password</a>
				</BUTTON>
				
			</td>
			<td>
				<BUTTON>
		
					<a href="add_agent.php" target="home">add agents</a>
				</BUTTON>
				
			</td>
			<td>
			<td>
			<td>
				<BUTTON>
		
					<a href="homep.php" target="home">home page</a>
				</BUTTON>
				
			</td>
		
		
			<td>
				<button>
					<a href="regester.php"  target="_self">register new members</a>

				</button>
				
			</td>
		
		
			<td>
				<button >
					<a href="loan.php"> loan out books</a>
				</button>
				
			</td>
		
		
			<td>
				<button>
					<a href="return.php"> return books</a>

				</button>
				
			</td>
		
		
			<td>
				<button>
					<a href="stoke.php"> VIEW THE STOCK</a>
				</button>
				
			</td>
		
		
			<td>
				<button>
					<a href="loan_view.php"> view loans</a>

				</button>
				
			</td>
		
		
			<td width="7%">
				<button>
					<a href="defualtor.php"> check defualteor</a>
				</button>
				
			</td>
		
		</tr>
	
	
		
	

	
	
	
	
	
	
	

	

	</table>
	<hr>
	


</body>
</html>