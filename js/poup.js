
var popupStatus = 0;

//loading popup with jQuery magic!
function loadPopup(content, background){
	//loads popup only if it is disabled

	if(popupStatus==0){
		background.css({
			"opacity": "0.5"
		});
		background.fadeIn("slow");
		content.fadeIn("slow");
		popupStatus = 1;
	}
}

//disabling popup with jQuery magic!
function disablePopup(content, background){
	//disables popup only if it is enabled
	if(popupStatus==1){
		background.fadeOut("slow");
		content.fadeOut("slow");
		popupStatus = 0;
	}
}

//centering popup
function centerPopup(content, background){
	//request data for centering
	var windowWidth = $(document).width();
	var windowHeight = $(document).height();
	var popupHeight = content.height();
	var popupWidth = content.width();
	
	//centering
	content.css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
	});
	//only need force for IE6
	
	background.css({
		"height": windowHeight
	});
}

function slideshow(slideObject, width){
	
	var currentPosition = 0;
	if(width){
		var slideWidth = width;
	} else {
		var slideWidth = 724; // highly important number
	}
	var slides = $('.slide', slideObject);
	var numberOfSlides = slides.length;

	$('.slidesContainer', slideObject).css('overflow', 'hidden');

	if(!$('.slideInner', slideObject).length){
		slides
		.wrapAll('<div class="slideInner"></div>')
		.css({
		  'float' : 'left',
		  'width' : slideWidth
		});
	}
	
	$('.slideInner', slideObject).css('width', slideWidth * numberOfSlides);
	if(!$('.control', slideObject).length){
		$(slideObject).prepend('<span class="control leftControl">Clicking moves left</span>');
		$(slideObject).append('<span class="control rightControl">Clicking moves right</span>');
	}

	manageControls(currentPosition);
	$('.control').bind('click', function(){
		console.log(this);
		$(this).stop(true, true);
		doMovement(this, null);
	});

	$(document).keypress(function(e){  
		if(e.keyCode==37 || e.keyCode==39){ 
			doMovement(null, e);
		}  
	}); 

	function doMovement(that, e){
		if(that !== null && e == null){
	  		currentPosition = ($(that).attr('class')=='control rightControl') ? currentPosition+1 : currentPosition-1;
		} else {
			if(e.keyCode == 39){
				if(currentPosition != numberOfSlides-1){
					currentPosition = currentPosition+1;
				}
			} else if(e.keyCode == 37){
				if(currentPosition != 0){
					currentPosition = currentPosition-1;
				}
			}
		}
		manageControls(currentPosition);
		// Move slideInner using margin-left
		$('.slideInner', slideObject).animate({
		  'marginLeft' : slideWidth*(-currentPosition)
		});
	}

	function manageControls(position){
		console.log(position);
	if(position==0){ $('.leftControl', slideObject).hide() } else{ $('.leftControl', slideObject).show() }
	if(position==numberOfSlides-1){ $('.rightControl', slideObject).hide() } else{ $('.rightControl', slideObject).show() }
	}	
}

$(document).ready(function(){

	var popupFunction = function(){

		var obj = {
			content: '',
			background: $('#backgroundPopup')
		}

		$(".boxes").click(function(){
			$(this).stop(true, true);
			obj.content = $(this).next('div.sliderContent');
			centerPopup(obj.content, obj.background);
			loadPopup(obj.content, obj.background);
			if(slide == undefined){
				var slide = slideshow(obj.content, $(obj.content).attr('data-slidesWidth'));
			}
		});

		$(".popupContactClose").click(function(){
			disablePopup(obj.content, obj.background);
		});
		
		$(obj.background).click(function(){
			disablePopup(obj.content, obj.background);
		});
		
		$(document).keypress(function(e){  
			if(e.keyCode==27 && popupStatus==1){ 
			disablePopup(obj.content, obj.background);  
			}  
		});  
	}(); 
});
