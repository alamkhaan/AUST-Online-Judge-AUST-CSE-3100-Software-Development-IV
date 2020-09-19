<?php 
	session_start();
	if(isset($_SESSION['username']))
		include 'loggedin.php';
	else
	include 'notloggedin.php';
	

	if(!isset($_GET['id']))
	{
		header('location:blog-not-found.php');
		exit();
	}

	$id  = $_GET['id'];
    
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "170204084";
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM blog where blogid = '".$id."'";
    $result= $conn->query($sql);


    if($result->num_rows ==0){

        header('location:blog-not-found.php');
        $conn->close(); 
        exit();

    }
    while($row = $result-> fetch_assoc())
    {

        $blogid = $row["blogid"];
        $heading= $row['heading'];
        $message= $row['message'];
        $name = $row['username'];
        $userid = $row['userid'];      
            
    }

    

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

			<div class="container blog">
				<div class = "row">
                    <div class = "blog-view-design">
                        <h2><b><?php echo $heading ?> </b></h2>
                        <h5>-<a  href="profile.php?id=<?php echo $userid ?>"><?php echo $name ?> </a></h5>
                        <pre class = "statement"><?php echo $message ?> </pre>
                    </div>
               </div>

			</div>
			<div class ="row space"></div>
			<div class="container comment-box">
				<div class ="row space2"></div>
				
                <div class = "row">
                    <div class = "problem-design">
                        <h5><b>Comments:</b></h5>

                        <div class="comment-design">
                        	
                        	<table class="table table-bordered table-striped">
	                        	<?php
	                        		$sql = "SELECT * FROM comments where blogid = '".$blogid."'";
								    $result= $conn->query($sql);

								    while($row = $result-> fetch_assoc())
								    {



								        echo "<tr><td><a  href=\"profile.php?id=".$row["userid"]."\">".$row["username"]."</a></td> <td>".$row["comment"]."</td></tr>";
								            
								    }
								    $conn->close(); 
	                        	?>
                        	</table>
                        	
                        	<div class="row space2"></div>

                        </div>
                    </div>
               </div>
               <div class ="row space2"></div>

			
				
			</div>

			<div class ="row space"></div>
			<div class="container write-comment">
				<div class ="row space"></div>
				<div class = "problem-design">
					<h6><b>Write Comment:</b></h6>

                      <form method="post" action="add-comment-database.php?id=<?php echo $blogid?>">
			               		
			            <textarea class="textarea7" name="comment" required=""></textarea>
			             <div class = "row space2"></div>
                        <button type="submit" class="btn loginbutton " value="Submit" name="submit">Comment</button>	
			               		

			          </form>

               </div>
               <div class ="row space"></div>
			</div>
			
		</div>
		




		
	</body>
</html>


<?php 
	
	include 'footer.php';
?>