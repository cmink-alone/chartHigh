<?php
//setting header to json
header('Content-Type: application/json');
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT name, val, nilai FROM web_marketing");

//$result = "SELECT name, val, nilai from web_marketing ";

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Revenue';
$rows['nilai'] = 'Revenue';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
	$rows['data'][] = array($r['name'], $r['val'], $r['nilai']);
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


