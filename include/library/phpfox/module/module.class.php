<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Module Handler
 * This class is used to call and interact with all the modules. Modules are 
 * used to power all the pages and blocks found on those pages.
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: module.class.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */
class Phpfox_Module
{	
	/**
	 * List of all the active modules.
	 *
	 * @var array
	 */
	private $_aModules = array();	
	
	/**
	 * List of all the active services part of active modules.
	 *
	 * @var array
	 */
	private $_aServices = array();
	
	/**
	 * List of all the active blocks part of active modules.
	 *
	 * @var unknown_type
	 */
	private $_aModuleBlocks = array();	
	
	/**
	 * Holds the value of the default controller to execute.
	 *
	 * @var string
	 */
	private $_sController = 'index';
	
	/**
	 * Holds the value of the default module to execute.
	 *
	 * @var string
	 */
	private $_sModule = PHPFOX_MODULE_CORE;
	
	/**
	 * List of all the active components part of active modules.
	 *
	 * @var array
	 */
	private $_aComponent = array();
	
	/**
	 * Object of the class loaded by the current controller being used.
	 *
	 * @var object
	 */
	private $_oController = null;
	
	/**
	 * List of controllers that are within iframes and require special rules to be loaded.
	 *
	 * @var array
	 */
	private $_aFrames = array(
		'attachment-frame',
		'photo-frame'
	);
	
	/**
	 * Defines if a template should not be loaded when calling a controller.
	 *
	 * @var bool
	 */
	private $_bNoTemplate = false;
	
	/**
	 * Cache and store all the return values from components being loaded.
	 *
	 * @var array
	 */
	private $_aReturn = array();	
	
	/**
	 * Holds all the HTML output of a controller so it can later be displayed in a specific position on the site.
	 * This allows the ability to drag/drop blocks.
	 *
	 * @var array
	 */
	private $_aCachedData = array();
	
	/**
	 * Cached array of all the components. Only stored during debug mode.
	 *
	 * @var array
	 */
	private $_aComponents = array();	
	
	/**
	 * Cache ARRAY of all the custom pages the site has, which are created by admins.
	 *
	 * @var unknown_type
	 */
	private $_aPages = array();
	
	/**
	 * List of all the block locations on the site.
	 *
	 * @var array
	 */
	private $_aBlockLocations = array();	
	
	/**
	 * ARRAY can add extra blocks that are not loaded by normal means (via AdminCP).
	 *
	 * @var array
	 */
	private $_aCallbackBlock = array();
	
	/**
	 * If a user has dragged/dropped blocks this variable will store such information in an ARRAY.
	 *
	 * @var mixed
	 */
	private $_aCacheBlockData = null;
	
	/**
	 * If a user has dragged/dropped blocks this variable will store such information of the position ID (INT).
	 *
	 * @var mixed
	 */
	private $_aCachedItemData = null;

	/**
	 * If a user has dragged/dropped blocks this variable will store such information of the block ID (INT).
	 *
	 * @var mixed
	 */	
	private $_aCachedItemDataBlock = null;	
	
	/**
	 * If a user has dragged/dropped blocks this variable will store the blocks information in an ARRAY.
	 *
	 * @var array
	 */		
	private $_aItemDataCache = array();
	
	/**
	 * Holds an ARRAY of all the blocks that were moved by the end user.
	 *
	 * @var array
	 */
	private $_aMoveBlocks = array();
	
	/**
	 * ARRAY of blocks that has source code in the database, instead of PHP files.
	 *
	 * @var array
	 */
	private $_aBlockWithSource = array();
	
	/**
	 * List of cached block IDs.
	 *
	 * @var array
	 */
	private $_aCacheBlockId = array();
	
	/**
	 * Class constructor that caches all the modules, components (blocks/controllers) and drag/drop information.
	 *
	 */
	public function __construct()
	{		
		if (!defined('PHPFOX_INSTALLER') || (defined('PHPFOX_INSTALLER') && !defined('PHPFOX_SCRIPT_CONFIG')))
		{			
			$this->_cacheModules();
			// $this->_cacheModuleBlocks();
		}
		
		// No modules found because its a fresh install
		if (Phpfox::getParam('core.is_installed') && !count($this->_aModules))
		{
			$oDb = Phpfox::getLib('database');
			if (is_object($oDb))
			{
				$this->_cacheModules();	
			}
		}		
	}		
	
	/**
	 * Load all module blocks based on the theme being used.
	 *
	 */
	public function loadBlocks()
	{
		$this->_cacheModuleBlocks();	
	}
	
