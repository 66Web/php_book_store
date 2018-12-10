<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看联系方式</title>
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
                             <li><a href="touchlist.php">|--查看联系方式</a></li>
                             <li><a href="touchadd.php">|--添加联系方式</a></li>
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
								<th>收货人姓名</th>
								<th>地址</th>
								<th>邮编</th>
								<th>电话</th>
								<th>修改</th>
								<th>删除</th>
							</tr>

							<?php
							  $user_id = $_SESSION['home_userid'];
                              $sql = "select * from touch where user_id = {$user_id}";
                              $rst = mysql_query($sql);

                              $size = 5;
                              $hangnum = mysql_num_rows($rst);
                              if($hangnum == 0){
                                  echo "暂无联系方式";
                              }else{
                                  $page_num = ceil($hangnum/$size);
                                  if(@$_GET['page_id']){
                                     $page_id = $_GET['page_id'];
                                     $start = ($page_id-1)*$size;
                                  }else{
                                     $page_id = 1;
                                     $start = 0;
                                  }

                                  $fenye_sel = "select * from touch where user_id = {$user_id} limit $start,$size";
                                  $fenye_add = mysql_query($fenye_sel);
							      while($row=mysql_fetch_assoc($fenye_add)){

								echo "<tr>
										<td>{$row['name']}</td>
										<td>{$row['addr']}</td>
										<td>{$row['postcode']}</td>
										<td>{$row['tel']}</td>
										<td><a href='touchchange.php?id={$row['id']}'>修改</a></td>
										<td><a href='touchdelete.php?id={$row['id']}'>删除</a></td>
									  </tr>";
							  }
							?>
							<tr>
							   <td colspan="6">
							<?php
                               echo "共有&nbsp;".$hangnum."&nbsp;条记录&nbsp;";
                               echo "本页显示&nbsp;".$size."&nbsp;条&nbsp;";
                               echo "第&nbsp;".$page_id."&nbsp;页/共&nbsp;".$page_num."&nbsp;页&nbsp;";
                               if($page_id>=1 && $page_num>1){
                                 echo "<a href=?page_id=1>首页&nbsp;&nbsp;</a>";
                               }
                               if($page_id>1 && $page_num>1){
                                 echo "<a href=?page_id=".($page_id-1).">上一页&nbsp;&nbsp;</a>";
                               }
                               if($page_id>=1 && $page_num>$page_id){
                                 echo "<a href=?page_id=".($page_id+1).">下一页&nbsp;&nbsp;</a>";
                               }
                               if($page_id>=1 && $page_num>1){
                                 echo "<a href=?page_id=".$page_num.">尾页</a>";
                               }
                               echo "</td>";
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