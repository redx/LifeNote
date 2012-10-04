<?
include("conn.php");
function checkIllegal()
{
	$pre = strtolower(@$_SERVER['HTTP_REFERER']);
	$should = strtolower(@$_SERVER['HTTP_HOST']);
	$check = strpos($pre,$should);
	if(!$check)
	{
		die("貌似您的提交是非法的哟！");
	}
}
checkIllegal();

if(@$_POST['note'])
{
  $query = "INSERT INTO id (id,time,content,display,tags) VALUES ('',now(),'$_POST[note]','1','$_POST[tags]')";
  mysql_query($query);
  echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
  echo "提交成功了~马上返回！";
}elseif(@$_GET['del'])
{
  $query = "UPDATE id SET display = '0' WHERE id = '$_GET[del]'";
  mysql_query($query);
  echo "<head><script>window.location = '$_SERVER[HTTP_REFERER]'</script></head>";
  echo "已经删除了~马上返回！";
}elseif(@$_POST['title']){
  $query = "INSERT INTO mobile(id,time,title,url,uid) VALUES('',now(),'$_POST[title]','$_POST[url]','$_POST[uid]')";
  mysql_query($query);
}else{
  echo "<head><script>window.location = $_SERVER[HTTP_REFERER]'</script></head>";
  echo "oops,验证失败，重新验证吧！";
}	
?>