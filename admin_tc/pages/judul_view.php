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
<div style="border:0px solid gray; padding:10px 0px 15px 0px ">
<a href="index.php?page=pel&pages=judul_insert" class="button_a">Tambah Data</a>
<?php 
if(@$_POST['cari']=="")
{}
else
{echo "<a href='index.php?page=pel&pages=judul_view' class='button_a'>Lihat Semua</a>";}
?>
<input type="submit" value="" class="search_button" />
<input type="text" class="search" placeholder="Pencarian" name="cari" required/>
</div>
</form>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="edt")
	{echo "<div class='notifhijau'>Data berhasil diperbarui! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th width="20%">Judul</th>
    <th width="10%">Pelatihan</th>
    <th width="10%">Durasi Jam</th>
    <th width="10%">Jumlah Hari</th>
    <th width="10%">Peserta Min</th>
    <th width="20%">Deskripsi</th>
    <th width="20%">Prasyarat</th>
    <th width="8%">Aksi</th>
  </tr>
<?php
////hapus
if (@$hapus_id=$_REQUEST['hapus_id']){
	$hapus="delete from tb_judul where id_judul='$hapus_id'";
	$result=mysql_query($hapus) or die (mysql_error());
	if ($result)
{ echo"<script>location.href = ('index.php?page=pel&pages=judul_view&ref=del&".$hapus_id."');</script>";} 
else 
{echo "<script>location.href = ('index.php?page=pel&pages=judul_view');</script>";}
}
////
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
if(@$_POST['cari']=="")
{
$qry_1 = mysql_query("SELECT * FROM tb_judul order by judul_training asc LIMIT $posisi,$batas");
if (mysql_num_rows($qry_1)==0){
	echo "<tr><td align='center' colspan='16'><b>Kosong</b></td></tr>";}
else{
$no = $posisi+1;
while ($arr_1=mysql_fetch_array($qry_1))
{
$qry_pelatihan=mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan=$arr_1[1]");
$arr_pela=mysql_fetch_array($qry_pelatihan);
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td align='center'>$arr_pela[0]</td>
    <td align='center'>$arr_1[3]</td>
    <td align='center'>$arr_1[4]</td>
    <td align='center'>$arr_1[5]</td>
    <td>
	<div style='border:0px solid gray;height:50px; overflow-y:auto'>
	$arr_1[6]
	</div>
	</td>
    <td>
	<div style='border:0px solid gray;height:50px; overflow-y:auto'>
	$arr_1[7]
	</div>
	</td>
    <td align='center'>
    <a href='index.php?page=pel&pages=judul_update&update_id=$arr_1[0]' class='update' title='Edit Judul'></a>
    <a href='index.php?page=pel&pages=judul_view&hapus_id=$arr_1[0]' onclick='return konfirmasi_judul(\"".$arr_1['judul_training']."\")' class='delete' title='Hapus Judul'></a>
    </td>
  </tr>
";
$no++;
}
$qry_2 = mysql_query("SELECT * FROM tb_judul");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=pel&pages=judul_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=pel&pages=judul_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";



}
}
else
{
	
	
	
$qry_cari = mysql_query("SELECT * FROM tb_judul where judul_training LIKE '%$_POST[cari]%' order by judul_training asc ");
if(mysql_num_rows($qry_cari)==0)
{echo "<tr><td colspan='8' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>";}
else
{
while ($arr_1=mysql_fetch_array($qry_cari))
{
$qry_pelatihan_cari=mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan=$arr_1[1]");
$arr_pela_cari=mysql_fetch_array($qry_pelatihan_cari);
echo "
  <tr>
    <td>$arr_1[2]</td>
    <td>$arr_pela_cari[0]</td>
    <td align='center'>$arr_1[3]</td>
    <td align='center'>$arr_1[4]</td>
    <td align='center'>$arr_1[5]</td>
	<td>
	<div style='border:0px solid gray;height:50px; overflow-y:auto'>
	$arr_1[6]
	</div>
	</td>
    <td>
	<div style='border:0px solid gray;height:50px; overflow-y:auto'>
	$arr_1[7]
	</div>
	</td>
    <td>
    <a href='index.php?page=pel&pages=judul_update&update_id=$arr_1[0]' class='update' title='Edit Judul'></a>
    <a href='index.php?page=pel&pages=judul_view&hapus_id=$arr_1[0]' onclick='return konfirmasi_judul(\"".$arr_1['judul_training']."\")' class='delete' title='Hapus Judul'></a>
    </td>
  </tr>
";
}
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>".mysql_num_rows($qry_cari)."</b></p>
";
}



}
?>


</div>
<?php }?>