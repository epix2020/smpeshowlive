<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
if($_POST["standard"]) {
$cno=$_GET['cn'];
$show_id=$_GET['s'];
$classnum=$_POST['classnum'];
$classnumorder = $classnum;
$classnumorder .= "_Order";
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Recordset1 = "SELECT * FROM BSJumping_entries
					WHERE Show_ID = '".$show_id."'
					AND  $classnum = 'checked'
                      Order by $classnumorder";
$Recordset1 = mysql_query($query_Recordset1, $msqlsmp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);}

if($_POST["random"]) {
$cno=$_GET['cn'];
$show_id=$_GET['s'];
$classnum=$_POST['classnum'];
$classnumorder = $classnum;
$classnumorder .= "_Order";
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Recordset1 = "UPDATE BSJumping_entries
                    SET $classnumorder = RAND()* 1500
                    WHERE $classnum = 'checked'
                    AND Show_ID = '".$show_id."'";
$Recordset1 = mysql_query($query_Recordset1, $msqlsmp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$cno=$_GET['cn'];
$show_id=$_GET['s'];
$classnum=$_POST['classnum'];
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Recordset1 = "SELECT * FROM BSJumping_entries
					WHERE Show_ID = '".$show_id."'

					AND  $classnum = 'checked'
                     Order by $classnumorder";
$Recordset1 = mysql_query($query_Recordset1, $msqlsmp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);}

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show = "SELECT * FROM shows WHERE id = '".$show_id."'";
$Show = mysql_query($query_Show, $msqlsmp) or die(mysql_error());
$row_Show = mysql_fetch_assoc($Show);
$totalRows_Show = mysql_num_rows($Show);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM BSJumping WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_shinf = "SELECT * FROM BSJumping WHERE Show_id = '".$show_id."'";
$shinf = mysql_query($query_shinf, $msqlsmp) or die(mysql_error());
$row_shinf = mysql_fetch_array($shinf);


if ($classnum == "Class_01" ){ $colnum="C1"; };
if ($classnum == "Class_02" ){ $colnum="C2"; };
if ($classnum == "Class_03" ){ $colnum="C3"; };
if ($classnum == "Class_04" ){ $colnum="C4"; };
if ($classnum == "Class_05" ){ $colnum="C5"; };
if ($classnum == "Class_06" ){ $colnum="C6"; };
if ($classnum == "Class_07" ){ $colnum="C7"; };
if ($classnum == "Class_08" ){ $colnum="C8"; };
if ($classnum == "Class_09" ){ $colnum="C9"; };
if ($classnum == "Class_10" ){ $colnum="C10"; };
if ($classnum == "Class_11" ){ $colnum="C11"; };
if ($classnum == "Class_12" ){ $colnum="C12"; };
if ($classnum == "Class_13" ){ $colnum="C13"; };
if ($classnum == "Class_14" ){ $colnum="C14"; };
if ($classnum == "Class_15" ){ $colnum="C15"; };
if ($classnum == "Class_16" ){ $colnum="C16"; };
if ($classnum == "Class_17" ){ $colnum="C17"; };
if ($classnum == "Class_18" ){ $colnum="C18"; };
if ($classnum == "Class_19" ){ $colnum="C19"; };
if ($classnum == "Class_20" ){ $colnum="C20"; };

if ($classnum == "Class_01" ){ $colname="CN1"; };
if ($classnum == "Class_02" ){ $colname="CN2"; };
if ($classnum == "Class_03" ){ $colname="CN3"; };
if ($classnum == "Class_04" ){ $colname="CN4"; };
if ($classnum == "Class_05" ){ $colname="CN5"; };
if ($classnum == "Class_06" ){ $colname="CN6"; };
if ($classnum == "Class_07" ){ $colname="CN7"; };
if ($classnum == "Class_08" ){ $colname="CN8"; };
if ($classnum == "Class_09" ){ $colname="CN9"; };
if ($classnum == "Class_10" ){ $colname="CN10"; };
if ($classnum == "Class_11" ){ $colname="CN11"; };
if ($classnum == "Class_12" ){ $colname="CN12"; };
if ($classnum == "Class_13" ){ $colname="CN13"; };
if ($classnum == "Class_14" ){ $colname="CN14"; };
if ($classnum == "Class_15" ){ $colname="CN15"; };
if ($classnum == "Class_16" ){ $colname="CN16"; };
if ($classnum == "Class_17" ){ $colname="CN17"; };
if ($classnum == "Class_18" ){ $colname="CN18"; };
if ($classnum == "Class_19" ){ $colname="CN19"; };
if ($classnum == "Class_20" ){ $colname="CN20"; };
?>

<title>BS Start List</title>
<style type="text/css">
.BS_HEADER {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 24px;
}

#Jtab td {
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
#Jtab {
}
#Jtab {
}
#Jtab {
	font-family: Verdana, Geneva, sans-serif;
}
#enthead {
	color: #CCC;
}
#enthead {
	font-family: Verdana, Geneva, sans-serif;
	background-color: #CCC;
	color: #333;
}
#enthead {
	font-size: 12px;
}
#TableData {
	font-family: Verdana, Geneva, sans-serif;
}
</style>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="79" height="61"><img src="../BSJA_NEW_LOGO.jpg" width="67" height="58" /></td>
    <td ><div align="center" class="BS_HEADER">START LIST FOR SHOWS AFFILIATED TO BRITISH
    SHOWJUMPING</div></td>
  </tr>
</table>
<table width="100%" border="1">
  <tr id="Jtab"> 
   <td width="191" ><span id="Jtab">FULL NAME OF SHOW:</span></td>
    <td width="171"><span id="Jtab"><?php echo $row_shinf[Show_Name];?></span></td>
    <td width="107"><span id="Jtab">Held At:</span></td>
    <td width="171"><span id="Jtab"><?php echo $row_shinf[Show_Venue];?></span></td>
    <td width="172"><span id="Jtab">On:</span></td>
    <td width="148"><span id="Jtab"><?php echo $row_shinf[Show_Date];?></span></td>
  </tr>
  <tr id="Jtab">
    <td><span id="Jtab">Class Number:</span></td>
    <td><span id="Jtab"> <?php echo $row_ihcls[$colnum];?> </span></td>
    <td><span id="Jtab">Class Name:  </span></td>
    <td><span id="Jtab"><?php echo $row_ihcls[$colname];?></span></td>
    <td><span id="Jtab">Number of Starters</span></td>
    <td><span id="Jtab"><?php echo $totalRows_Recordset1 ;?></span></td>
  </tr>
</table>
<table width="100%" border="1">
  <tr id="enthead">
    <th width="6%" scope="col">Number</th>
    <th width="27%" scope="col">Horse or Ponys Name</th>
    <th width="7%" scope="col">Reg. No</th>
    <th width="21%" scope="col">Owners Name</th>
    <th width="20%" scope="col">Riders Name</th>
    <th width="9%" scope="col">Membership No.</th>
    <th width="10%" scope="col">Notes</th>
  </tr>
  <?php do { ?>
  <tr id="TableData">
    <td><?php echo $row_Recordset1['Rider_Num']; ?> </td>
    <td><?php echo $row_Recordset1['Horse_ID']; ?></td>
    <td><?php echo $row_Recordset1['Horse_BS_Num']; ?></td>
    <td><?php echo $row_Recordset1['Horse_BS_Owner']; ?></td>
    <td><?php echo $row_Recordset1['Rider_ID']; ?></td>
    <td><?php echo $row_Recordset1['Rider_BS_Num']; ?></td>
    <td><?php echo $row_Recordset1['BS_Entry_Notes']; ?></td>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
