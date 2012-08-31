<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Service
 * @version 		$Id: api.class.php 2900 2011-08-26 09:18:42Z Raymond_Benc $
 */
class Friend_Service_Api extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('friend');
		$this->_oApi = Phpfox::getService('api');		
	}
	
	public function getFriends()
	{	
		if ((int) $this->_oApi->get('user_id') === 0)
		{
			$iUserId = $this->_oApi->getUserId();
		}
		else
		{
			$iUserId = $this->_oApi->get('user_id');
		}		
		
		if ($this->_oApi->isAllowed('friend.get_friends') == false)
		{
			return $this->_oApi->error('friend.get_friends', 'User did not to view friends list');
		}
		$iCnt = $this->database()->select('COUNT(*)')
			->from($this->_sTable, 'f')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = f.friend_user_id')
			->where('f.is_page = 0 AND f.user_id = ' . (int) $iUserId)
			->execute('getSlaveField');
		
		$this->_oApi->setTotal($iCnt);
		$aRows = $this->database()->select('u.user_id, u.user_name, u.full_name, u.joined, u.user_image, u.country_iso, u.gender')
			->from($this->_sTable, 'f')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = f.friend_user_id')
			->where('f.is_page = 0 AND f.user_id = ' . (int) $iUserId)
			->limit($this->_oApi->get('page'), 10, $iCnt)
			->execute('getSlaveRows');
		
		$aFriends = array();
		foreach ($aRows as $iKey => $aRow)
		{
			if (!$this->_oApi->isAllowed('user.get_full_name', null, $aRow['user_id']))
			{
				unset($aRows[$iKey]['full_name']);	
			}				

			if (!$this->_oApi->isAllowed('user.get_email', null, $aRow['user_id']))
			{
				unset($aRows[$iKey]['email']);	
			}			
			
			$sImagePath = $aRow['user_image'];
			
			$aRows[$iKey]['photo_50px'] = Phpfox::getLib('image.helper')->display(array(
					'user' => $aRow,
					'suffix' => '_50',
					'return_url' => true
				)
			);
			
			$aRows[$iKey]['photo_50px_square'] = Phpfox::getLib('image.helper')->display(array(
					'user' => $aRow,
					'suffix' => '_50_square',
					'return_url' => true
				)
			);			
			
			$aRows[$iKey]['photo_120px'] = Phpfox::getLib('image.helper')->display(array(
					'user' => $aRow,
					'suffix' => '_120',
					'return_url' => true
				)
			);		
			
			$aRows[$iKey]['photo_original'] = Phpfox::getLib('image.helper')->display(array(
					'user' => $aRow,
					'suffix' => '',
					'return_url' => true
				)
			);	
			
			$aRows[$iKey]['gender'] = ($aRow['gender'] == '1' ? 'Male' : 'Female');
			$aRows[$iKey]['profile_url'] = Phpfox::getLib('url')->makeUrl($aRow['user_name']);
			
			unset($aRows[$iKey]['user_image']);			
		}
			
		return $aRows;
	}
	
	public function isFriend()
	{
		if ((int) $this->_oApi->get('user_id') === 0)
		{
			$iUserId = $this->_oApi->getUserId();
		}
		else
		{
			$iUserId = $this->_oApi->get('user_id');
		}		
		
		if ((int) $this->_oApi->get('friend_user_id') === 0)
		{
			return $this->_oApi->error('friend.method_requires_friend_user_id', 'This method requires "friend_user_id".');
		}		
		
		$iCheck = (int) $this->database()->select('COUNT(*)')
			->from($this->_sTable)
			->where('user_id = ' . (int) $iUserId . ' AND friend_user_id = ' . (int) $this->_oApi->get('friend_user_id'))
			->execute('getSlaveField');
		
		return array(
			'is_friend' => ($iCheck ? true : false)
		);
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
		if ($sPlugin = Phpfox_Plugin::get('friend.service_api__call'))
		{
			eval($sPlugin);
			return;
		}
			
		/**
		 * No method or plug-in found we must throw a error.
		 */
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
}

?>