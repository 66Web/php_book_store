<?php
  session_start();
  include '../../public/common/conn.php';

  $id = $_GET['id'];
  $sql = "select * from book where id = {$id}";
  $rst = mysql_query($sql);
  $row = mysql_fetch_assoc($rst);

  if($row['stock']=='0'){
    echo "<script>alert('《{$row['name']}》暂时无货')</script>";
    echo '<script>location="../index.php"</script>';
  }else{
    //把图书放入购物车,在图书信息的子数组中临时加一个num 默认1
    $_SESSION['books'][$id]=$row;
    $_SESSION['books'][$id]['num']=1;

    echo '<script>location="index.php"</script>';
  }
?>