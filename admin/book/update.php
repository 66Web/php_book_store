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

$id=$_POST['id'];
$imgsrc=$_POST['imgsrc'];

$imgerror=$_FILES['img']['error'];

if($imgerror === 0){
   //图片上传--先上传新图，后删除原图，上传失败不删原图
   $src = $_FILES['img']['tmp_name'];
   $name = $_FILES['img']['name'];
   $ext = array_pop(explode('.',$name));
   $dst = '../../public/uploads/'.time().mt_rand().'.'.$ext;

   if(move_uploaded_file($src,$dst)){

       //进行图片缩放200*200
       thumb($dst,220,220);

       //删除原图
       $oldfile="../../public/uploads/{$imgsrc}";
       $oldfile2="../../public/uploads/thumb_{$imgsrc}";

       unlink($oldfile);
       unlink($oldfile2);

       $img = basename($dst);
       $sql = "update book set name='{$bookname}',writer='{$writer}',oldprice='{$oldprice}',nowprice='{$nowprice}',stock='{$stock}',sales='{$sales}',shelf='{$shelf}',recommend='{$recommend}',info='{$info}',class_id='{$class_id}',img='{$img}' where id={$id}";

      if(mysql_query($sql)){
             echo '<script>location="index.php"</script>';
      }
   }
}else{
   $sql="update book set name='{$bookname}',writer='{$writer}',oldprice='{$oldprice}',nowprice='{$nowprice}',stock='{$stock}',sales='{$sales}',shelf='{$shelf}',recommend='{$recommend}',info='{$info}',class_id='{$class_id}' where id={$id}";
   if(mysql_query($sql)){
          echo '<script>location="index.php"</script>';
   }
}
?>