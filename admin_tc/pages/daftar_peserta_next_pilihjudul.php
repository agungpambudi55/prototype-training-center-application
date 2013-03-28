<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<SCRIPT language=JavaScript>
function reload(form)
{
var 
val_p			=form.pelatihan.options[form.pelatihan.options.selectedIndex].value;
xxx				=document.getElementById("nopeserta").value;
id_jenpes		=document.getElementById("id_jenpes").value;
self.location	='index.php?page=peserta&pages=daftar_peserta_next_pilihjudul&nopeserta=' + xxx + '&pelatihan=' + val_p + '&jenis_peserta=' + id_jenpes;
}
function Check(){
         allCheckList = document.getElementById("formCheck").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("tombolCheck").value == "Check All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("tombolCheck").value = "Uncheck All";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("tombolCheck").value = "Check All";
         }
}
</script>
</head>
<body>
<?php


$nopeserta=$_REQUEST['nopeserta'];
$qry1=mysql_query("select * from tb_daftar_peserta where no_peserta ='$nopeserta'");
$qry1_array=mysql_fetch_array($qry1);
$nama=$qry1_array['nama'];
$id_jenpes=$qry1_array['id_jenis_peserta'];

$sql2=mysql_query("select * from tb_jenis_peserta where id_jenis_peserta=$id_jenpes");
$sql2_array=mysql_fetch_array($sql2);
$jenpes=$sql2_array['1'];

$sql3=mysql_query("
SELECT tb_detail_pelatihan.pelatihan, tb_judul.judul_training
FROM tb_judul_jenis_peserta, tb_detail_pelatihan, tb_judul, tb_pilih_judul, tb_daftar_peserta
WHERE tb_detail_pelatihan.id_details_pelatihan = tb_judul.id_details_pelatihan
AND tb_judul.id_judul = tb_pilih_judul.id_judul
AND tb_judul_jenis_peserta.id_judul = tb_pilih_judul.id_judul
AND tb_daftar_peserta.no_peserta = tb_pilih_judul.no_peserta
AND tb_judul_jenis_peserta.id_jenis_peserta = tb_daftar_peserta.id_jenis_peserta
AND tb_daftar_peserta.no_peserta = '$nopeserta'
");
?>
<div class="title_page">
Next Pilih judul
</div>
<div id="content">
<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_p_pilihjudul&nopeserta=<?php echo $nopeserta; ?>">
Nama Peserta <?php echo $nama; ?>
<input type="hidden" id="nopeserta" value="<?php echo $nopeserta; ?>" name="nopeserta" />
<input type="hidden" id="id_jenpes" value="<?php echo $id_jenpes; ?>" name="id_jenpes" />
            <table border="1">
              <tr>
                <td>Pilih Pelatihan</td>
                <td>
                <?php 
            $pelatihan=$_GET['pelatihan'];
            $jenis_peserta=$_GET['jenis_peserta'];
            $jp=mysql_query("select id_jenis_peserta, jenis_peserta from tb_jenis_peserta order by jenis_peserta");
            $quer2=mysql_query("SELECT DISTINCT(tb_detail_pelatihan.id_details_pelatihan),tb_detail_pelatihan.pelatihan FROM tb_detail_pelatihan,tb_jadwal_training where tb_detail_pelatihan.id_details_pelatihan = tb_jadwal_training.id_details_pelatihan order by tb_detail_pelatihan.pelatihan "); 
            if($pelatihan)
            {
            $quer=mysql_query("
            SELECT tb_judul.id_judul, tb_judul.judul_training, tb_judul_jenis_peserta.biaya
            FROM tb_judul, tb_jenis_peserta, tb_judul_jenis_peserta
            WHERE tb_judul.id_judul = tb_judul_jenis_peserta.id_judul
            AND tb_jenis_peserta.id_jenis_peserta = tb_judul_jenis_peserta.id_jenis_peserta
            AND tb_judul.id_details_pelatihan ='$pelatihan'
            AND tb_jenis_peserta.id_jenis_peserta ='$jenis_peserta'
            ORDER BY tb_judul.judul_training"); 
            }
            else
            {$quer=mysql_query("SELECT judul_training FROM tb_judul order by judul_training"); } 
            
            echo "<select name='pelatihan' onchange=\"reload(this.form)\" class='option'><option value=''>Pilih Pelatihan</option>";
            while($noticia2 = mysql_fetch_array($quer2)) 
            { 
                if($noticia2['id_details_pelatihan']==@$pelatihan)
                {echo "<option selected value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>"."";}
                else
                {echo  "<option value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>";}
            }
            echo "</select><br>";
            ?>
            </td>
              </tr>
              <tr>
                <td valign="middle"><font color="grey" size="3">Pilih Judul Training</font></td>
                <td>
                <?php
            if ($pelatihan=='' or $jenis_peserta=='')
            {
            echo "";
            }
            else
            {	
                    if ($quer=='')
                    {
                    echo "Kosong";
                    }
                    else
                    {
                        echo"
                        <input type='checkbox' id='tombolCheck' value='Check All' onClick='Check();' />Pilih Semua
                        <hr style='padding:0px; margin:0px;' />";
                        while($noticia = mysql_fetch_array($quer)) 
                        {
                            echo  "<input type='checkbox' name='judul[$noticia[0]]' value='$noticia[0]'>$noticia[1]<br>"; 
                                
                        }
                    }
            }
            ?>
                </td>
              </tr>
              <tr>
              <td colspan="2" style="padding: 5px"><div style="margin-left:270px;"><input class="link" type="submit" name="formpilihjudul" value="Next"></input></div>
            </form></td>
            </tr>
            </table>
</div>

</body>
</html>