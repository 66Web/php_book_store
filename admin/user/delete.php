<?php
   include '../../public/common/conn.php';
   include '../public/session.php';

   $id = $_GET['id'];
   $img = $_GET['img'];
   $file="../../public/upusers/{$img}";
   $file2="../../public/upusers/thumb_{$img}";
   $sql = "delete from user where id = {$id}";

   if(mysql_query($sql)){
      //删除图片
      unlink($file);
      unlink($file2);

      echo '<script>location="index.php"</script>';
   }
?>