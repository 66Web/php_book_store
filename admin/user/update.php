<?php
 include '../../public/common/conn.php';
 include '../../public/common/function.php';
 include '../public/session.php';

 $username = $_POST['username'];
 $password = md5($_POST['password']);
 $realname = $_POST['realname'];
 $sex = $_POST['sex'];

 $id = $_POST['id'];
 $imgsrc=$_POST['imgsrc'];

 $imgerror=$_FILES['img']['error'];

if($imgerror === 0){
   //图片上传--先上传新图，后删除原图，上传失败不删原图
   $src = $_FILES['img']['tmp_name'];
   $name = $_FILES['img']['name'];
   $ext = array_pop(explode('.',$name));
   $dst = '../../public/upusers/'.time().mt_rand().'.'.$ext;

   if(move_uploaded_file($src,$dst)){

       //进行图片缩放50*50
       thumb($dst,50,50);

       //删除原图
       $oldfile="../../public/upusers/{$imgsrc}";
       $oldfile2="../../public/upusers/thumb_{$imgsrc}";

       unlink($oldfile);
       unlink($oldfile2);

       $img = basename($dst);

       $sql = "update user set username = '{$username}',password='{$password}',realname = '{$realname}',sex='{$sex}',img='{$img}' where id = {$id}";

      if(mysql_query($sql)){
           echo '<script>location="index.php"</script>';
      }
   }
}else{
      $sql = "update user set username = '{$username}',password='{$password}',realname = '{$realname}',sex='{$sex}' where id = {$id}";
         if(mysql_query($sql)){
             echo '<script>location="index.php"</script>';
         }
     }
?>