<?php
   include '../../public/common/conn.php';
   include '../public/session.php';

   $code = $_GET['code'];
   $sql = "delete from indent where code = '{$code}'";

   if(mysql_query($sql)){
      echo '<script>location="index.php"</script>';
   }
?>