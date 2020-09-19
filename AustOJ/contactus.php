<?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        include 'loggedin.php';
    }
    else
    {
        include 'notloggedin.php';
    }
    $conn = new mysqli("localhost", "root","", "170204084");
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM project_picture where name= 'contact'";
    $result= $conn->query($sql);

    while($row = $result-> fetch_assoc())
    {

        $pic= $row["path"]; 
            
    }

    $conn->close();
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
                            <a href="contactus.php"><button type="button" class="btn mybutton"><b>Contact Us</b></button></a>
                        </div>
                        
                        <div class = "col-1.5">
                            <a href="aboutus.php"><button type="button" class="btn homebutton"><b>About Us</b></button></a>
                        </div>
                    
                </div>
                <div class ="row space"></div>
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
                    $val = "Your Response Sent Successfully";
                    
                    echo '<div class="alert alert-success">'.$val.'</div>';
                }

                         
                        
            ?>
            </div>
            
            <div class="container signup-content">
                <div class="row"> 
                    <div class="col-md-1">
                    </div>

                    <div class="col-md-5">

                        <img src="<?php echo $pic?>" class = "signuppic-design">
                    </div>
                    <div class="col-md-5 formdesign">
                        <form action="add-contactus-database.php" method="POST">

                        <h4 class = "signup-title"><b>Send Your Message</b></h4><br>


                        <div class = "row">
                           
                            <div class = "col-md-4 contact-form-row">
                                <label>Name:</label>
                            </div>
                            <div class = "col-md-7">
                                <input class="textarea6"  type="text" name="username" required=""  placeholder="Enter Your Name">
                            </div>
                        </div>



                        <div class="row space2"></div>


                        <div class = "row">
                           
                            <div class = "col-md-4 contact-form-row">
                                <label>Email:</label>
                            </div>
                            <div class = "col-md-7">
                                <input class="textarea6"  type="email" name="email"  required="" placeholder="Enter Your Email">
                            </div>
                        </div>


                        <div class="row space2"></div>



                        
                        <div class = "row">
                           
                            <div class = "col-md-4 contact-form-row">
                                <label>Contact No:</label>
                            </div>
                            <div class = "col-md-7">
                                <textarea class="textarea6" name= "contactNo" required=""placeholder="01"></textarea>
                            </div>
                        </div>

                        <div class="row space2"></div>

                         <div class = "row">
                           
                            <div class = "col-md-4 contact-form-row">
                                <label>Problems:</label>
                            </div>
                            <div class = "col-md-7">
                                <textarea class="textarea5" name= "problems" required=""placeholder="Enter Message:"></textarea>
                            </div>
                        </div>

                        <div class="row space2"></div>
                        <div class = "row">
                           
                            <div class = "col-md-4 contact-form-row">
                                <label>Suggestions:</label>
                            </div>
                            <div class = "col-md-7">
                                <textarea class="textarea5" name= "suggestions" required=""placeholder="Enter Message:"></textarea>
                            </div>
                        </div>


                        <div class = "contactus-form-submit">
                            <button type="Submit" class="btn loginbutton" value="Submit" name="submit"> Submit</button>
                        </div>
                        
                </form>

                
                <div class ="row space2"></div>

            </div>
            
            

                </div>
                <div class ="row space"></div>
            </div>
            <div class ="row space"></div>
           
        </div>
       

    </body>
    </html>


<?php 
    
    include 'footer.php';
?>