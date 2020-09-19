<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE);

function kill($pid)
{ 
    return stripos(php_uname('s'), 'win')>-1  ? exec("taskkill /F /T /PID $pid") : exec("kill -9 $pid");
}

function removeFiles() 
{
  
  global $cwd;
  if (file_exists($cwd.'/error-output.txt')) 
  {
    @unlink($cwd.'/error-output.txt');
  }

  if (file_exists($cwd.'/file.cpp')) 
  {
    @unlink($cwd.'/file.cpp');
  }

  if (file_exists($cwd.'/input1.txt')) 
  {
    @unlink($cwd.'/input1.txt');
  }
  if (file_exists($cwd.'/input2.txt')) 
  {
    @unlink($cwd.'/input2.txt');
  }

  if (file_exists($cwd.'/myfile.compile.output')) 
  {
    @unlink($cwd.'/myfile.compile.output');
  }

  if (file_exists($cwd.'/myfile.out')) 
  {
    @unlink($cwd.'/myfile.out');
  }

  if (file_exists($cwd.'/output.txt')) 
  {
    @unlink($cwd.'/output.txt');
  }
  @rmdir($cwd);
}


function microtime_float()
{
      list($usec, $sec) = explode(" ", microtime());
      return ((float)$usec + (float)$sec);
}

