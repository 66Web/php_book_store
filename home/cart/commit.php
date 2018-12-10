<?php
 session_start();
 include '../../public/common/conn.php';

 $code = time().mt_rand();//随机生成订单号
 $user_id = $_SESSION['home_userid'];
 $time = time();
 $touch_id = $_POST['touch_id'];
 $paytype = $_POST['paytype'];
 $posttype = $_POST['posttype'];

 foreach($_SESSION['books'] as $book){
    $sql = "insert into indent(code,user_id,time,touch_id,paytype,posttype,book_id,price,num) values ('{$code}','{$user_id}','{$time}','{$touch_id}','{$paytype}','{$posttype}','{$book['id']}','{$book['nowprice']}','{$book['num']}')";

    mysql_query($sql);

    //减库存
    $newstock = $book['stock']-$book['num'];
    $sqlStock = "update book set stock = '{$newstock}' where id = {$book['id']}";
    mysql_query($sqlStock);

    //加销量
    $newsales = $book['sales']+$book['num'];
    $sqlSales = "update book set sales = '{$newsales}' where id = {$book['id']}";
    mysql_query($sqlSales);

 }

 //清空购物车
 $_SESSION['books']=array();

 echo "<script>alert('您的订单号为：{$code}')</script>";
 echo "<script>location='../person/order/myorder.php'</script>";
?>