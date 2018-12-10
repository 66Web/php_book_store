<?php
  session_start();
  include '../public/common/conn.php';

  if(isset($_POST['ok'])){
    $keyword = $_POST['keyword'];//接收搜索的关键词

    //分页显示
    $pagesize = 4;
    $sqlBook_page = "select * from book where name like '%$keyword%'";//模糊查询
    $rstBook_page = mysql_query($sqlBook_page);

    //计算共有多少条记录
    $totalnum = mysql_num_rows($rstBook_page);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>千纸诗书</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">

		<?php
			include 'header.php';
		?>

		<div class="nav"></div>
		<div class="content">

		<!--楼层开始-->
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>搜索结果</span>
					</div>
				</div>

				<div class="floorFooter">

				   <?php
				   if($totalnum == 0){
                           echo "暂无相关图书";
                       }else{
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

                           $sqlBook = "select * from book where name like '%$keyword%' limit $start,$pagesize";
                           $rstBook = mysql_query($sqlBook);
                           while($rowBook=mysql_fetch_assoc($rstBook)){
				   ?>
				    <!--楼层数据块开始-->
					<a href="book.php?book_id=<?php echo $rowBook['id']?>">
						<div class='shop'>
							<div class="shopImg">
								<img src="../public/uploads/thumb_<?php echo $rowBook['img']?>" style="height:200px">
							</div>
							<div class="nav"></div>
							<div class="shopInfo">
								<span class='shopName'><?php echo $rowBook['name']?></span>
								<span class='shopPrice'>￥<?php echo $rowBook['nowprice']?></span>
							</div>
						</div>
					</a>
                   <!--楼层数据块结束-->
                  <?php
                   	}
                  ?>
				</div>
			</div>
        <!--楼层结束-->
        <?php
            echo "<hr>";
            echo "<div style='text-align:center'>";
            echo "共有图书&nbsp;".$totalnum."&nbsp;种&nbsp;&nbsp;";
            echo "共".$totalpage."页&nbsp;&nbsp;当前是第".$page."页&nbsp;&nbsp;";
            if($page>=1 && $totalpage>1){
               echo "<a href=?page=1>第一页&nbsp;&nbsp;</a>";
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
          }
        }
        ?>

		</div>
		<div class="nav"></div>

		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>