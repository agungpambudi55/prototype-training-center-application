<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
?>

<html>
<head>

</head>
<body>
<?php
	//include ("config/function.php");
	$nopeserta=$_GET['nopeserta'];
	$select=mysql_query("select *from tb_daftar_peserta where no_peserta='$nopeserta'");
	$view=mysql_fetch_array($select);
	$no=$view['no_peserta'];
	$sql_judul_training=mysql_query("SELECT *
FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$sql_biaya_judul=mysql_query("SELECT biaya
FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$sql_jumlah=mysql_query("SELECT sum(biaya)as biaya
FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$jumlah=mysql_fetch_array($sql_jumlah);
	$idjudulpeserta=$jumlah['id_judul_jenis_peserta'];
?>	

<div class="title_page">
Details Administrasi
</div>
<div id="content">
<form method="post" target='_blank' action="index.php?page=peserta&pages=daftar_peserta_proses_insert_kwitansi&nopeserta=<?php echo $nopeserta; ?>">
<table border="0">
<tr>
<td>
Nama
</td>
<td>
<?php echo $view['nama']; ?>
</td>
</tr>
<tr>
<td>Jenis Peserta</td>
<td colspan="2">
	<?php 
	$queryjenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=".$view['id_jenis_peserta']."");
	$tmp=mysql_fetch_array($queryjenis); echo $tmp['jenis_peserta']; ?>
</td>
</tr>
<tr>
<td>
Judul Training
</td>
<td>
	<div style="border-bottom:1px solid #000">
	<ul>
		<?php
        while($r=mysql_fetch_array($sql_judul_training))
        {
        $idjenisjudul=$r['id_judul_jenis_peserta'];
        ?>
        <div align="left">
        <?php
        echo "<li>".$r['judul_training']."</li>" ;
        echo "<input type='hidden' name='judul[$idjenisjudul]' value='$idjenisjudul'/>";
        ?>
		</div>
        <?php
		}
		?>
	</ul>
    </div>
</td>
<td>
	<div style="border-bottom:1px solid #000">
	<ul>
		<?php
        while($be=mysql_fetch_array($sql_biaya_judul)){
		$uang = number_format($be['biaya'],0,'','.');
        echo "<li> Rp ".$uang.",00</li>";
        }
        ?>
    </ul>
    </div>
</td>
</tr>
<tr>
<td></td>
<td>
Jumlah Total Biaya Training
</td>
<td align="right">
<?php 
$jumlahuang = number_format($jumlah['biaya'],0,'','.');
echo "<b>Rp ".$jumlahuang.",00</b>"; 
?>
</td>
</tr>
<tr>
<td>
<input type="submit" class="button_a" value="Cetak Kwitansi" />
</td>
</tr>
</table>
</form>

</div>
</body>
</html>
<?php
}
?>