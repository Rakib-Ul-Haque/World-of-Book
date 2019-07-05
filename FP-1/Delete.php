<?php include'I-HO.php';?>
	<section class="maincontent">
	<hr/>
		<div class="dropdown">
			<button class="dropbtn">=</button>
				<div class="dropdown-content">
					<a href="Welcome.php">Go to Admin home</a>
					<a href="Logout.php">Sign Out</a>
				</div>
		</div>
	<hr/>
<?php
	// Initialize the session
	session_start();
	 
	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: Login.php");
	  exit;
	}	
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		<table align='center'>
			<tr>
				<td>Write the book ID you want to Delete:</td>
				<td><input type="text" name="id" required /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"/></td>
			</tr>			
		</table>
	</form>
<?php

	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	require_once 'config.php';
	
	$id="";

	if($_SERVER["REQUEST_METHOD"]=="POST"){
			$id=validate($_POST["id"]);
			
	// Check connection
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		// Attempt delete query execution
		$sql = "DELETE FROM users WHERE id='$id'";
		if(mysqli_query($link, $sql)){
			echo "Records were deleted successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		 
		// Close connection
		mysqli_close($link);

		
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


