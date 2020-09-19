<?php
	if(isset($_POST['submit']))
	{
		session_start();
		$heading= $_POST['heading'];
		$message= $_POST['message'];
		$name =  $_SESSION['username'];
		$id = $_SESSION['id'];


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "170204084";

		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO blog (heading,message,username,userid)
		VALUES ('$heading','$message','$name',$id)";

		if ($conn->query($sql) == TRUE) 
		{
		  header("location:add-new-blog.php?successful");
		  exit();
		} 
		else 
		{
		  $conn->error;
		  header("location:add-new-blog.php?error");
		  exit();
		}

		$conn->close();
		
	}
	else
	{
		 header("location:add-new-blog.php?error");
		 exit();
	}
?>