if(isset($_POST['submit'] ))
{
  $codevalue = $_POST['code'];


    $dbname = "170204084";
    $username = $_SESSION['username'];
    if(isset($_GET['id']))
    {
        $id  = $_GET['id'];
    }
    else $id = "";
    
        
    $conn = new mysqli("localhost","root", "", $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM problemset where id = '".$id."'";
    $result= $conn->query($sql);

    while($row = $result-> fetch_assoc())
    {

        $name = $row["name"];
        $timelimit= $row['timelimit'];
        $sampleinput = $row['sampleinput'];
        $sampleoutput = $row['sampleoutput'];
        $hiddeninput = $row['hiddeninput'];
        $hiddenoutput = $row['hiddenoutput'];
            
    }

    


  $hash = md5(uniqid(microtime(true), true));
  $path = dirname(__FILE__);
  $cwd = $path.'/_temp_compile/'.$hash.'/';
  @mkdir($cwd, 0777);
  file_put_contents($cwd.'file.cpp', $_POST['code']);
  chmod($cwd.'file.cpp', 0777);
  file_put_contents($cwd.'input1.txt', $sampleinput);
 
  chmod($cwd.'input1.txt', 0777);

   file_put_contents($cwd.'input2.txt', $hiddeninput);
    chmod($cwd.'input2.txt', 0777);

  $time_limit = $timelimit;
  
  $env = array();
  
 
  putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");

  $compiler_descriptorspec = array(
     0 => array("pipe", "r"),  
     1 => array("file", "{$cwd}myfile.compile.output", "w"),  
     2 => array("file", "{$cwd}error-output.txt", "w")
  );
  $time_limit +=3;
  
  $process = proc_open('g++ file.cpp -std=c++11 -O2 -o myfile.out', $compiler_descriptorspec, $pipes, $cwd);

  if (is_resource($process)) {
      $return_value = proc_close($process);


    if($return_value != 0) 
    {
      $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
        VALUES ('$username',$id,'$name','Compile Error','$codevalue')";

        if($conn->query($sql)==TRUE)
        {
            removeFiles();
        
            header('location:submissions.php');
            exit();
        }
        else
        {
            removeFiles();
        
            header('location:index.php');
            exit();
        }
        
          
    }
  
  }

  // Step 2 - Execute the program, only if there is no compile error
  $descriptorspec = array(
     0 => array("file", "{$cwd}input1.txt", "r"),  // stdin is a pipe that the child will read from
     1 => array("file", "{$cwd}output.txt", "w"),  // stdout is a pipe that the child will write to
     2 => array("file", "{$cwd}error-output.txt", "a") // stderr is a file to write to
  );

  chmod($cwd.'myfile.out', 0777);
  
  // Start the program execution
  $process = proc_open("{$cwd}/myfile.out", $descriptorspec, $pipes, $cwd, NULL,$env);

  
  $time_start = microtime_float();
  
  

  
  while(1)
  {
      usleep(100000);
      $status = proc_get_status($process);
      
      if($status['running'])
      {
          $time_end = microtime_float();
          $time = $time_end - $time_start;
          if($time>$time_limit)
          {
              
              kill($status['pid']);
              proc_terminate($process);

                $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
                VALUES ('$username',$id,'$name','Time Limit Exceeded','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
          }
      }
      else
      {
          
          
          break;
      }
  }
  

  if(is_resource($process)) {
      
      $return_value = proc_close($process);

    $command_output = str_replace("\r\n", "\n", rtrim(trim(file_get_contents($cwd.'output.txt'))));

    if(substr($command_output, 0, 26) == "<<entering SECCOMP mode>>\n") 
    {
        $command_output = substr($command_output, 26);
    }

    if($return_value == 0 || $command_output) 
    {
      if(trim($command_output)!=trim($sampleoutput))
      {
            $val = "Wrong Answer";
              $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
            VALUES ('$username',$id,'$name','$val','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
      }
     
      
























       $descriptorspec = array(
     0 => array("file", "{$cwd}input2.txt", "r"),  // stdin is a pipe that the child will read from
     1 => array("file", "{$cwd}output.txt", "w"),  // stdout is a pipe that the child will write to
     2 => array("file", "{$cwd}error-output.txt", "a") // stderr is a file to write to
  );

  chmod($cwd.'myfile.out', 0777);
  
  // Start the program execution
  $process = proc_open("{$cwd}/myfile.out", $descriptorspec, $pipes, $cwd, NULL,$env);

  
  $time_start = microtime_float();
  
  

  
  while(1)
  {
      usleep(100000);
      $status = proc_get_status($process);
      
      if($status['running'])
      {
          $time_end = microtime_float();
          $time = $time_end - $time_start;
          if($time>$time_limit)
          {
              
              kill($status['pid']);
              proc_terminate($process);

                $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
                VALUES ('$username',$id,'$name','Time Limit Exceeded','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
          }
      }
      else
      {
          
          
          break;
      }
  }
  

  if(is_resource($process)) {
      
      $return_value = proc_close($process);

    $command_output = str_replace("\r\n", "\n", rtrim(trim(file_get_contents($cwd.'output.txt'))));

    if(substr($command_output, 0, 26) == "<<entering SECCOMP mode>>\n") 
    {
        $command_output = substr($command_output, 26);
    }

    if($return_value == 0 || $command_output) 
    {
      if(trim($command_output)!=trim($hiddenoutput))
      {
            $val = "Wrong Answer";
        }
        else
        {

            $val = "Accepted";
        }

        if($val=="Accepted")
        {
            $sql = "UPDATE problemset SET totalsolved =totalsolved+1 where id ='".$id."'";
            $conn->query($sql);
        }


              $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
            VALUES ('$username',$id,'$name','$val','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
      
     
      
     
      
    } 
    else 
    {
        $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
            VALUES ('$username',$id,'$name','Runtime Error','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
    }
  }
  else 
  {
    $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
    VALUES ('$username',$id,'$name','Runtime Error','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
    
  }
































     
      
    } 
    else 
    {
        $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
            VALUES ('$username',$id,'$name','Runtime Error','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
    }
  }
  else 
  {
    $sql = "INSERT INTO submissions (username,problem_id,problemname,verdict,code)
    VALUES ('$username',$id,'$name','Wrong Answer','$codevalue')";

                if($conn->query($sql)==TRUE)
                {
                    removeFiles();
                
                    header('location:submissions.php');
                    exit();
                }
                else
                {
                    removeFiles();
                
                    header('location:index.php');
                    exit();
                }
    
  }
}

?>