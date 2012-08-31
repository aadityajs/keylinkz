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
 * @package 		Phpfox_Ajax
 * @version 		$Id: ajax.class.php 3533 2011-11-21 14:07:21Z Raymond_Benc $
 */
class Feed_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function getEditBar()
	{
		Phpfox::getBlock('feed.setting');

		$this->html('#js_edit_block_' . $this->get('block_id'), $this->getContent(false))->slideDown('#js_edit_block_' . $this->get('block_id'));
	}

	public function addComment()
	{
		Phpfox::isUser(true);

		$aVals = (array) $this->get('val');

		if (Phpfox::getLib('parse.format')->isEmpty($aVals['user_status']))
		{
			$this->alert(Phpfox::getPhrase('user.add_some_text_to_share'));
			$this->call('$Core.activityFeedProcess(false);');
			return;
		}

		/* Check if user chose an egift */
		if (isset($aVals['egift_id']) && !empty($aVals['egift_id']))
		{
			/* is this gift a free one? */
			$aGift = Phpfox::getService('egift')->getEgift($aVals['egift_id']);
			if (!empty($aGift))
			{
				$bIsFree = true;
				foreach ($aGift['price'] as $sCurrency => $fVal)
				{
					if ($fVal > 0)
					{
						$bIsFree = false;
					}
				}
				/* This is an important change, in v2 birthday_id was the mail_id, in v3
				 * birthday_id is the feed_id
				*/
				$aVals['feed_type'] = 'feed_egift';
				$iId = Phpfox::getService('feed.process')->addComment($aVals);
				// Always make an invoice, so the feed can check on the state
				$iInvoice = Phpfox::getService('egift.process')->addInvoice($iId, $aVals['parent_user_id'], $aGift);

				if (!$bIsFree)
				{
					Phpfox::getBlock('api.gateway.form',
							array('gateway_data' => array(
									'item_number' => 'egift|' . $iInvoice,
									'currency_code' => Phpfox::getService('user')->getCurrency(),//Phpfox::getService('core.currency')->getDefault(),
									'amount' => $aGift['price'][Phpfox::getService('user')->getCurrency()],
									'item_name' => 'egift card with message: ' . $aVals['user_status'] . '',
									'return' => Phpfox::getLib('url')->makeUrl('friend.invoice'),
									'recurring' => 0,
									'recurring_cost' => '',
									'alternative_cost' => 0,
									'alternative_recurring_cost' => 0
							)));
					$this->call('$("#js_activity_feed_form").hide().after("' . $this->getContent(true) . '");');
				}
				else
				{
					// egift is free
					Phpfox::getService('feed')->processAjax($iId);
				}
			}

		}
		else
		{
			if (isset($aVals['user_status']) && ($iId = Phpfox::getService('feed.process')->addComment($aVals)))
			{
				Phpfox::getService('feed')->processAjax($iId);
			}
			else
			{
				$this->call('$Core.activityFeedProcess(false);');
			}
		}

	}

	public function viewMore()
	{
		Phpfox::getBlock('feed.display');

		$this->remove('#feed_view_more');
		$this->append('#js_feed_content', $this->getContent(false));
		$this->call('$Core.loadInit();');
	}

	public function rate()
	{
		Phpfox::isUser(true);

		list($sRating, $iLastVote) = Phpfox::getService('feed.process')->rate($this->get('id'), $this->get('type'));
		Phpfox::getBlock('feed.rating', array(
				'sRating' => (int) $sRating,
				'iFeedId' => $this->get('id'),
				'bHasRating' => true,
				'iLastVote' => $iLastVote
			)
		);
		$this->html('#js_feed_rating' . $this->get('id'), $this->getContent(false));
	}

	public function delete()
	{
		if (Phpfox::getService('feed.process')->deleteFeed($this->get('id'), $this->get('module'), $this->get('item')))
		{
			$this->slideUp('#js_item_feed_' . $this->get('id'));
			$this->alert(Phpfox::getPhrase('feed.feed_successfully_deleted'), Phpfox::getPhrase('feed.feed_deletion'), 300, 150, true);
		}
		else
		{
			$this->alert(Phpfox::getPhrase('feed.unable_to_delete_this_entry'));
		}
	}

	public function getCommentText()
	{
		$aRow = Phpfox::getService('feed')->getFeed($this->get('feed_id'));

		(($sPlugin = Phpfox_Plugin::get('feed.component_ajax_getcommenttext')) ? eval($sPlugin) : false);

		if (!isset($bHasPluginCall))
		{
			$this->call("$('#js_quick_edit_id" . $this->get('id') . "').html('<textarea style=\"width:95%; height:80px;\" name=\"quick_edit_input\" cols=\"90\" rows=\"10\" id=\"js_quick_edit" . $this->get('id') . "\">" . str_replace("'", "\'", Phpfox::getLib('parse.output')->ajax($aRow['content'])) . "</textarea>');");
		}
	}

	public function updateFeedText()
	{
		$sTxt = $this->get('quick_edit_input');

		if (Phpfox::getLib('parse.format')->isEmpty($sTxt))
		{
			$this->alert(Phpfox::getPhrase('comment.add_some_text_to_your_comment'));

			return false;
		}

		if (Phpfox::getService('feed.process')->updateCommentText($this->get('feed_id'), $sTxt))
		{
			Phpfox::getLib('parse.output')->setImageParser(array('width' => 200, 'height' => 200));
			if (Phpfox::getParam('core.allow_html'))
			{
				$sTxt = Phpfox::getLib('parse.output')->parse(Phpfox::getLib('parse.input')->prepare($sTxt));
			}
			else
			{
				$sTxt = Phpfox::getLib('parse.output')->parse($sTxt);
			}
			Phpfox::getLib('parse.output')->setImageParser(array('clear' => true));

			$this->html('#' . $this->get('id'), $sTxt, '.highlightFade()');
		}
	}

	public function like()
	{
		if (Phpfox::getService('feed.process')->like($this->get('feed_id'), $this->get('type_id')))
		{
			list($aLikesCount, $aLikes) = Phpfox::getService('feed')->getLikeForFeed($this->get('feed_id'));

			if (count($aLikes))
			{
				$this->template()->assign(array(
						'aFeed' => array(
							'feed_id' => $this->get('feed_id'),
							'like_rows' => $aLikes[$this->get('feed_id')],
							'like_count' => ($aLikesCount[$this->get('feed_id')] - count($aLikes[$this->get('feed_id')]))
						)
					)
				);

				$this->template()->getTemplate('feed.block.like');

				$this->html('#js_feed_like_holder_' . $this->get('feed_id'), $this->getContent(false));
				$this->call('$(\'#js_feed_like_holder_' . $this->get('feed_id') . '\').parents(\'.comment_mini_content_holder:first\').show();');
			}
			else
			{
				$this->html('#js_feed_like_holder_' . $this->get('feed_id'), '');
				$this->call('$(\'#js_feed_like_holder_' . $this->get('feed_id') . '\').parents(\'.comment_mini_content_holder:first\').hide();');
			}
		}
	}

	public function likeList()
	{
		Phpfox::getBlock('feed.like-list');
	}

	public function reloadActivityFeed()
	{
        $aParts = explode(',', $this->get('reload-ids'));
		$aRows = Phpfox::getService('feed')->get(null, null, 0);

		$iNewCnt = 0;
		$sLoadIds = '';
		$aIds = array();
		foreach ($aParts as $sPart)
		{
			$iPart = (int) trim($sPart);

			$aIds[$iPart] = $iPart;
		}


		foreach ($aRows as $aRow)
		{
			if (!in_array($aRow['feed_id'], $aIds))
			{
				$iNewCnt++;

				$sLoadIds .= $aRow['feed_id'] . ',';
			}
		}

		$this->call('$Core.rebuildActivityFeedCount(' . (int) $iNewCnt . ', \'' . $sLoadIds . '\');');
		$this->call('setTimeout("$.ajaxCall(\'feed.reloadActivityFeed\', \'reload-ids=\' + $Core.getCurrentFeedIds(), \'GET\');", ' . (Phpfox::getParam('feed.refresh_activity_feed') * 1000) . ');');
	}

	public function approveComment()
	{
        Phpfox::isUser(true);
		Phpfox::getUserParam('comment.can_moderate_comments', true);
		Phpfox::getService('feed.process')->approve($this->get('feed_id'));
	}

    public function appendMore()
    {
		$aRows = Phpfox::getService('feed')->get();

		$sCustomIds = '';
		foreach ($aRows as $aRow)
		{
			$sCustomIds .= $aRow['feed_id'];
			$this->template()->assign(array(
					'aFeed' => $aRow
				)
			);
			$this->template()->getTemplate('feed.block.entry');
		}

		$sIds = 'js_feed_' . md5($sCustomIds);

		$this->call('$(\'.js_parent_feed_entry\').each(function(){$(this).removeClass(\'row_first\');});');
		$this->prepend('#js_new_feed_update', '<div id="' . $sIds . '" style="display:none;">' . $this->getContent(false) . '</div>');
		$this->hide('#activity_feed_updates_link_holder');
		$this->slideDown('#' . $sIds);
		$this->call('$Core.loadInit();');
    }


	public function test() {
    	$this->alert('HIii!!!');
    }

    /**
     * @author Aditya Jyoti Saha
     * @name popDetails()
     *
     */

    public function popDetails() {
    	alert (hi);
		$param = explode('::', $this->get('propId'));
		$propId = $param[0];
		$propTitle = $param[1];

		$adiPropData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate WHERE realestate_id = '.$propId);
		$adiPropDataset = mysql_fetch_array($adiPropData);

		foreach ($adiPropDataset as $key => $value) {

			if (!is_numeric($key) && 	($key == 'no_of_rooms' ||
										$key == 'no_of_bathrooms' ||
										$key == 'price_per_month' ||
										$key == 'total_price' ||
										$key == 'address' ||
										$key == 'year_build' ||
										$key == 'last_sold' ||
										$key == 'parking' ||
										$key == 'cooling' ||
										$key == 'heating' ||
										$key == 'fireplace' ||
										$key == 'exterior_material' ||
										$key == 'fenced_yard' ||
										$key == 'parcel_no' ||
										$key == 'per_floor_sqft'
										)){

			$html .= '<div><div style="width: 200px; height:25px; float:left;"><b>'.ucwords(str_ireplace('_', ' ', $key)).' : </b></div> '.$value.'</div><br/>';
			}
		}


    	//$this->alert($html, $propTitle, 700, 300);
    	$this->alert($propId);

    }

	/**
 	 * Hides the Advanced Search Box
     * @author Aditya Jyoti Saha
     * @name hideAdvSearch()
     *
     */
    public function hideAdvSearch () {
		$this->slideUp('#advSearchDiv');
		$this->slideDown('#showAdvSearchDiv');
    }


	/**
 	 * Shows the Advanced Search Box
     * @author Aditya Jyoti Saha
     * @name hideAdvSearch()
     *
     */
    public function showAdvSearch () {
		$this->slideDown('#advSearchDiv');
		$this->slideUp('#showAdvSearchDiv');
    }

	/**
 	 * Show the Advanced Search Options
     * @author Aditya Jyoti Saha
     * @name hideAdvSearch()
     *
     */
    public function showAdvSearchOption () {
		$this->slideDown('#AdvSearchOption');
		$this->show('#advSearchBtnClose');
		$this->hide('#advSearchBtn');

    }


	/**
 	 * Hides the Advanced Search Options
     * @author Aditya Jyoti Saha
     * @name hideAdvSearch()
     *
     */
    public function hideAdvSearchOption () {
		$this->slideUp('#AdvSearchOption');
		$this->hide('#advSearchBtnClose');
		$this->show('#advSearchBtn');
    }

	/**
 	 * Advanced Search function.<br/>
 	 * Here we Go @work!
     * @author Aditya Jyoti Saha
     * @name AdvSearch()
     *
     */
    public function AdvSearch() {
		$searchKeyword = $this->get('searchKeyword');
		if ($searchKeyword == '') {
			$this->softNotice('Please enter a search term');
			$this->slideDown('#advSearchResult')->html('#advSearchResult', '');
		}
		else {
		$latLngSearchSql = "SELECT * FROM keylinkz_realestate WHERE
															realestate_title	LIKE '%$searchKeyword%' OR
															realestate_desc LIKE '%$searchKeyword%' OR
															address LIKE '%$searchKeyword%'
															ORDER BY realestate_title ASC LIMIT 0,12";
		$latLngSearchRow = mysql_query($latLngSearchSql);

		$latLngData = '{"latlng": [';
		while($row=mysql_fetch_array($latLngSearchRow))
		{
		$lat=$row['lat'];
		$lng=$row['lng'];

		$latLngData.= '

		{

		"lat":"'.$lat.'",

		"lng":"'.$lng.'"

		},';
		}

		/*
		 *
		 * $latLngData .='<script type="text/javascript">
	      function initialize() {
	        var center = new google.maps.LatLng(41.850033, -87.6500523);
	        var map = new google.maps.Map(document.getElementById(\'SearchMap\'), {
	          zoom: 3,
	          zoomControl: true,
	          zoomControlOptions: {
	              style: google.maps.ZoomControlStyle.LARGE,
	              position: google.maps.ControlPosition.TOP_RIGHT
	          },
	          center: center,
	          streetViewControl: false,
	          mapTypeControl: false,
	          mapTypeId: google.maps.MapTypeId.HYBRID
	        });

	        var markers = [];
	        for (var i = 0; i < 100; i++) {
	            var dataPhoto = data.photos[i];
	            var latLng = new google.maps.LatLng(dataPhoto.latitude,
	                dataPhoto.longitude);
	            var marker = new google.maps.Marker({
	              position: latLng
	            });
	            markers.push(marker);
	          }
	        var markerCluster = new MarkerClusterer(map, markers);
	      }
	      google.maps.event.addDomListener(window, \'load\', initialize);
	    </script>';
		 */


		//keylinkz/module/feed/static/jscript/	Phpfox::getLib('url')->getDomain().

/*
 *		$myFile = $_SERVER[DOCUMENT_ROOT]."keylinkz/module/feed/static/jscript/testFile.txt";
		$fh = fopen($myFile, 'w');
		$stringData = "Bobby Bopper\n";
		fwrite($fh, $stringData);
		$stringData = "Tracy Tanner\n";
		fwrite($fh, $stringData);
		fclose($fh);

 *
 */

		$latLngData.= ']}';

		$myFile = $_SERVER[DOCUMENT_ROOT]."keylinkz/module/feed/static/jscript/testFile.txt";
		$fh = fopen($myFile, 'w');
		//$stringData = "Bobby Bopper\n";
		fwrite($fh, $latLngData);
		//$stringData = "Tracy Tanner\n";
		//fwrite($fh, $stringData);
		fclose($fh);

		$searchSql = "SELECT * FROM keylinkz_realestate WHERE
															realestate_title	LIKE '%$searchKeyword%' OR
															realestate_desc LIKE '%$searchKeyword%' OR
															address LIKE '%$searchKeyword%'
															ORDER BY realestate_title ASC LIMIT 0,12";
		$searchRow = mysql_query($searchSql);
		$searchRowCount = mysql_num_rows($searchRow);

		//write search data to JSON file





		$listHtml = '<div class="listing_left" style="width: 100%;">
				<div class="clear"><img src="'.PHPFOX_DIR_DEFAULT_THEME.'spacer.gif" alt="" width="1" height="20">Search for "'.$searchKeyword.'"</div>
		';

		while ($searchRes = mysql_fetch_array($searchRow)) {

			// Listing start

			$listHtml .= '

				<div class="listing_bg" style="width: 100%; margin: 10px 0 0px 0;">
				<div class="listing_bgl"><a href="'.Phpfox::getLib('url')->makeUrl('realestate').'id_'.$searchRes[realestate_id].'"><img src="'.PHPFOX_REALESTAE_IMAGE_UPLOAD.$searchRes[image_path].'" alt="" width="97" height="68" class="border1"></a></div>
				<div class="listing_bgm"  style="width: 60%;">
				<div>
				<p><a href="'.Phpfox::getLib('url')->makeUrl('realestate').'id_'.$searchRes[realestate_id].'">'.$searchRes[realestate_title].'</a></p>
				</div>
				<div>
				  <table width="390" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                      <td width="49%"><table width="100" border="0" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                          <td><span>Home For '.($searchRes[is_sale] == Y? 'Sale':'Rent').': &pound;'. ($searchRes[is_sale] == Y? number_format($searchRes[total_price]) : number_format($searchRes[price_per_month])) .'</span></td>
                        </tr>
                        <!-- <tr>
                          <td><p>See current rates</p></td>
                        </tr> -->
                        <tr>
                          <td><img src="images/spacer.gif" alt="" width="1" height="7"></td>
                        </tr>
                        <tr>
                          <td><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                              <td width="80" valign="top"><span>Share Listing:</span></td>
                              <td width="21"><img src="module/feed/static/image/facebook_16.png" /></td>
                              <td width="19"><img src="module/feed/static/image/share-twitter.png" /></td>
                              <td width="19"><img src="module/feed/static/image/google-plus.png" width="16" height="16"/></td>
                              <td width="41"><a class="" href="#"><img src="'.PHPFOX_DIR_DEFAULT_THEME.'more.gif" alt="" width="35" height="18" border="0" /></a></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                      <td width="22%"><table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                          <td><span>Beds: '.$searchRes[no_of_rooms].'</span></td>
                        </tr>
                        <tr>
                          <td><span>Baths: '.$searchRes[no_of_bathrooms].'</span></td>
                        </tr>
                        <tr>
                          <td><span>Sqft: '.$searchRes[total_square_foot].'</span></td>
                        </tr>
                        <!-- <tr>
                          <td><span>Lot: 12,000</span></td>
                        </tr> -->
                      </tbody></table></td>
                      <td width="29%"><table width="130" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <!-- <tr>
                          <td><span>Days on KeyLinkz: 22</span></td>
                        </tr> -->
                        <tr>
                          <td><span>Built: '.$searchRes[year_build].'</span></td>
                        </tr>
                        <tr>
                          <td><span>'.$searchRes[realestate_type].'</span></td>
                        </tr>
                        <tr>
                          <td><span>Price/sqft: --</span></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table>
				</div>
				</div>
				<!-- <div class="listing_bgr">
				<ul>
				<li><img src="'.PHPFOX_DIR_DEFAULT_THEME.'spacer.gif" alt="" width="19" height="19"></li>
				<li><img src="'.PHPFOX_DIR_DEFAULT_THEME_ICON.'icon8.gif" alt="" width="19" height="19"></li>
				<li><img src="'.PHPFOX_DIR_DEFAULT_THEME_ICON.'icon9.gif" alt="" width="19" height="19"></li>
				<li><img src="'.PHPFOX_DIR_DEFAULT_THEME_ICON.'icon10.gif" alt="" width="19" height="19"></li>
				</ul>
				</div> -->
				</div>

		';

			// Listing ends
		}

		$listHtml .= '</div>';

		if ($searchRowCount > 0 ) {
			$this->slideDown('#advSearchResult')->html('#advSearchResult', $latLngData.$listHtml);
		}
		else {
			$this->slideDown('#advSearchResult')->html('#advSearchResult', '');
			$this->slideDown('#advSearchResult')->html('#advSearchResult', 'No Result found, Try a new search.');
		}

		}

		//$this->alert($this->get('searchKeyword'));
    }



}

?>