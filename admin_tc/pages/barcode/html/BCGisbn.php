<?php
define('IN_CB', true);
if (!function_exists('imagecreate')) {exit('Sorry, make sure you have the GD extension installed before running this script.');}
include_once('include/function.php');
// FileName & Extension
$system_temp_array = explode('/', $_SERVER['PHP_SELF']);
$filename = $system_temp_array[count($system_temp_array) - 1];
$system_temp_array2 = explode('.', $filename);
$availableBarcodes = listBarcodes();
$barcodeName = findValueFromKey($availableBarcodes, $filename);
$code = $system_temp_array2[0];
// Check if the code is valid
if (file_exists('config' . DIRECTORY_SEPARATOR	 . $code . '.php')) {include_once('config' . DIRECTORY_SEPARATOR . $code . '.php');}
$default_value = array();
$default_value['filetype'] = 'PNG';
$default_value['dpi'] = 70;
$default_value['scale'] = 1;
$default_value['rotation'] = 0;
$default_value['font_family'] = 'Arial.ttf';
$default_value['font_size'] = 8;
$default_value['text'] = '';
$default_value['a1'] = '';
$default_value['a2'] = '';
$default_value['a3'] = '';
$query_tampil_barcode=mysql_query("
SELECT tb_sertifikat.no_barcode, tb_sertifikat.no_sertifikat, tb_sertifikat.tgl_sertifikat, tb_nilai.nilai, tb_sertifikat.kerjasama, tb_sertifikat.ket, tb_daftar_peserta.nama, tb_judul.judul_training, tb_instruktur.nama ,tb_director.director
FROM tb_sertifikat, tb_daftar_peserta, tb_pilih_judul, tb_judul, tb_instruktur, tb_nilai,tb_director
WHERE tb_daftar_peserta.no_peserta = tb_sertifikat.no_peserta
AND tb_pilih_judul.id_pilih_judul = tb_sertifikat.id_pilih_judul
AND tb_pilih_judul.id_judul = tb_judul.id_judul
AND tb_instruktur.id_instruktur = tb_sertifikat.id_instruktur
AND tb_sertifikat.id_nilai = tb_nilai.id_nilai
AND tb_sertifikat.id_director = tb_director.id_director
AND tb_sertifikat.id_sertifikat =$id_terakir");
$row_barcode=mysql_fetch_array($query_tampil_barcode);
$nobarcode=$row_barcode['no_barcode'];

$filetype = isset($_POST['filetype']) ? $_POST['filetype'] : $default_value['filetype'];
$dpi = isset($_POST['dpi']) ? $_POST['dpi'] : $default_value['dpi'];
$scale = intval(isset($_POST['scale']) ? $_POST['scale'] : $default_value['scale']);
$rotation = intval(isset($_POST['rotation']) ? $_POST['rotation'] : $default_value['rotation']);
$font_family = isset($_POST['font_family']) ? $_POST['font_family'] : $default_value['font_family'];
$font_size = intval(isset($_POST['font_size']) ? $_POST['font_size'] : $default_value['font_size']);
//$text = isset($_POST['text']) ? $_POST['text'] : $default_value['text'];
$text=$nobarcode;

registerImageKey('filetype', $filetype);
registerImageKey('dpi', $dpi);
registerImageKey('scale', $scale);
registerImageKey('rotation', $rotation);
registerImageKey('font_family', $font_family);
registerImageKey('font_size', $font_size);
registerImageKey('text', $text);


registerImageKey('code', 'BCGisbn');
$characters = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
$finalRequest = '';
foreach (getImageKeys() as $key => $value) {$finalRequest .= '&' . $key . '=' . urlencode($value);}
if (strlen($finalRequest) > 0) {$finalRequest[0] = '?';}
if ($imageKeys['text'] !== '') { ?><img src="barcode/html/image.php<?php echo $finalRequest; ?>" alt="Barcode Image" /><?php }
else { ?>Fill the form to generate a barcode.<?php } ?>
