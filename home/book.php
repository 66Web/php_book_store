<?php
  session_start();
  include '../public/common/conn.php';
  $id = $_GET['book_id'];
  $sqlBook = "select * from book where id = {$id}";
  $rstBook = mysql_query($sqlBook);
  $rowBook = mysql_fetch_assoc($rstBook);

  $sqlClass="select class.* from class,book where book.class_id=class.id and book.id=$id";
  $rstClass=mysql_query($sqlClass);
  $rowClass=mysql_fetch_assoc($rstClass);

  $class_id = $rowClass['id'];
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>书详情页</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		<?php 
			include 'header.php';
		?>
		<div class="nav"></div>
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>
							<a href='classbook.php?class_id=<?php echo $class_id?>'>类别</a> &raquo; <?php echo $rowClass['name']?></span>
					</div>
					
				</div>

				<div class="floorFooter2">
					<table width='100%'>
						<tr>
							<th>图片</th>
							<th>作者</th>
							<th>简介</th>
							<th>定价</th>
							<th>本站价</th>
							<th>库存</th>
							<th>销量</th>
							<th>收藏</th>
							<th>购物车</th>
						</tr>	
						<tr>
							<td>
								<img src="../public/uploads/thumb_<?php echo $rowBook['img']?>" alt="">
							</td>
							<td><?php echo $rowBook['writer']?></td>
							<td style="width:400px"><?php echo $rowBook['info']?></td>
							<td><?php echo $rowBook['oldprice']?>元</td>
							<td><?php echo $rowBook['nowprice']?>元</td>
							<td><?php echo $rowBook['stock']?></td>
							<td><?php echo $rowBook['sales']?></td>
							<td><a href="bookshelf/insert.php?id=<?php echo $rowBook['id']?>">|加入书架|</a></td>
							<td>
								<a href="cart/insert.php?id=<?php echo $rowBook['id']?>">
									<img src="public/img/cart.jpg" alt="">
								</a>
							</td>
						</tr>
					</table>
				</div>
			</div>


			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>商品评论:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
				    <?php
				      $sqlComment = "select comment.*,user.username,user.img from comment,user where comment.user_id=user.id and comment.book_id={$id}";
				      $rstComment=mysql_query($sqlComment);
                      while($rowComment=mysql_fetch_assoc($rstComment)){
				    ?>
				    <!--评论数据块开始-->
					<div class="comment">
						<div class='left'>
							<div class="logo">
								<img class="ii"  src="../public/upusers/thumb_<?php echo $rowComment['img']?>" alt="">
							</div>
							<!--<div class="name"><?php echo $rowComment['username']?></div>-->
						</div>
						<div class="right">
							<div class="name"><?php echo $rowComment['username']?></div>
						  <?php echo $rowComment['content']?>
						</div>
					</div>
                    <!--评论数据块结束-->
                    <?php
                      }
                    ?>
				</div>
			</div>
		</div>	

		<?php 
			include 'footer.php';
		?>
	</div>	
</body>
</html>