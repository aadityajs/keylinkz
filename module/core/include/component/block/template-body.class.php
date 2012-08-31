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
 * @package 		Phpfox_Component
 * @version 		$Id: template-body.class.php 2817 2011-08-08 16:59:43Z Raymond_Benc $
 */
class Core_Component_Block_Template_Body extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiDateDiff()
		 */

		function adiDateDiff($startDate) {
			$date1 = $startDate;
			$date2 = date("Y-m-d H:i:s");	//2012-04-05 06:45:19

			$diff = abs(strtotime($date2) - strtotime($date1));

			//$years = floor($diff / (365*60*60*24));
			//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			//return printf("%d years, %d months, %d days\n", $years, $months, $days);
			return $days;
		}


		/**
		 * @author Aditya Jyoti Saha
		 * Custom methods and template vars assignment.
		 */


		// User profile detail
		$adiUserProfileImage = Phpfox::getLib('image.helper')->display(array_merge(array('user' => Phpfox::getService('user')->getUserFields(true)), array(
					'path' => 'core.url_user',
					'file' => Phpfox::getUserBy('user_image'),
					'suffix' => '_50_square',
					'max_width' => 25,
					'max_height' => 25
				)
			)
		);

		$adiGroup = Phpfox::getService('user.group')->getGroup(Phpfox::getUserBy('user_group_id'));

		// Assign template vars
		$this->template()->assign(array(
				'adiUserProfileImage' => $adiUserProfileImage,
				'adiUserProfileUrl' => $this->url()->makeUrl('profile', Phpfox::getUserBy('user_name')), // Create the users profile URL
				'adiCurrentUserName' => Phpfox::getLib('parse.output')->shorten(Phpfox::getLib('parse.output')->clean(Phpfox::getUserBy('full_name')), 50, '...'), // Get the users display name
				'adiCurrentTimeStamp' => Phpfox::getTime(Phpfox::getParam('core.global_welcome_time_stamp'), PHPFOX_TIME), // Get the current time stamp
				'adiTotalActivityPoints' => (int) Phpfox::getUserBy('activity_points'),
				'adiTotalProfileViews' => (int) Phpfox::getUserBy('total_view'),
				'adiUserGroupFullName' => Phpfox::getLib('locale')->convert($adiGroup['title'])
			)
		);


		$i=0;
		$arrData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate');
		while($row = mysql_fetch_array($arrData))
		{

			$data[$i]["id"] = $row["realestate_id"];
			$data[$i]["title"] = $row["realestate_title"];
			$data[$i]["desc"] = $row["realestate_desc"];
			$data[$i]["no_of_rooms"] = $row["no_of_rooms"];
			$data[$i]["no_of_bathrooms"] = $row["no_of_bathrooms"];
			$data[$i]["total_square_foot"] = $row["total_square_foot"];
			$data[$i]["is_rent"] = $row["is_rent"];
			$data[$i]["is_sale"] = $row["is_sale"];
			$data[$i]["price_per_month"] = $row["price_per_month"];
			$data[$i]["total_price"] = $row["total_price"];
			$data[$i]["image"] = $row["image_path"];
			$data[$i]["date_added"] = $row["date_added"];
			$i++;

		}


		$count = count($data);
		$count_half = intval($count/2);

		if($count%2 != 0)
		{
			$count_half_left = $count_half+1;
			$count_half_right = $count - $count_half_left;
		}
		else
		{
			$count_half_left = $count_half;
			$count_half_right = $count - $count_half_left;
		}


		for($i=0; $i<$count_half_left; $i++)
		{
			$data_left[$i]["id"] = $data[$i]["id"];
			$data_left[$i]["title"] = $data[$i]["title"];
			$data_left[$i]["desc"] = $data[$i]["desc"];
			$data_left[$i]["no_of_rooms"] = $data[$i]["no_of_rooms"];
			$data_left[$i]["no_of_bathrooms"] = $data[$i]["no_of_bathrooms"];
			$data_left[$i]["total_square_foot"] = $data[$i]["total_square_foot"];
			$data_left[$i]["is_rent"] = $data[$i]["is_rent"];
			$data_left[$i]["is_sale"] = $data[$i]["is_sale"];
			$data_left[$i]["price_per_month"] = $data[$i]["price_per_month"];
			$data_left[$i]["image"] = $data[$i]["image"];
			$data_left[$i]["date_added"] = $data[$i]["date_added"];
			$data_left[$i]["on_keylinkz"] = adiDateDiff($data[$i]["date_added"]);
		}


		for($j=$count_half_left; $j<$count; $j++)
		{
			$data_right[$j]["id"] = $data[$j]["id"];
			$data_right[$j]["title"] = $data[$j]["title"];
			$data_right[$j]["desc"] = $data[$j]["desc"];
			$data_right[$j]["no_of_rooms"] = $data[$j]["no_of_rooms"];
			$data_right[$j]["no_of_bathrooms"] = $data[$j]["no_of_bathrooms"];
			$data_right[$j]["total_square_foot"] = $data[$j]["total_square_foot"];
			$data_right[$j]["is_rent"] = $data[$j]["is_rent"];
			$data_right[$j]["is_sale"] = $data[$j]["is_sale"];
			$data_right[$j]["price_per_month"] = $data[$j]["price_per_month"];
			$data_right[$j]["total_price"] = $data[$j]["total_price"];
			$data_right[$j]["image"] = $data[$j]["image"];
			$data_right[$j]["date_added"] = $data[$j]["date_added"];
			$data_right[$j]["on_keylinkz"] = adiDateDiff($data[$j]["date_added"]);
		}



		//echo '<pre>'.print_r($data_left,true).'</pre>';
		//exit;

		$this->template()->assign('foo', 'bar');
		$this->template()->assign('real_estate_left', $data_left);
		$this->template()->assign('real_estate_right', $data_right);

		$this->template()->assign('count_left', $count_half_left);
		$this->template()->assign('count_right', $count_half_right);
		//$this->template()->assign('real_estate_count', count($data));


		/**
		 * Get the Displayed users user id
		 * @author Aditya Jyoti Saha
		 *
		 */
		function adiGetDisplayedUserId() {

			$displayedUserName = Phpfox::getLib('url')->getUrl(Phpfox::getUserBy('user_name'));
			//echo reset(explode('/', end(explode('=/', Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'))))));
			$userIdSql = "SELECT * FROM keylinkz.`keylinkz_user` WHERE user_name = '$displayedUserName'";
			$userIdRes = mysql_fetch_array(mysql_query($userIdSql));
			echo $userIdRes['user_id'];
		}

		/**
		 * Get the Displayed users user name
		 * @author Aditya Jyoti Saha
		 *
		 */
		function adiGetDisplayedUserName() {

			echo $displayedUserName = Phpfox::getLib('url')->getUrl(Phpfox::getUserBy('user_name'));
		}

		/**
		 * Get the Displayed users Group id
		 * @author Aditya Jyoti Saha
		 *
		 */
		function adiGetDisplayedUserGroupId() {

			$displayedUserName = Phpfox::getLib('url')->getUrl(Phpfox::getUserBy('user_name'));
			//echo reset(explode('/', end(explode('=/', Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'))))));
			$userIdSql = "SELECT * FROM keylinkz.`keylinkz_user` WHERE user_name = '$displayedUserName'";
			$userIdRes = mysql_fetch_array(mysql_query($userIdSql));
			return $userIdRes['user_group_id'];
		}


		/**
		 * Get the Displayed users Total Activity Points/Contributions
		 * @author Aditya Jyoti Saha
		 *
		 */
		function adiGetDisplayedUserActPoint() {

			$displayedUserName = Phpfox::getLib('url')->getUrl(Phpfox::getUserBy('user_name'));
			//echo reset(explode('/', end(explode('=/', Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'))))));
			$userIdSql = "SELECT * FROM keylinkz.`keylinkz_user` WHERE user_name = '$displayedUserName'";
			$userIdRes = mysql_fetch_array(mysql_query($userIdSql));
			$userIdRes['user_id'];

			$userActPointSql = "SELECT * FROM  `keylinkz_user_activity` WHERE user_id = $userIdRes[user_id]";
			$userActPointRes = mysql_fetch_array(mysql_query($userActPointSql));
			if ($userActPointRes['activity_points'] <= 0 ) {
				return 0;
			} else {
				return $userActPointRes['activity_points'];
			}
		}





		/**
		 *
		 * Get the badge related to each user profiles.
		 * @param $groupName
		 * @author Aditya Jyoti Saha
		 */

		function adiGetProfileBadge($groupId) {
			//{php} echo $userGroup; {/php}
			//echo $groupId;


			if ($groupId == 1) {		//"Administrator"
				$icon = PHPFOX_DIR_DEFAULT_THEME_ICON.'keylinkz.png';
				return '<img alt="" src="'.$icon.'">';
			}

			elseif ($groupId == 2) {		//"Professional - Agent"
				$icon = PHPFOX_DIR_DEFAULT_THEME_ICON.'agent.png';
				if ( adiGetDisplayedUserActPoint() >= 0 ) {	//100
					$greenBadge = PHPFOX_DIR_DEFAULT_THEME_ICON.'img02a.png';
					return '<img alt="" src="'.$icon.'">&nbsp;<img alt="" src="'.$greenBadge.'">';
				}
				return '<img alt="" src="'.$icon.'">';
			}

			elseif ($groupId == 3) {		//"Professional - Member"
				$icon = PHPFOX_DIR_DEFAULT_THEME_ICON.'member.png';

				if ( adiGetDisplayedUserActPoint() >= 0 ) {	//100
					$icon = PHPFOX_DIR_DEFAULT_THEME_ICON.'member.png';
					$greenBadge = PHPFOX_DIR_DEFAULT_THEME_ICON.'img02a.png';
					return '<img alt="" src="'.$icon.'">&nbsp;<img alt="" src="'.$greenBadge.'">';

					/*
					 * if ( adiGetDisplayedUserActPoint() >= 100 ) {	//100
						$greenBadge = PHPFOX_DIR_DEFAULT_THEME_ICON.'img02a.png';
						return '<img alt="" src="'.$icon.'">&nbsp;<img alt="" src="'.$greenBadge.'">';
					}
					 */

					//return '<img alt="" src="'.$icon.'">';
				}
				//return '<img alt="" src="'.$icon.'">';
			}


		}	// End function adiGetProfileBadge()






	}

	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('core.component_block_template_body_clean')) ? eval($sPlugin) : false);
	}
}

?>