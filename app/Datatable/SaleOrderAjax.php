<?php

namespace App\Datatable;

class SaleOrderAjax
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function getResource($table, array $columns, $condition, $keyIndex){
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * Easy set variables
		 */
		
		/* Array of database columns which should be read and sent back to DataTables. Use a space where
		 * you want to insert a non-database field (for example a counter or static image)
		 */
		//$aColumns = array( 'engine', 'browser', 'platform', 'version', 'grade' );
		$aColumns = $columns;
		
		/* Indexed column (used for fast and accurate table cardinality) */
		$sIndexColumn = $keyIndex;
		
		/* DB table to use */
		$sTable = $table;
		
		/* Database connection information */
		$gaSql['user']       = \Config::get('database.connections.mysql.username');
		$gaSql['password']   = \Config::get('database.connections.mysql.password');
		$gaSql['db']         = \Config::get('database.connections.mysql.database');
		$gaSql['server']     = \Config::get('database.connections.mysql.host');
		
		/* REMOVE THIS LINE (it just includes my SQL connection user/pass) */
		//include( $_SERVER['DOCUMENT_ROOT']."/datatables/mysql.php" );
		
		/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
		 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
		 * no need to edit below this line
		 */
		
		/* 
		 * MySQL connection
		 */
		$gaSql['link'] =  @mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
			die( 'Could not open connection to server' );
			
		
        mysql_query("SET character_set_client=utf8", $gaSql['link']);
        mysql_query("SET character_set_connection=utf8", $gaSql['link']);
        mysql_query("SET NAMES 'utf8'", $gaSql['link']);
		
		mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
			die( 'Could not select database '. $gaSql['db'] );
		
		
		/* 
		 * Paging
		 */
		$sLimit = "";
		if ( isset( $_REQUEST['iDisplayStart'] ) && $_REQUEST['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT ".mysql_real_escape_string( $_REQUEST['iDisplayStart'] ).", ".
				mysql_real_escape_string( $_REQUEST['iDisplayLength'] );
		}
		
		
		/*
		 * Ordering
		 */
		$sOrder = "";
		if ( isset( $_REQUEST['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $_REQUEST['iSortingCols'] ) ; $i++ )
			{
				if ( $_REQUEST[ 'bSortable_'.intval($_REQUEST['iSortCol_'.$i]) ] == "true" )
				{
					$sOrder .= $aColumns[ intval( $_REQUEST['iSortCol_'.$i] ) ]."
						".mysql_real_escape_string( $_REQUEST['sSortDir_'.$i] ) .", ";
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}
		
		
		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		$sWhere = "";
		if ( isset($_REQUEST['sSearch']) && $_REQUEST['sSearch'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_REQUEST['sSearch'] )."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		
		/* Individual column filtering */
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( isset($_REQUEST['bSearchable_'.$i]) && $_REQUEST['bSearchable_'.$i] == "true" && $_REQUEST['sSearch_'.$i] != '' )
			{
				if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{
					$sWhere .= " AND ";
				}
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_REQUEST['sSearch_'.$i])."%' ";
			}
		}
		
		/* Customize condition */
		if($condition != ""){
			if (!preg_match("/WHERE/i", $sWhere)) {
				$sWhere .= "WHERE " . $condition;
			} else {			
				$sWhere .= "AND " . $condition;
			}
		}
		
		/*
		 * SQL queries
		 * Get data to display
		 */
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM   $sTable
			$sWhere
			$sOrder
			$sLimit
		";
		//echo $sQuery;exit;
		$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
		
		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
		
		/* Total data set length */
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   $sTable
		";
		$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];
		
		
		/*
		 * Output

		 */
		 $sEcho = (isset($_REQUEST['sEcho']))?$_REQUEST['sEcho']: "1";
		$output = array(
			"sEcho" => intval($sEcho),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);
		
		$index = (isset($_REQUEST['iDisplayStart']))?$_REQUEST['iDisplayStart']: 0;
		while ( $aRow = mysql_fetch_array( $rResult ) )
		{
			$row = array();
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				//if ( $aColumns[$i] == "version" )
				if ($i == 0) 
				{
					/* Special output formatting for 'version' column */					
		            $row[] = ++$index;
					//$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
				}else if($i == 3 || $i == 5 || $i == 7){
					
					if( $i == 7){
						$row[] = number_format(abs($aRow[$i]));
					}else{
						$row[] = number_format($aRow[$i]);
					}
				}else if( $i == 4 || $i == 6){
					$row[] = number_format($aRow[$i]);
				}
				else if ( $aColumns[$i] != ' ' )
				{
					/* General output */
					//$row[] = $aRow[ $aColumns[$i] ];
            		$row[] = $aRow[$i];
				}
			}
			//$row[] = '<button style="margin-right:5px" type="button" id="'. $aRow[0] .'" class="btnview btn btn-xs btn-info"><span class="glyphicon glyphicon-user"></span> View</button><button style="margin-right:5px" id="'. $aRow[0] .'" type="button" class="btnedit btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button><button type="button" id="'. $aRow[0] .'" class="btn btn-xs btn-danger btndelete"><span class="glyphicon glyphicon-trash"></span> Delete</button>';
			$row[] = '<button style="margin-right:5px" type="button" id="'. $aRow[0] .'" class="btnview btn btn-xs btn-info"><span class="glyphicon glyphicon-user"></span> View</button>';
			$output['aaData'][] = $row;
		}
		
		echo json_encode( $output );
		
	}
	
}
