<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<?php 
		$show_id=$_GET['s'];
		$funshow=$_GET['f'];
	?> 
<body>
<iframe id="ihentries" src="Add_Entries_Fun_Jumping.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_In_Hand.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Ridden.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Hunter.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<?php
	if ($funshow != "y"){
?>
<iframe id="ihentries" src="Add_Entries_U16.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Novelty.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Dog.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<?php
	};
?>
<iframe id="ihentries" src="galasj_ret.php?s=<?php echo $show_id ;?>&f=<?php echo $funshow ;?>" width="90%" height="20000"> </iframe>



</body>
</html>