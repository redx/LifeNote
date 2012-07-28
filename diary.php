<?
include("conn.php");
include("markdown.php");
include ("filter.php");
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
<html>
	<head>
		<title>每日笔记</title>
		<link rel="stylesheet/less" type="text/css" href="diary.css">
		<script type="text/javascript" src="less-1.3.0.min.js"></script>
	    <script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery.easing.1.3.js"></script>
		<meta charset="utf-8" />
	<script type="text/javascript">
	var flag=1;
	function begins(){
     str = $(".everyNote:first").attr("id");
	 var i = str.slice(9);
	i = parseInt(i);
	return i;
	}
	function keypress(e){
			 var keynum;
			 var keychar;
			 if(flag == 1)
			{
			  i = (begins()+1);
			 flag = 0;
			}
			 if(window.event)//IE
				{
				keynum=e.keyCode;
				}else{
				keynum=e.which;
			}
			keychar=String.fromCharCode(keynum);	
		if(keychar == 'J')
		{	
			i-=1;
			odiv = document.getElementById("entry_id_"+i);
			while(!odiv)
			{
				 i-=1;
				var odiv = document.getElementById("entry_id_"+i);
				if(i<(begins() - 15))
				{
					break;
					i= begins() - 15;
				}
			}
			var top = odiv.offsetTop;
			$("html, body").animate({
            scrollTop: top - 5
        }, 500,'easeInOutQuint');
		}if(keychar == 'K')
		{
			i+=1;
			odiv = document.getElementById("entry_id_"+i);
			while(!odiv)
			{
				 i+=1;
				var	odiv = document.getElementById("entry_id_"+i);
				if(i>(begins()+1))
				{
					i = begins();
					break;
				}
			}
			if(i!= begins()){
			var top = odiv.offsetTop;
			$("html, body").animate({
			scrollTop:top - 5
			}, 500 ,'easeInOutQuint');}else{
			$("html, body").animate({
			scrollTop:0
			},500 ,'easeInOutQuint');
			}
		}
		if( window.location.href != "http://localhost/less/diary.php"){
		if(keychar == 'N')
		{
			var pageNumber = <?php echo $_GET['page'] ?>;
			pageNumber = parseInt(pageNumber)+1;
			window.location = "diary.php?page="+pageNumber;
		}
		if(keychar == 'P')
		{
			var pageNumber = <?php echo $_GET['page'] ?>;
			if(pageNumber!=1){
			pageNumber = parseInt(pageNumber)-1;
			}
			window.location = "diary.php?page="+pageNumber;
		}
		}else{
			if(keychar == 'N')
			{
			window.location = "diary.php?page=2";
			}
		}

	}
	</script>
	</head>
	<body onkeydown="keypress(event);">
		<div id="bigWrapper">
		<div id="diaryWrapper">
		<div id="diaryHead"></div>
		<?
		if(@$_GET['page'] == '' && @$_GET['tags'] == '')
		{	
			$query = "SELECT * FROM id  WHERE display = '1' ORDER BY `id`.`id` DESC LIMIT 0 ,15";
		}elseif(@$_GET['page'] != '' && @$_GET['tags'] == ''){
			$page = ((($_GET['page']-1)*15));
			$query = "SELECT * FROM id  WHERE display = '1'  ORDER BY `id`.`id` DESC LIMIT ".$page." ,15";
		}elseif(@$_GET['tags'] != '' && @$_GET['page'] == ''){
			$query = "SELECT * FROM id  WHERE display = '1' AND  `tags` LIKE '%$_GET[tags]%' ORDER BY `id`.`id` DESC LIMIT 0 ,15";
		}elseif(@$_GET['page'] != '' && @$_GET['tags'] != ''){
			$page = ((($_GET['page']-1)*15));
			$query = "SELECT * FROM id  WHERE display = '1' AND `tags` LIKE '%$_GET[tags]%' ORDER BY `id`.`id` DESC LIMIT ".$page." ,15";
		}
		$t1=microtime(true);
		$query_result = mysql_query($query);
		$t2 = microtime(true)-$t1;
		$counter = 0;
		while($row = mysql_fetch_array($query_result))
		{	
			$counter++;
			echo "<div class='everyNote' id='entry_id_$row[id]'>";
			echo filter(Markdown($row['content']));
			if($row['tags']){
				$tags = explode(",", $row['tags']);
				foreach ($tags as $value) {
				@$printTags .= "<a href='diary.php?tags=$value'>$value</a>&nbsp;";
				}
				echo "<div id='tags'>$printTags</div><div id='wordsTime'><a href='notesub.php?del=$row[id]' class='droplink'>删除</a> &nbsp;&nbsp;&nbsp;$row[time]</div>";
			}else{
			echo "<div id='wordsTime'><a href='notesub.php?del=$row[id]' class='droplink'>删除</a> &nbsp;&nbsp;&nbsp;$row[time]</div>";
			}
			echo "</div>";
			$printTags ="";
		}
		if($counter == 15)
		{
			if((@$_GET['page'] == "" || @$_GET['page'] == "1") && @$_GET['tags'] == "")
			{
				echo "<a href='diary.php?page=2'>下一页</a><br/>";
			}elseif(@$_GET['tags'] == ""){
				echo "<a href='diary.php?page=".(@$_GET['page']-1)."'>上一页</a><br/>";
				echo "<a href='diary.php?page=".(@$_GET['page']+1)."'>下一页</a><br/>";
			}else{
				if(@$_GET['page'] != "" && @$_GET['page'] != "1"){
				echo "<a href='diary.php?page=".(@$_GET['page']-1)."&tags=".@$_GET['tags']."'>上一页</a><br/>";
				echo "<a href='diary.php?page=".(@$_GET['page']+1)."&tags=".@$_GET['tags']."'>下一页</a><br/>";
			     }else{
			     echo "<a href='diary.php?page=".(@$_GET['page']+1)."&tags=".@$_GET['tags']."'>下一页</a><br/>";
			     }
			}
		}elseif(@$_GET['tags'] != ""){
			echo "<a href='diary.php'>回主页</a><br/>";
		}else{
			echo "<a href='diary.php?page=".(@$_GET['page']-1)."'>上一页</a><br/>";
		}

	 echo "<div id='timeSpend'>查询所花费时间$t2 毫秒</div>";
	?>
		</div>
		</div>
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
