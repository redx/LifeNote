<?
$imgArray =array();
function getImgLinks($dir)
{	
	$imgArray =array();
	$dir = new DirectoryIterator($dir);
	foreach ($dir as $fileinfo) {
		if(!$fileinfo->isDot()&&!$fileinfo->isFile())
		{
		getImgLinks($fileinfo->getPathname());
		}

		if(!$fileinfo->isDot()&&$fileinfo->isFile()){
		array_unshift($imgArray,$fileinfo->getPathname());
		}
	}
	return $imgArray;
}

if(@$_GET['rand'] == '1')
{
	$imgs = getImgLinks('img');
	$imgs = $imgs[rand(0,(count($imgs)-1))];
	echo $imgs;
}

?>
