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
 * @package  		Module_Feed
 * @version 		$Id: display.class.php 3836 2011-12-22 14:37:57Z Miguel_Espinoza $
 */
class Feed_Component_Block_Display extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		/*
		echo $this->request()->get('type')."==========";
		exit;
		*/

		$iUserId = $this->getParam('user_id');
		$bIsCustomFeedView = false;
		$sCustomViewType = null;

		if (PHPFOX_IS_AJAX && ($iUserId = $this->request()->get('profile_user_id')))
		{
			if (!defined('PHPFOX_IS_USER_PROFILE'))
			{
				define('PHPFOX_IS_USER_PROFILE', true);
			}
			$aUser = Phpfox::getService('user')->get($iUserId);

			$this->template()->assign(array(
					'aUser' => $aUser
				)
			);
		}

		if (PHPFOX_IS_AJAX && $this->request()->get('callback_module_id'))
		{
			$aCallback = Phpfox::callback($this->request()->get('callback_module_id') . '.getFeedDisplay', $this->request()->get('callback_item_id'));
			$this->setParam('aFeedCallback', $aCallback);
		}

		$aFeedCallback = $this->getParam('aFeedCallback', null);

		$bIsProfile = (is_numeric($iUserId) && $iUserId > 0);

		if ($this->request()->get('feed') && $bIsProfile)
		{
			switch ($this->request()->get('flike'))
			{
				default:
					if ($sPlugin = Phpfox_Plugin::get('feed.component_block_display_process_flike'))
					{
						eval($sPlugin);
					}
					break;
			}
		}

		if (defined('PHPFOX_IS_USER_PROFILE') && !Phpfox::getService('user.privacy')->hasAccess($iUserId, 'feed.view_wall'))
		{
			return false;
		}

		if (defined('PHPFOX_IS_PAGES_VIEW') && !Phpfox::getService('pages')->hasPerm(null, 'pages.share_updates'))
		{
			$aFeedCallback['disable_share'] = true;
		}

		$iFeedPage = $this->request()->get('page', 0);

		if ($this->request()->getInt('status-id')
			|| $this->request()->getInt('comment-id')
			|| $this->request()->getInt('link-id')
			|| $this->request()->getInt('poke-id')
			|| $this->request()->getInt('feed')
		)
		{
			$bIsCustomFeedView = true;
			if ($this->request()->getInt('status-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.status_update_iid',array('iId' => $this->request()->getInt('status-id')));
			}
			elseif ($this->request()->getInt('link-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.link_iid',array('iId' => $this->request()->getInt('link-id')));
			}
			elseif ($this->request()->getInt('poke-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.poke_iid',array('iId' =>$this->request()->getInt('poke-id')));
			}
			elseif ($this->request()->getInt('comment-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.wall_comment_iid',array('iId' => $this->request()->getInt('comment-id')));

				Phpfox::getService('notification.process')->delete('feed_comment_profile', $this->request()->getInt('comment-id'), Phpfox::getUserId());
			}
			elseif ($this->request()->getInt('feed'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.feed');
			}
		}

		if ((!isset($aFeedCallback['item_id']) || $aFeedCallback['item_id'] == 0))
		{
			$aFeedCallback['item_id'] = ((int)$this->request()->get('amp;callback_item_id')) > 0 ? $this->request()->get('amp;callback_item_id') : $this->request()->get('callback_item_id');
		}
		$aRows = Phpfox::getService('feed')->callback($aFeedCallback)->get(($bIsProfile > 0 ? $iUserId : null), ($this->request()->get('feed') ? $this->request()->get('feed') : null), $iFeedPage);
		if (empty($aRows))
		{
			$iFeedPage++;
			$aRows = Phpfox::getService('feed')->callback($aFeedCallback)->get(($bIsProfile > 0 ? $iUserId : null), ($this->request()->get('feed') ? $this->request()->get('feed') : null), $iFeedPage);
		}

		if (($this->request()->getInt('status-id')
				|| $this->request()->getInt('comment-id')
				|| $this->request()->getInt('link-id')
				|| $this->request()->getInt('poke-id')
			)
			&& isset($aRows[0]))
		{
			$aRows[0]['feed_view_comment'] = true;
			$this->setParam('aFeed', array_merge(array('feed_display' => 'view', 'total_like' => $aRows[0]['feed_total_like']), $aRows[0]));
		}

		(($sPlugin = Phpfox_Plugin::get('feed.component_block_display_process')) ? eval($sPlugin) : false);

		if ($bIsCustomFeedView && !count($aRows) && $bIsProfile)
		{
			$aUser = $this->getParam('aUser');

			$this->url()->send($aUser['user_name'], null, Phpfox::getPhrase('feed.the_activity_feed_you_are_looking_for_does_not_exist'));
		}

		$iUserid = ($bIsProfile > 0 ? $iUserId : null);
		$iTotalFeeds = (int) Phpfox::getComponentSetting(($iUserid === null ? Phpfox::getUserId() : $iUserid), 'feed.feed_display_limit_' . ($iUserid !== null ? 'profile' : 'dashboard'), Phpfox::getParam('feed.feed_display_limit'));

		if (!Phpfox::isMobile())
		{
			$this->template()->assign(array(
					'sHeader' => Phpfox::getPhrase('feed.activity_feed')
				)
			);
		}

		$this->template()->assign(array(
				'aFeeds' => $aRows,
				'iFeedNextPage' => ($iFeedPage + 1),
				'iFeedCurrentPage' => $iFeedPage,
				'iTotalFeedPages' => 1,
				'aFeedVals' => $this->request()->getArray('val'),
				'sCustomViewType' => $sCustomViewType,
				'aFeedStatusLinks' => Phpfox::getService('feed')->getShareLinks(),
				'aFeedCallback' => $aFeedCallback,
				'bIsCustomFeedView' => $bIsCustomFeedView
			)
		);

		/**
		 * @author Aditya jyoti Saha
		 */

		// Get data


		/*if(!empty(Phpfox::getLib('request')->get('type')))
		{
			if(Phpfox::getLib('request')->get('type') == 'rent')
			{
				$sql = "SELECT * FROM keylinkz_realestate WHERE is_rent ='Y' and is_sale='N'";
				$adiPropData = Phpfox::getLib('database')->query($sql);
			}

			if(Phpfox::getLib('request')->get('type') == 'sale')
			{
				$sql = "SELECT * FROM keylinkz_realestate WHERE is_rent ='N' and is_sale='Y'";
				$adiPropData = Phpfox::getLib('database')->query($sql);
			}

		}

		else
		{ */


		//echo Phpfox::getLib('request')->getInt('fav');
		//echo $type = Phpfox::getLib('request')->get('type');
		//exit;
			if(Phpfox::getLib('request')->getInt('fav') == 1)
			{
				$sql_fav_1 = 'SELECT * FROM keylinkz_realestate_favourite_list WHERE user_id='.Phpfox::getUserBy('user_id');
				$result_fav_1 = Phpfox::getLib('database')->query($sql_fav_1);
				$j=0;

				while($row_fav_1 = mysql_fetch_array($result_fav_1))
				{
					$property[$j] = $row_fav_1["property_id"];
					$j++;
				}

				//echo '<pre>'.print_r($property,true).'</pre>';
				$str_property = implode(',',$property);
				$sql_fav = 'SELECT * FROM keylinkz_realestate WHERE realestate_id IN ('.$str_property.')';
				$adiPropData = Phpfox::getLib('database')->query($sql_fav);
			}
			else
			{
				if(strtolower($_SERVER['REQUEST_METHOD']) == 'post')
				{
					//echo '<pre>'.print_r($_POST,true).'</pre>';
					//exit;
					$search = $_POST["search"][0];
					$sql_search = 'SELECT * FROM keylinkz_realestate WHERE realestate_title LIKE "%'.$search.'%" or realestate_desc LIKE "%'.$search.'%"';
					$adiPropData = Phpfox::getLib('database')->query($sql_search);
				}
				else
				{
						//$adiPropData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate');
						if(Phpfox::getLib('request')->get('type') == 'rent')
						{
							$sqlRent = "SELECT * FROM keylinkz_realestate WHERE is_rent ='Y' and is_sale='N'";
							$adiPropData = Phpfox::getLib('database')->query($sqlRent);
						}

						if(Phpfox::getLib('request')->get('type') == 'sale')
						{
							$sqlSale = "SELECT * FROM keylinkz_realestate WHERE is_rent ='N' and is_sale='Y'";
							$adiPropData = Phpfox::getLib('database')->query($sqlSale);
						}

				}
			}
		/*} */


		$i = 0;
		while($adiPropRow = mysql_fetch_array($adiPropData)) {

			$adiPropList[$i]["id"] = $adiPropRow["realestate_id"];
			$adiPropList[$i]["title"] = $adiPropRow["realestate_title"];
			$adiPropList[$i]["desc"] = $adiPropRow["realestate_desc"];
			$adiPropList[$i]["no_of_rooms"] = $adiPropRow["no_of_rooms"];
			$adiPropList[$i]["no_of_bathrooms"] = $adiPropRow["no_of_bathrooms"];
			$adiPropList[$i]["total_square_foot"] = $$adiPropRow["total_square_foot"];
			$adiPropList[$i]["is_rent"] = $adiPropRow["is_rent"];
			$adiPropList[$i]["is_sale"] = $adiPropRow["is_sale"];
			$adiPropList[$i]["price_per_month"] = $adiPropRow["price_per_month"];
			$adiPropList[$i]["total_price"] = $adiPropRow["total_price"];
			$adiPropList[$i]["image"] = $adiPropRow["image_path"];
			$adiPropList[$i]["agent_id"] = $adiPropRow["agent_id"];
			$i++;

		}

		//echo '<pre>'.print_r($adiPropList,true).'</pre>';
		//exit;

		//echo '<pre>'.print_r($adiPropList,true).'</pre>';
		//echo "=============";
		//echo '<pre>'.print_r($_SESSION,true).'</pre>';
		//exit;
		// Assign template vars
		$this->template()->assign('adiPropList',$adiPropList);
		$this->template()->assign('userID', Phpfox::getUserBy('user_id'));
		/* ----------------------------------------------------
		@author : Priyam Ghosh
		@function : get latest property listing
		------------------------------------------------------*/


		//$propertyData = Phpfox::getService('feed.feed')->getLatestPropertyListing();
		//echo '<pre>'.print_r($propertyData,true).'</pre>';
		//exit;

		$result = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate ORDER BY date_added DESC LIMIT 0,4');
		$i=0;
		while($row = mysql_fetch_array($result))
		{
			$dataProperty[$i]["id"] = $row["realestate_id"];
			$dataProperty[$i]["title"] = $row["realestate_title"];
			$dataProperty[$i]["realestate_desc"] = substr($row["realestate_desc"],0,60);
			$dataProperty[$i]["image"] = $row["image_path"];
			$i++;
		}


		$this->template()->assign('propertyData',$dataProperty);

		/* ----------------------------------------------------
		@author : Priyam Ghosh
		@function : get latest property listing
		------------------------------------------------------*/


		if ($bIsProfile)
		{
			if (!Phpfox::getService('user.privacy')->hasAccess($iUserId, 'feed.display_on_profile'))
			{
				return false;
			}
		}

		return 'block';



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

		//$this->template()->setHeader('<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>');
		//$this->template()->setHeader('markercluster.css', 'module_realestate');
		//$this->template()->setHeader('<script type="text/javascript" src="http://aditya/keylinkz/module/feed/static/jscript/markerclusterer.js"></script>');
		//$this->template()->setHeader('data.json', 'module_realestate');
	}

	public function clean()
	{
		$this->template()->clean(array(
				'sHeader',
				'aFeeds',
				'sBoxJsId'
			)
		);
	}
}

?>