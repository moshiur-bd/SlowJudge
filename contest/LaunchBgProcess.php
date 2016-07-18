<?php
function LaunchBackgroundProcess($command){
  // Run command Asynchroniously (in a separate thread)
  if(PHP_OS=='WINNT' || PHP_OS=='WIN32' || PHP_OS=='Windows'){
    // Windows
    $command = 'start /MIN "" '. $command;
  } else {
    // Linux/UNIX
    $command = $command .' /dev/null &';
  }
  $handle = popen($command, 'r');
  if($handle!=false){
    pclose($handle);
    return true;
  } else {
    return false;
  }
}
?>