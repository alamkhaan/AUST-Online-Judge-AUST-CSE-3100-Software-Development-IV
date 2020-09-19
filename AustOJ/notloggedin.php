<?php
	$conn = new mysqli("localhost", "root","", "170204084");
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM project_picture where name= 'logo'";
    $result= $conn->query($sql);

    while($row = $result-> fetch_assoc())
    {

        $pic= $row["path"]; 
            
    }

    $conn->close();
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
		<div class='Row'>			
			<div class="container">
				<div class="row">		
					<div class="col-8">
						<img src="<?php echo $pic ?>" class = "logo">
					</div>
					
					<div class = "login" > 
						<a  href="login.php">LogIn</a>
					</div>
					<div class =  "regi">
						<a  href="register.php" >Registration</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>