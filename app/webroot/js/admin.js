$(document).ready(function() {
	
	$('.check-state').change(function(){
		var val = 0;
		if($(this).is(':checked')){
			val=1;
		}
		var aid = $(this).data().id;
		$.post(location.href+"/state/"+aid+"/"+val,function(data){
			var type = "error";
			var message = "Une erreure est survenue lors du changement d'état!";
			if (data == 1){
				type = "success";
				var message = "L'état a bien été modifié !";
			}

			$('#ajax-notif').removeClass('alert-success').removeClass('alert-error').addClass('alert-'+type).html(message).slideDown(400).delay(1000).slideUp(400);
		},'json');
	})

	$(".alert").delay(1500).slideUp(400);
	setInterval($(".alert").remove(),200);

});
