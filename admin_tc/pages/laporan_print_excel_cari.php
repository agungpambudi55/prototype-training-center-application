<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$filename = 'laporan_'.date('YmdHis');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=".$filename.".xls");
?>
<html>
<head>
<title>Dashboard Training Center EEPIS</title>
</head>
<body>
<?php
$tanggal=$_GET['tgl'];
$tahun=$_GET['th']; 

$date=$_GET['tgl'];
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
?>
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
?>
  <tr>
  
  <p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">Laporan Jadwal, Peserta dan Pendapatan Bulan <?php echo $bulan1 ."&nbsp;". $tahun ;?><br />WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?></p>
  </tr>
<br>
Laporan jadwal bulan : <?php echo $bulan1?>&nbsp;<?php echo $tahun?><br><br>
		<table border="1" width="40%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
		<tr>
			<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Judul Pelatihan</th>
            <th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Tanggal Pelatihan</th>
			<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Jam Pelatihan</th>
			<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Sertifikat</th>
	
        </tr>
<?php
 
$no=1; 
//----jumlah jadwal---//
$jadwal=mysql_query("select * from tb_jadwal_training where month(tgl1) = $tanggal AND year(tgl1)=$tahun");
while ($view=mysql_fetch_array($jadwal)){
	$id_judul=$view['id_judul'];
	$tgl1=$view['tgl1'];
	$tgl2=$view['tgl2'];
	$jam1=$view['jam_mulai'];
	$jam2=$view['jam_selesai'];
	$sertifikat=$view['ket_sertifikat'];
$judul=mysql_query("select * from tb_judul where id_judul=$id_judul");
$array=mysql_fetch_array($judul);
$jdl=$array['judul_training'];

echo "	<tr>
		<td style='height:20px;'>$jdl</td>
		<td align='center'>$tgl1 - $tgl2</td>
		<td align='center'>$jam1 - $jam2</td>
		<td>$sertifikat</td>
</tr>";
$no++;
}
?>
</table>
<br>
Laporan peserta bulan : <?php echo $bulan1?>&nbsp;<?php echo $tahun?><br><br>
<table border="1" width="50%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
		<tr>
			<th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nama Peserta</th>
            <th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Jenis Peserta</th>
			<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Instansi Peserta</th>
        </tr>
<?php
$i=1;
//---jumlah peserta perjudul ----//
$peserta=mysql_query("SELECT *
FROM tb_daftar_peserta
WHERE month( tb_daftar_peserta.tanggal_daftar ) = $tanggal
");
while ($viewpeserta=mysql_fetch_array($peserta)) {
	$idp=$viewpeserta['no_peserta'];
	$nama=$viewpeserta['nama'];
	$instansi=$viewpeserta['instansi_peserta'];
	$je=$viewpeserta['id_jenis_peserta'];
	
	$query1 = mysql_query("select jenis_peserta from tb_jenis_peserta where id_jenis_peserta = '$je'");
	$a=mysql_fetch_array($query1);
	$jenis=$a['jenis_peserta'];

	
echo "<tr>
		<td>$nama</td>
		<td>$jenis</td>
		<td>$instansi</td>
		
</tr>";
$i++;
}
?>
</table>
<br>
Total Pendapatan bulan <?php echo $bulan1?>&nbsp;<?php echo $tahun?> :

<?php
//--penadapatan perbulan ---//
$uang=mysql_query("SELECT SUM(tb_judul_jenis_peserta.biaya) AS biaya FROM tb_kuitansi, tb_judul_jenis_peserta 
WHERE month(tb_kuitansi.tgl_kuitansi) = $tanggal
and tb_judul_jenis_peserta.id_judul_jenis_peserta=tb_kuitansi.id_judul_jenis_peserta");
$hasiluang=mysql_fetch_array($uang);
$hasil = number_format($hasiluang['biaya'],0,'','.');
echo "<strong> ". Rp." ".$hasil.",00";
echo "</strong>";
//---biaya perjudul---//
?>
<br><br>
<table border="1" width="200px" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
		<tr>
			<th width="40%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Judul Pelatihan</th>
            <th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Total Biaya</th>
        </tr>
	<?php 
	$no=1;
	$judul=mysql_query("SELECT *
FROM tb_judul, tb_judul_jenis_peserta, tb_kuitansi
WHERE month(tb_kuitansi.tgl_kuitansi) = $tanggal
and tb_judul_jenis_peserta.id_judul_jenis_peserta=tb_kuitansi.id_judul_jenis_peserta 
and tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
GROUP BY tb_judul_jenis_peserta.id_judul ");
while($array_judul=mysql_fetch_array($judul)){
$id_judul=$array_judul['id_judul'];
$ju=$array_judul['judul_training'];

$arto=mysql_query("SELECT SUM(tb_judul_jenis_peserta.biaya) AS biaya FROM tb_kuitansi, tb_judul_jenis_peserta 
WHERE month(tb_kuitansi.tgl_kuitansi) = $tanggal
and tb_judul_jenis_peserta.id_judul_jenis_peserta=tb_kuitansi.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul='$id_judul'");
$money=mysql_fetch_array($arto);
$bang=$money['biaya'];

echo "
	<tr>
	<td style='height:20px'>$ju</td>
	<td align='left'> Rp. ".$bang."</td></tr>
	";
$no++;
}
?>
</table>
</body>
</html>