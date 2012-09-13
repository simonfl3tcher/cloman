$(document).ready(function(){


	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'html',
		async: false
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
				alert('Dont worry if its not working, you just need to add in a data-ajaxurl attribute, failing that i dont know what you have done. Good luck!!');
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
			dataType: 'json',
			data: data,
			success: function(data){
				searchResults(data);
			},
			error: function(data){
				console.log('There is an error in the system');
			}
		});
	});


	function changeSearchdata(form){
		return true;
	}

	function searchResults(data){
		var surrounder = $('#search').closest('div.control-group');
		if(data.length){
			$('#search tbody tr').remove();
			$(surrounder).removeClass('error');
		} else {
			$(surrounder).addClass('error');
		}
		for(var i = 0; i < data.length; i++){
			var html = '<tr><td>' + data[0].people_id + '</td><td>' + data[i].name + '</td><td>' + data[i].email + '</td><td>' + data[i].phone + '</td><td><a href="/contacts/edit/"'  + data[0].people_id + '"><button class="btn  btn-mini btn-info">Edit</button></a></td><td><a class="delete" href="/contacts/delete/"'  + data[0].people_id + '"><button class="btn  btn-mini btn-danger">Delete</button></a></td></tr>';
			$('#search tbody').append(html);
		}
	}



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
				$('form')[0].reset();
				window.location.reload();
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