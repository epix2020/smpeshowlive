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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO riders (Rider_Name, Rider_BS_Num, Rider_CJ_Num, Rider_Junior, Rider_Email, Rider_Mobile) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Rider_Name'], "text"),
                       GetSQLValueString($_POST['Rider_BS_Num'], "int"),
                       GetSQLValueString($_POST['Rider_CJ_Num'], "int"),
                       GetSQLValueString($_POST['Rider_Junior'], "int"),
                       GetSQLValueString($_POST['Rider_Email'], "text"),
                       GetSQLValueString($_POST['Rider_Mobile'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
}

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_smpeshow = "SELECT * FROM riders";
$smpeshow = mysql_query($query_smpeshow, $msqlsmp) or die(mysql_error());
$row_smpeshow = mysql_fetch_assoc($smpeshow);
$totalRows_smpeshow = mysql_num_rows($smpeshow);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SMP E-SHOW</title>
<link href="css-11-140729043520.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="large2">E-SHOW SMP Events - Add Rider </div>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riders Name:</td>
      <td><input type="text" name="Rider_Name" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riders BS Num:</td>
      <td><input type="text" name="Rider_BS_Num" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riders CJ Num:</td>
      <td><input type="text" name="Rider_CJ_Num" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Junior:</td>
        <td>
        <p>
        <label>
            <input type="radio" name="Rider_Junior" value="1" id="Junior_1" />
            Yes</label>
          <br />
          <label>
            <input type="radio" name="Rider_Junior" value="0" id="Junior_0" />
            No</label>
          <br />
          
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riders Email:</td>
      <td><input type="text" name="Rider_Email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Riders Mobile:</td>
      <td><input type="text" name="Rider_Mobile" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<table width="200" border="1">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Riders Name</th>
      <th scope="col">Riders BS Num</th>
      <th scope="col">Riders CJ Num</th>
      <th scope="col">Junior</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
    <?php do { ?>
    <tr>
      <td><?php echo $row_smpeshow['id']; ?></td>
      <td><?php echo $row_smpeshow['Rider_Name']; ?>&nbsp;</td>
      <td><?php echo $row_smpeshow['Rider_BS_Num']; ?>&nbsp;</td>
      <td><?php echo $row_smpeshow['Rider_CJ_Num']; ?>&nbsp;</td>
      <td><?php if ($row_smpeshow['Rider_Junior'] == 0)
	  							{ echo "No"; }
								else
								{ echo "Yes"; } ?>&nbsp;</td>
      <td><?php echo $row_smpeshow['Rider_Email']; ?>&nbsp;</td>
      <td><?php echo $row_smpeshow['Rider_Mobile']; ?>&nbsp;</td>
    </tr>
    
  
  <?php } while ($row_smpeshow = mysql_fetch_assoc($smpeshow)); ?>
  </table>

<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($smpeshow);
?>