	/**
	 * Checks if a module is valid or not (IF EXISTS OR IF EXISTS AND IS VALUE)
	 *
	 * @param string $sModule Module name.
	 * @return bool TRUE if it exists, FALSE if it does not.
	 */
	public function isModule($sModule)
	{			
		$sModule = strtolower($sModule);
		if (isset($this->_aModules[$sModule]))
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Returns the module ID. Since Alpha versions of phpFox we changed modules to have unique string IDs
	 * so this function basically returns the same ID you are passing with the first argument.
	 *
	 * @deprecated 2.0.0beta1
	 * @param string $sName Module name.
	 * @return string Returns the unique module ID.
	 */
	public function getModuleId($sName)
	{		
		$sModule = strtolower($sName);
		if (isset($this->_aModules[$sModule]))
		{
			return $this->_aModules[$sModule];
		}		
		return 'core';		
	}
	
	/**
	 * Sets the controller for the page we are on. This method controlls what component to load, which 
	 * will be used to display the content on that page.
	 *
	 * @param string $sController (Optional) We find the controller by default, however you can override our default findings by passing the name of the controller with this argument.
	 */
	public function setController($sController = '')
	{	
		if ($sController)
		{
			$aParts = explode('.', $sController);			
			$this->_sModule = $aParts[0];
			$this->_sController = substr_replace($sController, '', 0, strlen($this->_sModule . '_'));			
			$this->getModuleBlocks(1, true);			
			
			(($sPlugin = Phpfox_Plugin::get('set_defined_controller')) ? eval($sPlugin) : false);
			
			// Reset the lang. pack cache since we are using a new controller
			if (Phpfox::getParam('language.cache_phrases'))
			{				
				Phpfox::getLib('locale')->cache();
				Phpfox::getLib('locale')->setCache();
			}
			
			$this->getController();
			
			return;
		}
		
		(($sPlugin = Phpfox_Plugin::get('module_setcontroller_start')) ? eval($sPlugin) : false);
		
		$oUrl = Phpfox::getLib('url');
		$oReq = Phpfox::getLib('request');		
		$oPage = Phpfox::getService('page');
		
		$this->_sModule = (($sReq1 = $oReq->get('req1')) ? strtolower($sReq1) : Phpfox::getParam('core.module_core'));		
		
		if (Phpfox::isMobile() && empty($sReq1))
		{
			$this->_sModule = 'mobile';
		}
		
		if (($sFrame = $oReq->get('frame')) && in_array($sFrame, $this->_aFrames))
		{
			$aFrameParts = explode('-', $sFrame);			
			$this->_sModule = strtolower($aFrameParts[0]);
			$this->_sController = strtolower($aFrameParts[1]);
		}		
			
		$this->_aPages = $oPage->getCache();
		if (isset($this->_aPages[$oReq->get('req1')]))
		{
			$this->_sModule = 'page';
			$this->_sController = 'view';
		}		

		$sDir = PHPFOX_DIR_MODULE . $this->_sModule . PHPFOX_DS;
		
		if ($oReq->get('req2') == Phpfox::getParam('admincp.admin_cp'))
		{
			Phpfox::getLib('url')->send($oReq->get('req2') . '.' . $oReq->get('req1'));
		}
		
		if ($oReq->get('req2') && file_exists($sDir . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . strtolower($oReq->get('req2')) . '.class.php'))
		{
			$this->_sController = strtolower($oReq->get('req2'));
		}		
		elseif (strtolower($this->_sModule) != Phpfox::getParam('admincp.admin_cp') && $oReq->get('req3') && file_exists($sDir . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . strtolower($oReq->get('req2')) . PHPFOX_DS . strtolower($oReq->get('req3')) . '.class.php'))
		{
			$this->_sController = strtolower($oReq->get('req2') . '.' . $oReq->get('req3'));			
		}
		elseif (strtolower($this->_sModule) != Phpfox::getParam('admincp.admin_cp') && $oReq->get('req2') && file_exists($sDir . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . strtolower($oReq->get('req2')) . PHPFOX_DS . 'index.class.php'))
		{			
			$this->_sController = strtolower($oReq->get('req2')) . '.index';			
		}		
		else 
		{			
			// Over-ride the index page to display the content for guests or members
			if ($this->_sModule == Phpfox::getParam('core.module_core') && $this->_sController == 'index' && Phpfox::getParam('core.module_core') == PHPFOX_MODULE_CORE)
			{				
				$this->_sController = (Phpfox::isUser() ? 'index-member' : 'index-visitor');				
			}

			if (!file_exists($sDir . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . 'controller' . PHPFOX_DS . $this->_sController . '.class.php'))
			{
				$this->_sModule = 'profile';
			}			
			
			(($sPlugin = Phpfox_Plugin::get('set_controller_else_end')) ? eval($sPlugin) : false);
		}	
		
		if ($this->_sModule == 'theme')
		{
			if (preg_match('/^(.*?)\.(jpg|jpeg|gif|png|css|js)$/i', $_GET[PHPFOX_GET_METHOD]))
			{
				$this->_sModule = 'error';
				$this->_sController = '404';
			}
		}
		
		if ($this->_sModule != 'profile' && !isset($this->_aModules[$this->_sModule]))
		{
			$this->_sModule = 'error';
			$this->_sController = '404';
		}
		
		if (Phpfox::getParam('admincp.admin_cp') != 'admincp' && $oReq->get('req1') == Phpfox::getParam('admincp.admin_cp'))
		{
			$this->_sModule = 'admincp';			
		}		

		if (Phpfox::isMobile())
		{
			// $this->_sController = $this->_sController . '-mobile';			
			// $this->_sController = $this->_sController;
		}		
		
		(($sPlugin = Phpfox_Plugin::get('module_setcontroller_end')) ? eval($sPlugin) : false);
		
		// Set the language pack cache
		if (Phpfox::getParam('language.cache_phrases'))
		{			
			Phpfox::getLib('locale')->setCache();
		}		
		
		if (Phpfox::isUser() && Phpfox::getUserParam('user.require_profile_image') && Phpfox::getUserBy('user_image') == '' && 
			!(
				($this->_sModule == 'user' && $this->_sController == 'photo') || 
				($this->_sModule == 'user' && $this->_sController == 'logout') ||
				($this->_sModule == 'subscribe')
			)
		)
		{
			Phpfox::getLib('url')->send('user.photo', null, Phpfox::getPhrase('user.you_are_required_to_upload_a_profile_image'));
		}
		
		if (Phpfox::getParam('core.force_https_secure_pages'))
		{
			if (in_array(str_replace('mobile.', '', $this->getFullControllerName()), Phpfox::getService('core')->getSecurePages()))
			{
				if (!isset($_SERVER['HTTPS']))
				{
					Phpfox::getLib('url')->send(str_replace('mobile.', '', $this->getFullControllerName()));
				}
			}
		}
	}	
	
	/**
	 * Loads and outputs the current page based on the controller we loaded with the method setController().
	 * 
	 * @see self::setController()
	 */
	public function getController()
	{		
		// Get the component
		$this->_oController = $this->getComponent($this->_sModule . '.' . $this->_sController, array('bNoTemplate' => true), 'controller');
	}
	
	/**
	 * Gets the full name of the controller we are using including the module prefix.
	 *
	 * @return string
	 */
	public function getFullControllerName()
	{
		return $this->_sModule . '.' . str_replace('\\', '/', $this->_sController);
	}
	
	/**
	 * Gets the controllers template. We do this automatically since each controller has a specific template that it loads to
	 * output data to the site.
	 *
	 * @return mixed NULL if we were able to load a template and FALSE if such a template does not exist.
	 */
	public function getControllerTemplate()
	{		
		$sClass = $this->_sModule . '.controller.' . $this->_sController;
		if (isset($this->_aReturn[$sClass]) && $this->_aReturn[$sClass] === false)
		{
			return false;
		}
		
		(($sPlugin = Phpfox_Plugin::get('module_getcontrollertemplate')) ? eval($sPlugin) : false);
		
		// Get the template and display its content for the specific controller component
		Phpfox::getLib('template')->getTemplate($sClass);

		// Check if the component we have loaded has the clean() method
		if (is_object($this->_oController) && method_exists($this->_oController, 'clean'))
		{
			// This method is used to clean out any garbage we don't need later on in the script. In most cases Template assigns.
			$this->_oController->clean();
		}
	}
	
	/**
	 * Module blocks are loaded via the AdminCP, however it can manually be loaded with this method.
	 *
	 * @param string $sController Controller this block belongs to.
	 * @param int $iId Position of where the block must be located by default.
	 */
	public function addModuleBlock($sController, $iId)
	{
		$this->_aCallbackBlock[$iId] = $sController;
	}
	
	/**
	 * Gets all the blocks for a specific location on a specific page.
	 * 
	 * @param int Position on the template.
	 * @param bool (Optional) If blocks are already loaded set this to TRUE to reload them anyway.
	 * @return array Returns a list of blocks for that page and in a specific order.
	 */
	public function getModuleBlocks($iId, $bForce = false)
	{
		static $aBlocks = array();	
		static $bIsOrdered = false;
		
		if (isset($aBlocks[$iId]) && $bForce === false)
		{
			return $aBlocks[$iId];
		}		
	
		$aBlocks[$iId] = array();		

		(($sPlugin = Phpfox_Plugin::get('get_module_blocks')) ? eval($sPlugin) : false);
		
		//$sController = strtolower($this->_sModule . '.' . $this->_sController);
		$sController = strtolower($this->_sModule . '.' . str_replace(array('\\', '/'), '.' , $this->_sController));
		
		if (isset($this->_aModuleBlocks[$sController][$iId]) || isset($this->_aModuleBlocks[str_replace('.index','',$sController)][$iId]) || isset($this->_aModuleBlocks[$this->_sModule][$iId]) || isset($this->_aModuleBlocks[''][$iId]))
		{		
			$aCachedBlocks = array();			
			if (isset($this->_aModuleBlocks[$sController][$iId]))
			{
				foreach ($this->_aModuleBlocks[$sController][$iId] as $mKey => $mData)
				{
					$aCachedBlocks[$mKey] = $mData;	
				}					
			}

			if (isset($this->_aModuleBlocks[str_replace('.index','',$sController)][$iId]))
			{
				foreach ($this->_aModuleBlocks[str_replace('.index','',$sController)][$iId] as $mKey => $mData)
				{
					$aCachedBlocks[$mKey] = $mData;
				}
			}
			
			if (isset($this->_aModuleBlocks[$this->_sModule][$iId]))
			{
				foreach ($this->_aModuleBlocks[$this->_sModule][$iId] as $mKey => $mData)
				{
					$aCachedBlocks[$mKey] = $mData;	
				}				
			}	
			
			if (isset($this->_aModuleBlocks[''][$iId]))
			{
				foreach ($this->_aModuleBlocks[''][$iId] as $mKey => $mData)
				{
					$aCachedBlocks[$mKey] = $mData;	
				}
			}			
				
			foreach ($aCachedBlocks as $sKey => $sValue)
			{				
				if (!empty($sValue))
				{
					if (in_array(Phpfox::getUserBy('user_group_id'), unserialize($sValue)))
					{
						continue;
					}
				}	
				
				if ($sKey == 'user.login-block')
				{
					$aDeny = array(
						'forum',
						'profile'
					);
					
					// If we are logged in lets not display the login block
					if (Phpfox::isUser())
					{
						continue;
					}		
					
					if (in_array(Phpfox::getLib('module')->getModuleName(), $aDeny))
					{
						continue;
					}
					
					if (Phpfox::getLib('url')->isUrl(array('user/login', 'user/register', 'profile', 'user/password/request', 'forum')))
					{
						continue;
					}					
				}
				
				$aControllerParts = array();
				if (preg_match('/\./', $sController))
				{
					$aControllerParts = explode('.', $sController);					
				}				

				if (isset($this->_aBlockWithSource[$sController][$iId][$sKey]) || isset($this->_aBlockWithSource[str_replace('.index','',$sController)][$iId][$sKey]) || isset($this->_aBlockWithSource[''][$iId][$sKey]) || (count($aControllerParts) && isset($this->_aBlockWithSource[$aControllerParts[0]][$iId][$sKey])))
				{
					$oCache = Phpfox::getLib('cache');
					$sCacheId = $oCache->set(array('block', 'file_' . $sKey));
					
					if (($aCacheData = $oCache->get($sCacheId)) && (isset($aCacheData['block_id'])))
					{
						$this->_aCacheBlockId[md5($aCacheData['source_parsed'])] = array(
							'block_id' => $aCacheData['block_id'],
							'location' => $aCacheData['location']
						);

						$aBlocks[$iId][] = array(
							$aCacheData['source_parsed']
						);
					}
				}
				else 
				{				
					$aBlocks[$iId][] = $sKey;
				}			
			}	
		}		
		
		if (isset($this->_aCallbackBlock[$iId]))
		{
			$aBlocks[$iId] = array_merge($aBlocks[$iId], array($this->_aCallbackBlock[$iId]));
		}		
		
		if (!count($aBlocks[$iId]) && (Phpfox::getService('theme')->isInDnDMode() || defined('PHPFOX_IN_DESIGN_MODE')))
		{
			$aBlocks[$iId] = true;
		}
					
		return $aBlocks[$iId];
	}

	/**
	 * Get the module name of the current controller we are using.
	 *
	 * @return string
	 */
	public function getModuleName()
	{
		return $this->_sModule;
	}
	
	/**
	 * Get the name of the current controller we are using.
	 *
	 * @return string
	 */
	public function getControllerName()
	{
		return $this->_sController;
	}	
	
	/**
	 * Loads a service class. Service classes are module based class that interact with the database
	 * and runs general PHP logic that is not needed to be found with components.
	 *
	 * @param string $sClass Name of the service class to load.
	 * @param array $aParams (Optional) ARRAY of params to pass to that class.
	 * @return mixed On success we return the class object, on failure we return FALSE.
	 */
	public function getService($sClass, $aParams = array())
	{	
		if (isset($this->_aServices[$sClass]))
		{
			return $this->_aServices[$sClass];	
		}		
	
		if (preg_match('/\./', $sClass) && ($aParts = explode('.', $sClass)) && isset($aParts[1]))
		{
			$sModule = $aParts[0];
			$sService = $aParts[1];			
		}
		else 
		{
			$sModule = $sClass;
			$sService = $sClass;
		}
		
		if (!defined('PHPFOX_INSTALLER') && !isset($this->_aModules[$sModule]))
		{
			return Phpfox_Error::trigger('Calling a Service from an invalid Module. Make sure the module is valid or set to active. (' . $sModule . '::' . $sService . ')', E_USER_ERROR);
		}			
		
		if ($sClass == 'core.currency.process')
		{
			$sFile = PHPFOX_DIR_MODULE . 'core' . PHPFOX_DS . 'include' . PHPFOX_DS . 'service' . PHPFOX_DS . 'currency' . PHPFOX_DS . 'process.class.php';		
			$sModule = 'Core';
			$sService = 'Currency_Process';	
		}
		else 
		{
			$sFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . '.class.php';
		}		
		
		if (!file_exists($sFile))
		{			
			if (isset($aParts[2]))
			{
				$sFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . PHPFOX_DS . $aParts[2] . '.class.php';
				
				if (!file_exists($sFile))
				{
					if (isset($aParts[3]) && file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . PHPFOX_DS . $aParts[2] . PHPFOX_DS . $aParts[3] . '.class.php'))
					{
						$sFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . PHPFOX_DS . $aParts[2] . PHPFOX_DS . $aParts[3] . '.class.php';				
						$sService .= '_' . $aParts[2] . '_' . $aParts[3];
					}
					else 
					{					
						$sFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . PHPFOX_DS . $aParts[2] . PHPFOX_DS . $aParts[2] . '.class.php';				
						$sService .= '_' . $aParts[2] . '_' . $aParts[2];
					}
				}
				else 
				{
					$sService .= '_' . $aParts[2];
				}
			}
			else 
			{
				$sFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sService . PHPFOX_DS . $sService . '.class.php';	
				$sService .= '_' . $sService;
			}
		}		
		
		if (!file_exists($sFile))
		{
			Phpfox_Error::trigger('Unable to load service class: ' . $sFile, E_USER_ERROR);
		}

		require($sFile);
		
		$this->_aServices[$sClass] = Phpfox::getObject($sModule . '_service_' . $sService);		
	
		return $this->_aServices[$sClass];
	}	
	
