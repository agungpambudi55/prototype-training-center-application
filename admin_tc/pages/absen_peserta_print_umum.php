<?php
session_start();
include("connect.php");
require_once "ceklogin.php";
?>

<style>

#print{ background:url(../style/images/printer.png) no-repeat 1px 0px ; width:0; padding:14px; border:0px solid gray; position:fixed; top:6px; right:50%; cursor:pointer;}
#print:hover{ opacity:0.4}
</style>
 	<link rel="shortcut icon" href="../style/images/favicon.png"/>
<?php
$no=1;

$get=$_GET['nama_kelas'];
$sql=mysql_query("SELECT tb_detail_pelatihan.pelatihan, tb_tempat.nama_tempat, tb_instruktur.nama ,tb_jenis_peserta.jenis_peserta
FROM tb_tempat,tb_kelas, tb_peserta_kelas, tb_instruktur, tb_daftar_peserta, tb_jadwal_training, tb_judul, tb_pilih_judul, tb_jenis_peserta, tb_detail_pelatihan
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_pilih_judul.id_pilih_judul = tb_peserta_kelas.id_pilih_judul
AND tb_kelas.id_kelas = tb_peserta_kelas.id_kelas
AND tb_kelas.id_instruktur = tb_instruktur.id_instruktur
AND tb_kelas.id_kelas = tb_peserta_kelas.id_kelas
AND tb_kelas.id_tempat = tb_tempat.id_tempat
AND tb_peserta_kelas.no_peserta = tb_daftar_peserta.no_peserta
AND tb_kelas.id_jadwal_training = tb_jadwal_training.id_jadwal_training
AND tb_jadwal_training.id_details_pelatihan=tb_detail_pelatihan.id_details_pelatihan
AND tb_kelas.id_kelas ='$get'
and tb_daftar_peserta.id_jenis_peserta=tb_jenis_peserta.id_jenis_peserta
and tb_jenis_peserta.jenis_peserta like '%".$_GET['jenispeserta']."%'");

$row=mysql_fetch_array($sql);
if(!$row){
	echo "<script>alert ('jenis peserta umum tidak ada');location.href = ('javascript:self.history.back();');</script>";
	}else{
@$pelatihan=$row['42'];
@$arr_peserta=$row['no_peserta'] ;


?><br>
<title>Print Absen Umum</title>
<p style="margin:-10; padding:0; border:0px solid gray; padding:0px 0px 10px 10px; font-size:20px; color:#C33">
<a href="javascript:self.history.back();"><img src="../style/images/back.png" style="background-size:30px;"></a>
<p id="print" onclick="window.print()">
</p>
</p>
<table border="0"  cellpadding="0" cellspacing="0" style="margin:auto; font-size:15px; font-family:'Times New Roman', Times, serif;" width="100%">

  <col width="30" />
  <col width="200" />
  <col width="212" />
  <col width="151" />
  <col width="114" />
  <col width="173" />
  <tr>
    <td width="105" align="left" valign="top">
        <?php
$qry_aks=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_aks=mysql_fetch_array($qry_aks);
echo 
"<img src='../$arr_aks[photo]' style='width:90px; height:90px;'/>";
?>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="30"><a name="RANGE!A1:F43" id="RANGE!A1:F43"></a></td>
        </tr>
      </table></td>
    <td colspan="5" align="right"><strong>POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</strong><br />
Kampus ITS Sukolilo, Surabaya 60111<br /> Telp. : 031-5947280 (hunting)<br />Fax : 031-5946114</td>

  </tr>
  

  
 <tr>
    <td colspan="6" align="center"><strong>DAFTAR HADIR</strong></td>
  </tr>
  <tr>
    <td colspan="6" align="center"><strong>Pelatihan 
<?php echo $row['0'] ?> </strong></td>
  </tr>
  
  <tr>
    <td colspan="6"><strong>Hari, Tanggal:</strong></td>
  </tr>
  <tr>
    <td colspan="6"><strong>Tempat:     <?php echo $row['1']; ?></strong></td>
  </tr>
  
    <table border="1"  cellpadding="0" cellspacing="0" style="margin:auto; font-size:15px; font-family:'Times New Roman', Times, serif;" width="100%">
  <tr>
    <td align="center"><strong>No</td>
    <td colspan="3" align="center"><strong>Materi (Jumlah Jam)</strong></td>
    <td align="center"><strong>Instruktur</strong></td>
    <td align="center"><strong>Tanda Tangan</strong></td>
  </tr>
  <tr>
    <td height="100" align="center"><?php echo $no;?></td>
    <td colspan="3">&nbsp;</td>        
    <td><?php echo $row['2'];?></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <br>
  <tr>
    <td colspan="6"><strong>Peserta :</strong></td>
  </tr>
    <table border="1"  cellpadding="0" cellspacing="0" style="margin:auto; font-size:15px; font-family:'Times New Roman', Times, serif;" width="100%">
  <tr bgcolor="#999999">
    <td align="center"><strong>No</strong></td>
    <td align="center"><strong>Nama</strong></td>
    <td align="center"><strong>NIP/NIK</strong></td>
    <td align="center"><strong>Golongan</strong></td>
    <td align="center"><strong>Instansi</strong></td>
    <td align="center"><strong>Tanda Tangan</strong></td>
  </tr>
  <?php 
$peserta=mysql_query("SELECT tb_daftar_peserta.nama, tb_daftar_peserta.instansi_peserta
FROM tb_tempat,tb_kelas, tb_peserta_kelas, tb_instruktur, tb_daftar_peserta, tb_jadwal_training, tb_judul, tb_pilih_judul, tb_jenis_peserta
WHERE tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_pilih_judul.id_pilih_judul = tb_peserta_kelas.id_pilih_judul
AND tb_kelas.id_kelas = tb_peserta_kelas.id_kelas
AND tb_kelas.id_instruktur = tb_instruktur.id_instruktur
AND tb_kelas.id_kelas = tb_peserta_kelas.id_kelas
AND tb_kelas.id_tempat = tb_tempat.id_tempat
AND tb_peserta_kelas.no_peserta = tb_daftar_peserta.no_peserta
AND tb_kelas.id_jadwal_training = tb_jadwal_training.id_jadwal_training
AND tb_kelas.id_kelas ='$get'
and tb_daftar_peserta.id_jenis_peserta=tb_jenis_peserta.id_jenis_peserta
and tb_jenis_peserta.jenis_peserta like '%".$_GET['jenispeserta']."%'");
while($arr=mysql_fetch_array($peserta)){
 ?>
    <tr>

    <td align='center'><?php echo $no?></td>
    <td><?php echo $arr['0'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php echo $arr['1'];?></td>
    <?php 
	
	if($no %2==0){
		echo "<td align='center'>$no</td>";
	} else {
		echo "<td align='left'>$no</td>";
	}
$no++;
}

	?>
     
</table>
<br>
    <TR>
    <td colspan="6"><strong>Catatan :</strong><br>.............................................................<br>.............................................................<br>.............................................................</td>
    </TR>
  </tr>
 
</table>
<?php }?>