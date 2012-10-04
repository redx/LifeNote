<?php 
for ($i=0; $i < 5; $i++) { 
	# code...

	$image = "face/8.jpeg";
	$im = imagecreatefromjpeg($image);
	$size = getimagesize($image);
	$img = imagecreatetruecolor($size[0],$size[1]);
	for ($x=0 ;$x < $size[0];$x++) { 
		for ($y=0; $y < $size[1]; $y++) { 
			$rgb = imagecolorat($im, $x, $y);
			$r =($rgb >> 16) & 0xFF;
		 	$g = ($rgb >> 8) & 0xFF;
		 	$b = $rgb & 0xFF;
		 	if ((107 - 20 - ($i * 5)) < $r && $r < (107 + 20 + ($i * 5))  && (74 -20 - ($i * 5)) < $g &&  $g < (74 +20 + ($i * 5)) &&  (65 -20 - ($i * 5)) < $b && $b <(65 +20 + ($i * 5)) ){
		 		$r = 0;
		 		$color = imagecolorallocate($img, $r, $r, $r);
		 		
		 	}elseif((90 - 20 - ($i * 5)) < $r && $r < (90 + 20 + ($i * 5))  && (80 -20 - ($i * 5)) < $g &&  $g < (80 +20 + ($i * 5)) &&  (75 -20 - ($i * 5)) < $b && $b <(75 +20 + ($i * 5)) ){
		 		$r = 0;
		 		$color = imagecolorallocate($img, $r, $r, $r);
		 		
		 	}elseif ((187 - 20 - ($i * 5)) < $r && $r < (187 + 20 + ($i * 5))  && (135 -20 - ($i * 5)) < $g &&  $g < (135 +20 + ($i * 5)) &&  (111 -20 - ($i * 5)) < $b && $b <(111 +20 + ($i * 5)) ) {
		 		$r = 0;
		 		$color = imagecolorallocate($img, $r, $r, $r);
		 	}
		 	else{
		 		$r = 255;
		 		$color = imagecolorallocate($img, $r, $r, $r);
		 		
		 	}
		 	imagesetpixel($img, $x, $y, $color);
		}
	}
	imagejpeg($img,"face$i.jpg");
	echo "<img src=face$i.jpg /><img src=face/8.jpeg /><br/>";
	}
 ?>