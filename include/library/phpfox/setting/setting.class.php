<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Global Site Settings
 * Class is used to load and retrieve global settings, which are
 * stored in the database table "setting". Admins can easily modify
 * these settings direct from the AdminCP. The most common interaction
 * with this class is to get a setting value and to do this we use our
 * core static class.
 * 
 * Example:
 * <code>
 * Phpfox::getParam('foo.bar');
 * </code>
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: setting.class.php 3829 2011-12-19 09:33:03Z Raymond_Benc $
 */
class Phpfox_Setting
{
	/**
	 * List of all the settings.
	 *
	 * @var array
	 */
	private $_aParams = array();
	
	/**
	 * Default settings we load and their values. We only 
	 * use this when installing the script the first time
	 * since the database hasn't been installed yet.
	 *
	 * @var array
	 */
	private $_aDefaults = array(
		'core.session_prefix' => 'phpfox',
		'core.title_delim' => '&raquo;',
		'core.site_title' => 'phpFox',
		'core.branding' => false,
		'core.default_lang_id' => 'en',
		'core.default_style_name' => 'konsort',
		'core.default_theme_name' => 'default',
		'language.lang_pack_helper' => false,
		'core.cookie_path' => '/',
		'core.cookie_domain' => '',
		'core.use_gzip' => true,
		'core.url_rewrite' => '2',
		'core.is_installed' => false,
		'user.profile_use_id' => false,
		'user.disable_username_on_sign_up' => false,
		'core.site_copyright' => '',
		'db' => array(
			'prefix' => 'phpfox_',
			'host' => 'localhost',
			'user' => '',
			'pass' => '',
			'name' => '',
			'driver' => 'mysql',
			'slave' => false
		),
		'core.cache_skip' => false,
		'balancer' => array(
			'enabled' => false
		),
		'user.min_length_for_username' => '5',
		'user.max_length_for_username' => '25',
		'core.default_time_zone_offset' => '0',
		'core.identify_dst' => '1',
		'core.global_site_title' => 'phpFox',
		'core.phpfox_is_hosted' => false,
		'core.enabled_edit_area' => false,
		'core.site_wide_ajax_browsing' => false,
		'core.disable_hash_bang_support' => false,
		'core.use_jquery_datepicker' => false,
		'core.date_field_order' => 'MDY',
		'core.cache_storage' => 'file',
		'core.allow_cdn' => false
	);
	
	/**
	 * Class constructor. We run checks here to make sure the server setting file
	 * is in place and this is where we can judge if the script has been installed
	 * or not.
	 *
	 */
	public function __construct()
	{
		$_CONF = array();
		$sMessage = 'Oops! phpFox is not installed. Please run the install script to get your community setup.';
		
		if (!defined('PHPFOX_INSTALLER') && !file_exists(PHPFOX_DIR_SETTING . 'server.sett.php') && file_exists(PHPFOX_DIR . 'install' . PHPFOX_DS . 'index.php'))
		{
			Phpfox::getLib('phpfox.api')->message($sMessage);
		}
			
		if (file_exists(PHPFOX_DIR_SETTING . 'server.sett.php'))
		{
			$_CONF = array();
		
			require(PHPFOX_DIR_SETTING . 'server.sett.php');

			if (!defined('PHPFOX_INSTALLER'))
			{			
				if (!isset($_CONF['core.is_installed']))
				{
					Phpfox::getLib('phpfox.api')->message($sMessage);
				}
					
				if (!$_CONF['core.is_installed'])
				{
					Phpfox::getLib('phpfox.api')->message($sMessage);
				}								
			}

			if (!defined('PHPFOX_INSTALLER') && PHPFOX_DEBUG)
			{
				// $this->_aDefaults = array();
			}
			
			if ($_CONF['core.db_table_installed'] === false)
			{
				define('PHPFOX_SCRIPT_CONFIG', true);
			}
		}
		else 
		{
			define('PHPFOX_SCRIPT_CONFIG', true);
		}
			
		if ((!isset($_CONF['core.host'])) || (isset($_CONF['core.host']) && $_CONF['core.host'] == 'HOST_NAME'))
		{
			$_CONF['core.host'] = $_SERVER['HTTP_HOST'];
		}
			
		if ((!isset($_CONF['core.folder'])) || (isset($_CONF['core.folder']) && $_CONF['core.folder'] == 'SUB_FOLDER'))
		{
			$_CONF['core.folder'] = '/';				
		}
			
		require_once(PHPFOX_DIR_SETTING . 'common.sett.php');
		
		if (defined('PHPFOX_INSTALLER'))
		{
			$_CONF['core.path'] = '../';	
			$_CONF['core.url_file'] = '../file/';
		}			
				
		$this->_aParams =& $_CONF;
		
		if (defined('PHPFOX_INSTALLER'))
		{
			$this->_aParams['core.url_rewrite'] = '2';
			if ($this->_aParams['db']['driver'] == 'mysqli')
			{
				$this->_aParams['db']['driver'] = 'mysql';
			}			
		}				
	}
	
