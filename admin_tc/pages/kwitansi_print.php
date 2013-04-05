<?php
session_start();
if(empty($_SESSION['user_name']))
{header('location:login.php');}
?>
<title>Print Kwitansi</title>
<style type="text/css">
#print{ background:url(../style/images/printer.png) no-repeat 1px 0px ; width:0; padding:14px; border:0px solid gray; position:fixed; top:10px; right:50%; cursor:pointer;}
#print:hover{ opacity:0.5}
*{ margin:0; padding:0; font-family:Verdana, Geneva, sans-serif; font-size:14px}
#box{ border:2px solid gray; margin:40px 100px 0px 100px}
#head{ border:0px solid gray; height:85px; padding:5px 10px 0px 20px}
#logo{width:80px; height:85px; float:left;border:0px solid gray}
#about{ border:0px solid gray; float:right; height:85px; width:500px; text-align:right; line-height:14px; font-size:12px}
#kwitansi{ padding:0px 0px 0px 0px;border: 0px solid gray; font-size:18px; font-weight:bold; font-family:Georgia, "Times New Roman", Times, serif; text-align:center}
#no_k{ border:0px solid gray; padding:5px 0px 0px 15px;}
#cont{ border:0px solid gray; text-align:left; padding:5px 0px 0px 15px}
#jud{ border:0px solid gray; width:180px; padding:1px 0px}
#jud1{ border:0px solid gray;margin:-22px 0px 0px 182px;padding:1px 0px}
#foot{ border: 0px solid gray; height:115px; padding:20px 0px 0px 0px }
#harga{ border:2px solid gray; width:200px; padding:10px 0px; text-align:center; position:absolute; margin:20px 0px 0px 150px}
#nb{ border:0px solid gray;  padding:0px 0px; text-align:center; position:absolute; margin:80px 0px 0px 15px; font-size:10px}
#ttd{border:0px solid gray;  padding:0px 0px; text-align:center; margin:0px 120px 0px 0px; float:right; line-height:22px;}
</style>
<?php
include "connect.php";
include "../config/konversiteksnenghuruf.php";
require_once "../config/fungsi.php";
$no_kuitansi=$_GET['i'];
$sql=mysql_query("
SELECT *
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$no_kuitansi'");
$view	=mysql_fetch_array($sql);
$sql_1=mysql_query("
SELECT *
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$no_kuitansi'");

?>

<?php
$sql_biaya=mysql_query("SELECT *
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$no_kuitansi'");

$sql_jumlah=mysql_query("SELECT sum(biaya) as biaya
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$no_kuitansi'");
$jumlah=mysql_fetch_array($sql_jumlah);

$sql1=mysql_query("select distinct(tb_daftar_peserta.no_peserta),nama,no_kuitansi,discount from tb_daftar_peserta,tb_kuitansi where tb_daftar_peserta.no_peserta=tb_kuitansi.no_peserta and tb_kuitansi.no_kuitansi='$no_kuitansi'");
$nama=mysql_fetch_array($sql1);
$no_peserta=$nama['0'];

$pelatihan=mysql_query("
SELECT *
FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta, tb_detail_pelatihan
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul = tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta
AND tb_detail_pelatihan.id_details_pelatihan = tb_judul.id_details_pelatihan
AND tb_daftar_peserta.no_peserta = '$no_peserta'");
$arr_pelatihan=mysql_fetch_array($pelatihan);
$view=mysql_fetch_array($sql);

$query_biaya_total=mysql_query("SELECT sum(biaya) as biaya
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$no_kuitansi'");
	$row_biaya=mysql_fetch_array($query_biaya_total);
	$biaya_tr	=$row_biaya['biaya'];
	$discount	=$nama['discount'];
	$kueri		=$biaya_tr * $discount / 100;
	$y			=$biaya_tr - $kueri;
	$oConver = new classConversi();
	$titik = number_format($y,0,'','.');
	$cangka = $oConver->conversiAngka($y);
	$terbilang_bayar = ucwords(strtolower($cangka));
?>
<body onLoad="window.print()">
<link rel="shortcut icon" href="../style/images/favicon.png"/>
<div id="box">
<div id="head">
<div id="head_l">
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='../$arr_aks[photo]' id='logo'/>";
?>
<div id="about">
Politeknik Elektronika Negeri Surabaya<br />
Kampus ITS Sukolilo, Surabaya 6011<br />
Telp : +62-31-5947280(hunting)<br />
Fax : +62-31-5946114<br />
e-mail : <u>pens@eepis-its.edu</u><br />
URL : http://www/eepis-its.edu
</div>
</div>
</div>
<div id="no_k">
Kwitansi No. : <?php echo $nama['2']; ?> 
<?php
@$query_jumlah_cari	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$no_kuitansi'");
$jumlah_cari=mysql_fetch_array($query_jumlah_cari);
$jumlah_cari_x=$jumlah_cari['0']-1;
if($jumlah_cari['0']==1)
{}
else
{echo "<b>(salinan ke $jumlah_cari_x)</b>";}
?>
</div>
<div id="kwitansi">
KWITANSI
</div>
<div id="cont">
<p id="jud">Telah terima dari kas </p><p id="jud1">:  <?php echo $nama['nama'];?></p>
<p id="jud">Uang sebesar<br />(dengan huruf)</p><p id="jud1" style="margin-top:-38px; ">: <label style="background:#E5E5E5">#<?php echo $terbilang_bayar; ?>#</label></p>
<p id="jud" style="margin-top:18px;">Untuk</p><p id="jud1" style="border:0px solid gray; float:left">: Biaya Pelatihan

	<?php
	if(mysql_num_rows($sql_1)==1)
	{
	$r=mysql_fetch_array($sql_1);
	$be=mysql_fetch_array($sql_biaya);
	$uang = number_format($be['biaya'],0,'','.');
	echo " $r[judul_training]";
	}
	else
	{
	echo "<ol style='border:0px solid gray; width:810px; margin:-3px 0px 0px 215px; padding:0'>";
	while($r=mysql_fetch_array($sql_1))
	{
	$be=mysql_fetch_array($sql_biaya);
	$uang = number_format($be['biaya'],0,'','.');
	echo "<li style='border:0px solid gray; height:20px; padding:0px 0px'>$r[judul_training]</li>";
	}
	echo "</ol>";
	}
	?>    

</p>
</div>
<div id="foot">
<p id="harga"><?php echo "Rp. ".number_format($y,0,'','.').",00"; ?></p>
<p id="nb">Nb. Bukti Kwitansi ini mohon disimpan.</p>
<p id="ttd">Surabaya, <?php echo tanggal(date("Y-m-d"))  ?><br /><br /><br /><br />
<?php $admin=mysql_query("select * from tb_aksesoris where keterangan='ttd kwitansi'"); $arr_admin=mysql_fetch_array($admin); echo $arr_admin['1']; ?></p>
</div>
</div>
</body>