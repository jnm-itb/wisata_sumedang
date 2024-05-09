<?php 
header("Content-type:application/json");
if(empty($_POST['start'])){
	$_POST['start'] = 0;
} 

if(empty($_POST['length'])){
	$_POST['length'] = 10;
} 




	$sLimit = "";
	if ( isset( $_POST['start'] ) && $_POST['length'] != '-1' )
	{
		
		$sLimit = "LIMIT ".in( $_POST['start'] ).", ".$_POST['length'];
		
	} else {
		if(!empty($_POST['length'])){
		$sLimit = "LIMIT ".$_POST['length'];
		} else {
		$sLimit = "LIMIT 10";
		}
	}
	 
	
	$sOrder = "ORDER BY ".$ordered;
	
	if (isset( $_POST['order'] ))
	{
		$sOrder = "";
		for ( $i=0 ; $i<intval( $_POST['order'] ) ; $i++ )
		{
			if(!empty($_POST['order'][$i])){
				 
				
				$sOrder = "ORDER BY ".$aColumns[ intval( $_POST['order'][$i]['column'] ) ]."
				 	".in( $_POST['order'][$i]['dir'] );
				 
			
			}
		}	
	}  
	
	
	
	
	
	$sWhere = "";
	if(!empty($_POST['search']['value'])){
	if ( $_POST['search']['value'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".in( $_POST['search']['value'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	}
	 
	 
	
if ($wheres <> ""){

if ($sWhere=="") {
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
        Where $wheres
		$sOrder
        $sLimit
    ";
} else {
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   $sTable
        $sWhere AND $wheres
		$sOrder
        $sLimit
        ";
}
 
} else {
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere 
		$sOrder
        $sLimit
	";
} 
 
 
	$rResult = select($pdo, $sQuery);
	$rResult->execute();
	
	
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = select($pdo,  $sQuery);
	$rResultFilterTotal->execute();
	
	$aResultFilterTotal = fetch($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	
	$rResultTotal = select($pdo, $sQuery);
	$rResultTotal->execute();
	
	$aResultTotal = fetch($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	if(!empty($_POST['draw'])){
	$output = array(
		"sEcho" => intval($_POST['draw']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	} else {
	$output = array(
		"sEcho" => 1,
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
		
	}
	
	
	
	while ( $aRow = fetch( $rResult ) )
	{
		
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			
			if ( $aColumns[$i] == "version" )
			{
				$row[] = $aRow[$i];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				$row[] = $aRow[$i];
			}
		}
		$output['aaData'][] = $row;
	}
	
	
	
	echo json_encode( $output );
?>
	