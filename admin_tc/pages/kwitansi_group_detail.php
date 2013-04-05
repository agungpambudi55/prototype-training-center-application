<?php
/*require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{ */
?>
<style type="text/css">
#kwitansi_det{ border:0px solid gray; margin:5px 0px 0px 0px }
#kwitansi_det ul{ border:0px solid gray; list-style:none; margin:0; padding:0}
#kwitansi_det ul li{border:0px solid gray; padding:7px 0px }
#print{ width:0; padding:14px; border:0px solid gray; position:fixed; top:10px; right:50%; cursor:pointer;}
</style>
<div id="content">


<?php
	$no_kuitansi=$_GET['i'];
	$sql=mysql_query("
	select* from tb_daftar_peserta,tb_group_kuitansi where tb_daftar_peserta.no_peserta=tb_group_kuitansi.no_peserta 
and tb_group_kuitansi.no_group_kuitansi='$no_kuitansi' group by tb_group_kuitansi.no_peserta");
	//$view	=mysql_fetch_array($sql);
	$sql_1=mysql_query("
	SELECT *
FROM tb_group_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_group_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_group_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_group_kuitansi.no_group_kuitansi ='$no_kuitansi' group by tb_judul.judul_training");
$sql_biaya=mysql_query("SELECT *
FROM tb_group_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_group_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_group_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_group_kuitansi.no_group_kuitansi = '$no_kuitansi'");
$sql_jumlah=mysql_query("SELECT sum(biaya) as biaya
FROM tb_group_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_group_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_group_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_group_kuitansi.no_group_kuitansi = '$no_kuitansi'");
$jumlah=mysql_fetch_array($sql_jumlah);
$sql1=mysql_query("select sum(discount) as discount from tb_daftar_peserta,tb_group_kuitansi where tb_daftar_peserta.no_peserta=tb_group_kuitansi.no_peserta and tb_group_kuitansi.no_group_kuitansi='$no_kuitansi' group by tb_group_kuitansi.no_peserta ");
$nama=mysql_fetch_array($sql1);
?>

<p style="margin:0; border:0px solid gray; padding:0px 5px 10px 5px;">
<a href="index.php?page=peserta&pages=kwitansi" class="back"></a>
<a href="pages/kwitansi_group_bay_kui.php?i=<?php echo $no_kuitansi; ?>" target="_new"><img src="style/images/printer.png" style="float:right; cursor:pointer;"></a>
<p class="backk"></p>
</p>
<div style="font-size:16px; font-weight:bold; margin-top:-30px;">Detail Kwitansi</div>
<div id="kwitansi_det">
<ul>
	<li>Nama Instansi<p style="margin:-18px 0px 0px 125px; padding:0; border:0px solid gray"><b>:</b>
   
    &nbsp; <?php $r=mysql_fetch_array($sql)
	;echo "$r[instansi_peserta]";
		$t=$r['id_jenis_peserta'];  ?></p></li>
	<li>Kode Kwitansi<p style="margin:-18px 0px 0px 125px; padding:0; border:0px solid gray"><b>:</b>&nbsp;  <?php  echo $no_kuitansi; ?></p></li>
    <li>Jenis Peserta<p style="margin:-18px 0px 0px 125px; padding:0; border:0px solid gray"><b>:</b>&nbsp; 
	<?php $o=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta='$t'");
	$m=mysql_fetch_array($o);
	echo $m['jenis_peserta'];?></p></li>
     <li>Judul Pelatihan
	<ol style="border:0px solid gray; width:810px; margin:-20px 0px 0px 155px; padding:0">
	  <?php
	while($b=mysql_fetch_array($sql_1))
	{
	$be=mysql_fetch_array($sql_biaya);
	$uang = number_format($be['biaya'],0,'','.');
	
	echo "
    	<li style='border:0px solid gray; height:20px; padding:3px 0px'>$b[judul_training]
        <p style='margin:-16px 0px 0px 650px; padding:0; border:0px solid gray'>Rp. $uang,00</p>
        </li>
	";
	}
	?>   
    </ol>
    <p style="border-top:3px solid gray; margin:10px 0px 0px 135px; padding:10px 0px 0px 0px; width:850px; font-weight:bold">
    Jumlah Total
    <p style="border:0px solid gray; margin:-20px 0px 0px 805px; width:175px; padding:0; font-weight:bold">
    <?php $jumlahk = number_format($jumlah['biaya'],0,'','.');?>
    Rp. <?php echo $jumlahk  ?>,00
    </p>
    </p>
    <?php
$query_biaya_total=mysql_query("SELECT sum(biaya) as biaya
FROM tb_group_kuitansi, tb_judul_jenis_peserta, tb_jenis_peserta, tb_daftar_peserta, tb_judul
WHERE tb_group_kuitansi.id_judul_jenis_peserta = tb_judul_jenis_peserta.id_judul_jenis_peserta
AND tb_daftar_peserta.no_peserta = tb_group_kuitansi.no_peserta
AND tb_daftar_peserta.id_jenis_peserta = tb_jenis_peserta.id_jenis_peserta
AND tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
AND tb_group_kuitansi.no_group_kuitansi = '$no_kuitansi'");
	$row_biaya=mysql_fetch_array($query_biaya_total);
	$biaya_tr	=$row_biaya['biaya'];
	$discount	=$nama['discount'];
	$kueri		=$biaya_tr * $discount / 100;
	$y			=$biaya_tr - $kueri;
	?>
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-10px">
    <div style="margin-top:0px; margin-left:135px; float:left; font-weight:bold">Discount : <?php echo $discount; ?> % </div>
    <div style="float:left; margin-left:565px; margin-top:-2px; font-weight:bold"><?php echo "Rp. ".number_format($kueri,0,'','.').",00"; ?></div>
    </div>
    <div style="clear:both"></div>
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-4px;">
    <div style="float:left;margin-left:135px; margin-top:3px; font-weight:bold">Bayar</div>
    <div style="float:left; margin-left:630px; margin-top:3px; font-weight:bold"><?php echo "Rp. ".number_format($y,0,'','.').",00"; ?></div>
    </div>
   
 </li>
</ul>
</div>
</div>
<?php// }?>