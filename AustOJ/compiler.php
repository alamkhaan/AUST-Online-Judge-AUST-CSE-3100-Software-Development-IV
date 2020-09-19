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
                            <a href="compiler.php"><button type="button" class="btn mybutton"><b>Compiler</b></button></a>
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
            </div>
        <div class = "row space"></div>
        <div class="container ">
            <div class = "compile-form">
                <div class = "row space"></div>
                <div class="col-12 row">
                
                    <div class = "compiler-header">
                        <h3> <b>Compile Your Own Code </b></h3>
                    </div>

                            
                            
            
                        
                    <form method="post" action="process.php">

                                

                                <br><b>Enter Cpp code:</b><br>
                                <?php 
                                echo "<textarea style=\"width: 100%;height: 400px;\" name=\"code\" class=\"form-control mb-2\">".$_SESSION['codevalue']."</textarea>";
                                ?>

                                <br><b>Input:</b><br>
                                <?php 
                                echo "<textarea style=\"width: 100%;height: 300px;\" name=\"input\" class=\"form-control mb-2\">". $_SESSION['inputvalue']."</textarea>";
                                ?>

                                <br> <br><button class="btn loginbutton" name="btn-send"> Submit </button>

                                <br><br><b>Output:</b>
                         <?php

                        echo "<textarea style=\"width: 850px;height: 400px;\" class=\"form-control mb-2\" name=\"output\" >".$_SESSION['outputvalue']."</textarea><br><br>";
                        ?>
                    </form>
                        
                    
                    
                        
                
                </div>
            </div>
        </div>
    </div>



        
</body>
</html>


<?php 
    
    include 'footer.php';
?>