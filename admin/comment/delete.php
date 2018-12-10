<?php
        include '../../public/common/conn.php';
        include '../public/session.php';

        $id=$_GET['id'];
        $sql="delete from comment where id={$id}";

        if(mysql_query($sql)){
            echo '<script>location="index.php"</script>';
        }
?>