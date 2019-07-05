<?php include'C-HO.php';?>
	<section class="maincontent">
	<hr/>
		<div class="dropdown">
			<button class="dropbtn">=</button>
				<div class="dropdown-content">
					<a href="Home.php">Go to Home</a>
				</div>
		</div>
	<hr/>
	
	
<h3 align='center'><font color='#FFFFFF'>Contact Form</font></h3>

<div class="container">
  <form action="/action_page.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
	
	</section>
<?php include'H-FO.php';?>


