<?php
     include '../../public/common/conn.php';
     include '../public/session.php';

     $sql = "select * from class";
     $rst = mysql_query($sql);

     $size = 7;
     $hangnum = mysql_num_rows($rst);
     if($hangnum == 0){
        echo "暂无分类";
     }else{
        $page_num = ceil($hangnum/$size);
        if(@$_GET['page_id']){
          $page_id = $_GET['page_id'];
          $start = ($page_id-1)*$size;
        }else{
          $page_id = 1;
          $start = 0;
        }

        $fenye_sel = "select * from class limit $start,$size";
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
				<th>类别名称</th>
				<th>修改</th>
				<th>删除</th>
			</tr>
			<?php
               while($row = mysql_fetch_assoc($fenye_add)){
                  echo "<tr>";
                     echo "<td>{$row['id']}</td>";
                     echo "<td>{$row["name"]}</td>";
                     echo "<td><a href='change.php?id={$row["id"]}'>修改</a></td>";
                     echo "<td><a href='delete.php?id={$row["id"]}'>删除</a></td>";
                  echo "</tr>";
               }
			?>
			<tr>
            	<td colspan="4">
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