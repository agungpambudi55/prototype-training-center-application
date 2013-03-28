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
<p class="backk"><a href="index.php?page=nilai&pages=nilai_view_tanpa_status" class="back"></a></p>
<div id="form">
<ul>
<form method="post" action="index.php?page=nilai_insert_proses_tanpa_status">
<?php
@$getpelatihan	=$_GET['pelatihan'];
@$judul_training	=$_GET['judul_training'];
@$kelas			=$_GET['kelas'];
$qry_pelatihan=mysql_query("SELECT id_details_pelatihan, pelatihan FROM tb_detail_pelatihan order by pelatihan");
$judul_training_tc=mysql_query("
select tb_pilih_judul.id_judul, tb_judul.judul_training from tb_pilih_judul, tb_judul where tb_judul.id_judul=tb_pilih_judul.id_judul and tb_judul.id_details_pelatihan='".@$_GET['pelatihan']."' group by judul_training");
$qry_kelas=mysql_query("SELECT distinct tb_kelas.id_kelas, tb_kelas.nama_kelas FROM tb_peserta_kelas, tb_pilih_judul, tb_kelas where tb_peserta_kelas.id_pilih_judul=tb_pilih_judul.id_pilih_judul and tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and tb_pilih_judul.id_judul=$judul_training");
?>
    <li style=" padding-bottom:5px;">
    <label>Pelatihan</label>
    <select name="pelatihan" class="option" onchange="location.href=('index.php?page=nilai&pages=nilai_insert_tanpa_status&pelatihan='+this.value)">
    
    <option value=""></option>
	<?php
    while($row_pel=mysql_fetch_array($qry_pelatihan)){
    if($getpelatihan==$row_pel['id_details_pelatihan']){
    ?>
    <option value="<?php echo $row_pel['id_details_pelatihan']; ?>" selected="selected"><?php echo $row_pel['pelatihan']; ?></option>
    <?php
    }else{
    ?>
    <option value="<?php echo $row_pel['id_details_pelatihan']; ?>"><?php echo $row_pel['pelatihan']; ?></option>
    <?php
    }
    }
    ?>
    </select>
    </li>
    <li style=" padding-bottom:5px;">
    <label>Judul Training</label>
    <select name="judul_training" class="option" onchange="self.location=('index.php?page=nilai&pages=nilai_insert_tanpa_status&pelatihan=<?php echo $getpelatihan; ?>&judul_training='+this.value)">
    <option value=""></option>
    <?php
    while($row_judul=mysql_fetch_array($judul_training_tc)){
    if($judul_training==$row_judul['id_judul']){
    ?>
    <option value="<?php echo $row_judul['id_judul']; ?>" selected><?php echo $row_judul['judul_training']; ?></option>
    <?php
    }
    else
    {
    ?>
    <option value="<?php echo $row_judul['id_judul']; ?>"><?php echo $row_judul['judul_training']; ?></option>
    <?php
    }
    }
    ?>
    </select>
	</li>
    <li>
    <label>Kelas</label>
    <select name="kelas" class="option" onchange="location.href=('index.php?page=nilai&pages=nilai_insert_tanpa_status&pelatihan=<?php echo $getpelatihan; ?>&judul_training=<?php echo $judul_training; ?>&kelas='+this.value)">
    <option value=""></option>
    <?php
    while($row_kelas=mysql_fetch_array($qry_kelas)){
    if($kelas==$row_kelas['id_kelas']){
    ?>
    <option value="<?php echo $row_kelas['id_kelas']; ?>" selected="selected"><?php echo $row_kelas['nama_kelas']; ?></option>
    <?php
    }else{
    ?>
    <option value="<?php echo $row_kelas['id_kelas']; ?>"><?php echo $row_kelas['nama_kelas']; ?></option>
    <?php
    }
    }
    ?>
    </select>
    </li>
    </ul>
<?php
if($getpelatihan and $judul_training and $kelas){
$query_muncul_peserta=mysql_query("SELECT * FROM tb_peserta_kelas, tb_daftar_peserta WHERE tb_peserta_kelas.id_kelas=$_GET[kelas] AND tb_daftar_peserta.no_peserta = tb_peserta_kelas.no_peserta");
echo "<br />
	<table class='table'>
	<thead>
	<tr>
	<th width='70%'>Nama</th>
  	<th width='10%'>Nilai</th>
	</tr></thead>";
while($view= mysql_fetch_array($query_muncul_peserta)) 
{ 
		$query_cek=mysql_query("select * from tb_nilai where id_judul=$judul_training and no_peserta=".$view['no_peserta']."");
		$cek_judul_nopeserta=mysql_fetch_array($query_cek);
		if($cek_judul_nopeserta['no_peserta']==$view['no_peserta'] and $cek_judul_nopeserta['id_judul']==$judul_training)
		{}
		else
		{
		?>	
		<tr>
		<td><input type='hidden' value='<?php echo $view['no_peserta']; ?>' name='peserta[<?php echo $view['no_peserta']; ?>]'><?php echo $view['nama']; ?></td>
		<td><input type'text' name='nilai[<?php echo $view['no_peserta']; ?>]' placeholder='Masukkan nilai 1-100' class="input" style="width:220px;" required pattern="\-?\d+(\.\d{0,})?"/></td>
		</tr>
		<?php
		@$i++;
	}
}
}
else if($getpelatihan=='' or $judul_training=='' or $kelas=='')
{
echo "<p style='border:0px solid gray; text-align:center; margin:10px 0px 0px 5px; width:352px; padding:10px 2px; background:#FD9200; color:#FFF'>Pelatihan atau judul training atau kelas belum dipilih!</p>";
}
?>
</table>
<input type="submit" class="submit" name="formsimpan"  value="Simpan"/>
</form>
</div>
</div>
<?php }?>