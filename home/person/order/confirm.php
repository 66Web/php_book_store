<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

  $code = $_GET['code'];
  $confirm = 1;//只改未确认的

  $sql = "update indent set confirm={$confirm} where code='{$code}'";

  if(mysql_query($sql)){
    echo "<script>location='myorder.php'</script>";
  }
?>
