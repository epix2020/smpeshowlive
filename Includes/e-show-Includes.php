
//* Count Number of Entries In A Class *//
<?php function numinclass ($classno) {
	global $database_msqlsmp, $msqlsmp, $show_id, $classentno ;
	mysql_select_db($database_msqlsmp, $msqlsmp);
	$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND $classno = 'checked' ";
	$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
	$classentno = mysql_result($Entries,0);
	$totalRows_Entries = mysql_num_rows($Entries); 
	return $classentno ;
 }
 ?>