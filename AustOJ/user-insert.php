<?php
	 $name = $_POST['username'];
	 $password1 = $_POST['password'];
	 $gender = $_POST['gender'];
	 $email = $_POST['email'];
	 $phone = $_POST['contactNo'];
	 $birthdate = $_POST['birthday'];


 	if(strlen($password1)<8)
 	{
 		header("location:register.php?error=password");
 		exit();
 	}

 	if(strlen($phone)!=11)
 	{
 		header("location:register.php?error=phone1");
 		exit();
 	}

 	for ($i = 0; $i < strlen($phone); $i++)
 	{
    	if(!($phone[$i]>='0' && $phone[$i]<='9'))
    	{
    		
    		header("location:register.php?error=phone2");
 			exit();
    	}
	}
	if(!($phone[0]=='0' && $phone[1]=='1' && $phone[2]>='3'))
	{
		header("location:register.php?error=phone3");
 		exit();
	}

	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "austoj";

	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO user (username,email,password,gender,contactno,birthdate)
	VALUES ('$username','$email','$password1','$gender','$phone','$birthdate')";

	if ($conn->query($sql) === TRUE) 
	{
	  echo "New record Uploaded successfully";
	} 
	else 
	{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	




 ?>