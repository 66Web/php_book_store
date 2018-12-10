<?php
    session_start();
    include '../public/common/conn.php';

    //分页显示
    $pagesize = 3;
    $sqlClass_page = "select * from class";
    $rstClass_page = mysql_query($sqlClass_page);

    //计算共有多少条记录
    $totalnum = mysql_num_rows($rstClass_page);

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
	<title>图书类别</title>
	<link rel="stylesheet" href="public/css/index.css">
	<link rel="stylesheet" href="public/css/high_search.css" />
</head>
<body>
	<div class="main">
		<?php			
			include 'header.php';
		?>
		<div class="nav"></div>
		<div class="content">
		<?php			
			include 'high_search.php';
		?>

        <?php
          $sqlClass = "select * from class order by id limit $start,$pagesize";
          $rstClass = mysql_query($sqlClass);
          $f = 1;
          while($rowClass=mysql_fetch_assoc($rstClass)){
        ?>
        <div>
        	
        	
        </div>
		<!--楼层开始-->
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><?php echo $f?>F <?php echo $rowClass['name']?></span>
					</div>
					<div class="right">
						<span>热卖图书</span>
						<span>
							<a href="classbook.php?class_id=<?php echo $rowClass['id']?>">更多</a>
						</span>
					</div>
				</div>

				<div class="floorFooter">

				   <?php
				     $sqlBook = "select book.* from book,class where book.class_id = class.id and class.id = {$rowClass['id']} and book.shelf=1 order by book.id limit 5";
				     $rstBook = mysql_query($sqlBook);
				     while($rowBook = mysql_fetch_assoc($rstBook)){
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
            $f++;
            }
            echo "<hr>";
            echo "<div style='text-align:center'>";
            echo "共有类别&nbsp;".$totalnum."&nbsp;种&nbsp;&nbsp;";
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
        ?>

		</div>
		<div class="nav"></div>

		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>