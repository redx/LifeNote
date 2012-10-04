<html>
<head>
	<title></title>
</head>
<body style="background:#e2e2e2;">

</body>
</html>

<?php 
$image = "face/psbe.jpg";
$im = imagecreatefromjpeg($image);
$size = getimagesize($image);
$width = $size[0]+40;
$height = $size[1]+100 ;
$img = imagecreatetruecolor($width,$height);
$color = imagecolorallocate($img, 242, 242, 242);
for ($x=0; $x <= $width ; $x++) { 
	for ($y=0; $y <= $height ; $y++) {
		imagesetpixel($img, $x, $y, $color);
	}
}
imagecopy($img, $im, 20, 20, 0, 0, $size[0], $size[1]);
imagejpeg($img,"polaroid.jpg");
echo "<div style='margin-top:50px;'><center><img src=polaroid.jpg /></center></div>";




 ?>