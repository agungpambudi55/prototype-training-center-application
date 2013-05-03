$(document).ready(function(){
var height = 200;
content = $("#content");
installbox = $("#install-box");
content.fadeIn('slow');
});

function installjq()
{	
	content.fadeOut(500);
	installbox.animate({height:'300px'});
}