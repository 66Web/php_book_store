<?php
     include '../../public/common/conn.php';
     include '../public/session.php';

     $sql="select indent.*,user.username,status.name from indent,user,status where indent.user_id=user.id and indent.status_id=status.id group by indent.code";
     $rst=mysql_query($sql);

     $size = 5;
     $hangnum = mysql_num_rows($rst);
     if($hangnum == 0){
       echo "暂无用户";
     }else{
       $page_num = ceil($hangnum/$size);
       if(@$_GET['page_id']){
          $page_id = $_GET['page_id'];
          $start = ($page_id-1)*$size;
       }else{
          $page_id = 1;
          $start = 0;
       }

       $fenye_sel = "select indent.*,user.username,status.name from indent,user,status where indent.user_id=user.id and indent.status_id=status.id group by indent.code limit $start,$size";
       $fenye_add = mysql_query($fenye_sel);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<table>
			<tr>
				<th>订单号</th>
				<th>用户</th>
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
				while($row=mysql_fetch_assoc($fenye_add)){
					echo "<tr>";
					echo "<td><a href='code.php?code={$row['code']}'>{$row['code']}</a></td>";
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
					echo "<td><a href='touch.php?touch_id={$row['touch_id']}'>联系方式</a></td>";
					echo "<td><a href='change.php?code={$row['code']}&status_id={$row['status_id']}&paytype={$row['paytype']}&posttype={$row['posttype']}'>修改</a></td>";
                    echo "<td><a href='delete.php?code={$row['code']}'>删除</a></td>";
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

</body>
</html>