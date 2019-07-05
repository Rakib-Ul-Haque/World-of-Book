<?php include'SU-HO.php';?>
	<section class="maincontent">
		<hr/>
		<div class="dropdown">
			<button class="dropbtn">=</button>
				<div class="dropdown-content">
					<a href="Library.php">Library</a>
					<a href="Home.php">Go Back To Home</a>
				</div>
		</div>
	<hr/>
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		<table align='center'>
			<tr>
				<td><font color="White">Catagory:</font></td>
				<td><input type="text" name="ca" /></td>
			</tr>
			<tr>
				<td><font color="White">Bookname:</font></td>
				<td><input type="text" name="bo"  /></td>
			</tr>
			<tr>
				<td><font color="White">Writter:</font></td>
				<td><input type="text" name="wr" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"/></td>
			</tr>			
		</table>
	</form>
	
	<?php 
		
		$ca=$bo=$wr="";
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$ca=validate($_POST["ca"]);
			$bo=validate($_POST["bo"]);
			$wr=validate($_POST["wr"]);
			session_start();
			$_SESSION['ca'] = $ca;
			$_SESSION['bo'] = $bo;
			$_SESSION['wr'] = $wr;
            header("location: SearchUD.php");
		}
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	
	
	</section>
<?php include'H-FO.php';?>