<?php
 $path = $_SERVER['PHP_SELF'];
 $arr = explode('/',$path);
 $root = '/'.$arr[1];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>footer</title>
<!--		<link rel="stylesheet" href="public/css/index_1.css" />-->
		<link rel="stylesheet" href="<?php echo $root?>/home/public/css/foot.css" />
	</head>
	<body>  
		<div class="foot">
			<img src="<?php echo $root?>/home/public/img/导航背景.png" class="foot-bg" />
			<div class="foot1">
			<p>
				Copyright © 2018 LI QIUWEI and LIU JIEQIONG. All rights reserved.
			</p>
			</div>
			<div class="foot2">
			<nav>
				<ul>
					<li><a href="#">图书类别</a>  |</li>
					<li><a href="#">我的书库</a>  |</li>
					<li><a href="#">发布旧书</a>  |</li>
					<li><a href="#">每日推荐</a>  |</li>
					<li><a href="#">消息中心</a>  |</li>
					<li><a href="#">个人中心</a></li>
				</ul>
			</nav>
			</div>
		</div>
	</body>
</html>



