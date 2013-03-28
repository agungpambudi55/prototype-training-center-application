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
<SCRIPT language=JavaScript>
function Check(){
         allCheckList = document.getElementById("formCheck").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("tombolCheck").value == "Check All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("tombolCheck").value = "Uncheck All";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("tombolCheck").value = "Check All";
         }
}
</script>


<style type="text/css">
.p{ border:0px solid gray; margin:0px 0px 0px 132px; padding:7px 0px 0px 0px}
</style>
<div id="content">
<div id="form">
<ul style="border:0px solid gray; min-height:200px;">
	<li><p style="background:url(style/images/progress2.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 130px; font-size:20px; font-weight:bold; color:#333333">Pilih Judul</p></li>

 <?php
$jumlah=$_GET['jumlah'];
$no_peserta=$_GET['no_peserta'];
foreach($no_peserta as $arr => $value) :
$ids[] = 'no_peserta['.$arr.']=' . $value;
endforeach;
$idp = implode( '&', $ids );


if (@$kat=$_GET['kategori']){
$id_jenis=$_GET['id_jenis'];
$no_peserta=$_GET['no_peserta'];
$cek_jenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$array_jenis=mysql_fetch_array($cek_jenis);
echo "<li><label>Jenis peserta </label> <p class='p'><b>:</b> $array_jenis[jenis_peserta]<br>";

/*ARRAY PECAH ---DOOOR !
--------------------------*/

echo "<li><label>Nama Group</label> <p class='p'><b>:</b>";
foreach($no_peserta as $key => $value)
{
//echo $value."<br>";
//echo $value;
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$value'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];
$instansi=$qry1_array['instansi_peserta'];
$tgl_daftar=$qry1_array['tanggal_daftar'];
$gabung=$instansi." - ".tanggal($tgl_daftar);
$id_jenpes=$qry1_array['id_jenis_peserta'];
$sql2=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$sql2_array=mysql_fetch_array($sql2);
$jenpes=$sql2_array['1'];
$sql3=mysql_query("
SELECT tb_detail_pelatihan.pelatihan, tb_judul.judul_training
FROM tb_judul_jenis_peserta, tb_detail_pelatihan, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_detail_pelatihan.id_details_pelatihan = tb_judul.id_details_pelatihan
AND tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul = tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta
AND tb_daftar_peserta.no_peserta = '$value'
");?>

<?php }
echo $gabung."</p></li>";
?>

<!-- END ARRAY PECAH
---------------------------------->
<li><label>Pilih Pelatihan</label>
<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_banyak_p_pilih_judul&jenis=<?php echo $id_jenis ?>&jumlah=<?php echo $jumlah?>&<?php echo $idp?>&kategori=<?php echo $_GET['kategori'];?>">
<select name="kategori" class="option" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_form2_banyak&id_jenis=<?php echo $_GET['id_jenis']?>&jumlah=<?php echo $jumlah ?>&<?php echo $idp; ?>&kategori='+this.value">
    <option value=""></option>
     <?php 
	$sql_pelatihan=mysql_query("select * from tb_detail_pelatihan");
	while($array_pelatihan=mysql_fetch_array($sql_pelatihan)) {
	$idpelatihan=$array_pelatihan['0'];
	$pelatihan=$array_pelatihan['2'];
	if($idpelatihan==$_GET['kategori']){
		echo "<option value='$idpelatihan' selected>$pelatihan</option>";
	 	} else {
		 echo "<option value='$idpelatihan'>$pelatihan</option>";
	 	}
	 }
	 echo "</select>"; ?>
  
     </li>     
<li><label>Pilih Judul</label><p class="p" style="border-bottom:2px solid gray">
	<input type='checkbox'  id='tombolCheck' value='Check All' onClick='Check();'>Pilih Semua Judul</p></li>
  
    		<?php $judul=mysql_query(" SELECT tb_judul.id_judul, tb_judul.judul_training, tb_judul_jenis_peserta.biaya
            FROM tb_judul, tb_jenis_peserta, tb_judul_jenis_peserta
            WHERE tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
            AND tb_jenis_peserta.id_jenis_peserta = tb_judul_jenis_peserta.id_jenis_peserta
            AND tb_judul.id_details_pelatihan ='$kat'
            AND tb_jenis_peserta.id_jenis_peserta ='$id_jenis'
            ORDER BY tb_judul.judul_training");
	while ($view_judul=mysql_fetch_array($judul)){
		$idjudul=$view_judul['0'];
	echo "
	
	<li style=' margin:0px 0px 0px 133px; padding:1px;border:0px solid gray; list-style:none;'>
	<input type='checkbox' name='judul[]' value='$idjudul'>$view_judul[judul_training]</li>";
	
	}echo "</ul>";?><button type="submit" class="submit" name="formpilihjudul">Lanjut</button></form>
     <?php 
     
	 }else {
     ?>
<?php
$id_jenis=$_GET['idjenis'];
$jumlah=$_GET['jumlah'];
$cek_jenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$array_jenis=mysql_fetch_array($cek_jenis);
echo "<li><label>Jenis peserta</label><p class='p'><b>:</b>  $array_jenis[jenis_peserta]</li>";
echo "<li><label>Nama</label><p class='p'><b>:</b> </p>";
foreach($no_peserta as $key => $value)
{
//echo $value."<br>";
//echo $value;
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$value'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];

$id_jenpes=$qry1_array['id_jenis_peserta'];
$sql2=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$sql2_array=mysql_fetch_array($sql2);
$jenpes=$sql2_array['1'];
$sql3=mysql_query("
SELECT tb_detail_pelatihan.pelatihan, tb_judul.judul_training
FROM tb_judul_jenis_peserta, tb_detail_pelatihan, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_detail_pelatihan.id_details_pelatihan = tb_judul.id_details_pelatihan
AND tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul = tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta
AND tb_daftar_peserta.no_peserta = '$value'
");?>

<?php echo "<p style='border:0px solid gray; margin:-27px 0px 27px 140px; padding:7px 0px 0px 0px'>".$nama."</p>";?>

<?php }

foreach($no_peserta as $key => $value) :
$ids[] = 'no_peserta['.$key.']=' . $jumlah;
endforeach;
$id = implode( '&', $no_peserta );

?>
<li><label>Pilih Pelatihan</label>
<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_form2_banyak">
<select name="kategori" class="option" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_form2_banyak&id_jenis=<?php echo $_GET['idjenis']?>&jumlah=<?php echo $jumlah ?>&<?php echo $idp; ?>&kategori='+this.value">
    <option value=""></option>
     <?php 
	 	$sql_pelatihan=mysql_query("select * from tb_detail_pelatihan");
		while($array_pelatihan=mysql_fetch_array($sql_pelatihan)) {
		$idpelatihan=$array_pelatihan['0'];
		$pelatihan=$array_pelatihan['2'];
	 echo "<option value='$idpelatihan'>$pelatihan</option>";
	 }
	 echo "</select>"; }?>
 </select>
</form>
</li>
</ul>
</div>
</div>
<?php }?>