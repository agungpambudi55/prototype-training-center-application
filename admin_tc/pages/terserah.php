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


<div id="content">
<div id="form">
 <?php
$jumlah=$_GET['jumlah'];
$no_peserta=$_GET['no_peserta'];
foreach($no_peserta as $arr => $value) :
$ids[] = 'no_peserta['.$arr.']=' . $value;
endforeach;
$idp = implode( '&', $ids );


if ($kat=$_GET['kategori']){
$id_jenis=$_GET['id_jenis'];
$no_peserta=$_GET['no_peserta'];
$cek_jenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$array_jenis=mysql_fetch_array($cek_jenis);
echo "Jenis peserta : $array_jenis[jenis_peserta]<br>";

/*ARRAY PECAH ---DOOOR !
--------------------------*/

echo "Nama Group :";
foreach($no_peserta as $key => $value)
{
//echo $value."<br>";
//echo $value;
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$value'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];
$instansi=$qry1_array['instansi_peserta'];
$tgl_daftar=$qry1_array['tanggal_daftar'];
$gabung=$instansi." - ".$tgl_daftar;
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
echo $gabung;
echo "<br>";
echo "<br>";
?>

<!-- END ARRAY PECAH
---------------------------------->

<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_banyak_p_pilih_judul&jenis=<?php echo $id_jenis ?>&jumlah=<?php echo $jumlah?>&<?php echo $idp?>&kategori=<?php echo $_GET['kategori'];?>">
<select name="kategori" class="option" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_banyak_form_pilih_judul&id_jenis=<?php echo $_GET['id_jenis']?>&jumlah=<?php echo $jumlah ?>&<?php echo $idp; ?>&kategori='+this.value">
    <option value="">Pilih Pelatihan</option>
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
    <br><br>
    <div style="border-bottom:2px solid #999; width:350px">
    <li style=' margin:0px 0px 0px 0px; padding:1px;list-style:none;'>
	<input type='checkbox'  id='tombolCheck' value='Check All' onClick='Check();'>Pilih Semua Judul</li>
    </div>
  
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
	
	<li style=' margin:0px 0px 0px 0px; padding:1px;border:0px solid gray; list-style:none;'>
	<input type='checkbox' name='judul[]' value='$idjudul'>$view_judul[judul_training]</li>";
	
	}?><button type="submit" class="submit" name="formpilihjudul">Lanjut</button></form>
     <?php 
     
	 }else {
     ?>
<?php
$id_jenis=$_GET['idjenis'];
$jumlah=$_GET['jumlah'];
$cek_jenis=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenis");
$array_jenis=mysql_fetch_array($cek_jenis);
echo "Jenis peserta : $array_jenis[jenis_peserta]<br>";
echo "Nama :";
foreach($no_peserta as $key => $value)
{
//echo $value."<br>";
echo $value;
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

<?php echo" $nama /";?>

<?php }
echo "<br>";
echo "<br>";

foreach($no_peserta as $key => $value) :
$ids[] = 'no_peserta['.$key.']=' . $jumlah;
endforeach;
$id = implode( '&', $no_peserta );

?>
<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_form_pilih_judul">
<select name="kategori" class="option" onChange="self.location='index.php?page=peserta&pages=daftar_peserta_banyak_form_pilih_judul&id_jenis=<?php echo $_GET['idjenis']?>&jumlah=<?php echo $jumlah ?>&<?php echo $idp; ?>&kategori='+this.value">
    <option value="">Pilih Pelatihan</option>
     <?php 
	 	$sql_pelatihan=mysql_query("select * from tb_detail_pelatihan");
		while($array_pelatihan=mysql_fetch_array($sql_pelatihan)) {
		$idpelatihan=$array_pelatihan['0'];
		$pelatihan=$array_pelatihan['2'];
	 echo "<option value='$idpelatihan'>$pelatihan</option>";
	 }
	 echo "</select>"; }?>
 </select><br>

</form>
</div>

</div>
