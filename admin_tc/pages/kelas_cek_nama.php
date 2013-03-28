<?php
session_start();
include("connect.php");
require_once "ceklogin.php";
?>
<?php
$input = $_GET['input'];
$sql=mysql_query("select *from tb_kelas where nama_kelas='$input'");
if($m=mysql_fetch_array($sql))
{
echo "<font color='#FF0000'><b>Nama Kelas sudah di pakai!</b></font>";
}

?>