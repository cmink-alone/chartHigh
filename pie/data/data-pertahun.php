<?php
//setting header to json
header('Content-Type: application/json');
#Pie Chart
require '../../conn/connection.php';

$result = mysql_query("SELECT * FROM penduduk_pertahun");
#$result = mysql_query("SELECT name, val FROM web_marketing");

//$rows = array();
$rows['type'] = 'pie';
$rows['name'] = 'Penduduk';
//$rows['innerSize'] = '50%';
while ($r = mysql_fetch_array($result)) {
    $rows['data'][] = array('Tahun '.$r['TAHUN'].'"', $r['JUMLAH']);    
}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


