<?php
	if(isset($_POST['submit']))
	{
		session_start();
		$id = $_POST['id'];
		$name = $_POST['name'];
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

		$sql = "UPDATE problemset SET name= '".$name."', difficulty= '".$difficulty."', statement= '".$statement."', timelimit= '".$timelimit."', inputformat= '".$inputformat."', constraints= '".$constraints."', outputformat= '".$outputformat."', sampleinput= '".$sampleinput."', sampleoutput= '".$sampleoutput."' ,hiddeninput= '".$hiddeninput."', hiddenoutput= '".$hiddenoutput."' WHERE id = ".$id;


		echo $sql;
		

		if ($conn->query($sql) == TRUE) 
		{
			$h =  "location:edit-problem.php?id=".$id."&successful";
		  header($h);
		  exit();
		} 
		else 
		{
		  $conn->error;
		  //header("location:edit-problem.php?error");
		  exit();
		}

		$conn->close();
		
	}
	else
	{
		 //header("location:edit-problem.php?busy");
		 exit();
	}
?>