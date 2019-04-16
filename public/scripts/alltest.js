$(document).ready(function(){
	$("#goall").click(function(){
		var value = myCodeMirror.getValue(),
		modal = document.querySelector("#modal"),
		modalOverlay = document.querySelector("#modal-overlay");

		modal.classList.toggle("closed");
		modalOverlay.classList.toggle("closed");

		$.ajax({
			type: "POST",
			data: {
				"code" : value,
				"type" : 3,
			},
			success: function(result){
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
				} else {
					for (let i = 1; i <= 3; i++)
					{
						$("#inf"+i).html(json.message.icon[i]);
						$("#out"+i).html(json.message.out[i]);
					}
					modal.classList.toggle("closed");
					modalOverlay.classList.toggle("closed");
				}
			}
		});

	});
});