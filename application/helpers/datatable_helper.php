<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// untuk global view, short, search data table
if ( ! function_exists('data_table'))
{
	function data_table($data,$request)
	{
		$CI = & get_instance();
		$CI->load->database();

		$aColumns = $data['aColumns'];
		$sIndexColumn = $data['sIndexColumn'];
		$sTable = $data['sTable'];
                $sJoin = isset($data['sJoin']) ? $data['sJoin'] : "";
                $sGroup = isset($data['sGroup']) ? $data['sGroup'] : "";
                
		//Paging
		$sLimit = "";
		if ( isset( $request['iDisplayStart'] ) && $request['iDisplayLength'] != '-1' )
		{
			$sLimit = "LIMIT " . $CI->db->escape_str( $request['iDisplayStart'] ).", " . 
				$CI->db->escape_str( $request['iDisplayLength'] );
		}

		$sOrder='';
		//Ordering
		if ( isset( $request['iSortCol_0'] ) )
		{
			$sOrder = "ORDER BY  ";
			for ( $i=0 ; $i<intval( $request['iSortingCols'] ) ; $i++ )
			{
				if ( $request[ 'bSortable_'.intval($request['iSortCol_'.$i]) ] == "true" )
				{
					$pos = strpos(strtolower($aColumns[intval( $request['iSortCol_'.$i])]), ' as ');
					if($pos == false):	
						$sOrder .= $aColumns[ intval( $request['iSortCol_'.$i] ) ]."
							" . $CI->db->escape_str( $request['sSortDir_'.$i] ) .", ";
					else:
						$sOrder .= substr($aColumns[intval( $request['iSortCol_'.$i] )], 0, $pos)."
							" . $CI->db->escape_str( $request['sSortDir_'.$i] ) .", ";
					endif;
				}
			}
			
			$sOrder = substr_replace( $sOrder, "", -2 );
			if ( $sOrder == "ORDER BY" )
			{
				$sOrder = "";
			}
		}		

		//Filtering
		$sWhere = "";
		if ( $request['sSearch'] != "" )
		{
			$sWhere = "AND (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				if (@!in_array($i, $data['aColumns_nosearch'])):
					$pos = strpos(strtolower($aColumns[$i]), ' as ');
					if($pos == false)
						$sWhere .= $aColumns[$i]." LIKE '%" . $CI->db->escape_str( $request['sSearch'] )."%' OR ";
					else
						$sWhere .= substr($aColumns[$i], 0, $pos)." LIKE '%" . $CI->db->escape_str( $request['sSearch'] )."%' OR ";
				endif;
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}

		//Individual column filtering 
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $request['bSearchable_'.$i] == "true" && $request['sSearch_'.$i] != '' )
			{
				/*if ( $sWhere == "" )
				{
					$sWhere = "WHERE ";
				}
				else
				{*/
					$sWhere .= " AND ";
				//}
				$pos = strpos(strtolower($aColumns[$i]), ' as ');
				if($pos == false)
					$sWhere .= $aColumns[$i]." LIKE '%" . $CI->db->escape_str($request['sSearch_'.$i])."%' ";
				else
					$sWhere .= substr($aColumns[$i], 0, $pos)." LIKE '%" . $CI->db->escape_str( $request['sSearch_'.$i] )."%' ";

			}
		}
		
		if(!$sWhere AND $data['sWhere']) {
			$sWhere = ' AND '.$data['sWhere'];
		}ELSEif ($data['sWhere']) {
			$sWhere .= ' AND '.$data['sWhere'];
		}
		
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
			FROM $sTable
                        $sJoin
			WHERE 1 $sWhere
                        $sGroup
			$sOrder 
			$sLimit
		";
		$sQ	= $CI->db->query($sQuery);

		/* Data set length after filtering */
		$sQuery = "
			SELECT FOUND_ROWS() juml
		";
		$aQ	= $CI->db->query($sQuery);
		$aRow = end($aQ->result_array());

		$sQuery = "
			SELECT COUNT(`".$sIndexColumn."`) juml
			FROM $sTable
		";
		$tQ	= $CI->db->query($sQuery);
		$tRow = end($tQ->result_array());

		$d['output'] = array(
			"sEcho" => intval($request['sEcho']),
			"iTotalRecords" => $tRow['juml'],
			"iTotalDisplayRecords" => $aRow['juml'],
			"aaData" => array()
		);
		
		$d['sQ'] = $sQ;
		
		return $d;
	}
}
?>