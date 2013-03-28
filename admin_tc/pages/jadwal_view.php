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
<div style="border:0px solid gray; padding:10px 0px 20px 0px ">
<a href="index.php?page=pel&pages=jadwal_training_insert" class="button_a">Tambah Data</a>
</div>
<table class="table">
<tr>
	<th width="70%">Nama Pelatihan</th>
    <th width="30%">Jumlah Judul</th>
</tr>
<?php
		$result = mysql_query("select * from tb_detail_pelatihan,tb_jadwal_training where tb_detail_pelatihan.id_details_pelatihan=tb_jadwal_training.id_details_pelatihan group by pelatihan");	
		while($brs=mysql_fetch_array($result)) {
		$idp=$brs['id_details_pelatihan'];
		$nama_pelatihan = $brs['pelatihan'];
		
		$quer=mysql_query("select * from tb_detail_pelatihan,tb_jadwal_training where tb_detail_pelatihan.id_details_pelatihan=tb_jadwal_training.id_details_pelatihan and tb_jadwal_training.id_details_pelatihan=$idp
		");
		$total_jumlah = mysql_num_rows($quer);
echo "
<tr>
	<td><a href='index.php?page=pel&pages=jadwal_training_view&idp=$idp' class='link1'>$nama_pelatihan</a></td>
	<td align='center'>$total_jumlah</td>
</tr>
";
}
?>
</table>
</div>
<?php }?>