<?php
session_start();
include "connect.php";
require_once "ceklogin.php";
?>
<?php
if($_POST['peserta']==''){
echo "<script>alert('Masukkan data yang benar');
location.href=('javascript:self.history.back();');
</script>";
}else{
$name=date("Y-m-d")."_".date("Ymdhis");
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$name.'_data_sertifikat_training.csv');
include "sertifikat_p_insert.php";
$output = fopen('php://output', 'w');
$kolom=array('No Sertifikat', 'Tanggal Sertifikat', 'Nilai','Kerjasama','Keterangan','Nama Peserta','Judul Training','Nama Instruktur','No Barcode','Director');
fputcsv($output, $kolom);

$no_peserta=$_POST['peserta'];
$id_pilih_judul=$_POST['id_pilih_judul'];
foreach($no_peserta as $ni => $nama_peserta){


$query_sertifikat=mysql_query("select *from tb_sertifikat where no_peserta='$no_peserta[$ni]' and id_pilih_judul=$id_pilih_judul[$ni]");
while($view_data=mysql_fetch_array($query_sertifikat)){
$id_sertifikat=$view_data['0'];
$query_tampil=mysql_query("
SELECT tb_sertifikat.no_sertifikat, tb_sertifikat.tgl_sertifikat, tb_nilai.nilai, tb_sertifikat.kerjasama, tb_sertifikat.ket, tb_daftar_peserta.nama, tb_judul.judul_training, tb_instruktur.nama,tb_sertifikat.no_barcode,tb_director.director
FROM tb_sertifikat, tb_daftar_peserta, tb_pilih_judul, tb_judul, tb_instruktur, tb_nilai,tb_director
WHERE 
tb_daftar_peserta.no_peserta = tb_sertifikat.no_peserta
AND tb_pilih_judul.id_pilih_judul = tb_sertifikat.id_pilih_judul
AND tb_pilih_judul.id_judul = tb_judul.id_judul
AND tb_instruktur.id_instruktur = tb_sertifikat.id_instruktur
AND tb_sertifikat.id_nilai = tb_nilai.id_nilai
and tb_director.id_director = tb_sertifikat.id_director
AND tb_sertifikat.id_sertifikat ='$id_sertifikat' ORDER BY `no_sertifikat` ASC");
while ($row = mysql_fetch_array($query_tampil)){
$tampil_data_sertifikat=array($row['0'],$row['1'],$row['2'],$row['3'],$row['4'],$row['5'],$row['6'],$row['7'],$row['8'],$row['9'],$row['10']);
fputcsv($output, $tampil_data_sertifikat);
	}
}
}
}
?>
