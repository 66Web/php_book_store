<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

  $user_id = $_SESSION['home_userid'];
  $sql = "select * from user where id = {$user_id}";
  $rst = mysql_query($sql);
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
                    		<table width='100%'>
                    			<tr>
                    				<th>用户名</th>
                    				<th>真实姓名</th>
                    				<th>头像</th>
                    				<th>性别</th>
                    				<th>修改</th>
                    			</tr>

                    			<?php
                    			   while($row=mysql_fetch_assoc($rst)){
										echo "<tr>";
										echo "<td>{$row['username']}</td>";
										echo "<td>{$row['realname']}</td>";
										echo "<td><img src='../../../public/upusers/thumb_{$row['img']}' width='50px'></td>";
										if($row['sex']){
										   echo "<td>女</td>";
										}else{
										   echo "<td>男</td>";
										}
										echo "<td><a href='userchange.php?id={$row['id']}'>修改</a></td>";
										echo "</tr>";
                    			}
                                ?>
                    		</table>
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