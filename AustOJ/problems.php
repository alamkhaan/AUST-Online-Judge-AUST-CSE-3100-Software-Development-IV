<?php 
    session_start();
    if(isset($_SESSION['username']))
        include 'loggedin.php';
    else
    include 'notloggedin.php';
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
                            <a href="problems.php"><button type="button" class="btn mybutton"><b>Problems</b></button></a>
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
            </div>
        <div class= "container" >
            <?php 
               
                if(isset($_GET['error']))
                {
                    
                     $Msg = "Problem Not Found";
                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                }

                         
                        
            ?>
        </div>
    <div class="container">
    	<div class="row">
    	<div class = "col-10"> </div>
    	        <form action="add-new-problem.php">

    	        	
    	        
                    <button type="Submit" class="btn loginbutton" value="Submit" name=""> Add New Problem</button>
                        

                        
                        
                </form>
                </div>
            
		<table class="table table-bordered table-striped">
		<thead class="thead-dark">
		<tr>
			<th>CodeNo</th>
			<th>ProblemsName</th>
			<th>Difficulty</th>
			<th>TotalSolved</th>
            <th>Author</th>
		</tr>
		</thead>
		<?php
		$conn = mysqli_connect("localhost","root","","170204084");
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

         $sql = "SELECT * FROM problemset";
         $result= $conn->query($sql);


         if($result-> num_rows >0){
         	while($row = $result-> fetch_assoc()){
         		echo "<tr><td>".$row["id"]."</td><td><a  href=\"problem-view.php?id=".$row["id"]."\">".$row["name"]."</a></td> <td>".$row["difficulty"]."</td><td>".$row["totalsolved"]."</td><td><a  href=\"profile.php?id=".$row["authorid"]."\">".$row["author"]."</a></td></tr>";
         	}
  
         }
         else{
         	
         }
         $conn->close();
		?>
	</table>
	</div>

</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 
    
    include 'footer.php';
?>