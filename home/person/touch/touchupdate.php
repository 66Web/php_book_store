<?php
    include '../../../public/common/conn.php';
    include '../../public/session.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $addr = $_POST['addr'];
    $postcode = $_POST['postcode'];
    $tel = $_POST['tel'];

    $sql = "update touch set name='{$name}',addr='{$addr}',postcode='{$postcode}',tel='{$tel}' where id = {$id} ";

    if(mysql_query($sql)){
       echo '<script>location="touchlist.php"</script>';
    }
?>