<?php
include '../../../public/common/conn.php';
include '../../public/session.php';

$content = $_POST['content'];
$user_id = $_SESSION['home_userid'];
$book_id = $_POST['book_id'];
$time=time();

$sql = "insert into comment(user_id,content,book_id,time) values('{$user_id}','{$content}','{$book_id}','{$time}')";

if(mysql_query($sql)){
  echo "<script>location='../../book.php?book_id={$book_id}'</script>";
}
?>