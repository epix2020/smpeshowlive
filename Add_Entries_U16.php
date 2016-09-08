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

echo $Class_11;
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO u16_entries (Show_ID, Rider_Num, Rider_ID, Horse_ID, Horse_Pony, Class_01, Class_02, Class_03, Class_04, Class_05, Class_06, Class_07, Class_08, Class_09, Class_10, Class_11, Class_12, Class_13, Class_14, Class_15, Class_16, Class_17, Class_18, Class_19, Class_20, Ent_Paid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
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
					   GetSQLValueString($_POST['Ent_Paid'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  $insertSQL = sprintf("INSERT IGNORE INTO riders (Rider_Name) VALUES (%s)",
                       GetSQLValueString($_POST['Rider_ID'], "text"));
				   
					   echo '1';

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
  
  $insertSQL = sprintf("INSERT IGNORE INTO horses (Horse_Name) VALUES (%s)",
                       GetSQLValueString($_POST['Horse_ID'], "text"));
					   echo '2';

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
}



mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM u16_entries WHERE Show_ID = '".$show_id."'";
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

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM u16showing WHERE Show_id = '".$show_id."'";
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

<table width="100%" border="0">
			<tr>
          
      <td width="100%"><form id="ad_ent" name="jsheet" method="Post" action="Juding_Sheet_U16.php?s=<?php echo $show_id; ?>" target="_blank">
      <select name="classnum">
      <?php if (!empty($row_ihcls['C1'])){ echo '<option value="Class_01"> Class ';echo $row_ihcls['C1']; echo '</option>';}?>
      <?php if (!empty($row_ihcls['C2'])){ echo '<option value="Class_02"> Class ';echo $row_ihcls['C2']; echo '</option>';}?>
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
            <input type="submit" value="Generate Judge's Sheet"> 
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
  <th>Horse Name:</th>
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
      <td colspan="100">Under 16's
        <input type="submit" value="Add Entry" /></td>
  </tr
  ></table>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  <p>&nbsp;</p>
</form>
  

<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Entries);

mysql_free_result($Show);

mysql_free_result($Rider);

mysql_free_result($Horse);
?>
