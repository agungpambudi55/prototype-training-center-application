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
<script type="text/javascript">
function Check(){
         allCheckList = document.getElementById("formCheck").elements;
         jumlahCheckList = allCheckList.length;
         if(document.getElementById("tombolCheck").value == "All"){
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = true;
            }
            document.getElementById("tombolCheck").value = "Un All";
         }else{
            for(i = 0; i < jumlahCheckList; i++){
                allCheckList[i].checked = false;
         }
            document.getElementById("tombolCheck").value = "All";
         }
}
</script>
<script type="text/javascript">
var ajaxRequest;
function getAjax()  //mengecek apakah web browser support AJAX atau tidak
{
try
{
		// Opera 8.0+, Firefox, Safari
ajaxRequest = new XMLHttpRequest();
}catch (e){
// Internet Explorer Browsers
try{
ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
}catch (e){
try{
ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
}catch (e){
// Something went wrong
alert("Your browser broke!");
return false;
}
}
}
}

function validasi (keyEvent) //fungsi untuk mengambil nilai setiap huruf yang dimasukkan
{
keyEvent = (keyEvent) ? keyEvent: window.event;
input = (keyEvent.target) ? keyEvent.target: keyEvent.srcElement;
if (input.value) //jika input dimasukkan, masuk ke fungsi cekEmail
{
cekEmail("pages/kelas_cek_nama.php?input=" + input.value); //mengirim inputan ke file cek.php
}
}
function cekEmail(fileCek) //fungsi untuk menampilkan hasil validasi
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
document.getElementById("hasil").innerHTML = ajaxRequest.responseText;
}
ajaxRequest.send(null);
}

function validasi_jadwal (nilai) 
{
cek_tanggal("pages/cek_instruktur.php?tanggal=" + nilai); 

}
function cek_tanggal(fileCek) //fungsi untuk menampilkan hasil validasi
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
document.getElementById("hasil_instruktur").innerHTML = ajaxRequest.responseText;
}
ajaxRequest.send(null);
}

function validasi_cek_tempat (tempat) 
{
cek_tempat("pages/cek_tempat.php?tanggal=" + tempat); 

}
function cek_tempat(fileCek) //fungsi untuk menampilkan hasil validasi
{
getAjax();
ajaxRequest.open("GET",fileCek);
ajaxRequest.onreadystatechange = function()
{
document.getElementById("hasil_tempat").innerHTML = ajaxRequest.responseText;
}
ajaxRequest.send(null);
}

