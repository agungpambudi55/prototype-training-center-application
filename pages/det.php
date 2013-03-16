<?php
if (@$_GET['t']=="" and @$_GET['a']=="")
{echo "<script type='text/javascript'>self.location='index.php';</script>";}
else
{?>
<style type="text/css">
#content{ min-height:300px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666; background:url(style/images/bgtraining.png) no-repeat 50% 50%}
#title{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1 }
#con_tent{ padding:20px; font-size:14px}
#con_tent ul{ margin:10px 0px 0px -15px; padding:0}
#con_tent ol{ margin:10px 0px 0px -10px; padding:0}
#con_tent li{ margin:0px 0px 0px 40px; padding:0}
#print{float:right; margin:0px 1px 0px 0px; width:0px; cursor:pointer; border:0px solid gray;background:url(style/images/printer.png) no-repeat; padding:13px}
#peserta_daftar{float:right; margin:0px 20px 0px 0px; width:0px; cursor:pointer; border:0px solid gray;background:url(style/images/pesdaf.png) no-repeat; padding:13px}
#print:hover,#peserta_daftar:hover{ opacity:0.5}
</style>
<div id="content">
<?php
require_once "js/function-date.php"; 
if(@$_GET['a'])
{
$qry_det_agen=mysql_query("select * from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and tb_jadwal_training.id_jadwal_training=$_GET[a]");
$arr_det_agen=mysql_fetch_array($qry_det_agen);
if(mysql_num_rows($qry_det_agen)==0)
{echo "<script type='text/javascript'>self.location='index.php';</script>";}
else
{
echo "
<p id='title'>Agenda</p>
<div id='con_tent'>"?>
<p id='print' onclick="window.open('pages/print.php?print=<?php echo $_GET['a']; ?>','asdfghjkl','height=500,width=980,left=140,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no, status=yes');"></p>
<p id='peserta_daftar' onclick="window.open('pages/pesdaf.php?i=<?php echo $_GET['a']; ?>','asdfghjkl','height=500,width=980,left=140,top=100,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no, status=yes');"></p>
<?php
echo "<b>Title:</b><br>
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
echo "Rp $uang,00 - $arr_det_agen_biaya[jenis_peserta]<br>";
}
echo "<br>
<b>Registrant:</b><br>";
$qry_pendaftar_dulu=mysql_query("select count(*) as jum_dulu from tb_jadwal_training, tb_pilih_judul, tb_kelas,tb_peserta_kelas where 
tb_jadwal_training.id_jadwal_training=tb_kelas.id_jadwal_training and 
tb_jadwal_training.id_judul= tb_pilih_judul.id_judul and 
tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and 
tb_pilih_judul.id_pilih_judul=tb_peserta_kelas.id_pilih_judul and
tb_jadwal_training.id_jadwal_training=$_GET[a]");
$arr_pendaftar_dulu=mysql_fetch_array($qry_pendaftar_dulu);
$qry_pendaftar_semua=mysql_query("select count(*) as jum_semua from tb_pilih_judul where id_judul=$arr_det_agen[id_judul]");
$arr_pendaftar_semua=mysql_fetch_array($qry_pendaftar_semua);
$pendaftar=$arr_pendaftar_semua['jum_semua'];
echo "
$pendaftar registrant<br><br>
<b>Status:</b><br>
";

$datenow	=date("Y/m/d");	
$tgl_mulai		=$arr_det_agen['tgl1'];
$tgl_selesai	=$arr_det_agen['tgl2'];
if($datenow>=$tgl_mulai && $datenow<=$tgl_selesai)
{
	echo "<font color='#FF0000'><b>Running</b></font>";
}
else
{echo "Not running";}

echo "<br><br>
<b>Description:</b><br>
$arr_det_agen[ket]<br><br>
<b>Requirement:</b><br>";
if ($arr_det_agen['syarat']=="")
{echo "Empty";}
else
{ echo $arr_det_agen['syarat'];}
echo "<br>
<div id='share_det'>
Share this agenda on :   
<a href='http://plus.google.com/share?url=http://www.tc.eepis-its.edu/index.php?page=det&a=$_GET[a]' class='gog' target='_blank'></a>
<a href='http://www.facebook.com/share.php?u=http://www.facebook.com/share.php?u=http://www.tc.eepis-its.edu/index.php?page=det&a=$_GET[a]' class='fb' target='_blank'></a>
<a href='http://twitter.com/share?url=http://www.tc.eepis-its.edu/index.php?page=det&a=$_GET[a]' class='tw' target='_blank'></a>
<a href='http://digg.com/submit?phase=2&url=http://www.tc.eepis-its.edu/index.php?page=det&a=$_GET[a]' class='digg' target='_blank'></a>
</div>
</div>
";
}
}
elseif($_GET['t'])
{
$qry_det_tra=mysql_query("select * from tb_judul where id_judul=$_GET[t]");
$arr_det_tra=mysql_fetch_array($qry_det_tra);
if(mysql_num_rows($qry_det_tra)==0)
{echo "<script type='text/javascript'>self.location='index.php';</script>";}
else
{
echo "
<p id='title'>Training</p>
<div id='con_tent'>
<b>Title:</b><br>
<span style='font-size:22px;'>
 $arr_det_tra[2]</span><br><br>
<b>Description:</b><br>
$arr_det_tra[6]<br><br>
<b>Requirement:</b><br>";
if ($arr_det_tra['7']=="")
{echo "Empty";}
else
{ echo $arr_det_tra['7'];}
echo "<br>
<div id='share_det'>
Share this training on :   
<a href='http://plus.google.com/share?url=http://www.tc.eepis-its.edu/index.php?page=det&t=$_GET[t]' class='gog' target='_blank'></a>
<a href='http://www.facebook.com/share.php?u=http://www.facebook.com/share.php?u=http://www.tc.eepis-its.edu/index.php?page=det&t=$_GET[t]' class='fb' target='_blank'></a>
<a href='http://twitter.com/share?url=http://www.tc.eepis-its.edu/index.php?page=det&t=$_GET[t]' class='tw' target='_blank'></a>
<a href='http://digg.com/submit?phase=2&url=http://www.tc.eepis-its.edu/index.php?page=det&t=$_GET[t]' class='digg' target='_blank'></a>
</div>
</div>
";
}
}
}
?>

</div>	
