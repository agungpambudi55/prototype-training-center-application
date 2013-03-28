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
<div style="border:0px solid gray; margin:5px 0px 10px 0px; ">
<a href="index.php?page=absen&pages=absen_peserta_insert"><button class="button_a">Tambah Data</button></a>
</div>
<?php
if(isset($_GET['ref']))
{
 if($_GET['ref']=="add")
	{echo "<div class='notifhijau'>Data berhasil ditambah! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
else if($_GET['ref']=="del")
	{echo "<div class='notifmerah'>Data berhasil dihapus! <span class='notifclose' onclick='hid(this)'>x</span></div>";	}
}
?>
<table class="table">
  <tr>	
			<th width="40%">Nama Kelas</th>
            <th width="35%">Nama Instruktur</th>
			<th width="15%">Jumlah Peserta</th>
			<th width="10%">Status Absen</th>		
  </tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
{

$qry_1 = mysql_query("select * from tb_kelas order by nama_kelas asc LIMIT $posisi,$batas");

if(mysql_num_rows($qry_1)==0)
{echo "<tr><td colspan='6' align='center'><b>Kosong</b></td></tr></table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>0</b></p>";}
else
{
	
$tb_absen=mysql_query("select * from tb_absen_peserta");
$array=mysql_fetch_array($tb_absen);
$idkelas=$array['id_kelas'];

$no = $posisi+1;
while ($baris=mysql_fetch_array($qry_1))
{
$id_kelas=$baris['0'];
$nama_kelas = $baris['5'];

$idistruktur=$baris['id_instruktur'];
$in=mysql_query("select * from tb_instruktur where id_instruktur='$idistruktur'");
$a=mysql_fetch_array($in);
$instruktur=$a['1'];

$quer=mysql_query("
	SELECT DISTINCT tb_daftar_peserta.no_peserta FROM tb_daftar_peserta, tb_kelas, tb_peserta_kelas where 
	tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta and 
	tb_peserta_kelas.id_kelas=tb_kelas.id_kelas and 
	tb_kelas.id_kelas='$id_kelas' order by nama asc
	");
$total_jumlah = mysql_num_rows($quer);

echo "
  <tr>
    <td><a style='text-decoration:none;' href='index.php?page=absen&pages=absen_peserta_view_sortir&nama_kelas=$nama_kelas' class='link1'>$nama_kelas</a> </td>
	<td>$instruktur</td>
    <td align='center'>$total_jumlah</td>";
$qry= "select * from tb_absen_peserta where id_kelas='$id_kelas'";
$result = mysql_query($qry);
$total_jumlah = mysql_num_rows($result);

	?>
    
    <td align="center"><?php if ($total_jumlah=='0'){
	 echo "<font color='red'><b>Belum Diabsen</b></font>";}
	 else {
		 echo "<font color='green'><b>Sudah Diabsen</b></font>";
	
 }
 }?>
 
</td></tr>
<?php
$qry_2 = mysql_query("select * from tb_kelas order by nama_kelas asc");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=absen&pages=absen_peserta_view&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=absen&pages=absen_peserta_view&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
}
?>


</div>
<?php }?>