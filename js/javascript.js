$(document).ready(function(){ 
$('#header').fadeIn(2000);$('#container').fadeIn(2000);$('#footer').fadeIn(2000);$('#menu1').fadeIn(2000);
$("#back-top").hide();

$(function () {
$(window).scroll(function () {if ($(this).scrollTop() > 100){$('#back-top').fadeIn(900);} else {$('#back-top').fadeOut(600);}});
$('#back-top').click(function () {$('body,html').animate({scrollTop: 0 }, 800); return false;});});

$(".search_submit").hover(function(){$(".search_box").toggleClass("search_box_box");});
$(".search_submit").hover(function(){$(".search").toggleClass("search1");});

$('#menu1').click(function(){
	$('#menu2').fadeIn(0);
	$('#sidebar').animate({'margin-left':'+=300px'}, 500, 'swing');
	$('#menu1').animate({'margin-left':'-=100px'}, 500, 'swing');
	$('#menu2').animate({'margin-left':'+=300px'}, 500, 'swing');
});
$('#menu2').click(function(){
	$('#menu1').animate({'margin-left':'+=100px'}, 550, 'swing');
	$('#menu2').animate({'margin-left':'-=300px'}, 500, 'swing');
	$('#sidebar').animate({'margin-left':'-=300px'}, 500, 'swing');	
});

    $(function() {
        $(".home").hover(
            function() {
                $(this).animate({ color: "#00ff00" }, 'slow');
            },function() {
                $(this).animate({ color: "#ff0000" }, 'slow');
        });
    });

});

function renderTime() {
var currentTime = new Date(); var diem = "AM"; var h = currentTime.getHours(); var m = currentTime.getMinutes(); 
var s = currentTime.getSeconds();
setTimeout('renderTime()',1000);
if (h == 0) {h = 12;} else if (h > 12) { h = h - 12;diem="PM";}
if (h < 10) {h = "0" + h;} if (m < 10) {m = "0" + m;} if (s < 10) {s = "0" + s;}
var myClock = document.getElementById('clockDisplay'); 
myClock.textContent = h + ":" + m + ":" + s + " " + diem; myClock.innerText = h + ":" + m + ":" + s + " " + diem;
}
renderTime();
