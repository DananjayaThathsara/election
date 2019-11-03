<?php
error_reporting(0);
$host = "localhost";//hostname
$user = "root";//server user
$password = "";//server pass
$dbname = "president_election";

$link = mysql_connect($host, $user, $password) or die("cannot connect");
mysql_set_charset('utf8', $link);
mysql_select_db($dbname) or die("cannot select database");


?>