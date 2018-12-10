<?php
     include '../../public/common/conn.php';
     include '../public/session.php';

     $code = $_GET['code'];

     $sql="select indent.price,indent.num,book.name,book.img from indent,book where indent.book_id=book.id and indent.code='{$code}'";
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

         $fenye_sel = "select indent.price,indent.num,book.name,book.img from indent,book where indent.book_id=book.id and indent.code='{$code}' limit $start,$size";
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
				<th>图书名称</th>
				<th>图片</th>
				<th>价格</th>
				<th>数量</th>
				<th>合计</th>
			</tr>
			<?php
			    $tot = 0;
				while($row=mysql_fetch_assoc($fenye_add)){
				    $tot += $row['price']*$row['num'];
					echo "<tr>";
					echo "<td>{$row['name']}</td>";
					echo "<td><img src='../../public/uploads/thumb_{$row['img']}' width='50px'></td>";
					echo "<td>{$row['price']}</td>";
                    echo "<td>{$row['num']}</td>";
                    echo "<td>".$row['price']*$row['num']."元</td>";
					echo "</tr>";
				}
			?>
			<tr>
                <td colspan="3"></td>
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

</body>
</html>