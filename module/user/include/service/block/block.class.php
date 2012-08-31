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
 * @package 		Phpfox_Service
 * @version 		$Id: block.class.php 1496 2010-03-05 17:15:05Z Raymond_Benc $
 */
class User_Service_Block_Block extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('user_blocked');	
	}
	
	public function isBlocked($iUserId, $iBlockedUserId)
	{
		static $aCache = array();
		
		if (!isset($aCache[$iUserId][$iBlockedUserId]))
		{
			$aCache[$iUserId][$iBlockedUserId] = (int) $this->database()->select('COUNT(*)')
				->from($this->_sTable)
				->where('user_id = ' . (int) $iUserId . ' AND block_user_id = ' . (int) $iBlockedUserId)
				->execute('getSlaveField');		
		}
		
		return $aCache[$iUserId][$iBlockedUserId];
	}
	
	public function get($iUserId = null)
	{
		if ($iUserId === null)
		{
			$iUserId = Phpfox::getUserId();
		}
		
		return $this->database()->select('ub.block_user_id, ' . Phpfox::getUserField())
			->from($this->_sTable, 'ub')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = ub.block_user_id')
			->where('ub.user_id = ' . (int) $iUserId)
			->execute('getSlaveRows');		
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
		if ($sPlugin = Phpfox_Plugin::get('user.service_block_block__call'))
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