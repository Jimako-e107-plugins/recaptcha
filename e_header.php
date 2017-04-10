<?php 
$recaptchaActive = e107::pref('recaptcha', 'active');
$recaptchaSiteKey = e107::pref('recaptcha', 'sitekey'); 

		if($recaptchaActive)
		{
		 // e107::js("footer", "https://www.google.com/recaptcha/api.js?onload=myCallBack" , 'jquery');
		 
		  /* WORKROUND  you can't use async defer with e107::js now) */
		if(!function_exists("theme_foot")) {	
			function theme_foot() {			
			 // e107::js("footer", "https://www.google.com/recaptcha/api.js" , 'jquery'); 
			 echo '<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
		        async defer>
		    </script>';
		}
    }
		 
		$script = "	var onloadCallback = function() {
		    $('.g-recaptcha').each(function(){
		        grecaptcha.render(this,{'sitekey' : '{$recaptchaSiteKey}'});
		      })
		  }; "; 
	 
	 e107::js("footer-inline", $script , 'jquery');		 
   
	}  
 


?>