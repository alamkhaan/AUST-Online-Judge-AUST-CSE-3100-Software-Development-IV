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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "170204084";
    
    
        
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM project_picture where name= 'aboutus'";
    $result= $conn->query($sql);

    while($row = $result-> fetch_assoc())
    {

        $pic= $row["path"]; 
            
    }

    $sql = "SELECT * FROM developer";
    $result= $conn->query($sql);
    $i = 0;
    while($row = $result-> fetch_assoc())
    {

        if($i==0)
        {
            $d1_pic = $row["picture"]; 
            $d1_name = $row["name"]; 
            $d1_email = $row["email"]; 
            $d1_phone = $row["phone"]; 


        }
        else
        {
            $d2_pic = $row["picture"]; 
            $d2_name = $row["name"]; 
            $d2_email = $row["email"]; 
            $d2_phone = $row["phone"]; 

        }
         $i++;
            
    }

    $sql = "SELECT * FROM about_us";
    $result= $conn->query($sql);
    while($row = $result-> fetch_assoc())
    {
        $description = $row["description"]; 
        $feature = $row["feature"]; 
        $platform = $row["platform"]; 
        $language = $row["language"]; 
        $os = $row["os"]; 
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
                            <a href="contactus.php"><button type="button" class="btn homebutton"><b>Contact Us</b></button></a>
                        </div>
                        
                        <div class = "col-1.5">
                            <a href="aboutus.php"><button type="button" class="btn mybutton"><b>About Us</b></button></a>
                        </div>
                    
                </div>
                <div class ="row space"></div>
            </div>

            <div class="container">
                <div class="row">
                <div class="col-md-8">
                    <div class = "row">
                        <img src = "<?php echo $pic ?>">
                     </div>
                     <div class="row space"></div>

                     <div class = "row">
                        <h5><b> Description:</b></h5>
                    </div>
                    <div class = "row">
                        <div class = "">
                            <pre class = "aboutus-design"><?php echo $description ?></pre>
                        </div>
                     </div>
                     <div class ="row space2"></div>
                     <div class = "row">
                        <h5>Special Feature:</h5>
                    </div>
                    <div class = "row">
                        <div class = "">
                            <pre class = "aboutus-design"><?php echo $feature ?></pre>
                        </div>
                     </div>
                     <div class ="row space2"></div>
                     <div class = "row">
                        <h5> Available Language:</h5>
                    </div>
                    <div class = "row">
                        <div class = "">
                            <pre class = "aboutus-design"><?php echo $language ?></pre>
                        </div>
                     </div>
                     <div class ="row space2"></div>
                     <div class = "row">
                        <h5> Platform:</h5>
                    </div>
                    <div class = "row">
                        <div class = "">
                            <pre class = "aboutus-design"><?php echo $platform ?> </pre>
                        </div>
                     </div>
                     <div class ="row space2"></div>

                     <div class = "row">
                        <h5> Operating System:</h5>
                    </div>
                    <div class = "row">
                        <div class = "">
                            <pre class = "aboutus-design"><?php echo $os ?> </pre>
                        </div>
                     </div>


                     <div class="row space"></div>

                </div>


                <div class="col-md-4">
                    <div class="developer-box">
                            
                                <div class="developer-heading">
                                    <h4 class="developer-title"><b>Developers:</b></h4>
                                </div>

                                <div class="space2"></div>

                                <div class="developer-box2">
                            
                               
                                    <img class="developer-pic" src="<?php echo $d1_pic ?>">

                                    <div class="space2"></div>

                                    <div class="developer-description">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Name:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label ><?php echo $d1_name ?></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Email:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label><?php echo $d1_email ?></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Phone:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label><?php echo $d1_phone ?></label>
                                            </div>
                                        </div>

                                    </div>




                            </div>


                             <div class="space2"></div>

                                <div class="developer-box2">
                            
                               
                                    <img class="developer-pic" src="<?php echo $d2_pic ?>">

                                    <div class="space2"></div>

                                    <div class="developer-description">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Name:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label ><?php echo $d2_name ?></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Email:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label><?php echo $d2_email ?></label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label>Phone:</label>
                                            </div>

                                             <div class="col-md-5">
                                                <label><?php echo $d2_phone ?></label>
                                            </div>
                                        </div>

                                    </div>

                                    
                                    

                            </div>
                            
                            
                    </div>
                </div>

            </div>




            </div>



        </div>
    </body>
</html>

<?php

    include 'footer.php';

?>