<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: info.class.php 3333 2011-10-20 13:34:25Z Miguel_Espinoza $
 */
class Profile_Component_Controller_Info extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{		
		$aRow = $this->getParam('aUser');		
		
		if ($this->request()->get('req3') == 'design')
		{
			define('PHPFOX_PROFILE_INFO_PAGE', true);
			
			$this->template()->setHeader(array(
				'sort.js' => 'module_theme',
				'design.js' => 'module_theme',
				'<script type="text/javascript">
				$Core.design.init({type_id: "profile", special: "user_info"});
				function designOnUpdate() {$Core.design.updateSorting();} </script>'
			));						
		}
		
		
		if (Phpfox::isModule('rate'))
		{
			$this->template()
				->setPhrase(array(
						'rate.thanks_for_rating'			
					)
				)			
				->setHeader('cache', array(
						'jquery/plugin/star/jquery.rating.js' => 'static_script',
						'jquery.rating.css' => 'style_css',
						'rate.js' => 'module_rate'
					)
				)
				->setHeader(array(
					'<script type="text/javascript">$Behavior.userProfileRating = function() { $Core.rate.init({module: \'user\', display: ' . ($aRow['has_rated'] ? 'false' : ($aRow['user_id'] == Phpfox::getUserId() ? 'false' : 'true')) . ', error_message: \'' . ($aRow['has_rated'] ? Phpfox::getPhrase('profile.you_have_already_rated_this_user', array('phpfox_squote' => true)) : Phpfox::getPhrase('profile.you_cannot_rate_yourself', array('phpfox_squote' => true))) . '\'}); }</script>'
				)
			);
		}	
		$this->template()->setEditor();
		$this->template()->setHeader('jquery.js', 'module_profile');
		$this->template()->setHeader('jRating.jquery.css', 'module_profile');
		$this->template()->setHeader('jRating.jquery.js', 'module_profile');
		$this->template()->setHeader('sample.js', 'module_profile');
		$this->template()->setHeader('jrating-sample.js', 'module_profile');
		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('profile.component_controller_info_clean')) ? eval($sPlugin) : false);
	}
}

?>