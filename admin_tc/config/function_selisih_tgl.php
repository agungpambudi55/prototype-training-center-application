<?php
function selisihTgl($tgl1,$tgl2){
$pecah=explode("/", $tgl1);
$date1=$pecah[0];
$month1=$pecah[1];
$year1=$pecah[2];
$pecah2=explode("/", $tgl2);
$date2=$pecah2[0];
$month2=$pecah2[1];
$year2=$pecah2[2];
$jd1=gregorianToJD($month1,$date1,$year1);
$jd2=gregorianToJD($month2,$date2,$year2);
$s=$jd2-$jd1;
return $s;
}
?>