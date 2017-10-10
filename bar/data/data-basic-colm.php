<?php
//setting header to json
header('Content-Type: application/json');

#Basic Line
require '../../conn/connection.php';

$result = mysql_query("SELECT id, kecamatan AS KECAMATAN, jumlah_penduduk AS PENDUDUK, tahun AS TAHUN, presentase AS PERSEN FROM penduduk WHERE TAHUN=2016 ORDER BY id");

$kc = array();
$kc['name'] = 'kecamatan';
$jm['name'] = 'Jumlah';
$pr['name']	= 'Presentase';
while ($r = mysql_fetch_array($result)) {
    $kc['data'][] = $r['KECAMATAN'];
    $jm['data'][] = $r['PENDUDUK'];
    $th2['data'][] = $r['PENDUDUK'];
    $pr['data'][] = $r['PERSEN'];
}
$rslt = array();
array_push($rslt, $kc);
array_push($rslt, $jm);
array_push($rslt, $th2);
array_push($rslt, $pr);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


