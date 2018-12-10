<?php

//图片缩放函数
function thumb($src_file,$dst_w,$dst_h){
	//原图大小
	$arr=getimagesize($src_file);
	$src_w=$arr[0];
	$src_h=$arr[1];
	$src_type=$arr[2];
	$sm=$arr['mime'];

	switch($src_type){
		case 1:
			$imagecreatefrom="imagecreatefromgif";
			$imageout="imagegif";
			break;

		case 2:
			$imagecreatefrom="imagecreatefromjpeg";
			$imageout="imagejpeg";
			break;

		case 3:
			$imagecreatefrom="imagecreatefrompng";
			$imageout="imagepng";
			break;
	}

	//原图和目标图片资源
	$simgr=$imagecreatefrom($src_file);

	//等比例计算
	if($src_w/$dst_w>$src_h/$dst_h){
		$scale=$src_w/$dst_w;
	}else{
		$scale=$src_h/$dst_h;
	}

	$dst_w2=floor($src_w/$scale);
	$dst_h2=floor($src_h/$scale);

	//目标图片资源
	$dimgr=imagecreatetruecolor($dst_w2,$dst_h2);

	//开始缩放
	imagecopyresampled($dimgr,$simgr,0,0,0,0,$dst_w2,$dst_h2,$src_w,$src_h);

	//保存到与原图同一个目录下
	$dir=dirname($src_file);
	$file=basename($src_file);
	$save_file=$dir.'/'.'thumb_'.$file;
	$imageout($dimgr,$save_file);
}

?>