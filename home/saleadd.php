<?php
  include '../public/common/conn.php';
  include 'public/session.php';

  $sql="select * from class";
  $rst=mysql_query($sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发布旧书</title>
	<link rel="stylesheet" href="public/css/发布旧书.css">
	<link rel="stylesheet" href="public/css/animate.min.css">
</head>
<body>
	<div class="main">
		<?php
			include 'header.php';
		?>
		<div id="fabu" class="animated bounceInRight">
      <div class="fabu">
				<form   action="<?php echo $root?>/home/person/book/insert.php" method='post' enctype='multipart/form-data'>
            <p class="left-name">名称:</p>
            <p><input type="text" name='name' class="right-name"></p>
          
            <p class="left-writer">作者:</p>
            <p><input type="text" name='writer'  class="right-writer"></p>

            <p class="left-oprice">定价:</p>
            <p><input type="text" name='oldprice'  class="right-oprice"></p>

            <p class="left-nprice">出售价:</p>
            <p><input type="text" name='nowprice'  class="right-nprice"></p>

            <p class="left-stock">库存:</p>
            <p><input type="text" name='stock'  class="right-stock"></p>

            <p class="left-num">销量:</p>
            <p><input type="text" name='sales'  class="right-num"></p>

            <p class="left-huojia">货架:</p>
            <p class="right-huojia">
            <label>
            	<input type="radio" name="shelf" value='1' checked> 上架
            </label>
            <label>
            	<input type="radio" name="shelf" value='0'> 下架
            </label>
            </p>

            <p class="left-leibie">类别:</p>
            <p class="right-leibie">
              <select name="class_id">
                <?php
                   while($row=mysql_fetch_assoc($rst)){
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";}
                ?>
              </select>
            </p>

            <p class="left-img">图片:</p>
            <p><input type="file" name="img"  class="right-img"></p>

            <p class="left-jianjie">简介:</p>
            <p><textarea name='info' cols="30" rows="5"  class="right-jianjie"></textarea></p>

            <p><input type="submit" value="发布" class="commit"></p>
            </form>
			    </div>
        </div>

		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>