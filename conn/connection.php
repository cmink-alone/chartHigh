<?php


error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysql_connect("localhost","root","root");

if (!$con) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("db_hightchart", $con);


// Penggunaan database sqlite3
//$dir = `sqlite:data.db`;
//$db = new PDO($dir) or die("cannot open the database");

?>