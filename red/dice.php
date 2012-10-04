<?php 
set_time_limit(3600);
function dice($dice){
	if (0 <= $dice && $dice < 28){
		return 1;
	}
	if (28 <= $dice && $dice < 56){
		return 2;
	}
	if (56 <= $dice && $dice < 84){
		return 3;
	}
	if (84 <= $dice && $dice < 112){
		return 4;
	}
	if (112 <= $dice && $dice < 140){
		return 5;
	}
	if (140 <= $dice && $dice < 168){
		return 6;
	}
	if (168 <= $dice && $dice < 196){
		return 7;
	}
	if (196 <= $dice && $dice < 224){
		return 8;
	}
	if (224 <= $dice && $dice <= 255){
		return 9;
	}
}

$image = "face/bg2011112607.jpg";
$one = imagecreatefrompng("dice/1.png");
$two = imagecreatefrompng("dice/2.png");
$three = imagecreatefrompng("dice/3.png");
$four = imagecreatefrompng("dice/4.png");
$five = imagecreatefrompng("dice/5.png");
$six = imagecreatefrompng("dice/6.png");
$seven = imagecreatefrompng("dice/7.png");
$eight = imagecreatefrompng("dice/8.png");
$nine = imagecreatefrompng("dice/9.png");


$im = imagecreatefromjpeg($image);
$size = getimagesize($image);
$img = imagecreatetruecolor($size[0], $size[1]);
$xbox = $size[0] / 10;
$ybox = $size[1] / 10 ;
for ($xgrid=0; $xgrid < $xbox; $xgrid++) {
	for ($ygrid=0; $ygrid < $ybox; $ygrid++) {
		$totalR = 0;
		$totalG = 0;
		$totalB = 0;
		for ($x=0; $x < 10; $x++) { 
			for ($y=0; $y < 10; $y++) { 
				@$rgb = imagecolorat($im, $x+ 10 * $xgrid, $y+ 10 * $ygrid);
				$r =($rgb >> 16) & 0xFF;
		 		$g = ($rgb >> 8) & 0xFF;
		 		$b = $rgb & 0xFF;
		 		$totalR += $r;
		 		$totalG += $g;
		 		$totalB += $b;
			}
		}
		$rr = $totalR / (10*10);
		$gg = $totalG / (10*10);
		$bb = $totalB / (10*10);
		$dice = 0.3* $rr + 0.59* $gg + 0.11* $bb;
		switch (dice($dice)) {
			case 1:
				imagecopy($img, $one, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 2:
				imagecopy($img, $two, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 3:
				imagecopy($img, $three, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 4:
				imagecopy($img, $four, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 5:
				imagecopy($img, $five, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 6:
				imagecopy($img, $six, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 7:
				imagecopy($img, $seven, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 8:
				imagecopy($img, $eight, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			case 9:
				imagecopy($img, $nine, $xgrid*10, $ygrid*10, 0, 0, 10, 10);
				break;
			default:
				# code...
				break;
				}
			}
		}
imagejpeg($img,"art.jpg");
echo "<img src=face/bg2011112607.jpg />";
echo "<img src=art.jpg />";

 ?>
