$.fn.tubeslider = function(time){
	var _this = this;
	var isover = false;
	$(_this).css("opacity", 0);
	$(_this).animate({"opacity": 1}, 500);
	if(time == null){
		time = 3000;
	}	
	slideshow();
	function slideshow(){
		$(_this).children("a").css("opacity", 0);
		$(_this).children("a.show").css("opacity", 1);
		setInterval(playimages, time);
		captions($(_this).children("a.show"));
		$("#gallery span.prev").click(function(){
			if($(_this).children("a").is(":animated")){
				return false;
			}
			playimages('prev');
		});
		$("#gallery span.next").click(function(){
			if($(_this).children("a").is(":animated")){
				return false;
			}
			playimages('next');
		});
	}	
	function playimages(np){
		var current = $("#gallery a.show");
		if(current.length == 0){
			current = $(_this).children("a:first");
		}
		var next = current.next();
		if(next.hasClass("button")){
			next = $(_this).children("a:first");
		}
		$('#sidebar').hover(function(){isover = true;}, function(){isover = false;});
		var prev = current.prev();
		if(prev.length == 0){
			prev = $(_this).children("a:last");
		}
		$(_this).hover(function(){
			isover = true;
		}, function(){
			isover = false;
		});
		if(isover == false){
			if(np == null){
				next.addClass("show").animate({"opacity": "1.0"}, 500);
				current.removeClass('show').animate({"opacity": "0"}, 500);
			}
			captions(next);			
		}
		if(np == 'prev'){
			prev.addClass("show").animate({"opacity": "1.0"}, 500);
			current.removeClass('show').animate({"opacity": "0"}, 500);
			captions(prev);			
		}
		if(np == 'next'){
			next.addClass("show").animate({"opacity": "1.0"}, 500);
			current.removeClass('show').animate({"opacity": "0"}, 500);
			captions(next);
		}
	}
	function captions(nextorprev){
		if(nextorprev.find("img").attr("rel") != null){
			if($(_this).children(".cts_content").length == 0){
				$(_this).append("<div class='cts_content'><div class='cts_caption'></div></div>");
			}
			$(_this).find(".cts_content").css({"opacity": 0.7, "height": 45});
			$(_this).find(".cts_content").animate({'padding-bottom':'+=20px'}, 50, 'swing');
			$(_this).find(".cts_caption").html(nextorprev.find("img").attr("rel"));
		}else{
			$(_this).children(".cts_content").remove();
		}
		$(_this).find(".cts_content").animate({'padding-bottom':'-=20px'}, 250, 'swing');

	}
}