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
 * @version 		$Id: installer.class.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */
class Phpfox_Installer
{
	private $_oTpl = null;
	private $_oReq = null;
	private $_sUrl = 'install';
	private $_bUpgrade = false;
	
	private static $_aPhrases = array();
	
	private $_aSteps = array(
		'license',
		'requirement',
		'configuration',
		'process',		
		'import',
		'language',
		'module',
		'post',
		'final',
		'completed'
	);
	
	private $_aModuleInstalls = array(
		'video'
	);
	
	private $_aVersions = array(
		'1.6.21',
		'2.0.0rc1',
		'2.0.0rc2',
		'2.0.0rc3',
		'2.0.0rc4',
		'2.0.0rc5',
		'2.0.0rc6',
		'2.0.0rc7',
		'2.0.0rc8',
		'2.0.0rc9',
		'2.0.0rc10',
		'2.0.0rc11',
		'2.0.0rc12',
		'2.0.0',
		'2.0.1',
		'2.0.2',
		'2.0.3',
		'2.0.4',
		'2.0.5dev1',
		'2.0.5dev2',
		'2.0.5',
		'2.0.6',
		'2.0.7',
		'2.1.0beta1',
		'2.1.0beta2',
		'2.1.0rc1',
		'2.1.0',
		'3.0.0beta1',
		'3.0.0beta2',
		'3.0.0beta3',
		'3.0.0beta4',
		'3.0.0beta5',
		'3.0.0rc1',
		'3.0.0rc2',
		'3.0.0rc3',
		'3.0.0',
		'3.0.1'
	);
	
	private $_sTempDir = '';
	
	private $_sSessionFile = '';
	
	private $_hFile = null;
	
	private $_aOldConfig = array();
	
	private $_sPage = '';
	
	private static $_sSessionId = null;
	
	public function __construct()
	{	
		$this->_oTpl = Phpfox::getLib('template');
		$this->_oReq = Phpfox::getLib('request');
		$this->_oUrl = Phpfox::getLib('url');		
		
		$this->_sTempDir = Phpfox::getLib('file')->getTempDir();		
		$this->_sPage = $this->_oReq->get('page');		
		$this->_sUrl = ($this->_oReq->get('req1') == 'upgrade' ? 'upgrade' : 'install');
		self::$_sSessionId = ($this->_oReq->get('sessionid') ? $this->_oReq->get('sessionid') : uniqid());		
		
		if ($this->_sUrl == 'upgrade')
		{
			$this->_bUpgrade = true;			
			
			if (file_exists(PHPFOX_DIR . 'include' . PHPFOX_DS . 'settings' . PHPFOX_DS . 'server.sett.php'))
			{
				require_once(PHPFOX_DIR . 'include' . PHPFOX_DS . 'settings' . PHPFOX_DS . 'server.sett.php');
				
				$this->_aOldConfig = $_CONF;
			}
		}	
						
		if (!Phpfox::getLib('file')->isWritable($this->_sTempDir))
		{
			if (PHPFOX_SAFE_MODE)
			{
				$this->_sTempDir = PHPFOX_DIR_FILE . 'log' . PHPFOX_DS;	
				if (!Phpfox::getLib('file')->isWritable($this->_sTempDir))
				{
					exit('Unable to write to temporary folder: ' . $this->_sTempDir);		
				}
			}
			else 
			{
				exit('Unable to write to temporary folder: ' . $this->_sTempDir);
			}
		}
		
		$this->_sSessionFile = $this->_sTempDir . 'installer_' . ($this->_bUpgrade ? 'upgrade_' : '') . '_' . self::$_sSessionId . '_' . 'phpfox.log';		
			
		$this->_hFile = fopen($this->_sSessionFile, 'a');
		
		if ($this->_sUrl == 'install' && $this->_oReq->get('req2') == '')
		{			
			if (file_exists(PHPFOX_DIR_SETTING . 'server.sett.php'))
			{
				require(PHPFOX_DIR_SETTING . 'server.sett.php');
				
				if (isset($_CONF['core.is_installed']) && $_CONF['core.is_installed'] === true)
				{
					$this->_oUrl->forward('../install/index.php?' . PHPFOX_GET_METHOD . '=/upgrade/');
				}
			}
			
			if (file_exists(PHPFOX_DIR . 'include' . PHPFOX_DS . 'settings' . PHPFOX_DS . 'server.sett.php'))
			{				
				$this->_oUrl->forward('../install/index.php?' . PHPFOX_GET_METHOD . '=/upgrade/');
			}
		}	
		
		if ($this->_bUpgrade)
		{
			$this->_aSteps = array(
				'license',
				'requirement',
				'update',
				'completed'
			);
		}
		
		// Define some needed params
		Phpfox::getLib('setting')->setParam(array(
				'core.path' => self::getHostPath() . 'install/',
				'core.url_static_script' => self::getHostPath() . 'static/jscript/',
				'core.url_static_css' => self::getHostPath() . 'static/style/',
				'core.url_static_image' => self::getHostPath() . 'static/image/',
				'sCookiePath' => '/',
				'sCookieDomain' => '',
				'sWysiwyg' => false,
				'bAllowHtml' => false,
				'core.url_rewrite' => '2'
			)
		);
		
		$sLanguageFile = PHPFOX_DIR_XML . 'installer' . PHPFOX_XML_SUFFIX;
		
		if (!file_exists($sLanguageFile))
		{
			Phpfox_Error::trigger('Unable to load locale language package: ' . $sLanguageFile, E_USER_ERROR);
		}
		
		// Cache language file
		$bCache = false;
		$sCacheFile = PHPFOX_DIR_CACHE . 'installer_language.php';
		if (Phpfox::getLib('file')->isWritable(PHPFOX_DIR_CACHE) && file_exists($sCacheFile))		
		{
			$bCache = true;	
		}
				
		if ($bCache === false)
		{
			$aPhrases = Phpfox::getLib('xml.parser')->parse($sLanguageFile);
			foreach ($aPhrases['phrases']['phrase'] as $aPhrase)
			{
				self::$_aPhrases[$aPhrase['var_name']] = $aPhrase['value'];
			}
			
			if (Phpfox::getLib('file')->isWritable(PHPFOX_DIR_CACHE))
			{
				$sData = '<?php' . "\n";
				$sData .= 'self::$_aPhrases = ';
				$sData .= var_export(self::$_aPhrases, true);
				$sData .= ";\n" . '?>';
				Phpfox::getLib('file')->writeToCache('installer_language.php', $sData);
			}
		}
		else 
		{
			require_once($sCacheFile);
		}
	}
	
