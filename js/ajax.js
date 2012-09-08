$(document).ready(function(){
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
		var url = 'ajax';
		ajaxRequest(url);
	})
	function ajaxRequest(url){
	    var name = $("input#contact_Name_First").val();  
	    var name_last = $("input#contact_Name_Last").val();  
	    var phone = $("input#phone").val();  
	    var dataString = 'contact[Name_First]='+ name + '&contact[Name_Last]=' + name_last;
		$.ajax({
			url: url,
			type: 'POST',
			data: dataString,
			success: function(data){
				console.log('Success');
			}
		});
	}
}); 