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
<?php
$jumlah1=$_POST['jumlah'];
if((!$_POST['nama'])|| (!$_POST['instansi']))
{
	echo "
	<script>
	alert('Masukkan data yang lengkap!'); 
	location.href = ('javascript:self.history.back();');
	</script>";
}
else
{
			
			$idjenis	=$_POST['jenispeserta'];
			$nama		=$_POST['nama'];
			$nrp		=$_POST['nrp'];
			$email		=$_POST['email'];
			$instansi	=$_POST['instansi'];
			$jabatan	=$_POST['jabatan'];
			$tempatlahir=$_POST['tempat_lahir'];
			$tgl		=$_POST['tgl_lahir'];
			$kelamin	=$_POST['jenis'];
			$telpon		=$_POST['telepon'];
			$date=date('Y/m/d');
			$query_peserta=mysql_query("select max(no_peserta) as maxid from tb_daftar_peserta");
			$row_max=mysql_fetch_array($query_peserta);
			echo "<br>";
			$s=1;
			foreach($nama as $key => $value) :
			$jumlah=$row_max['maxid'] + $s;
			
			$insert = "INSERT INTO tb_daftar_peserta (no_peserta,id_jenis_peserta, nama,nrp,email,instansi_peserta,jabatan,tempat_lahir,tgl_lahir,gender,tlp,tanggal_daftar)  
VALUES ('', '$idjenis[$key]','$nama[$key]',  '$nrp[$key]','$email[$key]', '$instansi', '$jabatan[$key]', '$tempatlahir[$key]', '$tgl[$key]',
	'$kelamin[$key]','$telpon[$key]', '$date')";	
			
					
			$hasil_insert = mysql_query($insert);
			$id_insert=mysql_insert_id();
			//echo $value." ".$idjenis[$key]." ".$nrp[$key]."<br>";
			$ids[] = 'no_peserta['.$key.']=' . $id_insert;
			$s++;
			endforeach;
			
			$id = implode( '&', $ids );
			echo "<script>location.href= (\"index.php?page=peserta&pages=daftar_peserta_form2_banyak&jumlah=$jumlah1&idjenis=$idjenis[$key]&$id\");</script>";
			
			
	}
}
	?>