	public static function getSessionId()
	{
		return self::$_sSessionId;
	}
	
	public static function getHostPath()
	{
    	$sScriptPath = $_SERVER['PHP_SELF'];
        $sSubfolder = dirname(substr($sScriptPath, 0, strrpos($sScriptPath, '/'))).'/';
        if ($sSubfolder == '//' or $sSubfolder == '\/')
        {
        	$sSubfolder = '/';
		}

		return 'http://' . $_SERVER['HTTP_HOST'] . $sSubfolder;	
	}
	
	public static function getPhrase($sVar)
	{		
		return (isset(self::$_aPhrases[$sVar]) ? self::$_aPhrases[$sVar] : '');
	}
	
	public function run()
	{		
		if ($this->_bUpgrade 
				&& (int) substr($this->_getCurrentVersion(), 0, 1) < 2
				&& file_exists(PHPFOX_DIR . '.htaccess')
			)
		{
			$sHtaccessContent = file_get_contents(PHPFOX_DIR . '.htaccess');
			if (preg_match('/RewriteEngine/i', $sHtaccessContent))
			{
				exit('In order for us to continue with the upgrade you will need to rename or remove the file ".htaccess".');
			}
		}		
		
		$sStep = ($this->_oReq->get('req2') ? strtolower($this->_oReq->get('req2')) : 'license');

		$this->_oTpl->setTitle(self::getPhrase('phpfox_installer'))->setBreadcrumb(self::getPhrase('phpfox_installer'));		
		
		$bPass = false;
		if (!in_array($sStep, $this->_aSteps))
		{
			if (in_array($sStep, $this->_aModuleInstalls))
			{
				$bPass = true;	
			}
			else 
			{
				exit('Invalid step.');
			}
		}

		$sMethod = '_' . $sStep;
		
		$iStep = 0;
		foreach ($this->_aSteps as $iKey => $sMyStep)
		{
			if ($sMyStep === $sStep)
			{
				$iStep = ($iKey - 1);
				break;
			}
		}		

		if ($bPass === false && isset($this->_aSteps[$iStep]) && !$this->_isPassed($this->_aSteps[$iStep]))
		{
			$this->_oUrl->forward($this->_step($this->_aSteps[$iStep]));
		}
		
		$this->_sStep = $sStep;
		
		if (method_exists($this, $sMethod))
		{			
			call_user_func(array(&$this, $sMethod));
		}	
		else 
		{
			$sStep = 'key';
		}
		
		if (PHPFOX_DEBUG)
		{
			$this->_oTpl->setHeader(array('debug.css' => 'style_css'));
		}	
		
		if (!file_exists($this->_oTpl->getLayoutFile($sStep)))
		{
			$sStep = 'default';
		}
	
		list($aBreadCrumbs, $aBreadCrumbTitle) = $this->_oTpl->getBreadCrumb();
		
		$this->_oTpl->setImage(array(
				'ajax_small' => 'ajax/small.gif',
				'ajax_large' => 'ajax/large.gif',
				'loading_animation' => 'misc/loading_animation.gif',
				'close' => 'misc/close.gif'
			)
		);		
		
		$this->_oTpl->setHeader(array(
					'<link rel="shortcut icon" type="image/x-icon" href="' . Phpfox_Installer::getHostPath() . 'favicon.ico" />',
					'layout.css' => 'style_css',			
					'thickbox.css' => 'style_css',					
					'jquery/jquery.js' => 'static_script',
					'common.js' => 'static_script',
					'main.js' => 'static_script',				
					'thickbox/thickbox.js' => 'static_script'
				)
			)
			->assign(array(
				'sTemplate' => $sStep,
				'sLocaleDirection' => 'ltr',
				'sLocaleCode' => 'en',
				'sUrl' => $this->_sUrl,
				'aErrors' => Phpfox_Error::get(),
				'sPublicMessage' => Phpfox::getMessage(),
				'aBreadCrumbs' => $aBreadCrumbs,
				'aBreadCrumbTitle' => $aBreadCrumbTitle,
				'aSteps' => $this->_getSteps()
			)
		);
		
		if ($this->_bUpgrade)
		{
			$this->_oTpl->setTitle('Upgrading from: ' . $this->_getCurrentVersion());
		}
		
		header("X-Content-Encoded-By: phpFox " . PhpFox::getVersion());
		
		$this->_oTpl->getLayout('template');
		
		Phpfox::clearMessage();
	}	
	
	########################
	# Special Module Install Routines
	########################	
	