</script>
<style>
.modalDialog {
position: fixed;
font-family: Arial, Helvetica, sans-serif;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0,0,0,0.8);
z-index: 10000000;
opacity:0;
-webkit-transition: opacity 400ms ease-in;
-moz-transition: opacity 400ms ease-in;
transition: opacity 400ms ease-in;
pointer-events: none;
}
.modalDialog:target {
opacity:1;
pointer-events: auto;
}
.modalDialog > div {
width: 550px;
height:auto;
position: relative;
margin:5% auto;
padding: 5px 20px 13px 20px;
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top, #ffffff 0%, #f6f6f6 47%, #ededed 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* IE10+ */
background: linear-gradient(to bottom, #ffffff 0%,#f6f6f6 47%,#ededed 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 ); /* IE6-9 */
}
.modalDialog > div h2{
font-size:17px;
font-weight:bold;
color:#20A0FF;
font-family:Tahoma, Geneva, sans-serif;
margin-top:0px;
margin-bottom:20px;
border-bottom:#666 3px solid;
padding-top: 10px;
padding-right: 0px;
padding-bottom: 3px;
padding-left: 2px;
}
.close {
background:#20A0FF;
color: #FFFFFF;
line-height: 25px;
position: absolute;
right: -12px;
text-align: center;
top: -10px;
width: 24px;
text-decoration: none;
font-weight: bold;
-webkit-border-radius: 12px;
-moz-border-radius: 12px;
border-radius: 12px;
-moz-box-shadow: 1px 1px 3px #000;
-webkit-box-shadow: 1px 1px 3px #000;
box-shadow: 1px 1px 3px #000;
}
.close:hover { background:#82CAFF; }
.namatable{
font-family:Tahoma, Geneva, sans-serif;
color: #544F4F;
}
.gtable{
	height:30px;}
.gtable:hover{
	background:#E4C478;
	padding:1000px;
	}

.classname {
	-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
	background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
	background-color:#ededed;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #dcdcdc;
	display:inline-block;
	color:#777777;
	font-family:arial;
	font-size:13px;
	font-weight:bold;
	padding:0px 10px 0px 10px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ffffff;
	margin-right:10px;
}.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
	background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
	background-color:#dfdfdf;
}.classname:active {
	position:relative;
	top:1px;
}
#content #formCheck .tablesorter thead tr th {
	text-align: left;
}
</style>
<head id="Head1" runat="server">
<link href="style/tablesorter/themes/yui/style.css" rel="stylesheet" type="text/css" />
<script src="style/tablesorter/js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="style/tablesorter/js/jquery.tablesorter-2.0.3.js" type="text/javascript"></script>
<script src="style/tablesorter/js/jquery.tablesorter.filer.js" type="text/javascript"></script>
<script src="style/tablesorter/js/jquery.tablesorter.pager.js" type="text/javascript"></script>  
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tableOne").tablesorter({ debug: false, sortList: [[0, 0]], widgets: ['zebra'] })
                        .tablesorterPager({ container: $("#pagerOne"), positionFixed: false })
                        .tablesorterFilter({ filterContainer: $("#filterBoxOne"),
                            filterClearContainer: $("#filterClearOne"),
                            filterColumns: [0, 1, 2, 3 ,4, 5, 6],
                            filterCaseSensitive: false
                        });

            $("#tableTwo").tablesorter({ debug: false, sortList: [[0, 0]], widgets: ['zebra'] })
                .tablesorterPager({ container: $("#pagerTwo"), positionFixed: false })
                .tablesorterFilter({ filterContainer: $("#filterBoxTwo"),
                    filterClearContainer: $("#filterClearTwo"),
                    filterColumns: [0, 1, 2, 3, 4, 5, 6],
                    filterCaseSensitive: false
                });

            $("#tableTwo .header").click(function() {
                $("#tableTwo tfoot .first").click();
            });                
        });    
        
             
    </script>    

<?php 
$query_judul=mysql_query("select *from tb_judul where id_judul='$_GET[judul]'");
$row_judul=mysql_fetch_array($query_judul);
?>
<div id="content">
<div style="border:0px solid gray; padding:10px 0px 20px 0px ">

<a href="#openModal" class="button_a">Create Kelas</a>
</div>
<form id="formCheck" method="post" name="formkelas" action="index.php?page=pel&pages=kelas_pembagian_peserta_proses" >
<input type="hidden" value="<?php echo $_GET['id_jadwal']; ?>" name="id_jadwal">

<table  id='tableOne' class='tablesorter' width='100%' cellpadding='0' cellspacing='0'>
    	<thead>
        <tr>
            <td width="10%" style="border:1px solid #CCC; background:#66BEFF; padding:5px 0px 5px 0px;  color:#FFFFFF; font-size:13px"><div align="center"><input type="button" id="tombolCheck" onClick="Check()" value="All"></div></td>
            <th width="70%"><div align="center">Nama</div></th>
            <th width="20%"><div align="center">Instansi</div></th>
        </tr>
        </thead>
        <tbody>
   <?php
