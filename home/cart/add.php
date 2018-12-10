<?php
  session_start();
  include '../../public/common/conn.php';

  $id = $_GET['id'];
  $_SESSION['books'][$id]['num']++;

  if($_SESSION['books'][$id]['num'] > $_SESSION['books'][$id]['stock']){
       $_SESSION['books'][$id]['num'] = $_SESSION['books'][$id]['stock'];
  }

  echo '<script>location="index.php"</script>';
?>