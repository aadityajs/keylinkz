<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[NO_COPYRIGHT]
 * @author  		Priyam Ghosh
 * @package 		Phpfox_Component
 * @version 		$Id: add.class.php 2000 2010-10-29 11:24:24Z Priyam Ghosh $
 */
class Realestate_Component_Controller_Admincp_List extends Phpfox_Component 
{
	public function process()
	{
		$data = Phpfox::getService('realestate.realestate')->get();
		
		//echo '<pre>'.print_r($data,true).'</pre>';
		//exit;
		
		$this->template()->setHeader('sample.js', 'module_realestate'); 
		$this->template()->assign('data', $data);
		 
	}
}

?>