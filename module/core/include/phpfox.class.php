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
 * @package  		Module_Core
 * @version 		$Id: phpfox.class.php 2273 2011-01-14 16:03:18Z Raymond_Benc $
 */
class Module_Core 
{	
	public static $aTables = array(
		'admincp_dashboard',
		'admincp_login',
		'block',
		'block_order',
		'block_source',
		'cache',
		'component',
		'component_setting',
		'country',
		'country_child',
		'cron',
		'cron_log',
		'currency',
		'install_log',
		'menu',
		'module',
		'password_request',
		'plugin',
		'plugin_hook',
		'product',
		'product_dependency',
		'product_install',
		'rewrite',
		'search',
		'setting',
		'setting_group',
		'site_stat',
		'version'
	);
	
	public static $aInstallWritable = array(
		'file/cache/',
		'file/gzip/',
		'file/log/',
		'file/static/',
		'file/session/',
		'file/pic/watermark/',
		'file/pic/icon/',
		'include/setting/server.sett.php'
	);
}

?>