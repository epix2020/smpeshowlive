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
  $insertSQL = sprintf("INSERT INTO sj_entries (Show_ID, Rider_Num, Rider_ID, Horse_ID, Horse_Pony, Class_01, Class_02, Class_03, Class_04, Class_05, Class_06, Class_07, Class_08, Class_09, Class_10, Ent_Paid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Show_ID'], "int"),
                       GetSQLValueString($_POST['Rider_Num'], "int"),
                       GetSQLValueString($_POST['Rider_ID'], "text"),
                       GetSQLValueString($_POST['Horse_ID'], "text"),
                       GetSQLValueString($_POST['Horse_Pony'], "text"),
                       GetSQLValueString($_POST['Class_01'], "text"),
                       GetSQLValueString($_POST['Class_02'], "text"),
                       GetSQLValueString($_POST['Class_03'], "text"),
                       GetSQLValueString($_POST['Class_04'], "text"),
                       GetSQLValueString($_POST['Class_05'], "text"),
                       GetSQLValueString($_POST['Class_06'], "text"),
                       GetSQLValueString($_POST['Class_07'], "text"),
                       GetSQLValueString($_POST['Class_08'], "text"),
                       GetSQLValueString($_POST['Class_09'], "text"),
                       GetSQLValueString($_POST['Class_10'], "text"),
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
$query_Entries = "SELECT * FROM sj_entries WHERE Show_ID = '".$show_id."'";
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
            <td width="33%" align="left" valign="bottom"><img src="images/e-show.png" alt="" width="200" height="100" align="left" /> SMP Events <a href="SJ_Self_Service.php?s=<?php echo $show_id; ?>" target="_blank">Open Self Enter</a>&nbsp;</td>
      <td width="33%" valign="bottom"><h1>Add Entries </h1>&nbsp;</td>
      <td width="33%"><form id="ad_ent" name="jsheet" method="Post" action="Juding_Sheet.php?s=<?php echo $show_id; ?>" target="_blank">
      <select name="classnum">
      <option value="Class_01"> Class 1 </option>
      <option value="Class_02"> Class 2 </option>
      <option value="Class_03"> Class 3 </option>
      <option value="Class_04"> Class 4 </option>
      <option value="Class_05"> Class 5 </option>
      <option value="Class_06"> Class 6 </option>
      <option value="Class_07"> Class 7 </option>
      <option value="Class_08"> Class 8 </option>
      <option value="Class_09"> Class 9 </option>
      <option value="Class_10"> Class 10 </option>
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
  <th nowrap="nowrap" width="30" >01</th>
  <th nowrap="nowrap" width="30" >02</th>       
   <th nowrap="nowrap" width="30" >03</th>
   <th nowrap="nowrap" width="30" >04</th>
   <th nowrap="nowrap" width="30" >05</th>
	<th nowrap="nowrap" width="30" >06</th>
 <th nowrap="nowrap" width="30" >07</th>
      <th nowrap="nowrap" width="30" >08</th>
         <th nowrap="nowrap" width="30" >09</th>
       <th nowrap="nowrap" width="30" >10</th>
       <th nowrap="nowrap" width="30" >to Pay</th>
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
      <td ><input type="checkbox" name="Class_01" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_02" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_03" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_04" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_05" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_06" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_07" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_08" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_09" value="checked" size="10" /></td>
      <td ><input type="checkbox" name="Class_10" value="checked" size="10" /></td>
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
    <th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM sj_entries WHERE Show_ID = '".$show_id."'
						AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ></td>
  </tr>
  <tr>
  <th>&nbsp; </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
    <th >H/P &nbsp;</th>
    <th >1&nbsp;</th>
    <th >2&nbsp;</th>
    <th >3&nbsp;</th>
    <th >4&nbsp;</th>
    <th >5&nbsp;</th>
    <th >6&nbsp;</th>
    <th >7&nbsp;</th>
    <th >8&nbsp;</th>
    <th >9&nbsp;</th>
    <th >10&nbsp;</th>
    <th >to Pay&nbsp;</th>
  </tr>
  <?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM sj_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delent.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>
      <td contenteditable="true">
        <input name="entclass1" type="checkbox" title="1" <?php echo $row_Entries['Class_01']; ?>/> 
        </td>
      <td contenteditable="true">
        <input name="entclass2" type="checkbox" title="2" <?php echo $row_Entries['Class_02']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass3" type="checkbox" title="3" <?php echo $row_Entries['Class_03']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass4" type="checkbox" title="4" <?php echo $row_Entries['Class_04']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass5" type="checkbox" title="5" <?php echo $row_Entries['Class_05']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass6" type="checkbox" title="6" <?php echo $row_Entries['Class_06']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass7" type="checkbox" title="7" <?php echo $row_Entries['Class_07']; ?>/>
      </td>
      <td id="Class_08:<?php echo $row_Entries['id'];?>"contenteditable="true">
        <input name="entclass8" type="checkbox" title="8" <?php echo $row_Entries['Class_08']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass9" type="checkbox" title="9" <?php echo $row_Entries['Class_09']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass10" type="checkbox" title="10" <?php echo $row_Entries['Class_10']; ?>/>
      </td>
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry.php" method="get">
        <Input type="submit"  Value="Update" /> 
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
