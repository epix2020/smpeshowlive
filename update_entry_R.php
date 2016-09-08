<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<h1>Updating entry</h1>
<?php 
$entid=$_GET["entid"];
$showid=$_GET["showid"];
$entclass11=$_GET["entclass11"];
$entclass12=$_GET["entclass12"];
$entclass13=$_GET["entclass13"];
$entclass14=$_GET["entclass14"];
$entclass15=$_GET["entclass15"];
$entclass16=$_GET["entclass16"];
$entclass17=$_GET["entclass17"];
$entclass18=$_GET["entclass18"];
$entclass19=$_GET["entclass19"];
$entclass20=$_GET["entclass20"];
$entclass21=$_GET["entclass21"];
$entpaid=$_GET["entpaid"];


echo $entid ;
echo $entclass11 ;
echo $entclass12 ;
echo $entclass13 ;
echo $entclass14 ;
echo $entclass15 ;
echo $entclass16 ;
echo $entclass17 ;
echo $entclass18 ;
echo $entclass19 ;
echo $entclass20 ;
echo $entclass21 ;

if ($entclass11=="on"){
$entclass11="checked";
}

if ($entclass12=="on"){
$entclass12="checked";
}
if ($entclass13=="on"){
$entclass13="checked";
}
if ($entclass14=="on"){
$entclass14="checked";
}
if ($entclass15=="on"){
$entclass15="checked";
}
if ($entclass16=="on"){
$entclass16="checked";
}
if ($entclass17=="on"){
$entclass17="checked";
}
if ($entclass18=="on"){
$entclass18="checked";
}
if ($entclass19=="on"){
$entclass19="checked";
}
if ($entclass20=="on"){
$entclass20="checked";
}
if ($entclass21=="on")
{
$entclass21="checked";
}
if ($entpaid=="on"){
$entpaid="checked";
}
echo $entid ;
echo $entclass11 ;
echo $entclass12 ;
echo $entclass13 ;
echo $entclass14 ;
echo $entclass15 ;
echo $entclass16 ;
echo $entclass17 ;
echo $entclass18 ;
echo $entclass19 ;
echo $entclass20 ;
echo $entclass21 ;
?>
<?php require_once('Connections/msqlsmp.php'); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "freddy1";
$dbname = "smpeshow";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE sih_entries SET Class_11='$entclass11',Class_12='$entclass12',Class_13='$entclass13',Class_14='$entclass14',Class_15='$entclass15',Class_16='$entclass16',Class_17='$entclass17',Class_18='$entclass18',Class_19='$entclass19',Class_20='$entclass20',Class_21='$entclass21',Ent_Paid='$entpaid'
	WHERE id='$entid'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>

?>

<script type="text/javascript">
         window.location.href = "Add_Entries_InHand.php?s=<?php echo $showid ;?>"
        </script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
