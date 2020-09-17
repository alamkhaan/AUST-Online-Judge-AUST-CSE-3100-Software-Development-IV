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
    if(isset($_GET['id']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "austoj";
        $id = $_GET['id'];
        
            
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

        if($author!=$_SESSION['username'])
        {
            $h  = "location:problem-view.php?id=".$id."&error";
            header($h);
        }
    }
    else
    {
        header('location:problems.php?error');
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
                    $val = "Problem updated Successfully";
                    
                    echo '<div class="alert alert-success">'.$val.'</div>';
                }

                         
                        
            ?>
        </div>
            <div class="container new-problem-design">
                <div class ="row space"></div>

                
            
                <form action="update-problem-database.php" method = "post"> 
                <h3 class="new-problem-heading">Update Problem</h3>

                <div class ="row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Problem Id:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea readonly class=\"textarea1\" name= \"id\">$id</textarea>";?>
                        
                    </div>
                </div>


                <div class ="row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Title:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea class=\"textarea1\" name= \"name\">$name</textarea>";?>
                    </div>
                </div>


                <div class ="row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Time Limit:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <SELECT name ="timelimit"class="textarea1" id="timelimit" >
                             <option <?php if($timelimit==1) echo"selected=\"selected\""; ?> value="1">1 Second</option>
                             <option <?php if($timelimit==2) echo"selected=\"selected\""; ?> value="2">2 Seconds</option>
                             <option <?php if($timelimit==3) echo"selected=\"selected\""; ?>value="3">3 Seconds</option>
                             <option <?php if($timelimit==4) echo"selected=\"selected\""; ?>value="4">4 Seconds</option>
                             <option <?php if($timelimit==5) echo"selected=\"selected\""; ?>value="5">5 Seconds</option>
                             <option <?php if($timelimit==6) echo"selected=\"selected\""; ?>value="6">6 Seconds</option>
                             <option <?php if($timelimit==7) echo"selected=\"selected\""; ?>value="7">7 Seconds</option>
                             <option <?php if($timelimit==8) echo"selected=\"selected\""; ?>value="8">8 Seconds</option>
                             <option <?php if($timelimit==9) echo"selected=\"selected\""; ?>value="9">9 Seconds</option>
                             <option <?php if($timelimit==10) echo"selected=\"selected\""; ?>value="10">10 Seconds</option>
                        </SELECT>
                    </div>
                </div>
                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Difficulty:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <SELECT name ="difficulty"class="textarea1"  id="difficulty">
                             <option <?php if($difficulty=="Easy") echo"selected=\"selected\""; ?>value="Easy">Easy</option>
                             <option <?php if($difficulty=="Medium") echo"selected=\"selected\""; ?>value="Medium">Medium</option>
                             <option <?php if($difficulty=="Hard") echo"selected=\"selected\""; ?>value="Hard">Hard</option>
                            
                        </SELECT>
                    </div>
                </div>
                <div class = "row space"></div>


                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Statement:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea3\" required =\"\"name= \"statement\">$statement</textarea>";?>
                    </div>
                </div>
                <div class = "row space"></div>

                

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Input Format:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"inputformat\">$inputformat</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Constraints:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"constraints\">$constraints</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>

                <div class = "row">
                    <div class = "col-md-2">
                        <label><b>Output Format:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"outputformat\">$outputformat</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Sample Input:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"sampleinput\">$sampleinput</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Sample Output:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"sampleoutput\">$sampleoutput</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Hidden Input:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"hiddeninput\">$hiddeninput</textarea>";?>
                    </div>
                </div>

                <div class = "row space"></div>
                <div class = "row" >                    
                    <div class = "col-md-2">
                        <label><b>Hidden Output:</b></label>
                    </div>
                    <div class = "col-md-8">
                        <?php echo "<textarea  class=\"textarea2\" required =\"\"name= \"hiddenoutput\">$hiddenoutput</textarea>";?>
                    </div>
                </div>

                <div class = "row add-problem-button">
                    <button type="submit" class="btn loginbutton" name="submit"> Update Problem</button>
                </div>


                

            </form>


            <div class = "row space"></div>


            </div>
            <div class = "row space"></div>
        </div>
    </body>


</html>




