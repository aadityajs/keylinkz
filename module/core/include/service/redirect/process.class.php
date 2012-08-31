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
 * @version 		$Id: process.class.php 1496 2010-03-05 17:15:05Z Raymond_Benc $
 */
class Core_Service_Redirect_Process extends Phpfox_Service
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		
	}

	/**
	 * Adds a redirection rule
	 * @param string $sRedirect Table table that stores the redirections
	 * @param string $sOldTitle Previous title
	 * @param string $sNewTitle New title
	 * @param integer $iItemId Item id (blog_id, poll_id, etc)
	 * @param string $sItemTable Database table that stores the main item
	 * @param string $sItemField Field in $sItemTable that stores the title_url of the item
	 * @return boolean Success
	 */
	public function addRedirect($sRedirectTable, $sOldTitle, $sNewTitle, $iItemId, $sItemTable, $sItemField)
	{
		if ($sOldTitle == $sNewTitle)
		{
			return Phpfox_Error::set('Titles are not different');;// this should never happen
		}
		// check if the new title is in use at sItemTable
		$iExisting = $this->database()->select('COUNT(' . $sItemField . ')')
				->from($sItemTable)
				->where($sItemField . ' = "' . $sNewTitle . '"')
				->execute('getSlaveField');
		if ($iExisting > 0)
		{
			return Phpfox_Error::set('This should not happen'); // this should never happen
		}

		// check for cyclic redirects
		$aRedirects = $this->database()->select('*')
				->from($sRedirectTable)
				->where('old_title = "' . $sNewTitle .'"')
				->execute('getSlaveRows');
		
		if (count($aRedirects) > 0)
		{
				return Phpfox_Error::set('This redirect would cause a loop');
				
		}

	    $this->database()->insert($sRedirectTable, array(
			'old_title' => $sOldTitle,
			'new_title' => $sNewTitle,
			'item_id' => (int)$iItemId
		));
		return true;
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
		if ($sPlugin = Phpfox_Plugin::get('core.service_redirect_process__call'))
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