	private function _video($bInstall = false)
	{
		$sFfmpeg = '';
		$sMencoder = '';
		$iPass = 0;
		if (!PHPFOX_SAFE_MODE)
		{
			if (($aVals = $this->_oReq->getArray('val')))
			{						
				if (!empty($aVals['ffmpeg']))
				{
					exec($aVals['ffmpeg'] . ' 2>&1', $aOutput);
					
					if (preg_match("/FFmpeg version/", $aOutput[0]))
					{
						if ($bInstall === true)
						{
							$this->_db()->update(Phpfox::getT('setting'), array('value_actual' => $aVals['ffmpeg']), 'module_id = \'video\' AND var_name = \'ffmpeg_path\'');
						}
						else 
						{
							$_SESSION[Phpfox::getParam('core.session_prefix')]['installer_ffmpeg'] = $aVals['ffmpeg'];
						}
						
						$iPass++;
					}
					else 
					{
						Phpfox_Error::set($aOutput[0]);
					}
					unset($aOutput);
				}
				
				if (!empty($aVals['mencoder']))
				{
					exec($aVals['mencoder'] . ' 2>&1', $aOutput);
					
					if (preg_match("/MPlayer Team/", $aOutput[0]))
					{
						if ($bInstall === true)
						{
							$this->_db()->update(Phpfox::getT('setting'), array('value_actual' => $aVals['mencoder']), 'module_id = \'video\' AND var_name = \'mencoder_path\'');
						}
						else 
						{
							$_SESSION[Phpfox::getParam('core.session_prefix')]['installer_mencoder'] = $aVals['mencoder'];
						}
						
						$iPass++;
					}
					else 
					{
						Phpfox_Error::set($aOutput[0]);
					}				
					unset($aOutput);
				}			
			}
			
			if (PHP_OS == 'Linux')
			{
				$sOutput = shell_exec('whereis ffmpeg 2>&1');			
				$aOutput = explode("\n", $sOutput);	
				if (isset($aOutput[0]))
				{
					$aParts = explode('ffmpeg:', $aOutput[0]);
					if (isset($aParts[1]))
					{
						$aSubParts = explode(' ', trim($aParts[1]));
						if (isset($aSubParts[0]) && !empty($aSubParts[0]))
						{
							if (PHPFOX_OPEN_BASE_DIR || (!PHPFOX_OPEN_BASE_DIR && file_exists($aSubParts[0])))
							{
								$sFfmpeg = $aSubParts[0];
							}
							
						}
					}				
				}
				unset($aOutput);
				
				$sOutput = shell_exec('whereis mencoder 2>&1');
				$aOutput = explode("\n", $sOutput);
				if (isset($aOutput[0]))
				{
					$aParts = explode('mencoder:', $aOutput[0]);
					if (isset($aParts[1]))
					{
						$aSubParts = explode(' ', trim($aParts[1]));
						if (isset($aSubParts[0]) && !empty($aSubParts[0]))
						{
							if (PHPFOX_OPEN_BASE_DIR || (!PHPFOX_OPEN_BASE_DIR && file_exists($aSubParts[0])))
							{
								$sMencoder = $aSubParts[0];
							}
							
						}
					}				
				}
				unset($aOutput);			
			}
		}
		
		if (!empty($_SESSION[Phpfox::getParam('core.session_prefix')]['installer_ffmpeg']))
		{
			$sFfmpeg = $_SESSION[Phpfox::getParam('core.session_prefix')]['installer_ffmpeg'];			
		}		
		
		if (!empty($_SESSION[Phpfox::getParam('core.session_prefix')]['installer_mencoder']))
		{
			$sMencoder = $_SESSION[Phpfox::getParam('core.session_prefix')]['installer_mencoder'];			
		}			
		
		$aForms = array(
			'ffmpeg' => $sFfmpeg,
			'mencoder' => $sMencoder
		);
		
		return $aForms;
	}
	
	########################
	# Install/Upgrade Steps
	########################		
	
	private function _key()
	{		
		if (file_exists($this->_sSessionFile))
		{
			fclose($this->_hFile);
			
			@unlink($this->_sSessionFile);
			
			$this->_hFile = fopen($this->_sSessionFile, 'a');			
		}
		
		unset($_SESSION[Phpfox::getParam('core.session_prefix')]['installer']);
		
		if (defined('PHPFOX_SKIP_INSTALL_KEY'))
		{
			$this->_pass('license');	
		}
		
		$oApi = Phpfox::getLib('phpfox.api');
		$oValid = Phpfox::getLib('validator')->set(array('sFormName' => 'js_form', 'aParams' => array(
					'email' => array(			
						'def' => 'email',
						'title' => 'Enter a valid email.'
					),
					'password' => 'Enter your password.'
				)
			)
		);		
		
		if ($this->_oReq->get('skip'))
		{
			$this->_pass('license');	
		}
		
		if ($aVals = $this->_oReq->getArray('val'))
		{
			if ($oValid->isValid($aVals))
			{
				// Connect to phpFox and verify the license				
				if ($oApi->send('clientVerification', $aVals))
				{
					$this->_pass('license');
				}
				else 
				{
					$this->_oTpl->assign(array(
							'sError' => $oApi->getError()
						)
					);					
				}
			}
		}
		else 
		{
			if (!$oApi->send('domainVerification'))
			{	
				$this->_oTpl->assign(array(
						'bFailed' => true
					)
				);
			}
		}		
		
		$this->_oTpl->setTitle('Client Verification')
			->setBreadcrumb('Client Verification')
			->assign(array(
				'sCreateJs' => $oValid->createJS(),
				'sGetJsForm' => $oValid->getJsForm(),
				'bHasCurl' => (function_exists('curl_init') ? true : false)		
			)
		);	
	}
	
	private function _license()
	{		
		if ($this->_oReq->get('agree'))
		{
			$this->_pass('requirement');
		}
		
		$this->_oTpl->assign(array(
				'bIsUpgrade' => ($this->_sUrl == 'upgrade' ? true : false)
			)
		);
	}
	
