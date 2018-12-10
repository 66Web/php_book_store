<?php
include '../../../public/common/conn.php';
include '../../public/session.php';

$code=$_GET['code'];

$sql="select indent.price,indent.confirm,indent.num,book.id,book.name,book.img from indent,book where indent.book_id=book.id and indent.code='{$code}'";

$rst=mysql_query($sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类页面</title>
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
						<form action="commentinsert.php" method='post'>
							<p>请发表评论:</p>
							<p>
								<textarea name="content" class='PersonComment'></textarea>
							</p>

							<input type="hidden" name="book_id" value='<?php echo $_GET['book_id']?>'>
							<p>
								<input type="submit" value="提交" class='commit'>
							</p>
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