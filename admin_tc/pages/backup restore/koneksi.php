<?php
include		("../../config/define_connect.php");
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
echo "Koneksi Gagal";
}
?>