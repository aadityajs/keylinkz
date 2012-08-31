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
 * @version 		$Id: country.class.php 3635 2011-12-01 11:08:46Z Raymond_Benc $
 */
class Core_Service_Country_Country extends Phpfox_Service 
{
	private $_aCountries = array();
	
	private $_aChildren = array();
	
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('country');
		
		$sCachedId = $this->cache()->set('country_' . Phpfox::getLib('locale')->getLangId());
		if (!($this->_aCountries = $this->cache()->get($sCachedId)))
		{
			$aRows = $this->database()->select('c.country_iso, c.name')
				->from($this->_sTable, 'c')				
				->order('c.ordering ASC, c.name ASC')
				->execute('getRows');			
			foreach ($aRows as $aRow)
			{
				$this->_aCountries[$aRow['country_iso']] = (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_' . strtolower($aRow['country_iso'])) ? Phpfox::getPhrase('core.translate_country_iso_' . strtolower($aRow['country_iso'])) : $aRow['name']);
			}					
			
			$this->cache()->save($sCachedId, $this->_aCountries);
		}
	}
	
	public function getCountry($sIso)
	{		
		return (isset($this->_aCountries[$sIso]) ? $this->_aCountries[$sIso] : false);
	}
	
	public function get()
	{	
		return $this->_aCountries;
	}
	
	public function export($sIso)
	{
		$aCountry = $this->database()->select('*')
			->from(Phpfox::getT('country'))
			->where('country_iso = \'' . $this->database()->escape($sIso) . '\'')
			->execute('getRow');			
			
		if (!isset($aCountry['country_iso']))
		{
			return false;
		}
		
		$aChildren = $this->database()->select('*')
			->from(Phpfox::getT('country_child'))
			->where('country_iso = \'' . $this->database()->escape($sIso) . '\'')
			->execute('getRows');
			
		if (!count($aChildren))
		{
			return false;
		}
		
		$oXmlBuilder = Phpfox::getLib('xml.builder');
		$oXmlBuilder->addGroup('country');
		$oXmlBuilder->addGroup('info');
		$oXmlBuilder->addTag('iso', $aCountry['country_iso']);
		$oXmlBuilder->addTag('name', $aCountry['name']);
		$oXmlBuilder->closeGroup();
		
		if (count($aChildren))
		{
			$oXmlBuilder->addGroup('children');			
			foreach ($aChildren as $aChild)
			{
				$oXmlBuilder->addTag('child', $aChild['name']);					
			}			
			$oXmlBuilder->closeGroup();
		}
		$oXmlBuilder->closeGroup();
				
		$sCacheName = 'country_export_cache_' . md5($aCountry['country_iso'] . PHPFOX_TIME) . '.xml';
		
		Phpfox::getLib('file')->writeToCache($sCacheName, $oXmlBuilder->output());
		
		return array(
			'name' => $aCountry['country_iso'],
			'file' => $sCacheName
		);
	}
	
	public function getChild($iChildId)
	{
		static $bIsChecked = false;
		
		if ($bIsChecked === false)
		{
			$sCacheId = $this->cache()->set('country_child_' . Phpfox::getLib('locale')->getLangId());
			
			if (!($this->_aChildren = $this->cache()->get($sCacheId)))
			{
				$aRows = $this->database()->select('child_id, name')
					->from(Phpfox::getT('country_child'))					
					->execute('getRows');			
					
				foreach ($aRows as $aRow)
				{
					$this->_aChildren[$aRow['child_id']] = (Phpfox::getLib('locale')->isPhrase('core.translate_country_child_' . strtolower($aRow['child_id'])) ? Phpfox::getPhrase('core.translate_country_child_' . strtolower($aRow['child_id'])) : $aRow['name']);
				}
				
				$this->cache()->save($sCacheId, $this->_aChildren);
			}
			
			$bIsChecked = true;
		}
		
		return (isset($this->_aChildren[$iChildId]) ? Phpfox::getPhraseT($this->_aChildren[$iChildId], 'country_child') : '');
	}
	
	public function getValidChildId($sCountry, $iChild)
	{
		$aChildrens = $this->getChildren($sCountry);
		if (!count($aChildrens))
		{
			return 0;
		}
		
		return $iChild;
	}
	
	public function getChildren($sCountry)
	{		
		$sCacheId = $this->cache()->set('country_child_' . $sCountry . '_' . Phpfox::getLib('locale')->getLangId());
		
		if (!($aChilds = $this->cache()->get($sCacheId)))
		{
			$aChildren = $this->database()->select('child_id, name')
				->from(Phpfox::getT('country_child'))
				->where('country_iso = \'' . $this->database()->escape($sCountry) . '\'')
				->order('ordering ASC, name ASC')	
				->execute('getRows');	
				
			$aChilds = array();
			foreach ($aChildren as $aChild)
			{
				$aChilds[$aChild['child_id']] = (Phpfox::getLib('locale')->isPhrase('core.translate_country_child_' . strtolower($aChild['child_id'])) ? Phpfox::getPhrase('core.translate_country_child_' . strtolower($aChild['child_id'])) : $aChild['name']);
			}	
			
			$this->cache()->save($sCacheId, $aChilds);
		}
		
		if (!is_array($aChilds))
		{
			$aChilds = array();
		}
		
		return $aChilds;	
	}
	
	public function getForEdit($sIso = null)
	{
		if ($sIso !== null)
		{
			$this->database()->where('c.country_iso = \'' . $this->database()->escape($sIso) . '\'');
		}
		return $this->database()->select('c.*, COUNT(cc.child_id) AS total_children')
			->from(Phpfox::getT('country'), 'c')
			->leftJoin(Phpfox::getT('country_child'), 'cc', 'cc.country_iso = c.country_iso')
			->group('c.country_iso')
			->order('c.ordering ASC, c.name ASC')
			->execute(($sIso == null ? 'getRows' : 'getRow'));
	}
	
	public function getChildForEdit($sIso)
	{
		return $this->database()->select('cc.*')
			->from(Phpfox::getT('country_child'), 'cc')		
			->where('cc.country_iso = \'' . $this->database()->escape($sIso) . '\'')	
			->order('cc.ordering ASC, cc.name ASC')
			->execute('getRows');
	}	
	
	public function getChildEdit($iId)
	{
		return $this->database()->select('cc.*')
			->from(Phpfox::getT('country_child'), 'cc')
			->where('cc.child_id = ' . (int) $iId)			
			->execute('getRow');
	}		
	
	/**
	 * If a call is made to an unknown method attempt to connect
	 * it to a specific plug-in with the same name thus allowing 
	 * plug-in developers the ability to extend classes.
	 *
	 * @param string $sMethod is the name of the method
	 * @param array $aArguments is the array of arguments of being passed
	 */
	public function __call($sMethod, $aArguments)
	{
		/**
		 * Check if such a plug-in exists and if it does call it.
		 */
		if ($sPlugin = Phpfox_Plugin::get('core.service_country_country__call'))
		{
			return eval($sPlugin);
		}
			
		/**
		 * No method or plug-in found we must throw a error.
		 */
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
}

?>