<?php
     include '../../public/common/conn.php';
     include '../public/session.php';

     $sql="select book.*,user.username,class.name cname from book,user,class where book.class_id=class.id and book.supplier=user.id order by book.id";
     $rst=mysql_query($sql);

     $size = 4;
     $hangnum = mysql_num_rows($rst);
     if($hangnum == 0){
        echo "暂无图书";
     }else{
        $page_num = ceil($hangnum/$size);
        if(@$_GET['page_id']){
            $page_id = $_GET['page_id'];
            $start = ($page_id-1)*$size;
        }else{
            $page_id = 1;
            $start = 0;
        }

        $fenye_sel = "select book.*,user.username,class.name cname from book,user,class where book.class_id=class.id and book.supplier=user.id order by book.id limit $start,$size";
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
				<th>编号</th>
				<th>用户</th>
				<th>名称</th>
				<th>作者</th>
				<th>图片</th>
				<th>定价</th>
				<th>本站价</th>
				<th>库存</th>
				<th>销售量</th>
				<th>货架</th>
				<th>推荐</th>
				<th>分类</th>
				<th>修改</th>
				<th>删除</th>
			</tr>
			<?php
				while($row=mysql_fetch_assoc($fenye_add)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$row['writer']}</td>";
					echo "<td><img src='../../public/uploads/thumb_{$row['img']}' width='50px'></td>";
					echo "<td>{$row['oldprice']}</td>";
					echo "<td>{$row['nowprice']}</td>";
					echo "<td>{$row['stock']}</td>";
					echo "<td>{$row['sales']}</td>";
					if($row['shelf']){
						echo "<td>上架</td>";
					}else{
						echo "<td>下架</td>";
					}
					if($row['recommend']){
                    	echo "<td>推荐</td>";
                    }else{
                    	echo "<td>不推荐</td>";
                    }
					echo "<td>{$row['cname']}</td>";
					echo "<td><a href='change.php?id={$row['id']}'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}&img={$row['img']}'>删除</a></td>";
					echo "</tr>";
				}
			?>
			<tr>
              <td colspan="14">
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