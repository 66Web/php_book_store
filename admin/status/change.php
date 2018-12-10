<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $id = $_GET['id'];
  $sql = "select * from status where id = {$id}";

  $rst = mysql_query($sql);
  $row = mysql_fetch_assoc($rst);
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
		<form action="update.php" method='post'>
			<p>状态名称:</p>
			<p><input type="text" name='name' value='<?php echo $row['name']?>'></p>

			<input type="hidden" name="id" value='<?php echo $row['id']?>'>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>