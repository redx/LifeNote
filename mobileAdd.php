<?
include("conn.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>手机上读</title>	
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta charset="utf-8" />
  <link rel="stylesheet/less" type="text/css" href="less.css">
  <script type="text/javascript" src="less-1.3.0.min.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="redAjax.js"></script>
	<script>

	function alertNone() {
	
		window.close();

	}

function seccessAlert() {
       		$("#textForm").append("<span id='seccessAlert'>提交成功!</span>");
		setTimeout("alertNone()",10);
		}
		

 	 function aSubmit(){
 	 	ajaxProcess("POST","notesub.php",noteSubmit);
 	 	var submit = "title="+title.value+"&url="+url.value+"&uid="+uid.value;
 	 	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 	 	xmlhttp.send(submit);
	
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

	//文件上传预览
	var file = document.getElementById('uploadbox');
	file.onchange = function () {
		loadImageFile();
	}
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
	<div id="notepadbox">
	<span style="color:#9B9B9B;">稍后阅读<span><br/>
	<br/>
	<form id="textForm" action="notesub.php" method="POST">
	<textarea id="title" class="notepad" name="title" onfocus="onfocuslager();" onblur="onblursmaller();" autofocus='autofocus' onkeydown="fastSubmit(event)"><?php echo @$_GET['title']; ?></textarea><br/><br/>
																								    <input id="url" name="url" type="input" onkeydown="fastSubmit(event)" value=<?php if(@$_GET['source'] == 'bookmark'){echo @$_GET['url'];}  ?> ></input><br/><textarea style="display:none;" id="uid"  name="uid"><?php echo $_GET['uid']; ?>  </textarea>
<br/>	
	<input type="button" value="提交"  onClick="aSubmit();">Ctrl+Enter
	</form>
	</div>
	</div><br/><br/><br/>
</body>
</html>