	private function _requirement()
	{
		$bIsPassed = true;
		
		$aVerify = array(
			'php_version' => (version_compare(phpversion(), '5', '<') !== true ? true : false),
			'php_xml_support' => (function_exists('xml_set_element_handler') ? true : false),
			'php_gd' => ((extension_loaded('gd') && function_exists('gd_info')) ? true : false)
		);
				
		foreach ($aVerify as $sCheck => $bPassed)
		{
			if ($bPassed === false)
			{
				$bIsPassed = false;
				break;
			}
		}				
		
		$aDrivers = Phpfox::getLib('database.support')->getSupported();
		$aDbChecks = array();
		$iDbs = 0;
		foreach ($aDrivers as $aDriver)
		{
			$aDbChecks[$aDriver['label']] = $aDriver['available'];
			if ($aDriver['available'])
			{
				$iDbs++;
			}
		}		
		
		if (!$iDbs)
		{
			$bIsPassed = false;
		}
		
		$oFile = Phpfox::getLib('file');
		$aFileChecks = array();		
		$aModuleLists = Phpfox::getLib('module')->getModuleFiles();		
		$aModules = array_merge($aModuleLists['core'], $aModuleLists['plugin']);
		
		$bNoLoadFail = false;
		$aModuleHistory = array();
		foreach ($aModules as $aModule)
		{
			$sModule = $aModule['name'];
			if (!file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php'))			
			{
				continue;
			}
			
			$aLines = file(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php');
			foreach ($aLines as $sLine)
			{
				$sLine = trim($sLine);
				if (substr($sLine, 0, 5) == 'class')
				{
					$sLine = str_replace('class Module_', '', $sLine);
					
					if (isset($aModuleHistory[$sLine]))
					{
						Phpfox_Error::set('We found modules with duplicate class names.<br />"' . PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php"<br />matches<br />"' . $aModuleHistory[$sLine] . '"');
						$bIsPassed = false;
						$bNoLoadFail = true;
						break;
					}
					
					$aModuleHistory[$sLine] = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php';
				}
			}
			
		}		
		
		if (!$bNoLoadFail)
		{
			$sFiles = '';		
			foreach ($aModules as $aModule)
			{		
				if (($aFiles = Phpfox::getLib('module')->init($aModule['name'], 'aInstallWritable')))
				{
					$sFiles .= implode(',', $aFiles) . ',';
				}			
			}
			$sFiles = rtrim($sFiles, ',');
			$aFiles = explode(',', $sFiles);	
			sort($aFiles);	
			foreach ($aFiles as $iKey => $sFile)
			{
				$sFile = str_replace('/', PHPFOX_DS, $sFile);

				if (file_exists(PHPFOX_DIR . $sFile) && $oFile->isWritable(PHPFOX_DIR . $sFile))			
				{
					continue;	
				}

				if (!file_exists(PHPFOX_DIR . $sFile))
				{
					$aFileChecks[$sFile] = true;
					continue;
				}

				if ($sFile == 'include/setting/server.sett.php' && (int) substr($this->_getCurrentVersion(), 0, 1) > 1 && $this->_bUpgrade)
				{
					continue;
				}

				if (!$oFile->isWritable(PHPFOX_DIR . $sFile))
				{
					$aFileChecks[$sFile] = false;		
				}			
			}
		}
		
		if (count($aFileChecks))
		{
			$bIsPassed = false;
		}		
		
		if ($this->_oReq->getArray('val') && $bIsPassed === true)
		{
			if (function_exists('phpinfo'))
			{
				ob_clean();
				
				phpinfo();
				
				$sPhpInfo = ob_get_contents();			
				
	    		$hFile = fopen(PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'phpfox_phpinfo_' . date('d.m.y', PHPFOX_TIME) . '_' . uniqid() . '.php', 'a');
	    		fwrite($hFile, '<?php defined(\'PHPFOX\') or exit(\'NO DICE!\');  ?>' . "\n" . $sPhpInfo);
	    		fclose($hFile);
				
				ob_clean();
			}
			
			$this->_pass(($this->_bUpgrade ? 'update' : 'configuration'));
		}
			
		$aChecks = array(
			'php' => array(
				'title' => 'PHP Version and Settings',
				'passed' => '<strong style="color:green;">Yes</strong>',
				'failed' => '<strong style="color:red;">No</strong>',
				'checks' => array(
					'PHP 5' => $aVerify['php_version'],
					'PHP XML Support' => $aVerify['php_xml_support'],
					'PHP GD Support' => $aVerify['php_gd']
				)
			),
			'database' => array(
				'title' => 'Supported Databases - <a href="#" onclick="return showHiddenTags(this);">view all</a>',
				'passed' => '<strong style="color:green;">Available</strong>',
				'failed' => '<strong style="color:red;">Unavailable</strong>',
				'checks' => $aDbChecks,
				'hide' => true
			),
			'file' => array(
				'title' => 'Files and Directories',
				'passed' => '<strong style="color:red;">Missing</strong>',
				'failed' => '<strong style="color:red;">Unwritable</strong>',
				'checks' => $aFileChecks
			)
		);	
				
		$this->_oTpl->setTitle('Requirement Check')
			->setBreadcrumb('Requirement Check')
			->assign(array(
				'aChecks' => $aChecks,
				'bIsPassed' => $bIsPassed
				)
			);
	}
	
	/**
	 * @todo Oracle is not required to have a host name so we need a fix to check
	 * the host name only if its not oracle.
	 *
	 */
	private function _configuration()
	{
		Phpfox::getLib('cache')->remove();
		
		$aExists = array();
		$aForms = array();
		
		if (defined('PHPFOX_INSTALL_HOST'))
		{
			$aForms['host'] = PHPFOX_INSTALL_HOST;
			$aForms['name'] = PHPFOX_INSTALL_NAME;
			$aForms['user_name'] = PHPFOX_INSTALL_USER;
		}
		
		// Get supported database drivers
		$aDrivers = Phpfox::getLib('database.support')->getSupported(true);

		$oValid = Phpfox::getLib('validator')->set(array('sFormName' => 'js_form', 'aParams' => array(
					'prefix' => 'No database prefix provided.'
				)
			)
		);			
		
		if ($aVals = $this->_oReq->getArray('val'))
		{
			if ($oValid->isValid($aVals))
			{	
				Phpfox::getLibClass('phpfox.database.dba');
				
				$sDriver = 'phpfox.database.driver.' . strtolower(preg_replace("/\W/i", "", $aVals['driver']));
				if (Phpfox::getLibClass($sDriver))
				{
					$oDb = Phpfox::getLib($sDriver);
					
					if ($oDb->connect($aVals['host'], $aVals['user_name'], $aVals['password'], $aVals['name']))
					{						
						// Drop database tables, only if user allows us too
						if (isset($aVals['drop']) && ($aDrops = $this->_oReq->getArray('table')))
						{							
							$oDb->dropTables($aDrops, $aVals);											
						}						
				
						$oDbSupport = Phpfox::getLib('database.support');						
						
						$aTables = $oDbSupport->getTables($aVals['driver'], $oDb);
						
						$aSql = Phpfox::getLib('module')->getModuleTables($aVals['prefix']);						
								
						foreach ($aSql as $sSql)
						{
							if (in_array($sSql, $aTables))
							{
								$aExists[] = $sSql;
							}							
						}						
						
						if (count($aExists))
						{
							Phpfox_Error::set('We have found that the following table(s) already exist:');
						}
						else 
						{						
							$aForms = array_merge($this->_video(), $aForms);
							
							if (Phpfox_Error::isPassed())
							{								
								// Cache modules we need to install
								$sCacheModules = PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php';
								if (file_exists($sCacheModules))
								{
									unlink($sCacheModules);
								}
								$sData = '<?php' . "\n";
								$sData .= '$aModules = ';
								$sData .= var_export($aVals['module'], true);
								$sData .= ";\n?>";
								Phpfox::getLib('file')->write($sCacheModules, $sData);							
								unset($aVals['module']);
								
								if ($this->_saveSettings($aVals))
								{								
									$this->_pass('process');
								}
							}
						}
					}					
				}
			}
		}		
		else 
		{
			$aForms = array_merge($this->_video(), $aForms);			
		}
		
		$aModules = Phpfox::getLib('module')->getModuleFiles();
		sort($aModules['core']);
		sort($aModules['plugin']);
		
		$this->_oTpl->setTitle('Configuration')
			->setBreadcrumb('Configuration')
			->assign(array(
					'aDrivers' => $aDrivers,
					'sCreateJs' => $oValid->createJS(),
					'sGetJsForm' => $oValid->getJsForm(false),
					'aTables' => $aExists,
					'aModules' => $aModules,
					'aForms' => $aForms
				)
			);		
	}
	
	private function _process()
	{		
		Phpfox::getLibClass('phpfox.database.dba');
		
		$sDriver = 'phpfox.database.driver.' . strtolower(preg_replace("/\W/i", "", Phpfox::getParam(array('db', 'driver'))));
		if (Phpfox::getLibClass($sDriver))
		{
			$oDb = Phpfox::getLib($sDriver);
			
			if ($oDb->connect(Phpfox::getParam(array('db', 'host')), Phpfox::getParam(array('db', 'user')), Phpfox::getParam(array('db', 'pass')), Phpfox::getParam(array('db', 'name'))))
			{

			}					
		}		
		
		$oDbSupport = Phpfox::getLib('database.support');
		
		$sCacheModules = PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php';
		if (!file_exists($sCacheModules))
		{
			// Something went wrong...
		}
		
		require_once($sCacheModules);
		
		$oModuleProcess = Phpfox::getService('admincp.module.process');
		
		foreach ($aModules as $iKey => $sModule)
		{
			if ($sModule == 'core')
			{
				unset($aModules[$iKey]);
			}
		}
		
		$aModules = array_merge(array('core'), $aModules);		
				
		foreach ($aModules as $sModule)
		{
			if ($sModule == 'phpfoxsample' || $sModule == 'phpfox')
			{
				continue;
			}			
			
			$oModuleProcess->install($sModule, array(
					'table' => true
				)
			);
		}
		
		$sModuleLog = PHPFOX_DIR_CACHE . 'installer_completed_modules.log';
		if (file_exists($sModuleLog))
		{
			unlink($sModuleLog);
		}
		
		$this->_pass();
		
		$this->_oTpl->assign(array(
				'sMessage' => 'Tables installed...',
				'sNext' => $this->_step('import')
			)
		);
	}
		
	private function _import()
	{
		Phpfox::getLib('phpfox.process')->import(Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_XML . 'version' . PHPFOX_XML_SUFFIX));
		PhpFox::getService('core.country.process')->importForInstall(Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_XML . 'country' . PHPFOX_XML_SUFFIX));
		
		$this->_pass();	
		
		$this->_oTpl->assign(array(
			'sMessage' => 'Imports complete...',
			'sNext' => $this->_step('language')
		));		
	}	
	
	private function _language()
	{		
		$this->_db()->insert(Phpfox::getT('language'), array(		
				'language_id' => 'en',		
				'title' => 'English (US)',
				'user_select' => '1',
				'language_code' => 'en',
				'charset' => 'UTF-8',
				'direction' => 'ltr',
				'flag_id' => 'png',
				'time_stamp' => '1184048203',
				'created' => 'N/A (Core)',
				'site' => '',
				'is_default' => '1',
				'is_master' => '1'
			)
		);	
		Phpfox::getService('language.process')->import(Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_XML . 'installer' . PHPFOX_XML_SUFFIX), 'phpfox_installer', true, true);
		
		$this->_pass();
		
		$this->_oTpl->assign(array(
				'sMessage' => 'Language package imported...',
				'sNext' => $this->_step('module')
			)
		);
	}
	
