<?php 
    session_start();
    if(isset($_SESSION['username']))
        include 'loggedin.php';
    else
    include 'notloggedin.php';
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "170204084";
    if(isset($_GET['id']))
    {
        $id  = $_GET['id'];
    }
    else $id = "";
    
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM problemset where id = '".$id."'";
    $result= $conn->query($sql);


    if($result->num_rows ==0){

        header('location:problems.php?error');
        $conn->close(); 
        exit();

    }
    while($row = $result-> fetch_assoc())
    {

        $name = $row["name"];
        $timelimit= $row['timelimit'];
        $difficulty = $row['difficulty'];
        $statement = $row['statement'];
        $inputformat = $row['inputformat'];
        $constraints = $row['constraints'];
        $outputformat =  $row['outputformat'];
        $sampleinput = $row['sampleinput'];
        $sampleoutput = $row['sampleoutput'];
        $hiddeninput = $row['hiddeninput'];
        $hiddenoutput = $row['hiddenoutput'];
        $author = $row['author'];
            
    }

    $conn->close(); 

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
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
            </div>

            <div class = "container">
                <?php 
                
                if(isset($_GET['error']))
                {
                    $val = "You don't have permission to edit this problem";
                    
                    echo '<div class="alert alert-danger">'.$val.'</div>';
                }
                ?>
                <div class="row">
                    <div class = "col-10"> </div>
                    
                         <button onclick="check()" class="btn loginbutton" value="Submit" name="">Edit Problem</button>   
                
                </div>
                <div class ="row space"></div>
                    <div class = "row">
                        <div class = "problem-header">
                            <h3 ><b><?php echo $name ?></b></h3>
                            <h4>Problem Id :<?php echo $id ?></h4>
                            <h6>Time limit : <?php echo $timelimit ?> seconds</h6>
                            <h6>input: standard input</h6>

                            <h6>output: standard output</h6>
                        </div>
                    </div>
                <div class ="row space"></div>
                <div class = "row">
                    <div class = "problem-design">
                        <pre class = "statement"><?php echo $statement ?> </pre>
                    </div>
                </div>


                <div class ="row space"></div>
                <div class = "row">
                    <div class = "col-md-12 problem-design">
                        <h6><b>Input Format:</b></h6>
                        <pre class = "statement"><?php echo $inputformat ?> </pre>
                    </div>
               </div>

                
                <div class = "row">
                    <div class = "problem-design">
                        <h6><b>Constraints:</b></h6>
                        <pre class = "statement"><?php echo $constraints ?> </pre>
                    </div>
               </div>


               
                <div class = "row">
                    <div class = "problem-design">
                        <h6><b>Output Format:</b></h6>
                        <pre class = "statement"><?php echo $outputformat ?> </pre>
                    </div>
               </div>

               <div class = "row space"></div>

                 <div class = "row">
                    <div class = "problem-design">
                        <h6><b>Sample Input:</b></h6>
                        <pre class = "input-design"><?php echo $sampleinput ?> </pre>
                    </div>
               </div>

                <div class = "row">
                    <div class = "problem-design">
                        <h6><b>Sample Output:</b></h6>
                            <pre class = "input-design"><?php echo $sampleoutput ?> </pre>
                    </div>
               </div>

               <div class = "row space"></div>

                 
                <form action="problem-submit.php?id=<?php echo $id?>" method="post">
                        <div>
                            <h6><b>Enter cpp code:</b></h6>
                            <textarea class= "textarea4" name ="code"></textarea>
                        </div>
                        <div class = "row space"></div>
                        <button type="submit" class="btn loginbutton " value="Submit" name="submit">Submit</button>

                </form>
               
               <div class = "row space"></div>


            </div>




        </div>
    </body>
<script type="text/javascript">
    
    function check()
    {
        
        window.location="edit-problem.php?id=<?php echo $id ?>";
    }
</script>

</html>




<?php 
    
    include 'footer.php';
?>