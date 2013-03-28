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
Buku Tamu
</div>
<div id="content">
<p class="backk"><a href="index.php?page=buku_tamu_view" class="back"></a></p>
<?php
$qry=mysql_query("select * from tb_tamu where id_tamu=$_GET[i]");
mysql_query("update tb_tamu set baca=1 where id_tamu=$_GET[i]");
$arr=mysql_fetch_array($qry);
?>
<div id="pesan" style="border:0px solid gray">
<?php
echo"
<ul>
	<li>Tanggal<p class='p'>$arr[tanggal]</p></li>
	<li>Pengirim<p class='p'>$arr[nama]</p></li>
	<li>Email<p class='p'>$arr[email]</p></li>
	<li>No. Telpon<p class='p'>$arr[telepon]</p></li>
	<li>Topik<p class='pp'>$arr[topik]</p></li>
	<li>Pesan<p class='ppp'>$arr[pesan]</p></li>
</ul>";
?>
</div>
</div>
<?php }?>