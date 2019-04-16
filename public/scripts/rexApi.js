$(document).ready(function(){
    $("#run").click(function(){
        var value = myCodeMirror.getValue(),
        input = $("#input").val(),
        modal = document.querySelector("#modal"),
		modalOverlay = document.querySelector("#modal-overlay");

		modal.classList.toggle("closed");
		modalOverlay.classList.toggle("closed");

        $.ajax({
            type: "POST",
            data: {
                "code" : value,
                "input" : input,
                "type" : 1,
            },
            success: function(result){
                json = jQuery.parseJSON(result);
                if (json.url) {
                    window.location.href = '/' + json.url;
                } else {
                    $("#output").html(json.message.Result);
                    $("#err").html(json.message.Errors);
                    $("#War").html(json.message.Warnings);
                    $("#Stat").html(json.message.Stats);
                    modal.classList.toggle("closed");
					modalOverlay.classList.toggle("closed");
                }
            }
        });

    });
});