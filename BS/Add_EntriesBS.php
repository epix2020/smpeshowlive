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
  $insertSQL = sprintf("INSERT INTO BSJumping_entries (Show_ID, Rider_Num, Rider_ID, Rider_BS_Num, Horse_ID, Horse_BS_Num, Horse_BS_Owner, Horse_Pony, Class_01, Class_02, Class_03, Class_04, Class_05, Class_06, Class_07, Class_08, Class_09, Class_10, Class_11, Class_12, Class_13, Class_14, Class_15, Class_16, Class_17, Class_18, Class_19, Class_20, Ent_Paid, BS_Entry_Notes) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Show_ID'], "int"),
                       GetSQLValueString($_POST['Rider_Num'], "int"),
                       GetSQLValueString($_POST['Rider_ID'], "text"),
					   GetSQLValueString($_POST['Rider_BS_Num'], "text"),
                       GetSQLValueString($_POST['Horse_ID'], "text"),
					   GetSQLValueString($_POST['Horse_BS_Num'], "text"),
					   GetSQLValueString($_POST['Horse_BS_Owner'], "text"),
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
					   GetSQLValueString($_POST['Ent_Paid'], "text"),
					   GetSQLValueString($_POST['BS_Entry_Notes'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  $insertSQL = sprintf("INSERT IGNORE INTO riders (Rider_Name, Rider_BS_Num) VALUES (%s,%s)",
                       GetSQLValueString($_POST['Rider_ID'], "text"),
					   GetSQLValueString($_POST['Rider_BS_Num'], "text"));
				   
					   echo '1';

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  
  $insertSQL = sprintf("INSERT IGNORE INTO horses (Horse_Name, Horse_BS_Num, Horse_BS_Owner) VALUES (%s,%s,%s)",
                       GetSQLValueString($_POST['Horse_ID'], "text"),
					   GetSQLValueString($_POST['Horse_BS_Num'], "text"),
					   GetSQLValueString($_POST['Horse_BS_Owner'], "text"));
					   echo '2';

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
}



mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM BSJumping_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries);

// mysql_select_db($database_msqlsmp, $msqlsmp);
// $query_Show = "SELECT * FROM shows WHERE id = '".$show_id."'";
// $Show = mysql_query($query_Show, $msqlsmp) or die(mysql_error());
// $row_Show = mysql_fetch_assoc($Show);
// $totalRows_Show = mysql_num_rows($Show);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Rider = "SELECT * FROM riders";
$Rider = mysql_query($query_Rider, $msqlsmp) or die(mysql_error());
$row_Rider = mysql_fetch_array($Rider);
$totalRows_Rider = mysql_num_rows($Rider);

// mysql_select_db($database_msqlsmp, $msqlsmp);
// $query_Show_Type = "SELECT * FROM Show_Type WHERE id = '".$row_Show['Show_Type_ID']."'";
//$Show_Type = mysql_query($query_Show_Type, $msqlsmp) or die(mysql_error());
//$row_Show_Type = mysql_fetch_array($Show_Type);
// $totalRows_Show_Type = mysql_num_rows($Show_Type);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Horse = "SELECT * FROM horses";
$Horse = mysql_query($query_Horse, $msqlsmp) or die(mysql_error());
$row_Horse = mysql_fetch_assoc($Horse);
$totalRows_Horse = mysql_num_rows($Horse);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM BSJumping WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);

?>


    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/style.css" /> 
<!-- <link rel="stylesheet" type="text/css" href="css/my_styles.css"/> -->
<style type="text/css">
<style>
.tabe1 {
	font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial, sans-serif;
	font-size: small;
	text-align:center;
	font-color:black;
}
div.background
{
	border: 2px solid black;
	background-image: url(css/93116072.jpg);
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
	text-align: center;
	border-top-style: solid;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	padding: 2px;
	border-spacing: 2px;
}

</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add Show Entries : <?php echo $row_Show['Show_Name'];?> : <?php echo date("d/m/Y",strtotime($row_Show['Show_Date'])); ?></title>
</head>

<body bgcolor="#6D8B80" class="background">
<div class="background">
<div class="transbox">
<table width="100%" border="0" >
  <tr >
    <th id="headerbs" width="18%" height="67" scope="col"><img src="../BSJA_NEW_LOGO.jpg" width="76" height="66" /></th>
    <th id="headerbs" width="72%" height="67" scope="col">Blue Barn EC BS Showjumping Entries</th>
    <th id="headerbs" width="10%" height="67" scope="col"><script type="text/javascript">
