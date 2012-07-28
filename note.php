<?
include("randjpg.php");
$imgArray=getImgLinks("img");
include("conn.php");
$path = $imgArray[rand(0,(count($imgArray)-1))];
$query = "SELECT *  FROM user";
$query_results = mysql_query($query);
$flag = 0;	
while($row = mysql_fetch_array($query_results))
{
	if($row['name'] == @$_COOKIE['name'] && $row['password'] == @$_COOKIE['password'])
	{
		$flag = 1;
	}
}

if($flag == 1)
{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>笔记</title>	
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta charset="utf-8" />
  <link rel="stylesheet/less" type="text/css" href="less.css">
  <script type="text/javascript" src="less-1.3.0.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="redAjax.js"></script>
    <script type="text/javascript" src="ajaxupload.js"></script>
	<script>


	function alertNone() {
		$("#seccessAlert").fadeOut();
		$("#seccessAlert").remove();
	}

	function seccessAlert() {
		$("#textForm").append("<span id='seccessAlert'>提交成功!</span>");
		setTimeout("alertNone()",1000);
		}
		

 	 function aSubmit(){
 	 	ajaxProcess("POST","notesub.php",noteSubmit);
		//	ajaxProcess("POST","http://less/notesub.php",noteSubmit);
 	 	var submit = "note="+note.value+"&tags="+tags.value;
 	 	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 	 	xmlhttp.send(submit);
		note.value = "";
		tags.value = "";
		note.focus();
			
	}

	function noteSubmit () {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				seccessAlert();
			}
	}

function fastSubmit(e){
  if(window.event)//IE
	{
		keynum=e.keyCode;
		}else{
		keynum=e.which;
	}
	e = window.event;
	if(e.ctrlKey && keynum == 13)
	{
		aSubmit();
	}
}


function layoutMiss(){
		$("#alertbox-img").fadeOut();
		$("#layout").fadeOut();
		$("#layout").css(
		{"z-index":"0",
		}
	);
		$("#alertbox-img").remove();
		clearTimeout(time);
		clearTimeout(time2);
}

function AJAXNext()
	{
		$("#test").fadeOut();
		document.getElementById("loading").style.display ="block";
		document.getElementById("nextButton").style.display ="none";
		document.getElementById("autoChange").style.display ="none";
		var xmlhttp;
		if (window.XMLHttpRequest)
		 {// code for IE7+, Firefox, Chrome, Opera, Safari
		 xmlhttp=new XMLHttpRequest();
		 }
	else
		 {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
	 {
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("test").src=xmlhttp.responseText;
    }
	 }
	xmlhttp.open("GET","randjpg.php?rand=1&" + Math.random(),true);
	xmlhttp.send();
	document.getElementById("test").onload = function(){
	document.getElementById("loading").style.display ="none";
	document.getElementById("nextButton").style.display ="inline-block";
	document.getElementById("autoChange").style.display ="inline-block";
	$("#test").fadeIn();
	}
}

function autoChange(){
	document.getElementById("autoChange").value = "停止";
	$('#autoChange').attr("onclick","stopChange();")
	time = setTimeout("AJAXNext()",1000);
	time2 = setTimeout("autoChange()",4000);
	}

function stopChange(){
	clearTimeout(time);
	clearTimeout(time2);
	document.getElementById("autoChange").value = "自动切换";
	$('#autoChange').attr("onclick","autoChange();");
}

$(document).ready(function(){
	$("img").click(function(){
	$("#layout").css(
	{"z-index":"1003",
	"background":"rgba(0,0,0,0.85)"
	}
	);
	$("#layout").fadeIn();
	var path = document.getElementById("flickr").src;
	$("body").prepend("<div id='alertbox-img'><img id='loading' style='display:none' src='img/1-0.gif' /><img id='test' height=300 src='"+path+"'><br/><br /><input type='button' value='换一张' onClick='AJAXNext();' id='nextButton'></input><input id='autoChange' onClick='autoChange();' type='button' value='自动切换'></input></div>");
	$("#alertbox").fadeIn();
	});
	$("#layout").click(function(){
		$("#alertbox-img").fadeOut();
		$("#layout").fadeOut();
		$("#layout").css(
		{"z-index":"0",
		}
	);
		$("#alertbox-img").remove();
		clearTimeout(time);
		clearTimeout(time2);
		});
  });

function onfocuslager() {
	$("#note").animate({
		height:"+=20"
	},"fast"
	);
}

function onblursmaller(){
	$("#note").animate({
		height:"-=20"
	},"fast"
	);
}
  </script>
 </head>
 <body>
  <div id="layout"></div>
<div id="wrapper">
	<div id="header">
		<div id="site-title"><a href="index.html">忙碌人生</a></div>
		<div id="site-sub-title">life on the go</div>
	</div>
	<div id="notepadbox">
	<span style="color:#9B9B9B;">记录生活吧，老了看什么都是幸福的……<span><br/>
	<br/>
	<form id="textForm" action="notesub.php" method="POST">
	<textarea id="note" class="notepad" name="note" onfocus="onfocuslager();" onblur="onblursmaller();" autofocus='autofocus' onkeydown="fastSubmit(event)"><?php if(@$_GET['title'] != ""){echo @$_GET['title']."-"; } ?><?php echo @$_GET['url']; ?></textarea><br/><br/>
	<input id="tags" name="tags" type="input" onkeydown="fastSubmit(event)" value=<?php if(@$_GET['source'] == 'bookmark'){echo "网址,摘录";}  ?> ></input><br/><br/>	
	<input type="button" value="提交"  onClick="aSubmit();"> 
	<a href="diary.php" >查看笔记</a>
	<a href="login.php?logout=1" >退出登录</a>
	</form>
	</div>
	<div id="sidebar">
	<div id="flickr_box" class="sidebarbox">
			<span style="color:#9B9B9B">flickr上的图片们</span><br/></br>
		<img id="flickr" style="cursor:pointer; "src="<?echo $path; ?>" width="220" height="auto" />
	</div>
	<div class="sidebarbox" ondragover="dropStart();" ondrop="dropIt();" ondragleave="dropLeave();"><div id="imgUpload"><div id="alert-text">图片拖放上传</div><img id="uploadPreview" width=230 src="" /></div><br/>
		<input id="uploadbox" type="file"  value="选择图片" />
		<input id="" type="button" value="确认上传" onclick="upload();" />
	</div>
	</div>	
	</div><br/><br/><br/>
	<div id="footer"><div id="ftxt">爱一个能给你带来正面能量的人，嗯，所以要爱自己 </div>
</body>
</html>

<?
}else{
?>

<html>
<head>
<title>一些奇怪的事情发生了o(︶︿︶)o </title>
<meta charset ="utf-8" />
  <link rel="stylesheet/less" type="text/css" href="less.css">
  <script type="text/javascript" src="less-1.3.0.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
	<script>
	$(document).ready(function(){
			$("#layout").css(
			{"z-index":"1003",
			"background":"rgba(0,0,0,0.85)",
			"cursor":"default"
			}
			);
			$("#layout").fadeIn();
				$("body").prepend("<div id='alertbox'><div id='alert-title'>请先登录哦！</div><form id='loginForm' action='login.php' method='POST'><input name='name' type='text' class='boxinput' autofocus='autofocus' placeholder='用户名'></input><br/><input name='password' type='password' class='boxinput' placeholder='密码'></input><br/><input type='submit'></input></form></div>");
	$("#alertbox").fadeIn();
});
	</script>
</head>
<body>
  <div id="layout"></div>
</body>
</html>

<?
}
?>
