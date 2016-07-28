
<?php

// your config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ppbakery';

$dir = dirname(__FILE__)."\\db_backup\\";
//fopen($dir."db-backup-".date('Y-m-d').".sql", 'w') or die("Can't create file");

//$source = ("http://192.168.0.133/PPbakery/public/db_backup/db-backup-".date('Y-m-d')."-2.sql");
$source = ("http://119.82.252.32:53210/db_backup/db-backup-".date('Y-m-d')."-2.sql");

$saveFile = $dir."db-backup-".date('Y-m-d')."-2.sql";

$data = file_get_contents($source);
$handle = fopen($saveFile,'w+');
fwrite($handle,$data);
fclose($handle);

mysql_connect($dbHost, $dbUser, $dbPass) OR die('connecting to host: '.$dbHost.' failed: '.mysql_error());
mysql_select_db($dbName) OR die('select db: '.$dbName.' failed: '.mysql_error());

$arr = explode(";", $data);
for($i=0; $i<count($arr)-1; $i++){	
	mysql_query($arr[$i]) or die(mysql_error());
}
//unlink($saveFile);
exit;

?>