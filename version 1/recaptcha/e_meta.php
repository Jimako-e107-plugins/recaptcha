<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2012 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * [ RECAPTCHA PLUGIN FOR 0.7.25+ version] [ © JIMAKO FROM e107.sk] 
 *
 * 
 */

global  $pref ;


if (!isset($pref['plug_installed']['recaptcha']))
{
    return ;
}

$recaptchaActive  = $pref['recaptcha_active'];
$recaptchaSiteKey = $pref['recaptcha_sitekey'];

/* contact page - setting captcha is done by template */
/* core pref if use image captcha on signup page */
$signup_imagecode = $pref['signcode'];
/* core pref if use image captcha on login page */
$use_imagecode 		= $pref['logcode'];


if($recaptchaActive)
{
	 // multichapcha solution withou JQUERY
   // echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>';
		echo '<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit"
			        async defer>
			    </script>';
 
				$script = "	
				var CaptchaCallback = function() {
		    var captchas = document.getElementsByClassName('g-recaptcha');
		    for(var i = 0; i < captchas.length; i++) {
		        grecaptcha.render(captchas[i], {'sitekey' : '{$recaptchaSiteKey}'});
		    }
				}; ";       
   
		echo '<script  type="text/javascript">'.$script.'</script>';      
 
  // templates are loaded in e_meta, not in e_module
  // contact page 
	if (e_PAGE=="contact.php") 
	{	
	 	$text = "<tr><td class='forumheader3' colspan='2' style='text-align: center; text-align:  -webkit-center;'>";
		$text .= '<div class="g-recaptcha" data-sitekey="'.$recaptchaSiteKey.'"  ></div>'; 
		$text .= '<input type="hidden" name="rand_num" value="">';
		$text .= '<input type="hidden" name="code_verify" value="">';			
		$text .= "</td></tr>";
		
    $CONTACT_FORM=str_replace('{CONTACT_IMAGECODE}',$text ,$CONTACT_FORM); 
    $CONTACT_FORM=str_replace('{CONTACT_IMAGECODE_INPUT}','' ,$CONTACT_FORM); 
 
	}
	elseif (e_PAGE=="signup.php" && $signup_imagecode)   {
		$text = "<tr><td class='forumheader3' colspan='2' style='text-align: center; text-align:  -webkit-center;'>";
		$text .= '<div class="g-recaptcha" data-sitekey="'.$recaptchaSiteKey.'"  ></div> ';
		$text .= "</td></tr>";
    $SIGNUP_BODY=str_replace('{SIGNUP_IMAGECODE}',$text ,$SIGNUP_BODY);      
	}
}	
	
?>