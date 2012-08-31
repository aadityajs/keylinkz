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
 * @package  		Module_Share
 * @version 		$Id: frame.class.php 3404 2011-11-01 10:57:17Z Miguel_Espinoza $
 */
class Share_Component_Block_Frame extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		static $aBookmarks = array();
		if (empty($aBookmarks))
		{
			$aBookmarks = Phpfox::getService('share')->getType('bookmark');
		}
		if (!is_array($aBookmarks))
		{
			$aBookmarks = array();
		}
		$this->template()->assign(array(
				'sBookmarkType' => $this->getParam('type'),
				'sBookmarkUrl' => $this->getParam('url'),
				'sBookmarkTitle' => $this->getParam('title'),
				'bShowSocialBookmarks' => count($aBookmarks) > 0
			)
		);		
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('share.component_block_frame_clean')) ? eval($sPlugin) : false);
	}
}

?>