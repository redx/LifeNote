<?php 
include("conn.php");
$item =10;
if (@$_GET['page'] =="")
  {
    $page = 0;
  }else{
  $page = $_GET['page']-1;
}
$startItem = $page*$item;
$uid = $_GET['uid'];
$query = "SELECT * FROM mobile WHERE `uid`='$uid' ORDER BY  `mobile`.`id` DESC LIMIT $startItem,$item";
$query_results = mysql_query($query);
?>
<html>
  <head>
    <title>MobileReader</title>
    <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.5"/>
    <script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" href="mobile.css" type="text/css" media="screen" />
    <script type="text/javascript" src="less-1.3.0.min.js"></script>
  </head>
  <body>
  <h2>Mobile Reader</h2>
    <div id="mobile">
      <?php 
  while($row = mysql_fetch_array($query_results)){
    echo "<div class='item'><li>";
    $url = str_replace("http://","http://h2w.iask.cn/hd.php?u=http://",$row['url']);
    echo "<a href='$url'>$row[title]</a>";
    echo "</li></div>";
  }
echo "<div id='page'><a href=mobile.php?uid=$uid&page=".($page+2)." >下一页</a>&nbsp;&nbsp;&nbsp;"; 
echo "<a href=mobile.php?uid=$uid&page=".($page)." >上一页</a></div>"; 
      ?>

    </div>
  </body>
</html>
