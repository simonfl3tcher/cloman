$(function () {
	
	/*--------------------------------------------------
	Plugin: Msg Growl
	--------------------------------------------------*/	
	$('.growl-type').live ('click', function (e) {
		$.msgGrowl ({
			type: $(this).attr ('data-type')
			, title: 'Header'
			, text: 'Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet, consectetur.'
		});
	});
	
	
	
	/*--------------------------------------------------
	Plugin: Msg Box
	--------------------------------------------------*/
	
	$('.msgbox-alert').live ('click', function (e) {
		$.msgbox("The selection includes process white objects. Overprinting such objects is only useful in combination with transparency effects.");
	});
	
	$('.msgbox-info').live ('click', function (e) {
		$.msgbox("jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.", {type: "info"});
	});
	
	$('.msgbox-error').live ('click', function (e) {
		$.msgbox("An error 1053 ocurred while perfoming this service operation on the MySql Server service.", {type: "error"});
	});
	
	$('.msgbox-confirm').live ('click', function (e) {
		$.msgbox("Are you sure that you want to permanently delete the selected element?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"},
		    {type: "cancel", value: "Cancel"}
		  ]
		}, function(result) {
		  	$("#result2").text(result);
			});
	});
	
	$('.msgbox-prompt').live ('click', function (e) {
		$.msgbox("Insert your name below:", {
		  type: "prompt"
		}, function(result) {
		  if (result) {
		    alert("Hello " + result);
		  }
		});
	});



	$('.gallery-container > li').hoverIntent({
		over: showPreview,
	     timeout: 500,
	     out: hidePreview,
	     sensitivity: 4
	});
	
	function showPreview () {
		$(this).find ('.preview').fadeIn ();
	}
	
	function hidePreview () {
		$(this).find ('.preview').fadeOut ();
	}
	
	setTimeout (function () {
		$('.gallery-container > li').each (function () {
			var preview, img, width, height;
			
			preview = $(this).find ('.preview');
			img = $(this).find ('img');
			
			width = img.width ();
			height = img.height ();
			
			preview.css ({ width: width });
			preview.css ({ height: height });
			
			preview.addClass ('ui-lightbox');
		});
	}, 500);
	
	$('#fileselectbutton').click(function(e){
		$('#file').trigger('click');
		});
	    
	  $('#file').change(function(e){
	  var val = $(this).val();
	   
	  var file = val.split(/[\\/]/);
	   
	  $('#filename').val(file[file.length-1]);

	});

	$('.commentForm input[type="submit"]').bind('click', function(e){
		e.preventDefault();
		console.log( $(e.target).closest('.commentForm'));
		var form = $(e.target).closest('.commentForm');
		var container = form.parent().parent();
		var data = 'comment=' + $('textarea', form).val() + '&concept=' + form.attr('data-concept');
		$.ajax({
			url: form.attr('action'),
			type: 'POST',
			dataType: 'html',
			data: data
		}).done(function(data){
			$('.commentForm textarea').val('').empty();;
			$('.commentsUl', container).val('').empty();
			$('.commentsUl', container).html(data);
		});
	});

	$('.conceptList').bind('click', function(e){
		$.ajax({
			url: '/concepts/client_seen/' + $(this).attr('data-concept'),
			type: 'POST',
			dataType: 'html'
		}).done(function(data){
			$('.comCount', $(e.target)).fadeOut('slow');
		});
	});
});