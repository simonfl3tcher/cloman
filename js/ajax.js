$(document).ready(function(){


	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'html',
		async: true
	});

	$('form')[0].reset();

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
			ajaxSubmitForm(url, formId, successForm);
		}
	})

	$('.delete').click(function(e){
		e.preventDefault();
		console.log('prevented');
		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			data: '',
			success: function(data){
				window.location.reload();
			},
			error: function(data){
				unsuccessfulDelete();
			}
		});
	});

	$('#search').keyup(function(){
		var data = 'data=' + $(this).val();
		$.ajax({
			url: $(this).attr('data-searchurl'),
			type: 'POST',
			data: data,
			success: function(data){
				console.log('success');
			},
			error: function(data){
				alert('There is an error in the system');
			}
		});
	});



	/* Functions that you may want to use are bellow */

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
				successFunction(formId);
			},
			error: function(data){
				unsuccessful();
			}
		});
	}

	function successForm(formId){
		setTimeout(function(){
			$('.ajaxLoader').addClass('completion');
			operationCleanup(formId);
		}, 1000);
	}

	function unsuccessfulForm(){
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
			$('.ajaxLoader').remove();
			window.location.reload();

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