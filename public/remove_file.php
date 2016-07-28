<?php

	$file = dirname(__FILE__).'\\db_backup\\1-db-backup-'.date('Y-m-d').'.sql';
	if (!unlink($file))
	{
		echo ("Error deleting $file");
	}
	else
	{
		echo ("Deleted $file");
	}
	
?>