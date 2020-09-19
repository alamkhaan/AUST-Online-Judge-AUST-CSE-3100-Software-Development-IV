<?php
	session_start();
	if(isset($_POST['submit']) && isset($_SESSION['username']))
	{
		
		$blogid = $_GET['id'];
		$name= $_SESSION['username'];
		$userid= $_SESSION['id'];
		$comment = $_POST['comment'];

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "170204084";

		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {

		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO comments (blogid,username,userid,comment)
		VALUES ($blogid,'$name',$userid,'$comment')";

		if ($conn->query($sql) == TRUE) 
		{
			$s = "location:blog-view.php?id=".$blogid;
		    header($s);
	   	  	exit();
		} 
		else 
		{
		  	$conn->error;
		  	$s = "location:blog-view.php?id=".$blogid;
		    header($s);
		    exit();
		}

		$conn->close();
		
	}
	else
	{
		
		 header("location:login.php?error");
		 exit();
	}
?>