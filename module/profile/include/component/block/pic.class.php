<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: pic.class.php 3333 2011-10-20 13:34:25Z Miguel_Espinoza $
 */
class Profile_Component_Block_Pic extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{	
		//echo $this->request()->get('type')."==========";
		if (!defined('PHPFOX_IS_USER_PROFILE'))
		{
			return false;
		}
		
		$aUser = $this->getParam('aUser');

		$aUserInfo = array(
			'title' => $aUser['full_name'],
			'path' => 'core.url_user',
			'file' => $aUser['user_image'],
			'suffix' => '_200',
			'max_width' => 175,
			'max_height' => 300,
			'no_default' => (Phpfox::getUserId() == $aUser['user_id'] ? false : true),
			'thickbox' => true,
        	'class' => 'profile_user_image',
			'no_link' => true
		);		

		(($sPlugin = Phpfox_Plugin::get('profile.component_block_pic_process')) ? eval($sPlugin) : false);
		
		$sImage = Phpfox::getLib('image.helper')->display(array_merge(array('user' => Phpfox::getService('user')->getUserFields(true, $aUser)), $aUserInfo));	

		$this->template()->assign(array(
				'sProfileImage' => $sImage
			)
		);
		
		if (defined("PHPFOX_IN_DESIGN_MODE"))
		{
			return 'block';
		}
		
		
		$url = Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'));
		
		$url_user_name = Phpfox::getLib('url')->getUrl(); 
		$listing_url = Phpfox::getLib('url')->makeUrl($url_user_name);
		
		$this->template()->assign('dynamic_user_url', $url);
		$this->template()->assign('url_user_name', $url_user_name);
		$this->template()->assign('listing_url', $listing_url);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('profile.component_block_pic_clean')) ? eval($sPlugin) : false);
	}
}

?>