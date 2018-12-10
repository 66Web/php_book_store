<?php
     include '../../public/common/conn.php';
     include '../public/session.php';

     $touch_id = $_GET['touch_id'];

     $sql="select * from touch where id={$touch_id}";
     $rst=mysql_query($sql);
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
				<th>姓名</th>
				<th>地址</th>
				<th>邮编</th>
				<th>电话</th>
			</tr>
			<?php
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>{$row['addr']}</td>";
					echo "<td>{$row['postcode']}</td>";
                    echo "<td>{$row['tel']}</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>

</body>
</html>