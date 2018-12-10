<?php
include '../../../public/common/conn.php';
include '../../../public/common/function.php';
include '../../public/session.php';

$user_id = $_SESSION['home_userid'];

$bookname = $_POST['name'];
$writer = $_POST['writer'];
$oldprice = $_POST['oldprice'];
$nowprice = $_POST['nowprice'];
$stock = $_POST['stock'];
$sales = $_POST['sales'];
$shelf = $_POST['shelf'];
$info = $_POST['info'];
$supplier = $user_id;
$class_id = $_POST['class_id'];

//图片上传
$src = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.',$name));
$dst = '../../../public/uploads/'.time().mt_rand().'.'.$ext;

if(move_uploaded_file($src,$dst)){
    //进行图片缩放150*220

    thumb($dst,220,220);
    $img = basename($dst);
    $sql = "insert into book(name,writer,oldprice,nowprice,stock,sales,shelf,recommend,info,class_id,supplier,img) values('{$bookname}','{$writer}','{$oldprice}','{$nowprice}','{$stock}','{$sales}','{$shelf}','{$recommend}','{$info}','{$class_id}','{$supplier}','{$img}')";

    if(mysql_query($sql)){
       echo '<script>location="salelist.php"</script>';
    }
}

?>