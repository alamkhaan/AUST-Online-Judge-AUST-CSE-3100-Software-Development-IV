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

  if (file_exists($cwd.'/input.txt')) 
  {
    @unlink($cwd.'/input.txt');
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

if(isset($_POST['btn-send']))
{
  $_SESSION['codevalue'] = $_POST['code'];
  $_SESSION['inputvalue'] = $_POST['input'];
  $_SESSION['limitvalue']  =$_POST['limit'];

  if(trim($_SESSION['codevalue'])=="")
  {
    $_SESSION['outputvalue'] = "Code is Empty";
    header('location:compiler.php?output');
    exit();
  }


  $hash = md5(uniqid(microtime(true), true));
  $path = dirname(__FILE__);
  $cwd = $path.'/_temp_compile/'.$hash.'/';
  @mkdir($cwd, 0777);
  file_put_contents($cwd.'file.cpp', $_POST['code']);
  chmod($cwd.'file.cpp', 0777);
  file_put_contents($cwd.'input.txt', $_POST['input']);
  chmod($cwd.'input.txt', 0777);
  // Time limit for the current program to execute
  $time_limit = min((int)$_POST['limit'], 10);
  $time_limit = max($time_limit,1);
  // Environmental variable values to set for execution
  $env = array();
  // Start time of the script
  $start_time = 0;
  // End time of the script
  $end_time = 1;
  putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");

  $compiler_descriptorspec = array(
     0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
     1 => array("file", "{$cwd}myfile.compile.output", "w"),  // stdout is a file that the child will write to
     2 => array("file", "{$cwd}error-output.txt", "w") // stderr is a file to write to
  );

  
  $process = proc_open('g++ file.cpp -std=c++11 -O2 -o myfile.out', $compiler_descriptorspec, $pipes, $cwd);
  // Validate the compiler output
  if (is_resource($process)) {
      $return_value = proc_close($process);

    //echo "Compiler output is $return_value";
    if($return_value != 0) 
    {
      $_SESSION['outputvalue'] = "Compile Error\n";
      $_SESSION['outputvalue'] .= trim(file_get_contents("{$cwd}error-output.txt"));
      header('location:compiler.php?output');
      removeFiles();
      exit;
    }
  
  }

  // Step 2 - Execute the program, only if there is no compile error
  $descriptorspec = array(
     0 => array("file", "{$cwd}input.txt", "r"),  // stdin is a pipe that the child will read from
     1 => array("file", "{$cwd}output.txt", "w"),  // stdout is a pipe that the child will write to
     2 => array("file", "{$cwd}error-output.txt", "a") // stderr is a file to write to
  );

  chmod($cwd.'myfile.out', 0777);
  // Start the Counter
  //$time_start = microtime_float();
  // Start the program execution
  $process = proc_open("{$cwd}/myfile.out", $descriptorspec, $pipes, $cwd, NULL,$env);

  // Time to sleep, for the program to complete
  //$time_limit+= 3.0;
  $time_start = microtime_float();
  //$time_limit= 2.0*1.0;
  $time_end = microtime_float();
  $time = $time_end - $time_start;

  //echo "Did nothing in $time seconds\n";
  // Now awake up to see if the execution is complete
  $cnt= 0 ;
  while(1)
  {
      $status = proc_get_status($process);
      usleep(100);
      if($status['running'])
      {
          $time_end = microtime_float();
          $time = $time_end - $time_start;
          if($time>$time_limit)
          {
              $_SESSION['outputvalue'] = "Time Limit Exceeded\n";
              $_SESSION['outputvalue'] .= $time;
              kill($status['pid']);
              proc_terminate($process);
              header('location:compiler.php?output');
              removeFiles();
              exit;
          }
      }
      else
      {
          $time_end = microtime_float();
          $time = $time_end - $time_start;
          //$_SESSION['outputvalue'] = $time;
          break;
      }
  }
  

  if(is_resource($process)) {
      // It is important that you close any pipes before calling
      // proc_close in order to avoid a deadlock
      $return_value = proc_close($process);

    $command_output = str_replace("\r\n", "\n", rtrim(trim(file_get_contents($cwd.'output.txt'))));

    if(substr($command_output, 0, 26) == "<<entering SECCOMP mode>>\n") 
    {
        $command_output = substr($command_output, 26);
    }

    if($return_value == 0 || $command_output) 
    {
      $_SESSION['outputvalue']  = "Success , ";
      $_SESSION['outputvalue'].= $time;
      $_SESSION['outputvalue'].= " s\n";
      $_SESSION['outputvalue'].= $command_output;
      header('location:compiler.php?output');
      removeFiles();
      exit;
    } 
    else 
    {
      $_SESSION['outputvalue']  = "Runtime Error , ";
      $_SESSION['outputvalue'].= $time;
      $_SESSION['outputvalue'].= " s\nExit Code = ";
      $_SESSION['outputvalue'].= $status['exitcode'];
      header('location:compiler.php?output');
      removeFiles();
      exit;
    }
  }else 
  {
    $_SESSION['outputvalue']  = "Something Wrong in Compiler ";
    header('location:compiler.php?output');
    //removeFiles();
    exit;
  }
}

?>