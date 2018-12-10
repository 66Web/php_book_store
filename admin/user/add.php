<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $sql="select * from user";
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
		<form action="insert.php" method='post' enctype='multipart/form-data'>
			<p>用户名:</p>
			<p><input type="text" name='username'></p>

			<p>密码:</p>
			<p><input type="password" name='password'></p>

			<p>真实姓名:</p>
            <p><input type="text" name='realname'></p>

            <p>性别:</p>
            <p>
            	<label>
            		<input type="radio" name="sex" value='1' checked> 女
            	</label>
            	<label>
            		<input type="radio" name="sex" value='0'> 男
            	</label>
            </p>

            <p>头像:</p>
            <p><input type="file" name="img"></p>

			<p><input type="submit" value="添加"></p>
		</form>		
	</div>
	
</body>
</html>