document.write ('<p><span id="date-time">', new Date().toLocaleString(), '<\/span>.<\/p>')
if (document.getElementById) onload = function () {
	setInterval ("document.getElementById ('date-time').firstChild.data = new Date().toLocaleString()", 50)
}
</script>&nbsp;</th>
  </tr>
</table>
<?php do { ?>
 <?php $ridernuminc = $row_Entries['Rider_Num'] ;?> 
 <?php ++$ridernuminc ;?>
<?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>

<table width="100%" border="0">
			<tr>
          
      <td width="100%"><form id="ad_ent" name="jsheet" method="Post" action="startlist.php?s=<?php echo $show_id; ?>&cn=<?php echo $row_ihcls['C1']; ?>" target="_blank">
      
      <select name="classnum">
      <?php if (!empty($row_ihcls['C1'])){ echo '<option value="Class_01"> Class ';echo $row_ihcls['C1']; echo '</option>';} ?>
      <?php if (!empty($row_ihcls['C2'])){ echo '<option value="Class_02"> Class ';echo $row_ihcls['C2']; echo '</option>';} ?>
      <?php if (!empty($row_ihcls['C3'])){ echo '<option value="Class_03"> Class ';echo $row_ihcls['C3']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C4'])){ echo '<option value="Class_04"> Class ';echo $row_ihcls['C4']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C5'])){ echo '<option value="Class_05"> Class ';echo $row_ihcls['C5']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C6'])){ echo '<option value="Class_06"> Class ';echo $row_ihcls['C6']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C7'])){ echo '<option value="Class_07"> Class ';echo $row_ihcls['C7']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C8'])){ echo '<option value="Class_08"> Class ';echo $row_ihcls['C8']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C9'])){ echo '<option value="Class_09"> Class ';echo $row_ihcls['C9']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C10'])){ echo '<option value="Class_10"> Class ';echo $row_ihcls['C10']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C11'])){ echo '<option value="Class_11"> Class ';echo $row_ihcls['C11']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C12'])){ echo '<option value="Class_12"> Class ';echo $row_ihcls['C12']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C13'])){ echo '<option value="Class_13"> Class ';echo $row_ihcls['C13']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C14'])){ echo '<option value="Class_14"> Class ';echo $row_ihcls['C14']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C15'])){ echo '<option value="Class_15"> Class ';echo $row_ihcls['C15']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C16'])){ echo '<option value="Class_16"> Class ';echo $row_ihcls['C16']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C17'])){ echo '<option value="Class_17"> Class ';echo $row_ihcls['C17']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C18'])){ echo '<option value="Class_18"> Class ';echo $row_ihcls['C18']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C19'])){ echo '<option value="Class_19"> Class ';echo $row_ihcls['C19']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C20'])){ echo '<option value="Class_20"> Class ';echo $row_ihcls['C20']; echo '</option>';}?>
      
      </select>
            <input type="submit" value="Generate Judge's Sheet" name="standard">  </td>
            <td align="Right">
            <input type="submit" value="Generate Drawn Order" name="random">
        </form>&nbsp;</td>
  </tr>
  </tbody>
</table>
  <tbody>
    <tr>
      <td>


 
<p>&nbsp;</p>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table style="font-size:12px" width="800" border="1">
  <tr>
  
  <th  >Rider Num:</th>
  <th >Rider Name:</th>
  <th >Rider BS Num:</th>
  <th>Horse Name:</th>
  <th>Horse BS Num:</th>
  <th>Horse Owner:</th>
  <th>Notes:</th>
  <th >Horse or Pony:</th>
  <?php if (!empty($row_ihcls['C1'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C1'];echo'</th>'; }?>
  <?php if (!empty($row_ihcls['C2'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C2'];echo'</th>'; }?>       
  <?php if (!empty($row_ihcls['C3'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C3'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C4'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C4'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C5'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C5'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C6'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C6'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C7'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C7'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C8'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C8'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C9'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C9'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C10'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C10'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C11'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C11'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C12'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C12'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C13'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C13'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C14'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C14'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C15'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C15'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C16'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C16'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C17'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C17'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C18'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C18'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C19'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C19'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C20'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C20'];echo'</th>'; }?> 
  <th nowrap="nowrap" width="30" >to Pay</th>
  </tr>
    <tr bgcolor="#B8B8B8">
      <input type="hidden" name="Show_ID" value="<?= $show_id ?>"  size="3" />
      <td><input type="text" name="Rider_Num" value="<?php echo $ridernuminc ;?> " required size="5" /></td>
      <td>
      <div class="input_container">
      <input type="text" autocomplete="off" id="Rider_ID" name="Rider_ID"   required >
                    <ul id="country_list_id"></ul> </div>
      </td>
      <td>
      <div class="input_container">
      <input type="text" autocomplete="off" id="Rider_BS_Num" name="Rider_BS_Num"   >
                    <ul id="country_list_id"></ul> </div>
      </td>
      <td>
      <div class="input_containerhorse">
      <input type="text" autocomplete="off" id="Horse_ID" name="Horse_ID"  required >
              <ul id="horse_list"></ul> </div>
      </td>
      <td>
      <div class="input_containerhorse">
      <input type="text" autocomplete="off" id="Horse_BS_Num" name="Horse_BS_Num"  >
              <ul id="horse_list"></ul> </div>
      </td>
      <td>
      <div class="input_containerhorse">
      <input type="text" autocomplete="off" id="Horse_BS_Owner" name="Horse_BS_Owner"  >
              <ul id="horse_list"></ul> </div>
      </td>
      <td>
      <div class="input_containerhorse">
      <input type="text" autocomplete="off" id="BS_Entry_Notes" name="BS_Entry_Notes"  >
              <ul id="horse_list"></ul> </div>
      </td>
      
      <td  align="left"><input type="radio" name="Horse_Pony" value="H" size="4" checked/> Pony
      </br>
      <input type="radio" name="Horse_Pony" value="H"  size="4" /> Horse </td>
      <?php if (!empty($row_ihcls['C1'])){ echo '<td ><input type="checkbox" name="Class_01" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C2'])){ echo '<td ><input type="checkbox" name="Class_02" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ echo '<td ><input type="checkbox" name="Class_03" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ echo '<td ><input type="checkbox" name="Class_04" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ echo '<td ><input type="checkbox" name="Class_05" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ echo '<td ><input type="checkbox" name="Class_06" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ echo '<td ><input type="checkbox" name="Class_07" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ echo '<td ><input type="checkbox" name="Class_08" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ echo '<td ><input type="checkbox" name="Class_09" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ echo '<td ><input type="checkbox" name="Class_10" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ echo '<td ><input type="checkbox" name="Class_11" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ echo '<td ><input type="checkbox" name="Class_12" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ echo '<td ><input type="checkbox" name="Class_13" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ echo '<td ><input type="checkbox" name="Class_14" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ echo '<td ><input type="checkbox" name="Class_15" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ echo '<td ><input type="checkbox" name="Class_16" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ echo '<td ><input type="checkbox" name="Class_17" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ echo '<td ><input type="checkbox" name="Class_18" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ echo '<td ><input type="checkbox" name="Class_19" value="checked" size="4" /></td>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ echo '<td ><input type="checkbox" name="Class_20" value="checked" size="4" /></td>'; }?>
      <td> <input type="checkbox" name="Ent_Paid" value="checked" size="10" /></td>
    </tr>
      <tr>
      <td colspan="100">BS Jumping
        <input type="submit" value="Add Entry" /></td>
  </tr
  ></table>
  </br>
  </br>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  
</form>
  
 <table  width="800" border="1" cellpadding="3" cellspacing="2">
     <th colspan="9" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
	if (!empty($row_ihcls['C10'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 <td ><?php
 if (!empty($row_ihcls['C11'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_11 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 <td ><?php
 if (!empty($row_ihcls['C12'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_12 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ;} ?></td>
 <td ><?php
 if (!empty($row_ihcls['C13'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_13 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ;} ?></td>
 <td ><?php
 if (!empty($row_ihcls['C14'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_14 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 <td ><?php
 if (!empty($row_ihcls['C15'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_15 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ;} ?></td>
 <td ><?php
 if (!empty($row_ihcls['C16'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_16 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ;} ?></td>
 <td ><?php
 if (!empty($row_ihcls['C17'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_17 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 <td ><?php
 if (!empty($row_ihcls['C18'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_18 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ;} ?></td>
 <td ><?php
 if (!empty($row_ihcls['C19'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_19 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 <td ><?php
 if (!empty($row_ihcls['C20'])){
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM BSJumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_20 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; }?></td>
 
<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM BSJumping WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>BS Jumpging </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Rider BS No. &nbsp;</th>
    <th >Horse Name &nbsp;</th>
    <th >Horse BS No. &nbsp;</th>
    <th >Horse Owner &nbsp;</th>
    <th> Notes </th>
    <th >H/P &nbsp;</th>
    <?php if (!empty($row_ihcls['C1'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C1'];echo'</th>'; }?>
  <?php if (!empty($row_ihcls['C2'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C2'];echo'</th>'; }?>       
  <?php if (!empty($row_ihcls['C3'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C3'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C4'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C4'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C5'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C5'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C6'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C6'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C7'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C7'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C8'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C8'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C9'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C9'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C10'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C10'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C11'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C11'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C12'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C12'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C13'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C13'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C14'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C14'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C15'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C15'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C16'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C16'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C17'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C17'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C18'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C18'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C19'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C19'];echo'</th>'; }?> 
  <?php if (!empty($row_ihcls['C20'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C20'];echo'</th>'; }?>
    <th >to Pay&nbsp;</th>
  </tr>
  <?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM BSJumping_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentBS.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_BS.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td nowrap><?php echo $row_Entries['Rider_ID']; ?></td>
      <td nowrap><?php echo $row_Entries['Rider_BS_Num']; ?></td>
      <td nowrap><?php echo $row_Entries['Horse_ID']; ?></td>
      <td nowrap><?php echo $row_Entries['Horse_BS_Num']; ?></td>
      <td nowrap><?php echo $row_Entries['Horse_BS_Owner']; ?></td>
      <td nowrap><?php echo $row_Entries['BS_Entry_Notes']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
	  echo '<td contenteditable="true"> <input name="entclass1" type="checkbox" title="';echo $row_ihcls['C1'];echo'"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
	  echo '<td contenteditable="true"> <input name="entclass2" type="checkbox" title="';echo $row_ihcls['C2'];echo'"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
	  echo '<td contenteditable="true"> <input name="entclass3" type="checkbox" title="';echo $row_ihcls['C3'];echo'"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
	  echo '<td contenteditable="true"> <input name="entclass4" type="checkbox" title="';echo $row_ihcls['C4'];echo'"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
	  echo '<td contenteditable="true"> <input name="entclass5" type="checkbox" title="';echo $row_ihcls['C5'];echo'"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
	  echo '<td contenteditable="true"> <input name="entclass6" type="checkbox" title="';echo $row_ihcls['C6'];echo'"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
	  echo '<td contenteditable="true"> <input name="entclass7" type="checkbox" title="';echo $row_ihcls['C7'];echo'"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
	  echo '<td contenteditable="true"> <input name="entclass8" type="checkbox" title="';echo $row_ihcls['C8'];echo'"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
	  echo '<td contenteditable="true"> <input name="entclass9" type="checkbox" title="';echo $row_ihcls['C9'];echo'"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
	  echo '<td contenteditable="true"> <input name="entclass10" type="checkbox" title="';echo $row_ihcls['C10'];echo'"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
	  echo '<td contenteditable="true"> <input name="entclass11" type="checkbox" title="';echo $row_ihcls['C11'];echo'"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
	  echo '<td contenteditable="true"> <input name="entclass12" type="checkbox" title="';echo $row_ihcls['C12'];echo'"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
	  echo '<td contenteditable="true"> <input name="entclass13" type="checkbox" title="';echo $row_ihcls['C13'];echo'"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
	  echo '<td contenteditable="true"> <input name="entclass14" type="checkbox" title="';echo $row_ihcls['C14'];echo'"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
	  echo '<td contenteditable="true"> <input name="entclass15" type="checkbox" title="';echo $row_ihcls['C15'];echo'"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
	  echo '<td contenteditable="true"> <input name="entclass16" type="checkbox" title="';echo $row_ihcls['C16'];echo'"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
	  echo '<td contenteditable="true"> <input name="entclass17" type="checkbox" title="';echo $row_ihcls['C17'];echo'"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
	  echo '<td contenteditable="true"> <input name="entclass18" type="checkbox" title="';echo $row_ihcls['C18'];echo'"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
	  echo '<td contenteditable="true"> <input name="entclass19" type="checkbox" title="';echo $row_ihcls['C19'];echo'"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
	  echo '<td contenteditable="true"> <input name="entclass20" type="checkbox" title="';echo $row_ihcls['C20'];echo'"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_BS.php" method="get">
        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>

<p>&nbsp;</p>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($Entries);

mysql_free_result($Show);

mysql_free_result($Rider);

mysql_free_result($Horse);
?>
