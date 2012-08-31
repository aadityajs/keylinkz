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
 * @package 		Phpfox_Component
 * @version 		$Id: list.class.php 2767 2011-07-29 12:05:18Z Miguel_Espinoza $
 */
class Im_Component_Block_List extends Phpfox_Component
{
	public $_aFriends = null;
	/**
	 * Class process method wnich is used to execute this component.
	 * Lists all the online friends in the IM users list
	 */
	public function process()
	{
		$iPage = $this->request()->getInt('page', 0);
		$iPageSize = Phpfox::getParam('im.total_friends_to_display_in_im');		
		$aCond = array();
		
		$aCond[] = 'AND f.user_id = ' . Phpfox::getUserId();
		if (($sFind = $this->request()->get('find')))
		{
			$aCond[] = 'AND u.full_name LIKE \'%' . Phpfox::getLib('database')->escape($sFind) . '%\'';
		}
		$aCond[] = 'AND u.im_hide != 1';
		list($iCnt, $aFriends) = Phpfox::getService('im')->getOnlineFriends(Phpfox::getUserId(), $aCond, $iPage, $iPageSize);
		$this->_aFriends = $aFriends;
		
		
		
		Phpfox::getLib('pager')->set(array('ajax' => 'im.searchFriends', 'page' => $iPage, 'size' => $iPageSize, 'count' => $iCnt));
		
		$this->template()->assign(array(
				'aFriends' => $aFriends,
				'bDisplayUl' => $this->getParam('im_display_ul', true),
				'bIsMiniPager' => true
			)
		);			
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('im.component_block_list_clean')) ? eval($sPlugin) : false);
	}
}

?>