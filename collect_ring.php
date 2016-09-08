<?php require_once('Connections/msqlsmp.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$show_id=$_GET['s'];
$classnum="Class_02";


mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show = "SELECT * FROM shows WHERE id = '".$show_id."'";
$Show = mysql_query($query_Show, $msqlsmp) or die(mysql_error());
$row_Show = mysql_fetch_assoc($Show);
$totalRows_Show = mysql_num_rows($Show);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Recordset1 = "SELECT * FROM sj_entries WHERE Show_ID = '".$show_id."' AND $classnum = 'checked' ";
$Recordset1 = mysql_query($query_Recordset1, $msqlsmp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


?>

<style type="text/css">
	.TFtable{
		width:100%; 
		border-collapse:collapse; 
	}
	.TFtable td{ 
		padding:7px; border:#4e95f4 1px solid;
	}
	/* provide some minimal visual accomodation for IE8 and below */
	.TFtable tr{
		background: #b8d1f3;
	}
	/*  Define the background color for all the ODD background rows  */
	.TFtable tr:nth-child(odd){ 
		background: #b8d1f3;
	}
	/*  Define the background color for all the EVEN background rows  */
	.TFtable tr:nth-child(even){
		background: #dae5f4;
	}
</style>



<head>
<meta name=Title content="Score Sheet">
<meta name=Keywords content="">
<meta http-equiv=Content-Type content="text/html; charset=macintosh">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 14">
<meta name=Originator content="Microsoft Word 14">
<link rel="stylesheet" type="text/css" href="css/my_styles.css">
<link rel=File-List href="JudingSheets_files/filelist.xml">
<title>Score Sheet : <?php echo $classnum ; ?></title>
</head>
<body>


<table class="TFtable" width="100%" border="1">
  <tbody>
    <tr>
      <th scope="col">Rider Number</th>
      <th scope="col">Rider Name</th>
      <th scope="col">Horse Name</th>
      <th scope="col">Horse or Pony</th>
    </tr>
   
      
        <?php do { ?>
         <tr>
          <td>&nbsp;<?php echo $row_Recordset1['Rider_Num']; ?></td>
          <td>&nbsp;<?php echo $row_Recordset1['Rider_ID']; ?></td>
          <td>&nbsp;<?php echo $row_Recordset1['Horse_ID']; ?></td>
          <td>&nbsp;<?php echo $row_Recordset1['Horse_Pony']; ?></td>
          
          <td> <form> <input type="submit" value="Add" > </form>
          </td>
          
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
       
    
  </tbody>
</table>

</body>

</html>
<?php
mysql_free_result($Show);

mysql_free_result($Recordset1);
?>
