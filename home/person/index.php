<?php
  session_start();

  $path = $_SERVER['PHP_SELF'];
  $arr = explode('/',$path);
  $root = '/'.$arr[1];

  if(!@$_SESSION['home_username']){
     echo "<script>location='{$root}/home/login.php'</script>";
     exit;
  }
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<?php 
			include '../header.php';
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
						    <li><a href="user/userlist.php">|--查看个人信息</a></li>
						    <li>联系方式</li>
							<li><a href="touch/touchlist.php">|--查看联系方式</a></li>
							<li><a href="touch/touchadd.php">|--添加联系方式</a></li>
							<li>我的图书</li>
							<li><a href="book/salelist.php">|--查看出售图书</a></li>
							<li><a href="<?php echo $root?>/home/saleadd.php">|--添加出售图书</a></li>
							<li>我的订单</li>
							<li><a href="order/myorder.php">|--查看我的订单</a></li>
							<li><a href="order/gukeorder.php">|--查看客户订单</a></li>
						</ul>
					</div>

					<div class='floorFooter2Right'>
						<div class='fenmu'>
							<img src="../public/img/wel.png" alt="">	
						</div>
					</div>
					<div class='clear'></div>
				</div>
			</div>
		</div>	

		<?php 
			include '../footer.php';
		?>
	</div>	
</body>
</html>