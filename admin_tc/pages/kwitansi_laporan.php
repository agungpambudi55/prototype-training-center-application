<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
$filename = 'laporan_kwitansi_'.date('YmdHis');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=".$filename.".xls");
?>
<?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
$tgl=$_REQUEST['tgl_kuitansi'];
$dates=substr($tgl,5,2);
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

if($_GET['kwitansi']=='group')
{
?>

<p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">Laporan Kwitansi Group Tanggal 
<?php echo substr($tgl,8,2)." ".$bulan1." ".substr($tgl,0,4); ?>
<br />WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?></p>
<br>
 <table border="1" width="60%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
		<tr>
        	<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">No</th>
        	<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Kode Kwitansi</th>
			<th width="35%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Instansi</th>
            <th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Pelatihan</th>
            <th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Discount</th>
			<th width="30%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Biaya</th>
			<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Jumlah Print</th>
        </tr>
<?php
$qry = mysql_query("
SELECT distinct (tb_group_kuitansi.no_group_kuitansi), tb_daftar_peserta.instansi_peserta, tb_detail_pelatihan.pelatihan
from 
tb_group_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_group_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_group_kuitansi.no_peserta=tb_daftar_peserta.no_peserta 
and tb_group_kuitansi.tgl_kuitansi='$_REQUEST[tgl_kuitansi]'
ORDER BY `tb_group_kuitansi`.`no_group_kuitansi`");
if(mysql_num_rows($qry)==0)
{
	echo "<tr><td align='center' colspan='4'><b>Kosong</b></td></tr>";

}
else
{
$no=1;
$x=0;
while($row_kw_group=mysql_fetch_array($qry))
	{
	$q_biaya			=mysql_query("
	SELECT sum(biaya) as biaya
	FROM tb_group_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
	WHERE tb_group_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
	AND tb_daftar_peserta.no_peserta = tb_group_kuitansi.no_peserta
	AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
	AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
	AND tb_group_kuitansi.no_group_kuitansi = '$row_kw_group[0]'");
	$q_discount			=mysql_query("SELECT sum(discount) as discount from tb_daftar_peserta,tb_group_kuitansi where tb_daftar_peserta.no_peserta=tb_group_kuitansi.no_peserta and tb_group_kuitansi.no_group_kuitansi='$row_kw_group[0]' group by tb_group_kuitansi.no_group_kuitansi");
	$query_jumlah		=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$row_kw_group[0]'");
	$jumlah				=mysql_fetch_array($query_jumlah);
	$row_biaya_group	=mysql_fetch_array($q_biaya);
	$row_discount_group	=mysql_fetch_array($q_discount);
	$jml_discount_group	=$row_biaya_group['biaya'] * $row_discount_group['discount'] / 100;
	$hasil_discount_group=$row_biaya_group['biaya'] - $jml_discount_group;
	$xa					=$hasil_discount_group + $xa;
	echo 
	"
	  <tr>
	  	<td align='center'>$no</td>
		<td>$row_kw_group[0]</td>
		<td>$row_kw_group[1]</td>
		<td align='center'>$row_kw_group[2]</td>
		<td align='center'>$row_discount_group[discount]%</td>
		<td>Rp. ".number_format($hasil_discount_group,0,'','.').",00</td>
		<td align='center'>$jumlah[jumlah]</td>
	  </tr>
	";
	$no++;
	$xxx=$hasil_discount_group + $xxx;
	}
}
?>
<tr>
<td colspan="5">Jumlah Total </td>
<td colspan="2" align="left"><?php echo "Rp. ".number_format($xxx,0,'','.').",00"; ?></td>
</tr>
</table>
<?php
}
else
{
?>
<p style="margin:0px 0px 5px 0px; padding:0; font-size:20px; font-family:'Times New Roman'; font-style:bold;" align="left">Laporan Kwitansi Tanggal 
<?php echo substr($tgl,8,2)." ".$bulan1." ".substr($tgl,0,4); ?>
<br />WEBSITE <?php echo strtoupper($arr_aks['keterangan']); ?></p>
<br>
 <table border="1" width="60%" cellpadding="0" cellspacing="0" style="margin:0 auto;  font-size:14px; font-family:'Times New Roman';">
		<tr>
        	<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">No</th>
        	<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Kode Kwitansi</th>
			<th width="35%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Nama</th>
            <th width="20%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Pelatihan</th>
			<th width="10%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Discount</th>
			<th width="30%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Biaya</th>
			<th width="5%" style="height:35px; background-color:#66BEFF; color:#FFFFFF">Jumlah Print</th>
        </tr>
	<?php

$qry = mysql_query("
SELECT distinct (tb_kuitansi.no_kuitansi), tb_daftar_peserta.nama, tb_detail_pelatihan.pelatihan
from 
tb_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_kuitansi.no_peserta=tb_daftar_peserta.no_peserta 
and tb_kuitansi.tgl_kuitansi='$_REQUEST[tgl_kuitansi]'
ORDER BY `tb_kuitansi`.`no_kuitansi`");
$q_total_biaya	=mysql_query("SELECT sum( biaya ) AS biaya
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.tgl_kuitansi = '$_REQUEST[tgl_kuitansi]'");
$row_total_biaya=mysql_fetch_array($q_total_biaya);
if (mysql_num_rows($qry)==0){
	echo "<tr><td align='center' colspan='4'><b>Kosong</b></td></tr>";}
else{
$no=1;
$x=0;
while($arr_1=mysql_fetch_array($qry))
	{
	$sql1=mysql_query("select distinct(tb_daftar_peserta.no_peserta),nama,no_kuitansi,discount from tb_daftar_peserta,tb_kuitansi where tb_daftar_peserta.no_peserta=tb_kuitansi.no_peserta and tb_kuitansi.no_kuitansi='$arr_1[0]'");
$nama=mysql_fetch_array($sql1);

	$query_biaya_total=mysql_query("SELECT sum(biaya) as biaya
FROM tb_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_kuitansi.no_kuitansi = '$arr_1[0]'");
	$row_biaya=mysql_fetch_array($query_biaya_total);
	$biaya_tr	=$row_biaya['biaya'];
	$discount	=$nama['discount'];
	$kueri		=$biaya_tr * $discount / 100;
	$y			=$biaya_tr - $kueri;
	$x			=$discount + $x;
	$query_jumlah	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$arr_1[0]'");
	$jumlah=mysql_fetch_array($query_jumlah);
	echo "
	  <tr>
	  	<td align='center'>$no</td>
		<td>$arr_1[0]</td>
		<td>$arr_1[1]</td>
		<td align='center'>$arr_1[2]</td>
		<td align='center'>$discount%</td>
		<td>Rp. ".number_format($y,0,'','.').",00</td>
		<td align='center'>$jumlah[jumlah]</td>
	  </tr>
	";
	$no++;
	}
	$jml_discount=$row_total_biaya['0'] * $discount / 100;
	$jml_hasil=$row_total_biaya['0']-$jml_discount;
	
	echo 
	"
	<tr>
		<td colspan='5'>Jumlah Total Biaya</td>
		<td colspan='2' align='left'>Rp ".number_format($jml_hasil,0,'','.').",00</td>
	</tr>
	";
}
}
?>