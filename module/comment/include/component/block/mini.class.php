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
 * @version 		$Id: mini.class.php 3606 2011-11-30 06:23:17Z Raymond_Benc $
 */
class Comment_Component_Block_Mini extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		if (($aChildComments = $this->getParam('comment_custom')))
		{
			$this->template()->assign(array(
					'aComment' => $aChildComments,
					'bNotMoreNestedComments' => false
				)
			);
		}
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('comment.component_block_mini_clean')) ? eval($sPlugin) : false);
		
		$this->template()->assign('bNotMoreNestedComments', false);
	}
}

?>