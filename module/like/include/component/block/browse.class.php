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
 * @version 		$Id: browse.class.php 3749 2011-12-09 13:53:53Z Miguel_Espinoza $
 */
class Like_Component_Block_Browse extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$aLikes = Phpfox::getService('like')->getLikes($this->request()->get('type_id'), $this->request()->getInt('item_id'));
	
		$sErrorMessage = '';
		if ($this->request()->getInt('type_id') == 'pages')
		{
			$aPage = Phpfox::getService('pages')->getPage($this->request()->getInt('item_id'));
			if (!count($aLikes))
			{
				if ($aPage['type_id'] == 3)
				{
					$sErrorMessage = Phpfox::getPhrase('like.this_group_has_no_members');				
				}
				else
				{
					$sErrorMessage = Phpfox::getPhrase('like.nobody_likes_this');
				}
			}
		}
		
		$this->template()->assign(array(
				'aLikes' => $aLikes,
				'sErrorMessage' => $sErrorMessage
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('like.component_block_browse_clean')) ? eval($sPlugin) : false);
	}
}

?>