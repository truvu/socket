(function ($){
	$(document.account_login).submit(function(event) {
		var email = $(this.email), 
			pass = $(this.pass),
			error_email = $(this.querySelector('div[for="email"]')),
			error_pass = $(this.querySelector('div[for="pass"]'));
		var e = email.val(), p = pass.val(), error;
		if(!e){
			error_email.html('Please enter an email!');
		}else{
			error_email.html('');
		};
		if(!p) {
			error_pass.html('Please enter password!');
		}else{
			var count = e.length;
			if(count<6){
				error_pass.html('The password is least 6 key');
			}else if(count>100) {
				error_pass.html('The password max 100 key');
			}else{
				error_pass.html('');
			}
		};
		if(error_email.html()||error_pass.html()) return false;
	});
})(jQuery);