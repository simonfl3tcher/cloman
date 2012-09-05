/***************************/
//@Author: Adrian "yEnS" Mato Gondelle
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

//SETTING UP OUR POPUP
//0 means disabled; 1 means enabled;


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

function sliderOption(conveyor, content, sliding){
      //vars
  var conveyor = $(conveyor, content),
  item = $(".item", content);

  //set length of conveyor
  conveyor.css("width", item.length * parseInt(item.css("width")));
  var inner = conveyor.width();
  var wrapper = $('.viewer').width();

  //config
  var sliderOpts = {
  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", content).css("width")),
    slide: function(e, ui) { 
      conveyor.css("left", "-" + ui.value + "px");
    }
  };
  if(inner > wrapper){
  //create slider
   sliding.slider(sliderOpts);
  }
}


//CONTROLLING EVENTS IN jQuery
$(document).ready(function(){

	//LOADING POPUP
	//Click the button event!


	// Box one popup
	$("#one.boxes").click(function(){
		//centering with css
		alert('This is clicked');
		var content = $('#sliderContent.one');
		var background = $('#backgroundPopup.one');
		var conveyor = $('#one.content-conveyor');
		var sliding = $('#slider.one');
		centerPopup(content, background);
		//load popup
		loadPopup(content, background);

		sliderOption(conveyor, content, sliding);
	});
	//CLOSING POPUP
	//Click the x event!
	$("#popupContactClose").click(function(){
		var content = $('#sliderContent.one');
		var background = $('#backgroundPopup.one');
		disablePopup(content, background);
	});
	//Click out event!
	$("#backgroundPopup").click(function(){
		var content = $('#sliderContent.one');
		var background = $('#backgroundPopup.one');
		disablePopup(content, background);
	});
	$('#slider.one').hide();
	
	$('#sliderContent.one').hover(function(){
		$('#slider.one').fadeToggle('slow');
	});

	$(document).keypress(function(e){  
		if(e.keyCode==27 &amp;amp;amp;amp;amp;amp;&amp;amp;amp;amp;amp;amp; popupStatus==1){  
	disablePopup();  
	}  
});  
	// End of box one popup 

});