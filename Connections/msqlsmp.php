<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
include_once('/var/www/html/smp/Includes/mysql2i.class.php');
$hostname_msqlsmp = "localhost";
$database_msqlsmp = "smpeshow";
$username_msqlsmp = "root";
$password_msqlsmp = "freddy1";
$msqlsmp = mysql_pconnect($hostname_msqlsmp, $username_msqlsmp, $password_msqlsmp) or trigger_error(mysql_error(),E_USER_ERROR); 
?>