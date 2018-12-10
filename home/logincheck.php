<?php
session_start();
include '../public/common/conn.php';
include '../public/common/mysql.class.php';
header('Content-Type:text/html;charset=UTF-8');

@$username = $_GET['username'];
@$password = md5($_GET['password']);

$reback = '0';                                   //定义初始变量
if(!empty($username) and !empty($password)){
    $sql = "select * from user where username = '".$username."' and password = '".$password."'";
    $rst = mysql_query($sql);
    $row = mysql_fetch_assoc($rst);

    $num = $conne->getRowsNum($sql);
    if($num == 0 or $num == ''){
             $reback = 1;
    }else{
             $reback = '-1';
             setcookie('username',$username,time()+60*10);
             $_SESSION['home_username'] = $username;
             $_SESSION['home_userid'] = $row['id'];
     }
   }
    echo $reback;
?>