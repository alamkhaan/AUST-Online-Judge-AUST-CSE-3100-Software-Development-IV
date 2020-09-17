<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        include 'loggedin.php';
    }
    else
    {
        header("location:login.php?error=add-new-problem");
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
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>


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
                            <a href="problems.php"><button type="button" class="btn homebutton"><b>Problems</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="compiler.php"><button type="button" class="btn homebutton"><b>Compiler</b></button></a>
                        </div>
                        <div class = "col-1.5">
                            <a href="https://codeforces.com"><button type="button" class="btn homebutton"><b>Submissions</b></button></a>
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
            <div class="container">
             <?php 
                
                if(isset($_GET['error']))
                {
                    $val = "Error Occured";
                    
                    echo '<div class="alert alert-danger">'.$val.'</div>';
                }
                else if(isset($_GET['busy']))
                {
                    $val = "Server is Busy";
                    
                    echo '<div class="alert alert-danger">'.$val.'</div>';
                }
                else if(isset($_GET['successful']))
                {
                    $val = "Problem Added Successfully";
                    
                    echo '<div class="alert alert-success">'.$val.'</div>';
                }

                         
                        
            ?>
        </div>
            <div class="container new-problem-design">
                <div class ="row space"></div>

                
            
                <form action="add-problem-database.php" method = "post"> 
                <h3 class="new-problem-heading">Add a new Problem</h3>
                <div class ="row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Title:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea1" name= "title" required=""></textarea>
                    </div>
                </div>


                <div class ="row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Time Limit:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <SELECT name ="timelimit"class="textarea1"  >
                             <option value="1">1 Second</option>
                             <option value="2">2 Seconds</option>
                             <option value="3">3 Seconds</option>
                             <option value="4">4 Seconds</option>
                             <option value="5">5 Seconds</option>
                             <option value="6">6 Seconds</option>
                             <option value="7">7 Seconds</option>
                             <option value="8">8 Seconds</option>
                             <option value="9">9 Seconds</option>
                             <option value="10">10 Seconds</option>
                        </SELECT>
                    </div>
                </div>
                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Difficulty:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <SELECT name ="difficulty"class="textarea1"  >
                             <option value="Easy">Easy</option>
                             <option value="Medium">Medium</option>
                             <option value="Hard">Hard</option>
                            
                        </SELECT>
                    </div>
                </div>
                <div class = "row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Statement:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea3" name="statement" required=""></textarea>
                    </div>
                </div>
                <div class = "row space"></div>

                

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Input Format:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="inputformat" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Constraints:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="constraints" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Output Format:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="outputformat" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Sample Input:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="sampleinput" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Sample Output:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="sampleoutput" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Hidden Input:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="hiddeninput" required=""></textarea>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Hidden Output:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <textarea class="textarea2" name="hiddenoutput" required=""></textarea>
                    </div>
                </div>

                <div class = "row add-problem-button">
                    <button type="submit" class="btn loginbutton" name="submit"> Add Problem</button>
                </div>


                

            </form>


            <div class = "row space"></div>


            </div>
            <div class = "row space"></div>
        </div>
    </body>

</html>




