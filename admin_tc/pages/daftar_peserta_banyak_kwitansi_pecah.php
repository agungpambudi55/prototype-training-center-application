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
<?php
$no_peserta=$_GET['peserta'];
?>

<style type="text/css">
.p{ border:0px solid gray; margin:0px 0px 0px 131px; padding:7px 0px 0px 0px}
</style>
<div id="content">
<div id="form">
<ul>
	<li><p style="background:url(style/images/progress3.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 110px; font-size:20px; font-weight:bold; color:#333333">Cetak Kwitansi</p></li>
<?php
foreach($no_peserta as $k1 => $hasil)
{
	$query_judu_nama=mysql_query("select * from tb_judul,tb_pilih_judul where tb_judul.id_judul=tb_pilih_judul.id_judul and tb_pilih_judul.no_peserta='$hasil
' GROUP BY tb_pilih_judul.no_peserta") or die(mysql_error());
	while($row =mysql_fetch_array($query_judu_nama))
	$query1 = mysql_query("select nama from tb_daftar_peserta where no_peserta = ".$row['no_peserta']."");
	$xx=mysql_fetch_array($query1);
	$nam=$xx['nama'];
	{
		echo "<li><label>Nama</label><p class='p'> <b>:</b> </p>";
		echo"<p style='border:0px solid gray; margin:-27px 0px 0px 140px; padding:7px 0px 0px 0px'>$nam</p></li>
		
		<li><label>Judul Pelatihan</label><p class='p'> <b>:</b> ";
		$queryy=mysql_query("select * from tb_judul,tb_pilih_judul where tb_judul.id_judul=tb_pilih_judul.id_judul and tb_pilih_judul.no_peserta='$hasil'") or die(mysql_error());
		$t=1;
		while($asdas=mysql_fetch_array($queryy))
		{
			if($t==(mysql_num_rows($queryy)))
			{
				echo "<b></b> </p><p style='border:0px solid gray; margin:-27px 0px 10px 140px; padding:7px 0px 0px 0px'>".$asdas['judul_training']."</p></li>";
				echo "<a href='pages/daftar_peserta_banyak_kwitansi.php?nopeserta=$hasil' target='_blank'><button class='button_a'>Cetak</button></a>";
			}
			elseif($t==1)
			{
				echo "</p><p  style='border:0px solid gray; margin:-27px 0px 10px 140px; padding:7px 0px 0px 0px'>".$asdas['judul_training']."</p></li><li> <p class='p'>";
			}
			else
			{
				echo "<b></b> </p><p style='border:0px solid gray; margin:-27px 0px 10px 140px; padding:7px 0px 0px 0px'>".$asdas['judul_training']."</p></li><li><p class='p'>";
			}
			$t++;
		}
	}
}
}
?>