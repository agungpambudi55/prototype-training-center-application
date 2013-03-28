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
<style type="text/css">
.p{ border:0px solid gray; margin:0px 0px 0px 131px; padding:7px 0px 0px 0px}
</style>
<div id="content">
<div id="form">
<form method="post" action="index.php?page=peserta&pages=daftar_peserta_banyak_proses_kwitansi&jumlah=<?php echo $_GET['jumlah'];?>" target="_blank">
<ul>
	<li><p style="background:url(style/images/progress3.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 110px; font-size:20px; font-weight:bold; color:#333333">Cetak Kwitansi</p></li>
<?php
$id_jenis=$_GET['idjenis'];
$jumlah=$_GET['jumlah'];
$judul=$_GET['judul'];
$no_peserta=$_GET['no_peserta'];
$cek_jenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$array_jenis=mysql_fetch_array($cek_jenis);
?>
<?php foreach($no_peserta as $arr => $val) :
$ids[] = 'no_peserta['.$arr.']=' . $val;
endforeach;
$idp = implode( '&', $ids );
?>

<?php foreach($judul as $ju => $idjud) :
$idj[] = 'judul['.$ju.']=' . $idjud;
endforeach;
$jjjj = implode( '&', $idj );


?>

<li>

<input type="hidden" name="jumlah" value="<?php echo $jumlah?>" />

	<label>Jenis Peserta</label><p class="p">
    <?php echo "<b>:</b> $array_jenis[jenis_peserta]</p></li>";
echo "<li><label>Nama</label><p class='p'> <b>:</b>";
echo "<ol>";
foreach($no_peserta as $key => $value)
{ 
//echo $value."<br>";
echo "<input type='hidden' value='$value' name='id_peserta[]' />";
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$value'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];
echo"<li style='border:0px solid gray; margin:-27px 0px 27px 120px; padding:7px 0px 0px 0px'>$nama</li>";
$sql_judul_training=mysql_query("SELECT *
	FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
	WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
	AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
	AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
	AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$value'");
	while($id_judul_jenis_peserta = mysql_fetch_array($sql_judul_training))
	{ echo "<input type='hidden' value='$id_judul_jenis_peserta[0]' name='id_judul_jenis_peserta[]' />"; }
	//$idjudulpeserta=$jumlah['id_judul_jenis_peserta'];
 }
echo "</ol>";
echo "</p></li><li style='margin-top:-25px'><label>Judul pelatihan</label>";
$jum=0;
echo "<ol>";
foreach($judul as $isijudul => $jud)
{
	echo "<input type='hidden' value='$jud' name='id_judul[]' />";
	$sql_biaya_judul=mysql_query("select * from tb_judul_jenis_peserta, tb_pilih_judul where
	tb_judul_jenis_peserta.id_judul= tb_pilih_judul.id_judul and
	tb_judul_jenis_peserta.id_jenis_peserta=$_GET[idjenis] and
	tb_pilih_judul.no_peserta=$value and 
	tb_pilih_judul.id_judul=$jud") or die(mysql_error());
	$be=mysql_fetch_array($sql_biaya_judul);
	$quer_judul=mysql_query("select * from tb_judul where id_judul=$jud ");
	echo "<li style='border:0px solid gray; margin:0px 0px 0px 120px; padding:5px 0px 0px 0px'>";
	while($array_judul=mysql_fetch_array($quer_judul))
	{
		$judul_training=$array_judul['judul_training'];
		echo $judul_training;
	}	
 	$jum=$be['biaya'] * $jumlah;
	$juma[] = $jum;
	$uang = number_format($jum,0,'','.');
	echo "<p style='border:0px solid gray; margin-left:600px; margin:-21px 0px 0px 590px; padding:0px 0px 0px 0px'>Rp. ".$uang.",00</p></li>";
}
echo "</ol>";
echo "</li>";
echo "<input type='hidden' name='jumlah_judul' value='".count($_GET['judul'])."' />";
for($h=0;$h<=(count($juma))-1;$h++)
{
	@$asdf += $juma[$h];
}
$duit = number_format($asdf,0,'','.');
echo "<p style='margin:0px 0px 0px 134px; padding:5px 0px 0px 0px; border-top:2px solid gray'>Jumlah Biaya <b>:</b> <p style='border:0px solid gray; margin:-15px 0px 0px 753px; padding:0px 0px 0px 0px'>Rp. $duit,00</p></p>";


?>
<script>
function myFunction(dis)
	{
	var y=dis;
	var x=<?php echo $asdf ?> * y / 100;
	var z=<?php echo $asdf ?> - x;
	var demoP=document.getElementById("demo")
	var i=document.getElementById("biaya");
	i.innerHTML="Rp. " + x + ",00";
	demoP.innerHTML="Rp. " + z + ",00";
	var discount=document.getElementById("d");
	discount.innerHTML=y;
	}
	
	</script>
    
&nbsp;Discount <input type="text" id="discount" name="discount" onkeyup="myFunction(this.value)" style="width:50px; height:20px; text-align:center; margin:0px 0px 0px 73px" value="0"/> % </div>
     <div style=" border:0px solid gray; margin:-30px 0px 0px 752px;height:30px" id="biaya"></div>
    <div style=" border:0px solid  gray; margin:0px 0px 0px 5px">Bayar</div>
    <div style=" border:0px solid  gray; margin:-20px 0px 0px 752px; height:20px; font-weight:bold" id="demo">
    </div>
    <input type="submit" class="submit" name="" value="Cetak Sendiri" />

<input type="button" id="d" class="submit" onclick="location.href=('index.php?page=peserta&pages=cetak_p_group_kuitansi&<?php echo $jjjj; ?>&<?php echo $idp; ?>&discount=' + document.getElementById('discount').value)" value="Cetak Group" /></button>

</form>
<?php }?>