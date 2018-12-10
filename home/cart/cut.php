<?php
  session_start();
  include '../../public/common/conn.php';

  $id = $_GET['id'];
  $_SESSION['books'][$id]['num']--;

  if($_SESSION['books'][$id]['num']<1){
     $_SESSION['books'][$id]['num'] = 1;
  }

  echo '<script>location="index.php"</script>';
?>