<html>
 <head>
  <title>导航</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta charset="utf-8" />
  <link rel="stylesheet/less" type="text/css" href="less.css">
  <script type="text/javascript" src="less-1.3.0.min.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  </head>
<body>

<?
include('conn.php');
$flickr = file_get_contents("http://www.flickr.com/explore/interesting/7days/");
preg_match_all("/<img.*?src=[\\\'| \\\"](.*?(?:[\.jpg]))[\\\'|\\\"].*?[\/]?>/",$flickr,$picPath);
for($i=1;$i<=9;$i++)
{
	echo $picPath[1][$i];
	echo "<br/>";
	file_put_contents(basename($picPath[1][$i]), file_get_contents($picPath[1][$i]));
}

?>

</body>
</html>