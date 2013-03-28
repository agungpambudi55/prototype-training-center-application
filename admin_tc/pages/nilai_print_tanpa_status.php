<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$filename = 'laporan_nilai_tanpa_status'.date('YmdHis');
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
<tr>
<th colspan="10" bgcolor="white" >
<p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">Laporan Nilai Semua Peserta
<br />WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?></p>
</th>
</tr><br>
 <table border="1" width="45%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
	<thead>
		<tr>
        	<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nama Peserta</th>
			<th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Pelatihan</th>
            <th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Judul Pelatihan</th>
			<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nilai</th>
	
        </tr>
	</thead>
	<tbody>
<?php

$query="SELECT * FROM `tb_nilai` WHERE VAL = '2' ORDER BY `tb_nilai`.`id_judul` ASC";
$cek_query=mysql_query($query);

while($baris=mysql_fetch_array($cek_query))
{
$id=$baris['0'];
$id_pe=$baris['1'];
$id_ju=$baris['2'];
$pe=$baris['3'];
$ni=$baris['4'];
$query1 = mysql_query("select judul_training from tb_judul where id_judul = '$id_ju'");
$b=mysql_fetch_array($query1);
$judul=$b['judul_training'];
///
$query2 = mysql_query("select nama from tb_daftar_peserta where no_peserta = '$pe'");
$c=mysql_fetch_array($query2);
$peserta=$c['nama'];
///
$query3 = mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan = '$id_pe'");
$d=mysql_fetch_array($query3);
$pelatihan=$d['pelatihan'];

	echo "<tr> 
	<td style='vertical-align: middle'>$peserta</td>
	<td style='vertical-align: middle'>$pelatihan</td>
    <td style='vertical-align: middle'>$judul</td>
	<td align='center' >$ni</td>      
  </tr>";	
}
?>
</tbody>
</body>
</html>