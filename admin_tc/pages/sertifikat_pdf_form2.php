<style type="text/css">
.xx{ border:0px solid gray; margin:0px 0px 0px 130px; padding:7px 0px 0px 0px}
</style>
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
Sertifikat</div>
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<?php
$query_pelatihan	=mysql_query("SELECT * FROM tb_judul,tb_detail_pelatihan where tb_judul.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan and tb_judul.id_judul='".$_GET['id_judul']."'");
$row_pelatihan	=mysql_fetch_array($query_pelatihan);
$thn=date("Y");
$query=mysql_query("SELECT max(id_sertifikat) as idmax from tb_sertifikat");
$view_max=mysql_fetch_array($query);
$max=$view_max['idmax'];
@$nilai++;
$idst=$max + $nilai;
?>
<div id="form">
<form method="post" action="index.php?page=sertifikat_pdf_proses" name="formsertifikat">
<ul>
    <li>
	<label>No Sertifikat</label>
   <input type="text" name="nosertifikat" class="input" value="<?php echo $thn."/".$idst."/".$row_pelatihan['id_details_pelatihan']."/".$_GET['id_judul']; ?>" />
    </li>
    <li>
    <label>No Barcode</label>
	<input type="text" class="input" name="nobarcode" value=" <?php echo $thn.$idst.$row_pelatihan['id_details_pelatihan'].$_GET['id_judul'].$_GET['nopeserta']; ?>" maxlength="13" required="required" minlength="9"  />
    <span class="notification">No. Barcode Min 9 Max 13</span>
    
    </li>
    <li>
	<label>Nama Peserta</label>
  	<?php
	@$query_peserta=select_where(tb_daftar_peserta,no_peserta,@$_GET['nopeserta']);
	$row_peserta=mysql_fetch_array($query_peserta);
	echo "<p class='xx'><b>:</b> $row_peserta[nama]</p>";
	?>
    <input type="hidden" name="peserta" value="<?php echo $row_peserta['no_peserta']; ?>" />
    </li>
    <li>
	<label>Judul Pelatihan</label>
	<?php
    @$query_judul=select_where(tb_judul,id_judul,@$_GET['id_judul']);
    $row_id_judul=mysql_fetch_array($query_judul);
    echo "<p class='xx'><b>:</b> $row_id_judul[judul_training]</p>";
    ?>
    <input type="hidden" name="id_pilih_judul" value="<?php echo $_GET['id_pilih_judul']; ?>" />
    </li>
    <li>
	<label>Tanggal Pelatihan</label>
	<p class="xx"><b>:</b> <?php echo date("Y/m/d"); ?></p>
    </li>
    <li>
	<label>Nilai</label>
	<?php
	@$query_nilai=select_where(tb_nilai,id_nilai,@$_GET['id_nilai']);
	$row_nilai=mysql_fetch_array($query_nilai);
	echo "<p class='xx'><b>:</b> $row_nilai[nilai]</p>";
	?>
    <input type="hidden" name="id_nilai" value="<?php echo $_GET['id_nilai']; ?>" />
    </li>
    <li>
	<label>Instruktur</label>
	<?php
	@$query_instruktur=select_where(tb_instruktur,id_instruktur,@$_GET['id_instruktur']);
	$row_instruktur=mysql_fetch_array($query_instruktur);
	echo "<p class='xx'><b>:</b> $row_instruktur[nama]</p>";
	?>
    <input type="hidden" name="id_instruktur" value="<?php echo $_GET['id_instruktur']; ?>" />
    </li>
    <li>
    <label>Direktur</label>
   	<?php 
	$query = mysql_query("select * from tb_director where id_director = '1'");
	$arr=mysql_fetch_array($query);
	$direktur=$arr['director'];
	echo "<p class='xx'><b>:</b> $direktur</p>";
	?>
 	<input type="hidden" name="director" class="input" value="1" />
    </li>
    <li>
	<label>Keterangan</label>
    <textarea class="textarea" name="keterangan"/></textarea>
    <span class="notification">Masukkan Keterangan Sertifikat</span>
    </li>
	<li>
	<label>Kerjasama</label>
    <textarea class="textarea" name="kerjasama"/></textarea>
    <span class="notification">Masukkan Kerjasama Pelatihan</span>
    </li>
    <li style="padding-top:40px;">
	<input type="submit" name="formsertifikat" class="submit" value="Buat Sertifikat"></button>
    </li>
</ul>
</form>
</div>

</div>
<?php }?>