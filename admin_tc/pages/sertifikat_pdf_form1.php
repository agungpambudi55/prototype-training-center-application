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
<p class="backk"><a href="index.php?page=sertifikat_view" class="back"></a></p>

<form method="post">
<div style="border:0px solid gray; padding:10px 0px 20px 0px ">
<select name="judul" class="option" onchange="window.location='index.php?page=sertifikat_pdf_form1&idjudul=' + this.value">
<option value="">Judul Pelatihan</option>
<?php
$query1=mysql_query("SELECT *FROM tb_pilih_judul, tb_judul, tb_nilai WHERE tb_pilih_judul.id_judul = tb_judul.id_judul AND tb_nilai.id_judul = tb_pilih_judul.id_judul GROUP BY tb_judul.judul_training");
while($array_judul=mysql_fetch_array($query1)){
if($_GET['idjudul']==$array_judul['id_judul']){
?>
<option value="<?php echo $array_judul['id_judul']; ?>" selected="selected"><?php echo $array_judul['judul_training']; ?></option>
<?php
}else{
?>
<option value="<?php echo $array_judul['id_judul']; ?>"><?php echo $array_judul['judul_training']; ?></option>
<?php
}
}
?>
</select>
</div>
<table class="table">
  <tr>
    <th width="30%">Nama</th>
    <th width="30%">Pelatihan</th>
    <th width="20%">Judul</th>
    <th width="6%">Aksi</th>
  </tr>
<?php
if(@$_GET['idjudul']){
$idjudul=$_GET['idjudul'];
$sql5=mysql_query("
SELECT *
FROM tb_detail_pelatihan, tb_judul, tb_daftar_peserta, tb_nilai
WHERE tb_detail_pelatihan.id_details_pelatihan = tb_nilai.id_details_pelatihan
AND tb_judul.id_judul = tb_nilai.id_judul
AND tb_daftar_peserta.no_peserta = tb_nilai.no_peserta
AND tb_nilai.status = 'lulus'
AND tb_judul.id_judul = '$idjudul'");
$no=1;
while($query=mysql_fetch_array($sql5)){
$sql_pilih=mysql_query("select *from tb_pilih_judul where id_judul=".$query['id_judul']." and no_peserta=".$query['no_peserta']."");
$view_pilih=mysql_fetch_array($sql_pilih);
$sql_instruktur=mysql_query("SELECT *FROM tb_kelas, tb_peserta_kelas WHERE tb_kelas.id_kelas = tb_peserta_kelas.id_kelas AND tb_peserta_kelas.no_peserta =".$query['no_peserta']."");
$view_instruktur=mysql_fetch_array($sql_instruktur);
//cek data peserta
$query_cek_peserta=mysql_query("select *from tb_sertifikat where id_pilih_judul = ".$view_pilih['id_pilih_judul']." and no_peserta=".$query['no_peserta']."");
$cek_row=mysql_fetch_array($query_cek_peserta);
if($cek_row['id_pilih_judul']==$view_pilih['id_pilih_judul'] and $cek_row['no_peserta'] == $query['no_peserta']){
}else{
?>
<tr>
    <td>
    <!--tampung value-->
    <input type="hidden" name="no_peserta" value="<?php echo $query['no_peserta']; ?>" />
    <input type='hidden' name='id_pilih_judul' value='<?php echo $view_pilih['id_pilih_judul']; ?>'>
    <input type='hidden' name='id_instruktur' value='<?php echo $view_instruktur['id_instruktur']; ?>'>
    <input type='hidden' name='id_nilai' value='<?php echo $query['id_nilai']; ?>'/>  
    <input type="hidden" value="<?php echo $_GET['idjudul']; ?>" name="idjudul"/>
    <?php echo $query['nama']; ?>
    </td>
    <td>
    <?php echo $query['pelatihan']; ?>
    </td>
    <td><?php echo $query['judul_training'];?></td>
    <td align="center"><a href="index.php?page=sertifikat_pdf_form2&id_pilih_judul=<?php echo $view_pilih['id_pilih_judul']; ?>&nopeserta=<?php echo $query['no_peserta']; ?>&id_instruktur=<?php echo $view_instruktur['id_instruktur']; ?>&id_nilai=<?php echo $query['id_nilai']; ?>&id_judul=<?php echo $_GET['idjudul']; ?>" class="buat_ser"></a></td>
</tr>
<?php 
$no++;
}
}
}else{
	}
?>


</div>
<?php }?>