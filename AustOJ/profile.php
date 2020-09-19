<?php 
	session_start();
	if(isset($_SESSION['username']))
	{
		include 'loggedin.php';
		$session_id = $_SESSION['id'];
	}
	else
	{
		include 'notloggedin.php';
		$session_id = "0";
	}


	if(!isset($_GET['id']))
	{
		header('location:profile-not-found.php');
		exit();
	}
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "170204084";
    $id  = $_GET['id'];
    
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user where userid = '".$id."'";
    $result= $conn->query($sql);


    if($result->num_rows ==0){

        header('location:profile-not-found.php');
        $conn->close(); 
        exit();

    }
    while($row = $result-> fetch_assoc())
    {

        $name = $row["username"];
        $email= $row['email'];
        $gender = $row['gender'];
        $birthdate = $row['birthdate'];
        $pic =   $row['picture'];              
    }

    $sql = "SELECT * FROM submissions where username = '".$name."'";
    $result= $conn->query($sql);


    $total = $result->num_rows;

    $sql = "SELECT * FROM submissions where username = '".$name."' and verdict = 'Accepted'";
    $result= $conn->query($sql);


    $ac = $result->num_rows;


    $conn->close(); 

    
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
				<div class="row space"></div>
			</div>

			<div class="container profile-design">
				<div class="row space"></div>


				<div class = "row">
					<div class="col-md-8">

						<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>Name:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$name ?> </p>
		                    
	               		</div>


	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>Email:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$email ?> </p>
		                    
	               		</div>

	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>Gender:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$gender ?> </p>
		                    
	               		</div>

	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>Birthdate:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$birthdate ?> </p>
		                    
	               		</div>

	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>No. Of Submissions:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$total ?> </p>
		                    
	               		</div>


	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>No. Of Accepted Submissions:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php echo "   ".$ac ?> </p>
		                    
	               		</div>

	               		<div class = "row">
							<div class = "col-md-1"></div>
		                    <div class = "col-md-1">
		                        <label><b>Accepted Ratio:</b></label>
		                    </div>
		                    <div class = "col-md-1"></div>
		                     <p class = "statement"><?php if($total==0)  $total+= 1; echo "   ".(int)(($ac/$total)*100)." %" ?> </p>
		                    
	               		</div>
               	</div>



					<div class="col-md-3">
						<div class="row">
							<img class="profile-pic" src="<?php echo $pic; ?> ">
						</div>

						<?php

						if($id==$session_id )
						{


							echo "<div class=\"row\">
								<form method =\"post\"enctype=\"multipart/form-data\" action=\"update-pic.php\">
									<div class=\"row\">
										<input class =\"image-upload\" type=\"file\" name=\"pic-upload\" required=\"\">
									</div>
									<button type=\"submit\" class=\"btn  update-pic\" name=\"btn-send\"> Update Pic </button>


								</form>
							</div>";
						}
						?>
						
					</div>

				</div>

				<div class="row space"></div>
				<div class="row space"></div>



			</div>

		
	</body>

	
</html>

<?php 
	include 'footer.php';

?>