<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: constant.sett.php 2664 2011-06-10 12:01:06Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

if (!defined('PHPFOX_DEBUG'))
{
	define('PHPFOX_DEBUG', false);
}

if (!defined('PHPFOX_DEBUG_LEVEL'))
{
	define('PHPFOX_DEBUG_LEVEL', 1);
}

define('PHPFOX_SAFE_MODE', ((@ini_get('safe_mode') == 1 || strtolower(@ini_get('safe_mode')) == 'on') ? true : false));

define('PHPFOX_OPEN_BASE_DIR', ((($sBd = @ini_get('open_basedir')) && $sBd != '/') ? true : false));

// Should the script use PHP's new DateTime and related classes?
define('PHPFOX_USE_DATE_TIME', class_exists('DateTime') && class_exists('DateTimeZone') && method_exists('DateTime','settimestamp'));

// Directory

define('PHPFOX_DIR_INCLUDE', PHPFOX_DIR . 'include' . PHPFOX_DS);

define('PHPFOX_DIR_SETTING', PHPFOX_DIR_INCLUDE . 'setting' . PHPFOX_DS);

define('PHPFOX_DIR_XML', PHPFOX_DIR_INCLUDE . 'xml' . PHPFOX_DS);

define('PHPFOX_DIR_APP', PHPFOX_DIR_INCLUDE . 'app' . PHPFOX_DS);

define('PHPFOX_DIR_PLUGIN', PHPFOX_DIR_INCLUDE . 'plugin' . PHPFOX_DS);

define('PHPFOX_DIR_LIB', PHPFOX_DIR_INCLUDE . 'library' . PHPFOX_DS);

define('PHPFOX_DIR_LIB_CORE', PHPFOX_DIR_LIB . 'phpfox' . PHPFOX_DS);

define('PHPFOX_DIR_THEME', PHPFOX_DIR . 'theme' . PHPFOX_DS);

define('PHPFOX_DIR_CRON', PHPFOX_DIR_INCLUDE . 'cron' . PHPFOX_DS);

define('PHPFOX_DIR_MODULE', PHPFOX_DIR . 'module' . PHPFOX_DS);

define('PHPFOX_DIR_MODULE_COMPONENT', 'include' . PHPFOX_DS . 'component');

define('PHPFOX_DIR_MODULE_SERVICE', 'include' . PHPFOX_DS . 'service');

define('PHPFOX_DIR_MODULE_TPL', PHPFOX_DS . 'template');

define('PHPFOX_DIR_MODULE_XML', PHPFOX_DS . 'install');

define('PHPFOX_DIR_MODULE_PLUGIN', 'include' . PHPFOX_DS . 'plugin');

define('PHPFOX_DIR_FILE', PHPFOX_DIR . 'file' . PHPFOX_DS);

define('PHPFOX_DIR_CACHE', PHPFOX_DIR_FILE . 'cache' . PHPFOX_DS);

define('PHPFOX_DIR_DEV', dirname(dirname(dirname(dirname(__FILE__)))) . PHPFOX_DS . 'dev' . PHPFOX_DS);

define('PHPFOX_DIR_TPL_PLUGIN', PHPFOX_DIR_LIB_CORE . 'template' . PHPFOX_DS . 'plugin' . PHPFOX_DS);

// Added by Aditya
define('PHPFOX_DIR_DEFAULT_THEME', '/keylinkz/theme/frontend/default/style/default/image/layout/');
define('PHPFOX_REALESTAE_IMAGE_UPLOAD', '/keylinkz/module/realestate/static/image/upload/');

define('PHPFOX_DIR_DEFAULT_THEME_ICON', '/keylinkz/theme/frontend/default/style/default/image/icon/');


// URL & Request

define('PHPFOX_GET_METHOD', 'do');

define('PHPFOX_STATIC', 'static/');

define('PHPFOX_STATIC_STYLE', 'static/style/');

define('PHPFOX_INDEX_FILE', 'index.php');

// Template

define('PHPFOX_TPL_SUFFIX', '.html.php');

// XML

define('PHPFOX_XML_SUFFIX', '.xml.php');

// Module

define('PHPFOX_MODULE_CORE', 'core');

define('ADMIN_USER_ID', '1');

define('NORMAL_USER_ID', '2');

define('GUEST_USER_ID', '3');

define('STAFF_USER_ID', '4');

/**
 * Hour in seconds
 *
 * @var int
 */
define('CRON_ONE_HOUR', 3600);

/**
 * Minute in seconds
 *
 * @var int
 */
define('CRON_ONE_MINUTE', 60);

define('CRON_ONE_DAY', 86400);

// Is an AJAX routine?
if (!defined('PHPFOX_IS_AJAX'))
{
	define('PHPFOX_IS_AJAX', false);
}

if (!defined('PHPFOX_DEVELOPER'))
{
	define('PHPFOX_DEVELOPER', false);
}

if (!defined('PHPFOX_IS_AJAX_PAGE'))
{
	define('PHPFOX_IS_AJAX_PAGE', false);
}

?>