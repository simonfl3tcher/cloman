$(document).ready(function(){


	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'html',
		async: false
	});

	$('#advancedSearchSubmit').bind('click', function(e){
		e.preventDefault();
		var wrapper = $('.pageWrapper');
		var data = formatInputData($('#advancedSearchForm'));
		addAjaxloader(wrapper);
		$.ajax({
			url: $(this).closest('form').attr('data-ajaxurl'),
			type: 'POST',
			dataType: 'html',
			data: data
		}).done(function(data){
			searchResults(data);
			removeAjaxloader(wrapper, 500);
		});
	});

	$(':submit.add').click(function(e){
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
	});


	$('div').not('.sidebarSlider').bind('click', function(){
		var container = $('.sidebarSlider');
		if(container.hasClass('open')){
			container.slideRightHide();
			setTimeout(function(){
				$('.sidebarSlider').html('');
			}, 900);
			if($('button.time-tracker').hasClass('pause')){
				$('button.time-tracker.pause').trigger('click');
			}
		}
	});

	$('#searchTable .tableRowFive').live('click', function(e){
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
			error: function(data){
				alert('There was an error when trying to delete');
			}
		});
	});

	$('table tr td:nth-child(2) a').live('click', function(e){
		e.preventDefault();
		if(!$('.sidebarSlider').length){
			$(document.body).append('<div class="sidebarSlider"><div class="slidebarCon"></div></div>');
		}
		var container = $('.sidebarSlider');
		fetchContactInfo($(this).attr('href'));
		addAjaxloader($('.sidebarSlider'));
		container.slideRightShow();
		removeAjaxloader($('.sidebarSlider'), 1000);
		changeTimerCount();
	});


	$('.items-list.badge .header a').live('click', function(e){
		e.preventDefault();
		if(!$('.sidebarSlider').length){
			$(document.body).append('<div class="sidebarSlider"><div class="slidebarCon"></div></div>');
		}
		var container = $('.sidebarSlider');
		fetchContactInfo($(this).attr('href'));
		addAjaxloader($('.sidebarSlider'));
		container.slideRightShow();
		removeAjaxloader($('.sidebarSlider'), 1000);
	});

	$('#search').keypress(function(e){
		if (e.keyCode == 13 || ($('#search').val().length == 1 && e.keyCode == 8)) {
			if(e.keyCode == 8){
				var data = 'data=' + '';
			} else {
				var data = 'data=' + $(this).val();
			}
			$.ajax({
				url: $(this).attr('data-searchurl'),
				type: 'POST',
				dataType: 'html',
				data: data
			}).done(function(data){
				searchResults(data);
			});
		}
	});

	$('#searchGrid').keypress(function(e){
		if (e.keyCode == 13 || ($('#searchGrid').val().length == 1 && e.keyCode == 8)) {
			if(e.keyCode == 8){
				var data = 'data=' + '';
			} else {
				var data = 'data=' + $(this).val();
			}
			$.ajax({
				url: $(this).attr('data-searchurl'),
				type: 'POST',
				dataType: 'html',
				data: data
			}).done(function(data){
				searchResultsGrid(data);
			});
		}
	});
	
	$('.taskBusinessSelector').bind('change', function(e){

		var container = $('.assigntoproject');
		if(container.css('display') == 'block'){
			// container.slideUp('slow');
			$('.assigntoproject .content').html('');
		}

		var data = 'data=' + $(this).val();
		$.ajax({
			url: '/tasks/get_projects_for_busines/' + $(this).val(),
			type: 'POST',
			dataType: 'json',
			data: data,
			timeout: 2000
		}).done(function(data){
			if(!data.length){
				container.slideUp('slow');
			}
			$('.assigntoproject .content').append('<select name="task[Project]"><option>No</option><option value="' + data[0].project_id + '">Yes</option></select><span style="height:20px">' + data[0].project_name + '</span>');
		});
		//$('#projectTickbox').prop("checked", false);

		container.slideDown('slow');
	});	

	$('.completeTask').live('click', function(){
		if ($(this).is(':checked')){
			$.ajax({
			url: $(this).attr('data-url'),
			type: 'POST',
			dataType: 'html',
			}).done(function(data){
				var container = $('.sidebarSlider');
				container.slideRightHide();
				setTimeout(function(){
					window.location.reload();
				}, 1000);
				// console.log('done');
			});
		}
	});

	$('.uncompleteTask').live('click', function(){
		$.ajax({
		url: $(this).attr('data-url'),
		type: 'POST',
		dataType: 'html',
		}).done(function(data){
			var container = $('.sidebarSlider');
			container.slideRightHide();
			setTimeout(function(){
				window.location.reload();
			}, 1000);
			// console.log('done');
		});
	});

	$(".taskTableDraggable tbody").sortable({
		helper: function(e, tr) {
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      // Set helper cell sizes to match the original sizes
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		  },
		stop: function(event, ui) {
           	var newOrder = $(".taskTableDraggable tbody").sortable("serialize");
            $.ajax({
			url: $('.taskTableDraggable').attr('data-sorturl'),
			type: 'POST',
			data: newOrder,
			});
        },
        opacity: 0.9,
        handle: 'td:first'
	}).disableSelection();

	$('#commentArea').live('keypress', function(e){
		if(e.which == 13 && !e.shiftKey){
			if(!$(this).val() == ''){
				e.preventDefault();
				var data = 'data=' + $(this).val();
				$(this).val('');
				$.ajax({
					url: $(this).attr('data-comm'),
					type: 'POST',
					dataType: 'html',
					data: data
				}).done(function(data){
					$('.commentsAreaId').html('');
					$('.commentsAreaId').html(data);
				});
			}
		}
	});

	$('.addTime').live('keypress', function(e){
		if(e.which == 13 && !e.shiftKey){
			if(!$(this).val() == ''){
				e.preventDefault();
				addAjaxloader($('.sidebarSlider'));
				var data = 'data=' + $(this).val();
				$(this).val('00:00:00');
				$.ajax({
					url: $(this).attr('data-addTime'),
					type: 'POST',
					dataType: 'html',
					data: data
				}).done(function(data){
					removeAjaxloader($('.sidebarSlider'), 100);
					$('.time_tracker_partial_wrapper').html('');
					$('.time_tracker_partial_wrapper').html(data);
				});
			}
		}
	})

	$('.removeComment').live('click', function(e){
		var link = $(this).parent().parent().attr('data-comm');
		addAjaxloader($('.sidebarSlider'));
		$.ajax({
			url: link + $(this).attr('data-commentId'),
			type: 'POST',
			dataType: 'html'
		}).done(function(data){
			removeAjaxloader($('.sidebarSlider'), 100);
			$('.commentsAreaId').html('');
			$('.commentsAreaId').html(data);
		});
	});

	$('.put-on-hold').live('click', function(e){
		if($(this).hasClass('active')){
			$.ajax({
				url: '/projects/hold/' + $(this).attr('data-projectid'),
				type: 'POST',
				dataType: 'html'
			});
		} else {
			$.ajax({
				url: '/projects/unhold/' + $(this).attr('data-projectid'),
				type: 'POST',
				dataType: 'html'
			});
		}
	});


	$('.addingSupport').live('change', function(){
		var data = 'data=' + $(this).val();
		addAjaxloader($('.sidebarSlider'));
		$.ajax({
			url: '/support_packs/add_to_business/' + $(this).attr('data-id'),
			type: 'POST',
			dataType: 'html',
			data: data
		}).done(function(){
			setTimeout(function(){
				removeAjaxloader($('.sidebarSlider'), 100);
				$('.addSupportPack.crossIconGrey').trigger('click');
			},1000);
		});
	});

	/* Functions that you may want to use are bellow */
	function searchResultsGrid(data){
		var surrounder = $('#searchGrid').closest('div.control-group');
		if(data){
			$('#gridContainer').html('');
			$(surrounder).removeClass('error');
			$('#gridContainer').html(data);
		} else {
			$(surrounder).addClass('error');
			$('.ajaxLoader').addClass('error');
		}
	}


	function searchResults(data){
		var surrounder = $('#search').closest('div.control-group');
		if(data){
			$('#searchTable tbody tr').remove();
			$(surrounder).removeClass('error');
			$('#searchTable tbody').html(data);
		} else {
			$(surrounder).addClass('error');
			$('.ajaxLoader').addClass('error');
		}
	}

	function fetchContactInfo(url){
		$.ajax({
			url: url,
			type: 'POST',
			data: '',
			success: function(data){
				setTimeout(function(e){
					$('.sidebarSlider').append(data);
				}, 900);
			},
			error: function(data){
				alert('Sorry I cannot get the data that you require');
			}
		});
	}




	function formatInputData(formId){
		var data = '';
	    var inputs = $(':input:not(:submit)', formId); 

	    inputs.each(function(){;
	    	if(!data.length){
	    		data = this.name + '=' + $(this).val();
	    	} else {
	    		data += '&' + this.name + '=' + $(this).val();
	    	}
	    });

	    return data;
	}

	function ajaxSubmitForm(url, formId){

		var data = formatInputData(formId);

		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success: function(data){
				console.log('put reload back in');
				//window.location.reload();
			},
			error: function(data){
				console.log(data);
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