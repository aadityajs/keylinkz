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
 * @version 		$Id: url.class.php 3341 2011-10-21 10:38:43Z Miguel_Espinoza $
 */
class Video_Component_Block_Url extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{		
		$sCategories = '<select name="val[category][0]" class="js_mp_category_list" id="js_mp_id_0">';
		$sCategories .= Phpfox::getService('video.category')->display('option')->get();
		$sCategories .= '</select>';
		$this->template()->assign(array(
				'sCategories' => $sCategories,//Phpfox::getService('video.category')->get(),
				'sEditorId' => $this->request()->get('editor_id')			
			)
		);	
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('video.component_block_url_clean')) ? eval($sPlugin) : false);
	}
}

?>