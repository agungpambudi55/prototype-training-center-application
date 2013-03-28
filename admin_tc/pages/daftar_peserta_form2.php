<SCRIPT language=JavaScript>
function reload(form)
{
var 
val_p=form.pelatihan.options[form.pelatihan.options.selectedIndex].value;
xxx=document.getElementById("nopeserta").value;
id_jenpes=document.getElementById("id_jenpes").value;
self.location='index.php?page=peserta&pages=daftar_peserta_form2&nopeserta=' + xxx + '&pelatihan=' + val_p + '&jenis_peserta=' + id_jenpes;
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

<div id="content">

<div id="form">
<form id="formCheck" name="formpilihjudul" method="post" action="index.php?page=peserta&pages=daftar_peserta_p_pilihjudul&nopeserta=<?php echo $nopeserta; ?>">
<ul style="border:0px solid gray; min-height:200px;">
	<li><p style="background:url(style/images/progress2.png) no-repeat; padding:25px 0px 25px 0px; margin:0; border:0px solid gray"></p></li>
	<li><p style="margin:0; padding:0; border:0px solid gray; padding:0px 0px 20px 130px; font-size:20px; font-weight:bold; color:#333333">Pilih Judul</p></li>
    <li>
	<label>Nama</label>
	<input type="text" value="<?php echo $nama; ?>" class="input" readonly/>
<input type="hidden" id="nopeserta" value="<?php echo $nopeserta; ?>" name="nopeserta" />
<input type="hidden" id="id_jenpes" value="<?php echo $id_jenpes; ?>" name="id_jenpes" />
    </li>
    <li>
	<label>Pelatihan</label>
      <?php 
            @$pelatihan=$_GET['pelatihan'];
            @$jenis_peserta=$_GET['jenis_peserta'];
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
            
            echo "<select name='pelatihan' onchange=\"reload(this.form)\" class='option' required><option value=''></option>";
            while($noticia2 = mysql_fetch_array($quer2)) 
            { 
                if($noticia2['id_details_pelatihan']==@$pelatihan)
                {echo "<option selected value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>"."";}
                else
                {echo  "<option value='$noticia2[id_details_pelatihan]'>$noticia2[pelatihan]</option>";}
            }
            echo "</select><br>";
            ?>    

    </li>
	<li>
    
     <?php
            if ($pelatihan=='' or $jenis_peserta=='')
            {
            echo "";
            }
            else
            {	echo "<label>Judul Pelatihan</label><ul >";
                    if ($quer=='')
                    {
                    echo "<li style=' margin:0px 0px 0px 132px; padding:1px;border:0px solid gray'>Kosong</li>";
                    }
                    else
                    {
                        echo"<p style=' margin:0px 0px 10px 132px; padding:7px 0px 5px 0px ; min-width:221px; border-bottom:2px solid gray'>
                        <input type='checkbox' id='tombolCheck' value='Check All' onClick='Check();' />Pilih Semua
                        </p>";
                        while($noticia = mysql_fetch_array($quer)) 
                        {
                            echo  "
							<li style=' margin:0px 0px 0px 132px; padding:1px;border:0px solid gray'>
							<input type='checkbox' name='judul[$noticia[0]]' value='$noticia[0]'>$noticia[1]
							</li>"; 
                                
                        }
                    }
				echo "</ul> ";
            }
            ?>
	
    </li>
</ul>
<button type="submit" class="submit" name="formpilihjudul">Lanjut</button>
</form>
</div>

</div>