	/**
	 * Loads a module component. Components are the building blocks of the site and
	 * include controllers which build up the pages we see and blocks that build up the controllers.
	 *
	 * @param string $sClass Name of the component to load.
	 * @param array $aParams (Optional) Custom params you can pass to the component.
	 * @param string $sType (Optional) Identify if this component is a block or a controller.
	 * @param boolean $bTemplateParams Assign $aParams to the template
	 * @return mixed Return the component object if it exists, otherwise FALSE.
	 */
	public function getComponent($sClass, $aParams = array(), $sType = 'block', $bTemplateParams = false)
	{
		(($sPlugin = Phpfox_Plugin::get('module_getcomponent_start')) ? eval($sPlugin) : false);

		if ($sType == 'ajax' && !strpos($sClass, '.'))
		{
			$sClass = $sClass . '.ajax';
		}	
				
		if (is_array($sClass))
		{				
			return Phpfox::getBlock('core.holder', array('block_location' => $this->_aCacheBlockId[md5($sClass[0])]['location'], 'block_custom_id' => $this->_aCacheBlockId[md5($sClass[0])]['block_id'], 'content' => $sClass[0]));
		}
		
		$aParts = explode('.', $sClass);
		$sModule = $aParts[0];		
		$sComponent = $sType . PHPFOX_DS . substr_replace(str_replace('.', PHPFOX_DS, $sClass), '', 0, strlen($sModule . PHPFOX_DS));		
		
		if ($sType == 'controller')
		{
			$this->_sModule = $sModule;
			$this->_sController = substr_replace(str_replace('.', PHPFOX_DS, $sClass), '', 0, strlen($sModule . PHPFOX_DS));
		}
		static $sBlockName = '';
		if ($sModule == 'custom')
		{
			if (preg_match('/block\\' . PHPFOX_DS . 'cf_(.*)/i', $sComponent, $aCustomMatch))
			{				
				$aParams = array(
					'type_id' => 'user_main',
					'template' => 'content',
					'custom_field_id' => $aCustomMatch[1]
				);
				$sBlockName = 'custom_cf_' . $aCustomMatch[1];
				$sComponent = 'block' . PHPFOX_DS . 'display';
				$sClass = 'custom.display';				
			}
		}		
		
		/*if (Phpfox::getService('theme')->isInDnDMode() || defined('PHPFOX_IN_DESIGN_MODE'))
		{
			Phpfox::getLib('template')->assign(array('sDeleteBlock' => str_replace('.','_',$sClass),
				'bBlockCanMove' => true));				
		}*/
		$sMethod = $sModule . '_component_' . str_replace(PHPFOX_DS, '_', $sComponent) . '_process';			
		
		if (preg_match('/(.*?)\((.*?)\)/', $sComponent, $aMatches) && !empty($aMatches[2]))
		{
			eval('$aParams = array_merge($aParams, array(' . $aMatches[2] . '));');

			$sComponent = $aMatches[1];		
			$sClass = $aMatches[1];			
		}		
		
		$sHash = md5($sClass . $sType);			

		if (!isset($this->_aModules[$sModule]))
		{			
			return false;
		}
		
		if (isset($this->_aComponent[$sHash]))
		{	
			$this->_aComponent[$sHash]->__construct(array('sModule' => $sModule, 'sComponent' => $sComponent, 'aParams' => $aParams));
		}
		else 
		{	
			$sClassFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . $sComponent . '.class.php';	
	
			if (!file_exists($sClassFile) && isset($aParts[1]))
			{
				$sClassFile = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_COMPONENT . PHPFOX_DS . $sComponent . PHPFOX_DS . $aParts[1] . '.class.php';				
			}			
			
			// Lets check if there is such a component
			if (!file_exists($sClassFile))
			{
				// Opps, for some reason we have loaded an invalid component. Lets send back info to the dev.
				Phpfox_Error::trigger('Failed to load component: ' . $sClassFile, E_USER_ERROR);
			}
			
			// Require the component
			require($sClassFile);					

			// Get the object			
			$this->_aComponent[$sHash] = Phpfox::getObject($sModule . '_component_' . str_replace(PHPFOX_DS, '_', $sComponent), array('sModule' => $sModule, 'sComponent' => $sComponent, 'aParams' => $aParams));
		}
		
		$mReturn = 'blank';
		if ($sType != 'ajax')
		{	
			(($sPlugin = Phpfox_Plugin::get('component_pre_process')) ? eval($sPlugin) : false);
			$mReturn = $this->_aComponent[$sHash]->process();
		
			(($sPlugin = Phpfox_Plugin::get('component_post_process')) ? eval($sPlugin) : false);
		}
		
		$this->_aReturn[$sClass] = $mReturn;
		
		// If we return the component as 'false' then there is no need to display it.
		if ((is_bool($mReturn) && !$mReturn) || $this->_bNoTemplate)
		{
			if ($this->_bNoTemplate)
			{
				$this->_bNoTemplate = false;
			}
			
			return $this->_aComponent[$sHash];	
		}		
		
		/* Should we pass the params to the template? */
		if ($bTemplateParams)
		{
			Phpfox::getLib('template')->assign($aParams);
		}
		
		// Check if we don't want to display a template
		if (!isset($aParams['bNoTemplate']) && $mReturn != 'blank')
		{			
			if ($mReturn && is_string($mReturn))
			{		
				Phpfox::getLib('template')->assign(array(
						'sBlockShowName' => ($sModule == 'custom' && !empty($sBlockName)) ? $sBlockName : ucwords(str_replace('.', ' ', $sClass)),
						'sBlockBorderJsId' => ($sModule == 'custom' && !empty($sBlockName)) ? $sBlockName : str_replace('.', '_', $sClass),
						'sClass' => $sClass
					)
				)->setLayout($mReturn);
			}	
			
			if (!is_array($mReturn))
			{
				$sComponentTemplate = $sModule . '.' . str_replace(PHPFOX_DS, '.', $sComponent);
			
				(($sPlugin = Phpfox_Plugin::get('module_getcomponent_gettemplate')) ? eval($sPlugin) : false);
				
				Phpfox::getLib('template')->getTemplate($sComponentTemplate);
			}						
			
			// Check if the component we have loaded has the clean() method
			if (is_object($this->_aComponent[$sHash]) && method_exists($this->_aComponent[$sHash], 'clean'))
			{
				// This method is used to clean out any garbage we don't need later on in the script. In most cases Template assigns.
				$this->_aComponent[$sHash]->clean();
			}							
		}		
		
		return $this->_aComponent[$sHash];
	}	
	
