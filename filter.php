<?php 
function filter($str)
{				
	$farr = array(
			"/\s+/", //过滤多余的空白
			"/<(\/?)(script|i?frame|style|html|body|title|link|meta|\?|\%)([^>]*?)>/isU", //过滤 script等恶意代码,还可以加入object的过滤flash
			"/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU", //过滤javascript的on事件
	);
	$tarr = array(
			" ",
			"＜\\1\\2\\3＞", //如果要直接清除不安全的标签，这里可以留空
			"\\1\\2",
	);
	$str = preg_replace( $farr,$tarr,$str);
	return $str;
}


 ?>