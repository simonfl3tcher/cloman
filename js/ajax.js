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
			addAjaxloader($(document.window));
			var url = '';
			if($(formId).attr("data-ajaxurl")){
				url = $(formId).attr("data-ajaxurl");
			} else {
				alert('Dont worry if its not working, you just need to add in a data-ajaxurl attribute, failing that i dont know what you have done. Good luck!!');
			}
			ajaxSubmitForm(url, formId);
		}
	})

	$('#search .delete').click(function(e){
		e.preventDefault();
		var containingTr = $(this).parent().parent();
		containingTr.animate({ opacity: 0.0 }, 500);

		containingTr.find('td').wrapInner('<div style="display: block;" />').parent().find('td > div').delay(500)
		.slideUp(500, function(){
			$(this).parent().parent().remove();

		});

		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			data: '',
			success: function(data){
				//console.log('well done');
			},
			error: function(data){
				alert('There was an error when trying to delete');
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
				alert('There is an error in the system');
			}
		});
	});

	$('table tr td a').bind('click', function(e){
		e.stopPropagation();
	});

	$('div:not(.sidebarSlider ):not(.sidebarSlider div)').bind('click', function(){
		var container = $('.sidebarSlider');
		if(container.hasClass('open')){
			container.slideRightHide();
			setTimeout(function(){
				$('.sidebarSlider').html('');
			}, 900);
		}
	});

	$('table tr td:nth-child(2) a').bind('click', function(e){
		e.preventDefault();
		if(!$('.sidebarSlider').length){
			$(document.body).append('<div class="sidebarSlider"></div>');
		}
		var container = $('.sidebarSlider');
		if(!container.hasClass('open')){
			fetchContactInfo($(this).attr('href'));
			addAjaxloader($('.sidebarSlider'));
			container.slideRightShow();
			removeAjaxloader($('.sidebarSlider'), 1000);
		}
	});


	function searchResults(data){
		var surrounder = $('#search').closest('div.control-group');
		if(data.length){
			$('#search tbody tr').remove();
			$(surrounder).removeClass('error');
		} else {
			$(surrounder).addClass('error');
		}
		for(var i = 0; i < data.length; i++){
			var html = '<tr><td>' + data[i].people_id + '</td><td><a href="/contacts/details/"' + data[i].people_id + '>' + data[i].name + '</td><td>' + data[i].email + '</td><td>' + data[i].phone + '</td><td><a class="delete" href="/contacts/delete/"'  + data[0].people_id + '"><button class="btn  btn-mini btn-danger">Delete</button></a></td></tr>';
			$('#search tbody').append(html);
		}
	}

	function fetchContactInfo(url){
		$.ajax({
			url: url,
			type: 'POST',
			data: '',
			success: function(data){
				$('.sidebarSlider').append(data);
			},
			error: function(data){
				alert('Sorry I cannot get the data that you require');
			}
		});
	}



	/* Functions that you may want to use are bellow */

	function ajaxSubmitForm(url, formId){
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
				// $('form')[0].reset();
				// window.location.reload();
			},
			error: function(data){
				alert('Something went wrong...');
			}
		});
	}

	function addAjaxloader(container){
		var div = container;
		div.prepend('<div class="ajaxLoader"></div>');
		var ajaxLoader = $('.ajaxLoader')
		ajaxLoader.css({
			"position": "absolute",
			"top": div.height()/2-$('.ajaxLoader').height()/2,
			"left": div.width()/2-$('.ajaxLoader').width()/2
		});
	}

	function removeAjaxloader(container, delay){
		$('.ajaxLoader', container).delay(delay).fadeOut();
	}
}); 