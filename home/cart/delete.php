<?php
  session_start();
  include '../../public/common/conn.php';

  $id=$_GET['id'];

  unset($_SESSION['books'][$id]);

  echo '<script>location="index.php"</script>';
?>