	/**
	 * Creates a new setting.
	 *
	 * @param array $mParam ARRAY of settings and values.
	 * @param string $mValue Value of setting if the 1st argument is a string.
	 */
	public function setParam($mParam, $mValue = null)
	{
		if (is_string($mParam))
		{
			$this->_aParams[$mParam] = $mValue;
		}
		else
		{
			foreach ($mParam as $mKey => $mValue)
			{
				$this->_aParams[$mKey] = $mValue;
			}
		}		
	}
	
	/**
	 * Build the setting cache by getting all the settings from the database
	 * and then caching it. This way we only load it from the database
	 * the one time.
	 *
	 */
	public function set()
	{		
		if (defined('PHPFOX_INSTALLER') && defined('PHPFOX_SCRIPT_CONFIG'))
		{			
			return;
		}
		
		if (!defined('PHPFOX_INSTALLER') && file_exists(PHPFOX_DIR . 'install' . PHPFOX_DS . 'include' . PHPFOX_DS . 'installer.class.php'))
		{			
			$aRow = Phpfox::getLib('database')->select('value_actual')->from(Phpfox::getT('setting'))->where('var_name = \'phpfox_version\'')->execute('getRow');
			if (isset($aRow['value_actual']))
			{
				if (md5(Phpfox::VERSION) != md5($aRow['value_actual']))
				{
					$sMessage = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
					$sMessage .= '<html xmlns="http://www.w3.org/1999/xhtml" lang="en">';
					$sMessage .= '<head><title>Upgrade Taking Place</title><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><style type="text/css">body{font-family:verdana; color:#000; font-size:9pt; margin:5px; background:#fff;} img{border:0px;}</style></head><body>';
					$sMessage .= file_get_contents(PHPFOX_DIR . 'static' . PHPFOX_DS . 'upgrade.html');
					$sMessage .= '</body></html>';
					echo $sMessage;
					exit;					
				}
			}			
		}

		$oCache = Phpfox::getLib('cache');
		$iId = $oCache->set('setting');
		
		if (!($aRows = $oCache->get($iId)))
		{			
			$aRows = Phpfox::getLib('database')->select('s.type_id, s.var_name, s.value_actual, m.module_id AS module_name')
				->from(Phpfox::getT('setting'), 's')
				->join(Phpfox::getT('module'), 'm', 'm.module_id = s.module_id AND m.is_active = 1')
				->execute('getRows');				

			foreach ($aRows as $iKey => $aRow)
			{
				// Remove unactive module settings
				if (!empty($aRow['module_name']) && !Phpfox::isModule($aRow['module_name']))
				{					
					unset($aRows[$iKey]);
					continue;
				}
				
				if ($aRow['var_name'] == 'allowed_html')
				{
			        $aHtmlTags = array();
			        $sAllowedTags = $aRow['value_actual'];
			        preg_match_all("/<(.*?)>/i", $sAllowedTags, $aMatches);	
					if (isset($aMatches[1]))
					{			
						foreach ($aMatches[1] as $sHtmlTag)
						{
							$aHtmlParts = explode(' ', $sHtmlTag);
							$sHtmlTag = trim($aHtmlParts[0]);
							$aHtmlTags[$sHtmlTag] = true;
						}			
					}					
					
					$aRows[$iKey]['value_actual'] = $aHtmlTags;
				}
				
				if ($aRow['var_name'] == 'session_prefix')
				{
					$aRows[$iKey]['value_actual'] = $aRow['value_actual'] . substr($this->_aParams['core.salt'], 0, 2) . substr($this->_aParams['core.salt'], -2);
				}

				if ($aRow['var_name'] == 'description' || $aRow['var_name'] == 'keywords')
				{
					$aRows[$iKey]['value_actual'] = strip_tags($aRow['value_actual']);
					$aRows[$iKey]['value_actual'] = str_replace(array("\n", "\r"), "", $aRows[$iKey]['value_actual']);					
				}
				
				// Lets set the correct type
				switch ($aRow['type_id'])
				{
					case 'boolean':
						if (strtolower($aRows[$iKey]['value_actual']) == 'true' || strtolower($aRows[$iKey]['value_actual']) == 'false')
						{
							$aRows[$iKey]['value_actual'] = (strtolower($aRows[$iKey]['value_actual']) == 'true' ? '1' : '0');
						}						
						settype($aRows[$iKey]['value_actual'], 'boolean');
						break;
					case 'integer':
						settype($aRows[$iKey]['value_actual'], 'integer');
						break;
					case 'array':
						if (!empty($aRow['value_actual']))
						{
							// Fix unserialize sting length depending on the database driver					
							$aRow['value_actual'] = preg_replace("/s:(.*):\"(.*?)\";/ise", "'s:'.strlen('$2').':\"$2\";'", $aRow['value_actual']);			
						
							eval("\$aRows[\$iKey]['value_actual'] = ". unserialize(trim($aRow['value_actual'])) . "");
						}
						
						if ($aRow['var_name'] == 'global_genders')
						{
							$aTempGenderCache = $aRows[$iKey]['value_actual'];
							$aRows[$iKey]['value_actual'] = array();
							foreach ($aTempGenderCache as $aGender)
							{
								$aGenderExplode = explode('|', $aGender);	
								$aRows[$iKey]['value_actual'][$aGenderExplode[0]] = array($aGenderExplode[1], $aGenderExplode[2], (isset($aGenderExplode[3]) ? $aGenderExplode[3] : null), (isset($aGenderExplode[4]) ? $aGenderExplode[4] : null));
							}
						}
						break;
					case 'drop':
						// Get the default value from a drop-down setting
						$aCacheArray = unserialize($aRow['value_actual']);
						$aRows[$iKey]['value_actual'] = $aCacheArray['default'];
						unset($aCacheArray);						
						break;
					case 'large_string':
						// $aRows[$iKey]['value_actual'] = preg_replace('/\{phrase var=\'(.*)\'\}/i', "' . Phpfox::getPhrase('\\1') . '", $aRow['value_actual']);
						break;
				}				
			}
			
			$oCache->save($iId, $aRows);	
		}		

		foreach ($aRows as $aRow)
		{
			$this->_aParams[$aRow['module_name'] . '.' . $aRow['var_name']] = $aRow['value_actual'];
		}
		
		// Check if the browser supports GZIP
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']))
		{
			$this->_aParams['core.gzip_encodings'] = explode(',', strtolower(preg_replace("/\s+/", "", $_SERVER['HTTP_ACCEPT_ENCODING'])));
			if ((!in_array('gzip', $this->_aParams['core.gzip_encodings']) || !in_array('x-gzip', $this->_aParams['core.gzip_encodings']) || !isset($_SERVER['---------------'])) && !function_exists('ob_gzhandler') && ini_get('zlib.output_compression') && headers_sent()) 
			{		
				$this->_aParams['core.use_gzip'] = false;
			}
		}		
		else 
		{
			$this->_aParams['core.use_gzip'] = false;
		}				
		
		// Make sure we set the correct cookie domain in case the admin did not
		if ($this->_aParams['core.url_rewrite'] == '3' && empty($this->_aParams['core.cookie_domain']))
		{
			$this->_aParams['core.cookie_domain'] = preg_replace("/(.*?)\.(.*?)$/i", ".$2", $_SERVER['HTTP_HOST']);			
		}		
		
		$this->_aParams['core.theme_session_prefix'] = '';	
		$this->_aParams['core.load_jquery_from_google_cdn'] = false;
	}
	
