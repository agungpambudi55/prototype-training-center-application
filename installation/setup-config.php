<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training Center EEPIS > Setup Configuration File</title>
<script type="text/javascript" src="easing1.js"></script>
<script type="text/javascript" src="easing2.js"></script>
<script src="jquery.min.js" type="text/javascript"  /></script>
<script src="passwordstrength.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".menu1").hide();
  $(".menu2").hide();
});
</script>
<script type="text/javascript">
		$(document).ready(function(){
			$( 'input.password-box' ).live( 'keyup', function() {
			var howStrong = passwordStrength( $( this ).val() );
			$( '.strength-text', $( this ).next() ).text( howStrong );
			var sColor = 'rgb(238, 238, 238)';
			switch( howStrong ) {
				case 'Strong' :
					$( '.password-strength', $( this ).next() ).css( 'background-color', 'green' );
					break;
				case 'Medium' :
					$( '.password-strength', $( this ).next() ).css( 'background-color', 'lightgreen' );
					break;
				case 'Weak' :
					$( '.password-strength', $( this ).next() ).css( 'background-color', 'orange' );
					break;
				case 'Short' :
					$( '.password-strength', $( this ).next() ).css( {"background-color":"rgb(255, 160, 160)","border":"1px solid","border-color":"#f40909 !important" });
					break;
				default :
					$( '.password-strength', $( this ).next() ).css( 'background-color', 'rgb(238, 238, 238)' );
			}
			}).focusout( function() {
				$( this ).trigger( 'keyup' );
			});
 
	});
 
</script>
<style type="text/css">
body{
	background: none repeat scroll 0% 0% rgb(249, 249, 249);
	font-family:Verdana, Geneva, sans-serif;
	padding:90px 0px 0px 0px;
	color:#FFFFFF
}

#outer-wrapper{
	font-size:12px;
	border: 1px solid rgb(223, 223, 223);
    border-top-width: 1px;
    border-right-width-value: 1px;
    border-right-width-ltr-source: physical;
    border-right-width-rtl-source: physical;
    border-bottom-width: 1px;
    border-left-width-value: 1px;
    border-left-width-ltr-source: physical;
    border-left-width-rtl-source: physical;
    border-top-style: solid;
    border-right-style-value: solid;
    border-right-style-ltr-source: physical;
    border-right-style-rtl-source: physical;
    border-bottom-style: solid;
    border-left-style-value: solid;
    border-left-style-ltr-source: physical;
    border-left-style-rtl-source: physical;
    border-top-color: rgb(223, 223, 223);
    border-right-color-value: rgb(223, 223, 223);
    border-right-color-ltr-source: physical;
    border-right-color-rtl-source: physical;
    border-bottom-color: rgb(223, 223, 223);
    border-left-color-value: rgb(223, 223, 223);
    border-left-color-ltr-source: physical;
    border-left-color-rtl-source: physical;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image-source: none;
    border-image-slice: 100% 100% 100% 100%;
    border-image-width: 1 1 1 1;border-image-outset: 0 0 0 0;border-image-repeat: stretch stretch;margin:0 auto;width:700px;border-radius:3px 3px 3px 3px;padding:5px;background: none repeat scroll 0% 0% rgb(255, 255, 255);}
	
