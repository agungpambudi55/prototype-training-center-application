<style type="text/css">
#content{ min-height:300px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666}
#title{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1 }
#con_tent{ padding:25px 25px 0px 25px; font-size:13px; }
#profil{ border:0px solid gray;text-align:justify; margin:0px 0px 30px 0px; min-height:85px; line-height:18px; }
.img_box {
	width:80px;
	height:80px;	
	border:1px solid #666;	
	margin:5px 10px 2px 0px;
	overflow:hidden;
	position:relative;
	float:left;
	box-shadow:0px 0px 3px #000000;
	z-index:1000;
}
.img_ins {position:absolute;}
#paging{ margin:0; padding:30px 0px 40px 0px; border:0px solid gray; font-size:13px;}
.prev{background:url(style/images/images.png) -529px -208px; margin-right:15px; padding:6px 10px; border:0px solid gray}
.next{ background:url(style/images/images.png) -569px -208px; margin-left:15px; padding:6px 10px; border:0px solid gray}
.prev:hover, .next:hover{opacity:0.6}
.prev_disable{background:url(style/images/images.png) -529px -208px; margin-right:15px; padding:6px 10px; border:0px solid gray; opacity:0.3}
.next_disable{ background:url(style/images/images.png) -569px -208px; margin-left:15px; padding:6px 10px; border:0px solid gray; opacity:0.3}
</style>
<script type="text/javascript">
$(document).ready(function() {
var move = -13;
var zoom = 1.35;
$('.img_box').hover(function() {
	width = $('.img_box').width() * zoom;
	height = $('.img_box').height() * zoom;
	$(this).find('img').stop(false,true).animate({'width':width, 'height':height, 'top':move, 'left':move}, {duration:200});},
	function() {
	$(this).find('img').stop(false,true).animate({'width':$('.img_box').width(), 'height':$('.img_box').height(), 'top':'0', 'left':'0'}, {duration:200});	});
});
</script>
<div id="content">
<p id="title">INSTRUCTORS</p>
<div id="con_tent">
<?php
require_once "js/function-date.php"; 
$batas = 5;
@$halaman = $_GET['i'];
if (empty($halaman))
{$posisi = 0;$halaman = 1;}
else 
{$posisi = ($halaman-1) * $batas;}


$tampil = "SELECT * FROM tb_instruktur order by nama asc LIMIT $posisi,$batas";
$hasil = mysql_query($tampil);
$no = $posisi+1;
while ($arr_ins=mysql_fetch_array($hasil))
{
echo "
<div id='profil'>
<p class='img_box'>";
if ($arr_ins['foto']=="")
{echo "<img src='style/images/people.png' class='img_ins' width='80' height='80'/>";}
else
{
$filename = "admin_tc/images/instruktur/$arr_ins[foto]";
if (file_exists($filename)) 
{echo "<img src='admin_tc/images/instruktur/$arr_ins[foto]' class='img_ins' width='80' height='80'/>"; }
else 
{echo "<img src='style/images/people.png' class='img_ins' width='80' height='80'/>"; }
}
echo "</p>
<b>$arr_ins[nama]</b> - Kelahiran $arr_ins[tempat_lahir], ".tanggal(date("$arr_ins[tgl_lahir]")).". $arr_ins[ket]</div>";
$no++;
}

$tampil2 = mysql_query("SELECT * FROM tb_instruktur");
$jumdata = mysql_num_rows($tampil2);
$jmlhal = ceil($jumdata/$batas);

echo "<center><p id=paging>";
if ($halaman > 1)
{$prev = $halaman-1;echo "<a href='index.php?page=instructors&i=$prev' class='prev'></a>";}
else 
{echo "<span class='prev_disable'></span>";}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman)
{}
else
{echo " page <b>".$i."</b> of <b>".$jmlhal."</b> page ";}

if($halaman<$jmlhal)
{$next = $halaman+1; echo "<a href='index.php?page=instructors&i=$next' class='next'></a>";
}
else{
echo "<span class='next_disable'></span>";
}
echo "</p></center>";
?>
</div>
</div>