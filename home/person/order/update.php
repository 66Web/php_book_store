<?php
include '../../../public/common/conn.php';
include '../../public/session.php';

$code=$_POST['code'];
$status_id=$_POST['status_id'];
$paytype=$_POST['paytype'];
$posttype=$_POST['posttype'];

$sql="update indent set status_id={$status_id},paytype={$paytype},posttype={$posttype} where code='{$code}'";

if(mysql_query($sql)){
	echo '<script>location="gukeorder.php"</script>';
}
?>