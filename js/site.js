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