<?php
  session_start();
  include '../public/common/conn.php';

  //图书分页显示
  $pagesize = 2;
  $sqlBook_page = "select * from book where shelf=1 order by sales desc";
  $rstBook_page = mysql_query($sqlBook_page);

  //计算共有多少条记录
  $totalnum = mysql_num_rows($rstBook_page);

  //计算共有多少页
  if($totalnum % $pagesize == 0){
     $totalpage = (int)($totalnum/$pagesize);
  }else{
     $totalpage = (int)($totalnum/$pagesize)+1;
  }

  //接收当前页数，计算显示的起始记录
  if(@$_GET['page']){
     $page = $_GET['page'];
     $start = ($page-1) * $pagesize;
  }else{
     $page = 1;
     $start = 0;
  }

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类页面</title>
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
						<span><a href='index.php'>首页</a> &raquo; <?php echo $rowClass['name']?></span>
					</div>
					<div class="right">
						<span>共有图书&nbsp;<?php echo "$totalnum" ?>&nbsp;种</span>
					</div>
				</div>

                <div class="floorFooter2">

                <?php
                  $sqlBook = "select * from book where shelf=1 order by sales desc limit $start,$pagesize";
                  $rstBook = mysql_query($sqlBook);
                  while($rowBook=mysql_fetch_assoc($rstBook)){
                ?>
                    <!--图书数据块开始-->
					<a href="book.php?book_id=<?php echo $rowBook['id']?>">
						<div class='shop'>
							<div class="shopImg">
								<img src="../public/uploads/thumb_<?php echo $rowBook['img']?>" alt="">
							</div>
							<div class="nav"></div>
							<div class="shopInfo">
								<span class='shopName'><?php echo $rowBook['name']?></span>
								<span class='shopPrice'>￥<?php echo $rowBook['nowprice']?></span>
							</div>
						</div>
					</a>
                    <!--图书数据块结束-->
                <?php
                    }
                    echo "<div>";
                    echo "共".$totalpage."页&nbsp;&nbsp;当前是第".$page."页&nbsp;&nbsp;";
                    if($page>=1 && $totalpage>1){
                       echo "<a href=?page=1&>第一页&nbsp;&nbsp;</a>";
                    }
                    if($page>1 && $totalpage>1){
                       echo "<a href=?page=".($page-1).">上一页&nbsp;&nbsp;</a>";
                    }
                    if($page>=1 && $totalpage>$page){
                       echo "<a href=?page=".($page+1).">下一页&nbsp;&nbsp;</a>";
                    }
                    if($page>=1 && $totalpage>1){
                       echo "<a href=?page=".$totalpage.">尾页</a>";
                    }
                    echo "</div>";
                ?>

					<div class='clear'></div>
				</div>
			</div>
		</div>

		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>