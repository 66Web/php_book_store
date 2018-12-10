<?php
include '../public/common/conn.php';
include '../public/common/mysql.class.php';

//根据username查询user表
$sql = "select * from user where username = '".$_GET['username']."'";

//获取查询结果的记录数
$num = $conne->getRowsNum($sql);
if($num == 1){                 //如果有记录
   echo '2';
}else if($num == 0){           //如果没有记录
   echo '1';
}else{
   echo $conne->msg_error();   //否则出错
}

?>