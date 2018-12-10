<?php
  include 'public/session.php';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<frameset rows='15%,*' frameborder='no' border="1">
	<frame src='top.php' name='top'> <!--有15%的高度-->
	<frameset cols='15%,85%' frameborder='no' border="1">
		<frame src='left.php' name='left'><!--有15%的宽度-->
		<frame src='right.php' name='right'><!--有85%的宽度-->
	</frameset>
</frameset>
</html>