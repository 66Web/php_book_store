<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

  $id = $_GET['id'];
  $sql = "select * from user where id = {$id}";

  $rst = mysql_query($sql);
  $row = mysql_fetch_assoc($rst);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看个人信息</title>
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
                             <li><a href="userlist.php">|--查看个人信息</a></li>
                             <li>联系方式</li>
                             <li><a href="../touch/touchlist.php">|--查看联系方式</a></li>
                             <li><a href="../touch/touchadd.php">|--添加联系方式</a></li>
                             <li>我的图书</li>
                             <li><a href="../book/salelist.php">|--查看出售图书</a></li>
                             <li><a href="<?php echo $root?>/home/saleadd.php">|--添加出售图书</a></li>
                             <li>我的订单</li>
                             <li><a href="../order/myorder.php">|--查看我的订单</a></li>
                             <li><a href="../order/gukeorder.php">|--查看客户订单</a></li>
						</ul>
					</div>

					<div class='floorFooter2Right'>
                      <div class='personUseradd'>
                        <form action='userupdate.php' method='post' enctype='multipart/form-data'>
                            <p>用户名:</p>
                            <p><input type="text" class="input-k" name='username' value='<?php echo $row['username']?>'></p>

                            <p>密码:</p>
                            <p><input type="password"  class="input-k" name='password'></p>

                            <p>真实姓名:</p>
                            <p><input type="text"  class="input-k" name='realname' value='<?php echo $row['realname']?>'></p>

                            <p>性别:</p>
                            <p>
                            <?php
                                if($row['sex']){
                            ?>
                                    <label>
                                       <input type="radio" name="sex" value='1' checked> 女
                                    </label>
                                    <label>
                                       <input type="radio" name="sex" value='0'> 男
                                    </label>
                            <?php
                                }else{
                            ?>
                                    <label>
                                        <input type="radio" name="sex" value='1'> 女
                                    </label>
                                    <label>
                                        <input type="radio" name="sex" value='0' checked> 男
                                    </label>
                            <?php
                                 }
                            ?>
                            </p>

                            <p>原头像:</p>
                            <p><img src="../../../public/upusers/<?php echo $row['img']?>" width="50px"></p>

                            <p>头像:</p>
                            <p><input type="file" name="img"></p>

                            <input type="hidden" name="id" value='<?php echo $row['id']?>'>
                            <input type="hidden" name="imgsrc" value='<?php echo $row['img']?>'>

                            <p><input type="submit" value="修改" class="input-k"></p>
                    	</form>
                      </div>
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