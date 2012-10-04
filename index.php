<?php 
include("conn.php");
function randomchar($length = 6){
   $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
   for($i=0; $i < $length; $i++)
     {
       $randomchar .= $char[rand(0,strlen($char)-1)];
     }
   return $randomchar;
}
if ($_COOKIE['uid'] == "")
  {
    $cookie = md5(randomchar(6));
    setcookie("uid",$cookie,time() + (20 * 365 * 24 * 60 * 60));
    $uri = $_SERVER['HTTP_HOST'];
  }else{
  $cookie = $_COOKIE['uid'];
  setcookie("uid",$cookie,time()+(20 * 365 * 24 * 60 * 60));
  $uri = $_SERVER['HTTP_HOST'];
}
$url = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&choe=UTF-8&chld=L|4&chl=http://$uri/mobile.php?uid=$cookie";
$bookmarklet = "javascript:(function(){window.open('http://$uri/mobileAdd.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark&uid=$cookie','_blank','width=540,height=500');})()"
?>
<html>
  <head>
    <title>MobileReader</title>
    <meta name="emacs" content="content" />
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="mobile.css" type="text/css" media="screen" />
  </head>
  <body>
  <div id="wrapper">
  <h2>Mobile Reader</h2>
  <p>介绍：这是一个类似于Pocket的服务。与其相比最大的特色是无需注册和登录，也不用安装软件，一个Bookmarklet加上手机上扫描一个二维码即可实现Read it later(暂时还不支持离线阅读)~感谢新浪提供的网页转码服务,感谢google提供的二维码生成服务。感谢大刘写了那么多好看的科幻小说，没有上课看那些小说的冲动，也就不会有这个工具的诞生~</P>
  <h3>使用方法：</h3>
  <p>Step1:请将它拖放到书签栏：<a href=<?php echo $bookmarklet;?> class="" onclick="return false;">手机上阅读</a><br>
  当遇到要读的文章时候点击这个书签
  </p>
  <p>Step2:手机上扫描这个二维码,它将打开这个<a href=<?php echo "http://e.xhxh.me/mobile.php?uid=$cookie";?> >网址</a>，在那里你可以读到适合手机阅读的文章了(强烈建议在手机中也存为书签)。</p>
  <img src=<?php echo $url; ?> class="" alt="" />
  <h3>为什么不需要注册？</h3>
  <p>第一次进入这个页面会得到一个不重复的字符串（uid），依靠它来识别和区分不同的用户。</p>
  <p>你的uid是 <?php echo $cookie; ?>，最好把它保存到某个记事本中~有任何其他的疑问，欢迎给我发邮件：<img src="mail.gif" class="" alt="" /></p>
  </div><br/><br/>
  <div id="footer">
    <center>By @xred</center>
  </div>
  </body>
</html>








