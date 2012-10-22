$(document).ready(function(){

	$('.edit').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('.nav-tabs').button()

	
	$('.boxes-add').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('.tasks-add').live('click', function(e){
		e.preventDefault();

		if($(this).attr('data-parentTask')){
			$('form#addTaskForm').prepend("<input type='hidden' class='parent-task' name='parent-task' value='" + $(this).attr('data-parentTask') + "' />");
			
			$('#task-modal').modal({
				backdrop:true,
				keyboard: true
			});
	
		    $('#task-modal').on('hidden', function () {
		    	// if the hidden field is inside here then remove it.
		    	if($('.parent-task').length){
		    		$('.parent-task').remove();
		    	}
		    })
		} else {
			$('#task-modal').modal({
				backdrop:true,
				keyboard: true
			});
	
		    $('#task-modal').on('hidden', function () {
		    	// if the hidden field is inside here then remove it.
		    	if($('.parent-task').length){
		    		$('.parent-task').remove();
		    	}
		    });
		}
	})


	$('.reminder-add').live('click', function(e){
		e.preventDefault();
		$('#reminder-modal').modal({
			backdrop:true,
			keyboard: true
		});
	});


	$('.addBusiness').toggle(
		function(){
		$(this).addClass('open');
		$('.businessForm').slideDown(1000);
		$('.modal-body').delay(500).animate({ scrollTop: $('.modal-body').height() - $('.businessForm').height()}, 1000);
	},
	function() {
		$(this).removeClass('open');
		$('.businessForm').slideUp(1000);
	}
	);	

	$('form').keypress(function(e){
		if ( e.which == 13 ) e.preventDefault();
	});

	$("#my-text-input.selectBusiness").tokenInput("/businesses/token", {
		theme: "facebook",
		preventDuplicates: true
	});

	$("#my-text-input.selectBusinesses-connections").tokenInput("/businesses/token", {
		theme: "facebook",
		preventDuplicates: true,
		tokenLimit: 1
	});

	$("#my-text-input.selectBusinesses").tokenInput("/businesses/token", {
		theme: "facebook",
		preventDuplicates: true,
		tokenLimit: 1
	});

	$("#my-text-input.selectManagers").tokenInput("/projects/token_managers", {
		theme: "facebook",
		preventDuplicates: true
	});

	$("#my-text-input.selectSalesman").tokenInput("/projects/token_salesman", {
		theme: "facebook",
		preventDuplicates: true
	});

	$("#my-text-input.selectWorkers").tokenInput("/projects/token_workers", {
		theme: "facebook",
		preventDuplicates: true
	});

	$("#my-text-input.selectContacts").tokenInput("/contacts/token", {
		theme: "facebook",
		preventDuplicates: true
	});	

	$("#my-text-input.selectAllWorkers").tokenInput("/projects/token_all_workers", {
		theme: "facebook",
		preventDuplicates: true
	});

	$('.resetForm').bind('click', function(){
		clear_form_elements($(this).closest('form'));
		if($('.assigntoproject').length && $('.assigntoproject').css('display') == 'block'){
			console.log('this exists');
			$('.assigntoproject').slideUp('slow');
			$('.assigntoproject .content').html('');
		}
	});

	$('#addTextbox.plusIconGrey').live('click', function(){
		$('.addConnectionInput').slideRightShow('slow');
		$(this).removeClass('plusIconGrey');
		$(this).addClass('crossIconGrey');
	});	

	$('#addTextbox.crossIconGrey').live('click', function(){
		$('.addConnectionInput').slideRightHide('slow');
		setTimeout(function(){
			$('.addConnectionInput').fadeOut('slow').val('');
		}, 1000);
		$(this).removeClass('crossIconGrey');
		$(this).addClass('plusIconGrey');
	});	

	$('#advancedSearch').bind('click', function(){
		$('.advancedSearchBox').slideToggle('slow');
	});

	// var start = $.datepicker.formatDate('dd-mm-yy', new Date())
	// $('.datepicker').val(start);
	$('.datepicker').datepicker({ dateFormat: "dd-mm-yy", minDate: 0 });

	$('.container-hide').click(function(){
		$('.sidebar-container').slideLeftHide();
	});


	$('.commContainer li').live('mouseenter', function(){
		 $('.removeComment', $(this)).stop(true, true).animate({opacity:1},1000);
	});
	$('.commContainer li').live('mouseleave', function(){
		 $('.removeComment', $(this)).stop(true, true).animate({opacity:0},1000);
	});

	// $('.time-counter').timer();

  	$(".editable").bind("dblclick", replaceHTML);
	 
	 
	$(".btnSave").live("click", function(){
		ewText = $(this).siblings("form").children(".editBox").val().replace(/"/g, "&quot;");
		$(this).parent().html(newText).removeClass("noPad").bind("dblclick", replaceHTML);
	}); 
	
	$(".btnDiscard").live("click", function(){
		$(this).parent().html(oldText).removeClass("noPad").bind("dblclick", replaceHTML);
	}); 
	
	function replaceHTML(){
		oldText = $(this).html().replace(/"/g, "&quot;");
		$(this).addClass("noPad").html("").html("<form><input type=\"text\" class=\"editBox\" value=\"" + oldText + "\" /> </form><a href=\"#\" class=\"btnSave\">Save changes</a> <a href=\"#\" class=\"btnDiscard\">Discard changes</a>").unbind('dblclick', replaceHTML);
		$('.editBox').focus();
	}


	function clear_form_elements(ele) {
	    $(ele).find(':input').each(function() {
	        switch(this.type) {
	            case 'password':
	            case 'select-multiple':
	            case 'select-one':
	            case 'text':
	            case 'textarea':
	                $(this).val('');
	                break;
	            case 'checkbox':
	            case 'radio':
	                this.checked = false;
	        }
	    });
	}

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1)
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-5),
				end: new Date(y, m, d-2)
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d-3, 16, 0),
				allDay: false
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+4, 16, 0),
				allDay: false
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+1, 19, 0),
				end: new Date(y, m, d+1, 22, 30),
				allDay: false
			},
			{
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: 'http://google.com/'
			}
		]
	});
		
});