
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

$(document).ready(function(){

	var popupFunction = function(){

		var obj = {
			content: '',
			background: $('#backgroundPopup')
		}

		$(".boxes").click(function(){
			obj.content = $(this).next('div#sliderContent');
			centerPopup(obj.content, obj.background);
			loadPopup(obj.content, obj.background);
		});

		$("#popupContactClose").click(function(){
			disablePopup(obj.content, obj.background);
		});
		
		$("#backgroundPopup").click(function(){
			disablePopup(obj.content, obj.background);
		});
		
		$(document).keypress(function(e){  
			if(e.keyCode==27 && popupStatus==1){ 
			disablePopup(obj.content, obj.background);  
			}  
		});  
	}(); 
});


/* Slide show part of the popups 
	this needs to be integrated with the above system because it doesnt work with multiple 
	slideshows on one page.
*/

$(document).ready(function(){
  var currentPosition = 0;
  var slideWidth = 724; // highly important number
  var slides = $('.slide');
  var numberOfSlides = slides.length;

  $('#slidesContainer').css('overflow', 'hidden');

  slides
    .wrapAll('<div id="slideInner"></div>')
	.css({
      'float' : 'left',
      'width' : slideWidth
    });

  $('#slideInner').css('width', slideWidth * numberOfSlides);
  $('.contentSlider').each(function(){
  	console.log(this);
  	$(this).prepend('<span class="control leftControl">Clicking moves left</span>');
  	$(this).append('<span class="control rightControl">Clicking moves right</span>');
  });	
   
  manageControls(currentPosition);
  $('.control').bind('click', function(){
  	doMovement(this, null);
  });

  $(document).keypress(function(e){  
		if(e.keyCode==37 || e.keyCode==39){ 
			doMovement(null, e);
		}  
	}); 

  function doMovement(that, e){
  	if(that !== null && e == null){
  		console.log($(that).attr('class'));
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
    $('#slideInner').animate({
      'marginLeft' : slideWidth*(-currentPosition)
    });
  }

  function manageControls(position){
	if(position==0){ $('.leftControl').hide() } else{ $('.leftControl').show() }
    if(position==numberOfSlides-1){ $('.rightControl').hide() } else{ $('.rightControl').show() }
  }	
});


$(document).ready(function(){

    $('#slideshow').bind('load', function() {
        manageControls();
    });

    $('#slideshow').trigger('load');

   function manageControls(){
        $('#slideshow').fadeToggle('slow');
    }

});
