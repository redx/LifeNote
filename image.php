<?php 
/*
$img = imagecreatetruecolor(500, 300);
$bg = imagecolorallocate($img,255,255,255);//第一次使用调色板，将会输出背景颜色
$txtcolor = imagecolorallocate($img, 0, 0, 0);//设置文字颜色
$dotcolor = imagecolorallocate($img,0, 0, 0);
imagestring($img,5, rand(0,500), rand(0,300), "hello", $bg);
//imageline($img, rand(0,500), rand(0,500), 20, 30, $txtcolor);
imagettftext($img, 15, 180, 200, 200, $txtcolor, "font.ttf", "中国制造!");
imagesetpixel($img,rand(0,500),rand(0,500), $dotcolor);
header("Content-type:image/jpeg");
imagejpeg($img);


//$img = getimagesize("image.jpg");
//print_r($img);//取得图像的信息
$im = imageCreateFromJPEG("image.jpg");
$logo = imagecreatefrompng("bookmark.png");
imagecopy($im, $logo, 20, 20, 0, 0, "128", "128");
$text = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 80, 0, 200, 200, $text, "font.ttf", "中国制造!");
header("Content-type:image/jpeg");
imagejpeg($im,"test.jpg");

$im = imageCreateFromJPEG("image.jpg");
$in = imagecreatetruecolor(300, 200);
imagecopyresized($in, $im, 0, 0, 0, 0, 300, 200, 500, 300);
header("Content-type:image/jpeg");
imagejpeg($in);
*/

$image = "http://hub.hust.edu.cn/randomImage.action";
$im = imageCreateFromJPEG($image);
$size = getimagesize($image);
$img = imagecreatetruecolor($size[0], $size[1]);
for ($x=0; $x < $size[0]; $x++) { 
	for ($y=0; $y < $size[1]; $y++) { 
		 $rgb = imagecolorat($im, $x, $y);
		 $r =($rgb >> 16) & 0xFF;
		 $g = ($rgb >> 8) & 0xFF;
		 $b = $rgb & 0xFF;
		 if ($r > 125) {
		 	$r = 255;
		 }else{
		 	$r = 0;
		 }
		 $color = imagecolorallocate($img,$r, $r, $r);
		 imagesetpixel($img, $x, $y, $color);

	}
}

header("Content-type:image/jpeg");
imagejpeg($img);

 ?>