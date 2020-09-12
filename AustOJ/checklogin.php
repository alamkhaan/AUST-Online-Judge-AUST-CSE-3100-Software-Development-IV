<?php

   $email = $_POST['email'];
   $password = $_POST['password'];
		$conn = mysqli_connect("localhost","root","","austoj");
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT * FROM user";
         $result= $conn->query($sql);


         if($result-> num_rows >0){
         	while($row = $result-> fetch_assoc())
            {

               if($row["email"]==$email && $row["password"]==$password)
               {
                  
                  
                  //header("location:login.php?successful");
                  session_start();
                  $_SESSION['username'] = $row["username"];
                  $conn->close();
                  header("location:index.php");
                  session_end();
                  exit();
               }
         	}
         	
         }

      $conn->close(); 
         
      header("location:register.php?error=notmatched");
      exit();
?>