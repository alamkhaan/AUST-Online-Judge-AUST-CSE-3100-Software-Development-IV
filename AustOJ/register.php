<?php
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
                            <a href="compiler.php"><button type="button" class="btn homebutton"><b>Compiler</b></button></a>
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
                <div class ="row space"></div>
            <?php 
                $Msg = "";
                if(isset($_GET['error']))
                {
                    $val = $_GET['error'];
                    if($val=="password")
                        $Msg = " Password should be at least 8 characters ";
                    else if($val=="phone1")
                        $Msg = " Conatact No. should be 11 characters ";
                    else if($val=="phone2")
                        $Msg = " Conatact No. should be in digits ";
                    else if($val=="phone3")
                        $Msg = " Conatact No. is invalid ";


                    echo '<div class="alert alert-danger">'.$Msg.'</div>';
                }

                         
                        
            ?>
            </div>
            
            <div class="container signup-content">
                <div class="row"> 
                    <div class="col-1">
                    </div>
                    <div class="col-5 formdesign">
                        <form action="user-insert.php" method="POST">

                        <h4 class = "signup-title"><b>Register in AUST OJ</b></h4><br>


                        <div class = "login-form-row">
                            <label  class="col-4">Name:</label>
                            <input class="col-6" type="text" name="username" required=""  placeholder="Enter Your Name"><br>
                        </div>
                        <div class = "login-form-row">
                            <label  class="col-4">Password:</label>
                            <input class="col-6" type="Password" name="password"  required="" placeholder="Enter Your Password"><br>
                        </div>

                        <div class = "login-form-row">
                            <label  class="col-4">Gender:</label>
                            <input  type="radio" name="gender" value="Male" required=""><label>Male</label>
                            <input class="radiobutton" type="radio" name="gender" value="Female" required=""><label>Female</label>
                            <input class="radiobutton" type="radio" name="gender" value="Other" required=""><label>Other</label><br>
                            
                        </div>



                        <div class = "login-form-row">
                            <label  class="col-4">Email:</label>
                            <input class="col-6" type="email" name="email"  required="" placeholder="Enter Your Email"><br>
                        </div>

                        <div class = "login-form-row">
                            <label  class="col-4">Contact No:</label>
                            <input class="col-6" name="contactNo"  required="" placeholder="01"><br>
                        </div>

                        <div class = "login-form-row">
                            <label  class="col-4">Date of Birth:</label>
                            <input class="col-6" type="date" name="birthday"  required="" placeholder=""><br>
                        </div>

                         <div class="login-form-row">
                            <input class ="col-3"type="checkbox" name="agree-term" required="" />
                            <label class="col-7">I agree all terms and conditions </label>
                        </div>

                        <div class = "signup-form-submit">
                            <button type="Submit" class="btn loginbutton" value="Submit" name=""> Submit</button>
                        </div>
                        
                </form>

                <div class = "already-account">
                    <a  href="login.php">Already have an account?</a><br>
                </div>
                <div class ="row space"></div>

            </div>
            <div class="col-1">
                    </div>
            <div class="col-4">

                <img src="images/signup-image.jpg" class = "signuppic-design">
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