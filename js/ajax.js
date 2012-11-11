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
			containingTr.css({'display' : 'none'});

		});

		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			data: '',
			error: function(data){
				alert('There was an error when trying to delete');
			},
			success: function(data){
				$("#searchTable").trigger("update");
			}
		});
	});

	$('.doAjax').live('click', function(e){
		e.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			data: '',
			success: function(data){
				$( "#standardModal" ).modal({
					backdrop:true,
					keyboard: true
				});
				$( "#standardModal" ).on('hidden', function(){
					window.location.reload();
				})
				$('.modal-body').append('<p>That support pack has been updated, thank you');
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
		var d = 'data=' + $(this).val();
		addAjaxloader($('.sidebarSlider'));
		$.ajax({
			url: '/support_packs/add_to_business/' + $(this).attr('data-id'),
			type: 'POST',
			dataType: 'json',
			data: d
		}).done(function(data){
			var info = data;
			setTimeout(function(){
				removeAjaxloader($('.sidebarSlider'), 100);
				$('.addSupportPack.crossIconGrey').trigger('click');
				$('.display.v2.supportPacks').html('');
				var options = '';
				for(var i = 0; i < info.length; i++){
					options += info[i].name + '<br />';
				}
				$('.display.v2.supportPacks').append(options);
			},1000);
		});
	});

	$('.timesheetProjectSelector').live('change', function(){
		$.ajax({
			url: '/projects/get_tasks_against_project/' + $(this).val(),
			type: 'POST',
			dataType: 'json'
		}).done(function(data){
			$('#appendProjectTasks').html('');
			var options = '<option value="0"></option>';

			for(var i = 0; i < data.length; i++){
				options += '<option value="' + data[i].task_id + '">' + data[i].name + '</option>';
			}

			$('#appendProjectTasks').append(options);
		});
	});

	$('.timesheetBusinessSelector').live('change', function(){
		$.ajax({
			url: '/projects/get_project_against_business/' + $(this).val(),
			type: 'POST',
			dataType: 'json'
		}).done(function(data){
			$('.timesheetProjectSelector').html('');
			var options = '<option value="0"></option>';

			for(var i = 0; i < data.projects.length; i++){
				options += '<option value="' + data.projects[i].project_id + '">' + data.projects[i].project_name + '</option>';
			}

			$('.timesheetProjectSelector').append(options);

			$('#appendProjectTasks').html('');
			var options = '<option value="0"></option>';

			for(var i = 0; i < data.tasks.length; i++){
				options += '<option value="' + data.tasks[i].task_id + '">' + data.tasks[i].name + '</option>';
			}

			$('#appendProjectTasks').append(options);
		});
	});

	$('#exportDropdown').live('change', function(e){
		e.preventDefault();
		$.ajax({
			url: '/management/get_columns/' + $(this).val(),
			type: 'POST',
			dataType: 'json'
		}).done(function(data){
			var options = '';
			for(var i = 0; i < data.length; i++){
				options += '<input class="databaseColumns" type="checkbox" name="cols[' + i + ']" checked="checked" value="' + data[i] + '" />' + data[i] + '<br />';
			}
			$('.checkboxArea', $('.exportDropbox')).html('');
			$('.checkboxArea', $('.exportDropbox')).append(options);
			$('.exportDropbox').slideDown('slow');
		});
	});

	$('.editable-row td.editable:first').live('click', function(){
		if(!$(this).hasClass('ajax')){
		  	$('td.editable', $('.editable-row')).each(function(){
				$(this).addClass('ajax');  
				if($(this).hasClass('business')){
					var html = '<select class="status" name="task[Business]">';
					$.ajax({
						url: '/businesses/get/',
						type: 'POST',
						dataType: 'json'
					}).done(function(data){
						for(var i = 0; i < data.length; i++){
							html += '<option value="' + data[i].business_id + '">' + data[i].name + '</option>';
						}
					});
					html += '<option>name1</option>';
					html += '</select>';
					$(this).html(html);
				} else if ($(this).hasClass('status')){
					var html = '<select class="status" name="task[Status]">';
					$.ajax({
						url: '/tasks/get_list_of_status/',
						type: 'POST',
						dataType: 'json'
					}).done(function(data){
						for(var i = 0; i < data.length; i++){
							html += '<option value="' + data[i].status_id + '">' + data[i].name + '</option>';
						}
					});
					html += '</select>';
					$(this).html(html);
				} else {
					$(this).html('<input name="task[' + $(this).text().replace(' ', '') +  ']" id="editbox" size="'+$(this).text().length+'" value="' + $(this).text()+'" type="text">'); 
				} 
				$('#editbox').focus();  
		  	}); 
		}
	}); 

	
	$('.editable-row button').live('click', function(e){
		e.preventDefault();
		var d = '';
		addAjaxloader($('.pageWrapper'));
		$('td.editable input', $('.editable-row')).each(function(){
			d += this.name + '=' + $(this).val() + '&';
			console.log($(this).val());
		});
		$('td.editable select', $('.editable-row')).each(function(){
			console.log(this.name);
			d += this.name + '=' + $(this).val() + '&';
		});
		$.ajax({
			url: '/tasks/add_on_the_fly/',
			type: 'POST',
			dataType: 'json',
			data: d.substring(0, d.length -1) 
		}).done(function(data){
			window.location.reload();
			removeAjaxloader($('.pageWrapper'), 1000);
		});
	});

	$('#loadMore').live('click', function(){
		addAjaxLoadedScreen($('body'));
		var limit = $('#searchTable tr').length - 2 + 20;
		$.ajax({
			url: 'tasks/ajax_get/' + limit,
			type: 'POST',
			dataType: 'html'
		}).done(function(data){
			setTimeout(function(){
				removeAjaxloader($('body'), 500);
				searchResults(data);
			},1000);
		});
		/*
			Make the ajax request then utput the data and scroll to the area that it starts on!!
			$("#id").scrollTop($("#id").scrollTop() + 100);
		*/
		console.log('sdfsdfds');
	});

	$('#loadAll').live('click', function(){
		addAjaxLoadedScreen($('body'));
		var limit = 100000000;
		$.ajax({
			url: 'tasks/ajax_get/' + limit,
			type: 'POST',
			dataType: 'html'
		}).done(function(data){
			setTimeout(function(){
				removeAjaxloader($('body'), 500);
				searchResults(data);
			},1000);
		});
		/*
			Make the ajax request then utput the data and scroll to the area that it starts on!!
			$("#id").scrollTop($("#id").scrollTop() + 100);
		*/
		console.log('sdfsdfds');
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
			$("#searchTable").trigger("update");
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

	function addAjaxLoadedScreen(container){
		var div = container;
		div.prepend('<div class="ajaxLoader"></div>');
		var ajaxLoader = $('.ajaxLoader');
		ajaxLoader.center();
	}

	$.fn.center = function () {
	    this.css("position","absolute");
	    this.css("top", Math.max(0, (($(window).height() - this.outerHeight()) / 2) + 
	    $(window).scrollTop()) + "px");
	    this.css("left", Math.max(0, (($(window).width() - this.outerWidth()) / 2) + 
	    $(window).scrollLeft()) + "px");
	    return this;
	}

	function removeAjaxloader(container, delay){
		$('.ajaxLoader', container).delay(delay).fadeOut().delay(1000).remove();
	}
}); 