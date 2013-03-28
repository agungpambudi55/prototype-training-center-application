<style type="text/css">
<?php
require_once "ceklogin.php";
?>
#det ul{ margin:0; padding:0; list-style:none; border:0px solid gray; height:300px; overflow:hidden}
#det ul li{ border:0px solid gray; height:250px; float:left;}
#det ul li ul{ border:0px solid gray;}
#det ul li ul li{ border:0px solid gray; float:none; height:15px; padding:5px 0px 6px 10px; font-size:14px; font-weight:bold}
#det ul li ul li p{ border:0px solid gray; margin:-17px 0px 0px 120px; font-weight:normal}
.photo{ border:1px solid #999; width:200px; height:229px; margin:0; padding:8px 0px 0px 0px; font-size:14px; color:#FFF; background:#63B0FE}
#box_tra_histori{ border:1px solid #999; margin:10px 0px 0px 0px }
#box_tra_histori p{ border:0px solid #666; padding:10px 13px; text-align:center; margin:0; font-weight:bold; font-size:14px; background:#63B0FE; color:#FFFFFF}
#box_tra_histori ol{ margin:5px 0px 5px 30px ; padding:0;}
#box_tra_histori ol li{ margin:1px; padding:0}
</style>
<div class="title_page">
Details Peserta
</div>
<div id="content">
<?php
$mysql=mysql_query("select * from tb_daftar_peserta, tb_jenis_peserta where tb_jenis_peserta.id_jenis_peserta=tb_daftar_peserta.id_jenis_peserta and tb_daftar_peserta.no_peserta=$_GET[i]");
$array=mysql_fetch_array($mysql);
?>
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="det">
<ul>
	<li style=" width:205px">
    <p class="photo" align="center">
    <b>Photo Profil</b><br>
	<?php
    if(empty($array['gambar'])){
    echo "<img src='style/images/no_image.png' style='height:200px; width:200px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
    }else{
    echo "<img src='images/peserta/".$array['gambar']."' style='height:200px; width:200px; border-top:1px solid #CCC;border-bottom:1px solid #CCC; margin:8px 0px 0px 0px' />";
    } 
    ?> 
    </p>
    
    </li>
	<li style=" width:350px;">
    <ul>
    	<li style="font-weight:bold; font-size:25px; padding:0px 0px 18px 10px;"><?php echo $array['nama'];?></li>
    	<li>Jenis Peserta<p><b>: </b> <?php echo $array['jenis_peserta'];?></p></li>
    	<li>Instansi<p><b>: </b><?php echo $array['instansi_peserta'];?></p></li>
    	<li>Jabatan<p><b>: </b><?php echo $array['jabatan'];?></p></li>
    	<li>Tanggal Lahir<p><b>: </b><?php echo tanggal($array['tgl_lahir']);?></p></li>
        <li>Tempat Lahir<p><b>: </b><?php echo $array['tempat_lahir'];?></p></li>
    	<li>Jenis Kelamin<p><b>: </b><?php echo $array['gender'];?></p></li>
    	<li>No. Telpon<p><b>: </b><?php echo $array['tlp'];?></p></li>
    	<li>Tanggal Daftar<p><b>: </b><?php echo tanggal($array['tanggal_daftar']);?></p></li>
    </ul>
    </li>
</ul>
<?php
$que1=mysql_query("SELECT * FROM tb_judul, tb_pilih_judul, tb_sertifikat where tb_judul.id_judul=tb_pilih_judul.id_judul and tb_pilih_judul.no_peserta=tb_sertifikat.no_peserta and tb_pilih_judul.id_pilih_judul=tb_sertifikat.id_pilih_judul and tb_sertifikat.no_peserta=$array[no_peserta]");
$row	=mysql_fetch_array($que1);
if($row){
?>
<div id="box_tra_histori">
<p>Judul yang pernah diikuti</p>
<ol>
<?php
$que=mysql_query("SELECT * FROM tb_judul, tb_pilih_judul, tb_sertifikat where tb_judul.id_judul=tb_pilih_judul.id_judul and tb_pilih_judul.no_peserta=tb_sertifikat.no_peserta and tb_pilih_judul.id_pilih_judul=tb_sertifikat.id_pilih_judul and tb_sertifikat.no_peserta=$array[no_peserta]");
while ($jud=mysql_fetch_array($que))
{
echo "<li>$jud[judul_training]</li>";
}
?>
</ol>
</div>
<?php
}else{}
?>
</div>
</div>