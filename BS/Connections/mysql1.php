<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mysql1 = "localhost";
$database_mysql1 = "sytist-epix";
$username_mysql1 = "root";
$password_mysql1 = "freddy1";
$mysql1 = mysql_pconnect($hostname_mysql1, $username_mysql1, $password_mysql1) or trigger_error(mysql_error(),E_USER_ERROR); 
?>