	/**
	 * Sets the cache blocks data.
	 *
	 * @param array $aCacheBlockData ARRAY of information to cache.
	 */
	public function setCacheBlockData($aCacheBlockData)
	{
		if (Phpfox::getService('theme')->isInDnDMode())
		{
			return;
		}
		
		if (!isset($this->_aModuleBlocks[$aCacheBlockData['controller']]))
		{
			return;
		}
	
		$aCustomOrder = Phpfox::getLib('database')
			->select('*')
			->from(Phpfox::getT($aCacheBlockData['table']))
			->where($aCacheBlockData['field'] .' = ' . $aCacheBlockData['item_id'])
			->order('ordering ASC')
			->execute('getSlaveRows');
	
	
		$aNewVar = $this->_aModuleBlocks[$aCacheBlockData['controller']];
		$aNewestVar = array();
		$aTemp = array();
		
		foreach ($aNewVar as $iLocation => $aBlocks)
		{
			if ($iLocation > 3)
			{
				continue;
			}
			foreach ($aBlocks as $sName => $aBlock)
			{
				$aNewestVar[] = $sName;
				$aTemp[$sName] = $iLocation;
			}			
		}

		if (count($aCustomOrder))
		{
			$this->_aModuleBlocks[$aCacheBlockData['controller']][1] = array();
			$this->_aModuleBlocks[$aCacheBlockData['controller']][2] = array();
			$this->_aModuleBlocks[$aCacheBlockData['controller']][3] = array();
		}
			
		// d($aNewestVar);
		
		foreach ($aCustomOrder as $iKey => $aBlock)
		{
			$sBlockName = str_replace('js_block_border_','',$aBlock['cache_id']);
			$sBlockName = str_replace('_','.', $sBlockName);
			if (preg_match('/custom\.cf\.(.*)/i', $sBlockName, $aMatches) && isset($aMatches[1]))
			{
				$sBlockName = 'custom.cf_' . str_replace('.', '_', $aMatches[1]);
			}
			
			if (empty($aBlock['block_id']) && isset($aTemp[$sBlockName]))
			{
				$aBlock['block_id'] = $aTemp[$sBlockName];
			}				
			
			if ($aBlock['is_hidden'] != 1)
			{									
				if (!in_array($sBlockName, $aNewestVar))
				{
					continue;
				}
			
				$this->_aModuleBlocks[$aCacheBlockData['controller']][$aBlock['block_id']][$sBlockName] = '';
			}
			
			foreach ($aNewestVar as $iSub => $sBlock)
			{
				if($sBlock == $sBlockName)
				{
					unset($aNewestVar[$iSub]);
					break;
				}
			}			
		}
	
		foreach ($aNewestVar as $sBlockName)
		{
			$this->_aModuleBlocks[$aCacheBlockData['controller']][$aTemp[$sBlockName]][$sBlockName] = '';
		}		
	}	
	
