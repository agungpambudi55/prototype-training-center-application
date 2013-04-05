<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{

?><link rel="stylesheet" href="style/jquery.datepick.css" type="text/css" />
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript">
$(function() 
{
$('#search_tgl').datepick();
});
/*function cek_pencarian(variable)
{
if(variable=='tgl_kuitansi'){ document.getElementById("cobaa").innerHTML="<input type='text' class='search' id='search_tgl' placeholder='Pencarian Tanggal' name='cari' />"}
}*/
</script>
<div id="content">
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 5px 0px; height:25px; margin:0px 0px 5px 0px">
<input type="submit" value="" class="search_button" />
  <select class="search_option" name="cari_sortir" onchange="cek_pencarian(this.value)" required>
      <option value=""></option>
      <option value="tb_kuitansi.no_kuitansi" id="kode_kuitansi">Kode Kwitansi</option>
      <option value="tb_daftar_peserta.nama" id="nama">Nama</option>
      <option value="pelatihan" id="pelatihan">Pelatihan</option>
      <option value="tgl_kuitansi" id="tgl">Tanggal Kwitansi</option>
	</select>
<input type="text" class="search" id="search" placeholder="Pencarian" name="cari" />
<input type="text" class="search" id="search_tgl" placeholder="Pencarian Tanggal" name="cari_tgl" />
<?php 
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
	echo "<div style='border:0px solid gray; margin:-10px 0px 0px 0px; width:350px; text-align:center; padding:9px 2px; background:#FD9200; color:#FFF'>Isi Tanggal Kwitansi Untuk Laporan Kwitansi!</div>";	}
else
{
	$cari_tgl1=$_POST['cari_tgl'];
	if($_POST['cari_sortir']=='tgl_kuitansi'){
	echo "<a href='index.php?page=peserta&pages=kwitansi' class='button_a'>Lihat Semua</a>&nbsp";
	echo "<a href='pages/kwitansi_laporan.php?tgl_kuitansi=$_POST[cari_tgl]' class='excel'>Laporan Kwitansi</a>";
	}
	else	
	{
	echo "<a href='index.php?page=peserta&pages=kwitansi' class='button_a'>Lihat Semua</a>&nbsp";
	}
}
?>
</div>
</form>
<script>
$("#search_tgl").hide();

$("#tgl").click(function(){$("#search_tgl").show();})
$("#tgl").click(function(){$("#search").hide();})

$("#kode_kuitansi").click(function(){$("#search").show();})
$("#kode_kuitansi").click(function(){$("#search_tgl").hide();})

$("#nama").click(function(){$("#search").show();})
$("#nama").click(function(){$("#search_tgl").hide();})

$("#pelatihan").click(function(){$("#search").show();})
$("#pelatihan").click(function(){$("#search_tgl").hide();})

</script>
<table class="table">
  <tr>
    <th width="15%">Kode Kwitansi</th>
    <th width="71%">Nama</th>
    <th width="10%">Pelatihan</th>
    <th width="5%">Jumlah Print</th>
    <th width="2%">Aksi</th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
$qry_1 = mysql_query("
SELECT distinct (tb_kuitansi.no_kuitansi), tb_daftar_peserta.nama, tb_detail_pelatihan.pelatihan
from 
tb_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
where 
tb_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
and tb_kuitansi.no_peserta=tb_daftar_peserta.no_peserta group by `tb_kuitansi`.`no_kuitansi` ASC LIMIT $posisi,$batas");
if (mysql_num_rows($qry_1)==0){
	echo "<tr><td align='center' colspan='5'><b>Kosong</b></td></tr>";}
	else{
while($arr_1=mysql_fetch_array($qry_1)){
$query_jumlah	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$arr_1[0]'");
$jumlah=mysql_fetch_array($query_jumlah);

echo "
  <tr>
    <td>$arr_1[0]</td>
    <td>$arr_1[1]</td>
	<td align='center'>$arr_1[2]</td>
	<td align='center'>$jumlah[jumlah]</td>
    <td align='center'>
    <a href='index.php?page=peserta&pages=kwitansi_detail&i=$arr_1[0]' class='detail' title='Detail Kwitansi'></a>
    </td>
  </tr>
";
}}
$qry_2 = mysql_query("SELECT DISTINCT (tb_kuitansi.no_peserta), tb_kuitansi.no_kuitansi, tb_daftar_peserta.nama FROM tb_kuitansi, tb_daftar_peserta WHERE tb_kuitansi.no_peserta = tb_daftar_peserta.no_peserta ORDER BY `tb_kuitansi`.`no_kuitansi` ASC");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=peserta&pages=kwitansi&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=peserta&pages=kwitansi&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}else 
{
	if($_POST['cari_sortir']=='tgl_kuitansi'){
	$q_cari	  ="
	SELECT distinct (tb_kuitansi.no_kuitansi), tb_daftar_peserta.nama, tb_detail_pelatihan.pelatihan
	from 
	tb_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
	where 
	tb_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
	and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
	and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
	and tb_kuitansi.no_peserta=tb_daftar_peserta.no_peserta 
	and $_POST[cari_sortir] LIKE '%$_POST[cari_tgl]%' order by tb_kuitansi.no_kuitansi asc";
	}
	else
	{
	$q_cari	  ="
	SELECT distinct (tb_kuitansi.no_kuitansi), tb_daftar_peserta.nama, tb_detail_pelatihan.pelatihan
	from 
	tb_kuitansi, tb_daftar_peserta,tb_detail_pelatihan,tb_judul_jenis_peserta,tb_judul 
	where 
	tb_kuitansi.id_judul_jenis_peserta=tb_judul_jenis_peserta.id_judul_jenis_peserta
	and tb_judul_jenis_peserta.id_judul=tb_judul.id_judul
	and tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
	and tb_kuitansi.no_peserta=tb_daftar_peserta.no_peserta 
	and $_POST[cari_sortir] LIKE '%$_POST[cari]%' order by tb_kuitansi.no_kuitansi asc";
	}
$qry_cari = mysql_query($q_cari);
while($arr_cari=mysql_fetch_array($qry_cari)){
$query_jumlah_cari	=mysql_query("SELECT count(no_kuitansi) as jumlah FROM tb_bay_kui where no_kuitansi='$arr_cari[0]'");
$jumlah_cari=mysql_fetch_array($query_jumlah_cari);
echo "
  <tr>
    <td>$arr_cari[0]</td>
    <td>$arr_cari[1]</td>
	<td align='center'>$arr_cari[2]</td>
	<td align='center'>$jumlah_cari[jumlah]</td>
    <td align='center'>
    <a href='index.php?page=peserta&pages=kwitansi_detail&i=$arr_cari[0]' class='detail' title='Detail Kwitansi'></a>
    </td>
  </tr>
";
}	
}
?>
</table>
</div>
<?php
}
?>