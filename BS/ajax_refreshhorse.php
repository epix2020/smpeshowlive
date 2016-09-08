<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=smpeshow', 'root', 'freddy1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM horses WHERE Horse_Name LIKE (:keyword) ORDER BY Horse_Name ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$Horse_Name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['Horse_Name']);
	// add new option
    echo '<li onclick="set_itemhorse(\''.str_replace("'", "\'", $rs['Horse_Name']).'\')">'.$Horse_Name.'</li>';
}
?>