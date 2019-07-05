<?php include'W-HO.php';?>
	<section class="maincontent">
	<hr/>
		<div class="dropdown">
			<button class="dropbtn">=</button>
				<div class="dropdown-content">
					<a href="Signup.php">Create Admin</a>
					<a href="Insert.php">Insert Data</a>
					<a href="Edit.php">Edit Data</a>
					<a href="Delete.php">Delete Data</a>
					<a href="AdSearch.php">Search Data</a>
					<a href="Logout.php">Sign out</a>					
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
    <div class="page-header">
        <h1 align='center'>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to your Home page.</h1>
    </div>
	</section>
<?php include'H-FO.php';?>