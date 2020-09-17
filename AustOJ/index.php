<?php 
	session_start();
	if(isset($_SESSION['username']))
		include 'loggedin.php';
	else
	include 'notloggedin.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    
	    <link rel="stylesheet" href="css/bootstrap.min.css" />
	    <link rel="stylesheet" href="css/main.css" />

	    <title>AUST OJ</title>
	</head>

	<body>
		<div class="Row">			<!-- First row -->
			<div class="container">
				<div class="row">	
					
						<div class = "col-1.5">
							<a href="index.php"><button type="button" class="btn mybutton"><b>Home</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Blogs</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="problems.php"><button type="button" class="btn homebutton"><b>Problems</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="compiler.php"><button type="button" class="btn homebutton"><b>Compiler</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="submissions.php"><button type="button" class="btn homebutton"><b>Submissions</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="contactus.php"><button type="button" class="btn homebutton"><b>Contact Us</b></button></a>
						</div>
						
						<div class = "col-1.5">
							<a href="aboutus.php"><button type="button" class="btn homebutton"><b>About Us</b></button></a>
						</div>
					
				</div>
			
				<div class="picRow">			
					<img src="images/1.png" class="pic1">
				</div>
			</div>
			
		</div>
		




		
	</body>
</html>


<?php 
	
	include 'footer.php';
?>