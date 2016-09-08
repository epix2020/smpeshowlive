<!doctype html>
<?php
$DBH = '';
$host = "localhost";
$dbname = "smpeshow";
$user = "root";
$pass = "freddy1"

?>
<?php 
	try {
	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass, array(PDO::ATTR_PERSISTENT => true));
	}
catch(PDOException $e) {
    echo $e->getMessage();
	}
 ?>
<?php

	$STH = $DBH->query('SELECT * from riders');
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $STH->fetch()) {
    echo $row['id'] . "\n";
    echo $row['Rider_Name'] . "\n";
    
}
 

?>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>