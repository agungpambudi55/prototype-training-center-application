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
<script type="text/javascript">
function Check(){
         allCheckList = document.getElementById("formCheck").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("tombolCheck").value == "All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("tombolCheck").value = "Un All";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("tombolCheck").value = "All";
         }
}
</script>

<div class="title_page">
Form Sertifikat CSV
</div>
<div id="content">
<p class="backk"><a href="index.php?page=sertifikat_view" class="back"></a></p>

<select name="judul" name="cat" class="option"  style=" float:left" onchange="window.location='index.php?page=sertifikat_excel_form1&idjudul=' + this.value">
<option value=""></option>
<?php
$query1=mysql_query("
SELECT *
FROM tb_pilih_judul, tb_judul, tb_nilai
WHERE tb_pilih_judul.id_judul = tb_judul.id_judul
AND tb_nilai.id_judul = tb_pilih_judul.id_judul
GROUP BY tb_judul.judul_training");
while($array_judul=mysql_fetch_array($query1)){
if($_GET['idjudul']==$array_judul['id_judul']){
?>
<option value="<?php echo $_GET['idjudul']; ?>" selected="selected"><?php echo $array_judul['judul_training']; ?></option>
<?php
}else{
?>
<option value="<?php echo $array_judul['id_judul']; ?>"><?php echo $array_judul['judul_training']; ?></option>
<?php
}
}
?>
</select>
<div style="clear:both"></div>

<div>
<br />
Kerjasama
<input type="checkbox" value="isi" id="x" />
Keterangan
<input type="checkbox" value="isi" id="ketcek" />

<br /><br />

<table border="0" class="table">
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
?>

<form id="formCheck" method="POST" name="setifikatcsv" action="pages/sertifikat_convert_csv.php">

<tr>
<th width="6%" align="center"><input type="button" id="tombolCheck" value="All" onClick="Check();" ></th>
<th width="34%">Nama</th>
<th width="20%">Pelatihan</th>
<th width="35%">Judul Training</th>
</tr>
<?php
while($query=mysql_fetch_array($sql5)){
$sql_pilih=mysql_query("select *from tb_pilih_judul where id_judul=".$query['id_judul']." and no_peserta=".$query['no_peserta']."");
$view_pilih=mysql_fetch_array($sql_pilih);
$sql_instruktur	=mysql_query("SELECT * FROM tb_kelas, tb_peserta_kelas,tb_instruktur where tb_kelas.id_kelas=tb_peserta_kelas.id_kelas and tb_instruktur.id_instruktur=tb_kelas.id_instruktur and tb_peserta_kelas.no_peserta='".$query['no_peserta']."'");
$view_instruktur=mysql_fetch_array($sql_instruktur);
//cek data peserta
$query_cek_peserta=mysql_query("select *from tb_sertifikat where id_pilih_judul = ".$view_pilih['id_pilih_judul']." and no_peserta=".$query['no_peserta']."");
$cek_row=mysql_fetch_array($query_cek_peserta);
if($cek_row['id_pilih_judul']==$view_pilih['id_pilih_judul'] and $cek_row['no_peserta'] == $query['no_peserta']){
}
else
{
?>
<tr>
<td align="center"><input type="checkbox" name="peserta[<?php echo $query['no_peserta']; ?>]" value="<?php echo  $query['no_peserta']; ?>" /></td>
<input type='hidden' name='id_pilih_judul[<?php echo $query['no_peserta']; ?>]' value='<?php echo $view_pilih['id_pilih_judul']; ?>'>
<input type='hidden' name='id_instruktur[<?php echo $query['no_peserta']; ?>]' value='<?php echo $view_instruktur['id_instruktur']; ?>'>
<input type='hidden' name='id_nilai[<?php echo $query['no_peserta']; ?>]' value='<?php echo $query['id_nilai']; ?>'/>  
<input type="hidden" value="<?php echo $_GET['idjudul']; ?>" name="idjudul"/>
<td><?php echo $query['nama']; ?></td>
<td><?php echo $query['pelatihan']; ?></td>
<td><?php echo $query['judul_training'];?></td>
<?php 
}
}
}else{}
?>
</tr>
</table>
<br />
</div>
<div>
<table border="0">
<tr id="xxx">
<td>Kerjasama</td>
<td><textarea name="kerjasama" class="text"></textarea>
<script type="text/javascript">
$("#xxx").hide();
$("#x").click(function(){$("#xxx").toggle();})
</script>
</td>
</tr>
<tr id="ket">
<td>Keterangan</td>
<td><textarea name="keterangan" class="text" id="ket"></textarea>
<script type="text/javascript">
$("#ket").hide();
$("#ketcek").click(function(){$("#ket").toggle();})
</script>
</td>
</tr>
</table>
<br />	
<input type="submit" value="Buat CSV" class="excel" name="setifikatcsv" />
</form>
</div>


</div>
</body>
</html>
<?php }?>

