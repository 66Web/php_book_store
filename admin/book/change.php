<?php
  include '../../public/common/conn.php';
  include '../public/session.php';

  $id = $_GET['id'];
  $sqlBook = "select * from book where id = {$id}";

  $rstBook = mysql_query($sqlBook);
  $rowBook = mysql_fetch_assoc($rstBook);
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
			<p>名称:</p>
			<p><input type="text" name='name' value='<?php echo $rowBook['name']?>'></p>

            <p>作者:</p>
            <p><input type="text" name='writer' value='<?php echo $rowBook['writer']?>'></p>

			<p>定价:</p>
			<p><input type="text" name='oldprice' value='<?php echo $rowBook['oldprice']?>'></p>

            <p>本站价:</p>
			<p><input type="text" name='nowprice' value='<?php echo $rowBook['nowprice']?>'></p>

			<p>是否推荐:</p>
            <p>
            <?php
               if($rowBook['recommend']){
            ?>
                 <label>
                     <input type="radio" name="recommend" value='1' checked> 是
                 </label>
                 <label>
                     <input type="radio" name="recommend" value='0'> 否
                 </label>
            <?php
              }else{
            ?>
                 <label>
                     <input type="radio" name="recommend" value='1'> 是
                 </label>
                 <label>
                     <input type="radio" name="recommend" value='0' checked> 否
                  </label>
            <?php
              }
            ?>
            </p>

			<p>库存:</p>
			<p><input type="text" name='stock' value='<?php echo $rowBook['stock']?>'></p>

			<p>销售量:</p>
            <p><input type="text" name='sales' value='<?php echo $rowBook['sales']?>'></p>

			<p>货架:</p>
			<p>
				<?php
					if($rowBook['shelf']){
				?>
						<label>
							<input type="radio" name="shelf" value='1' checked> 上架
						</label>
						<label>
							<input type="radio" name="shelf" value='0'> 下架
						</label>
				<?php
					}else{
				?>
						<label>
							<input type="radio" name="shelf" value='1'> 上架
						</label>
						<label>
							<input type="radio" name="shelf" value='0' checked> 下架
						</label>
				<?php
					}
				?>
			</p>

			<p>类别:</p>
			<p>
				<select name="class_id">
                	<?php
                	    $sqlClass="select * from class";
                        $rstClass=mysql_query($sqlClass);
                        while($rowClass=mysql_fetch_assoc($rstClass)){
                           if($rowClass['id'] == $rowBook['class_id']){
                              echo "<option value='{$rowClass['id']}' selected>{$rowClass['name']}</option>";
                           }else{
                              echo "<option value='{$rowClass['id']}'>{$rowClass['name']}</option>";
                           }
                        }
                	?>
                </select>
			</p>
			<p>原图:</p>
			<p><img src="../../public/uploads/<?php echo $rowBook['img']?>" width="100px"></p>

			<p>图片:</p>
			<p><input type="file" name="img"></p>

			<p>简介:</p>
            <p>
              <textarea name='info' cols="30" rows="5" style="margin-left:10px;"><?php echo $rowBook['info']?></textarea>
            </p>

			<input type="hidden" name="id" value='<?php echo $rowBook['id']?>'>
			<input type="hidden" name="imgsrc" value='<?php echo $rowBook['img']?>'>

			<p><input type="submit" value="修改"></p>
		</form>
	</div>

</body>
</html>