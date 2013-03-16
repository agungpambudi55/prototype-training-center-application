<style type="text/css">
#content{ min-height:523px; border:1px solid #999; margin-bottom:5px; border-radius:10px; box-shadow:0px 0px 5px #666666; text-align:justify}
#title{ margin:0; padding:10px; text-align:center; text-transform:uppercase;  color:#F8F8F8; font-size:22px; font-weight:bold;border-radius:10px 10px 0px 0px; background:#007FFF; text-shadow:0px 0px 1px #CCCCCC; border-bottom:1px solid #C1C1C1 }
#con_tent{ padding:20px; font-size:14px; background:url(style/images/bgtraining.png) no-repeat 50% 50%;}
b{ font-size:17px;}
h3{ font-size:16px; margin:20px 0px 5px 0px; padding:0}
h4{ font-size:14px; margin:20px 0px 5px 0px; padding:0}
</style>
<div id="content">
<p id="title">ABOUT</p>
<div id="con_tent">
<?php
$qry_about=mysql_query("select * from tb_aksesoris where nama='about website'");
$arr_about=mysql_fetch_array($qry_about);
echo "$arr_about[3]";
?></div>
</div>