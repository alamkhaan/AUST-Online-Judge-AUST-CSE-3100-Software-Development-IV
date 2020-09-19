<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        include 'loggedin.php';
    }
    else
    {
        header('location:login.php?error');
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
                <div class="row">   
                    
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
                            <a href="submissions.php"><button type="button" class="btn mybutton"><b>Submissions</b></button></a>
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
                    
                    $Msg = "Submission Not Found";
                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                }
                else if(isset($_GET['access-denied']))
                {
                    $Msg = "Access Denied\nYou cannot view this submission";
                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                }

                         
                        
            ?>
        </div>
            <div class="container">
                
                <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Submission Id</th>
                    <th>Time</th>
                    <th>Problem Id</th>
                    <th>Problem Name</th>
                    <th>Verdict</th>
                    
                </tr>
                </thead>
                <?php
                $conn = mysqli_connect("localhost","root","","170204084");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                 }

                 $sql = "SELECT * FROM submissions  where username = '".$_SESSION['username']."' ORDER BY id desc";
                 $result= $conn->query($sql);


                 if($result-> num_rows >0){
                    while($row = $result-> fetch_assoc()){
                        echo "<tr><td><a  href=\"view-submission.php?id=".$row["id"]."\">".$row["id"]."</a>
                        </td> <td>".$row["time"]."</td><td><a  href=\"problem-view.php?id=".$row["problem_id"]."\">".$row["problem_id"]."</a></td><td>".$row["problemname"]."</td>";

                        if($row["verdict"]=="Accepted")
                        {
                            $design = "verdict-accepted";
                        }
                        else if($row["verdict"]=="Wrong Answer")
                        {
                            $design = "verdict-wronganswer";
                        }
                        else if($row["verdict"]=="Time Limit Exceeded")
                        {
                            $design = "verdict-timelimit";
                        }
                        else if($row["verdict"]=="Runtime Error")
                        {
                            $design = "verdict-runtime";
                        }
                        else if($row["verdict"]=="Compile Error")
                        {
                            $design = "verdict-compile";
                        }
                        echo "<td class=\"".$design."\">".$row["verdict"]."</td></tr>";


                       
                    }
          
                 }
                 else{
                    
                 }
                 $conn->close();
                ?>
            </table>
            </div>

            </div>
    </body>
</html>

<?php 
    
    include 'footer.php';
?>