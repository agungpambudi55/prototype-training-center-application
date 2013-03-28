<?php
require_once "ceklogin.php";
require_once "cekmodul.php";
if($cekmodul < 1)
{
echo "<div class='modul_hakakses'>Anda tidak diperbolehkan masuk disini!</div>";
}
else
{
$cek_query=mysql_query("select * from tb_peserta_kelas where id_kelas= '".$_GET['kelas']."'");

$query2 = mysql_query("select nama_kelas from tb_kelas where id_kelas = '".$_GET['kelas']."'");
$b=mysql_fetch_array($query2);
$id_kelas=$b['nama_kelas'];

$query5 = mysql_query("select tgl from tb_kelas where id_kelas = '".$_GET['kelas']."'");
$x=mysql_fetch_array($query5);
$tgl=$x['tgl'];
$tgl1=tanggal($tgl);
?>
<div class="title_page">
Kelas <?php echo $id_kelas ?> <p style="margin:0; border:0px solid gray; float:right;"> Tanggal Pembuatan Kelas: <?php echo $tgl1 ?>  </p></div>
<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<?php


$query3 = mysql_query("SELECT * FROM tb_kelas,tb_instruktur where tb_kelas.id_instruktur=tb_instruktur.id_instruktur and  tb_kelas.id_kelas='".$_GET['kelas']."'");
$c=mysql_fetch_array($query3);
$ins=$c['nama'];


$query4 = mysql_query("SELECT * FROM tb_kelas,tb_tempat where tb_kelas.id_tempat=tb_tempat.id_tempat and  tb_kelas.id_kelas='".$_GET['kelas']."'");
$d=mysql_fetch_array($query4);
$tempat=$d['nama_tempat'];

$query6 = mysql_query("SELECT * FROM tb_kelas,tb_jadwal_training where tb_kelas.id_jadwal_training=tb_jadwal_training.id_jadwal_training and  tb_kelas.id_kelas='".$_GET['kelas']."'");
$arr_jadwal=mysql_fetch_array($query6);
$tgl11=tanggal($arr_jadwal['tgl1']);
$tgl22=tanggal($arr_jadwal['tgl2']);
$jam1=$arr_jadwal['jam_mulai'];
$jam2=$arr_jadwal['jam_selesai'];
?>
<p style="margin:0;border:0px solid gray; padding:5px 0px 25px 0px; font-size:17px; color:#333333">
Instruktur : <?php echo $ins ?><br />
Tempat Pelatihan : <?php echo $tempat ?><br />
Tanggal Pelatihan : <?php echo "$tgl11 s/d $tgl22"; ?><br />
Jam Pelatihan : <?php echo"$jam1 s/d $jam2";?>
</p>
 <table class="table">
    <tr>
    <th width="20%" >Nama Peserta</th>
    </tr>
<?php
@$noo = $posisi+1;
$i=1;
while($baris=mysql_fetch_array($cek_query)){
$id=$baris['1'];
$no=$baris['2'];


$query1 = mysql_query("select nama from tb_daftar_peserta where no_peserta = '$no'");
$b=mysql_fetch_array($query1);
$no_peserta=$b['nama'];


echo "
	<tr>
		<td ><a href='index.php?page=histori_detail&i=$no' class='link1' style='height:17px'>$no_peserta</a></td>
    </tr>";
   $noo++;
$i++; 
}
?>
</div>
<?php }?>