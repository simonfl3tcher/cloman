$(document).ready(function(){

	$("#recuringDate").live('click', function(){
		$(this).datepicker('destroy').datepicker({ dateFormat: "dd-mm-yy", minDate: 0 }).focus();
	});

	$('.edit').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('#concept').live('click', function(e){
		e.preventDefault();
		$('#concepts-modal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('#addAnotherConceptImage').live('click', function(){
		console.log('clicked');
	});
	
	$('#fileselectbutton').click(function(e){
		$('#file').trigger('click');
		});
	    
	  $('#file').change(function(e){
	  var val = $(this).val();
	   
	  var file = val.split(/[\\/]/);
	   
	  $('#filename').val(file[file.length-1]);

	});

	$('.sortList').bind('click', function(){
		window.location.reload();
	});

	$('.nav-tabs').button();

	
	$('.boxes-add').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('.taskstatuses .plusIconGrey').bind('click', function(){
		var html = '<input type="text" name="new[' + $(this).attr('data-count') +'][name]" value="" /><span><input type="text" name="new[' + $(this).attr('data-count') +'][color]" value="#000" class="hexref"/></span><br />';
		$('.taskstatuses .inputWrapper').append(html);
		$(this).attr('data-count', parseFloat($(this).attr('data-count')) + 1);
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

	$('.support_pack-add').live('click', function(e){
		e.preventDefault();
		$('#support_pack-modal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('.time-add').live('click', function(e){
		e.preventDefault();
		$('#time-modal').modal({
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

		$('#appendProjectTasks').length ? $('#appendProjectTasks').html('') : '';
		if($('.assigntoproject').length && $('.assigntoproject').css('display') == 'block'){
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
	$('.datepickerFull').datepicker({dateFormat: "dd-mm-yy"});
	$('.datepicker-small').datepicker({dateFormat: "dd-mm-yy"});

	
	var myDate = new Date();
    var month = myDate.getMonth() + 1;
    var d = myDate.getDate();
    var day = (d < 10) ? '0' + d : d;
    var prettyDate = day + '-' + month + '-' + myDate.getFullYear();
  
    $(".datepicker").val(prettyDate);
	$('.datepickerFull').val(prettyDate);
	
	$('.container-hide').click(function(){
		$('.sidebar-container').slideLeftHide();
	});


	$('.commContainer li').live('mouseenter', function(){
		 $('.removeComment', $(this)).stop(true, true).animate({opacity:1},1000);
	});
	$('.commContainer li').live('mouseleave', function(){
		 $('.removeComment', $(this)).stop(true, true).animate({opacity:0},1000);
	});


  	$('.addSupportPack.plusIconGrey').live('click', function(){
  		$('.addingSupport').slideRightShow('slow');
  		$(this).removeClass('plusIconGrey');
		$(this).addClass('crossIconGrey');
  	});

  	$('.addSupportPack.crossIconGrey').live('click', function(){
  		$('.addingSupport').slideRightHide('slow');
  		setTimeout(function(){
	  		$('.addingSupport').val(0);
  		},1000);
  		$(this).removeClass('crossIconGrey');
		$(this).addClass('plusIconGrey');
  	});

  	$("#searchTable").tablesorter(); 

  	// MAKE BELLOW A FUNCTION THAT YOU PASS IN THE EVENTS URL AND THE SELECTOR SO IT CAN BE USED FOR PROJECTS AND MEETINGS ETC.


    $(".checkDeterminator").toggle(function() {
		$(".databaseColumns").attr('checked', false);
		$(this).html('Check All');
	}, function(){
		$(".databaseColumns").attr('checked', true);
		$(this).html('Uncheck All');
	});
	 
	
	function replaceHTML(t){
		oldText = $(t).html().replace(/"/g, "&quot;");
		$(t).addClass("noPad").html("").html("<input type=\"text\" class=\"editBox\" value=\"" + oldText + "\" />").unbind('click', replaceHTML).die("click");
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
});