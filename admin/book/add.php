<?php
	include '../../public/common/conn.php';
    include '../public/session.php';

	$sql="select * from class";
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
			<p>名称:</p>
			<p><input type="text" name='name'></p>

            <p>作者:</p>
            <p><input type="text" name='writer'></p>

			<p>定价:</p>
			<p><input type="text" name='oldprice'></p>

            <p>本站价:</p>
			<p><input type="text" name='nowprice'></p>

			<p>是否推荐:</p>
            <p>
                 <label>
                     <input type="radio" name="recommend" value='1' checked> 是
                 </label>
                 <label>
                     <input type="radio" name="recommend" value='0'> 否
                 </label>
            </p>

			<p>库存:</p>
			<p><input type="text" name='stock'></p>

			<p>销量:</p>
            <p><input type="text" name='sales'></p>

			<p>货架:</p>
			<p>
				<label>
					<input type="radio" name="shelf" value='1' checked> 上架
				</label>
				<label>
					<input type="radio" name="shelf" value='0'> 下架
				</label>
			</p>

			<p>类别:</p>
			<p>
				<select name="class_id">
					<?php
                        while($row=mysql_fetch_assoc($rst)){
                        	echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
					?>	
				</select>
			</p>

			<p>图片:</p>
			<p><input type="file" name="img"></p>

			<p>简介:</p>
            <p><textarea name='info' cols="30" rows="5"></textarea></p>

			<p><input type="submit" value="添加"></p>
		</form>		
	</div>
	
</body>
</html>