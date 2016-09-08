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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);

}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Add_Show")) {
   $date = mysql_real_escape_string($_POST['Show_Date']);
   $date = date('Y-m-d', strtotime(str_replace('/', '-', $date)));
  $insertSQL = sprintf("INSERT INTO shows (Show_Date, Show_Name, Show_Type_ID) VALUES (%s, %s, %s)",
                       GetSQLValueString($date, "date"),
                       GetSQLValueString($_POST['show_name'], "text"),
                       GetSQLValueString($_POST['Show_Type'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
}

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Recordset1 = "SELECT * FROM shows ORDER BY id DESC LIMIT 0,5";
$Recordset1 = mysql_query($query_Recordset1, $msqlsmp) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show_Type = "SELECT * FROM Show_Type
						WHERE Show_Type_Enabled = '1'";
$Show_Type = mysql_query($query_Show_Type, $msqlsmp) or die(mysql_error());
$row_Show_Type = mysql_fetch_array($Show_Type);
$totalRows_Show_Type = mysql_num_rows($Show_Type);

?>

<!doctype html>
<html>
<link href="css/my_styles.css" rel="stylesheet" type="text/css">
<head>


<meta charset="UTF-8">
<title>E-SHOW ADD SHOW</title>
<style>
.tabe1 {
	font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
	font-size: large;
	text-align:center;
	font-color:black;
}
div.background
{
	background-color:rgba(113,144,67,1.00) ;
  background: url(93116072.jpg) ;
  border: 2px solid black;
}
div.transbox
{
  margin: 10px;
  background-color: #ffffff;
  border: 3px solid black;
    border-radius: 25px;
  opacity:0.6;
  filter:alpha(opacity=60); /* For IE8 and earlier */
}
div.transbox p
{
  margin: 2%;
  font-weight: bold;
  color: #000000;
}
</style>
</head>
<body bgcolor="#6D8B80">
<div class="background">
<div class="transbox">
<table width="100%" border="0">
			<tr>
            <td width="33%" align="left" valign="bottom"><img src="images/e-show.png" alt="" width="200" height="100" align="left" /> SMP Events &nbsp;</td>
      <td align="center" width="33%" valign="bottom"><h1>Add BS Show </h1>&nbsp;</td>
      <td width="33%"></td>
      </tr>
      </table>
<p>&nbsp;</p>

<form class="tabe1" method="POST" action="<?php echo $editFormAction; ?>" name="Add_Show" id="Add_Show">

<table width="883" border="1" align="center">
    <tr>
      <td width="315"  bgcolor="#7E7E7E" class="tabe1" ><input type="text" name="show_name" width="40"> Show Name &nbsp;</td>
      <td width="251" bgcolor="#7E7E7E" class="tabe1"><input type="date" name="Show_Date" width="40"> Show Date &nbsp;</td>
      <td width="202" bgcolor="#7E7E7E" class="tabe1"><input type="text" name="Show_Center" width="40"> Show Center &nbsp;</td>
      <td width="87" bgcolor="#7E7E7E" class="tabe1"><input type="submit" value="Add Show" />
    </tr>
</table>
<input type="hidden" name="MM_insert" value="Add_Show">
</form>
<p>&nbsp;</p>
<table width="800" border="1" align="center"> 
    <?php do { ?>
    <?php mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show_URL = "SELECT * FROM Show_Type WHERE Show_Type = '" .$row_Recordset1['Show_Type_ID']."'" ;
$Show_URL = mysql_query($query_Show_URL, $msqlsmp) or die(mysql_error());
$row_Show_URL = mysql_fetch_array($Show_URL);
$totalRows_Show_URL = mysql_num_rows($Show_URL);
	?>
      <tr>
        <td class="tabe1"><?php echo $row_Recordset1['id']; ?></td>
        <td class="tabe1"><?php echo date("d/m/Y",strtotime($row_Recordset1['Show_Date'])); ?></td>
        <td class="tabe1"><?php echo $row_Recordset1['Show_Name']; ?></td>
        <td class="tabe1"><?php echo $row_Recordset1['Show_Type_ID']; ?></td>
        <td><?php $showid=$row_Recordset1['id']; ?>       
        <form id="ad_ent" name="Add_Entries" method="Post" action="Add_Entries<?php echo $row_Show_URL['Url'];?>.php?s=<?php echo $showid; ?>">
        <input type="submit" value="Add Entries"> 
        </form></td>
      </tr>
      <tr>
      
      <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</div>
</div>
<p>&nbsp;</p>


</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
