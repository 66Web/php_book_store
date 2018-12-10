<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

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
	<title>修改客户订单</title>
	<link rel="stylesheet" href="../../public/css/index.css">
</head>
<body>
	<div class="main">
		<?php
			include '../../header.php';
		?>
		<div class="nav"></div>
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>个人中心:</span>
					</div>
				</div>

				<div class="floorFooter2">
					<div class='floorFooter2Left'>
						<ul>
							<li>个人信息</li>
                            <li><a href="../user/userlist.php">|--查看个人信息</a></li>
                            <li>联系方式</li>
                            <li><a href="../touch/touchlist.php">|--查看联系方式</a></li>
                            <li><a href="../touch/touchadd.php">|--添加联系方式</a></li>
                            <li>我的图书</li>
                            <li><a href="../book/salelist.php">|--查看出售图书</a></li>
                            <li><a href="<?php echo $root?>/home/saleadd.php">|--添加出售图书</a></li>
                            <li>我的订单</li>
                            <li><a href="myorder.php">|--查看我的订单</a></li>
                            <li><a href="gukeorder.php">|--查看客户订单</a></li>
						</ul>
					</div>

					<div class='floorFooter2Right'>
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
                                 <p><input type="hidden" value="修改" class="commit"></p>

                        	     <p><input type="submit" value="修改" class="commit"></p>
                        	</form>
					</div>
					<div class='clear'></div>
				</div>
			</div>
		</div>

		<?php
			include '../../footer.php';
		?>
	</div>
</body>
</html>