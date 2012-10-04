<?php 
header("Origin:http://bksjw.hust.edu.cn");
header("Referer:http://bksjw.hust.edu.cn/aam/score/report/query_personal_score.jsp?cdbh=225");
header("Host:bksjw.hust.edu.cn");
echo file_get_contents("http://bksjw.hust.edu.cn/reportJsp/showReport.jsp?raq=personal_score_term_report.raq&xqh=20112&sfid=U201117676");


 ?>