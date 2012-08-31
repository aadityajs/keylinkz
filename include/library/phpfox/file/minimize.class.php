<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: minimize.class.php 3391 2011-10-31 14:30:54Z Raymond_Benc $
 */
class Phpfox_File_Minimize
{
	public function __construct()
	{		
	}
	
	public function js($sContent)
	{		
		if (file_exists(PHPFOX_DIR_LIB . 'jsmin/jsmin.class.php'))
		{
			require_once(PHPFOX_DIR_LIB . 'jsmin/jsmin.class.php');		
			
			return JSMin::minify($sContent);
		}
		
		return $sContent;
	}
	
	public function css($sContent)
	{
		$sContent = preg_replace_callback('/url\([\'"](.*?)[\'"]\)/is', array($this, '_replaceImages'), $sContent);		
		$sContent = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $sContent);
		$sContent = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $sContent);				
		
		return $sContent;
	}
	
	public function _replaceImages($aMatches)
	{
		$sMatch = trim($aMatches[1]);
		$sMatch = str_replace('../image/', '', $sMatch);
		
		return 'url(\'' . Phpfox::getLib('template')->getStyle('image', $sMatch) . '\')';
	}
}