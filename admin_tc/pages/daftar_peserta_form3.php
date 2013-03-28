	<?php
	$nopeserta=$_GET['nopeserta'];
	$select=mysql_query("select *from tb_daftar_peserta where no_peserta='$nopeserta'");
	$view=mysql_fetch_array($select);
	$no=$view['no_peserta'];
	$sql_judul_training=mysql_query("SELECT *
	FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
	WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
	AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
	AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
	AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$sql_biaya_judul=mysql_query("SELECT biaya
	FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
	WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
	AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
	AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
	AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$sql_jumlah=mysql_query("SELECT sum(biaya)as biaya
	FROM tb_judul_jenis_peserta, tb_judul, tb_pilih_judul, tb_daftar_peserta
	WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
	AND tb_judul_jenis_peserta.id_judul=tb_pilih_judul.id_judul
	AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
	AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta AND tb_daftar_peserta.no_peserta = '$no'");
	$jumlah=mysql_fetch_array($sql_jumlah);
	@$idjudulpeserta=$jumlah['id_judul_jenis_peserta'];
	?>
    
    
<div id="content">
<div id="form">
<form method="post" target='_blank' action="index.php?page=peserta&pages=daftar_peserta_proses_insert_kwitansi&nopeserta=<?php echo $nopeserta; ?>">
<ul>
	<li><p style="background:url(style/images/progress3.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 110px; font-size:20px; font-weight:bold; color:#333333">Cetak Kwitansi</p></li>
    <li>
	<label>Nama</label><p style="margin:0px 0px 5px 0px; padding:7px 0px "><?php echo $view['nama']; ?></p>
    </li>
    <li>
	<label>Jenis Peserta</label><p style="margin:0px 0px 5px 0px; padding:7px 0px "><?php 
	$queryjenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=".$view['id_jenis_peserta']."");
	$tmp=mysql_fetch_array($queryjenis); echo $tmp['jenis_peserta']; ?></p>
    </li>    
    <li>
    <label>Judul Pelatihan</label>

	<ol style="border:0px solid gray; width:810px; margin:8px 0px 0px 150px; padding:0">
		<?php
        while($r=mysql_fetch_array($sql_judul_training))
        {
        $idjenisjudul=$r['id_judul_jenis_peserta'];
        ?>

    	<li style="border:0px solid gray; height:20px"><?php echo $r['judul_training']; echo "<input type='hidden' name='judul[$idjenisjudul]' value='$idjenisjudul'/>";?>
        <?php 
        $be=mysql_fetch_array($sql_biaya_judul);
		$uang = number_format($be['biaya'],0,'','.');
        ?>
        <p style="margin:-17px 0px 0px 650px; padding:0; border:0px solid gray"><?php echo "Rp ".$uang.",00." ?></p>
		<?php }?>
        </li>



    </ol>
    <p style="border-top:3px solid gray; margin:20px 0px 0px 125px; padding:10px 0px 0px 0px; width:850px; font-weight:bold">
    Jumlah Total
    <p style="border:0px solid gray; margin:-20px 0px 0px 800px; width:275px; padding:0; font-weight:bold">
   <?php 
	$jumlahuang = number_format($jumlah['biaya'],0,'','.');
	echo "<b>Rp ".$jumlahuang.",00</b>"; 
	?>
    </p>
    </p>
    <script>
	function myFunction(dis)
	{
	var y=dis;
	var x=<?php echo $jumlah['biaya']; ?> * y / 100;
	var z=<?php echo $jumlah['biaya']; ?> - x;
	var demoP=document.getElementById("demo")
	var i=document.getElementById("biaya");
	i.innerHTML="Rp " + x + ",00";
	demoP.innerHTML="Rp " + z + ",00";
	}
	</script>
    
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-10px">
    <div style="margin-top:0px; margin-left:126px; float:left; font-weight:bold">Discount : <input type="text" name="discount" onkeyup="myFunction(this.value)"  style="width:45px; text-align:center" value="0"/> % </div>
    <div style="float:left; margin-left:530px; margin-top:0px; font-weight:bold" id="biaya"></div>
    </div>
    <div style="clear:both"></div>
    <div style="border:0px solid red; position:relative; overflow:hidden; margin-top:-4px;">
    <div style="float:left;margin-left:126px; margin-top:3px; font-weight:bold">Bayar</div>
    <div style="float:left; margin-left:632px; margin-top:3px; font-weight:bold" id="demo"></div>
    </div>
    <button class="submit">Cetak</button>
    </li>
    </form>
</ul>
</div>

</div>
