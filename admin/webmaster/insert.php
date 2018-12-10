<?php
include '../../public/common/conn.php';
include '../public/session.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "insert into admin(username,password) values('{$username}','{$password}')";

if(mysql_query($sql)){
   echo '<script>location="index.php"</script>';
}
?>