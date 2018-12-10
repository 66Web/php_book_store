<?php
  session_start();
  include '../../public/common/conn.php';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的书库</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<?php
			include '../header.php';
		?>
		<div class="nav"></div>
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><a href='../index.php'>首页</a> &raquo; 书架展示</span>
					</div>

				</div>

				<div class="floorFooter2">
					<table width='100%'>
						<tr>
							<th>图片</th>
							<th>书名</th>
							<th>作者</th>
							<th>定价</th>
							<th>本站价</th>
							<th>库存</th>
							<th>销量</th>
							<th>试读</th>
							<th>删除</th>
							<th>购物车</th>
						</tr>
					<!--判断用户是否登录 session-->
                        <?php
                           if(@!$_SESSION['home_userid']){
                               echo "您还未登录，请先登录! <a href='../login.php' class='cartNum'>登录</a>";
                           }else{
                                     $user_id = $_SESSION['home_userid'];
                                     $sqlShelf = "select * from bookshelf where user_id = {$user_id}";
                                     $rstShelf = mysql_query($sqlShelf);

                                     $size = 4;
                                     @$hangnum = mysql_num_rows($rstShelf);
                                     if($hangnum == 0){
                                        echo "您还未收藏任何图书&nbsp;<a href='../index.php' class='cartNum'>前往收藏</a>";
                                     }else{
                                        if($rowShelf=mysql_fetch_assoc($rstShelf)){
                                             $page_num = ceil($hangnum/$size);
                                             if(@$_GET['page_id']){
                                                 $page_id = $_GET['page_id'];
                                                 $start = ($page_id-1)*$size;
                                             }else{
                                                 $page_id = 1;
                                                 $start = 0;
                                             }

                                             $fenye_sel = "select * from bookshelf where user_id = {$user_id} limit $start,$size";
                                             $fenye_add = mysql_query($fenye_sel);

                                             while($rowShelf=mysql_fetch_assoc($fenye_add)){

                                                $sqlBook = "select * from book where id = {$rowShelf['book_id']}";
                                                $rstBook= mysql_query($sqlBook);
                                                $rowBook=mysql_fetch_assoc($rstBook);

                        ?>
						<tr>
							<td>
								<img src="../../public/uploads/thumb_<?php echo $rowBook['img']?>" width='50px'>
							</td>
							<td><?php echo $rowBook['name']?></td>
							<td><?php echo $rowBook['writer']?></td>
							<td><?php echo $rowBook['oldprice']?>元</td>
							<td><?php echo $rowBook['nowprice']?>元</td>
							<td><?php echo $rowBook['stock']?></td>
							<td><?php echo $rowBook['sales']?></td>
							<td><a href="../book.html">|点击试读|</a></td>
							<td><a href="delete.php?id=<?php echo $rowBook['id']?>">|移出书架|</a></td>
							<td>
								<a href="../cart/insert.php?id=<?php echo $rowBook['id']?>">
									<img src="../public/img/cart.jpg" alt="">
								</a>
							</td>
						</tr>
						<?php
                              }
						     }
						    }
                        ?>
                        <tr>
                            <td colspan="9">
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
			</div>

		</div>

		<?php
			include '../footer.php';
		?>
	</div>
</body>
</html>