<?php
	if(isset($_POST['submit']))
	{
		session_start();
		$name = trim($_POST['username ']);
		$email= $_POST['email'];
		$contactNo = $_POST['contactNo'];
		$problems = $_POST['problems'];
		$suggestions= $_POST['suggestions'];
		


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "170204084";

		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO contact_us (name,email,contactNo,problems,suggestions)
		VALUES ('$name','$email','$contactNo','$problems','$suggestions')";

		if ($conn->query($sql) == TRUE) 
		{
		  header("location:contactus.php?successful");
		  exit();
		} 
		else 
		{
		  $conn->error;
		  header("location:contactus.php?error");
		  exit();
		}

		$conn->close();
		
	}
	else
	{
		 header("location:contactus.php?busy");
		 exit();
	}

?>