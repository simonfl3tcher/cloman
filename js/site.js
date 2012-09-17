$(document).ready(function(){

	$('.edit').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});

	$('.boxes').bind('click', function(e){
		e.preventDefault();
		$('#myModal').modal({
			backdrop:true,
			keyboard: true
		});
	});


	$('.addBusiness').bind('click', function(){
		var dropdown = $('.selectBusiness');
		$('.businessForm').slideDown(1000);
		$('.modal-body').delay(500).animate({ scrollTop: $('.modal-body').height() - $('.businessForm').height()}, 1000);
		dropdown.addClass('open');
	});	

	$('form').keypress(function(e){
		if ( e.which == 13 ) e.preventDefault();
	});

	$("#my-text-input").tokenInput("/businesses/search", {
		theme: "facebook",
		preventDuplicates: true
		// prePopulate: [{id: 3, name: "test"}, {id: 5, name: "awesome"}]
	});

	$('.resetForm').bind('click', function(){
		clear_form_elements($(this).closest('form'));
	});	

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