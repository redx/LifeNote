<meta charset="utf-8" />

<?php 
include("conn.php");
header("Content_Disposition: filename=output.xls");
header("Content-Type: application/force-download");

?>
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>内容</th>
			<th>时间</th>
		</tr>
	</thead>
<?php  
$query = "SELECT *  FROM id";
$query_results = mysql_query($query);
while($row =mysql_fetch_array($query_results))
{
	echo "<tr>";
	echo "<th>$row[id]</th>";
	echo "<th>$row[content]</th>";
	echo "<th>$row[time]</th>";
	echo "</tr>";

}
?>
</table>
