<style type="text/css">
#container_page{ min-height:500px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666}
.title_page{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1
}
#con_tent{ padding:20px; font-size:14px;}
#con_tent ul{ margin:10px 0px px 0px; padding:0; list-style:none; border:0px solid gray; height:415px; overflow:hidden}
#con_tent ul li{ border:0px solid gray; width:438px; height:413px;}
#con_tent ul li .ju_se{ margin:0px; padding:0; font-weight:bold; font-size:18px; color:#FFFFFF; text-align:center; padding:10px; border:1px solid #999; background:#999;
box-shadow:0px 4px 6px #999999; border-radius:10px 10px 0px 0px;}
.con a{ text-decoration:none; co}
.con_{overflow:hidden;width:436px;height:295px; margin:auto; border:1px solid gray; border-radius:10px}
.con_ .ju_se_re{ margin:0; padding:6px 0px 7px 20px ; border:0px solid gray;background:url(style/images/images.png) no-repeat -488px -305px #E1E1E1;}
.con_ .ju_se_re1{ margin:0; padding:6px 0px 6px 20px ; border:0px solid gray;background:url(style/images/images.png) no-repeat -488px -305px #F2F2F2;}
.ju_se_re:hover,.ju_se_re1:hover{ background:url(style/images/images.png) no-repeat -483px -359px #B9CCFF}
.conlink{ text-decoration:none;font-size:14px; color:#000}
.empty{ margin:0; padding:20px; background:#E1E1E1; color:#007FFF; margin-top:110px; text-align:center; font-weight:bold; font-size:22px;}
</style>
<script type="text/javascript">
function Scrollup_t () {var x = document.getElementById ("con_tra");x.scrollTop -= 170;}
function Scrolldown_t () {var x = document.getElementById ("con_tra");x.scrollTop +=170;}
function Scrollup_a () {var x = document.getElementById ("con_agen");x.scrollTop -= 170;}
function Scrolldown_a () {var x = document.getElementById ("con_agen");x.scrollTop +=170;}
</script>
<?php
$color=1;
if(!$_POST['search'])
{?>
<script type="text/javascript">
self.location='index.php';
</script>	
<?php }
else
{?>
<div id="container_page">
<p class="title_page">SEARCH</p>
<div id="con_tent">

Search result for "<b><?php echo $_POST['search'];?></b>"
<ul>
	<li style="float:left">
    <p class="ju_se">TRAINING</p>

<p class="up" onclick="Scrollup_t ();"></p>
<div id="con_tra" class="con_">
<?php 
$qry_tra_se=mysql_query("select * from tb_judul where judul_training like '%$_POST[search]%' order by judul_training asc");
if(mysql_num_rows($qry_tra_se)=="0")
{echo "<p class='empty'>Not Found</p>";}
else
{
	while($arr_tra_se=mysql_fetch_array($qry_tra_se))
	{
	if($color %2==0){$st="ju_se_re";}else{$st="ju_se_re1";}
	echo "<a href='index.php?page=det&t=$arr_tra_se[0]' class='conlink'>
		  <p class='$st'>
		  $arr_tra_se[judul_training]
		  </p>
		  </a>";
	$color++;
	}
}
?>

</div>
<p class="down"  onclick="Scrolldown_t ();"></p>

    </li>
    <li style="float:right">
    <p class="ju_se">AGENDA</p>

<p class="up" onclick="Scrollup_a ();"></p>
<div id="con_agen" class="con_">
<?php 
$qry_agen_se=mysql_query("select tb_jadwal_training.id_jadwal_training, tb_judul.judul_training from tb_jadwal_training, tb_judul where tb_jadwal_training.id_judul=tb_judul.id_judul and tb_judul.judul_training like '%$_POST[search]%' order by tb_judul.judul_training asc");
if(mysql_num_rows($qry_agen_se)=="0")
{echo "<p class='empty'>Not Found</p>";}
else
{
	while($arr_agen_se=mysql_fetch_array($qry_agen_se))
	{
	if($color %2==0){$st="ju_se_re";}else{$st="ju_se_re1";}
	echo "<a href='index.php?page=det&a=$arr_agen_se[0]' class='conlink'>
		  <p class='$st'>
		  $arr_agen_se[1]
		  </p>
		  </a>";
	$color++;
	}
}
?>
</div>
<p class="down" onclick="Scrolldown_a ();"></p>
    
    </li>
</ul>
</div>
</div>
<?php }?>