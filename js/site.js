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

	$('.closeSide').bind('click', function(){
		$('.sidebarSlider').slideRightHide();
	});

	$('.open').bind('click', function(){
		$('.sidebarSlider').slideRightShow();
	});
});