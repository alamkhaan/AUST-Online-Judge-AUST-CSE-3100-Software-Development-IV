<?php
    session_start();
    if(!isset($_GET['output']))
    {                                                                  
        $_SESSION['outputvalue'] = "";
        $_SESSION['inputvalue'] = "";
        $_SESSION['codevalue'] = "";
        $_SESSION['limitvalue']  ="";
    }
    include 'notloggedin.php';
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="bootstrap.css">
    
    <title>Contact Us Form</title>
</head>
<body>
   
    
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
        <div class="container">
                 
            <div class="row">
                <div class  ="log">
                </div>
                <div class="col-lg-5 m-auto">
                    <div class="card mt-5" >
                        <div class="card-title">
                            <h2 class="text-center py-2"> Compile Your Own Code </h2>
                            <hr>
                            <?php 
                                $Msg = "";
                                if(isset($_GET['error']))
                                {
                                    $Msg = " Please Fill in the Blanks ";
                                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                                }
                        
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="post" action="process.php">
                                <b>Enter Cpp code:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 200px;\" name=\"code\" class=\"form-control mb-2\">".$_SESSION['codevalue']."</textarea>";
                                ?>

                                <b>Input:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 100px;\" name=\"input\" class=\"form-control mb-2\">". $_SESSION['inputvalue']."</textarea>";
                                ?>

                                <b>Time limit in seconds:</b>
                                <?php 
                                echo "<textarea style=\"width: 850px;height: 50px;\" name=\"limit\" class=\"form-control mb-2\">".$_SESSION['limitvalue']."</textarea>";
                                ?>
                                <button class="btn btn-success" name="btn-send"> Submit </button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                    <b>Output:</b>
                    <?php
                    echo "<textarea class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\">".$_SESSION['outputvalue']."</textarea><br><br>";
                    ?>
                
              
            </div>


        
</body>
</html>


<?php 
    
    include 'footer.php';
?>