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
 * @version 		$Id: list.class.php 1245 2009-11-02 16:10:29Z Raymond_Benc $
 */
class Realestate_Component_Block_List extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		if (Phpfox::isUser())
		{
			$aGroup = Phpfox::getService('user.group')->getGroup(Phpfox::getUserBy('user_group_id'));
		}

		echo "hiaaa";

	}

	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('realestate.component_block_list_clean')) ? eval($sPlugin) : false);
	}
}

?>