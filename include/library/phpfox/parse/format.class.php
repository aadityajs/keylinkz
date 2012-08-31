<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Common String Handling
 * This class is used to run common methods on strings or do sanity checks on a string.
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: format.class.php 1879 2010-09-30 09:56:12Z Raymond_Benc $
 */
class Phpfox_Parse_Format
{
	/**
	 * Checks if a given string is serialized or not.
	 *
	 * @param string $sData Data to check.
	 * @return bool TRUE if string is serialized, FALSE if not.
	 */
	public function isSerialized($sData) 
	{		
		if (!is_string($sData))
		{
			return false;
		}
		
		$sData = trim($sData);
		
		if ('N;' == $sData)
		{
			return true;
		}
		
		if (!preg_match('/^([adObis]):/', $sData, $aMatches))
		{
			return false;
		}
		
		switch ($aMatches[1]) 
		{
			case 'a' :
			case 'O' :
			case 's' :
				if (preg_match("/^{$aMatches[1]}:[0-9]+:.*[;}]\$/s", $sData))
				{
					return true;
				}
				break;
			case 'b' :
			case 'i' :
			case 'd' :
				if (preg_match("/^{$aMatches[1]}:[0-9.E-]+;\$/", $sData ))
				{
					return true;
				}
				break;
			default:
				
				break;			
		}
		
		return false;
	}	
	
	/**
	 * Uses the class DOMDocument to clean HTML and make it valid XHTML.
	 *
	 * @link http://php.net/manual/en/class.domdocument.php 
	 * @param string $sStr String we need to parse.
	 * @return string Parsed string withn clean valid XHTML code.
	 */
	public function validXhtml($sStr)
	{
		if (class_exists('DOMDocument'))
		{
			static $oDoc = null;
			
			if ($oDoc === null)
			{
				$oDoc = new DOMDocument('1.0');
			}
			
			Phpfox_Error::skip(true);	
			$oDoc->loadHTML($sStr);			
			$sStr = $oDoc->saveHTML();
			$sStr = preg_replace('/^<!DOCTYPE.+?>/i', '', $sStr);
			$sStr = trim($sStr);
			if (substr($sStr, 0, 12) == '<html><body>')
			{
				$sStr = substr_replace($sStr, '', 0, 12);
			}
			if (substr($sStr, -14) == '</body></html>')
			{
				$sStr = substr_replace($sStr, '', -14);
			}					
			Phpfox_Error::skip(false);			
		}
		
		return $sStr;
	}
	
	/**
	 * Does a check to make sure a string is really not empty. This takes the PHP function
	 * empty a little further.
	 *
	 * @see empty()
	 * @param string $sStr String to check if it is empty or not.
	 * @return bool TRUE if string is empty, FALSE if not.
	 */
	public function isEmpty($sStr)
	{		
		$bEmpty = false;		
	
		if (preg_match("/&\#160;/i", Phpfox::getLib('parse.input')->clean($sStr)) && strlen(preg_replace_callback("/&\#160;/is", array($this, '_checkIfEmpty'), Phpfox::getLib('parse.input')->clean($sStr))) === 0)
		{
			$bEmpty = true;
		}	
		
		$sStr = preg_replace('/&nbsp;/i', '', $sStr);
		$sStr = preg_replace('/&nbsp/i', '', $sStr);
		$sStr = preg_replace('/&#160/i', '', $sStr);
		$sStr = preg_replace('/<img(.*?)>/is', '', $sStr);
		$sStr = preg_replace('/<a(.*?)><\/a>/is', '', $sStr);
		$sStr = str_replace('<p><br _mce_bogus="1"></p>', '', $sStr);

		if (strlen(preg_replace('/\s\s+/', '', $sStr)) === 0)
		{
			$bEmpty = true;
		}	
		
		return $bEmpty;
	}
	
	/**
	 * Hide the email service that is part of an email.
	 *
	 * Usage:
	 * <code>
	 * echo Phpfox::getLib('parse.format')->hideEmail('foo@bar.com');
	 * // Will output: foo@___.com
	 * </code>
	 * 
	 * @param string $sEmail Email to remove the email service.
	 * @return string Email without the email service.
	 */
	public function hideEmail($sEmail)
	{
		if (!strpos($sEmail, '@'))
		{
			return $sEmail;
		}
		
		$aParts = explode('@', $sEmail);
		$aSubParts = explode('.', $aParts[1]);
		return $aParts[0] . '@____' . $aSubParts[1];
	}
	
	/**
	 * Parse PHP code with the correct amount of backslashes when storing it in a flat file.
	 *
	 * @param string $sCode PHP code to parse.
	 * @return string Parsed PHP code with the new backslashes in place.
	 */
	public function phpCode($sCode)
	{
		$sCode = str_replace('\\', '\\\\', $sCode);
		
		return $sCode;
	}
	
	/**
	 * Converting PHP htmlspecialchars()
	 *
	 * @see htmlspecialchars()
	 * @param string $sString String to convert.
	 * @return string Converted string to HTML.
	 */
	public function unhtmlspecialchars($sString)
	{
  		$sString = str_replace('&amp;', '&', $sString);
  		$sString = str_replace('&lt;', '<', $sString);
  		$sString = str_replace('&gt;', '>', $sString);
  		$sString = str_replace('&quot;', '"', $sString);
		$sString = str_replace('&#39;', '\'', $sString);
    	$sString = str_replace('&#039;', '\'', $sString);

  		return $sString;
	}	
	
	/**
	 * Check done via a callback within the isEmpty() method to see if a string is empty or not.
	 *
	 * @see self::isEmpty()
	 * @param array $aMatches ARRAY of matches passed by the callback.
	 * @return string If string is empty we an emptry string, if not we return 1.
	 */
	private function _checkIfEmpty($aMatches)
	{		
		if ($aMatches[0] == '&#160;')
		{
			return '';
		}
		return '1';
	}	
}

?>