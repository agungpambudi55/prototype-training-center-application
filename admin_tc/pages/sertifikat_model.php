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
<style type="text/css">
.titlemodel{ margin:0px 40px 0px 40px; font-size:30px; text-align:center; font-family:vijaya; border: 0px solid gray; padding:0px 0px 0px 80px;}
#model{ width:250px; margin:0px 40px 0px 40px; float:left; border:0px solid #F00; padding:0px 10px 0px 15px}
.gambarmenu{background:#FFF; width:340px; height:300px;}
.gambarmenu:hover{ background: #DDE8FF}
</style>
<div class="title_page">
Model Serfitikat
</div>
<div id="content" style="position:relative; overflow:hidden">
<p class="backk"><a href="javascript:self.history.back();" class="back"></a></p>
<div id="model">
<h3 class="titlemodel">Model A</h3>
<a href="pages/sertifikat_model_a.php?idterakir=<?php echo $_GET['idterakir']; ?>&model=a">
<div class="gambarmenu">
<IMG src="style/images/sertifikat1.png" width="350px" height="300px"  />
</div>
</a>
</div>

<div id="model">
<h3 class="titlemodel">Model B</h3>
<a href="pages/sertifikat_model_b.php?idterakir=<?php echo $_GET['idterakir']; ?>&model=b">
<div class="gambarmenu">
<IMG src="style/images/sertifikat2.png" width="350px" height="300px"  />
</div>
</a>
</div>

<div id="model">
<h3 class="titlemodel">Model C</h3>
<a href="pages/sertifikat_model_c.php?idterakir=<?php echo $_GET['idterakir']; ?>&model=c">
<div class="gambarmenu">
<IMG src="style/images/sertifikat3.png" width="350px" height="300px"  />
</div>
</a>
</div>
</div>
<?php
}
?>