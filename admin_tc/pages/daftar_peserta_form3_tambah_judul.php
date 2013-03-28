<style type="text/css">
#daf_det{ border:0px solid gray; margin:0px 0px 0px 10px }
#daf_det ul{ border:0px solid gray; list-style:none; margin:0; padding:0}
#daf_det ul li{border:0px solid gray; padding:10px 0px }
</style>

<div id="content">
<?php 
$no_peserta=$_GET['nopeserta'];
$id_judul=$_GET['Values'];
$id_jenis_peserta=$_GET['id_jenpes'];
$sql2=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis_peserta");
$sql2_array=mysql_fetch_array($sql2);
$jenpes=$sql2_array['1'];
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$no_peserta'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];
if ($id_judul=='')
{
echo "'<script>alert ('Pilih judul pelatihan');location.href = ('javascript:self.history.back();'); </script>'";
}
else
{
}
?>
<div id="daf_det">
<form method="post" name="form" action="index.php?page=peserta&pages=daftar_peserta_proses_insert_kwitansi_addjudul&nopeserta=<?php echo $no_peserta; ?>" target="_blank">
<ul>
	<li><p style="background:url(style/images/progress_a1.png) no-repeat; padding:20px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 110px; font-size:20px; font-weight:bold; color:#333333">Cetak Kwitansi</p></li>
	<li>Nama<p style="margin:-18px 0px 5px 125px; padding:0; border:0px solid gray"><b>:</b>&nbsp; <?php echo $nama; ?></p></li>
    <li>Jenis Peserta<p style="margin:-18px 0px 5px 125px; padding:0; border:0px solid gray"><b>:</b>&nbsp; <?php echo $jenpes;?></p></li>
    <li>Judul Pelatihan
	<ol style="border:0px solid gray; width:810px; margin:-20px 0px 5px 155px; padding:0">
	<?php
  foreach($id_judul as $id_judul_array)
	{
		$qry2=mysql_query("select judul_training from tb_judul where id_judul=$id_judul_array");
		while($qry2_array=mysql_fetch_array($qry2))
		{
			$qry3=mysql_query("select * from tb_judul_jenis_peserta where id_judul=$id_judul_array and id_jenis_peserta=$id_jenis_peserta");
			$qry3_array=mysql_fetch_array($qry3);
			$uang = number_format($qry3_array['biaya'],0,'','.');
			echo "
			<li style='border:0px solid gray; height:20px; padding:3px 0px'>$qry2_array[0]
       		<p style='margin:-16px 0px 5px 650px; padding:0; border:0px solid gray'>Rp. $uang,00</p>
       		</li>
			";

			echo "<input type='hidden' name='idjuduljenis[".$qry3_array['id_judul_jenis_peserta']."]' value='".$qry3_array['id_judul_jenis_peserta']."'/>";

		}
	}
	?>    
    </ol>
    <p style="border-top:3px solid gray; margin:10px 0px 5px 135px; padding:10px 0px 0px 0px; width:850px; font-weight:bold">
    Jumlah Total
    <p style="border:0px solid gray; margin:-20px 0px 5px 805px; width:175px; padding:0; font-weight:bold">
    <?php
	$x = 0;
	foreach($id_judul as $id_judul_array)
	{
		$qry3=mysql_query("select biaya from tb_judul_jenis_peserta where id_judul=$id_judul_array 
							and id_jenis_peserta=$id_jenis_peserta");
		while($qry3_array=mysql_fetch_array($qry3))
		{
			$x=$qry3_array['0'] + $x;
		}
	}
	$jmlh	=number_format($x,0,'','.');
	?>
    Rp. <?php echo $jmlh; ?>,00
    </p>
    </p>
    <script>
	function myFunction(dis)
	{
	var y=dis;
	var x=<?php echo $x; ?> * y / 100;
	var z=<?php echo $x; ?> - x;
	var demoP=document.getElementById("demo")
	var i=document.getElementById("biaya");
	i.innerHTML="Rp " + x + ",00";
	demoP.innerHTML="Rp " + z + ",00";
	}
	</script>
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-10px">
    <div style="margin-top:0px; margin-left:133px; float:left; font-weight:bold">Discount : <input type="text" name="discount" onkeyup="myFunction(this.value)"  style="width:45px; text-align:center" value="0"/> % </div>
    <div style="float:left; margin-left:534px; margin-top:0px; font-weight:bold" id="biaya"></div>
    </div>
    <div style="clear:both"></div>
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-4px;">
    <div style="float:left;margin-left:133px; margin-top:3px; font-weight:bold">Bayar</div>
    <div style="float:left; margin-left:634px; margin-top:3px; font-weight:bold" id="demo"></div>
    </div>

 </li>
 <li>
 <input type="submit" class="submit" name="form" value="Cetak" />
 </li>
</ul>
</form>
</div>
</div>