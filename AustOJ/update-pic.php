<?php
	if(isset($_POST['btn-send']))
	{
		session_start();
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "170204084";

		$target_dir = "images/";
		$file = $_FILES['pic-upload']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['pic-upload']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		 
		
		if (file_exists($path_filename_ext)) 
		{
			while(file_exists($path_filename_ext))
			{
				$filename .= "1";
				$path_filename_ext = $target_dir.$filename.".".$ext;
			}
		 	move_uploaded_file($temp_name,$path_filename_ext);
		}
	    else
	    {
	  		 move_uploaded_file($temp_name,$path_filename_ext);
			 
		}
		
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$filename = "images/".$filename.".".$ext;
	    $sql = "UPDATE user Set picture = '".$filename."' where username = '".$_SESSION['username']."'";

		if ($conn->query($sql) === TRUE) 
		{
			$s = "location:profile.php?id=".$_SESSION['id']."";
			
			header($s);
			exit();
		}
	}
	else
	{
		echo "not";
	}


?>