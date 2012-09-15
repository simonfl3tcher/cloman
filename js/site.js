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
		$('.businessForm').slideDown(2000);
		dropdown.addClass('open');
	});	
});