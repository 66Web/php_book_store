<?php
include '../../public/common/conn.php';
include '../../public/common/function.php';
include '../public/session.php';

$bookname = $_POST['name'];
$writer = $_POST['writer'];
$oldprice = $_POST['oldprice'];
$nowprice = $_POST['nowprice'];
$stock = $_POST['stock'];
$sales = $_POST['sales'];
$shelf = $_POST['shelf'];
$recommend = $_POST['recommend'];
$info = $_POST['info'];
$class_id = $_POST['class_id'];

//图片上传
$src = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.',$name));
$dst = '../../public/uploads/'.time().mt_rand().'.'.$ext;

if(move_uploaded_file($src,$dst)){
    //进行图片缩放200*200

    thumb($dst,220,220);
    $img = basename($dst);
    $sql = "insert into book(name,writer,oldprice,nowprice,stock,sales,shelf,recommend,info,class_id,img) values('{$bookname}','{$writer}','{$oldprice}','{$nowprice}','{$stock}','{$sales}','{$shelf}','{$recommend}','{$info}','{$class_id}','{$img}')";

    if(mysql_query($sql)){
       echo '<script>location="index.php"</script>';
    }
}

?>