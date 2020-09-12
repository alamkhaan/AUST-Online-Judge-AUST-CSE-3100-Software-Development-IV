<?php 
	
	include 'notloggedin.php';
?>

<!doctype html>
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
				<div class="row">	
					
						<div class = "col-1.5">
							<a href="index.php"><button type="button" class="btn homebutton"><b>Home</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Blogs</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Problems</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="compiler.php"><button type="button" class="btn homebutton"><b>Compiler</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="login.php?error=submissions"><button type="button" class="btn homebutton"><b>Submissions</b></button></a>
						</div>
						<div class = "col-1.5">
							<a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Contact Us</b></button></a>
						</div>
						
						<div class = "col-1.5">
							<a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>About Us</b></button></a>
						</div>
					
				</div>
			
				<div class ="row space"></div>
				<?php 
                            
                            if(isset($_GET['error']))
                            {
                                $Msg = " You must login first ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }
                            else if(isset($_GET['notmatched']))
                            {
                                $Msg = " Email or Password is invalid ";
                                echo '<div class="alert alert-danger">'.$Msg.'</div>';
                            }
                            else if(isset($_GET['successful']))
                            {
                                $Msg = " Login Successful ";
                                echo '<div class="alert alert-success">'.$Msg.'</div>';
                            }

                         
                        
                        ?>
                 </div>
                <div class = "container signup-content">
				<div class = "row">
				<div class="col-1"> </div>

				<div class="col-4">

                	<img src="images/signin-image.jpg" class = "loginpic-design">
            	</div><div class="col-1"> </div>

            	<div class="col-5 formdesign">
                        <form action="checklogin.php" method="POST">

                        <h4 class = "signup-title"><b>Login in AUST OJ</b></h4><br>


                        <div class = "login-form-row">
                            <label  class="col-4">Email:</label>
                            <input class="col-6" type="email" name="email"  required="" placeholder="Enter Your Email"><br>
                        </div>

                        <div class = "login-form-row">
                            <label  class="col-4">Password:</label>
                            <input class="col-6" type="Password" name="password"  required="" placeholder="Enter Your Password"><br>
                        </div>

                        <div class = "signup-form-submit">
                            <button type="Submit" class="btn loginbutton" value="Submit" name=""> Login</button>
                        </div>
                    </form>

                    <div class = "forgot-password">
                    	<a  href="register.php">Forgot Password?</a><br>
	                </div>
	                
                </div>
                

            </div>
            <div class ="row space"></div>
        </div>
        	<div class ="row space"></div>
				
			</div>
			
		
	</body>
</html>

<?php 
	
	include 'footer.php';
?>