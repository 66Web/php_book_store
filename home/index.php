<?php
    session_start();
    include '../public/common/conn.php';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>千纸诗书</title>
	<link rel="stylesheet" href="public/css/index.css">
	<link rel="stylesheet" href="public/css/index_1.css" />
	<link rel="stylesheet" href="public/css/animate.min.css">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="main">
		
		<?php 
			include 'homeheader.php';
		?>
		<div class="container">
	    <div class="row clearfix">
		<div class="col-md-12 column">
			<div class="carousel slide" id="carousel-125533" 
				style="margin-top: -65px;margin-left: 0px;">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-125533">
					</li>
					<li data-slide-to="1" data-target="#carousel-125533">
					</li>
					<li data-slide-to="2" data-target="#carousel-125533" class="active">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="" src="public/img/banner3-3.png"/>
					</div>
					<div class="item">
						<img alt="" src="public/img/banner2-2.png"/>
					</div>
					<div class="item active">
						<img alt="" src="public/img/banner1-1.png" />
					</div>
				</div> 
				<a class="left carousel-control" 
					href="#carousel-125533" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a> 
				<a class="right carousel-control" 
					href="#carousel-125533" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
	    </div>
	   </div>
         
        <div class="daohang">
				<nav>
				<ul>
					<li><a href="<?php echo $root?>/home/class.php" target="_blank" class="1">
						<img src="public/img/导航1.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航1-.png'"
							onmouseout="this.src='public/img/导航1.png'"/>
					</a></li>
					<li><a href="<?php echo $root?>/home/bookshelf/index.php" target="_blank" class="2" >
						<img src="public/img/导航2.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航2-.png'"
							onmouseout="this.src='public/img/导航2.png'"/>
					</a></li>
					<li><a href="<?php echo $root?>/home/saleadd.php" target="_blank" class="3" >
						<img src="public/img/导航3.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航3-.png'"
							onmouseout="this.src='public/img/导航3.png'"/>
					</a></li>
					<li><a href="<?php echo $root?>/home/demo.html" target="_blank" class="4" >
						<img src="public/img/导航4.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航4-.png'"
							onmouseout="this.src='public/img/导航4.png'"/>
					</a></li>
					<li><a href="<?php echo $root?>/home/cart/index.php" target="_blank" class="5" >
						<img src="public/img/导航5.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航5-.png'"
							onmouseout="this.src='public/img/导航5.png'"/>
					</a></li>
					<li><a href="<?php echo $root?>/home/person/index.php" target="_blank"  class="6">
						<img src="public/img/导航6.png" border="0" 
							style="width: 60px;height: auto;"
							onmouseover="this.src='public/img/导航6-.png'"
							onmouseout="this.src='public/img/导航6.png'"/>
					</a></li>
				</ul> 
				</nav>
		</div>
		
		<div>
		<a href="#">
			<p class="wenzi"> >>每日好书推荐 </p>
		</a>
		</div>
		
		
		 <?php
                   $sqlBook1 = "select * from book where recommend=1 and shelf=1 order by id desc limit 0,6";
                   $rstBook1 = mysql_query($sqlBook1);
                   while($tuijie = mysql_fetch_array($rstBook1)){
        ?>
        <div class="tuijianz">
        <a href="book.php?book_id=<?php echo $tuijie['id']?>">
            <div class="tuijian">
            	<div class="animated rollIn">
				<div class="tuijian-top">
					<div class="tuijian-book">
						<img src="../public/uploads/thumb_<?php echo $tuijie['img']?>" alt="">
					</div>
					<div class="tuijian-wenzi">
					<span class="tuijian-wenzi1">书名：</span>
					<span class="tuijian-wenzi2"><?php echo $tuijie['name']?></span><br />
					<span class="tuijian-wenzi1">作者：</span>
					<span class="tuijian-wenzi2"><?php echo $tuijie['writer']?></span><br />
					<span class="tuijian-wenzi1">内容简介：</span>
					<span class="tuijian-wenzi2"><?php echo $tuijie['info']?></span>
					</div>
				</div>
				</div>
			</div>
		</a>
		</div>
		
		<?php 
		    }
			include 'footer.php';
		?>
	</div>
</body>
</html>