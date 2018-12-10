<?php
  include 'public/session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>left</title>
	<style>
		*{
			font-family: 黑体;
			text-decoration:none;
		}
		h4{
			cursor: pointer;/*光标形状是手指*/
			background:url(public/img/leader-bg.jpg) no-repeat center;
			width: auto;
			height: 25px;
			text-align: center;
			color:#fff;
			font-size: 14px;
			margin-top: 20px;
			padding-top: 6px;
		}

		h4:hover{
			color:#01afbe;
			background: #fff;
		}

		div{
			display: none;
		}

		p{
			padding-left:15px;
			text-align: center;
		}

		p a{
			color:#01afbe;
			font-size: 14px;
		}
	</style>
	<script src='public/js/jquery.js'></script>
</head>
<body>
	<h4>管理员管理</h4>
    <div>
    	<p><a href='webmaster/index.php' target='right'>|-查看管理员</a></p>
    	<p><a href='webmaster/add.php' target='right'>|-添加管理员</a></p>
    </div>
	<h4>用户管理</h4>
	<div>
		<p><a href='user/index.php' target='right'>|-查看用户</a></p>
		<p><a href='user/add.php' target='right'>|-添加用户</a></p>
	</div>
	<h4>分类管理</h4>
	<div>
		<p><a href='class/index.php' target='right'>|-查看分类</a></p>
		<p><a href='class/add.php' target='right'>|-添加分类</a></p>
	</div>
	<h4>图书管理</h4>
	<div>
		<p><a href='book/index.php' target='right'>|-查看本站供书</a></p>
		<p><a href='book/useroffer.php' target='right'>|-查看用户供书</a></p>
		<p><a href='book/putaway.php' target='right'>|-查看上架图书</a></p>
		<p><a href='book/soldout.php' target='right'>|-查看下架图书</a></p>
		<p><a href='book/add.php' target='right'>|-添加图书           </a></p>
	</div>
	<h4>评论管理</h4>
	<div>
		<p><a href='comment/index.php' target='right'>|-查看评论</a></p>
	</div>
	<h4>订单状态</h4>
	<div>
		<p><a href='status/index.php' target='right'>|-查看状态</a></p>
		<p><a href='status/add.php' target='right'>|-添加状态</a></p>
	</div>
	<h4>订单管理</h4>
	<div>
		<p><a href='indent/index.php' target='right'>|-查看订单</a></p>
	</div>

	<h4>系统管理</h4>
	<div>
		<p><a href="logout.php" target='_top' onclick="return confirm('您确认要退出管理系统吗？')">|-退出系统</a></p>
		<p><a href="../index.html" target='_blank'>|-网站首页</a></p>
	</div>
</body>
<script>
$('h4').click(function(){
	$(this).next().toggle();   //toggle()方法：切换<p>元素的显示与隐藏
	$('div').not($(this).next()).hide();
});
</script>
</html>