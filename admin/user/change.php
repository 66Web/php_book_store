<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $id = $_GET['id'];
  $sql = "select * from user where id = {$id}";

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
		<form action="update.php" method='post' enctype='multipart/form-data'>
			<p>用户名:</p>
			<p><input type="text" name='username' value='<?php echo $row['username']?>'></p>

			<p>密码:</p>
			<p><input type="password" name='password'></p>

            <p>真实姓名:</p>
            <p><input type="text" name='realname' value='<?php echo $row['realname']?>'></p>

            <p>性别:</p>
            <p>
            	<?php
            		if($row['sex']){
            	?>
            		<label>
            			<input type="radio" name="sex" value='1' checked> 女
            		</label>
            		<label>
            		    <input type="radio" name="sex" value='0'> 男
            		</label>
            	<?php
            		}else{
            	?>
            		<label>
            			<input type="radio" name="sex" value='1'> 女
            		</label>
            		<label>
            		    <input type="radio" name="sex" value='0' checked> 男
            		</label>
            	<?php
            		}
            	?>
            </p>

            <p>原头像:</p>
            <p><img src="../../public/upusers/<?php echo $row['img']?>" width="50px"></p>

            <p>头像:</p>
            <p><input type="file" name="img"></p>

			<input type="hidden" name="id" value='<?php echo $row['id']?>'>
			<input type="hidden" name="imgsrc" value='<?php echo $row['img']?>'>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>