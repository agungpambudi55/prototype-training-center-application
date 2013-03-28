$(document).ready(function(){ $('#container').fadeIn(1900);$('.con2').hide(0);$('#acc_up').hide(0);});
function hapus_semua(){if (confirm('Yakin ingin menghapus semua?')){return true;}else{return false;}}
function hapus_10(){if (confirm('Yakin ingin menghapus 10 terakhir?')){return true;}else{return false;}}
function konfirmasi_kelas(name){if (confirm('Yakin ingin menghapus kelas '+ name +' ?')){return true;}else{return false;}}
function bktm(name){if (confirm('Yakin ingin menghapus pesan dari '+ name +' ?')){return true;}else{return false;}
}function konfirmasi_judul(name){if (confirm('Yakin ingin menghapus judul '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_kategori(name){if (confirm('Yakin ingin menghapus kategori '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_jenispeserta(name){if (confirm('Yakin ingin menghapus jenis peserta '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_pelatihan(name){if (confirm('Yakin ingin menghapus pelatihan '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_biaya(name){if (confirm('Yakin ingin menghapus biaya dari judul '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_tempat(name){if (confirm('Yakin ingin menghapus tempat '+ name +' ?')){return true;}else{return false;}
}function konfirmasi_jadwal(name){if (confirm('Yakin ingin menghapus jadwal pelatihan '+ name +' ?')){return true;}else{return false;}}
function konfirmasi_peserta(name){if (confirm('Yakin ingin menghapus peserta '+ name +' ?')){return true;}else{return false;}}
function ins(name){if (confirm('Yakin ingin menghapus instruktur '+ name +' ?')){return true;}else{return false;}}
function absen_kelas(name){if (confirm('Yakin ingin menghapus data absen dari kelas '+ name +' ?')){return true;}else{return false;}}
$('.con1').click(function(){$('#control').animate({'margin-top':'+=300px'}, 600, 'swing'), $('.con1').hide(0),$('.con2').show(0)});
$('.con2').click(function(){$('#control').animate({'margin-top':'-=300px'}, 800, 'swing'), $('.con2').hide(0),$('.con1').show(0)});
$('#acc_down').click(function(){$('#account_con').animate({'margin-top':'+=300px'}, 500, 'swing'),$('#acc_down').hide(0),$('#acc_up').show(0)});
$('#acc_up').click(function(){$('#account_con').animate({'margin-top':'-=300px'}, 800, 'swing'),$('#acc_down').show(0),$('#acc_up').hide(0)});
$("#login").submit(function(){$(".sub_log").val("Connecting...");})
$('#username').focusin(function(){$('.us_in').animate({'margin-left':'-=15px','width':'+=15px'}, 400, 'swing')});
$('#username').focusout(function(){$('.us_in').animate({'margin-left':'+=15px','width':'-=15px'}, 400, 'swing')});
$('#password').focusin(function(){$('.pass_in').animate({'margin-left':'-=15px','width':'+=15px'}, 400, 'swing')});
$('#password').focusout(function(){$('.pass_in').animate({'margin-left':'+=15px','width':'-=15px'}, 400, 'swing')});
function renderTime() {
var currentTime = new Date(); var diem = "AM"; var h = currentTime.getHours(); var m = currentTime.getMinutes(); var s = currentTime.getSeconds();
setTimeout('renderTime()',1000);if (h == 0) {h = 12;} else if (h > 12) { h = h - 12;diem="PM";}
if (h < 10) {h = "0" + h;} if (m < 10) {m = "0" + m;} if (s < 10) {s = "0" + s;}
var myClock = document.getElementById('clockDisplay'); 
myClock.textContent = h + ":" + m + ":" + s + " " + diem; myClock.innerText = h + ":" + m + ":" + s + " " + diem;}
renderTime();
function hid(oby){$(oby).parent().fadeOut();}