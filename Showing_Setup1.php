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
  $insertSQL = sprintf("INSERT INTO fsih_entries (Show_ID, Rider_Num) VALUES (%s, %s)",
                       GetSQLValueString($_POST['Show_ID'], "int"),
                       GetSQLValueString($_POST['Show_ID'], "text"));

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
      <td width="33%" valign="bottom"><h1>Showing Class Setup </h1>&nbsp;</td>
 		<td width="33%"><td>
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
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
  <table border="1">
  
  
 <input type="hidden" name="Show_ID" value="<?= $show_id ?>"  size="3" />
<tr > <td  colspan="21"> In Hand Classes </td> </tr>
  
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
    <tr bgcolor="#B8B8B8">
     <td>Class Name </td>
      <td> 
      <select  class="service-small" name="clna1" />
 	<?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));
	   mysql_data_seek($ihccn, 0); ?> 
     </td>
     
      <td>
      <select  class="service-small" name="clna2" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));mysql_data_seek($ihccn, 0); ?> 
       </td>
       
      <td><select  class="service-small" name="clna3" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td><select  class="service-small" name="clna4" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td><select  class="service-small" name="clna5" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td><select  class="service-small" name="clna6" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td><select  class="service-small" name="clna7" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));mysql_data_seek($ihccn, 0); ?> &nbsp;</td>
      <td> <select  class="service-small" name="clna8" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> >&nbsp;</td>
      <td><select  class="service-small" name="clna9" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna10" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna11" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna12" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna13" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna14" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna15" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));mysql_data_seek($ihccn, 0); ?> &nbsp;</td>
      <td ><select  class="service-small" name="clna16" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna17" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));mysql_data_seek($ihccn, 0); ?> &nbsp;</td>
      <td ><select  class="service-small" name="clna18" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn));mysql_data_seek($ihccn, 0); ?> &nbsp;</td>
      <td ><select  class="service-small" name="clna19" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
      <td ><select  class="service-small" name="clna20" />
      <?php do { ?>
      	<option	class="service-small" value="<?php echo $row_ihccn['Class_Name'];?>"> <?php echo $row_ihccn['Class_Name'];?> </option>
       <?php } while ($row_ihccn = mysql_fetch_assoc($ihccn)); mysql_data_seek($ihccn, 0);?> &nbsp;</td>
    </tr>
    
      <tr>
       
      <td></td>
  </tr
  ></table>
  <p>
  <input type="submit" value="Add Entry" />
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
        <input name="entclass1" type="checkbox" <?php echo $row_Entries['Class_01']; ?>/> 
        </td>
      <td contenteditable="true">
        <input name="entclass2" type="checkbox" <?php echo $row_Entries['Class_02']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass3" type="checkbox" <?php echo $row_Entries['Class_03']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass4" type="checkbox" <?php echo $row_Entries['Class_04']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass5" type="checkbox" <?php echo $row_Entries['Class_05']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass6" type="checkbox" <?php echo $row_Entries['Class_06']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass7" type="checkbox" <?php echo $row_Entries['Class_07']; ?>/>
      </td>
      <td id="Class_08:<?php echo $row_Entries['id'];?>"contenteditable="true">
        <input name="entclass8" type="checkbox" <?php echo $row_Entries['Class_08']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass9" type="checkbox" <?php echo $row_Entries['Class_09']; ?>/>
      </td>
      <td contenteditable="true">
        <input name="entclass10" type="checkbox" <?php echo $row_Entries['Class_10']; ?>/>
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
