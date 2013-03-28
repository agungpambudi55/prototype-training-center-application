<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
	switch(trim(date("m")))
{
	case "01";	$bulan = "Januari";		break;
	case "02";	$bulan = "Februari";	break;
	case "03";	$bulan = "Maret";		break;
	case "04";	$bulan = "April";		break;
	case "05";	$bulan = "Mei";			break;
	case "06";	$bulan = "Juni";		break;
	case "07";	$bulan = "Juli";		break;
	case "08";	$bulan = "Agustus";		break;
	case "09";	$bulan = "September";	break;
	case "10";	$bulan = "Oktober";		break;
	case "11";	$bulan = "November";	break;
	case "12";	$bulan = "Desember";	break;
}
?>

<div class="title_page">
Laporan
</div>
<div id="content">
<form  method="post">
<p style="border:0px solid gray; margin:-20px 0px; float:right; padding:-10px 0px 0px 0px">
<select class="option" name="bulan" required >
<option value="">Pilih Bulan</option>
<option value="01">Januari</option>
<option value="02">Februari</option>
<option value="03">Maret</option>
<option value="04">April</option>
<option value="05">Mei</option>
<option value="06">Juni</option>
<option value="07">Juli</option>
<option value="08">Agustus</option>
<option value="09">September</option>
<option value="10">Oktober</option>
<option value="11">November</option>
<option value="12">Desember</option>
</select>

<select class="option" name="tahun" style="width:120px" required>
<?php
for($i=2013;$i <= 2030;$i++){
echo "
<option value='$i'>$i</option>";
}
?>
</select>
<input type="submit" class="submit" value="Cari" />
</p>
</form>

<?php 
if( @$_POST['tahun'] && @$_POST['bulan']){
	$bulan=$_POST['bulan'];
	$th=$_POST['tahun'];
$cari_jadwal=mysql_query("select * from tb_jadwal_training where month(tgl1) ='".$_POST['bulan']."' AND year( tgl1 )='".$_POST['tahun']."'");
$cari_view=mysql_num_rows($cari_jadwal);
$cari_peserta=mysql_query("select * from tb_daftar_peserta where month(tanggal_daftar) ='".$_POST['bulan']."' AND year( tanggal_daftar )='".$_POST['tahun']."'");
$cari_viewpeserta=mysql_num_rows($cari_peserta);
$cari_uang=mysql_query("SELECT SUM(tb_judul_jenis_peserta.biaya) AS biaya FROM tb_kuitansi, tb_judul_jenis_peserta 
WHERE month(tb_kuitansi.tgl_kuitansi) = '".$_POST['bulan']."' AND year( tb_kuitansi.tgl_kuitansi )='".$_POST['tahun']."'
and tb_judul_jenis_peserta.id_judul_jenis_peserta=tb_kuitansi.id_judul_jenis_peserta");
$cari_hasiluang=mysql_fetch_array($cari_uang);
$cari_duit=$cari_hasiluang['biaya'];
$cari_uang = number_format($cari_duit,0,'','.');

$date=$_POST['bulan'];
switch ($date)
{
	case "01": $bulan1 = "Januari"; 	break;
	case "02": $bulan1 = "Februari";	break;
	case "03": $bulan1 = "Maret"; 		break;
	case "04": $bulan1 = "April"; 		break;
	case "05": $bulan1 = "Mei";			break;
	case "06": $bulan1 = "Juni"; 		break;
	case "07": $bulan1 = "Juli"; 		break;
	case "08": $bulan1 = "Agustus"; 	break;
	case "09": $bulan1 = "September"; 	break;
	case "10": $bulan1 = "Oktober"; 	break;
	case "11": $bulan1 = "November"; 	break;
	case "12": $bulan1 = "Desember"; 	break;
}


echo "<b>Bulan ".$bulan1." ".$th."</b>"; ?>
<br><br>
1. Jumlah jadwal selama sebulan adalah <b><?php echo $cari_view; ?> Jadwal</b><br />
2. Jumlah peserta yang daftar selama sebulan adalah <b><?php echo $cari_viewpeserta;?> Orang</b><br />
3. Jumlah pendapatan sebulan sebesar <b>Rp. <?php echo $cari_uang.",00";?></b> <br />
<p style=" border:0px solid gray;margin:40px 0px 0px 0px; padding:10px 0px">
<a href="pages/convert_pdf/laporan_convert_pdf_cari.php?th=<?php echo $th?>&tgl=<?php echo $bulan;?>" target='_new' class="pdf">Cetak Laporan</a>&nbsp;
<a href="pages/laporan_print_excel_cari.php?th=<?php echo $th?>&tgl=<?php echo $bulan;?>" class="excel">Cetak Laporan</a></p>
<?php } else {
$jadwal=mysql_query("select * from tb_jadwal_training where month(tgl1) = (select month(now()))");
$view=mysql_num_rows($jadwal);
$peserta=mysql_query("select * from tb_daftar_peserta where month(tanggal_daftar)= (select month(now()))");
$viewpeserta=mysql_num_rows($peserta);
$uang=mysql_query("SELECT SUM(tb_judul_jenis_peserta.biaya) AS biaya FROM tb_kuitansi, tb_judul_jenis_peserta 
WHERE month(tb_kuitansi.tgl_kuitansi) = (select month(now()))
and tb_judul_jenis_peserta.id_judul_jenis_peserta=tb_kuitansi.id_judul_jenis_peserta");
$hasiluang=mysql_fetch_array($uang);
$duit=$hasiluang['biaya'];
$uang = number_format($duit,0,'','.');
?>
<?php echo "<b>Bulan ".$bulan." ".date("Y")."</b>";?>
<br><br>
1. Jumlah jadwal selama sebulan adalah <b><?php echo $view; ?> Jadwal</b><br />
2. Jumlah peserta yang daftar selama sebulan adalah <b><?php echo $viewpeserta;?> Orang</b><br />
3. Jumlah pendapatan sebulan sebesar <b>Rp. <?php echo $uang.",00";?></b> <br />
<p style=" border:0px solid gray;margin:40px 0px 0px 0px; padding:10px 0px">
<a href="pages/convert_pdf/laporan_convert_pdf.php" target='_new' class="pdf">Cetak Laporan</a>
&nbsp;<a href="pages/laporan_print_excel.php" class="excel">Cetak Laporan</a></p>
<?php }
}
?>
</div>