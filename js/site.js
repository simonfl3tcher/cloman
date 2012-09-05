$(document).ready(function(){
	$.ajaxSetup({
		type: 'POST',
		timeout: 5000,
		dataType: 'json'
	})

	$('#moveableObject').bind('submit', function(e){
		e.preventDefault();
		selState = $('Get form data in here').attr();
		ajaxCall(selState);
		// bind a function to the div that closes the div. Then 
		// trigger it here.
	});


	function ajaxCall() {
		$.ajax({
			url: '/contact/add',
			data: selState,  // Not sure if this is needed with a post request.
			dataType: 'html', // im not sure which one is right here.
			success: function(data){
				// run a function to say this is complete.
			}
		})
	}
});