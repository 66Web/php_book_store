<?php
  session_start();

  $path = $_SERVER['PHP_SELF'];
  $arr = explode('/',$path);
  $root = '/'.$arr[1];

  if(!@$_SESSION['home_userid']){
     echo "<script>location='{$root}/home/login.php'</script>";
     exit;
  }
?>