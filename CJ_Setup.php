
<?php  require_once('Connections/msqlsmp.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO cashjumping (Show_id, C1, C2, C3, C4, C5, C6, C7, C8, C9, C10, C11, C12, C13, C14, C15, C16, C17, C18, C19, C20) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Show_ID'], "text"),
                       GetSQLValueString($_POST['clnum1'], "text"),
                       GetSQLValueString($_POST['clnum2'], "text"),
                       GetSQLValueString($_POST['clnum3'], "text"),
                       GetSQLValueString($_POST['clnum4'], "text"),
                       GetSQLValueString($_POST['clnum5'], "text"),
                       GetSQLValueString($_POST['clnum6'], "text"),
                       GetSQLValueString($_POST['clnum7'], "text"),
                       GetSQLValueString($_POST['clnum8'], "text"),
                       GetSQLValueString($_POST['clnum9'], "text"),
                       GetSQLValueString($_POST['clnum10'], "text"),
                       GetSQLValueString($_POST['clnum11'], "text"),
                       GetSQLValueString($_POST['clnum12'], "text"),
                       GetSQLValueString($_POST['clnum13'], "text"),
                       GetSQLValueString($_POST['clnum14'], "text"),
                       GetSQLValueString($_POST['clnum15'], "text"),
                       GetSQLValueString($_POST['clnum16'], "text"),
                       GetSQLValueString($_POST['clnum17'], "text"),
                       GetSQLValueString($_POST['clnum18'], "text"),
                       GetSQLValueString($_POST['clnum19'], "text"),
                       GetSQLValueString($_POST['clnum20'], "text"));

  mysql_select_db($database_msqlsmp, $msqlsmp);
  $Result1 = mysql_query($insertSQL, $msqlsmp) or die(mysql_error());
 
}
?>
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
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Show = "SELECT * FROM shows WHERE id = '".$show_id."'";
$Show = mysql_query($query_Show, $msqlsmp) or die(mysql_error());
$row_Show = mysql_fetch_assoc($Show);
$totalRows_Show = mysql_num_rows($Show);

mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihccn = "SELECT * FROM ihclassnames";
$ihccn = mysql_query($query_ihccn, $msqlsmp) or die(mysql_error());
$row_ihccn = mysql_fetch_array($ihccn);
$totalRows_ihccn = mysql_num_rows($ihccn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
<style>
.styled-select {
    overflow: hidden;
    height: 74px;
    float: left;
    width: 365px;
    margin-right: 10px;
    
}

.styled-select select {
    font-size: 10px;
    border-radius: 0;
    border: none;
    background: transparent;
    width: 280px;
    overflow: hidden;
    padding-top: 15px;
    height: 70px;
    text-indent: 10px;
    color: #ffffff;
    -webkit-appearance: button;
	text-overflow:ellipsis;
}

.styled-select option.service-small {
    font-size: 4px;
    padding: 5px;
    background: #5c5c5c;
	-webkit-appearance: button;
	text-overflow:ellipsis;
}

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
	font-size:10px;
	width:25px;
}

</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Showing Setup : <?php echo $row_Show['Show_Name'];?> : <?php echo date("d/m/Y",strtotime($row_Show['Show_Date'])); ?></title>
</head>

<body bgcolor="#6D8B80">


<div class="background">
<div class="transbox">
<h1>&nbsp; </h1>
<table width="100%" border="0">
			<tr>
            <td width="33%" align="left" valign="bottom"><img src="images/e-show.png" alt="" width="200" height="100" align="left" /> SMP Events &nbsp;</td>
      <td width="33%" valign="bottom"><h1>Cash Jumping Class Setup </h1>&nbsp;</td>
 		<td width="33%"><td>
  </tr>
  </tbody>
</table>
  <tbody>
    <tr>
      <td>



<table class="tabe1" width="800" Border="1">
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
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <table border="1">  
 <input type="hidden" name="Show_ID" value="<?= $show_id ?>"  size="3" />
<tr > <td  colspan="21"> Cash Jumping Classes </td> </tr>
  
  <tr bgcolor="#B8B8B8">
  	<td> Class Num:	</td>
      <td><input  type="text" name="clnum1"  size="3"/> &nbsp;</td>
      <td><input  type="text" name="clnum2" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum3" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum4" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum5" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum6" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum7" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum8" size="3" /> &nbsp;</td>
      <td><input  type="text" name="clnum9" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum10" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum11" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum12" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum13" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum14" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum15" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum16" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum17" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum18" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum19" size="3" /> &nbsp;</td>
      <td ><input  type="text" name="clnum20" size="3" /> &nbsp;</td>
      </tr>

  <tr>
      <td colspan="21">
      <input type="submit" value="Add Show" />
      </td>
      </tr>

    
      </table>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
  </p>
  <p>&nbsp;</p>
 
    
      </table>


 

<p>&nbsp;</p>
</body>
</html>

