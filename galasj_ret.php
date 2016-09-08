<?php require_once('Connections/msqlsmp.php'); 
$show_id=$_GET['s'];
$funshow=$_GET['f'];
?>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>
<!doctype html>
<html>
<head>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='galasj_ret.php?s=<?php echo $show_id;?>&f=<?php echo $funshow ;?>'">
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
 <table  width="80%" border="1">
     <th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'
						AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 


<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM cashjumping WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>Cash Jumpging </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
$query_Entries = "SELECT * FROM cash_jumping_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>

  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentfcj.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
            <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_fcj.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
	  echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
	  echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
	  echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
	  echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
	  echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
	  echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
	  echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
	  echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
	  echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
	  echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
	  echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
	  echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
	  echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
	  echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
	  echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
	  echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
	  echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
	  echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
	  echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
	  echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_cj.php" method="get">
      <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
       <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>

<br>
<br>
<table  width="80%" border="1">

     <th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_11 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_12 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_13 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
<td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_14 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_15 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_16 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_17 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_18 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM ih_entries WHERE Show_ID = '".$show_id."'
            AND Class_19 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 

<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM ihshowing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>IN HAND </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
$query_Entries = "SELECT * FROM ih_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentih.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
           <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_IH.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
	  echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
	  echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
	  echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
	  echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
	  echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
	  echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
	  echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
	  echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
	  echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
	  echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
	  echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
	  echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
	  echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
	  echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
	  echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
	  echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
	  echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
	  echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
	  echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
	  echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_IH.php" method="get">
                 <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />

        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<br>
<br>
<table  width="80%" border="1">

     <th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_11 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_12 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_13 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
<td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_14 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
<td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_15 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_16 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_17 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_18 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td><td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM rd_entries WHERE Show_ID = '".$show_id."'
            AND Class_19 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>