	private function _module()
	{				
		// Load the cached module list
		$sCacheModules = PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php';
		if (!file_exists($sCacheModules))
		{
			// Something went wrong...
		}		
		require_once($sCacheModules);

		$sModuleLog = PHPFOX_DIR_CACHE . 'installer_completed_modules.log';
		$aInstalled = array();
		if (file_exists($sModuleLog))
		{
			$aLines = file($sModuleLog);
			foreach ($aLines as $sLine)
			{
				$sLine = trim($sLine);
		
				if (empty($sLine))
				{
					continue;
				}

				$aInstalled[$sLine] = true;
			}
		}

		$bInstallAll = (defined('PHPFOX_INSTALL_ALL_MODULES') ? true : false);
		$oModuleProcess = Phpfox::getService('admincp.module.process');
		$hFile = fopen($sModuleLog, 'a+');	
		$iCnt = 0;
		$sMessage = '';
		$sInstalledModule = '';
		foreach ($aModules as $sModule)
		{
			if (isset($aInstalled[$sModule]))
			{
				continue;
			}

			$iCnt++;			
			$sInstalledModule .= $sModule . "\n";
			$sMessage .= "<li>" . $sModule . "</li>";

			$oModuleProcess->install($sModule, array('insert' => true));
		
			if ($bInstallAll === false && $iCnt == 5)
			{
				break;
			}
		}
		fwrite($hFile, $sInstalledModule);
		fclose($hFile);
		
		if ($this->_bUpgrade)
		{
			return ($iCnt === 0 ? true : false);
		}

		// No more modules to install then lets send them to the final step
		if ($iCnt === 0 || defined('PHPFOX_INSTALL_ALL_MODULES'))
		{
			$this->_pass();
			
			unlink($sModuleLog);
			
			$this->_oTpl->assign(array(
					'sMessage' => 'All modules installed...',
					'sNext' => $this->_step('post')
				)
			);
		}
		else 
		{		
			$this->_oTpl->assign(array(
					'sMessage' => 'Installed Module(s): <div class="label_flow" style="height:200px;"><ul>' . $sMessage . '</ul></div>',
					'sNext' => $this->_step('module')
				)
			);	
		}
	}
	
	private function _post()
	{
		// Load the cached module list
		$sCacheModules = PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php';
		if (!file_exists($sCacheModules))
		{
			// Something went wrong...
		}		
		require_once($sCacheModules);		
		
		$oModuleProcess = Phpfox::getService('admincp.module.process');		
		foreach ($aModules as $sModule)
		{		
			$oModuleProcess->install($sModule, array('post_install' => true));			
		}		
		
		$this->_pass();
		$this->_oTpl->assign(array(
				'sMessage' => 'Post install completed...',
				'sNext' => $this->_step('final')
			)
		);
	}
	
