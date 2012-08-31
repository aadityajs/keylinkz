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
 * @version 		$Id: select.class.php 2696 2011-06-30 19:30:33Z Raymond_Benc $
 */
class Mail_Component_Block_Box_Select extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$aFolders = Phpfox::getService('mail.folder')->get();
		
		$this->template()->assign(array(			
				'aFolders' => $aFolders
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('mail.component_block_box_select_clean')) ? eval($sPlugin) : false);
	}
}

?>