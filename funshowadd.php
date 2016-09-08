<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<?php $show_id=$_GET['s'];?> 
<body>
<iframe id="ihentries" src="Add_Entries_Fun_Jumping.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_In_Hand.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Ridden.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="Add_Entries_Hunter.php?s=<?php echo $show_id ;?>" width="90%" height="200"> </iframe>
<iframe id="ihentries" src="funsj_ret.php?s=<?php echo $show_id ;?>" width="90%" height="20000"> </iframe>



</body>
</html>