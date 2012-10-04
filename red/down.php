<?php 
set_time_limit(120);
for ($i=0; $i < 200; $i++) { 
	$img = file_get_contents("http://hub.hust.edu.cn/randomImage.action");
	file_put_contents(($i.".jpg"), $img);
}




 ?>