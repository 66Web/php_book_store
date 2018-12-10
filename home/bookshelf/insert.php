<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $book_id = $_GET['id'];
  $user_id = $_SESSION['home_userid'];

  $sql = "insert into bookshelf (book_id,user_id) values('{$book_id}','{$user_id}')";

  if(mysql_query($sql)){
     echo '<script>location="index.php"</script>';
  }
?>