	private function _final()
	{
		$aForms = array();
		$aValidation = array(
			'full_name' => 'full_name',
			'email' => array(
				'def' => 'email',
				'title' => 'Provide a valid email.'
			),
			'password' => array(
				'def' => 'password',
				'title' => 'Provide a valid password.'
			),			
			'month' => 'Select month of birth.',
			'day' => 'Select day of birth.',
			'year' => 'Select year of birth.',
			'country_iso' => 'Select current location.',
			'gender' => 'Select your gender.',
			'user_name' => array(
				'def' => 'username',
				'title' => 'Provide a valid user name.'
			)
		);		
		
		$oValid = Phpfox::getLib('validator')->set(array('sFormName' => 'js_form', 'aParams' => $aValidation));			
		
		if ($aVals = $this->_oReq->getArray('val'))
		{			
			Phpfox::getService('user.validate')->user($aVals['user_name'])->email($aVals['email']);
			
			if ($oValid->isValid($aVals))
			{				
				if (($iUserId = Phpfox::getService('user.process')->add($aVals, ADMIN_USER_ID)))
				{
					list($bLogin, $aUser) = Phpfox::getService('user.auth')->login($aVals['email'], $aVals['password'], 'email');
					if ($bLogin || isset($aVals['skip_user_login']))
					{						
						$this->_db()->update(Phpfox::getT('user_field'), array('in_admincp' => PHPFOX_TIME), 'user_id = ' . $iUserId);
						$this->_db()->update(Phpfox::getT('setting'), array('value_actual' => Phpfox::getVersion()), 'var_name = \'phpfox_version\'');
						
						$this->_video(true);
						
						$this->_pass('completed');
					}
				}
			}
		}					
		else 
		{
			$aForms = array_merge($this->_video(), $aForms);			
		}
		
		$this->_oTpl->assign(array(
				'sCreateJs' => $oValid->createJS(),
				'sGetJsForm' => $oValid->getJsForm(false),
				'aForms' => $aForms
			)
		);		
	}
	
	private function _update()
	{
		$aContent = array(
			'action' => $this->_oReq->get('action'),
			'version' => $this->_oReq->get('version'),
			'page' => $this->_oReq->get('page'),
			'time_stamp' => PHPFOX_TIME,
			'ip_address' => Phpfox::getIp()
		);		
		$hFile = fopen(PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'upgrade_' . self::$_sSessionId . '.log', 'w');
		fwrite($hFile, serialize($aContent) . "\n");
		fclose($hFile);
		
		$sNext = $this->_oReq->get('next');
		if (!empty($sNext))
		{
			$sNext = str_replace('-', '.', $sNext);
		}
		
		$sMessage = '';		
		foreach ($this->_aVersions as $iKey => $sVersion)
		{
			if (isset($bStopNextVersion) || (!empty($sNext) && $sNext == $sVersion))
			{
				if (file_exists(PHPFOX_DIR_INSTALL . 'include' . PHPFOX_DS . 'version' . PHPFOX_DS . $sVersion . '.php'))
				{
					require_once(PHPFOX_DIR_INSTALL . 'include' . PHPFOX_DS . 'version' . PHPFOX_DS . $sVersion . '.php');
					
					if ($bCompleted === true)
					{
						if (isset($this->_aVersions[($iKey + 1)]))
						{
							$this->_oTpl->assign(array(
									'sMessage' => 'Upgrade to ' . $sVersion . ' completed. Next version is ' . $this->_aVersions[($iKey + 1)] . '.',
									'sNext' => $this->_step(array(
											'update',
											'version' => str_replace('.', '-', $sVersion),
											'next' => str_replace('.', '-', $this->_aVersions[($iKey + 1)])
										)
									)
								)
							);
						}
						else 
						{
							$this->_pass('completed');
						}
					}
				}
				else 
				{
					$sMessage = 'You are not upgrading from a valid version. You must have v1.6.21 or higher installed. If you are using an older version you can use the upgrade script provided with the v1.6.21 package.';
				}
					
				break;
			}
			
			if (empty($sNext) && $sVersion == $this->_getCurrentVersion())
			{				
				$bStopNextVersion = true;
			}
		}
		
		if (!isset($bCompleted))
		{
			$this->_oTpl->assign(array(
					'sMessage' => $sMessage			
				)
			);		
		}
	}	
	
	private function _completed()
	{		
		if (Phpfox::getLib('file')->isWritable(PHPFOX_DIR_SETTING . 'server.sett.php'))
		{
			$sContent = file_get_contents(PHPFOX_DIR_SETTING . 'server.sett.php');	
			$sContent = preg_replace("/\\\$_CONF\['core.is_installed'\] = (.*?);/i", "\\\$_CONF['core.is_installed'] = true;", $sContent);
			if ($hServerConf = @fopen(PHPFOX_DIR_SETTING . 'server.sett.php', 'w'))
			{
	            fwrite($hServerConf, $sContent);
	            fclose($hServerConf);
			}			
		}
		
		if (!defined('PHPFOX_SKIP_INSTALL_KEY'))
		{
			$oApi = Phpfox::getLib('phpfox.api');
			if ($oApi->send('brandingRemoval'))
			{
				Phpfox::getLib('database')->update(Phpfox::getT('setting'), array('value_actual' => '1'), "var_name = 'branding'");
			}		
		}
		
		$this->_db()->update(Phpfox::getT('setting'), array('value_actual' => Phpfox::getVersion()), 'var_name = \'phpfox_version\'');
		
		if ($this->_bUpgrade)
		{			
			$iCurrentVersion = $this->_getCurrentVersion();
			
			if (!$this->_db()->select('COUNT(*)')
				->from(Phpfox::getT('install_log'))
				->where('is_upgrade = 1 AND version_id = \'' . $iCurrentVersion . '\' AND upgrade_version_id = \'' . Phpfox::getVersion() . '\'')
				->execute('getField')
			)
			{			
				$this->_db()->insert(Phpfox::getT('install_log'), array(
						'is_upgrade' => '1',
						'version_id' => $this->_getCurrentVersion(),
						'upgrade_version_id' => Phpfox::getVersion(),
						'time_stamp' => PHPFOX_TIME,
						'ip_address' => Phpfox::getIp()
					)
				);
			}
		}
		else 
		{
			if (!$this->_db()->select('COUNT(*)')
				->from(Phpfox::getT('install_log'))
				->where('is_upgrade = 0 AND version_id = \'' . Phpfox::getVersion() . '\' AND ' . $this->_db()->isNull('upgrade_version_id') . '')
				->execute('getField')
			)
			{
				$this->_db()->insert(Phpfox::getT('install_log'), array(
						'version_id' => Phpfox::getVersion(),
						'time_stamp' => PHPFOX_TIME,
						'ip_address' => Phpfox::getIp()
					)
				);			
			}
		}
		
		Phpfox::getLib('cache')->remove();	
		
		$this->_oTpl->assign(array(
				'bIsUpgrade' => $this->_bUpgrade,
				'sUpgradeVersion' => Phpfox::getVersion()
			)
		);		
	}	
	
