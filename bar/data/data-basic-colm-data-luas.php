<?php
//setting header to json
header('Content-Type: application/json');

#Basic Line
require '../../conn/connection.php';

$result = mysql_query("SELECT id, kecamatan AS KECAMATAN, luas AS LUASWILAYAH, persentase AS PERSENTASE FROM luas_wilayah ORDER BY id");

$kc = array();
$kc['name'] = 'kecamatan';
$luas['name'] = 'Luas Wilayah (km2)';
$persen['name']	= 'Presentase (%)';
while ($r = mysql_fetch_array($result)) {
    $kc['data'][] = $r['KECAMATAN'];
    $luas['data'][] = $r['LUASWILAYAH'];
    $persen['data'][] = $r['PERSENTASE'];
    //$pr['data'][] = $r['PERSEN'];
}
$rslt = array();
array_push($rslt, $kc);
array_push($rslt, $luas);
array_push($rslt, $persen);
//array_push($rslt, $pr);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);


