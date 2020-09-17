<?php
	if(isset($_POST['submit']))
	{
		session_start();
		$title = trim($_POST['title']);
		$timelimit= $_POST['timelimit'];
		$difficulty = $_POST['difficulty'];
		$statement = $_POST['statement'];
		$inputformat = $_POST['inputformat'];
		$constraints = $_POST['constraints'];
		$outputformat =  $_POST['outputformat'];
		$sampleinput = $_POST['sampleinput'];
		$sampleoutput = $_POST['sampleoutput'];
		$hiddeninput = $_POST['hiddeninput'];
		$hiddenoutput = $_POST['hiddenoutput'];


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "austoj";

		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO problemset (name,difficulty,totalsolved,timelimit,statement,inputformat,constraints,outputformat,sampleinput,sampleoutput,hiddeninput,hiddenoutput,author)
		VALUES ('$title','$difficulty',0,$timelimit,'$statement','$inputformat',$constraints,'$outputformat','$sampleinput',$sampleoutput,'$hiddeninput','$hiddenoutput','$_SESSION['username']'')";

		if ($conn->query($sql) == TRUE) 
		{
		  header("location:add-new-problem.php?successful");
		  exit();
		} 
		else 
		{
		  $conn->error;
		  header("location:add-new-problem.php?error");
		  exit();
		}

		$conn->close();
		
	}
	else
	{
		 header("location:add-new-problem.php?busy");
		 exit();
	}
?>