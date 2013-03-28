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
			<th>Nama Kelas</th>
			<th>Jumlah Peserta</th>
		</tr>
<?php
$batas = 15	;
@$halaman = $_GET['i'];
if (empty($halaman)){$posisi = 0;$halaman = 1;}else {$posisi = ($halaman-1) * $batas;}
{

$result = mysql_query("select * from tb_kelas order by nama_kelas asc LIMIT $posisi,$batas");
while($brs=mysql_fetch_array($result))
{
$id_kelas=$brs['0'];
$nama_kelas = $brs['5'];

$quer=mysql_query("
	SELECT DISTINCT tb_daftar_peserta.no_peserta FROM tb_daftar_peserta, tb_kelas, tb_peserta_kelas where 
	tb_peserta_kelas.no_peserta=tb_daftar_peserta.no_peserta and 
	tb_peserta_kelas.id_kelas=tb_kelas.id_kelas and 
	tb_kelas.id_kelas='$id_kelas' order by nama asc
	");
$total_jumlah = mysql_num_rows($quer);

echo "		
	<tr>
    <td>
		<a style='text-decoration:none;' href='index.php?page=absen&pages=absen_peserta_print_pre1&nama_kelas=$id_kelas' class='link1'>$nama_kelas</a>
</td>
<td align='center'>$total_jumlah</td>
    </tr>";
}
?>	
<?php
$qry_2 = mysql_query("select * from tb_kelas order by nama_kelas asc");
$jumdata = mysql_num_rows($qry_2);
$jmlhal = ceil($jumdata/$batas);
echo "</table>
<p style='border:0px solid gray; font-size:13px'>Jumlah Data = <b>$jumdata</b></p>
";
echo "<div class='box_pagination' align='center'>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=absen&pages=absen_peserta_print_pre&i=$prev' class='prev'></a>";}
else 
{echo "<a href='#' class='prev_d'></a>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " halaman <b>".$i."</b> dari <b>".$jmlhal."</b> halaman ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=absen&pages=absen_peserta_print_pre&i=$next' class='next'></a>";
}
else{echo "<a href='#' class='next_d'></a>";}
echo "</div>";
}
?>
	 </table>
</div>
<?php }?>