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

  $eplug_admin = TRUE;
  require_once "../../class2.php"; if(!getperms("P")) { echo "You do not have permission"; exit; }
  require_once e_ADMIN."auth.php";

  @include_once e_PLUGIN."recaptcha/languages/".e_LANGUAGE.".php";
  @include_once e_PLUGIN."recaptcha/languages/English.php";
	
	 
//------------------------------------------------------------------------------------------------------------+

  if ($_POST)
  {
    $pref['recaptcha_active']            = $_POST['recaptcha_active']; 
    $pref['recaptcha_sitekey']           = $_POST['recaptcha_sitekey'];
    $pref['recaptcha_secretkey']         = $_POST['recaptcha_secretkey'];
    save_prefs();
  } 
  
//------------------------------------------------------------------------------------------------------------+

  $text = "
  <form method='post' action=''>
    <div style='text-align:center'>
      <table class='fborder' width='95%' border='0'>
 
	
  <tr>
    <td colspan='2'>
      <br /><br />
      ".LAN_RECAPTCHA_ADM_RECAPTCHA_INFO." <a href='https://www.google.com/recaptcha/admin'>https://www.google.com/recaptcha/admin</a>
      <br /><br />
    </td>
  </tr>
  <tr>
    <td class='forumheader3'>".LAN_RECAPTCHA_ADM_ACTIVE."</td>
    <td class='forumheader3'>
      <input type='checkbox' name='recaptcha_active' value='1' ".($pref['recaptcha_active']?"checked='checked'":"")." />
    </td>
  </tr>
  <tr>
    <td class='forumheader3'>".LAN_RECAPTCHA_ADM_RECAPTCHA_PUBLIC."</td>
    <td class='forumheader3'>
      <input class='tbox' type='text' name='recaptcha_sitekey' value='{$pref['recaptcha_sitekey']}' size='60' />
    </td>
  </tr>

  <tr>
    <td class='forumheader3'>".LAN_RECAPTCHA_ADM_RECAPTCHA_PRIVATE."</td>
    <td class='forumheader3'>
      <input class='tbox' type='text' name='recaptcha_secretkey' value='{$pref['recaptcha_secretkey']}' size='60' />
    </td>
  </tr>

  <tr>
    <td colspan='2'>
      <br /><br />
    </td>
  </tr>

  <tr>
    <td colspan='2' style='text-align:center'>
      <input class='button' type='submit' name='config_submit' value='".LAN_RECAPTCHA_ADM_SUBMIT."' />
 
    </td>
  </tr>

      </table>
    </div>
  </form>";

  $ns -> tablerender(LAN_RECAPTCHA_ADM_TITLE, $text);
  
	//------------------------------------------------------------------------------------------------------------+
 
	 require_once(e_ADMIN."footer.php");
   
 /*

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('recaptcha',true);


class recaptcha_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'recaptcha_ui',
			'path' 			=> null,
			'ui' 			=> 'recaptcha_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'No CAPTCHA reCAPTCHA';
}




				
class recaptcha_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'No CAPTCHA reCAPTCHA';
		protected $pluginName		= 'recaptcha';
	//	protected $eventName		= 'recaptcha-'; // remove comment to enable event triggers in admin. 		
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= ' DESC';
	
		protected $fields 		= NULL;		
		
		protected $fieldpref = array();
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'active'		=> array('title'=> 'Active', 'tab'=>0, 'type'=>'bool', 'data' => 'int', 'help'=>''),
			'sitekey'		=> array('title'=> 'Site Key', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'', 'writeParms' => array('size'=>'block-level')),
			'secretkey'		=> array('title'=> 'Secret Key', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'', 'writeParms' => array('size'=>'block-level')),
		); 

		public function init()
		{
			// Set drop-down values (if any). 
	
		}

		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			$otherField  = $this->getController()->getFieldVar('other_field_name');
			return $text;
			
		}
	*/
			  /*
}
				


class recaptcha_form_ui extends e_admin_form_ui
{

}		
		
		
new recaptcha_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;
				 */
?>