<?php 
$image = "http://hub.hust.edu.cn/randomImage.action";//
$receive = "receive.jpg";
file_put_contents($receive,file_get_contents($image));
$im = imagecreatefromjpeg($receive);
$size = getimagesize($receive);
$imbk = imagecreatetruecolor($size[0], $size[1]);
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
			 $color = imagecolorallocate($imbk,$r, $r, $r);
		 	imagesetpixel($imbk, $x, $y, $color);
		}	
	}
imagejpeg($imbk,"test.jpg");
echo "<img src=$receive /><br/><img src=test.jpg /><br />";


function recongnize($head,$body,$foot)
{
	if (55650 < $head &&  $head < 57421 && 40479 < $body && $body < 43527 && 28206 < $foot &&  $foot < 28502) {
		echo "9";
	}elseif (56020 < $head &&  $head < 56693  && 40419 < $body && $body < 40941 && 27381 < $foot &&  $foot < 27825) {
		echo "0";
	}elseif (58675 < $head &&  $head < 59884 && 42918 < $body && $body < 43959 && 27972 < $foot &&  $foot < 28498) {
		echo "1";
	}elseif (57383 < $head &&  $head < 58225  && 42130 < $body && $body < 42825 && 27239 < $foot &&  $foot < 27571) {
		echo "2";
	}elseif (57084 < $head &&  $head < 57975  && 42167 < $body && $body < 42959 && 27942 < $foot &&  $foot < 28678) {
		echo "3";
	}elseif (57411 < $head &&  $head < 59778  && 41072 < $body && $body < 41908 && 27170 < $foot &&  $foot < 28489) {
		echo "4";
	}elseif (58693 < $head &&  $head < 59617  && 43361 < $body && $body < 43878 && 29350 < $foot &&  $foot < 29557) {
		echo "5";
	}elseif (55685 < $head &&  $head < 57083  && 39995 < $body && $body < 41060 && 26456 < $foot &&  $foot < 27319) {
		echo "6";
	}elseif (60423 < $head &&  $head < 62245  && 46162 < $body && $body < 47739 && 20212 < $foot &&  $foot < 31258) {
		echo "7";
	}elseif (54651 < $head &&  $head < 55610  && 39235 < $body && $body < 41769 && 26674 < $foot &&  $foot < 28516) {
		echo "8";
	}else{
		echo "*";
	}
}

for ($cuts=0; $cuts < 5; $cuts++) { 
	$image = "test.jpg";
	$images = imageCreateFromJPEG($image);
	$imcut = imagecreatetruecolor(15, 20);
	imagecopy($imcut, $images, 0, 0, 13 * $cuts, 0, 15, 20);
	imagejpeg($imcut,"$cuts.jpg");
}


for ($w=0; $w < 5; $w++) { 
	$color = array(0,0,0,0);
	$image = "$w.jpg";
	$im = imageCreateFromJPEG($image);
	for ($cut=0; $cut < 4; $cut++) { 
		for ($x=1; $x < 15; $x++) { 
				for ($y= (($cut * 5)+1); $y < 20; $y++) { 
					$rgb = imagecolorat($im, $x, $y);
					$r = ($rgb >> 16) & 0xFF;
					$color[$cut] += $r;
				}	
			}
		}
	recongnize($color[0],$color[1],$color[2]);
	for ($m=0; $m < 4; $m++) { 
		$color[$m] = 0;
	}
	//echo "<img src=$image /><br/>";
}


 ?>