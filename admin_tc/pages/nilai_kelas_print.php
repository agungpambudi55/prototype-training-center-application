<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$filename = 'laporan_nilai_'.date('YmdHis');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=".$filename.".xls");
?>
<html>
<head>
<title>Laporan Nilai</title>
</head>
<body>
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
?>
<p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">Laporan Nilai Kelas <?php echo $_REQUEST['kelas']; ?> 
<br />WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?></p>
<br>
 <table border="1" width="45%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
	<thead>
		<tr>
        	<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nama Peserta</th>
			<th width="15%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Pelatihan</th>
            <th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Judul Pelatihan</th>
			<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nilai</th>
            <th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Status</th>
	
        </tr>
	</thead>
	<tbody>
<?php

$qry = mysql_query("
SELECT 
tb_detail_pelatihan.pelatihan, 
tb_judul.judul_training,
tb_daftar_peserta.no_peserta,
tb_daftar_peserta.nama, 
tb_nilai.nilai, 
tb_nilai.status,
tb_nilai.id_nilai
FROM tb_daftar_peserta, tb_detail_pelatihan, tb_peserta_kelas, tb_pilih_judul, tb_kelas, tb_judul, tb_nilai 
WHERE 
tb_daftar_peserta.no_peserta=tb_nilai.no_peserta AND
tb_daftar_peserta.no_peserta=tb_pilih_judul.no_peserta AND
tb_daftar_peserta.no_peserta=tb_peserta_kelas.no_peserta AND
tb_detail_pelatihan.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_details_pelatihan=tb_judul.id_details_pelatihan AND
tb_nilai.id_judul=tb_judul.id_judul AND
tb_nilai.id_judul=tb_pilih_judul.id_judul AND
tb_nilai.no_peserta=tb_pilih_judul.no_peserta AND
tb_nilai.no_peserta=tb_peserta_kelas.no_peserta AND
tb_judul.id_judul=tb_pilih_judul.id_judul AND
tb_peserta_kelas.id_pilih_judul = tb_pilih_judul.id_pilih_judul AND 
tb_kelas.id_kelas = tb_peserta_kelas.id_kelas AND 
tb_kelas.nama_kelas LIKE '%$_REQUEST[print]%' AND 
tb_nilai.val ='1'
ORDER BY `tb_peserta_kelas`.`no_peserta` ASC");

while ($arr_1=mysql_fetch_array($qry))
{
	echo "
	<tr>
	<td>$arr_1[3]</td>
	<td style='vertical-align: middle'>$arr_1[0]</td>
    <td>$arr_1[1]</td>
	<td align='center'>$arr_1[4]</td>
	<td align='center'>$arr_1[5]</td>     
  	</tr>";	
}
?>
</tbody>
</body>
</html>