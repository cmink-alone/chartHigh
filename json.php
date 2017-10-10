<?php
//setting header to json
header('Content-Type: application/json');

error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysql_connect("localhost","root","root");
 
if (!$con) {
('Could not connect: ' . mysql_error());
}
 
mysql_select_db("db_hightchart", $con);
 
$result = mysql_query("SELECT name, val, nilai FROM web_marketing ORDER BY id") or die (mysql_error());
 
$rows = array();
while($r = mysql_fetch_array($result)) {
$row[0] = $r[0];
$row[1] = $r[1];
$row[2] = $r[2];
array_push($rows,$row);
}
 
print json_encode($rows, JSON_NUMERIC_CHECK);
 
mysql_close($con);
?>