	/**
	 * Identify that the controller we are loading is not to load its template.
	 *
	 */
	public function setNoTemplate()
	{
		$this->_bNoTemplate = true;
	}
	
	/**
	 * Get all the active modules.
	 *
	 * @return array
	 */
	public function getModules()
	{
		if (defined('PHPFOX_INSTALLER') && empty($this->_aModules) && file_exists(PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php'))
		{
			require(PHPFOX_DIR_FILE . 'log' . PHPFOX_DS . 'installer_modules.php');
			
			$this->_aModules = $aModules;			
		}	
		
		return $this->_aModules;
	}	
	
	/**
	 * Get all the tables part of each of the active modules.
	 *
	 * @param string $sPrefix Prefix of the database table name.
	 * @return array ARRAY of all the tables.
	 */
	public function getModuleTables($sPrefix)
	{
		$oPhpfoxXmlParser = Phpfox::getLib('xml.parser');
		$aTables = array();
		$aModules = Phpfox::getLib('file')->getFiles(PHPFOX_DIR_MODULE);		
		foreach ($aModules as $iKey => $sModule)
		{
			if (!file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DIR_MODULE_XML . PHPFOX_DS . 'phpfox' . PHPFOX_XML_SUFFIX))
			{
				continue;
			}
			
			$aModule = $oPhpfoxXmlParser->parse(file_get_contents(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DIR_MODULE_XML . PHPFOX_DS . 'phpfox' . PHPFOX_XML_SUFFIX));			
						
			if (isset($aModule['tables']))
			{
				$aCache = unserialize(trim($aModule['tables']));			
				foreach ($aCache as $sKey => $aData)
				{
					$sKey = preg_replace('#phpfox_#i', $sPrefix, $sKey);
					$aTables[] = $sKey;
				}
			}
		}
		
		return $aTables;	
	}	
	
	/**
	 * Get all the modules found within the module folder.
	 *
	 * @return array ARRAY of modules.
	 */
	public function getModuleFiles()
	{
		// Create a cache of modules we need to skip
		$aSkip = array();
		if (defined('PHPFOX_INSTALL_MOD_IGNORE'))
		{
			$aParts = explode(',', PHPFOX_INSTALL_MOD_IGNORE);
			foreach ($aParts as $sPart)
			{
				$aSkip[] = trim($sPart);
			}
		}
		
		$aFolders = array();
		$iCoreId = 0;
		$aModules = Phpfox::getLib('file')->getFiles(PHPFOX_DIR_MODULE);		
		foreach ($aModules as $iKey => $sModule)
		{
			if (!file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DIR_MODULE_XML . PHPFOX_DS . 'phpfox' . PHPFOX_XML_SUFFIX))
			{
				continue;
			}
			
			if (count($aSkip) && in_array($sModule, $aSkip))
			{
				continue;
			}
			
			$sContent = file_get_contents(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DIR_MODULE_XML . PHPFOX_DS . 'phpfox' . PHPFOX_XML_SUFFIX);
			
			$sCore = (preg_match("/<is_core>1<\/is_core>/i", $sContent) ? 'core' : 'plugin');
			
			$aFolders[$sCore][$iKey] = array(
				'name' => $sModule				
			);
			
			if ($sModule === 'core')
			{
				$iCoreId = $iKey;
			}
		}		
		
		unset($aFolders['core'][$iCoreId]);
		
		array_unshift($aFolders['core'], array(
				'name' => 'core'
			)
		);		
		
		return $aFolders;
	}
	
