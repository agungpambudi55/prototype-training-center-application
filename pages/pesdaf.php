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
#content{ padding:20px; margin-top:10px; min-height:320px;}
#print{ background:url(../style/images/printer.png) no-repeat 1px 0px ; width:0; padding:14px; border:0px solid gray; position:fixed; top:10px; right:30px; cursor:pointer}
#print:hover{ opacity:0.4}
ol{ margin:0px 0px 0px 30px ; padding:0;}
li{}
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
include "connect1.php";
if($_GET['i']=="")
{echo "<script type='text/javascript'>window.close()</script>";}
else
{
$qry_kls=mysql_query("select tb_kelas.id_kelas,tb_kelas.nama_kelas, tb_judul.judul_training, tb_kelas.id_instruktur, tb_kelas.id_tempat from tb_judul, tb_kelas, tb_jadwal_training where tb_kelas.id_jadwal_training= tb_jadwal_training.id_jadwal_training and tb_judul.id_judul=tb_jadwal_training.id_judul and tb_jadwal_training.id_jadwal_training=$_GET[i]");
if(mysql_num_rows($qry_kls)=="")
{ echo "Empty";}
else
{
$qry_xxx=mysql_query("select tb_judul.judul_training from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and id_jadwal_training=$_GET[i]");
$arr_xxx=mysql_fetch_array($qry_xxx);
echo "<b>Title:</b><br>".$arr_xxx['0']."<br><br>";
while($arr_kls=mysql_fetch_array($qry_kls))
{
$qry_tmp=mysql_query("select nama_tempat from tb_tempat where id_tempat=$arr_kls[4]");
$arr_tmp=mysql_fetch_array($qry_tmp);
echo "<b>Place:</b><br>$arr_tmp[0]<br><br><b>Class:</b><br>$arr_kls[1]<br><br><b>Participant:</b><br>";
echo "<ol>";
$qry_pes=mysql_query("select tb_daftar_peserta.nama from tb_jadwal_training, tb_pilih_judul, tb_kelas,tb_peserta_kelas, tb_daftar_peserta where 
tb_daftar_peserta.no_peserta=tb_peserta_kelas.no_peserta and
tb_daftar_peserta.no_peserta=tb_pilih_judul.no_peserta and
tb_jadwal_training.id_jadwal_training=tb_kelas.id_jadwal_training and 
tb_jadwal_training.id_judul= tb_pilih_judul.id_judul and 
tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and 
tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul and
tb_jadwal_training.id_jadwal_training=$_GET[i] and tb_kelas.id_kelas=$arr_kls[0] order by tb_daftar_peserta.nama asc");	
while($arr_pes=mysql_fetch_array($qry_pes))
{
echo "<li>".$arr_pes['0']."</li>";
}
echo "</ol><br>";
$qry_ins=mysql_query("select nama from tb_instruktur where id_instruktur=$arr_kls[3]");
$arr_ins=mysql_fetch_array($qry_ins);
echo "<b>Instructor:</b><br>$arr_ins[0]<br><br><br>";
}	
}
}
?>
</div>
</div>
</body>
</html>