	/**
	 * Get a setting and its value.
	 *
	 * @param mixed $mVar STRING name of the setting or ARRAY name of the setting.
	 * @param string $sDef Default value in case the setting cannot be found.
	 * @return nixed Returns the value of the setting, which can be a STRING, ARRAY, BOOL or INT.
	 */
	public function getParam($mVar, $sDef = '')
	{		
		if ($mVar == 'core.wysiwyg' && !defined('PHPFOX_INSTALLER') && Phpfox::isMobile())
		{
			return 'default';
		}		
		
		if (is_array($mVar))
		{
			$sParam = (isset($this->_aParams[$mVar[0]][$mVar[1]]) ? $this->_aParams[$mVar[0]][$mVar[1]] : (isset($this->_aDefaults[$mVar[0]][$mVar[1]]) ? $this->_aDefaults[$mVar[0]][$mVar[1]] : Phpfox_Error::trigger('Missing Param: ' . $mVar[0] . '][' . $mVar[1])));
		}
		else 
		{
			$sParam = (isset($this->_aParams[$mVar]) ? $this->_aParams[$mVar] : (isset($this->_aDefaults[$mVar]) ? $this->_aDefaults[$mVar] : Phpfox_Error::trigger('Missing Param: ' . $mVar)));
			
			if (!defined('PHPFOX_INSTALLER') && ($mVar == 'core.footer_bar_site_name' || $mVar == 'core.site_copyright'))
			{
				$sParam = Phpfox::getLib('locale')->convert($sParam);	
			}			
			
			if ($mVar == 'admincp.admin_cp')
			{
				$sParam = strtolower($sParam);
			}			
		}
		
		if ($mVar == 'core.wysiwyg' && !defined('PHPFOX_INSTALLER') && $sParam == 'tiny_mce' && !Phpfox::isModule('tinymce'))
		{
			return 'default';
		}
		
		return $sParam;
	}	
	
	/**
	 * Checks to see if a setting exists or not.
	 *
	 * @param string $mVar Name of the setting.
	 * @return bool TRUE it exists, FALSE if it does not.
	 */
	public function isParam($mVar)
	{
		return (isset($this->_aParams[$mVar]) ? true : false);
	}
}