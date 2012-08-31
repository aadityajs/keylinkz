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
 * @version 		$Id: inner.class.php 2767 2011-07-29 12:05:18Z Miguel_Espinoza $
 */
class Ad_Component_Block_Inner extends Phpfox_Component
{	
	/**
	 * Class process method wnich is used to execute this component.
         * This block shows an ad inside another block
	 */
	public function process()
	{
		(($sPlugin = Phpfox_Plugin::get('ad.component_block_inner_process__start')) ? eval($sPlugin) : false);
		if (!Phpfox::getParam('ad.enable_ads'))
		{
			return false;
		}	
		
        if ($this->getParam('sClass', '') == '')
        {
			return false;
		}

		
		$aAd = Phpfox::getService('ad')->getForLocation($this->getParam('sClass'));
		
		
		if ($aAd === false || empty($aAd))
		{			
			return false;
		}
		
		$this->template()->assign(array(
				'aAd' => $aAd
			)
		);	
                
		(($sPlugin = Phpfox_Plugin::get('ad.component_block_inner_process__end')) ? eval($sPlugin) : false);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('ad.component_block_display_clean')) ? eval($sPlugin) : false);
	}
}

?>