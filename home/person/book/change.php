<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

  $id = $_GET['id'];
  $sqlBook = "select * from book where id = {$id}";

  $rstBook = mysql_query($sqlBook);
  $rowBook = mysql_fetch_assoc($rstBook);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加出售图书</title>
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
                            <li><a href="salelist.php">|--查看出售图书</a></li>
                            <li><a href="<?php echo $root?>/home/saleadd.php">|--添加出售图书</a></li>
                            <li>我的订单</li>
                            <li><a href="../order/myorder.php">|--查看我的订单</a></li>
                            <li><a href="../order/gukeorder.php">|--查看客户订单</a></li>
						</ul>
					</div>

					<div class='floorFooter2Right'>
							<form action="update.php" method='post' enctype='multipart/form-data'>
                            	<p>名称:</p>
                                <p><input type="text" name='name' class="input-k" value='<?php echo $rowBook['name']?>'></p>

                                <p>作者:</p>
                                <p><input type="text" name='writer' class="input-k" value='<?php echo $rowBook['writer']?>'></p>

                                <p>定价:</p>
                                <p><input type="text" name='oldprice'  class="input-k" value='<?php echo $rowBook['oldprice']?>'></p>

                                <p>出售价:</p>
                                <p><input type="text" name='nowprice'  class="input-k" value='<?php echo $rowBook['nowprice']?>'></p>

                            	<p>库存:</p>
                                <p><input type="text" name='stock' class="input-k" value='<?php echo $rowBook['stock']?>'></p>

                                <p>销售量:</p>
                                <p><input type="text" name='sales' class="input-k" value='<?php echo $rowBook['sales']?>'></p>

                            	<p>货架:</p>
                                <p>
                                 <?php
                                	 if($rowBook['shelf']){
                                 ?>
                                		 <label>
                                			 <input type="radio" name="shelf" value='1' checked> 上架
                                		 </label>
                                		 <label>
                                			 <input type="radio" name="shelf" value='0'> 下架
                                		 </label>
                                 <?php
                                	 }else{
                                 ?>
                                		 <label>
                                			 <input type="radio" name="shelf" value='1'> 上架
                                		 </label>
                                		 <label>
                                			 <input type="radio" name="shelf" value='0' checked> 下架
                                		 </label>
                                 <?php
                                	 }
                                 ?>
                                </p>

                            	<p>类别:</p>
                                <p>
                                	<select name="class_id">
                                         <?php
                                             $sqlClass="select * from class";
                                                $rstClass=mysql_query($sqlClass);
                                                while($rowClass=mysql_fetch_assoc($rstClass)){
                                                   if($rowClass['id'] == $rowBook['class_id']){
                                                      echo "<option value='{$rowClass['id']}' selected>{$rowClass['name']}</option>";
                                                   }else{
                                                      echo "<option value='{$rowClass['id']}'>{$rowClass['name']}</option>";
                                                   }
                                                }
                                         ?>
                                    </select>
                                </p>
                                <p>原图:</p>
                                <p><img src="../../../public/uploads/<?php echo $rowBook['img']?>" width="100px"></p>

                                <p>图片:</p>
                                <p><input type="file" name="img"></p>

                                <p>简介:</p>
                                <p>
                                  <textarea name='info' cols="30" rows="5" style="margin-left:10px;"><?php echo $rowBook['info']?></textarea>
                                </p>

                                <input type="hidden" name="id" value='<?php echo $rowBook['id']?>'>
                                <input type="hidden" name="imgsrc" value='<?php echo $rowBook['img']?>'>

                                <p><input type="submit" class="input-k" value="修改"></p>
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