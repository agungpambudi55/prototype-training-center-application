<?php
$id_judul=$_GET['judul'];
$no_peserta=$_GET['no_peserta'];
$discount=$_GET['discount'];
$jumlah=count($no_peserta);
$queryi = "SELECT max(no_group_kuitansi) as maxID FROM tb_group_kuitansi WHERE no_group_kuitansi LIKE 'GK%'";
$hasili = mysql_query($queryi);
$data  = mysql_fetch_array($hasili);
 $idMax = $data['maxID'] ;
$noUrut = (int) substr($idMax, 3, 4);
$date=date("Y/m/d");
$noUrut++;
$d=$discount/$jumlah;
for($i=1;$i < $jumlah;$i++){
foreach($no_peserta as $key => $value){
echo $newID = "GK".$jenis . sprintf("%03s", $noUrut);
$value;
$cekinstasni=mysql_query("select * from tb_daftar_peserta where tb_daftar_peserta.no_peserta='$value' group by tb_daftar_peserta.instansi_peserta");
$a_instansi=mysql_fetch_array($cekinstasni);
$idjenis=$a_instansi['1']."<br>";
$instasni=$a_instansi['instansi_peserta'];
foreach($id_judul as $keyjudul => $judul) {
$juduljenis=mysql_query("select * from tb_judul_jenis_peserta, tb_judul where tb_judul.id_judul=tb_judul_jenis_peserta.id_judul AND tb_judul.id_judul='$judul' and tb_judul_jenis_peserta.id_jenis_peserta='$idjenis'");
$a_juduljenis=mysql_fetch_array($juduljenis);
$id_jenis=$a_juduljenis['0'];
$a_juduljenis['2']."<br>";
$a_juduljenis['3']."<br>";
$a_juduljenis['4']."<br>";
$insert_group=mysql_query("INSERT into tb_group_kuitansi VALUES ('','$newID','$value','$id_jenis','$d','$date')");
}
}

}
foreach($no_peserta as $arr => $val) :
$ids[] = 'no_peserta['.$arr.']=' . $val;
endforeach;
$idp = implode( '&', $ids );

foreach($id_judul as $ju => $idjud) :
$idj[] = 'judul['.$ju.']=' . $idjud;
endforeach;
$jjjj = implode( '&', $idj );

if($insert_group){$insert_baykui=mysql_query("insert into tb_bay_kui values ('','$newID')"); 
echo "<script type='text/javascript'>self.location='pages/cetak_group_kuitansi.php?$idp&$jjjj&ins=$instasni&discount=$discount';</script>";}else{echo mysql_error();}
?>
