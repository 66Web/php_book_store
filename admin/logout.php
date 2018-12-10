<?php
    session_start();

    $_SESSION = array(); //清空session数组

    session_destroy();   //删除服务器上PHPSESSID所对应的session文件

    setcookie('PHPSESSID','',time()-3600,'/');  //删除客户端的cookie文件

    echo '<script>location="login.php"</script>';
?>