<?php
 $path = $_SERVER['PHP_SELF'];
 $arr = explode('/',$path);
 $root = '/'.$arr[1];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="<?php echo $root?>/home/public/css/页头.css" />
		<link rel="stylesheet" href="<?php echo $root?>/home/public/css/bootstrap.css"> 
		<script src="<?php echo $root?>/home/public/js/bootstrap.min.js"></script>
		<title>页头</title>
	</head>
	<body>
		<div>
		<div class="header">
		<div class="headerinner">
			<ul class="headernav">
				<li class="logo">
					<a href="<?php echo $root?>/home/index.php" target="_blank">
						<img src="<?php echo $root?>/home/public/img/无底logo.png" alt="首页"/>
					</a>					
				</li>				
				<li><a href="<?php echo $root?>/home/class.php">图书类别</a></li>
				<li><a href="<?php echo $root?>/home/bookshelf/index.php">我的书库</a></li>
				<li><a href="<?php echo $root?>/home/saleadd.php">发布旧书</a></li>
				<li><a href="<?php echo $root?>/home/demo.html" >每日推荐</a></li>
				<li><a href="<?php echo $root?>/home/cart/index.php"" >购物车</a></li>
				<li><a href="<?php echo $root?>/home/person/index.php"" >个人中心</a></li>		
			</ul>

			<!--<div class="geren">
				<a href="<?php echo $root?>/home/person/index.php">
					<img src="<?php echo $root?>/home/public/img/list.png" />
				</a>
			</div>-->
		</div>
		</div>
						
		</div>		
	</body>
</html>