<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM rdshowing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>RIDDEN </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
  <?php if (!empty($row_ihcls['C21'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C21'];echo'</th>'; }?>
    <th >to Pay&nbsp;</th>
  </tr>
  <?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM rd_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentrd.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
           <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_RD.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
	  echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
	  echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
	  echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
	  echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
	  echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
	  echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
	  echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
	  echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
	  echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
	  echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
	  echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
	  echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
	  echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
	  echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
	  echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
	  echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
	  echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
	  echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
	  echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
	  echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
   <?php if (!empty($row_ihcls['C21'])){ 
	  echo '<td contenteditable="true"> <input name="entclass21" type="checkbox"'; echo $row_Entries['Class_21'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_IH.php" method="get">
                 <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />

        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<br>
<br>
<table  width="80%" border="1">

<th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM wh_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>



<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM whshowing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>Working Hunter </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
$query_Entries = "SELECT * FROM wh_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentwh.php" method="get">
      		<input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
           <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      		<input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_wh.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
	  echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
	  echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
	  echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
	  echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
	  echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
	  echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
	  echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
	  echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
	  echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
	  echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
	  echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
	  echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
	  echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
	  echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
	  echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
	  echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
	  echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
	  echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
	  echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
	  echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
	  {
	  echo "#f10000" ;
	  } 
	  ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_IH.php" method="get">
                 <input type="Hidden" name="funshow" value="<?php echo $funshow ;?>" />

        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>

<br>
<br>
<?php
  if ($funshow != "y"){
?>

<table  width="80%" border="1">

<th colspan="5" align="right">Number in Class:</th>
  
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_11 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_12 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_13 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM u16_entries WHERE Show_ID = '".$show_id."'
            AND Class_14 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>



<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM u16showing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
 <tr>
  <th>Under 16s </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
  <?php if (!empty($row_ihcls['C21'])){ echo '<th nowrap="nowrap" width="30" >';echo $row_ihcls['C21'];echo'</th>'; }?>
    <th >to Pay&nbsp;</th>
  </tr>
  <?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT * FROM u16_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentu16.php" method="get">
          <input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
          <input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_u16.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
    echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
    echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
    echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
    echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
    echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
    echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
    echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
    echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
    echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
    echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
    echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
    echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
    echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
    echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
    echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
    echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
    echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
    echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
    echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
    echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
    {
    echo "#f10000" ;
    } 
    ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_u16.php" method="get">
        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<br>
<br>
<table  width="80%" border="1">

<th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM nov_entries WHERE Show_ID = '".$show_id."'
            AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>

<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM novshowing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>Novelty Showing </th>
    <th >Rider No &nbsp;</th>
    <th >Rider Name &nbsp;</th>
    <th >Horse Name &nbsp;</th>
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
$query_Entries = "SELECT * FROM nov_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentnov.php" method="get">
          <input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
          <input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_nov.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
    echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
    echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
    echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
    echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
    echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
    echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
    echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
    echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
    echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
    echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
    echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
    echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
    echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
    echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
    echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
    echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
    echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
    echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
    echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
    echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
    {
    echo "#f10000" ;
    } 
    ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_nov.php" method="get">
        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<br>
<br>
<table  width="80%" border="1">

<th colspan="5" align="right">Number in Class:</th>
    
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_01 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?>
</td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_02 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_03 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_04 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_05 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
    <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_06 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_07 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_08 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_09 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_10 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_11 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_12 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_13 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_14 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_15 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_16 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_17 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>
 <td ><?php
  mysql_select_db($database_msqlsmp, $msqlsmp);
$query_Entries = "SELECT COUNT(*) FROM dog_entries WHERE Show_ID = '".$show_id."'
            AND Class_18 = 'checked' ";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$classentno = mysql_result($Entries,0);
$totalRows_Entries = mysql_num_rows($Entries); 
 echo $classentno ; ?></td>

<?PHP
mysql_select_db($database_msqlsmp, $msqlsmp);
$query_ihcls = "SELECT * FROM dogshowing WHERE Show_id = '".$show_id."'";
$ihcls = mysql_query($query_ihcls, $msqlsmp) or die(mysql_error());
$row_ihcls = mysql_fetch_array($ihcls);
$totalRows_ihcls = mysql_num_rows($ihcls);
?>
  <tr>
  <th>Dog Showing </th>
    <th >Entry No &nbsp;</th>
    <th >Owners Name &nbsp;</th>
    <th >Dogs Name &nbsp;</th>
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
$query_Entries = "SELECT * FROM dog_entries WHERE Show_ID = '".$show_id."'";
$Entries = mysql_query($query_Entries, $msqlsmp) or die(mysql_error());
$row_Entries = mysql_fetch_assoc($Entries);
$totalRows_Entries = mysql_num_rows($Entries); ?>
  <?php do {
  ?>
  
      <tr>
      <td bgcolor="#8D1100"> <form id="del" action="delentdog.php" method="get">
          <input type="hidden" name="entrowid" value="<?php echo $row_Entries['id'];?>" />
            <input type="hidden" name="showdelid" value="<?php echo $show_id ;?>" />
          <input id="delsub" type="submit"  onclick="clicked()" value="DELETE" />
            </form>
      <form action="update_entry_dog.php" method="get">
      <input type="hidden" name="showid" value="<?php echo $show_id ; ?>" />
      <input type="hidden" name="entid" value="<?php echo $row_Entries['id'];?>" />
      <td ><?php echo $row_Entries['Rider_Num']; ?></td>
      <td><?php echo $row_Entries['Rider_ID']; ?></td>
      <td ><?php echo $row_Entries['Horse_ID']; ?></td>
      <td><?php echo $row_Entries['Horse_Pony']; ?></td>      
      <?php if (!empty($row_ihcls['C1'])){ 
    echo '<td contenteditable="true"> <input name="entclass1" type="checkbox"'; echo $row_Entries['Class_01'] ; echo '/> </td>'; }?>    
      <?php if (!empty($row_ihcls['C2'])){ 
    echo '<td contenteditable="true"> <input name="entclass2" type="checkbox"'; echo $row_Entries['Class_02'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C3'])){ 
    echo '<td contenteditable="true"> <input name="entclass3" type="checkbox"'; echo $row_Entries['Class_03'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C4'])){ 
    echo '<td contenteditable="true"> <input name="entclass4" type="checkbox"'; echo $row_Entries['Class_04'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C5'])){ 
    echo '<td contenteditable="true"> <input name="entclass5" type="checkbox"'; echo $row_Entries['Class_05'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C6'])){ 
    echo '<td contenteditable="true"> <input name="entclass6" type="checkbox"'; echo $row_Entries['Class_06'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C7'])){ 
    echo '<td contenteditable="true"> <input name="entclass7" type="checkbox"'; echo $row_Entries['Class_07'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C8'])){ 
    echo '<td contenteditable="true"> <input name="entclass8" type="checkbox"'; echo $row_Entries['Class_08'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C9'])){ 
    echo '<td contenteditable="true"> <input name="entclass9" type="checkbox"'; echo $row_Entries['Class_09'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C10'])){ 
    echo '<td contenteditable="true"> <input name="entclass10" type="checkbox"'; echo $row_Entries['Class_10'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C11'])){ 
    echo '<td contenteditable="true"> <input name="entclass11" type="checkbox"'; echo $row_Entries['Class_11'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C12'])){ 
    echo '<td contenteditable="true"> <input name="entclass12" type="checkbox"'; echo $row_Entries['Class_12'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C13'])){ 
    echo '<td contenteditable="true"> <input name="entclass13" type="checkbox"'; echo $row_Entries['Class_13'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C14'])){ 
    echo '<td contenteditable="true"> <input name="entclass14" type="checkbox"'; echo $row_Entries['Class_14'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C15'])){ 
    echo '<td contenteditable="true"> <input name="entclass15" type="checkbox"'; echo $row_Entries['Class_15'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C16'])){ 
    echo '<td contenteditable="true"> <input name="entclass16" type="checkbox"'; echo $row_Entries['Class_16'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C17'])){ 
    echo '<td contenteditable="true"> <input name="entclass17" type="checkbox"'; echo $row_Entries['Class_17'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C18'])){ 
    echo '<td contenteditable="true"> <input name="entclass18" type="checkbox"'; echo $row_Entries['Class_18'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C19'])){ 
    echo '<td contenteditable="true"> <input name="entclass19" type="checkbox"'; echo $row_Entries['Class_19'] ; echo '/>'; }?>
      <?php if (!empty($row_ihcls['C20'])){ 
    echo '<td contenteditable="true"> <input name="entclass20" type="checkbox"'; echo $row_Entries['Class_20'] ; echo '/>'; }?>
    </td>
    
     
      <td contenteditable="true" bgcolor="<?php if ($row_Entries['Ent_Paid']=='checked')
    {
    echo "#f10000" ;
    } 
    ?>" >
        <input name="entpaid" type="checkbox" <?php echo $row_Entries['Ent_Paid']; ?>/>
      </td>
      <td>
      
      <form action="update_entry_dog.php" method="get">
        <Input type="submit"  Value="Update" /> 
        </form></td>
    </tr>   
   
    <?php } while ($row_Entries = mysql_fetch_assoc($Entries)); ?>
</table>
<?php
};
?>
<body>
</body>
</html>