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
<?php
	// Include config file
	require_once 'config.php';
	 
	// Define variables and initialize with empty values
	
	$catagory = $bookname = $writtername = $publishar_date = "";
	$catagory_err = $bookname_err = $writtername_err = $publishar_date_err = "";
	
	////////////////////////////////////////////////////////////////////////////////
	// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate catagory
    if(empty(trim($_POST["catagory"]))){
        $catagory_err = "Please enter a catagory.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE catagory = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_catagory);
            
            // Set parameters
            $param_catagory = trim($_POST["catagory"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $catagory = trim($_POST["catagory"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
	//////////////////////////////////////////////////////////////////
	// Validate bookname
    if(empty(trim($_POST["bookname"]))){
        $bookname_err = "Please enter a bookname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE bookname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_bookname);
            
            // Set parameters
            $param_bookname = trim($_POST["bookname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $bookname_err = "This bookname is already taken.";
                } else{
                    $bookname = trim($_POST["bookname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
	///////////////////////////////////////////////////////////////////
	// Validate writtername
    if(empty(trim($_POST["writtername"]))){
        $writtername_err = "Please enter a writtername.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE writtername = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_writtername);
            
            // Set parameters
            $param_writtername = trim($_POST["writtername"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $writtername = trim($_POST["writtername"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    ////////////////////////////////////////////////////////////////////
	// Validate publishar_date
    if(empty(trim($_POST["publishar_date"]))){
        $publishar_date_err = "Please enter a publishar_date.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE publishar_date = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_publishar_date);
            
            // Set parameters
            $param_publishar_date = trim($_POST["publishar_date"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                
                    $publishar_date = trim($_POST["publishar_date"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
	
    
	////////////////////////////////////////////////////////////////////
	// Check input errors before inserting in database
    if(empty($catagory_err) && empty($bookname_err) && empty($writtername_err) && empty($publishar_date_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (catagory, bookname, writtername, publishar_date) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_catagory, $param_bookname, $param_writtername, $param_publishar_date);
            
            // Set parameters
            $param_catagory = $catagory;
			$param_bookname = $bookname;
			$param_writtername = $writtername;
			$param_publishar_date = $publishar_date;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				header("location: Logout.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
	////////////////////////////////////////////////////////////////////////////////
	
?>

<!-- Insertion here-->
	<form align='Center' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	
            <div class="form-group <?php echo (!empty($catagory_err)) ? 'has-error' : ''; ?>">
                <label>Catagory:<sup>*</sup></label>
                <input type="text" name="catagory"class="form-control" value="<?php echo $catagory; ?>">
                <span class="help-block"><?php echo "<br/>".$catagory_err."<br/>"; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($bookname_err)) ? 'has-error' : ''; ?>">
                <label>Book Name:<sup>*</sup></label>
                <input type="text" name="bookname"class="form-control" value="<?php echo $bookname; ?>">
                <span class="help-block"><?php echo "<br/>".$bookname_err."<br/>"; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($writtername_err)) ? 'has-error' : ''; ?>">
                <label>Writter Name:<sup>*</sup></label>
                <input type="text" name="writtername"class="form-control" value="<?php echo $writtername; ?>">
                <span class="help-block"><?php echo "<br/>".$writtername_err."<br/>"; ?></span>
            </div>
			
			<div class="form-group <?php echo (!empty($publishar_date_err)) ? 'has-error' : ''; ?>">
                <label>Publishar Date:<sup>*</sup></label>
                <input type="Date" name="publishar_date"class="form-control" value="<?php echo $publishar_date; ?>">
                <span class="help-block"><?php echo "<br/>".$publishar_date_err."<br/>"; ?></span>
            </div>
			
			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

        </form>
<!-- Insertion End here-->
	</section>
<?php include'H-FO.php';?>