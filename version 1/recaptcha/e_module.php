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

global  $pref, $override;
 
if (!isset($pref['plug_installed']['recaptcha']))
{
    return ;
}
 
 
$recaptchaActive  = $pref['recaptcha_active'];
$signup_imagecode = $pref['signcode'];
$use_imagecode 		= $pref['logcode'];

if($recaptchaActive)
{
 
   /* do it old good way */
  @include_once e_PLUGIN."recaptcha/languages/".e_LANGUAGE.".php";
  @include_once e_PLUGIN."recaptcha/languages/English.php";
 
  if($_POST)     {      
	// not load everywhere 
  // contact page 
  
	if (e_PAGE=="contact.php"    ||  	(e_PAGE == "SP_ContactUs.php")  ||
	(e_PAGE == "form.php")  ||
	(e_PAGE=="signup.php" && $signup_imagecode)  ||
	(e_PAGE=="login.php" && $use_imagecode)
	)
	{		 
 	  
	 require_once e_PLUGIN.'recaptcha/inc/recaptchalib.php'; 

     // your secret key
 
			$secret =   $pref['recaptcha_secretkey']; 
			// empty response
			$response = null;
			 
			// check secret key
			$reCaptcha = new ReCaptcha($secret);
	
			// if submitted check response
			if ($_POST["g-recaptcha-response"]) {
			    $response = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
			    );
			}
 	
	   if ($response != null && $response->success) {
	      $del_time = time()+1300; //original 1200
        $code = substr($_POST["g-recaptcha-response"],0,19);
        // fix for 1.0.4
        $code = preg_replace("/[^0-9\.]/", "", $code);
	      $sql->db_Insert("tmp", "'{$code}',{$del_time},'{$code}'");  
	      
	      $_POST['rand_num']= $code;
	      $_POST['code_verify']= $code;
	      $_POST['codeverify']= $code;
 
		   // return true;
		  } else {   
			  $_POST['rand_num']= 'rand_num';
	      $_POST['code_verify']= 'code_verify';   
				$_POST['codeverify']= 'codeverify';    
		    //return false;
			}
		}
 
	}
}
							 