<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

Phpfox::getLibClass('phpfox.gateway.interface');

/**
 * API Gateway Layer
 * Handles all API requests to interact with 3rd party payment gateway
 * sites like PayPal, 2checkout.
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: gateway.class.php 1666 2010-07-07 08:17:00Z Raymond_Benc $
 */
final class Phpfox_Gateway
{
	/**
	 * Holds an ARRAY of API objects
	 *
	 * @var array
	 */
	private $_aObject = array();
	
	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
	}
	
	/**
	 * Loads a specific payment gateway API class
	 *
	 * @param string $sGateway Gateway API ID
	 * @param array $aSettings ARRAY of custom settings to pass along to the gateway class
	 * @return object Returns the object of the API gateway class
	 */
	public function load($sGateway, $aSettings = null)
	{
		if (!isset($this->_aObject[$sGateway]))
		{
			$sFilePath = PHPFOX_DIR_LIB_CORE . 'gateway' . PHPFOX_DS . 'api' . PHPFOX_DS . $sGateway . '.class.php';
	
			$this->_aObject[$sGateway] = (file_exists($sFilePath) ? Phpfox::getLib('gateway.api.' . $sGateway) : false);
			
			if ($aSettings !== null && $this->_aObject[$sGateway] !== false)
			{
				$this->_aObject[$sGateway]->set($aSettings);
			}
		}		
		
		return $this->_aObject[$sGateway];
	}
	
	/**
	 * Creates the API callback URL for a specific gateway.
	 *
	 * @param string $sGateway Gateway ID
	 * @return string Full path to the callback location for this specific gateway
	 */
	public function url($sGateway)
	{
		return Phpfox::getLib('phpfox.url')->makeUrl('api.gateway.callback', array($sGateway));
	}
}

?>