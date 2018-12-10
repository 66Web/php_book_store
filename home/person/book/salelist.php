<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看出售图书</title>
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
						<table width='100%'>
							<tr>
                            	<th>名称</th>
                            	<th>作者</th>
                            	<th>图片</th>
                            	<th>定价</th>
                            	<th>售价</th>
                            	<th>库存</th>
                            	<th>销售量</th>
                            	<th>货架</th>
                            	<th>分类</th>
                            	<th>修改</th>
                            	<th>删除</th>
                            </tr>
                        <?php
                            $user_id = $_SESSION['home_userid'];
                            $sql = "select book.*,class.name cname from book,class where book.class_id=class.id and book.supplier = {$user_id}";
                            $rst = mysql_query($sql);

                            $size = 6;
                            $hangnum = mysql_num_rows($rst);
                            if($hangnum == 0){
                                echo "暂无出售图书";
                            }else{
                                $page_num = ceil($hangnum/$size);
                                if(@$_GET['page_id']){
                                   $page_id = $_GET['page_id'];
                                   $start = ($page_id-1)*$size;
                                }else{
                                   $page_id = 1;
                                   $start = 0;
                                }

                                $fenye_sel = "select book.*,class.name cname from book,class where book.class_id=class.id and book.supplier = {$user_id} limit $start,$size";
                                $fenye_add = mysql_query($fenye_sel);

                                while($row=mysql_fetch_assoc($fenye_add)){
							           echo "<tr>";
                            		   echo "<td>{$row['name']}</td>";
                            		   echo "<td>{$row['writer']}</td>";
                            		   echo "<td><img src='../../../public/uploads/thumb_{$row['img']}' width='50px'></td>";
                            		   echo "<td>{$row['oldprice']}</td>";
                            		   echo "<td>{$row['nowprice']}</td>";
                            		   echo "<td>{$row['stock']}</td>";
                            		   echo "<td>{$row['sales']}</td>";
                            		   if($row['shelf']){
                            			   echo "<td>上架</td>";
                            		   }else{
                            			   echo "<td>下架</td>";
                            		   }
                            		   echo "<td>{$row['cname']}</td>";
                            		   echo "<td><a href='change.php?id={$row['id']}'>修改</a></td>";
                            		   echo "<td><a href='delete.php?id={$row['id']}&img={$row['img']}'>删除</a></td>";
                            		   echo "</tr>";
                            	   }
                            ?>
                         	<tr>
                               <td colspan="11">
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