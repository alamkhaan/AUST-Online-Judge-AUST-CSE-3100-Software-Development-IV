<?php 
	session_start();
	if(isset($_SESSION['username']))
		include 'loggedin.php';
	else
	include 'notloggedin.php';


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "170204084";
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM blog ORDER BY blogid desc";
    $result= $conn->query($sql);


    


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

			<div class="container">
				<div class="row space"></div>
				<div class="row">
    				<div class = "col-10"> </div>
    	        		<form action="add-new-blog.php">	        
                    		<button type="Submit" class="btn loginbutton" value="Submit" name=""> Add New Blog</button>
                 
                		</form>
                	</div>
			</div>
				<div class="row space"></div>
				<?php

					while($row = $result-> fetch_assoc())
				    {

				        $blogid = $row["blogid"];
				        $heading= $row['heading'];
				        $message= $row['message'];
				        $name = $row['username'];
				        $userid = $row['userid']; 

				        echo "<div class=\"container blog\">
						<div class = \"row\">
		                    <div class = \"blog-view-design\">
		                        <h2><b>".$heading."</b></h2>
		                        <h5>-<a  href=\"profile.php?id=.".$userid."\">".$name."</a></h5>
		                        <pre class = \"statement\">".$message."</pre>
		                        <a  href=\"blog-view.php?id=".$blogid."\"><h6>"."View Comments"."</h6></a>
		                    </div>
		               </div>
					</div><div class = \"row space\"></div>";
					 
				            
				    }
				    ?>
				    
					
				
			
		</div>
		




		
	</body>
</html>


<?php 
	
	include 'footer.php';
?>