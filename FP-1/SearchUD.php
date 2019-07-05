<?php include'S-OH.php';?>
	<section class="maincontent">
		<hr/>
			<div class="dropdown">
				<button class="dropbtn">=</button>
					<div class="dropdown-content">
						<a href="Search.php">Go Back to Search</a>
						<a href="Home.php">Go Back To Home</a>
					
					</div>
			</div>
		<hr/>
		<?php
			session_start();
			
			require_once 'config.php'; 
			// Check connection
			$ca=$bo=$wr="";
			$ca=$_SESSION['ca'];
			$bo=$_SESSION['bo'];
			$wr=$_SESSION['wr'];
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			// Attempt select query execution
			$sql = "SELECT * FROM users where catagory='$ca' or bookname='$bo' or writtername='$wr'";
			if($result = mysqli_query($link, $sql)){
				if(mysqli_num_rows($result) > 0){
					echo "<table align='center'>";
						echo "<tr>";
							echo "<th>Id</th>";
							echo "<th>Catagory</th>";
							echo "<th>Bookname</th>";
							echo "<th>Writtername</th>";
							echo "<th>Published</th>";
						echo "</tr>";
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td>" . $row['id'] . "</td>";
							echo "<td>" . $row['catagory'] . "</td>";
							echo "<td>" . $row['bookname'] . "</td>";
							echo "<td>" . $row['writtername'] . "</td>";
							echo "<td>" . $row['publishar_date'] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					// Free result set
					mysqli_free_result($result);
				} else{
					echo "No records matching your query were found.";
				}
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			 
			// Close connection
			mysqli_close($link);
		?>
	</section>

	
<?php include'H-FO.php';?>