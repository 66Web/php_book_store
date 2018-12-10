<?php
  include '../../../public/common/conn.php';
  include '../../public/session.php';

  $code = $_GET['code'];

  $sql="select indent.price,indent.num,book.id,book.name,book.img from indent,book where indent.book_id=book.id and indent.code='{$code}'";
  $rst=mysql_query($sql);

  $size = 3;
  $hangnum = mysql_num_rows($rst);
  if($hangnum == 0){
     echo "暂无记录";
  }else{
     $page_num = ceil($hangnum/$size);
     if(@$_GET['page_id']){
        $page_id = $_GET['page_id'];
        $start = ($page_id-1)*$size;
     }else{
        $page_id = 1;
        $start = 0;
     }

   $fenye_sel = "select indent.*,book.id,book.name,book.img from indent,book where indent.book_id=book.id and indent.code='{$code}' limit $start,$size";
   $fenye_add = mysql_query($fenye_sel);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看我的订单详情</title>
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
                            	<th>图书名称</th>
                            	<th>图片</th>
                            	<th>价格</th>
                            	<th>数量</th>
                            	<th>合计</th>
                            	<th>评论</th>
                            </tr>
					    <?php
                        	$tot = 0;
                        	while($row=mysql_fetch_assoc($fenye_add)){
                        		$tot += $row['price']*$row['num'];
                        		echo "<tr>";
                        		echo "<td>{$row['name']}</td>";
                        		echo "<td><img src='../../../public/uploads/thumb_{$row['img']}' width='50px'></td>";
                        		echo "<td>{$row['price']}</td>";
                                echo "<td>{$row['num']}</td>";
                                echo "<td>".$row['price']*$row['num']."元</td>";

                                if($row['confirm']){
                                  echo "<td><a href='comment.php?book_id={$row['id']}&code={$row['code']}' class='cartNum'>评论</a></td>";
                                }else{
                                  echo "<td><a href='myorder.php' class='disable' onclick=\"alert('请您先确认该订单！')\">评论</a></td>";
                                }

                        		echo "</tr>";
                        	}
                        ?>
                        			<tr>
                                        <td colspan="4"></td>
                                        <td>订单总额：</td>
                                        <td><?php echo $tot?>元</td>
                                    </tr>
                        <tr>
                           <td colspan="6">
                              <?php
                                     echo "本订单共有&nbsp;".$hangnum."&nbsp;条记录&nbsp;";
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