<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training Center EEPIS</title>
<style type="text/css">
body{ margin:0; padding:0; font-family:Verdana, Geneva, sans-serif; font-size:15px; background:#FFFFFF}
#container{ border:0px solid gray; width:950px; margin:auto; margin-top:20px; margin-bottom:20px; background:url(../style/images/bgtraining.png) no-repeat 50% 60%}
#header{	
	padding:0px 0px 5px 0px;
	border-bottom:4px solid  #666;
	color:#666666;
	font-size: 25px;
	font-weight:bold;
	margin: 0 auto;
}
#title{ border:0px solid gray; padding:25px 0px 0px 0px; font-size:30px; margin:0px 0px 0px 0px;  float:right; width:665px }
#content{ padding:20px; margin-top:10px;}
#print{ background:url(../style/images/printer.png) no-repeat 1px 0px ; width:0; padding:14px; border:0px solid gray; position:fixed; top:10px; right:30px; cursor:pointer}
#print:hover{ opacity:0.4}
</style>
</head>
<body>
<p id="print" onclick="window.print()"> </p>
<div id="container">
<div id="header">
<img src="../style/images/pens.png" width="80" height="80" style="margin-left:20px"/>
<p id="title">
Training Center EEPIS
</p>
</div>
<div id="content">
<?php
require_once "../js/function-date.php"; 
include "connect1.php";
if($_GET['print'])
{
$qry_det_agen=mysql_query("select * from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and tb_jadwal_training.id_jadwal_training=$_GET[print]");
$arr_det_agen=mysql_fetch_array($qry_det_agen);
if(mysql_num_rows($qry_det_agen)==0)
{echo "<script type='text/javascript'>window.close()</script>";}
else
{
echo "
<b>Title:</b><br>
<span style='font-size:22px;'>$arr_det_agen[judul_training]</span><br><br>
<b>Date:</b><br>";
echo hari(date("$arr_det_agen[tgl1]")).", ".tanggal(date("$arr_det_agen[tgl1]"))." s/d ".hari(date("$arr_det_agen[tgl2]")).", ".tanggal(date("$arr_det_agen[tgl2]")); 
echo "<br><br>
<b>Count Day:</b><br>
$arr_det_agen[jmlh_hari] day<br><br>
<b>Time:</b><br>
$arr_det_agen[jam_mulai] - $arr_det_agen[jam_selesai]<br><br>
<b>Duration:</b><br>
$arr_det_agen[durasi] hours<br><br>
<b>Certificate:</b><br>
$arr_det_agen[ket_sertifikat]<br><br>
<b>Participant minimal:</b><br>
$arr_det_agen[peserta_min] participant<br><br>
<b>Cost:</b><br>
";
$qry_det_agen_biaya=mysql_query("select * from tb_judul_jenis_peserta, tb_jenis_peserta where tb_judul_jenis_peserta.id_jenis_peserta=tb_jenis_peserta.id_jenis_peserta and id_judul=$arr_det_agen[id_judul]");
while($arr_det_agen_biaya=mysql_fetch_array($qry_det_agen_biaya))
{
$uang = number_format($arr_det_agen_biaya['biaya'],0,'','.');
echo "Rp $uang,00 - $arr_det_agen_biaya[jenis_peserta] ($arr_det_agen_biaya[ket])<br>";
}
echo "<br>
<b>Description:</b><br>
$arr_det_agen[ket]<br><br>
<b>Requirement:</b><br>";
	if ($arr_det_agen['syarat']=="")
	{echo "Empty";}
	else
	{ echo $arr_det_agen['syarat'];}
	}
echo "
<br><br>
<b>Contact Person:</b><br>
Martha (0859-7547-4476)
";
}
else
{echo "<script type='text/javascript'>window.close()</script>";}
?>
</div>
</div>
</body>
</html>