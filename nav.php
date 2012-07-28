<?
include("randjpg.php");
require('conn.php');
include("markdown.php");
//require('user.php');
$imgArray=getImgLinks("img");
$path = $imgArray[rand(0,(count($imgArray)-1))];
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
  <script>
  function kpress(e){
  var keynum;
  var keychar;
  if(window.event)//IE
	{
		keynum=e.keyCode;
		}else{
		keynum=e.which;
	}
	keychar=String.fromCharCode(keynum);
	if(keynum!=18)
		{
			switch(keychar){
			case 'W':window.open("http://weibo.com");break;
			case 'N':window.open("http://news.163.com");break;
			case 'V':window.open("http://v2ex.com");break;
			case 'Z':window.open("http://zhihu.com");break;
			case 'D':window.open("http://douban.com");break;
			case 'B':window.open("http://book.douban.com");break;
			case 'G':window.open("http://gmail.com");break;
			case 'R':window.open("http://reader.google.com");break;
			case 'C':window.open("http://cnbeta.com");break;
			case 'Y':window.open("http://youku.com");break;
			case 'S':window.open("http://stackoverflow.com/");break;
			case 'F':window.open("http://douban.fm/");break;
			case 'X':window.open("http://xiami.com/");break;
			case 'Q':window.open("http://qzone.qq.com/");break;
			case 'J':window.open("note.php");break;
			case 'K':window.open("diary.php");break;
			default:break;
			}
		}
	
  }


  function timer()
  {
	var gettime = new Date(); 
	var date = gettime.getFullYear()+"年"+(gettime.getMonth()+1)+"月"+gettime.getDate()+"日";
	date += "星期"+'天一二三四五六'.charAt(gettime.getDay())+gettime.getHours()+":";
	date += gettime.getMinutes()+":<span id=mins>"+gettime.getSeconds()+"</span>";
	document.getElementById("timer").innerHTML=date;
	 $("#mins").animate({fontSize:'50px',opacity:0},1000,
	 function(){
	 $("#mins").css("opacity","1");
	 $("#mins").css("font-size","25px");
	 });
	 setTimeout("timer()",1000);
}


function layoutMiss(){
		$("#alertbox").fadeOut();
		$("#layout").fadeOut();
		$("#layout").css(
		{"z-index":"0",
		}
	);
		$("#alertbox").remove();
}



$(document).ready(function(){
	$("img").click(function(){
	$("#layout").css(
	{"z-index":"1003",
	"background":"rgba(0,0,0,0.85)"
	}
	);
	$("#layout").fadeIn();
	$("body").prepend("<div id='alertbox'><div id='alert-title'>Hello，world！</div><input type='button' value='哦' onClick='layoutMiss();'></input></div>");
	$("#alertbox").fadeIn();
	});
	$("#layout").click(function(){
		$("#alertbox").fadeOut();
		$("#layout").fadeOut();
		$("#layout").css(
		{"z-index":"0",
		}
	);
		$("#alertbox").remove();
		});
  });
</script>
  </script>
 </head>
 <body onload="timer();"  onkeydown="kpress(event);" >
 <div id="layout"></div>
<div id="wrapper">
	<div id="header">
		<div id="site-title"><a href="index.html">路漫漫其修远</a></div>
		<div id="site-sub-title">Not Champion,But Struggle</div>
	</div>
	<div id="navbox">
	<br/><span id="timer"></span><br/>	
	<span style="color:#9B9B9B;">时间在流逝，上一些靠谱的网站，才会让自己成长</span><br/>
	<br/>
	<a href="http://weibo.com">新浪微博W┊</a>
	<a href="http://zhihu.com">知乎Z┊</a>
	<a href="http://v2ex.com">V2EX V┊</a>
	<a href="http://news.163.com">网易新闻N┊</a>
	<a href="http://douban.com">豆瓣D┊</a>
	<a href="http://book.douban.com">读书B┊</a>
	<a href="http://gmail.com">Gmail G┊</a>
	<a href="http://reader.google.com">GReader R┊</a>
	<br/>
	<a href="http://youku.com">优酷视频Y┊</a>
	<a href="http://cnBeta.com">cnBeta C┊</a>
	<a href="http://http://stackoverflow.com/">STOF S┊</a>
	<a href="http://http://douban.fm/">豆瓣电台 F┊</a>
	<a href="http://http://xiami.com/">虾米 X┊</a>
	<a href="http://http://qzone.qq.com/">QZone Q┊</a><br/>
	<a href="note.php">写笔记 J┊</a>
	<a href="diary.php">看笔记 K ┊</a>
	<a href="/less/img/flickr/flickr_downloader.php">flickr downloader</a>
	<br/><br/><br/>
	<center><img src="<?echo $path; ?>" width=480 height=350 /></center>
	</div>

	<div id="sidebar">
	<div class="sidebarbox">
	<span style="color:#9B9B9B">叽叽歪歪</span><br/></br>
	<div id="words">
	<?
	require('conn.php');
	$query ="SELECT MAX(id) from id";
	$query_result = mysql_query($query);
	$row = mysql_fetch_array($query_result);
	$max = $row[0];
	$query = "SELECT * FROM id LIMIT ".rand(0,$max - 1)." , 1 ";
	$query_result = mysql_query($query);
	while($row = mysql_fetch_array($query_result))
	{
		echo Markdown($row['content']);
		echo "<br/>";
		echo "<br/>";
		echo "<b><div id='wordsTime'>$row[time]</div></b>";
	}
	
	?>
	</div>
	</div>
	</div>
</div>
	<div id="footer"><div id="ftxt">让我怎样感谢你 ＼当我走向你的时候 ＼我原想收获一缕春风 ＼你却给了我整个春天 </div>

	</body>
</html>