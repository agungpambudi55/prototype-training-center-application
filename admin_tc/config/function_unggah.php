<?php
function unggah_gambar($tmp,$tempat,$gambar,$format){
	$tmp		=	$_FILES['upload']['tmp_name'];
	//$ukuran		=	$size_file < $ukuran_file;
	
	if	( $format=='image/gif'|| $format == 'image/jpeg' || $format == 'image/pjpeg' || $format == 'image/png' ){
		$unggah		=	move_uploaded_file($tmp, $tempat.$gambar);
		return $unggah;
		}
	else
		{
		echo "File harus ber extensi jpg,gif,jpeg or png dan ukuran file kurang dari $ukuran_file";
		}
}
?>