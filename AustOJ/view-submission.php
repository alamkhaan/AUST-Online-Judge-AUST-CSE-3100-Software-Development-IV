<?php 
    session_start();
    if(isset($_SESSION['username']))
        include 'loggedin.php';
    else
    {
    	header("location:login.php?error=submissions");
    	exit();
    }
    if(!isset($_GET['id']))
    {
    	header("location:submissions.php?error");
    	exit();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "170204084";
    $id  = $_GET['id'];
    
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM submissions where id = '".$id."'";
    $result= $conn->query($sql);


    if($result->num_rows ==0){

        header("location:submissions.php?error");
        $conn->close(); 
        exit();

    }
    while($row = $result-> fetch_assoc())
    {

        $user = $row["username"];
        $code =  $row["code"];
        $problemid = $row["problem_id"];
        
            
    }
    if($user!=$_SESSION['username'])
    {
    	header("location:submissions.php?access-denied");
    	exit();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/main.css" />

        <title>AUST OJ</title>
    </head>
<body>
   
    <div class="Row"> 

        <div class="container">
                <div class="row bar">   
                    
                        <div class = "col-1.5">
                            <a href="index.php"><button type="button" class="btn homebutton"><b>Home</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="blogs.php"><button type="button" class="btn homebutton"><b>Blogs</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="problems.php"><button type="button" class="btn homebutton"><b>Problems</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="compiler.php"><button type="button" class="btn homebutton"><b>Compiler</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="submissions.php"><button type="button" class="btn homebutton"><b>Submissions</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="contactus.php"><button type="button" class="btn homebutton"><b>Contact Us</b></button></a>
                        </div>
                        
                        <div class = "col-1.5">
                            <a href="aboutus.php"><button type="button" class="btn homebutton"><b>About Us</b></button></a>
                        </div>
                    
                </div>

                <div class ="row space"></div>
            
            <div class = "row">
                    <div class = "col-md-12">
                        <h6><b>Your Submitted Code:</b></h6>
                    </div>
                    
                        <div class = "col-md-8">
                        <textarea class="textarea9"> <?php echo $code ?>   </textarea>
                   
                </div>
                        
                    </div>
               </div>
               <div class ="row space"></div>

           </div>
      </body>
 </html>

 <?php

 	include 'footer.php';

 ?>