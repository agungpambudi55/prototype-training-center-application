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

<div id="content">
<table class="table">
<tr>
	<th width="70%">Nama Pelatihan</th>
    <th width="30%">Jumlah Judul</th>
</tr>
<?php
$qry=mysql_query("select tb_detail_pelatihan.id_details_pelatihan, tb_detail_pelatihan.pelatihan from tb_detail_pelatihan, tb_judul, tb_jadwal_training where tb_detail_pelatihan.id_details_pelatihan=tb_judul.id_details_pelatihan and tb_detail_pelatihan.id_details_pelatihan=tb_jadwal_training.id_details_pelatihan group by tb_detail_pelatihan.pelatihan asc");
while($arr=mysql_fetch_array($qry))
{
$qry1=mysql_query("SELECT count(id_judul) AS jumlah_judul FROM tb_judul WHERE id_details_pelatihan = $arr[0] ORDER BY id_details_pelatihan ASC ");
$total_jumlah = mysql_fetch_array($qry1);
$jml=$total_jumlah['jumlah_judul'];
echo "
<tr>
	<td><a href='pages/daftar_formulir_print.php?idp=$arr[0]' class='link1'>$arr[1]</a></td>
	<td align='center'>$jml</td>
</tr>
";
}
?>
</table>
</div>
<?php
}
?>