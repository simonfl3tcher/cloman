$(document).ready(function(){

	$('.edit').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('#search').trigger('keyup');

	$('.boxes-add').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
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

	$('.resetForm').bind('click', function(){
		clear_form_elements($(this).closest('form'));
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

	$('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });

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