<?php
if(isset($_POST['formpilihjudul'])){
$nopeserta=$_GET['nopeserta'];
$judul=$_POST['judul'];
if(is_array($judul)){
   foreach($judul as $nojudul=>$namapeserta){
	if($judul==''){
	echo "<script> alert('silahkan pilih judul training'); location.href = 'javascript:self.history.back()' </script>";
	}else{
	  $query1=mysql_query("insert into tb_pilih_judul values ('','".$_POST['nopeserta']."','$nojudul')");
	  if($query1){
	  echo "<script>location.href = (\"index.php?page=peserta&pages=daftar_peserta_form3&nopeserta=$nopeserta\");</script>";
	  }else{
	  echo "gagal";
	  }
	  }
   } 
}
}else{
	echo "gagal";
}
?>