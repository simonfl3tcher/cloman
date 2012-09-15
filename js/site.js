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
});