	/**
	 * Execute a callback on a specific module based on the 1st argument.
	 *
	 * @param string $sCall Module and callback method to execute.
	 * @param array $aParams ARRAY of params you can pass to the callback.
	 * @return mixed Returns the value the callback itself returns. FALSE if not callback was found.
	 */
	public function callback($sCall, $aParams = array())
	{
		static $aModules = array();
		
		// Lets get the module and method we plan on calling
		$aParts1 = explode('.', $sCall);		
		$sModule = $aParts1[0];
		$sMethod = $aParts1[1];
		
		if (strpos($sModule, '_'))
		{
			$aParts = explode('_', $sModule);			
			$sModule = $aParts[0];
			$sMethod = $sMethod . ucfirst(strtolower($aParts[1]));			
			if (isset($aParts[2]))
			{
				$sMethod .= '_' . ucfirst(strtolower($aParts[2]));
			}			
		}		
		
		// Have we cached the object?
		if (!isset($aModules[$sModule]))
		{			
			// Make sure its a valid/enabled module
			if (!Phpfox::isModule($sModule))
			{
				return Phpfox_Error::trigger('Invalid module: ' . $sModule, E_USER_ERROR);
			}
			
			// Cache the object and get the callback service
			$aModules[$sModule] = $this->getService($sModule . '.callback');
		}	
			
		// Do we have any args. to pass?
		if (count($aParams) && isset($aParams[1]))
		{			
			// Prepare the args.
			$sEval = '$mReturn = $aModules[$sModule]->$sMethod(';			
			for ($i = 1; $i < count($aParams); $i++)
			{
				$sEval .= var_export($aParams[$i], true) . ',';
			}
			$sEval = rtrim($sEval, ',') . ');';

			eval($sEval);			
		}
		else 
		{
			eval('$mReturn = $aModules[$sModule]->$sMethod();');
		}
		
		return $mReturn;
	}
	
	/**
	 * Performs a callback on all the modules that have the method being executed.
	 *
	 * @param string $sMethod Method to execute on all modules.
	 * @param array $aParams Params you can pass to your callback.
	 * @return array Array of return values with the module ID as the unique key.
	 */
	public function massCallback($sMethod, $aParams = array())
	{
		$aReturn = array();
		$aModules = array();		
		$oCache = Phpfox::getLib('cache');
		
		$sCacheId = $oCache->set('module_masscall_' . $sMethod);
		if (!($aModules = $oCache->get($sCacheId)))
		{			
			foreach (Phpfox::getLib('module')->getModules() as $sModule)
			{
				$sCallBack = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . 'callback.class.php';
				if (file_exists($sCallBack))
				{
					$oService = $this->getService($sModule . '.callback');		
					if (is_object($oService) && method_exists($oService, $sMethod))
					{
						$aModules[] = $sModule;
					}
				}
			}	
			$oCache->save($sCacheId, $aModules);
		}

		if (!is_array($aModules))
		{
			return array();
		}
		
		foreach ($aModules as $sModule)
		{
			$oService = $this->getService($sModule . '.callback');
			
			// Do we have any args. to pass?
			if (count($aParams) && isset($aParams[1]))
			{			
				// Prepare the args.
				$sEval = '$aReturn[$sModule] = $oService->$sMethod(';			
				for ($i = 1; $i < count($aParams); $i++)
				{
					$sEval .= var_export($aParams[$i], true) . ',';
				}
				$sEval = rtrim($sEval, ',') . ');';

				eval($sEval);			
			}
			else 
			{				
				eval('$aReturn[$sModule] = $oService->$sMethod();');
			}			
		}
		
		return $aReturn;	
	}
	