	########################
	# Private Methods
	########################
	
	private function _getCurrentVersion()
	{
		static $sVersion = null;

		if ($sVersion !== null)
		{
			return $sVersion;
		}

		if ($this->_sUrl == 'install')
		{
			return Phpfox::getVersion();
		}

		$bIsLegacy = true;
		if (file_exists(PHPFOX_DIR . 'include' . PHPFOX_DS . 'setting' . PHPFOX_DS . 'server.sett.php'))
		{
			require(PHPFOX_DIR . 'include' . PHPFOX_DS . 'setting' . PHPFOX_DS . 'server.sett.php');

			if ($_CONF['core.is_installed'] === true)
			{
				$aRow = Phpfox::getLib('database')->select('value_actual')->from(Phpfox::getT('setting'))->where('var_name = \'phpfox_version\'')->execute('getRow');
				if (isset($aRow['value_actual']))
				{
					$sVersion = $aRow['value_actual'];

					return $aRow['value_actual'];
				}
			}
		}

		if (file_exists(PHPFOX_DIR . 'include' . PHPFOX_DS . 'settings' . PHPFOX_DS . 'version.php'))
		{
			require_once(PHPFOX_DIR . 'include' . PHPFOX_DS . 'settings' . PHPFOX_DS . 'version.php');

			$sVersion = $_CONF['info.version'];

			return $_CONF['info.version'];
		}
		else
		{
			$aRow = Phpfox::getLib('database')->select('value_actual')->from(Phpfox::getT('setting'))->where('var_name = \'phpfox_version\'')->execute('getRow');
			if (isset($aRow['value_actual']))
			{
				$sVersion = $aRow['value_actual'];

				return $aRow['value_actual'];
			}
		}

		return Phpfox_Error::set('Unknown version.', E_USER_ERROR);
	}
	
	/**
	* @todo We need to work on this routine, not working very well.
	*/	
	private function _isPassed($sStep)
	{		
		$aFile = file($this->_sSessionFile);
		foreach ($aFile as $sLine)
		{
			$sLine = trim($sLine);			
			
			if (empty($sLine))
			{
				continue;
			}
			
			if ($sLine == $sStep)
			{
				return true;
			}
		}
		
		exit('Failed');
		
		return false;		
	}
	
	private function _pass($sForward = null)
	{
		fwrite($this->_hFile, "\n" . $this->_sStep);
		
		if ($sForward !== null)
		{
			fclose($this->_hFile);
			
			$this->_oUrl->forward($this->_step($sForward));
		}
		
		fclose($this->_hFile);
		
		return true;
	}
	
	private function _getOldT($sTable)
	{
		return (isset($this->_aOldConfig['db']['prefix']) ? $this->_aOldConfig['db']['prefix'] : '') . $sTable;
	}
	
	private function _db()
	{
		return Phpfox::getLib('database');
	}
	
	private function _step($aParams)
	{
		if (is_array($aParams))
		{
			$aParams['sessionid'] = self::$_sSessionId;
		}
		else 
		{
			$aParams = array($aParams, 'sessionid' => self::$_sSessionId);
		}
		
		return $this->_oUrl->makeUrl($this->_sUrl, $aParams);
	}
	
	private function _saveSettings($aVals)
	{
		// Get sub-folder
    	$sScriptPath = $_SERVER['PHP_SELF'];
        $sSubfolder = dirname(substr($sScriptPath, 0, strrpos($sScriptPath, '/'))).'/';
        if ($sSubfolder == '//' or $sSubfolder == '\/')
        {
        	$sSubfolder = '/';
		}		
		
		// Get the settings content
		$sContent = file_get_contents(PHPFOX_DIR_SETTING . 'server.sett.php');	
		
		// Trim and addslashes to each value since we are writing to a file
		foreach ($aVals as $iKey => $sVal)
		{
			$aVals[$iKey] = addslashes(trim($sVal));
		}
		
		$aFind = array(
			"/\\\$_CONF\['db'\]\['driver'\] = (.*?);/i",
			"/\\\$_CONF\['db'\]\['host'\] = (.*?);/i",
			"/\\\$_CONF\['db'\]\['user'\] = (.*?);/i",
			"/\\\$_CONF\['db'\]\['pass'\] = (.*?);/i",					
			"/\\\$_CONF\['db'\]\['name'\] = (.*?);/i",				
			"/\\\$_CONF\['db'\]\['prefix'\] = (.*?);/i",
			"/\\\$_CONF\['db'\]\['port'\] = (.*?);/i",			
			"/\\\$_CONF\['core.host'\] = (.*?);/i",
			"/\\\$_CONF\['core.folder'\] = (.*?);/i",
			"/\\\$_CONF\['core.url_rewrite'\] = (.*?);/i",
			"/\\\$_CONF\['core.salt'\] = (.*?);/i",
			"/\\\$_CONF\['core.cache_suffix'\] = (.*?);/i"
		);
		
		$aReplace = array(
			"\\\$_CONF['db']['driver'] = '{$aVals['driver']}';",
			"\\\$_CONF['db']['host'] = '{$aVals['host']}';",
			"\\\$_CONF['db']['user'] = '{$aVals['user_name']}';",
			"\\\$_CONF['db']['pass'] = '{$aVals['password']}';",
			"\\\$_CONF['db']['name'] = '{$aVals['name']}';",	
			"\\\$_CONF['db']['prefix'] = '" . (!empty($aVals['prefix']) ? $aVals['prefix'] : 'phpfox_') . "';",
			"\\\$_CONF['db']['port'] = '{$aVals['port']}';",			
			"\\\$_CONF['core.host'] = '{$_SERVER['HTTP_HOST']}';",
			"\\\$_CONF['core.folder'] = '{$sSubfolder}';",
			"\\\$_CONF['core.url_rewrite'] = '" . ((isset($aVals['rewrite']) && $aVals['rewrite'] === true) ? '1' : '2') . "';",
			"\\\$_CONF['core.salt'] = '" . md5(uniqid(rand(), true)) . "';",
			"\\\$_CONF['core.cache_suffix'] = '.php';"
		);
		
		$sContent = preg_replace($aFind, $aReplace, $sContent);

		if ($hServerConf = @fopen(PHPFOX_DIR_SETTING . 'server.sett.php', 'w'))
		{
            fwrite($hServerConf, $sContent);
            fclose($hServerConf);
            
            return true;
		}	
		
		return Phpfox_Error::set('Unable to open config file.');
	}
	
