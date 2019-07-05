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

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		<table align='center'>
			<tr>
				<td>Write the book ID you want to update:</td>
				<td><input type="text" name="id" required /></td>
			</tr>
			<tr>
				<td>Catagory:</td>
				<td><input type="text" name="ca" /></td>
			</tr>
			<tr>
				<td>Bookname:</td>
				<td><input type="text" name="bo" /></td>
			</tr>
			<tr>
				<td>Writter:</td>
				<td><input type="text" name="wr" /></td>
			</tr>
			<tr>
				<td>Published date:</td>
				<td><input type="Date" name="pd" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"/></td>
			</tr>			
		</table>
	</form>
<?php
	// Initialize the session
	session_start();
	 
	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: Login.php");
	  exit;
	}	
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	require_once 'config.php';
	
	$id=$ca=$bo=$wr=$pd="";

	if($_SERVER["REQUEST_METHOD"]=="POST"){
			$id=validate($_POST["id"]);
			$ca=validate($_POST["ca"]);
			$bo=validate($_POST["bo"]);
			$wr=validate($_POST["wr"]);
			$pd=validate($_POST["pd"]);
			// Check connection
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		// Attempt update query execution
		 
		 if ($ca!='' && $bo!='' && $wr!='' && $pd!='')
		 {
			$sql = "UPDATE users SET catagory='$ca',bookname='$bo',writtername='$wr',publishar_date='$pd' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////Triple////////////////////////////////
		 else if ($ca!='' && $bo!='' && $wr!='' && $pd=='')
		 {
			$sql = "UPDATE users SET catagory='$ca',bookname='$bo',writtername='$wr'WHERE id='$id'";
		 
		 }
		 ////////////////////////////////////////////////////////////////////////////
		 else if ($ca!='' && $bo!='' && $wr=='' && $pd!='')
		 {
			$sql = "UPDATE users SET catagory='$ca',bookname='$bo',publishar_date='$pd'WHERE id='$id'";
		 
		 }
		 ////////////////////////////////////////////////////////////////////////////
		 else if ($ca!='' && $bo=='' && $wr!='' && $pd!='')
		 {
			$sql = "UPDATE users SET catagory='$ca',writtername='$wr',publishar_date='$pd'WHERE id='$id'";
		 
		 }
		 		 ////////////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo!='' && $wr!='' && $pd!='')
		 {
			$sql = "UPDATE users SET bookname='$bo',writtername='$wr',publishar_date='$pd'WHERE id='$id'";
		 
		 }
		 ////////////////////////////////////////////////////////////////////////////
		 //////////////////////////////////////Double////////////////////////////////
		 else if ($ca!='' && $bo!='' && $wr=='' && $pd=='')
		 {
			$sql = "UPDATE users SET catagory='$ca',bookname='$bo'WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca!='' && $bo=='' && $wr!='' && $pd=='')
		 {
			$sql = "UPDATE users SET catagory='$ca',writtername='$wr'WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca!='' && $bo=='' && $wr=='' && $pd!='')
		 {
			$sql = "UPDATE users SET catagory='$ca',publishar_date='$pd' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo!='' && $wr=='' && $pd!='')
		 {
			$sql = "UPDATE users SET bookname='$bo',publishar_date='$pd' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo!='' && $wr!='' && $pd=='')
		 {
			$sql = "UPDATE users SET bookname='$bo',writtername='$wr' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo=='' && $wr!='' && $pd!='')
		 {
			$sql = "UPDATE users SET writtername='$wr',publishar_date='$pd' WHERE id='$id'";
		 
		 }
		 ////////////////////////////////////////////////////////////////////////////
		 //////////////////////////////////////Single////////////////////////////////
		 else if ($ca!='' && $bo=='' && $wr=='' && $pd=='')
		 {
			$sql = "UPDATE users SET catagory='$ca'WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo!='' && $wr=='' && $pd=='')
		 {
			$sql = "UPDATE users SET bookname='$bo'WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo=='' && $wr!='' && $pd=='')
		 {
			$sql = "UPDATE users SET writtername='$wr' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else if ($ca=='' && $bo=='' && $wr=='' && $pd!='')
		 {
			$sql = "UPDATE users SET publishar_date='$pd' WHERE id='$id'";
		 
		 }
		 //////////////////////////////////////////////////////////////////////
		 else{
			 echo "Plz write some data that you want to update";
		 }
	//$sql = "UPDATE users SET catagory='$ca',bookname='$bo',writtername='$wr',publishar_date='$pd' WHERE id='$id'";
		
		if(mysqli_query($link, $sql)){
			echo "Records were updated successfully.";
		} else {
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