<?php
include '../../../public/common/conn.php';
include '../../public/session.php';

$name = $_POST['name'];
$addr = $_POST['addr'];
$postcode = $_POST['postcode'];
$tel = $_POST['tel'];

$user_id = $_SESSION['home_userid'];

$sql = "insert into touch(name,addr,postcode,tel,user_id) values('{$name}','{$addr}','{$postcode}','{$tel}','{$user_id}')";

if(mysql_query($sql)){
   echo '<script>location="touchlist.php"</script>';
}
?>