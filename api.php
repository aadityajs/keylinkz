<?php
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.php 922 2009-09-03 11:32:15Z Raymond_Benc $
 */

// Make sure we are running PHP5
if (version_compare(phpversion(), '5', '<') === true)
{
	exit('phpFox 2 or higher requires PHP 5 or newer.');
}

ob_start();

/**
 * Key to include phpFox
 *
 */
define('PHPFOX', true);

/**
 * Directory Seperator
 *
 */
define('PHPFOX_DS', DIRECTORY_SEPARATOR);

/**
 * phpFox Root Directory
 *
 */
define('PHPFOX_DIR', dirname(__FILE__) . PHPFOX_DS);

define('PHPFOX_START_TIME', array_sum(explode(' ', microtime())));

// Require phpFox Init
require(PHPFOX_DIR . 'include' . PHPFOX_DS . 'init.inc.php');

Phpfox::getComponent('api.method', array(), 'controller');

ob_end_flush();

?>