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
 * @package 		Phpfox_Component
 * @version 		$Id: list.class.php 1604 2010-05-31 06:42:26Z Raymond_Benc $
 */
class Realestate_Component_Controller_Applylease extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{



		//Phpfox::isUser(true);
		$this->template()-> assign('foo','bar');


		/**
		 * @author Aditya jyoti Saha
		 * @method adiGetPropDetails()
		 *
		 */

		// Get data
		function adiGetPropDetails($PropId) {
		$adiPropData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate WHERE realestate_id='.$PropId );

		$adiPropDet = mysql_fetch_array($adiPropData);
		return $adiPropDet;
		}

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiGetUser()
		 */
		function adiGetUser($userId) {
			$adiUserData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_user WHERE user_id='.$userId );
			return $adiUserDet = mysql_fetch_array($adiUserData);
		}

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiDateDiff()
		 */

		function adiDateDiff($startDate) {
			$date1 = $startDate;
			$date2 = date("Y-m-d H:i:s");	//2012-04-05 06:45:19

			$diff = abs(strtotime($date2) - strtotime($date1));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			return printf("%d years, %d months, %d days\n", $years, $months, $days);
		}



		/**
		 * @author Aditya Jyoti Saha
		 * @name adiExcerpt()
		 */

		function adiExcerpt($text, $toChars) {

			$text = strip_tags($text);

			if ($toChars == "" || $toChars == 0) $toChars = 300;

			if (strlen($text) > $toChars) {
			  $text = substr($text, 0, $toChars);
			  $text = substr($text,0,strrpos($text," "));
			  $etc = " ...";
			  $excerptedText = $text.$etc;
			  }
			return $excerptedText;
		}



		/**
		 * @author Aditya Jyoti Saha
		 * Custom methods and template vars assignment.
		 */
		function adiGetUserImage($userId) {

		// User profile detail
		$qImage = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_user WHERE user_id ='.$userId);
		$imageData = mysql_fetch_array($qImage);

			if ($imageData[user_image] == NULL) {
				return Phpfox::getLib('url')->getDomain()."theme/frontend/default/style/default/image/noimage/profile.png";
			}
			else {

				$image = explode('.', $imageData['user_image']);
				$imageName = explode('%', $image[0]);
				$finalImage = $imageName[0].'.'.$image[1];

				return Phpfox::getLib('url')->getDomain().'file/pic/user/'.$finalImage;
			}

		}

		$property_id = Phpfox::getLib('request')->getInt('id');
		$this->template()->assign('property_id', $property_id);
		$this->template()->setHeader('style.css', 'module_realestate');


		$this->template()->setHeader('jRating.jquery.css', 'module_realestate');
		$this->template()->setHeader('jquery.js', 'module_realestate');
		$this->template()->setHeader('jRating.jquery.js', 'module_realestate');
		$this->template()->setHeader('jrating-sample.js', 'module_realestate');

	}

	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.

	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('realestate.component_controller_list_clean')) ? eval($sPlugin) : false);
	}*/
}

?>