#header-wrapper{border:0px solid #000;}
#header-wrapper .logo{border:0px solid #F00;margin:0 auto;padding:0px 0px 3px 0px;;background:url(pens.png) no-repeat center;width:150px;height:150px;background-size: 150px;}
#header-wrapper .judul{color:#333;font-size:30px;text-align:center;	font-family:Verdana, Geneva, sans-serif;padding:3px; font-weight:bold}
/*button*/
.classname{-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;box-shadow:inset 0px 1px 0px 0px #ffffff;background-color:#ffffff;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:3px;display:inline-block;color:#6e666e;font-family:Verdana;font-size:13px;font-weight:bold;padding:7px 20px;text-decoration:none;text-shadow:1px 1px 0px #ffffff;}
.classname:hover {box-shadow: 0px 0px 2px #888888; background:#EFEFEF}
.classname:active {position:relative;top:1px;}

.classnamebutton{-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;box-shadow:inset 0px 1px 0px 0px #ffffff;background-color:#ffffff;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:3px;display:inline-block;color:#6e666e;font-family:Verdana;font-size:13px;font-weight:bold;padding:6px 20px;text-decoration:none;text-shadow:1px 1px 0px #ffffff;}
.classnamebutton:hover {box-shadow: 0px 0px 2px #888888;background:#EFEFEF}
.classnamebutton:active {position:relative;top:1px;}
/*button end*/

#welcome{background:#568AD8;width:auto;height:auto; padding:10px 0px 10px 0px;}
#content-wrapper{border:0px solid #039;}
#content-wrapper .isi{text-align:left;padding:0px 5px 10px 15px;font-size: 14px;line-height: 1.5;}

#content-wrapper li{text-align:left;font-size: 14px;line-height: 1.5;}
#footer-wrapper{margin:0 auto;background:#FC3;border:0px solid #039;}
.tombol{padding:8px 10px 10px 8px;margin:0 auto;background:#FC3;border:0px solid #039;}

.menu1{padding:10px 10px 10px 5px;background: #568AD8;position:relative;}
.ifrun-step{padding:10px 10px 10px 5px;background: #568AD8;position:relative;display:none}
.ifgo{padding:8px 10px 10px 8px;margin:0 auto;background:#FC3;border:0px solid #039; }

.input{border:transparant 1px solid; height:20px; width:180px; padding:2px}
.input:focus{border:#FF9900 1px solid; position:relative;}
.default{font-size:8.5px; margin-top:0px; color:#282828}

/*finish*/
.finish{border-bottom: 1px solid rgb(218, 218, 218); padding:5px 5px 3px 5px; font-size:25px; font-weight:bold; color:#fff; font-family: Georgia,"Times New Roman",Times,serif;}
.finish-des{ font-size:12px; padding:3px; top:0px; color:#FFF}


/*validasi password*/
.chk_avlblty{margin: 10px 0 0 0px;width:180px;text-align:center;}
.strength-text{font-size:13px;font-weight:bold;}
.chk_avlblty span.password-strength{width:175px; padding:3px 5px 3px 5px;-moz-border-radius:5px;-webkit-border-radius:5px;height:auto;background-color:rgb(238, 238, 238);display:block; text-align:center}
.chk_avlblty span.client-avail{display:block;}
.password-box{border:transparant 1px solid; height:20px; width:180px; padding:2px}
.password-box:focus{border:#FF9900 1px solid; position:relative;}
</style>
</head>

<body>

<div id="outer-wrapper">
		<div id="header-wrapper">
			<div class="logo"></div>
			<div class="judul">Training Center EEPIS</div>
			</div>
        <?php
			if($_GET['step']=='1')
			{
			$tombolback		="<a href='setup-config.php' class='classname'>Back</a>";
			$submitbutton	="<input type='submit' class='classnamebutton' value='submit' style='border:0px; cursor:pointer; height:auto'/>";
		?>
        	<script>
			$(document).ready(function(){
        	$("#welcome").fadeOut(0);
			$(".menu1").fadeIn(1900);
			});
			</script>
		<?php
			}
			else if($_GET['step']=='2')
			{
		?>
			<script>
			$(document).ready(function(){
				$(".ifrun-step").fadeIn(1900);
			});
			</script>
		<?php
			$runinstall="
			<div class='ifrun-step' align='center' style='color:#fff; font-size:20px;border:1px solid #fff;'>Anda sudah melewati tahap pertama <br/>
			<form method='post' action='installer.php'>
			<input type='hidden' name='host' value='".$_POST['host']."' />
			<input type='hidden' name='user' value='".$_POST['user']."' />
			<input type='hidden' name='password' value='".$_POST['password']."' />
			<input type='hidden' name='db' value='".$_POST['db']."' />
			<div class='ifgo' style='margin-top:19px;'><input type='submit' value='Run Install' class='classnamebutton' style='border:0px; cursor:pointer; height:auto'></div>
			</form></div>";
			}
			else if($_GET['step']=='3'){
			?>
            <script>
			$(document).ready(function(){
				$(".ifrun-step").fadeIn(1900);
			});
			</script>
            <?php
			$instalation	="
			<div class='ifrun-step'>
			<div style='color:#FFF; border-bottom:2px solid orange; margin-bottom:15px; padding-bottom:5px;'>Silahkan isi data form username dan password anda. ini berguna untuk login anda nanti.</div>
			<table width='489' border='0'>
			<form method='post' action='query_installation.php' name='form_install_step3'>
			<tr height='35px'>
			<td>Username
			</td>
			<td><input type='text' name='username' class='input' placeholder='username'/></td>
			</tr>
			<tr height='35px'>
			<td>Password</td>
			<td>
				<input type='password' name='password' value='' class='password-box' placeholder='●●●●●●●●●●'/>
				<div class='chk_avlblty chk_pswd' align='left'>
				<span class='password-strength'>
    			<span class='strength-text'>Strength indicator
				</span>
            	</span>
				</div>
			</td>
			</tr>
			<tr height='35px'>
			<td>Re Password</td>
			<td><input type='password' name='repassword' class='input'class='input' placeholder='●●●●●●●●●●'/></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<tr>
			</table>
				<div class='ifgo' style='margin-top:10px;'>
				<input type='submit' value='Install Training Center' name='form_install_step3' class='classnamebutton' style='border:0px; cursor:pointer; height:auto'>
				</div>
			</form>
			</div>
			";
			}else if($_GET['step']=='4')
			{
			?>
            <script>
			$(document).ready(function(){
				$(".ifrun-step").fadeIn(1900);
			});
			</script>
			<?php
			$finish	=
			"<div class='ifrun-step'>
			<div class='finish'>Success!</div>
			<p class='finish-des'>Sistem Training Center PENS telah terinstall silahkan anda klik menu login dibawah ini.</p>
			<div class='ifgo'><a href='../admin_tc/pages/login.php' class='classname'>Log In</a></div>
			</div>"
			;
			}
			else
			{
			$tombilgo="<div class='ifrundes'><div class='ifgo'><a href='?step=1' class='classname'>Lest Go!</a></div></div>";
		?>
        <div id="content-wrapper">
        	<div id		="welcome">
			<p class	="isi">
			Selamat datang di Training Center EEPIS. Sebelum Anda memulai, Kami memerlukan beberapa informasi pada databases. Anda Perlu mengetahui hal-hal sebagai Berikut :
			</p>
			<ol>
			<li>Databases Name</li>
			<li>Databases Username</li>
			<li>Databases Host </li>
            <li>Databases Name </li>
			</ol>
        </div>
        <?php
			}
		?>
        <div class="menu1">
       		<form method="post" action="?step=2">
			<table width="489" border="0">
    		<tr height="35px">
    		<td width="175">Host
            <div class="default">Default Host : localhost</div>
            </td>
    		<td width="304"><input type="text" class="input" name="host" value="localhost"/></td>
    		</tr>
    		<tr height="35px">
    		<td>Username
            <div class="default">Default Username : root</div>
            </td>
    		<td><input type="text" class="input" name="user" value="root"/></td>
    		</tr>
    		<tr height="35px">
    		<td>Password
            <div class="default">Default Pasword : (none)</div>
            </td>
    		<td><input type="text" class="input" name="password" /></td>
    		</tr>
    		<tr height="35px">
    		<td>Databases Name
            <div class="default">Default DB : db_layanan_tc_pens1</div>
            </td>
    		<td><input type="text" class="input" name="db" value="db_layanan_tc_pens1"/></td>
			</tr>
			</table>
    		<div class="tombol">
    		<?php
			echo $tombolback." ";
			echo $submitbutton." ";
			?>
    		</div>
    		</form>
		</div>
<?php echo $runinstall; ?>
<?php echo $tombilgo." "; ?>
<?php echo $instalation; ?>
<?php echo $finish; ?>
</div>
</div>



</body>
</html>