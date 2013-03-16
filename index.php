<?php
$file_i	="installation/lock.conetc";
if(file_exists($file_i)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training Center</title>
<link rel="shortcut icon" href="style/images/favicon.png" />
<link rel="stylesheet" href="style/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
</head>
<body>
<?php include "pages/connect.php";?>
<a href="#m_ym"><div id="follow"></div></a>
<div id="m_ym">
<a href="#c_ym" title="Close" class="c_ym"></a>
<div id="m_ym_box">
<p class="t_ym">Yahoo Messenger<br /><br />
<a href="ymsgr:SendIM?needtothinksimple">
<img src="style/images/ym_.png" width="126" height="27" /><br />
Customer Service 1
<br />
<a href="ymsgr:SendIM?needtothinksimple">
<img src="style/images/ym_.png" width="126" height="27" /><br />
Customer Service 2</a><br />
<a href="ymsgr:SendIM?needtothinksimple">
<img src="style/images/ym_.png" width="126" height="27" /><br />
Customer Service 3</a>
</p>
</div>
</div>

<!-- menu button start -->
<div id="menu1"></div>
<div id="menu2"></div>
<!-- menu button end -->

<!-- sidebar start -->
<div id="sidebar">
<div id="datetime">
<p class="date1"><?php echo date('d'); ?></p>
<p class="date2"><?php echo date('m Y'); ?></p>
<p id="clockDisplay"></p>
</div>
<a href="index.php"><p class="home">Home</p></a>
<a href="index.php?page=training"><p class="training">Training</p></a>
<a href="index.php?page=agenda"><p class="agenda">Agenda</p></a>
<a href="index.php?page=instructors"><p class="instructors">Instructors</p></a>
<a href="index.php?page=cooperation"><p class="cooperation">Cooperation</p></a>
<a href="index.php?page=contact"><p class="contact">Contact Us</p></a>
<a href="index.php?page=location"><p class="location">Location</p></a>
<a href="index.php?page=about"><p class="about">About</p></a>
</div>
<!-- sidebar end -->

<!-- header start -->
<form method="post" action="index.php?page=search">
<div id="header">
<p class="hedcon">
<?php
$qry_logo=mysql_query("select * from tb_aksesoris where nama='logo'");
$arr_logo=mysql_fetch_array($qry_logo);
echo "
<img src='admin_tc/$arr_logo[2]' style='width:65px; height:65px; vertical-align:middle; margin:0px 10px 0px 0px' />$arr_logo[3]
";?><span class="search_box">
<input name="search" type="submit" value="" class="search_submit"/><input type="text" maxlength="80" name="search" class="search" placeholder="search" onclick="this.placeholder=''" onmouseout="this.placeholder='search'"/>
</span>
</p>
</div>
</form>
<!-- hearder end -->

<!-- container start-->
<div id="container">
<?php
if(@$_GET['page']) 
{
$page=$_GET['page'];
require_once("pages/".$page.".php");
}
else
{require_once("pages/home.php");}
?>
</div>
<!-- container end -->

<!-- footer start -->
<div id="footer">
<div class="widget_footer">
<ul>
	<li>
	<p class="title_foot">Site Map</p>
    <a href="index.php" class="link_foot"><p class="linkfoot">Home</p></a>
    <a href="index.php?page=training" class="link_foot"><p class="linkfoot">Training</p></a>
    <a href="index.php?page=agenda" class="link_foot"><p class="linkfoot">Agenda</p></a>
    <a href="index.php?page=instructors" class="link_foot"><p class="linkfoot">Instructors</p></a>
    <a href="index.php?page=cooperation" class="link_foot"><p class="linkfoot">Cooperation</p></a>
    <a href="index.php?page=contact" class="link_foot"><p class="linkfoot">Contact</p></a>
    <a href="index.php?page=location" class="link_foot"><p class="linkfoot">Location</p></a>
    <a href="index.php?page=about" class="link_foot"><p class="linkfoot">About</p></a>
    </li>
    <li>
	<p class="title_foot">New Training</p>
	<?php
	$qry_new_tra=mysql_query("select * from tb_judul order by id_judul desc limit 5");
	while($arr_new_tra=mysql_fetch_array($qry_new_tra))
	{
	$w_new=explode(" ", $arr_new_tra['2']);
	$r_new = implode(" ", array_slice($w_new, 0 , 5));
	echo "<a href='index.php?page=det&t=$arr_new_tra[0]' class='link_foot'><p class='linkfoot'>$r_new</p></a>";
	}
	?> 
    </li>
    <li>
	<p class="title_foot"> Categories</p>
	<?php
	$qry_categories=mysql_query("select * from tb_detail_pelatihan");
	$jum_categories=mysql_num_rows($qry_categories);
	if ($jum_categories >= 8)
	{
		$qry_cats=mysql_query("select * from tb_detail_pelatihan order by pelatihan limit 8");
		while($arr_cats=mysql_fetch_array($qry_cats))
		{
		echo "<a href='index.php?page=training&i=$arr_cats[0]' class='link_foot'><p class='linkfoot'>$arr_cats[2]</p></a>";
		}
		echo "<a href='index.php?page=training' class='link_foot'><p class='linkfoot'>Read more...</p></a>";
	}
	else
	{
		$qry_cats=mysql_query("select * from tb_detail_pelatihan");
		while($arr_cats=mysql_fetch_array($qry_cats))
		{
		echo "<a href='index.php?page=training&i=$arr_cats[0]' class='link_foot'><p class='linkfoot'>$arr_cats[2]</p></a>";
		}

	}
	?>
    </li>
    <li>
	<p class="title_foot">Information</p>
    <p class="widget_maps"><a href="index.php?page=location">EEPIS</a></p>
    <p class="widget_place"><a href="https://maps.google.co.id/maps?ie=UTF8&cid=13700730021263378887&q=EEPIS&iwloc=A&gl=ID&hl=en" target="_blank">JL. Raya ITS Politeknik Elektronika Surabaya Surabaya 60111</a></p>
    <p class="widget_telephone">(031) 5947280</p>
    <p class="widget_mobile">0856-4884-3395</p>
    </li>
</ul>
</div>
<div id="share">
Share On :   
<a href="http://plus.google.com/share?url=http://www.tc.eepis-its.edu" class="gog" target="_blank"></a>
<a href="http://www.facebook.com/share.php?u=http://www.facebook.com/share.php?u=http://www.tc.eepis-its.edu" class="fb" target="_blank"></a>
<a href="http://twitter.com/share?url=http://www.tc.eepis-its.edu" class="tw" target="_blank"></a>
<a href="http://digg.com/submit?phase=2&url=http://www.tc.eepis-its.edu" class="digg" target="_blank"></a>
</div>
<div class="license">
Copyright &copy; 2012 <a href="index.php">Training Center EEPIS</a>. All rights reserved.  
</div>

</div>
<!-- footer end -->
<p id="back-top"></p>
<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>
<?php
}else{
header("location: installation/setup-config.php");
}
?>