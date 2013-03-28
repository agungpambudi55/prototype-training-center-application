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
<div class="title_page">Edit Nilai </div>
<form method="post" action="index.php?page=nilai&pages=nilai_update_proses">

<div id="content">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>

<?php


if($update_id=$_REQUEST['update_id']) {
$update="select * from tb_nilai where id_nilai='$update_id'";
$cek_mysql=mysql_query($update) or die (mysql_error());
$baris=mysql_fetch_array($cek_mysql);
$id=$baris['0'];
$pela=$baris['1'];
$ju=$baris['2'];
$pe=$baris['3'];
$ni=$baris['4'];
$st=$baris['5'];
}
?>

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

 <table width="460" border="0">
 
  <?php
  $query1=mysql_query("select pelatihan from tb_detail_pelatihan where id_details_pelatihan ='$pela'");
  $c=mysql_fetch_array($query1);
  @$id_pe=$c['id_details_pelatihan'];
  $pelatihan=$c['pelatihan'];
  ?>
  <input type="hidden" name="juklklk" value="<?php echo $pelatihan; ?>" readonly required='required' />
  <input type="hidden" name="pelatihan" value="<?php echo $pela; ?>">
  
 <tr>
   <td width="90%">Judul Pelatihan</td>
   <td>
  <?php
  $query=mysql_query("select judul_training from tb_judul where id_judul ='$ju'");
  $c=mysql_fetch_array($query);
  @$id=$c['id_judul'];
  $judul=$c['judul_training'];
  ?>
  <input type="text" name="juklklk" value="<?php echo $judul; ?>" readonly required='required' class="input" style="width:305px;" />
  <input type="hidden" name="ju" value="<?php echo $ju; ?>">
   </td>
    </tr>
 <tr>
    <td>Nama Peserta</td>
    <td>
    		<?PHP
		$sql1=mysql_fetch_array(mysql_query("SELECT tb_nilai.no_peserta,tb_daftar_peserta.nama from tb_daftar_peserta,tb_nilai where tb_daftar_peserta.no_peserta=tb_nilai.no_peserta and tb_nilai.id_nilai='".$update_id."'"));
			$peserta=$sql1['nama'];		
			?>
            <input type="hidden" value="<?php echo $sql1['no_peserta'];?>"  name="peserta"/>
	<input type="text" name="pepepe" readonly value="<?php echo $peserta; ?>" required='required' class="input" style="width:305px;" />
   
		
       </td>
  </tr>
 <tr>
    <td>Nilai</td>
    <td><input type="text" name="ni" value="<?php echo $ni; ?>" required pattern="\-?\d+(\.\d{0,})?" class="input" style="width:305px;"/></td>
  </tr>    
  <tr>
    <td style="padding-top:10px;">Status</td>
    
    <td style="padding-top:10px;">
	<?php if($st=='lulus'){
	?>
	<input  class="radio" type="radio" name="status" value="lulus" checked="checked" required='required'/> Lulus <input type="radio" name="status" value="remidi" required='required'/>Remidi
	<?php
	}else{
	?>
	<input class="radio" type="radio" name="status" value="lulus" required='required'/> Lulus <input type="radio" name="status" value="remidi" checked="checked" required='required'/>Remidi
	<?php }
	?>	</td>
  </tr>
  
  <tr><td colspan="2"><br /><input type='submit' name='form_edit' value='Perbarui' class='button_a'></form></td></tr>
</table></div>
</div>
</table>
<?php }?>