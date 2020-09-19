<?php
	 $name = $_POST['username'];
	 $password1 = md5($_POST['password']);
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

	if($gender=="Female")
	{
		$pic = "images/default-avatar_female.png";
	}
	else
	{
		$pic  = "images/male.jpg";
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "170204084";

	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM user";
    $result= $conn->query($sql);


         
        while($row = $result-> fetch_assoc())
            {

               if($row["email"]==$email)
               {
                  
                 	header("location:register.php?error=duplicate-email");
                  	exit();
               }
               else if($row["username"]==$name)
               {
                  
                 	header("location:register.php?error=duplicate-username");
                  	exit();
               }
               else if($row["contactno"]==$phone)
               {
                  
                 	header("location:register.php?error=duplicate-contact");
                  	exit();
               }
         	}

	$sql = "INSERT INTO user (username,email,password,gender,contactno,birthdate,picture)
	VALUES ('$name','$email','$password1','$gender','$phone','$birthdate','$pic')";

	if ($conn->query($sql) === TRUE) 
	{
	  header("location:login.php?successful");
	  exit();
	} 
	else 
	{
	  $conn->error;
	}

	$conn->close();
	
	




 ?>