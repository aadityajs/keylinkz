<?php

defined('PHPFOX') or exit('No dice!');


/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel Espinoza
 * @package 		Phpfox_Component
 * @version 		$Id: design.class.php 1594 2010-05-22 22:49:41Z Miguel_Espinoza $
 */
class Theme_Component_Block_AddBlockDnD extends Phpfox_Component
{
	public function process()
	{
		$aModules = Phpfox::getService('core')->getBlocksByModule();
		$this->template()->assign(array(
			'aModules' => $aModules
			)
		);
	}
}
?>
