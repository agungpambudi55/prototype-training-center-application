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

<div class="title_page">
Buku Tamu</div>
<div id="content">
<p style="border:0px solid gray; padding:10px 0px; margin:0px 0px 10px 0px">
<a href="index.php?page=buku_tamu_delete10" class="button_a"  onclick="return hapus_10()">Hapus 10 Terakhir</a>&nbsp;
<a href="index.php?page=buku_tamu_delete_all" class="button_a"  onclick="return hapus_semua()">Hapus Semua</a>
</p>
<?php
if(isset($_GET['ref']))
{ if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>
    <th width="14%">Tanggal</th>
    <th width="17%">Nama</th>
    <th width="15%">Email</th>
    <th width="7%">No. Telpon</th>
    <th width="20%">Topik</th>
    <th width="25%">Pesan</th>
    <th width="2%">Aksi</th>
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
$no = $posisi+1;
$qry1=mysql_query("SELECT * FROM tb_tamu order by id_tamu desc LIMIT $posisi,$batas");
if (mysql_num_rows($qry1)==0)
{echo "<tr><td colspan='7' align='center'><b>Kosong</b></td></tr></table>";}
else
{
while($arr1=mysql_fetch_array($qry1))
{
	if (strlen($arr1['topik']) > 27) { $topik = substr($arr1['topik'], 0, 27); $topik .= '...';}else {$topik = $arr1['topik'];}
	if (strlen($arr1['pesan']) > 35) { $pesan = substr($arr1['pesan'], 0, 35); $pesan .= '...';}else {$pesan = $arr1['pesan'];}
	if ($arr1['baca']==0){$baca="<a href='index.php?page=buku_tamu_baca&i=$arr1[0]' class='message'></a>";}else{$baca="<a href='index.php?page=buku_tamu_baca&i=$arr1[0]' class='message_read'></a>";}
echo "
  <tr>
    <td>$arr1[tanggal]</td>
    <td>$arr1[nama]</td>
    <td>$arr1[email]</td>
    <td>$arr1[telepon]</td>
    <td>$topik</td>
    <td>$pesan</td>
    <td align='center'>$baca<a href='index.php?page=buku_tamu_delete&i=$arr1[0]'  onclick='return bktm(\"".$arr1['nama']."\")' class='delete'></a></td>
  </tr>
";
}
echo "
</table>
";
$qry_2 = mysql_query("SELECT * FROM tb_tamu");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=buku_tamu_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=buku_tamu_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
?>
</div>
<?php }?>