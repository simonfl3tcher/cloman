$(document).ready(function(){
	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'html',
		async: true
	});

	$(':submit').click(function(e){
		var formId = $(this).closest('form');
		if($(formId).attr('data-useAjax') == 'true'){
			e.preventDefault();
			addAjaxloader();
			var url = '';
			if($(formId).attr("data-ajaxurl")){
				url = $(formId).attr("data-ajaxurl");
			} else {
				alert('Dont worry if its not working, you just need to add in a data-ajaxurl attribute');
			}
			ajaxSubmitForm(url, formId, success);
		}
	})

	function ajaxSubmitForm(url, formId, successFunction){
	    var data = '';
	    var inputs = $(':input:not(:submit)', formId); 

	    inputs.each(function(){;
	    	if(!data.length){
	    		data = this.name + '=' + $(this).val();
	    	} else {
	    		data += '&' + this.name + '=' + $(this).val();
	    	}
	    });

		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success: function(data){
				success(formId);
			},
			error: function(data){
				unsuccessful();
			}
		});
	}

	function success(formId){
		setTimeout(function(){
			$('.ajaxLoader').addClass('completion');
			operationCleanup(formId);
		}, 1000);
	}

	function unsuccessful(){
		setTimeout(function(){
			$('.ajaxLoader').addClass('uncomplete');
		}, 1000);
		setTimeout(function(){
			$('.ajaxLoader').fadeOut();
			$('.ajaxLoader').remove();
		}, 2000);
	}

	function operationCleanup(formId){
		setTimeout(function(){
			$('#backgroundPopup').trigger('click');
			$(formId)[0].reset();
			$('.ajaxLoader').remove();
		}, 1000);
		/* Things to do in this function are:-
		- Clear the form object
		- update the data that is being displayed.
		*/
	}

	function addAjaxloader(){
		var div = $('.slideshow'); // This should not really be done, but most form submissions are going to be done through ajax and others aren't, If you find yourself using ajax from submisisons without the popup you will have to address this.
		div.prepend('<div class="ajaxLoader"></div>');
		var ajaxLoader = $('.ajaxLoader')
		ajaxLoader.css({
			"position": "absolute",
			"top": div.height()/2-$('.ajaxLoader').height()/2,
			"left": div.width()/2-$('.ajaxLoader').width()/2
		});
	}
}); 