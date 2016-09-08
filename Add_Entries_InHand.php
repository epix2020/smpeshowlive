<?php require_once('Connections/msqlsmp.php'); ?>
<script>
$(function(){
	//acknowledgement message
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('ajax.php' , field_userid + "=" + value, function(data){
            if(data != '')
			{
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},1000);
			}
        });
    });
});
</script>
<script type="text/javascript">
    function clicked() {
       if (confirm('are you sure?')) {
           delsub.submit();
       } else {
           return false;
       }
    }
	</script>
<?php

$show_id=$_GET['s'];
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
  $insertSQL = sprintf("INSERT INTO sih_entries (Show_ID, Rider_Num, Rider_ID, Horse_ID, Horse_Pony, Class_11, Class_12, Class_13, Class_14, Class_15, Class_16, Class_17, Class_18, Class_19, Class_20, Class_21, Ent_Paid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Show_ID'], "int"),
                       GetSQLValueString($_POST['Rider_Num'], "int"),
                       GetSQLValueString($_POST['Rider_ID'], "text"),
                       GetSQLValueString($_POST['Horse_ID'], "text"),
                       GetSQLValueString($_POST['Horse_Pony'], "text"),
                       GetSQLValueString($_POST['Class_11'], "text"),
                       GetSQLValueString($_POST['Class_12'], "text"),
                       GetSQLValueString($_POST['Class_13'], "text"),
                       GetSQLValueString($_POST['Class_14'], "text"),
                       GetSQLValueString($_POST['Class_15'], "text"),
                       GetSQLValueString($_POST['Class_16'], "text"),
                       GetSQLValueString($_POST['Class_17'], "text"),
                       GetSQLValueString($_POST['Class_18'], "text"),
                       GetSQLValueString($_POST['Class_19'], "text"),
                       GetSQLValueString($_POST['Class_20'], "text"),
					   GetSQLValueString($_POST['Class_21'], "text"),
					   GetSQLValueString($_POST['Ent_Paid'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  $insertSQL = sprintf("INSERT IGNORE INTO riders (Rider_Name) VALUES (%s)",
                       GetSQLValueString($_POST['Rider_ID'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  
  $insertSQL = sprintf("INSERT IGNORE INTO horses (Horse_Name) VALUES (%s)",
                       GetSQLValueString($_POST['Horse_ID'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
}



mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM sih_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show = "SELECT * FROM shows WHERE id = '".$show_id."'";
$Show = mysql_query($query_Show, $msqlsmp) or die(mysql_error());
$row_Show = mysql_fetch_assoc($Show);
$totalRows_Show = mysql_num_rows($Show);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Rider = "SELECT * FROM riders";
$Rider = mysql_query($query_Rider, $msqlsmp) or die(mysql_error());
$row_Rider = mysql_fetch_array($Rider);
$totalRows_Rider = mysql_num_rows($Rider);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show_Type = "SELECT * FROM Show_Type WHERE id = '".$row_Show['Show_Type_ID']."'";
$Show_Type = mysql_query($query_Show_Type, $msqlsmp) or die(mysql_error());
$row_Show_Type = mysql_fetch_array($Show_Type);
$totalRows_Show_Type = mysql_num_rows($Show_Type);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Horse = "SELECT * FROM horses";
$Horse = mysql_query($query_Horse, $msqlsmp) or die(mysql_error());
$row_Horse = mysql_fetch_assoc($Horse);
$totalRows_Horse = mysql_num_rows($Horse);
?>

    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/my_styles.css"/>
<style type="text/css">
<style>
.tabe1 {
	font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
	font-size: large;
	text-align:center;
	font-color:black;
}
div.background
{
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
table
{
	margin: 0 auto;
	text-align:center;
}

</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Show Entries : <?php echo $row_Show['Show_Name'];?> : <?php echo date("d/m/Y",strtotime($row_Show['Show_Date'])); ?></title>
</head>

<body bgcolor="#6D8B80">

<?php do { ?>
 <?php $ridernuminc = $row_Entries['Rider_Num'] ;?> 
 <?php ++$ridernuminc ;?>
<?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
<div class="background">
<div class="transbox">
<h1>&nbsp; </h1>
<table width="100%" border="0">
			<tr>
            <td width="33%" align="left" valign="bottom"><img src="images/e-show.png" alt="" width="200" height="100" align="left" /> SMP Events &nbsp;</td>
      <td width="33%" valign="bottom"><h1>Add Entries </h1>&nbsp;</td>
      <td width="33%"><form id="ad_ent" name="jsheet" method="Post" action="Juding_Sheet_IH.php?s=<?php echo $show_id; ?>" target="_blank">
      <select name="classnum">
      <option value="Class_11"> Class 11 </option>
      <option value="Class_12"> Class 12 </option>
      <option value="Class_13"> Class 13 </option>
      <option value="Class_14"> Class 14 </option>
      <option value="Class_15"> Class 15 </option>
      <option value="Class_16"> Class 16 </option>
      <option value="Class_17"> Class 17 </option>
      <option value="Class_18"> Class 18 </option>
      <option value="Class_19"> Class 19 </option>
      <option value="Class_20"> Class 20 </option>
      <option value="Class_21"> Class 21 </option>
      </select>
            <input type="submit" value="Generate Judge's Sheet"> 
        </form>&nbsp;</td>
  </tr>
  </tbody>
</table>
  <tbody>
    <tr>
      <td>



<table width="800" Border="1">
	<tr>
    	<th> Show ID </th>
        <th> Show Name</th>
        <th> Show Date</th>
        <th> Show Type</th>
    </tr>
    <tr>
    	<td><?php echo $row_Show['id']; ?> </td>
        <td><?php echo $row_Show['Show_Name'];?></td>
        <td><?php echo date("d/m/Y",strtotime($row_Show['Show_Date'])); ?> </td>
        <td><?php echo $row_Show['Show_Type_ID']; ?></td>
    </tr>
</table>    
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table width="400" border="1">
  <tr>
  
  <th nowrap="nowrap" >Rider Num:</th>
  <th nowrap="nowrap" >Rider Name:</th>
  <th nowrap="nowrap" >Horse Name:</th>
  <th nowrap="nowrap" >Horse or Pony:</th>
  <th nowrap="nowrap" width="30" >11</th>
  <th nowrap="nowrap" width="30" >12</th>       
   <th nowrap="nowrap" width="30" >13</th>
   <th nowrap="nowrap" width="30" >14</th>
   <th nowrap="nowrap" width="30" >15</th>
	<th nowrap="nowrap" width="30" >16</th>
 <th nowrap="nowrap" width="30" >17</th>
      <th nowrap="nowrap" width="30" >18</th>
         <th nowrap="nowrap" width="30" >19</th>
       <th nowrap="nowrap" width="30" >20</th>
       <th nowrap="nowrap" width="30" >21</th>
       <th nowrap="nowrap" width="30" >PAID</th>
  </tr>
    <tr bgcolor="#B8B8B8">
      <input type="hidden" name="Show_ID" value="<?= $show_id ?>"  size="3" />
      <td><input type="text" name="Rider_Num" value="<?php echo $ridernuminc ;?> " required size="5" /></td>
      <td>
      <div class="input_container">
      <input type="text" autocomplete="off" id="Rider_ID" name="Rider_ID" onKeyUp="autocomplet()" required >
                    <ul id="country_list_id"></ul> </div>
      </td>
      <td>
      <div class="input_containerhorse">
      <input type="text" autocomplete="off" id="Horse_ID" name="Horse_ID" onKeyUp="autocomplethorse()" required>
                    <ul id="horse_list"></ul> </div>
      </td>
      
      <td  align="left"><input type="radio" name="Horse_Pony" value="P" size="4" checked/> Pony
      </br>
      <input type="radio" name="Horse_Pony" value="H"  size="4" /> Horse </td>
      <td ><input type="checkbox" name="Class_11" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_12" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_13" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_14" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_15" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_16" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_17" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_18" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_19" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_20" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_21" value="checked" size="10" /></td>
      <td> <input type="checkbox" name="Ent_Paid" value="checked" size="10" /></td>
    </tr>
      <tr>
      <td><input type="submit" value="Add Entry" /></td>
  </tr
  ></table>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  <p>&nbsp;</p>
</form>
<table width="800" border="1">
  <tr>
  <th>&nbsp; </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
    <th >H/P &nbsp;</th>
    <th >11&nbsp;</th>
    <th >12&nbsp;</th>
    <th >13&nbsp;</th>
    <th >14&nbsp;</th>
    <th >15&nbsp;</th>
    <th >16&nbsp;</th>
    <th >17&nbsp;</th>
    <th >18&nbsp;</th>
    <th >19&nbsp;</th>
    <th >20&nbsp;</th>
    <th >21&nbsp;</th>
    <th >PAID&nbsp;</th>
  </tr>
  <?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM sih_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentih.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_IH.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>
      <td contenteditable="true">
        <input name="entclass11" type="checkbox" <?php echo $row_Entries['Class_11']; ?>/> 
        </td>
      <td contenteditable="true">
        <input name="entclass12" type="checkbox" <?php echo $row_Entries['Class_12']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass13" type="checkbox" <?php echo $row_Entries['Class_13']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass14" type="checkbox" <?php echo $row_Entries['Class_14']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass15" type="checkbox" <?php echo $row_Entries['Class_15']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass16" type="checkbox" <?php echo $row_Entries['Class_16']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass17" type="checkbox" <?php echo $row_Entries['Class_17']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass18" type="checkbox" <?php echo $row_Entries['Class_18']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass19" type="checkbox" <?php echo $row_Entries['Class_19']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass20" type="checkbox" <?php echo $row_Entries['Class_20']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass21" type="checkbox" <?php echo $row_Entries['Class_21']; ?>/>
      </td>
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#00f100" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_IH.php" method="get">
        <Input type="submit"  Value="Edit" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Entries);

mysql_free_result($Show);

mysql_free_result($Rider);

mysql_free_result($Horse);
?>
