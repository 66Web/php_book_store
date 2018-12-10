<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $code = $_GET['code'];
  $status_id = $_GET['status_id'];
  $paytype = $_GET['paytype'];
  $posttype = $_GET['posttype'];

  $sqlStatus = "select * from status";
  $rstStatus = mysql_query($sqlStatus);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="update.php" method='post' enctype='multipart/form-data'>
			<p>订单号:</p>
			<p><input type="text" name='code' value='<?php echo $code ?>'></p>

			<p>选择状态:</p>
			<p>
				<select name="status_id">
                	<?php
                        while($rowStatus=mysql_fetch_assoc($rstStatus)){
                           if($status_id == $rowStatus['id']){
                              echo "<option value='{$rowStatus['id']}' selected>{$rowStatus['name']}</option>";
                           }else{
                              echo "<option value='{$rowStatus['id']}'>{$rowStatus['name']}</option>";
                           }
                        }
                	?>
                </select>
			</p>

			<p>选择付款方式:</p>
            <p>
               <select name="paytype">
                   <?php
                           switch($paytype){
                                case 1:
                                    echo "<option value='1' selected>货到付款</option>";
                                    echo "<option value='2'>支付宝付款</option>";
                                    echo "<option value='3'>一卡通付款</option>";
                                    break;

                                case 2:
                                    echo "<option value='1'>货到付款</option>";
                                    echo "<option value='2' selected>支付宝付款</option>";
                                    echo "<option value='3'>一卡通付款</option>";
                                    break;

                                case 3:
                                    echo "<option value='1'>货到付款</option>";
                                    echo "<option value='2'>支付宝付款</option>";
                                    echo "<option value='3' selected>一卡通付款</option>";
                                    break;
                           }
                   ?>
               </select>
            </p>

            <p>选择快递方式:</p>
            <p>
               <select name="posttype">
                   <?php
                          switch($posttype){
                               case 1:
                                     echo "<option value='1' selected>普通快递</option>";
                                     echo "<option value='2'>EMS</option>";
                                     echo "<option value='3'>顺丰</option>";
                                     break;

                               case 2:
                                     echo "<option value='1'>普通快递</option>";
                                     echo "<option value='2' selected>EMS</option>";
                                     echo "<option value='3'>顺丰</option>";
                                     break;

                               case 3:
                                     echo "<option value='1'>普通快递</option>";
                                     echo "<option value='2'>EMS</option>";
                                     echo "<option value='3' selected>顺丰</option>";
                                     break;
                          }
                   ?>
               </select>
            </p>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>