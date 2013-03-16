<script src="js/tubeslider.jquery.js"></script>
<script type="text/javascript">
$(window).load(function(){$("#gallery").tubeslider(3000);});
function Scrollup_a () {var x = document.getElementById ("box_agen");x.scrollTop -= 200;}
function Scrolldown_a () {var x = document.getElementById ("box_agen");x.scrollTop +=200;}
function Scrollup_t () {var x = document.getElementById ("box_tra");x.scrollTop -= 200;}
function Scrolldown_t () {var x = document.getElementById ("box_tra");x.scrollTop +=200;}
</script>
<div id="gallery">
<?php
$qry_slide=mysql_query("select * from tb_aksesoris where nama='slide'");
while($arr_slide=mysql_fetch_array($qry_slide))
{
echo "
<a href='#'>
<img src='admin_tc/$arr_slide[2]' rel='$arr_slide[3]' id='img_slide'/>
</a>
";
}
?>
  <span class="button next">Next</span>
  <span class="button prev">Prev</span>
</div>

<div id="tragen">
<ul>
	<li style="float:left">
    
<p style="margin:0; padding:10px; text-align:center; background:#428DFF; font-size:20px; font-weight:bold; color:#FFF; border-radius:10px 10px 0px 0px; box-shadow:0px 6px 5px #999999">AGENDA</p> 
<p class="up" class="up" onclick="Scrollup_a ();"></p>
<div id="box_agen" style="overflow:hidden; height:358px; border:1px solid gray; padding:15px; border-radius:10px ">

<?php 
function selisihTgl($tgl1,$tgl2){
$pecah	=explode("/", $tgl1);
$year1	=$pecah[0];
$month1	=$pecah[1];
$date1	=$pecah[2];
$pecah2	=explode("/", $tgl2);
$year2	=$pecah2[0];
$month2	=$pecah2[1];
$date2	=$pecah2[2];
$jd1=gregorianToJD($month1,$date1,$year1);
$jd2=gregorianToJD($month2,$date2,$year2);
$s=$jd2-$jd1;
return $s;
}

$date	=date("Y/m/d");	
$query_notikasi=mysql_query("select * from `tb_jadwal_training`,tb_judul where tb_jadwal_training.id_judul = tb_judul.id_judul ORDER BY `id_jadwal_training` ASC");


while($row_notifikasi	=mysql_fetch_array($query_notikasi)){
$tgl1		=$row_notifikasi['tgl1'];
$id_jadwal	=$row_notifikasi['id_jadwal_training'];
$idjudul	=$row_notifikasi['id_judul'];
$idpelatihan=$row_notifikasi['id_details_pelatihan'];
$query_kelas=mysql_query("select * from tb_kelas where id_jadwal_training = '$id_jadwal'");
$row_kelas	=mysql_fetch_array($query_kelas);
$selisih	=selisihTgl($date,$tgl1);
if (strlen($row_notifikasi['ket']) > 160) 
{ $shortText = substr($row_notifikasi['ket'], 0, 160); $shortText .= "... <a href='index.php?page=det&a=$id_jadwal' class='readmore'>read more</a>";}
else 
{$shortText = $row_notifikasi['ket'];}

if($selisih < 100 and $selisih > 0)
{
	if(!$id_jadwal == $row_kelas['id_jadwal_training'])
	{echo "
	<a href='index.php?page=det&a=$id_jadwal' class='tra_agen'>$row_notifikasi[judul_training]</a>
	<br> on <b>$selisih</b> day again <br>
	<br>$shortText<br><br><br>";
	}
}
}
?>
</div>
<p class="down" onclick="Scrolldown_a ();"></p>


	</li>
    
	<li style="float:right">

  
<p style="margin:0; padding:10px; text-align:center; background:#428DFF; font-size:20px; font-weight:bold; color:#FFF; border-radius:10px 10px 0px 0px; box-shadow:0px 6px 5px #999999">TRAINING</p> 
<p class="up" class="up" onclick="Scrollup_t ();"></p>
<div id="box_tra" style="overflow:hidden; height:358px; border:1px solid gray; padding:15px; border-radius:10px ">

<?php 
$qry_tra_tra=mysql_query("select * from tb_judul order by id_judul desc limit 10");
while($arr_tra_tra=mysql_fetch_array($qry_tra_tra))
{
	if (strlen($arr_tra_tra['ket']) > 190) 
	{ $shortText1 = substr($arr_tra_tra['ket'], 0, 190); $shortText1 .= "... <a href='index.php?page=det&t=$arr_tra_tra[0]' class='readmore'>read more</a>";}
	else 
	{$shortText1 = $arr_tra_tra['ket'];}
	echo "<a href='index.php?page=det&t=$arr_tra_tra[0]' class='tra_agen'>$arr_tra_tra[2]</a>
	<br><br>$shortText1<br><br><br>
	";
}
?>

</div>
<p class="down" onclick="Scrolldown_t ();"></p>


    </li>
</ul>
</div>