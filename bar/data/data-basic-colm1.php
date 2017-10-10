<?php
//setting header to json
header('Content-Type: application/json');

#Basic Line
require '../../conn/connection.php';

$result = mysql_query("SELECT id, kecamatan AS KECAMATAN, th1 AS TAHUN2015, th2 AS TAHUN2016 FROM statistik_penduduk ORDER BY id");

$kc = array();
$kc['name'] = 'kecamatan';
$th1['name'] = 'Tahun 2015';
$th2['name']	= 'Tahun 2016';
while ($r = mysql_fetch_array($result)) {
    $kc['data'][] = $r['KECAMATAN'];
    $th1['data'][] = $r['TAHUN2015'];
    $th2['data'][] = $r['TAHUN2016'];
    //$pr['data'][] = $r['PERSEN'];
}
$rslt = array();
array_push($rslt, $kc);
array_push($rslt, $th1);
array_push($rslt, $th2);
//array_push($rslt, $pr);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


