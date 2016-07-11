<?php
backup_tables('localhost','root','','ppbakery', 
	array('inventories', 'inventory_totals', 'inventory_total_details', 'bookers', 
		  'cgroups', 'customers', 'customer_cgroups', 
		  'cycle_inventories', 'cycle_product_details', 'exchange_rates', 
		  'groups', 'users', 'user_groups', 'pricing_rules', 
		  'products', 'pgroups', 'product_pgroups', 'discounts',
		  'sales_orders', 'sales_order_details', 'sales_order_receipts',
		  'services', 'sections', 'uom_expenses'
		  ));

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	$return1 = "";
	$return = "";
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table.' WHERE created_at BETWEEN "'.date("Y-m-d").' 00:00:00" AND "'.date("Y-m-d").'  23:59:59"');
		$num_fields = mysql_num_fields($result);
		//$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		//echo $return."<br/><br/>";
		$store = array();
		$num =  mysql_num_rows($result);
		if($num>0){
			$return1.= 'INSERT INTO '.$table." VALUES";
			for ($i = 0; $i < $num_fields; $i++) 
			{
				$a = "";
				$k = 1;
				while($row = mysql_fetch_row($result))
				{
					$a.= '(';
					for($j=0; $j < $num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $a.= '"'.$row[$j].'"' ; } else { $a.= '""'; }
						if ($j < ($num_fields-1)) { $a.= ','; }
					}
					if($k < $num){
						$a.= "),\n";
					}else{					
						$a.= ");\n";
					}
					$k++;
				}
				$store[] = $a;
			}
			$return1.= implode("", $store)."\n";
		}
		//$return1.="\n";
		$return.="\n\n\n";
	}
	
		//echo $return1;exit;
	//save file
	$handle = fopen(dirname(__FILE__).'/db_backup/1-db-backup-'.date('Y-m-d').'.sql','w+');
	$handle1 = fopen(dirname(__FILE__).'/storages/1-db-backup-'.date('Y-m-d').'.sql','w+');
	fwrite($handle,$return1);
	fwrite($handle1,$return1);
	fclose($handle);
	fclose($handle1);
}
?>