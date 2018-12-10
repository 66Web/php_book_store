<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看顾客订单</title>
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
						<table width='100%'>
							<tr>
                            	<th>订单号</th>
                            	<th>客户</th>
                            	<th>下单时间</th>
                            	<th>支付方式</th>
                            	<th>快递方式</th>
                            	<th>订单状态</th>
                            	<th>是否确认</th>
                            	<th>联系方式</th>
                            	<th>修改</th>
                            	<th>删除</th>
                            </tr>
							 <?php
							         $user_id = $_SESSION['home_userid'];
							         $sql="select indent.*,user.id,user.username,status.name,book.id,book.supplier from indent,user,status,book where indent.user_id=user.id and indent.status_id=status.id and indent.book_id=book.id and book.supplier={$user_id} group by indent.code";
                                     $rst=mysql_query($sql);

                                     $size = 5;
                                     $hangnum = mysql_num_rows($rst);
                                     if($hangnum == 0){
                                       echo "暂无客户订单";
                                     }else{
                                       $page_num = ceil($hangnum/$size);
                                       if(@$_GET['page_id']){
                                          $page_id = $_GET['page_id'];
                                          $start = ($page_id-1)*$size;
                                       }else{
                                          $page_id = 1;
                                          $start = 0;
                                       }

                                       $fenye_sel = "select indent.*,user.id,user.username,status.name,book.id,book.supplier from indent,user,status,book where indent.user_id=user.id and indent.status_id=status.id and indent.book_id=book.id and book.supplier={$user_id} group by indent.code limit $start,$size";
                                       $fenye_add = mysql_query($fenye_sel);

										while($row=mysql_fetch_assoc($fenye_add)){
											echo "<tr>";
											echo "<td><a href='code.php?code={$row['code']}' class='cartNum'>{$row['code']}</a></td>";
											echo "<td>{$row['username']}</td>";
											echo "<td>".date('Y-m-d H:i:s',$row['time'])."</td>";
											switch($row['paytype']){
											   case 1:
												  echo "<td>货到付款</td>";
												  break;

											   case 2:
												  echo "<td>支付宝支付</td>";
												  break;

											   case 3:
												  echo "<td>一卡通支付</td>";
												  break;
											}
											switch($row['posttype']){
											   case 1:
											   echo "<td>普通快递</td>";
											   break;

											   case 2:
											   echo "<td>EMS</td>";
											   break;

											   case 3:
											   echo "<td>顺丰</td>";
											   break;
											}
											echo "<td>{$row['name']}</td>";
											if($row['confirm']){
											   echo "<td>确认</td>";
											}else{
											   echo "<td>未确认</td>";
											}
											echo "<td><a href='touch.php?touch_id={$row['touch_id']}' class='cartNum'>联系方式</a></td>";
											echo "<td><a href='change.php?code={$row['code']}&status_id={$row['status_id']}&paytype={$row['paytype']}&posttype={$row['posttype']}' class='cartNum'>修改</a></td>";
											echo "<td><a href='delete.php?code={$row['code']}' class='cartNum'>删除</a></td>";
											echo "</tr>";
										}
							?>
							<tr>
							  <td colspan="10">
								<?php
									echo "本站共有&nbsp;".$hangnum."&nbsp;条记录&nbsp;";
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