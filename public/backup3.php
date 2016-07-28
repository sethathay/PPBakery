<?php
backup_tables('localhost','root','','ppbakery', 
	array('inventories', 'inventory_totals', 'inventory_total_details', 'bookers', 
		  'cgroups', 'customers', 'customer_cgroups', 
		  'cycle_inventories', 'cycle_product_details', 'exchange_rates', 
		  'groups', 'users', 'user_groups', 'pricing_rules', 
		  'products', 'pgroups', 'product_pgroups', 'discounts',
		  'sales_orders', 'sales_order_details', 'sales_order_receipts',
		  'services', 'sections', 'uom_expenses', 'user_sale_logs'
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
	//cycle through
	
	foreach($tables as $table)
	{
		if($table == "inventory_totals" || $table == "inventory_total_details"){
			$result= mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			$return1.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return1.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysql_fetch_row($result))
				{
					$return1.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j < $num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return1.= '"'.$row[$j].'"' ; } else { $return1.= '""'; }
						if ($j < ($num_fields-1)) { $return1.= ','; }
					}
					$return1.= ");\n";
				}
			}
			$return1.="\n\n\n";
		}else{
			$result = mysql_query('SELECT * FROM '.$table.' WHERE created_at BETWEEN "'.date("Y-m-d").' 09:00:00" AND "'.date("Y-m-d").'   11:59:59"');
			
			$num_fields = mysql_num_fields($result);
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
		}
		
	}
	
	
	//save file
	$handle = fopen(dirname(__FILE__).'/db_backup/db-backup-'.date('Y-m-d').'-3.sql','w+');
	fwrite($handle,$return1);
	fclose($handle);
}
?>