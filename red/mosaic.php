	<?php 
set_time_limit(3600);
$image = "face/23.jpg";
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
		$rr = $totalR/(10*10);
		$gg = $totalG/(10*10);
		$bb = $totalB/(10*10);
		for ($x=0; $x < 10 ; $x++) { 
			for ($y=0; $y < 10; $y++) { 
				$color = imagecolorallocate($img, $rr, $gg, $bb);
				imagesetpixel($img, $x+ (10 * $xgrid),$y+ (10 * $ygrid), $color);
			}
		}
	}
}
imagejpeg($img,"art.jpg");
echo "<img src=art.jpg /><br/>";
echo "<img src=face/23.jpg />";



 ?>