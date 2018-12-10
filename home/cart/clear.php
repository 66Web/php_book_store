<?php
  session_start();
  include '../../public/common/conn.php';

  $_SESSION['books']=array();

  echo '<script>location="index.php"</script>';
?>