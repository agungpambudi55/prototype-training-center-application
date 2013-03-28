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
include ("config/function_unggah.php");
//hapus daftar
if(isset($_REQUEST['hapuspeserta'])){
	$sintak		=	mysql_query("select *from tb_daftar_peserta where no_peserta='".$_REQUEST['hapuspeserta']."'");
	$view		=	mysql_fetch_array($sintak);
	$derok		=	$view['gambar'];
		$panggon="images/peserta/";
		if(file_exists($panggon.$derok)){
		unlink($panggon.$derok);
	$hapus = "delete from tb_daftar_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'"; $result = mysql_query($hapus) or die (mysql_error());
	$hapus_tb_pilih_judul		=mysql_query("delete from tb_pilih_judul where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error());
	$query_kuitansi = mysql_query("select * from tb_kuitansi,tb_bay_kui WHERE tb_kuitansi.no_kuitansi=tb_bay_kui.no_kuitansi
and tb_kuitansi.no_peserta = '".$_REQUEST['hapuspeserta']."'");
	while($kuitansi=mysql_fetch_array($query_kuitansi)){
	$arr_no=$kuitansi['1'];
	$arr=$kuitansi['2'];
	if ($kuitansi) {
		$hapus_kuitansi = mysql_query("delete from tb_kuitansi where no_peserta='$arr'") or die(mysql_error());
		$hapus_bay = mysql_query("delete from tb_bay_kui where no_kuitansi='$arr_no'") or die(mysql_error());
	} else {}}
	$query_group=mysql_query("select * from tb_group_kuitansi where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$group=mysql_num_rows($query_group);
	if ($group)
	$hapus_group_kuitansi = mysql_query("delete from tb_group_kuitansi where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_peserta=mysql_query("select * from tb_peserta_kelas where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$peserta=mysql_num_rows($query_peserta);
	if ($peserta) $hapus_peserta = mysql_query("delete from tb_peserta_kelas where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_absen=mysql_query("select * from tb_absen_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$absen=mysql_num_rows($query_absen);
	if ($absen) $hapus_absen = mysql_query("delete from tb_absen_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_nilai=mysql_query("select * from tb_nilai where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$nilai=mysql_num_rows($query_nilai);
	if ($nilai) $hapus_nilai = mysql_query("delete from tb_nilai where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_sertifikat=mysql_query("select * from tb_sertifikat where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$sertifikat=mysql_num_rows($query_sertifikat);
	if ($sertifikat) $hapus_sertifikat = mysql_query("delete from tb_sertifikat where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	echo "<script>location.href = ('index.php?page=peserta&pages=daftar_peserta_view_peserta&ref=del');</script>";
	}else{
	$hapusi = "delete from tb_daftar_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'";
	$resulti = mysql_query($hapusi) or die (mysql_error());
	$hapus_tb_pilih_juduli		=mysql_query("delete from tb_pilih_judul where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error());
	$query_groupi=mysql_query("select * from tb_group_kuitansi where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$groupi=mysql_num_rows($query_groupi);
	if ($groupi) $hapus_tb_group_kuitansii	=mysql_query("delete from tb_group_kuitansi where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_kuitansii = mysql_query("select * from tb_kuitansi,tb_bay_kui WHERE tb_kuitansi.no_kuitansi=tb_bay_kui.no_kuitansi
and tb_kuitansi.no_peserta = '".$_REQUEST['hapuspeserta']."'");
	while($kuitansii=mysql_fetch_array($query_kuitansii)){
	$arri_no=$kuitansii['1'];
	$arri=$kuitansii['2'];
	if ($kuitansii) {
		$hapus_kuitansii = mysql_query("delete from tb_kuitansi where no_peserta='$arri'") or die(mysql_error());
		$hapus_bayi = mysql_query("delete from tb_bay_kui where no_kuitansi='$arri_no'") or die(mysql_error());} else {}}
	$query_pesertai=mysql_query("select * from tb_peserta_kelas where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$pesertai=mysql_num_rows($query_pesertai);
	if ($pesertai) $hapus_tb_peserta_kelasi		=mysql_query("delete from tb_peserta_kelas where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_abseni=mysql_query("select * from tb_absen_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$abseni=mysql_num_rows($query_abseni);
	if ($abseni) $hapus_abseni				=mysql_query("delete from tb_absen_peserta where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_nilaii=mysql_query("select * from tb_nilai where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$nilaii=mysql_num_rows($query_nilaii);	
	if ($nilaii) $hapus_tb_nilaii				=mysql_query("delete from tb_nilai where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else {}
	$query_sertifikati=mysql_query("select * from tb_sertifikat where no_peserta = '".$_REQUEST['hapuspeserta']."'");
	$sertifikati=mysql_num_rows($query_sertifikati);
	if ($sertifikati) $hapus_tb_sertifikati		=mysql_query("delete from tb_sertifikat where no_peserta = '".$_REQUEST['hapuspeserta']."'") or die(mysql_error()); else{}
	echo "<script>location.href = ('index.php?page=peserta&pages=daftar_peserta_view_peserta&ref=del');</script>";
	}

}

//update daftar
else if($_POST['editformdaftar']){
	$idpeserta		=	$_POST['idpeserta'];
	$jenis_peserta	=	$_POST['jenis'];
	$nama			=	ucwords($_POST['nama']);
	$email			=	$_POST['email'];
	$nrp			=	$_POST['no_induk'];
	$instansi		=	$_POST['instansi'];
	$jabatan		=	$_POST['jabatan'];
	$tempatlahir	=	$_POST['tempatlahir'];
	$tgl			=	$_POST['tanggal'];
	$kelamin		=	$_POST['kelamin'];
	$telepon		=	$_POST['telepon'];
	$folder		 	=	"images/peserta/";
	$tmp			=	$_FILES['upload']['tmp_name'];
	$filebaru		=	$_FILES['upload']['name'];
	$cname			= 	"id_".$idpeserta."_".$nama."_".$filebaru;
	$format			=	$_FILES['upload']['type'];
	$query_tampil	=	mysql_query("select *from tb_daftar_peserta where no_peserta='$idpeserta'");
	$row=mysql_fetch_array($query_tampil);
	
	$query_update_no_gambar	="
UPDATE `tb_daftar_peserta` SET `id_jenis_peserta` = '$jenis_peserta',
`nama` = '$nama',
`nrp` = '$nrp',
`email` = '$email',
`instansi_peserta` = '$instansi',
`jabatan` = '$jabatan',
`tempat_lahir` = '$tempatlahir',
`tgl_lahir` = '$tgl',
`gender` = '$kelamin',
`tlp` = '$telepon'
 WHERE no_peserta =$idpeserta";
	
	$query_update_gambar	="
UPDATE `tb_daftar_peserta` SET `id_jenis_peserta` = '$jenis_peserta',
`nama` = '$nama',
`nrp` = '$nrp',
`email` = '$email',
`instansi_peserta` = '$instansi',
`jabatan` = '$jabatan',
`tempat_lahir` = '$tempatlahir',
`tgl_lahir` = '$tgl',
`gender` = '$kelamin',
`tlp` = '$telepon',
`gambar` = '$cname' WHERE no_peserta =$idpeserta";
		//kondisi file 
		if($tmp=='')
			{
			$cek=mysql_query($query_update_no_gambar);
			//header('location:index.php?page=peserta&pages=daftar_peserta_view_peserta');
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=peserta&pages=peserta&pages=daftar_peserta_view_peserta&ref=edt&".$idpeserta."'
			</script>";
			}
		else if(isset($tmp))
			{
			@$hapus		= unlink($folder.$row['gambar']);
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek_gmb	= mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=peserta&pages=peserta&pages=daftar_peserta_view_peserta&ref=edt&".$idpeserta."'
			</script>";
			}
		else if($row['gambar']=='')
			{
			$unggah		= unggah_gambar($tmp,$folder,$cname,$format);
			$cek=mysql_query($query_update_gambar);
			echo "
			<script type='text/javascript'>
			window.location = 'index.php?page=peserta&pages=peserta&pages=daftar_peserta_view_peserta&ref=edt&".$idpeserta."'
			</script>";
			}
			
}

?>
<?php
}
?>