$query_muncul=mysql_query("SELECT * FROM tb_daftar_peserta,tb_judul,tb_pilih_judul where tb_daftar_peserta.no_peserta=tb_pilih_judul.no_peserta and tb_judul.id_judul=tb_pilih_judul.id_judul and tb_pilih_judul.id_judul='$_GET[judul]'");
 while($row_daftar=mysql_fetch_array($query_muncul)){
$query_cek_peserta3=mysql_query("select * from tb_peserta_kelas where id_pilih_judul = '".$row_daftar['id_pilih_judul']."'");
$row_cek_peserta3=mysql_fetch_array($query_cek_peserta3);
if($row_daftar['id_pilih_judul']==$row_cek_peserta3['id_pilih_judul'] and $row_daftar['no_peserta']==$row_cek_peserta3['no_peserta']){
}else{
 ?>
  <tr>
    <td align="center">
    <input type='hidden'name='id_pilih_judul[]' value='<?php echo @$row_daftar[id_pilih_judul]; ?>'/>
    <input type='checkbox'name='no_peserta[]' value='<?php echo @$row_daftar[no_peserta]; ?>'/></td>
    <td style="padding-left:20px;" ><?php echo $row_daftar['nama']; ?></td>
    <td style="padding-left:20px;" ><?php echo $row_daftar['instansi_peserta']; ?></td>
  </tr>
<?php
}

}
?>
</tbody>


	    
</table>
  
<div id="openModal" class="modalDialog">
  <div id="form">
    <a href="#close" title="Close" class="close">X</a>
  <h2> Buat Kelas Judul <?php echo $row_judul['judul_training'];?></h2>
    <table width="560" border="0" style="right:100px">
    <tr >
    <td width="119" class="namatable">Nama Kelas </td>
    <td width="364"><input name="nama_kelas" class="input" onKeyUp="validasi(event)" value="<?php $date=date("Y"); echo $date." ".$row_judul['judul_training']; ?> " type="text" required  style=" width:250px"/><span class="notification">Masukkan Kelas Peserta</span></td>
    </tr>
    <tr>
    <td></td>
    <td width="364" id="hasil"></td>
    </tr>
    <tr >
    <td class="namatable">Tahun</td>
    <td><input type="text" name="tahun" placehorder="tahun" class="input" required style=" width:250px"/> <span class="notification">Masukkan Tahun Kelas</span></td>
    </tr>
    <tr>
    <td class="namatable">Instruktur </td>
    <td>
    <input type="button" value="cek instruktur" onclick="validasi_jadwal('<?php echo $_GET['id_jadwal']; ?>')" class="button_a" style="width:260px" />
    <div id="hasil_instruktur" style="height:100px; width:265px; overflow:auto"></div>
   	<span class="notification">Masukkan Instruktur Peserta</span></td>
    </tr>
    <tr>
    <td class="namatable">Tempat </td>
    <td>
    <input type="button" value="cek tempat" onclick="validasi_cek_tempat('<?php echo $_GET['id_jadwal']; ?>')" class="button_a" style="width:260px" />
    <div id="hasil_tempat" style="height:100px; width:265px; overflow:auto"></div>
    <span class="notification">Masukkan Tempat Pelatihan</span></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="form_kelas" class="button_a" value="submit" /></td>
    </tr>
    </table>
</form> 


</div>



</body>
</html></div>

<div id="pagerOne" style="padding-top:20px;">
	        
		        <img src="style/tablesorter/img/first.png" class="first"/>
		        <img src="style/tablesorter/img/prev.png" class="preva"/>
		        <input type="text" class="pagedisplay" maxlength="4" size="4" style="width:30px; text-align:center; height:16px; padding:5px 4px 5px 1px; border:1px solid gray; box-shadow:none;" />
		        <img src="style/tablesorter/img/next.png" class="nexta"/>
		        <img src="style/tablesorter/img/last.png" class="last"/>
		        
		Jumlah Peserta dalam Kelas<select class="pagesize" style="width:45px; height:30px; padding:5px 4px 5px 1px; margin-left:10px; border:1px solid gray; box-shadow:none;" >
		  <?php
          $query=mysql_query("SELECT jumlah_max FROM `tb_jumlah_peserta` order by jumlah_max asc ");
          while($row=mysql_fetch_array($query)){
          ?>
			
          <option value="<?php echo $row['0'];?>"><?php echo $row['0'];?></option>
          <?php } ?></select>
          </form>
    
</div></div>
<?php }?>