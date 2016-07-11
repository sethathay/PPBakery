
<?php

// your config
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ppbakery';

$dir = dirname(__FILE__)."/db_backup/";
//fopen($dir."db-backup-".date('Y-m-d').".sql", 'w') or die("Can't create file");

$source = ("http://192.168.0.131/PPbakery/public/db_backup/1-db-backup-".date('Y-m-d').".sql");

//$source = ("http://192.168.0.10/db_backup/text.sql");
$saveFile = $dir."1-db-backup-".date('Y-m-d').".sql";
$data = file_get_contents($source);

$handle = fopen($saveFile,"w");
fwrite($handle, $data);
fclose($handle);

mysql_connect($dbHost, $dbUser, $dbPass) OR die('connecting to host: '.$dbHost.' failed: '.mysql_error());
mysql_select_db($dbName) OR die('select db: '.$dbName.' failed: '.mysql_error());

// Open a directory, and read its contents
$images = scandir($dir, 1);

$filename = $dir.$images[0];

$maxRuntime = 8; // less then your max script execution limit


$deadline = time()+$maxRuntime; 
$progressFilename = $filename.'_filepointer'; // tmp file for progress
$errorFilename = $filename.'_error'; // tmp file for erro

($fp = fopen($filename, 'r')) OR die('failed to open file:'.$filename);

// check for previous error
if( file_exists($errorFilename) ){
    die('<pre> previous error: '.file_get_contents($errorFilename));
}

// activate automatic reload in browser
echo '<html><head> <meta http-equiv="refresh" content="'.($maxRuntime+2).'"><pre>';

// go to previous file position
$filePosition = 0;
if( file_exists($progressFilename) ){
    $filePosition = file_get_contents($progressFilename);
    fseek($fp, $filePosition);
}

$queryCount = 0;
$query = '';
while( $deadline>time() AND ($line=fgets($fp, 1024000)) ){
    if(substr($line,0,2)=='--' OR trim($line)=='' ){
        continue;
    }

    $query .= $line;
    if( substr(trim($query),-1)==';' ){
        if( !mysql_query($query) ){
            $error = 'Error performing query \'<strong>' . $query . '\': ' . mysql_error();
            file_put_contents($errorFilename, $error."\n");
            exit;
        }
        $query = '';
        file_put_contents($progressFilename, ftell($fp)); // save the current file position for 
        $queryCount++;
    }
}

unlink($saveFile);

?>