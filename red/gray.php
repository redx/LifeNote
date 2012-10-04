<?php 
$image = "face/14.jpeg";
$im = imagecreatefromjpeg($image);
$size = getimagesize($image);
$img = imagecreatetruecolor($size[0], $size[1]);
for ($x=0; $x < $size[0] ; $x++) {
	for ($y=0; $y < $size[1] ; $y++) { 
		$rgb = imagecolorat($im, $x, $y);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;
		$seed = rand(1,30);
		if ($seed == 5) {
			$color = imagecolorallocate($img, $r+30, $r+30, $r+30);
		}elseif($seed == 7){
			$color = imagecolorallocate($img, $r-10, $r-10, $r-10);
		}else{
			$color = imagecolorallocate($img, $r, $r, $r);
		}
		imagesetpixel($img, $x, $y, $color);
	}
}

imagejpeg($img,"gray.jpg");
echo "<img src=gray.jpg />";


 ?>