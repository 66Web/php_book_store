<?php
 include '../public/common/conn.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" /> 
		<link rel="stylesheet" href="public/css/high_search.css" />
		<title></title>
	</head>
	<body>
		<div id="search">				
			<form action="matchsearch.php" method="post">
			    <input placeholder=" 请输入图书名" type="text" name="name" >
			    <input placeholder=" 请输入作者名" type="text" name="writer">
				<input name="search" type="submit" value="高级搜索" class="btn-search"/>
			</form>			
		</div>
	</body>
	
	
	
</html>