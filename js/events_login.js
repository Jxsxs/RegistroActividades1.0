jQuery(document).ready(function(){
	// Show password Button
	$("#showpassword").on('click', function(){

		var pass = $("#txt_pass");
		var fieldtype = pass.attr('type');
		if (fieldtype == 'password') {
			pass.attr('type', 'text');
			$(this).text("Hide Password");
		}else{
			pass.attr('type', 'password');
			$(this).text("Show Password");
		}
	});
	window.location.hash = "no-back-button";
	window.location.hash = "Again-No-back-button" //chrome
	window.onhashchange = function () {
		window.location.hash = "no-back-button";
	}
});
