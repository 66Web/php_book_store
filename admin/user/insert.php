<?php
include '../../public/common/conn.php';
include '../../public/common/function.php';
include '../public/session.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$realname = $_POST['realname'];
$sex = $_POST['sex'];

//图片上传
$src = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.',$name));
$dst = '../../public/upusers/'.time().mt_rand().'.'.$ext;

if(move_uploaded_file($src,$dst)){
    //进行图片缩放50*50

    thumb($dst,50,50);
    $img = basename($dst);

    $sql = "insert into user(username,password,realname,sex,img) values('{$username}','{$password}','{$realname}','{$sex}','{$img}')";

    if(mysql_query($sql)){
        echo '<script>location="index.php"</script>';
    }
}
?>