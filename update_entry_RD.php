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
$funshow=$_GET["funshow"];
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

    $sql = "UPDATE rd_entries SET Class_01='$entclass1', Class_02='$entclass2', Class_03='$entclass3', Class_04='$entclass4', Class_05='$entclass5', Class_06='$entclass6', Class_07='$entclass7', Class_08='$entclass8', Class_09='$entclass9', Class_10='$entclass10',Class_11='$entclass11',Class_12='$entclass12',Class_13='$entclass13',Class_14='$entclass14',Class_15='$entclass15',Class_16='$entclass16',Class_17='$entclass17',Class_18='$entclass18',Class_19='$entclass19',Class_20='$entclass20',Ent_Paid='$entpaid'
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
       parent.document.location.href = "galashowadd.php?s=<?php echo $showid ;?>&f=<?php echo $funshow ; ?>"
        </script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
