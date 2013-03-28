
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
<form method="post">
<div style="border:0px solid gray; padding:10px 0px 15px 0px; margin-bottom:3px">
<a href="index.php?page=peserta&pages=daftar_peserta_form1" class="button_a">Tambah Data</a>
<a href="index.php?page=peserta&pages=daftar_peserta_banyak" class="button_a">Tambah Data Banyak</a>
<?php 
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{}
else
{echo "<a href='index.php?page=peserta&pages=daftar_peserta_view_peserta' class='button_a'>Lihat Semua</a>";}
?>
<input type="submit" value="" class="search_button" />
      <select class="search_option" name="cari_sortir" required>
      <option value=""></option>
      <option value="nama">Nama</option>
      <option value="instansi_peserta">Instansi</option>
      <option value="tlp">No. Telpon</option>
	  </select>
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
</div>
</form>
<?php
if(isset($_GET['ref']))
{
	if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
	else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th width="32%">Nama</th>
    <th width="15%">Jenis Peserta</th>
    <th width="15%">Instansi</th>
    <th width="15%">Jabatan</th>
    <th width="15%">No. Telpon</th>
    <th width="8%">Aksi</th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="" && @$_POST['cari_sortir']=="")
{
	
	
$qry_1 = mysql_query("SELECT * FROM tb_daftar_peserta order by nama asc LIMIT $posisi,$batas");
if (mysql_num_rows($qry_1)==0)
{
	echo "<tr><td align='center' colspan='20'><b>Kosong</b></td></tr>";}
else{
$no = $posisi+1;
while ($arr_1=mysql_fetch_array($qry_1))
{
$qry_jenpes=mysql_query("select jenis_peserta from tb_jenis_peserta where id_jenis_peserta=$arr_1[1]");
$arr_jenpes=mysql_fetch_array($qry_jenpes);
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td>$arr_jenpes[0]</td>
    <td>$arr_1[5]</td>
    <td>$arr_1[6]</td>
    <td>$arr_1[10]</td>
    <td align='center'>
    <a href='index.php?page=histori_detail&i=$arr_1[0]' class='detail' title='Details Peserta'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_form2_tambah_judul&addjudul=$arr_1[0]' class='add_add' title='Tambah Judul'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_update&editpeserta=$arr_1[0]' class='update' title='Edit Peserta'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_proses_daftar&hapuspeserta=$arr_1[0]' class='delete' title='Hapus Peserta' onclick='return konfirmasi_peserta(\"".$arr_1['nama']."\")'></a>
    </td>
  </tr>
";
$no++;
}
$qry_2 = mysql_query("SELECT * FROM tb_daftar_peserta");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=peserta&pages=daftar_peserta_view_peserta&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=peserta&pages=daftar_peserta_view_peserta&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";



}}
else
{
	
	
	
$qry_cari = mysql_query("SELECT * FROM tb_daftar_peserta WHERE $_POST[cari_sortir] LIKE '%$_POST[cari]%' order by nama asc ");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_cari))
{
$qry_jenpes=mysql_query("select jenis_peserta from tb_jenis_peserta where id_jenis_peserta=$arr_1[1]");
$arr_jenpes=mysql_fetch_array($qry_jenpes);
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td>$arr_jenpes[0]</td>
    <td>$arr_1[5]</td>
    <td>$arr_1[6]</td>
    <td>$arr_1[10]</td>
    <td>
    <a href='index.php?page=histori_detail&i=$arr_1[0]' class='detail' title='Details Peserta'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_form2_tambah_judul&addjudul=$arr_1[0]' class='add_add' title='Tambah Judul'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_update&editpeserta=$arr_1[0]' class='update' title='Edit Peserta'></a>
    <a href='index.php?page=peserta&pages=daftar_peserta_proses_daftar&hapuspeserta=$arr_1[0]' class='delete' title='Hapus Peserta' onclick='return konfirmasi_peserta(\"".$arr_1['nama']."\")'></a>
    </td>
  </tr>
";
}
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>
";
}



}
}

?>


</div>