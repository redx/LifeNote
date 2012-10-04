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
/*
for ($i=0; $i < 200; $i++) { 
 	$image = "down/".$i.".jpg";
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
	//header("Content-type:image/jpeg");
	imagejpeg($img,"img/".$i.".jpg");
}*/

function recongnize($head,$body,$foot)
{
	if (55650 < $head &&  $head < 57421 && 40479 < $body && $body < 43527 && 28206 < $foot &&  $foot < 28502) {
		echo "9!!!";
	}
	if (56020 < $head &&  $head < 56693  && 40419 < $body && $body < 40941 && 27381 < $foot &&  $foot < 27825) {
		echo "0!!!";
	}
	if (58675 < $head &&  $head < 59884 && 42918 < $body && $body < 43959 && 27972 < $foot &&  $foot < 28498) {
		echo "1!!!";
	}
	if (57383 < $head &&  $head < 58225  && 42130 < $body && $body < 42825 && 27239 < $foot &&  $foot < 27571) {
		echo "2!!!";
	}
	if (57084 < $head &&  $head < 57975  && 42167 < $body && $body < 42959 && 27942 < $foot &&  $foot < 28678) {
		echo "3!!!";
	}
	if (57411 < $head &&  $head < 59778  && 41072 < $body && $body < 41908 && 27170 < $foot &&  $foot < 28489) {
		echo "4!!!";
	}	
	if (58693 < $head &&  $head < 59617  && 43361 < $body && $body < 43878 && 29350 < $foot &&  $foot < 29557) {
		echo "5!!!";
	}
	if (55685 < $head &&  $head < 57083  && 39995 < $body && $body < 41060 && 26456 < $foot &&  $foot < 27319) {
		echo "6!!!";
	}
	if (60423 < $head &&  $head < 62245  && 46162 < $body && $body < 47739 && 20212 < $foot &&  $foot < 31258) {
		echo "7!!!";
	}
	if (54651 < $head &&  $head < 55610  && 39235 < $body && $body < 41769 && 26674 < $foot &&  $foot < 28516) {
		echo "8!!!";
	}



}
$color = array(0,0,0,0);
for ($i=0; $i < 199; $i++) { 
	for ($j=0; $j < 5; $j++) { 
		$image = "cut/$i($j).jpg";
		$im = imageCreateFromJPEG($image);
		for ($cut=0; $cut < 4; $cut++) { 
			for ($x=1; $x < 15; $x++) { 
				for ($y= (($cut * 5)+1); $y < 20; $y++) { 
					$rgb = imagecolorat($im, $x, $y);
					$r = ($rgb >> 16) & 0xFF;
					$color[$cut] += $r;
				}
			}
			echo "$color[$cut]/";
		}
	recongnize($color[0],$color[1],$color[2]);
	for ($m=0; $m < 4; $m++) { 
		$color[$m] = 0;
	}
	echo "<img src=$image /><br/>";
	}
}

 ?>