<div class="title_page">
Kamera
</div>
<div id="content">
	<table border="0" cellpadding="0" cellspacing="0"><tr><td valign=top>

	
	<!-- First, include the JPEGCam JavaScript Library -->
	<script type="text/javascript" src="style/camera/webcam.js"></script>
	
	<!-- Configure a few settings -->
	<script language="JavaScript">
		webcam.set_api_url( 'config/test_instruktur.php' );
		webcam.set_quality( 100 ); // JPEG quality (1 - 100)
		webcam.set_shutter_sound( true ); // play shutter click sound
	</script>
	
	<!-- Next, write the movie to the page at 320x240 -->
	<script language="JavaScript">
		document.write( webcam.get_html(400, 450) );
	</script>
	<?php
		
	$query=mysql_query("select max(id_instruktur) as id_instruktur from tb_instruktur");
	$row=mysql_fetch_array($query);
	$idmax=$row['id_instruktur'] + 1;
	?>
	<!-- Some buttons for controlling things -->
	<br/>
    <form>
		<input class="submit" style=" margin:10px 0px 0px 0px; float:left" type=button value="Configure..." onClick="webcam.configure()">
		<input class="submit" style=" margin:10px 0px 0px 23px; float:left" type=button value="Capture" onClick="webcam.freeze()">
		<input class="submit" style=" margin:10px 0px 0px 23px; float:right" type=button value="Reset" onClick="webcam.reset()">
		<input class="submit" style=" margin:10px 0px 0px 23px; float:right" type=button value="Upload" onClick="do_upload()">
	</form>
    <?php
	$filename =date('Y-m-d-H-i-s')
	?>
	<!-- Code to handle the server response (see test.php) -->
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );
		
		function do_upload() {
			// upload to server
			document.getElementById('upload_results').innerHTML = '<B>Uploading...</B>';
			webcam.upload();
			location.href=('index.php?page=instruktur_insert&image=<?php echo $idmax; ?>');
			
		}
		
		function my_completion_handler(msg) {
			// extract URL out of PHP output
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				// show JPEG image in page
				document.getElementById('upload_results').innerHTML = 
					'<img src="' + image_url + '">' + '<h3>Upload Successful!</h3>';
				
				// reset camera for another shot
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
	
	</td><td>&nbsp;&nbsp;&nbsp;</td><td valign=top align="center">
		<div id="upload_results" style="background-color:#eee; display:none"></div>
	</td></tr></table>
</div>