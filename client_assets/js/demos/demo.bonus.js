$(function () {
	
	/*--------------------------------------------------
	Plugin: Msg Growl
	--------------------------------------------------*/	
	$('.growl-type').live ('click', function (e) {
		$.ajax({
			url: 'support/callback_email/' + $(e.target).attr('data-suportid'),
			type: 'POST'
		}).done(function(data){
			$.msgGrowl ({
				type: $('.growl-type').attr ('data-type')
				, title: 'Callback Request'
				, text: 'You have sent a callback request, we will get in touch soon.'
			});
		});
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

	$('.conceptList').bind('click', function(e){
		$.ajax({
			url: '/concepts/client_seen/' + $(this).attr('data-concept'),
			type: 'POST',
			dataType: 'html'
		}).done(function(data){
			$('.comCount', $(e.target)).fadeOut('slow');
		});
	});

	$('.addAnotherBox').bind('click', function(){
		console.log('clicked');
		var num = parseInt($(this).attr('data-number'))+1;
		$('.uploadContainer').append("<input type=\"file\" autocomplete=\"off\" value=\"\" name=\"images" + num + "\"><br />");
		$(this).attr('data-number', parseInt($(this).attr('data-number'))+1);
	});

	$('.faqList').goFaq ();
});