<?php
include		("../admin_tc/config/define_connect.php");
$host		=HOST;
$user_name	=USER;
$password	=PASS;
$database	=DB_NAME;
$koneksi	=mysql_connect($host,$user_name,$password);
$cek		=mysql_select_db($database,$koneksi);
if($cek)
{
}
else
{
	echo $database;
	echo $host;
	echo $user_name;
	echo $password;
die ("Not connect database");
}
?>