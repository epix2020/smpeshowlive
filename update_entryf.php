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
$entclass1=$_GET["entclass1"];
$entclass2=$_GET["entclass2"];
$entclass3=$_GET["entclass3"];
$entclass4=$_GET["entclass4"];
$entclass5=$_GET["entclass5"];
$entclass6=$_GET["entclass6"];
$entclass7=$_GET["entclass7"];
$entclass8=$_GET["entclass8"];
$entclass9=$_GET["entclass9"];
$entclass10=$_GET["entclass10"];
$entpaid=$_GET["entpaid"];


echo $entid ;
echo $entclass1 ;
echo $entclass2 ;
echo $entclass3 ;
echo $entclass4 ;
echo $entclass5 ;
echo $entclass6 ;
echo $entclass7 ;
echo $entclass8 ;
echo $entclass9 ;
echo $entclass10 ;

if ($entclass1=="on"){
$entclass1="checked";
}

if ($entclass2=="on"){
$entclass2="checked";
}
if ($entclass3=="on"){
$entclass3="checked";
}
if ($entclass4=="on"){
$entclass4="checked";
}
if ($entclass5=="on"){
$entclass5="checked";
}
if ($entclass6=="on"){
$entclass6="checked";
}
if ($entclass7=="on"){
$entclass7="checked";
}
if ($entclass8=="on"){
$entclass8="checked";
}
if ($entclass9=="on"){
$entclass9="checked";
}
if ($entclass10=="on"){
$entclass10="checked";
}
if ($entpaid=="on"){
$entpaid="checked";
}
echo $entid ;
echo $entclass1 ;
echo $entclass2 ;
echo $entclass3 ;
echo $entclass4 ;
echo $entclass5 ;
echo $entclass6 ;
echo $entclass7 ;
echo $entclass8 ;
echo $entclass9 ;
echo $entclass10 ;
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

    $sql = "UPDATE sj_entries SET Class_01='$entclass1',Class_02='$entclass2',Class_03='$entclass3',Class_04='$entclass4',Class_05='$entclass5',Class_06='$entclass6',Class_07='$entclass7',Class_08='$entclass8',Class_09='$entclass9',Class_10='$entclass10',Ent_Paid='$entpaid'
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
         parent.document.location.href = "funshowadd.php?s=<?php echo $showid ;?>"
        </script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
