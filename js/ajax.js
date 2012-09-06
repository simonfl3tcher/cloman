$(document).ready(function(){
	console.log('This is using the ajax file');

	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'html',
		async: true
	});
	$('#ajaxRequest').click(function(e){
		e.preventDefault();
		var url = 'contacts/ajax';
		ajaxRequest(url);
	});

	$('#accountCreator').click(function(e){
		e.preventDefault();
		var url = 'contacts/ajax';
		ajaxRequest(url);
	})

	function ajaxRequest(url){
		$.ajax({
			url: url,
			dataType: 'html',
			success: function(data){
				console.log('Success');
			}
		});
	}
}); 