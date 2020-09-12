<?php
    session_start();
    if(!isset($_GET['output']))
    {                                                                  
        $_SESSION['outputvalue'] = "";
        $_SESSION['inputvalue'] = "";
        $_SESSION['codevalue'] = "";
    }
    if(isset($_SESSION['username']))
        include 'loggedin.php';
    else
    include 'notloggedin.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Blogs</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Problems</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="compiler.php"><button type="button" class="btn mybutton"><b>Compiler</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Submissions</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Contact Us</b></button></a>
                        </div>
                        
                        <div class = "col-1.5">
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>About Us</b></button></a>
                        </div>
                    
                </div>
            </div>
        <div class = "row space"></div>
        <div class="container">
        
            <div class="row">
                <div class = "col-3"></div>
                        <div class = "col-6">
                        <h3> <b>Compile Your Own Code </b></h3>
                    </div>

                            
                            
            </div>
                        
                            <form method="post" action="process.php">

                                <br><b>Enter Cpp code:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 200px;\" name=\"code\" class=\"form-control mb-2\">".$_SESSION['codevalue']."</textarea>";
                                ?>

                                <br><b>Input:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 100px;\" name=\"input\" class=\"form-control mb-2\">". $_SESSION['inputvalue']."</textarea>";
                                ?>

                                <br><b>Time limit in seconds:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 50px;\" name=\"limit\" class=\"form-control mb-2\">".$_SESSION['limitvalue']."</textarea>";
                                ?>
                                <br> <br><button class="btn btn-success" name="btn-send"> Submit </button>
                            </form>
                        
                    
                    
                        <br><b>Output:</b>
                     <?php

                    echo "<textarea style=\"width: 850px;height: 200px;\" class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">".$_SESSION['outputvalue']."</textarea><br><br>";
                    ?>
                
              
            </div>
        </div>



        
</body>
</html>


<?php 
    
    include 'footer.php';
?>