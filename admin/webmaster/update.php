<?php
 include '../../public/common/conn.php';
 include '../public/session.php';

 $password = md5($_POST['password']);
 $id = $_POST['id'];

 $sql = "update admin set password='{$password}' where id = {$id}";

 if(mysql_query($sql)){
    $_SESSION=array();
    session_destroy();
    setcookie('PHPSESSID','',time()-3600,'/');

    echo '<script>location="../login.php"</script>';
 }
?>