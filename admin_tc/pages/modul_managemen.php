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
function modul($like){
$query_modul 		=mysql_query("select *from tb_modul where link like '$like%'");
$rows				=mysql_fetch_array($query_modul);
$hak				=$rows['hak_akses'];
if($hak=='1,')
	{
	echo "Administrator";
	}
else if($hak==',2')
	{
	echo "Operator";
	}
else if($hak=='1,2')
	{
	echo "Administrator & Operator";
	}
}
?>
<style>
.td{ text-align:center}
</style>
<div class="title_page">
Modul Hak Akses
</div>
<div id="content">
<table class="table">
  <tr>
    <th width="35%">Nama Modul</th>
    <th width="30%">Hak Akses</th>
    <th width="5%">Aksi</th>
  </tr>
  <tr>
    <td>Aksesoris</td>
    <td><?php modul('aksesoris'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Aksesoris&keyword=aksesoris" class='update' title="update"></a></td>
    </tr>
  <tr>
  	<td>Absen Peserta</td>
    <td><?php modul('absen_peserta'); ?></td>
  	<td class="td"><a href="index.php?page=modul_managemen_update&nama=Absen Peserta&keyword=absen_peserta" class='update' title="update"></a></td>
  </tr>
  <TR>
  	<td>Absen Instruktur</td>
    <td><?php modul('absen_instruktur'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Absen Instruktur&keyword=absen_instruktur" class='update' title="update"></a></td>
  </TR>
  <tr>
    <td>Biaya Pelatihan</td>
    <td><?php modul('biaya_pelatihan'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Biaya Pelatihan&keyword=biaya_pelatihan" class='update' title="update"></a></td>
   </tr>
   <tr>
    <td>Buku Tamu</td>
    <td><?php modul('buku_tamu'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Buku Tamu&keyword=buku_tamu" class='update' title="update"></a></td>
   </tr>
   <tr>
    <td>Daftar Formulir</td>
    <td><?php modul('daftar_formulir'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Daftar Formulir&keyword=daftar_formulir" class='update' title="update"></a></td>
   </tr>
   <tr>
    <td>Daftar Peserta</td>
    <td><?php modul('daftar_peserta'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Daftar Peserta&keyword=daftar_peserta" class='update' title="update"></a></td>
   </tr>
    <tr>
    <td>Instruktur</td>
    <td><?php modul('instruktur'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Instruktur&keyword=instruktur" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Jadwal Training</td>
    <td><?php modul('jadwal_training'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Jadwal Training&keyword=jadwal_training" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Jenis Peserta</td>
    <td><?php modul('jenis_peserta'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Jenis Peserta&keyword=jenis_peserta" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Judul Training</td>
    <td><?php modul('judul'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Judul Training&keyword=judul" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Jumlah Max Kelas</td>
    <td><?php modul('jumlah_max_kelas'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Jumlah Max Kelas&keyword=jumlah_max_kelas" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Kategori</td>
    <td><?php modul('kategori'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Kategori&keyword=judul" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Kelas</td>
    <td><?php modul('kelas'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Kelas&keyword=kelas" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Kwitansi</td>
    <td><?php modul('kwitansi'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=kwitansi&keyword=kwitansi" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Modul Managemen</td>
    <td><?php modul('modul_managemen'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Modul Managemen&keyword=modul_managemen" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Nilai Peserta</td>
    <td><?php modul('nilai'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Nilai Peserta&keyword=nilai" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Sertifikat</td>
    <td><?php modul('sertifikat'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Sertifikat&keyword=sertifikat" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Pelatihan</td>
    <td><?php modul('pelatihan'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Pelatihan&keyword=pelatihan" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Backup And Restore</td>
    <td><?php modul('backup_and_restore'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Backup And Restore&keyword=backup_and_restore" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>Biaya Pelatihan</td>
    <td><?php modul('biaya_pelatihan'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=Biaya Pelatihan&keyword=biaya_pelatihan" class='update' title="update"></a></td>
    </tr>
    <tr>
    <td>User Manajemen</td>
    <td><?php modul('user_manajemen'); ?></td>
    <td class="td"><a href="index.php?page=modul_managemen_update&nama=User Manajemen&keyword=user_manajemen" class='update' title="update"></a></td>
  	</tr>
  </tr>
</table>


<!--<script type='text/javascript'>
	function konfirmasi(name)
	{
	if (confirm('Yakin dihapus modul '+ name +' ?'))
	{return true;}
	else
	{return false;}
	}
</script>
<div class="title_page">
Modul Hak Akses
</div>
<div id="content">
<p style="border:0px solid gray; padding:10px 0px; margin:0px 0px 10px 0px	"><a href="index.php?page=modul_manajemen_insert" class="button_a">Tambah Modul</a></p>
<table class="table">
  <tr>
    <th width="35%">Nama Modul</th>
    <th width="30%">Link Modul</th>
    <th width="30%">Hak Akses</th>
    <th width="5%">Aksi</th>
  </tr>
<?php
$query=mysql_query("select *from tb_modul order by modul asc ");
$no=1;
while($row=mysql_fetch_array($query)){
$hak=$row['hak_akses'];
  echo "<tr>
    <td style='vertical-align:middle;'>".$row['modul']."</td>
    <td style='vertical-align:middle;'>".$row['link']."</td>";
if($hak=='1,'){
	echo "<td style='vertical-align:middle;'>Administrator</td>";
}else if($hak==',2'){
	echo "<td style='vertical-align:middle;'>Operator</td>";
}else{
	echo "<td style='vertical-align:middle;'>Administrator & Operator</td>";
}
echo "<td align='center'><a href='index.php?page=modul_manajemen_update&id=".$row[id_modul]."' class='update'></a>
	</td>
  </tr>";
$no++;
}
?>
</table>
</div>
<?php
if($_GET['hapus']){
$query_hapus=mysql_query("delete from tb_modul where id_modul='".$_GET['hapus']."'");
echo "<script>
	
	location.href = ('index.php?page=modul_manajemen');
	</script>";
	
	if(!$query_hapus){
		echo mysql_error();
	}
}
?>-->
<?php }?>