	private function _getSteps()
	{
		$aSteps = array();
		$iCnt = 0;
		foreach ($this->_aSteps as $sStep)
		{
			$sStepName = $sStep;
			switch ($sStep)
			{
				case 'key':
					$sStepName = 'Verification';
					break;
				case 'license':
					$sStepName = 'License Agreement';
					break;	
				case 'requirement':
					$sStepName = 'Requirement Check';
					break;	
				case 'update':
					$sStepName = 'Updates';
					break;	
				case 'completed':
					$sStepName = 'Completed';
					break;	
				case 'configuration':
					$sStepName = 'Configuration';
					break;
				case 'process':
					$sStepName = 'Preparing Installation';
					break;
				case 'import':
					$sStepName = 'Importing Data';
					break;
				case 'language':
					$sStepName = 'Installing Default Language';
					break;	
				case 'module':
					$sStepName = 'Installing Modules';
					break;		
				case 'post':
					$sStepName = 'Checking Install';
					break;	
				case 'final':
					$sStepName = 'Create an Admin';
					break;	
			}
			
			$iCnt++;
			$aSteps[] = array(
				'name' => $sStepName,
				'is_active' => ($this->_sStep == $sStep ? true : false),
				'count' => $iCnt
			);	
		}		
		
		return $aSteps;
	}
	
	private function _upgradeDatabase($sVersion)
	{
		if ((int) substr($this->_getCurrentVersion(), 0, 1) <= 1)
		{
			return;
		}
		
		define('PHPFOX_UPGRADE_MODULE_XML', true);
		
		$hDir = opendir(PHPFOX_DIR_MODULE);
		while ($sModule = readdir($hDir))
		{
			if ($sModule == '.' || $sModule == '..')
			{
				continue;
			}
			
			if ($sModule == 'phpfox')
			{
				continue;
			}
			
			if (file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'phpfox.xml.php'))
			{
				$aModule = Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'phpfox.xml.php');
				
				if (isset($aModule['tables']))
				{
					$oPhpfoxDatabaseExport = Phpfox::getLib('database.support');
					$aTables = unserialize(trim($aModule['tables']));		
					$sQueries = Phpfox::getLib('database.export')->process(Phpfox::getParam(array('db', 'driver')), $aTables);
					$aDriver = $oPhpfoxDatabaseExport->getDriver(Phpfox::getParam(array('db', 'driver')));
					
					$sQueries = preg_replace('#phpfox_#i', Phpfox::getParam(array('db', 'prefix')), $sQueries);
						
					if ($aDriver['comments'] == 'remove_comments')
					{
						$oPhpfoxDatabaseExport->removeComments($sQueries);
					}
					else 
					{
						$oPhpfoxDatabaseExport->removeRemarks($sQueries);
					}
						
					$aSql = $oPhpfoxDatabaseExport->splitSqlFile($sQueries, $aDriver['delim']);		
					
					foreach ($aSql as $sSql)
					{
						$sSql = preg_replace('/CREATE TABLE/', 'CREATE TABLE IF NOT EXISTS', $sSql);						
						
						$this->_db()->query($sSql);
					}			
				}				
			}
		}
		
		$hDir = opendir(PHPFOX_DIR_MODULE);
		while ($sModule = readdir($hDir))
		{
			if ($sModule == '.' || $sModule == '..')
			{
				continue;
			}
			
			if ($sModule == 'phpfox')
			{
				continue;
			}
			
			$bIsNewModule = false;
			if (file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'phpfox.xml.php'))
			{
				$aModule = Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'phpfox.xml.php');			
				
				if (isset($aModule['data']['module_id']))
				{
					$iIsModule = $this->_db()->select('COUNT(*)')
						->from(Phpfox::getT('module'))
						->where('module_id = \'' . $this->_db()->escape($aModule['data']['module_id']) . '\'')
						->execute('getField');
					
					if (!$iIsModule)
					{
						$bIsNewModule = true;
						$this->_db()->insert(Phpfox::getT('module'), array(
								'module_id' => $aModule['data']['module_id'],
								'product_id' => 'phpfox',
								'is_core' => $aModule['data']['is_core'],
								'is_active' => 1,
								'is_menu' => $aModule['data']['is_menu'],
								'menu' => $aModule['data']['menu'],
								'phrase_var_name' => $aModule['data']['phrase_var_name']
							)
						);
						Phpfox::getService('admincp.module.process')->install(null, array('insert' => true), 'phpfox', $aModule);
					}
				}
				
				if (!empty($aModule['data']['menu']))
				{
					$aModuleCheck = $this->_db()->select('module_id, menu')
						->from(Phpfox::getT('module'))
						->where('module_id = \'' . $this->_db()->escape($aModule['data']['module_id']) . '\'')
						->execute('getRow');
						
					if (isset($aModuleCheck['module_id']) && $aModuleCheck['menu'] != $aModule['data']['menu'])
					{
						$this->_db()->update(Phpfox::getT('module'), array('menu' => $aModule['data']['menu']), 'module_id = \'' . $this->_db()->escape($aModuleCheck['module_id']) . '\'');
					}
				}
			}
			
			if (file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'version' . PHPFOX_DS . $sVersion . '.xml.php'))
			{
				$aUpgradeModule = Phpfox::getLib('xml.parser')->parse(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'install' . PHPFOX_DS . 'version' . PHPFOX_DS . $sVersion . '.xml.php');		
				
				if (isset($aUpgradeModule['sql']))
				{
					$sSqlQuery = Phpfox::getLib('database.export')->processAlter(Phpfox::getParam(array('db', 'driver')), unserialize($aUpgradeModule['sql']), false, true);
					$sSqlQuery = preg_replace('#phpfox_#i', Phpfox::getParam(array('db', 'prefix')), $sSqlQuery);
					$aDriver = $oPhpfoxDatabaseExport->getDriver(Phpfox::getParam(array('db', 'driver')));
	
					$aSql = $oPhpfoxDatabaseExport->splitSqlFile($sSqlQuery, $aDriver['delim']);	
					
					foreach ($aSql as $sSql)
					{						
						$this->_db()->query($sSql);
					}
				}
				
				if ($bIsNewModule === false)
				{
					Phpfox::getService('admincp.module.process')->install(null, array('insert' => true), 'phpfox', $aUpgradeModule);
				}
			}
		}
		closedir($hDir);
	}
}

?>