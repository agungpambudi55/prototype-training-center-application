<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$name=date("Y-m-d")."_".date("Ymdhis");
header("Content-type: application/x-msdownload");
header('Content-Disposition: attachment; filename='.$name.'_Laporan_absen_kelas.xls');
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
?>
<p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">
Laporan Absen Kelas <br />
WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?>
</p>
<?php
$qry_tgl=mysql_query("SELECT tb_kelas.nama_kelas, tb_instruktur.nama, tb_absen_peserta.tanggal
FROM tb_absen_peserta, tb_daftar_peserta, tb_instruktur, tb_kelas
WHERE tb_kelas.id_kelas = tb_absen_peserta.id_kelas
AND tb_instruktur.id_instruktur = tb_absen_peserta.id_instruktur
AND tb_daftar_peserta.no_peserta = tb_absen_peserta.no_peserta
AND tb_kelas.nama_kelas like '%$_REQUEST[print]%'
GROUP BY `tb_absen_peserta`.`tanggal` ASC");
while($tgl=mysql_fetch_array($qry_tgl))
{
$dates=substr($tgl['2'],5,2);
switch ($dates)
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
<br>
Nama Kelas : <?php echo $tgl['0']; ?><br>
Instruktur : <?php echo $tgl['1']; ?><br>
Tanggal    : <?php echo substr($tgl['2'],8,2)." ".$bulan1." ".substr($tgl['2'],0,4); ?><br><br>
<?php

echo "
<table border='1' width='45%' cellpadding='0' cellspacing='0' style='margin:0 auto;  font-size:14px; font-family:'Times New Roman';'>
	<tr>
			<th width='5%' style='height:35px; background-color:#66BEFF; color:#FFFFFF'>Nama Peserta</th>
			<th width='5%' style='height:35px; background-color:#66BEFF; color:#FFFFFF'>Status Absen</th>
    </tr>
";
$qry = mysql_query("
SELECT tb_kelas.nama_kelas, tb_instruktur.nama, tb_daftar_peserta.nama, tb_absen_peserta.status_absen
FROM tb_absen_peserta, tb_daftar_peserta, tb_instruktur, tb_kelas
WHERE tb_kelas.id_kelas = tb_absen_peserta.id_kelas
AND tb_instruktur.id_instruktur = tb_absen_peserta.id_instruktur
AND tb_daftar_peserta.no_peserta = tb_absen_peserta.no_peserta
AND tb_kelas.nama_kelas like '%$_REQUEST[print]%'
AND tb_absen_peserta.tanggal='$tgl[2]'
ORDER BY `tb_daftar_peserta`.`nama` ASC");
if (mysql_num_rows($qry)==0)
{ echo"<tr><td colspan='2' align='center'><b>Kosong</b></td></tr>";}
else
{
	while ($arr_1=mysql_fetch_array($qry))
	{
		echo "
		<tr>
		<td>$arr_1[2]</td>
		<td>$arr_1[3]</td>
		</tr>
		";	
	}
}
echo "</table><br>";
}
?>