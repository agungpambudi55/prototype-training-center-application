<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Install Setup Wizard - PENS Sistem Informasi Kerjasama</title>

<style>
@charset 'utf-8';
@font-face
{
	font-family:Roboto; 
		src:url(config/fonts/roboto/Roboto-Light.ttf); 
}

@font-face
{
	font-family:Opensans;
		src: url('config/fonts/opensans/opensans-light-webfont.eot');
		src: url('config/fonts/opensans/opensans-light-webfont.eot?#iefix') format('embedded-opentype'),
			 url('config/fonts/opensans/opensans-light-webfont.woff') format('woff'),
			 url('config/fonts/opensans/opensans-light-webfont.ttf') format('truetype'),
			 url('config/fonts/opensans/opensans-light-webfont.svg#open_sans_lightregular') format('svg');
			 font-weight: 800;
			 font-style: normal;
}

body{font-family:Roboto; background:#bad8f5; transition:background 0.4s;}
img{opacity:0.8; transition:opacity 0.62s;}
img:hover{opacity:1; filter:alpha(opacity=100); /* IE8 < */ }
#install-box{transition:box-shadow 0.4s}
#install-box:hover{box-shadow:1px 1px 5px #00B2FF;}
#next,#back{text-align:center; text-decoration:none; width:70px; font-family:Opensans; padding: 7px 15px 8px 15px; border: none; color:#fff; cursor:pointer;}
input[type="text"],input[type="password"]{border:1px solid #dedede; width: 150%; height:20px; padding:3px 3px; transition: border 0.435s, box-shadow 0.435s;}
input[type="text"]:hover,input[type="password"]:hover{border:1px solid #B2B2B2;}
input[type="text"]:focus,input[type="password"]:focus{box-shadow:0px 0px 3px #00B2FF;}
#next{background:#0099ab;}
#back{background:#d9522c;}
#next:hover,#back:hover{opacity: 0.84}
#next:active,#back:active{background:#0099ab;}
#next:focus,#back:focus{background:#000}
#install-box{margin:100px auto; padding:15px 20px; width:600px; min-height:200px; border: 1px solid #f6fff2; background:#f1ffed;}
#imgtbl{float:left;}
#dialog{float:left; width:350px;}
#content{position:relative; display:none;}
</style>
<script type='text/javascript' src='config/jquery-1.8.3.min.js'></script>
<script>
$(document).ready(function(){
$('#install-box').mouseover(function() {
    $('body').css({background:'#C8E9FF'});
});

$('#install-box').mouseleave(function() {
    $('body').css({background:'#bad8f5'});
});

});
</script>
</head>

<body>
<div id='install-box'>
<div id='imgtbl'>
<img src='config/images/pens.PNG' width='200' style='margin-right:25px'/>
</div>
<div id='dialog'>
<?php
if(!isset($_GET['step']))
{
	$_GET['step'] = "";
	//Intro
?>
	<script>
	$(document).ready(function(){
	content = $('#content'); installbox = $('#install-box'); installbox.css({height:'200px'}); content.fadeIn('slow');});
	function nextjq() {content.fadeOut(200); installbox.animate({height:'320px'});}
	</script>
	<div id='content'>
	<strong>Installation PENS Sistem Informasi Kerjasama</strong><br />
	<br />
	This wizard will guide you through the installation of PENS Sistem Informasi Kerjasama.<br />
	<br />
	Click Next to continue.<br />
	<br />
	<a href='?step=1' id='next' onclick='nextjq()'>Next</a>
	</div>
<?php
}
elseif($_GET['step'] == 1)
{
	//Installing Database
?>
	<script>
	$(document).ready(function(){
	content = $('#content');
	installbox = $('#install-box');
	content.fadeIn('slow');
	installbox.css({height:'320px'});
	});
	function nextjq()
	{
	var server 	= document.getElementsByName('mysql-server')[0].value;
	var user 	= document.getElementsByName('mysql-user')[0].value;
	var pass 	= document.getElementsByName('mysql-pass')[0].value;
	var db 		= document.getElementsByName('mysql-db')[0].value;
  	$.ajax({url:"install.php?step=2&server=localhost" , success:function(result){
		$("#dialog").html(result);
	}});
	content.fadeOut(200);
	installbox.animate({height:'300px'});
	}
	function backjq()
	{	
	content.fadeOut(200);
	installbox.animate({height:'200px'});
	}
	</script>
	<div id='content'>
	<strong>Configuring Database</strong><br />
	<br />This will configure the database. Just click Next if you want it default. Don't click back because it will bring you back.<br />
	<br />
	<table>
    <form method='post'>
	<tr><td>MySQL Server :<br /><font size='1px'> Default: localhost</font></td><td><input type='text' name='mysql-server' placeholder="isi" value='localhost'></td></tr>
	<tr><td>MySQL User :<br /><font size='1px'>Default: root</font></td><td><input type='text' name='mysql-user' value='root'></td></tr>
	<tr><td>MySQL Password :<br /><font size='1px'>Default: (none)</font></td><td><input type='password' name='mysql-pass' value=''></td></tr>
	<tr><td>Database Name:<br /><font size='1px'>Default: pens_kerjasama</font></td><td><input type='text' name='mysql-db' value='pens_kerjasama'></td></tr>
    </form>
	</table>
	<br />
	<a href='install.php' id='back' onclick='backjq()'>Back</a>	<a href='?step=2' id='next' onclick='nextjq()'>Next</a>
	</div>
<?php
}
elseif($_GET['step'] == 2)
{
	print_r($_GET);
?>
	<script>
	$(document).ready(function(){
	content = $('#content');
	installbox = $('#install-box');
	content.fadeIn('slow');
	installbox.css({height:'300px'});
	});
	function nextjq()
	{	
	content.fadeOut(200);
	installbox.animate({height:'200px'});
	}
	function backjq()
	{	
	content.fadeOut(200);
	installbox.animate({height:'300px'});
	}
	</script>
	<div id='content'>
	aaaaaaa
	<a href='?step=1' id='back' onclick='backjq()'>Back</a>	<a href='?step=3' id='next' onclick='nextjq()'>Next</a>
	</div>

<?php
}

echo "
</div>
</div>
</body>
</html>
";

$host	 		= "localhost";
$user 			= "root";
$password 		= "";
$db_name 		= "db_iscpens";
$conn 			= mysql_connect($host, $user, $password);
$selectdb 		= mysql_select_db($db_name, $conn);

echo "Status : ";
if($conn)		{
					if($selectdb)
					{
						echo "MySQL is connected. Database selected.";
					}
					else
					{
						echo "MySQL is connected. Database not selected yet.";
					}
				}
else			{echo "MySQL is not connected.";}
?>