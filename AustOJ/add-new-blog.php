<?php 
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:login.php?error');
		exit();
	}
	else
	include 'loggedin.php';
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
		<div class="Row">			
			<div class="container">
				<div class="row bar">	
					
						<div class = "col-1.5">
							<a href="index.php"><button type="button" class="btn homebutton"><b>Home</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="blogs.php"><button type="button" class="btn homebutton"><b>Blogs</b></button></a>
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
			
				
			</div>

			<div class="row space"></div>
			<div class="container">
				<?php 
                            
                            if(isset($_GET['error']))
                            {
                                $Msg = "Error Occured";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }
                            
                            else if(isset($_GET['successful']))
                            {
                                $Msg = "Blog Added Successsfully";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }

                         
                        
                ?>

			</div>

			 <div class="container new-problem-design">


                <div class ="row space"></div>

                
            
                <form action="add-blog-database.php" method = "post">
                <h3 class="new-problem-heading">Add a new Blog</h3>
                <div class ="row space"></div>
				

					<div class = "row">
                    <div class = "col-md-2">
                        <label><b>Heading:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea1" name= "heading" required=""></textarea>
                    </div>
                </div>


                <div class ="row space"></div>

					<div class = "row">
                    <div class = "col-md-2">
                        <label><b>Write Your Blog:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea3" name="message" required=""></textarea>
                    </div>
                
                </div>
                

                <div class = "row add-problem-button">
                    <button type="submit" class="btn loginbutton" name="submit"> Add Blog</button>
                </div>
                <div class = "row space"></div>
				</form>

			</div>

		</div>
		




		
	</body>
</html>


<?php 
	
	include 'footer.php';
?>