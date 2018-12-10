<?php
    session_start();

    $arr=$_SESSION['books'];

    $_SESSION = array(); //清空session数组

    $_SESSION['books']=$arr;

    $_SESSION['home_username'] = 0;

    echo '<script>location="login.php"</script>';
?>