	/**
	 * Checks if a specific module has a specific callback method.
	 *
	 * @param string $sModule Module name/ID.
	 * @param string $sMethod Callback method.
	 * @return bool TRUE if callback exists, otherwise FALSE if not.
	 */
	public function hasCallback($sModule, $sMethod, $sType = 'callback')
	{
		if (strpos($sModule, '_'))
		{
			$aParts = explode('_', $sModule);			
			$sModule = $aParts[0];
			$sMethod = $sMethod . ucfirst(strtolower($aParts[1]));			
			if (isset($aParts[2]))
			{
				$sMethod .= '_' . ucfirst(strtolower($aParts[2]));
			}				
		}				
		
		if (!$this->isModule($sModule))
		{
			return false;
		}				
		
		$sCallBack = PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . PHPFOX_DIR_MODULE_SERVICE . PHPFOX_DS . $sType . '.class.php';
		if (file_exists($sCallBack))
		{
			$oService = $this->getService($sModule . '.' . $sType);
			if (is_object($oService) && method_exists($oService, $sMethod))
			{
				return true;	
			}
		}
		
		return false;
	}
	
	/**
	 * Loads a init class file that each module has and returns a specified property
	 * which has information about the module.
	 *
	 * @param string $sModule Module name/ID.
	 * @param string $sProperty Property name to return.
	 * @return mixed FALSE if property value or module is not valid or the property value which can differ. Usually it is a STRING or ARRAY.
	 */
	public function init($sModule, $sProperty)
	{		
		if (!file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php'))
		{
			// return Phpfox_Error::trigger('Unable to load module init: ' . PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php', E_USER_ERROR);
			
			return false;
		}
		
		require_once(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php');
		
		$bHasProperty = false;
		
		if (function_exists('property_exists'))
		{
			$bHasProperty = property_exists('Module_' . $sModule . '', $sProperty);
		}
		else 
		{
			$aVars = get_class_vars('Module_' . $sModule . '');
			
			$bHasProperty = array_key_exists($sProperty, $aVars);
		}
		
		if (!$bHasProperty)
		{
			return false;
		}
		
		eval('$mData = Module_' . $sModule . '::$' . $sProperty .';');

		return $mData;
	}
	
	/**
	 * Loads a init class file that each module has and executes a specific method.
	 *
	 * @param string $sModule Module name/ID.
	 * @param string $sMethod Method name.
	 * @return mixed NULL if property value or module is not valid or the property value which can differ.
	 */
	public function initMethod($sModule, $sMethod)
	{		
		if (!file_exists(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php'))
		{
			return null;
		}
		
		require_once(PHPFOX_DIR_MODULE . $sModule . PHPFOX_DS . 'include' . PHPFOX_DS . 'phpfox.class.php');		
		
		if (!method_exists('Module_' . $sModule . '', $sMethod))
		{
			return null;
		}
		
		$sObject = 'Module_' . $sModule . '';
		
		$oObject =  new $sObject();

		return $oObject->$sMethod();
	}

	/**
	 * Gets a blocks location.
	 *
	 * @param string $sBlock Block name.
	 * @return mixed FALSE if it is not valid or STRING if it is valid.
	 */
	public function getBlockLocation($sBlock)
	{
		return (isset($this->_aBlockLocations[$this->getFullControllerName()][$sBlock]) ? (($this->_aBlockLocations[$this->getFullControllerName()][$sBlock] == 3 || $this->_aBlockLocations[$this->getFullControllerName()][$sBlock] == 1) ? 'sidebar' : 'content') : false);
	}
	
	/**
	 * Checks if a block is hidden.
	 *
	 * @param string $sBlockId Block name.
	 * @return bool TRUE is hidden, FALSE is not hiddne.
	 */
	public function blockIsHidden($sBlockId)
	{
		return ((isset($this->_aItemDataCache[$sBlockId]['is_hidden']) && $this->_aItemDataCache[$sBlockId]['is_hidden']) ? true : false);
	}
	
	/**
	 * Gets any custom component settings for a specific user.
	 *
	 * @param int $iUserId User ID
	 * @param string $sVarName Var name for the setting.
	 * @param mixed $mDefaultValue Default value in case the setting is not found.
	 * @return mixed Setting value or default value is returned.
	 */
	public function getComponentSetting($iUserId, $sVarName, $mDefaultValue)
	{
		static $aSettings = null;
		
		if ($aSettings === null)
		{
			$aRows = Phpfox::getLib('database')->select('var_name, user_value')
				->from(Phpfox::getT('component_setting'))
				->where('user_id = ' . (int) $iUserId)
				->execute('getSlaveRows');

			$aSettings = array();
			foreach ($aRows as $aRow)
			{
				$aSettings[$aRow['var_name']] = $aRow['user_value'];
			}
		}
		
		return (isset($aSettings[$sVarName]) ? $aSettings[$sVarName] : $mDefaultValue);
	}
	
	/**
	 * Cache all the active modules based on the package the client is using.
	 *
	 */
	private function _cacheModules()
	{
		$oCache = Phpfox::getLib('cache');
		$iCachedId = $oCache->set('module');		
		if (!($this->_aModules = $oCache->get($iCachedId)))
		{
			$aModules = array();
			$aRows = Phpfox::getLib('database')->select('m.module_id')
				->from(Phpfox::getT('module'), 'm')
				->join(Phpfox::getT('product'), 'p', 'm.product_id = p.product_id AND p.is_active = 1')
				->where('m.is_active = 1')
				->order('m.module_id')
				->execute('getRows');
			foreach ($aRows as $aRow) 
			{
				switch ($aRow['module_id'])
				{
					case 'ad':			
					case 'blog':
					case 'marketplace':
					case 'poll':
					case 'quiz':
					case 'attachment':
					case 'forum':						
						if (Phpfox::isPackage('1'))
						{
							Phpfox::getLib('database')->update(Phpfox::getT('module'), array('is_active' => '0'), 'module_id = \'' . $aRow['module_id'] . '\'');							
							continue;
						}
						break;
					case 'im':
					case 'music':			
					case 'shoutbox':
					case 'subscribe':
					case 'video':							
						if (Phpfox::isPackage(array('1', '2')))
						{							
							Phpfox::getLib('database')->update(Phpfox::getT('module'), array('is_active' => '0'), 'module_id = \'' . $aRow['module_id'] . '\'');
							continue;
						}						
						break;
				}
				
				$this->_aModules[$aRow['module_id']] = $aRow['module_id'];
			}
			$oCache->save($iCachedId, $this->_aModules);
		}		
	}
	
	/**
	 * Cache all module blocks.
	 *
	 */
	private function _cacheModuleBlocks()
	{		
		$oCache = Phpfox::getLib('cache');		
		$aStyleInUse = Phpfox::getLib('template')->getStyleInUse();		
		if (!isset($aStyleInUse['style_id']))
		{
			$aStyleInUse['style_id'] = 0;
		}
		$iBlockCacheId = $oCache->set(array('block', 'all_' . Phpfox::getUserBy('user_group_id')));
		$sLocationCacheId = $oCache->set(array('block', 'location_' . Phpfox::getUserBy('user_group_id')));
		$sMoveBlockId = $oCache->set(array('block', 'move_' . Phpfox::getUserBy('user_group_id')));
		$sSourceCodeBlockId = $oCache->set(array('block', 'source_code_' . Phpfox::getUserBy('user_group_id')));

		if ((!($this->_aModuleBlocks = $oCache->get($iBlockCacheId))) 
			|| (!($this->_aBlockLocations = $oCache->get($sLocationCacheId)))
			|| (!($this->_aMoveBlocks = $oCache->get($sMoveBlockId)))
			|| (!($this->_aBlockWithSource = $oCache->get($sSourceCodeBlockId)))
		)
		{			
			$aRows = Phpfox::getLib('database')->select('b.block_id, b.type_id, b.ordering, b.m_connection, b.component, b.location, b.disallow_access, b.can_move, m.module_id, bs.source_parsed')
				->from(Phpfox::getT('block'), 'b')
				->leftJoin(Phpfox::getT('block_source'), 'bs', 'bs.block_id = b.block_id')
				->join(Phpfox::getT('module'), 'm', 'b.module_id = m.module_id AND m.is_active = 1')
				->join(Phpfox::getT('product'), 'p', 'b.product_id = p.product_id AND p.is_active = 1')				
				->where('b.is_active = 1')
				->order('b.ordering ASC')
				->execute('getRows');
		
				foreach ($aRows as $aRow)
				{
					if (!empty($aRow['disallow_access']))
					{
						if (in_array(Phpfox::getUserBy('user_group_id'), unserialize($aRow['disallow_access'])))
						{
							continue;
						}			
					}					
					
					if (Phpfox::getLib('parse.format')->isSerialized($aRow['location']))
					{					
						$aLocations = unserialize($aRow['location']);
						$aRow['location'] = $aLocations['g'];
						if (isset($aLocations['s'][$aStyleInUse['style_id']]))
						{
							$aRow['location'] = $aLocations['s'][$aStyleInUse['style_id']];
						}					
					}
					
					if ($aRow['type_id'] > 0)
					{
						$this->_aBlockWithSource[$aRow['m_connection']][$aRow['location']][$aRow['block_id']] = true;			
						
						$sArrayName = $aRow['block_id'];
					}				
					else 
					{
						$sArrayName = $aRow['module_id'] . '.' . $aRow['component'];
					}
					
					$this->_aModuleBlocks[$aRow['m_connection']][$aRow['location']][$sArrayName] = $aRow['disallow_access'];
					$this->_aBlockLocations[$aRow['m_connection']][$sArrayName] = $aRow['location'];
					if ($aRow['can_move'])
					{
						$this->_aMoveBlocks[$aRow['m_connection']][$sArrayName] = true;
					}				
					
					$iCacheId = $oCache->set(array('block', 'file_' . $aRow['block_id']));
					$oCache->save($iCacheId, $aRow);
					$oCache->close($iCacheId);
				}	
			
			$oCache->save($iBlockCacheId, $this->_aModuleBlocks);			
			$oCache->save($sLocationCacheId, $this->_aBlockLocations);	
			$oCache->save($sMoveBlockId, $this->_aMoveBlocks);
			$oCache->save($sSourceCodeBlockId, $this->_aBlockWithSource);			
		}	
	}	
	
	/**
	 * Get all the drag/drop information from a specific table for a specific user.
	 *
	 */
	private function _getItemCacheData()
	{
		if ($this->_aCachedItemData === null)
		{
			$this->_aCachedItemData = array();
			$this->_aCachedItemDataBlock = array();	
			$this->_aItemDataCache = array();				
			
			$aDesigns = Phpfox::getLib('database')->select('cache_id, block_id, ordering, is_hidden')
				->from(Phpfox::getT($this->_aCacheBlockData['table']))
				->where($this->_aCacheBlockData['field'] . ' = ' . (int) $this->_aCacheBlockData['item_id'])
				->order('ordering ASC')
				->execute('getSlaveRows');
			
			if (count($aDesigns))
			{				
				$iCnt = 0;				
				foreach ($aDesigns as $aDesign)
				{				
					$iCnt++;
					$this->_aCachedItemData[$aDesign['cache_id']] = $iCnt;
					$this->_aCachedItemDataBlock[$aDesign['cache_id']] = $aDesign['block_id'];
					$this->_aItemDataCache[$aDesign['cache_id']] = $aDesign;
				}			
			}
		}		
	}	
}

?>