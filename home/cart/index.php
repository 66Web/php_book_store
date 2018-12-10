<?php
  session_start();
  include '../../public/common/conn.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
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
						<span>我的购物车:</span>	
					</div>
					<div class="right">
					    <a href="../index.php">继续购物>></a>
					</div>
				</div>

				<div class="floorFooter2">
					<table width='100%'>
						<tr>
							<th>图书</th>
							<th>图片</th>
							<th>价格</th>
							<th>库存</th>
							<th>数量</th>
							<th>合计</th>
							<th>删除</th>
						</tr>
                        <?php
                          $tot = 0;
                          if(!@$_SESSION['books']){
                            echo "您还未购买任何图书&nbsp;<a href='../index.php' class='cartNum'>前往购书</a>";
                          }else{
                            foreach($_SESSION['books'] as $book){
                              $tot += $book['nowprice']*$book['num'];
                        ?>
						<!--购物车数据块开始-->
						<tr>
							<td><?php echo $book['name']?></td>
							<td>
								<img src="../../public/uploads/thumb_<?php echo $book['img']?>" width='100px'>
							</td>
							<td><?php echo $book['nowprice']?>元</td>
							<td><?php echo $book['stock']?>本</td>
							<td>
								<a href="cut.php?id=<?php echo $book['id']?>" class='cartNum'>-</a>
								<span><?php echo $book['num']?></span>
								<a href="add.php?id=<?php echo $book['id']?>" class='cartNum'>+</a>
							</td>
							<td><?php echo $book['nowprice']*$book['num']?>元</td>
							<td>
								<a href="delete.php?id=<?php echo $book['id']?>" class='cartDel'>删除</a>
							</td>
						</tr>
                        <!--购物车数据块结束-->
                        <?php
                           }
                        ?>
                        <tr class="cartTot">
                           <td colspan="4">
                              <a href="clear.php" class='cartNum'>清空购物车</a>
                           <td>
                           <td>
                              <span>总合计：</span>
                           </td>
                           <td>
                              <span><?php echo $tot?>元</span>
                           </td>
                        </tr>
                    <?php
                         }
                    ?>
				  </table>
				</div>
			</div>


            <div class="nav"></div>
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>我的联系方式:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
				<!--判断用户是否登录 session-->
				<?php
                   if(@$_SESSION['home_userid']){
				?>
				  <form action="commit.php" method='post'>
					<table width='100%' class='touch'>
						<tr>
							<th>选择</th>
							<th>姓名</th>
							<th>地址</th>
							<th>邮编</th>
							<th>电话</th>
						</tr>

                        <?php
                           $user_id = $_SESSION['home_userid'];
                           $sql = "select * from touch where user_id = {$user_id}";
                           $rst = mysql_query($sql);
                           $i = 0;
                           while($row=mysql_fetch_assoc($rst)){
							//联系方式数据块开始
							if($i == 0){
                               echo "<tr>
                         			    <td>
                         				    <input type='radio' name='touch_id' value='{$row['id']}' checked>
                         			    </td>
                         			    <td>{$row['name']}</td>
                         			    <td>{$row['addr']}</td>
                         			    <td>{$row['postcode']}</td>
                         			    <td>{$row['tel']}</td>
                         			 </tr>";
							}else{
							   echo "<tr>
                               			<td>
                               				<input type='radio' name='touch_id' value='{$row['id']}'>
                               			</td>
                               			<td>{$row['name']}</td>
                               			<td>{$row['addr']}</td>
                               			<td>{$row['postcode']}</td>
                               			<td>{$row['tel']}</td>
                               		</tr>";
							}
						    $i++;
							//联系方式数据块结束
                           }
                    }else{
                       echo "您还未登录，请先登录! <a href='../login.php' class='cartNum'>登录</a>";
                    }
                        ?>
					</table>
				 </div>
			  </div>

			  <div class="floor">
              	 <div class="floorHeader">
              		 <div class="left">
              			  <span>结算我的订单:</span>
              	     </div>
                 </div>

                 <div class="floorFooter2">
                         <select name="paytype">
                             <option value='1' selected>货到付款</option>
                             <option value='2'>支付宝付款</option>
                             <option value='3'>一卡通付款</option>
                         </select>
                         <select name="posttype">
                             <option value='1' selected>普通快递</option>
                             <option value='2'>EMS</option>
                             <option value='3'>顺丰</option>
                         </select>
              	         <input type="submit" value="提交订单" class="commit">
                 </div>
              </div>
           </form>
		</div>	

		<?php 
			include '../footer.php';
		?>
	</div>	
</body>
</html>