<?php 
require("email.class.php"); //引用别人写的类
$smtpserver = "smtp.qq.com";//设置服务器地址
$smtpport = 25;//设置服务器端口
$smtpusermail = "499126563@qq.com";//发送邮件地址
$smtpto = "xred.cn@gmail.com";//接收邮件地址
$smtpuser = "499126563";//用户名
$smtppsw ="xhXH,.123";//密码
$smtpsub = "test";//邮件主题
$smtpbody ="my first";//邮件内容
$smtptype ="html";//发送文件内容
$smtp = new smtp($smtpserver,$smtpport,true,$smtpuser,$smtppsw);
$smtp->debug = FALSE;
$smtp->sendmail($smtpto,$smtpusermail,$smtpsub,$smtpbody,$smtptype);

 ?>