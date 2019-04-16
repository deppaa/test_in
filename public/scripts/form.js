$(document).ready(function() {
	$('form').submit(function(event) {
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.message && json.url) {
					alert(json.status + ' - ' + json.message);
					window.location.href = '/' + json.url;
				}else if(json.url) {
					window.location.href = '/' + json.url;
				}else{
					alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
});