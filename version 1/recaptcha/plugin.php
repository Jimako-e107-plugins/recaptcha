<?php

//PLUGIN INFO------------------------------------------------------------------------------------------------+

  $eplug_name        = "NoCaptcha ReCaptcha";
  $eplug_version     = "0.7";
  $eplug_author      = "Jimako";
  $eplug_url         = "https://www.e107.sk/";
  $eplug_email       = "use_forum";
  $eplug_description = "Plugin";
  $eplug_compatible  = "e107v7";
  $eplug_readme      = "readme.txt";
  $eplug_compliant   = FALSE;
  $eplug_module      = TRUE;

//PLUGIN FOLDER----------------------------------------------------------------------------------------------+

  $eplug_folder      = "recaptcha";

//PLUGIN MENU FILE-------------------------------------------------------------------------------------------+

  $eplug_menu_name   = "recaptcha";

//PLUGIN ADMIN AREA FILE-------------------------------------------------------------------------------------+

  $eplug_conffile    = "admin_config.php";

//PLUGIN ICONS AND CAPTION-----------------------------------------------------------------------------------+

  $eplug_logo        = "images/_icon_32.png";
  $eplug_icon        = "{$eplug_folder}/images/_icon_128.png";
  $eplug_icon_small  = "{$eplug_folder}/images/_icon_16.png";
  $eplug_caption     = "Configure";

//DEFAULT PREFERENCES----------------------------------------------------------------------------------------+

  $eplug_prefs = array(

  "recaptcha_active"           => "0",
  "recaptcha_sitekey"            => "Your Site Key",
  "recaptcha_secretkey"            => "Your Secret Key"
	);
	
//MYSQL TABLES TO BE CREATED---------------------------------------------------------------------------------+

$eplug_table_names = array();

//MYSQL TABLE STRUCTURE--------------------------------------------------------------------------------------+

$eplug_tables = array();

//LINK TO BE CREATED ON SITE MENU--------------------------------------------------------------------------+

  $eplug_link      = FALSE;
  //$eplug_link_name = "$eplug_name";
  //$eplug_link_url  = e_PLUGIN."$eplug_folder/";
  
//MESSAGE WHEN PLUGIN IS INSTALLED-------------------------------------------------------------------------+

  $eplug_done = "Plugin is now Installed.";

//SAME AS ABOVE BUT ONLY RUN WHEN CHOOSING UPGRADE---------------------------------------------------------+


//---------------------------------------------------------------------------------------------------------+


