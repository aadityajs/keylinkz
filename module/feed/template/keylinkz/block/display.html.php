<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 3773 2011-12-13 12:02:32Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if defined('PHPFOX_IS_USER_PROFILE') && defined('PHPFOX_IS_AJAX') && Phpfox::getLib('request')->get('type') == ('rent' || 'sale') && Phpfox::isUser(true)}
<!-- <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-b77f1f2d-df-251-4a4c-c94a81b0c043"}); </script> -->

<!-- {if empty($aSearchTool) && !is_array($aSearchTool)}
		<div class="header_bar_menu">
			{if isset($aSearchTool.search)}
			<div class="header_bar_search">
				<form method="post" action="{$aSearchTool.search.action}">
					<div><input type="hidden" name="search[submit]" value="1" /></div>
					<div class="header_bar_search_holder">
						<div class="header_bar_search_default">{$aSearchTool.search.default_value}</div>
						<input type="text" name="search[{$aSearchTool.search.name}]" value="{if isset($aSearchTool.search.actual_value)}{$aSearchTool.search.actual_value|clean}{else}{$aSearchTool.search.default_value}{/if}"{if isset($aSearchTool.search.actual_value)}class="input_focus" {/if}/>
						<div class="header_bar_search_input"></div>
					</div>
				</form>
			</div>
			{/if}

			{if !Phpfox::isMobile() && isset($aSearchTool.filters) && count($aSearchTool.filters)}
			<div class="header_filter_holder">
				{foreach from=$aSearchTool.filters key=sSearchFilterName item=aSearchFilters}
				<div class="header_bar_float">
					<div class="header_bar_drop_holder">
						<ul class="header_bar_drop">
							<li><span>{$sSearchFilterName}:</span></li>
							<li><a href="#" class="header_bar_drop">{if isset($aSearchFilters.active_phrase)}{$aSearchFilters.active_phrase}{else}{$aSearchFilters.default_phrase}{/if}</a></li>
						</ul>
						<div class="clear"></div>
						<div class="action_drop_holder">
							<ul class="action_drop"{if isset($aSearchFilters.height)} style="height:{$aSearchFilters.height}; overflow:auto;"{/if}>
							{foreach from=$aSearchFilters.data item=aSearchFilter}
								<li><a href="{$aSearchFilter.link}" class="ajax_link {if isset($aSearchFilter.is_active)}active{/if}"{if isset($aSearchFilters.width)} style="width:{$aSearchFilters.width};"{/if}>{$aSearchFilter.phrase}</a></li>
							{/foreach}
							</ul>
						</div>
					</div>
				</div>
				{/foreach}
				<div class="clear"></div>
			</div>
			{/if}
		</div>
		{/if} -->


<div class="listing_box">
				<div class="listing_left">
				<div class="search_bg3">
				<div class="search_left2">
				<!-- <ul>
				<li><input type="text" class="search2" value="Search..." name="textfield2"/></li>
				<li><input type="submit" name="Submit" class="search_btn2" value=""/></li>
				</ul> -->
				<div class="header_bar_search">


                    <form method="post" action="">
                        <div><input type="hidden" name="search[submit]" value="1" /></div>
                        <div class="header_bar_search_holder">
                            <div class="header_bar_search_default">{$aSearchTool.search.default_value}</div>
                            <input type="text" name="search[{$aSearchTool.search.name}]" value="{if isset($aSearchTool.search.actual_value)}{$aSearchTool.search.actual_value|clean}{else}{$aSearchTool.search.default_value}{/if}"{if isset($aSearchTool.search.actual_value)}class="input_focus" {/if}/>
                            <div class="header_bar_search_input"></div>
                        </div>
                    </form>


				</div>
				</div>
				<!-- <div style="float:right; margin: 7px auto;">
				<ul>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="4" height="1" /></li>
				<li><select name="select" class="styled">
					  <option value="1">Sort By</option>
					  <option value="1">Sort By 1</option>
					  <option value="1">Sort By 2</option>
					  <option value="1">Sort By 3</option>
					  <option value="1">Sort By 4</option>
		          </select></li>
				  <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="4" height="1" /></li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}view.gif" alt="" width="20" height="22" hspace="3" /></li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="4" height="1" /></li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}view1.gif" alt="" width="20" height="22" hspace="3" /></li>
				</ul>
				</div> -->
				</div>
				<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="10" /></div>

			{foreach from=$adiPropList item=listProp}
				<div class="listing_bg">
				<div class="listing_bgl">
                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$listProp.id}"><img src="{php} echo PHPFOX_REALESTAE_IMAGE_UPLOAD; {/php}{$listProp.image}" alt="" width="97" height="68" class="border1"/></a>
                </div>
				<div class="listing_bgm">
				<div>
				<p><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$listProp.id}">{$listProp.title}</a></p>
				</div>
				<div>
				  <table width="390" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="49%"><table width="100" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
                          	{if $listProp.is_rent eq 'Y'}
                                <span>Home For Rent:${$listProp.price_per_month}/month</span>
                                {else}
                                <span>Home For Sale:${$listProp.total_price}</span>
                                {/if}
                          </td>
                        </tr>
                        <tr>
                          <td><p>See current rates</p></td>
                        </tr>
                        <tr>
                          <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="7" /></td>
                        </tr>
                        <tr>
                          <td><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="80" valign="top"><span>Share Listing:</span></td>
                              <td width="21" colspan="3"><!--<img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon4.gif" alt="" width="11" height="11" /></td>
                              <td width="19"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon5.gif" alt="" width="11" height="11" hspace="4" /></td>
                              <td width="19"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon6.gif" alt="" width="11" height="11" hspace="4" /></td>
                              <td width="41">
                              	 <a href="#"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}more.gif" alt="" width="41" height="18" border="0" /></a>
								<span class='st_sharethis_large' displayText='ShareThis'></span>
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_twitter_large' displayText='Tweet'></span>
								<span class='st_linkedin_large' displayText='LinkedIn'></span>
								<span class='st_email_large' displayText='Email'></span>
								<span class='st_pinterest_large' displayText='Pinterest'></span>
								<span class='st_bebo_large' displayText='Bebo'></span>
								<span class='st_blogger_large' displayText='Blogger'></span>
								<span class='st_tumblr_large' displayText='Tumblr'></span>
								<span class='st_technorati_large' displayText='Technorati'></span>
								<span class='st_reddit_large' displayText='Reddit'></span>
								<span class='st_googleplus_large' displayText='Google +1'></span>
								<span class='st_digg_large' displayText='Digg'></span>
								<span class='st_delicious_large' displayText='Delicious'></span>-->

								<!-- AddThis Button BEGIN -->
								<script type="text/javascript">
									/*
									var addthis_config =
									{
										  ui_cobrand: "Joystiq"
									}
									*/
								</script>
                                <!--
 								<meta property="og:title" content="AddThis Tour" />
								<meta property="og:description" content="Watch the AddThis Tour video." />
								<meta property="og:image" content="http://i2.ytimg.com/vi/1F7DKyFt5pY/default.jpg" />
								<meta property="og:video" content="http://www.youtube.com/v/1F7DKyFt5pY&fs=1" />
								<meta property="og:video:width" content="560" />
								<meta property="og:video:height" content="340" />
								<meta property="og:video:type" content="application/x-shockwave-flash" />

								<div class="addthis_toolbox addthis_default_style " addthis:url="{php} echo Phpfox::getLib('url')->makeUrl('realestate'); {/php}add/id_{$listProp.id}">
								<a class="addthis_button_facebook"></a>
								<a class="addthis_button_twitter"></a>
								<a class="addthis_button_linkedin"></a>
								<a class="addthis_button_compact"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}more.gif" alt="" width="35" height="18" border="0" /></a>
								<!--<a href="http://www.addthis.com/bookmark.php" class="addthis_button_email">
						        <img src="http://s7.addthis.com/button1-email.gif" width="54" height="16" border="0" alt="Email" /></a>
								<a class="addthis_counter addthis_bubble_style"></a> -->
                                <!--</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8bcbfd70c726e4"></script>
								<!-- AddThis Button END -->
								<img src="module/feed/static/image/facebook_16.png" />
                                <img src="module/feed/static/image/share-twitter.png" />
                                <img src="module/feed/static/image/google-plus.png" width="16" height="16"/>
                                <a class="addthis_button_compact"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}more.gif" alt="" width="35" height="18" border="0" /></a>
                              </td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                      <td width="22%"><table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><span>Beds: {$listProp.no_of_rooms}</span></td>
                        </tr>
                        <tr>
                          <td><span>Baths: {$listProp.no_of_bathrooms}</span></td>
                        </tr>
                        <tr>
                          <td><span>Sqft: {$listProp.total_square_foot}</span></td>
                        </tr>
                        <tr>
                          <td><span>Lot: 12,000</span></td>
                        </tr>
                      </table></td>
                      <td width="29%"><table width="130" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><span>Days on KeyLinkz: 22</span></td>
                        </tr>
                        <tr>
                          <td><span>Built: 1941</span></td>
                        </tr>
                        <tr>
                          <td><span>Multi Family</span></td>
                        </tr>
                        <tr>
                          <td><span>Price/sqft: --</span></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
				</div>
				</div>
				<div class="listing_bgr">
				<ul>



                {if $userID eq $listProp.agent_id}
                <li><a href="{php} echo Phpfox::getLib('url')->makeUrl('realestate'); {/php}add/id_{$listProp.id}"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon7.gif" alt="" width="19" height="19" /></a></li>
                {else}
                <li><br /></li>
                {/if}





				<li><a target="_blank" href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}print/id_{$listProp.id}"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon8.gif" alt="" width="19" height="19" /></a></li>
				<li><a href="javascript: void(0);" onclick="$.ajaxCall('feed.popDetails', 'propId={$listProp.id}::{$listProp.title}');"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon9.gif" title="View Details" width="19" height="19" /></a></li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon10.gif" alt="" width="19" height="19" /></li>
				</ul>
				</div>
				</div>
			{/foreach}
<a href="javascript: void(0);" onClick="$.ajaxCall('feed.test');">aaa</a>
        </div>
<!-- && Phpfox::getLib('url')->getUrl().'type_rent' == Phpfox::getLib('url')->getUrl().'/type_rent' -->
				{block location='3'}

                <!-- LATEST LISTING
				<div class="listing_right">
				<div class="listing_righttop">
				<ul>
				<li>Latest Listings</li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="19" height="1"/></li>
				<li><a href="#">See all</a></li>
				</ul>
				</div>
				<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="10"/></div>


                {foreach from=$propertyData item=latest}

				<div class="listing_rightbot">
				<div class="listing_leftbg">
                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$latest.id}"><img src="{php} echo PHPFOX_REALESTAE_IMAGE_UPLOAD; {/php}{$latest.image}" alt="" width="70" height="55" /></a>
                </div>
				<div class="listing_rightbg">
				<p><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$latest.id}">{$latest.title}</a></p>
				<p><span>{$latest.realestate_desc}....</span></p>
				<p style="text-align:right; padding-right: 4px;"><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$latest.id}">View</a></p>
				</div>
				</div>

                {/foreach}



				<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="10"/></div>
				<div><a href="#"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}perl.jpg" alt="" width="206" height="197" border="0" /></a></div>
				</div>-->
                <!-- LATEST LISTING -->



				</div>



{else}

{if Phpfox::isUser() && !PHPFOX_IS_AJAX && $sCustomViewType === null}
{if (Phpfox::getUserBy('profile_page_id') >= 0 && defined('PHPFOX_IS_USER_PROFILE')) || (isset($aFeedCallback.disable_share) && $aFeedCallback.disable_share) || (defined('PHPFOX_IS_USER_PROFILE') && !Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'feed.share_on_wall'))}

{else}

<!-- Advanced serch area Starts -->

{literal}

<style type="text/css">

      #map-container {
        padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
        width: 475px;
      }

      #SearchMap {
        width: 470px;
        height: 300px;
      }

</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/keylinkz/module/feed/static/jscript/markerclusterer.js"></script>
<script type="text/javascript" src="/keylinkz/module/feed/static/jscript/data.json"></script>

<script type="text/javascript">
      function initialize() {
        var center = new google.maps.LatLng(41.850033, -87.6500523);
        var map = new google.maps.Map(document.getElementById('SearchMap'), {
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
     google.maps.event.addDomListener(window, 'load', initialize);

    </script>


{/literal}

<div class="fr" id="showAdvSearchDiv" onclick="$.ajaxCall('feed.showAdvSearch');" style="display: none; height: 20px; cursor: pointer;"><span style="line-height: 20px;">Advance Search</span><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}arrow_down_black.png" height="20px" width="20px" style="margin-top: -0px;"/> </div>
<div class="clear"></div>

<div class="" id="advSearchDiv">
	<div id="maincontainer">
		<span class="fr"><div style="position:absolute; right:0px;" class="delete_btn" onclick="$.ajaxCall('feed.hideAdvSearch');">&nbsp;</div></span>
		<div class="tab_base">
			<div class="tab">
			             <ul>
			                <li><a href="#">Sales</a></li>
			                <li><a href="#">Rentals</a></li>
			                <li><a href="#">Forclosure</a></li>
			                <li><a href="#">Rooms/Shares</a></li>
			      </ul>
				</div>
			<div class="clear"></div>

			 <div class="base_box">
	             <div class="content_box">
					 <div>
					 <input name="advSearchKeyword" id="advSearchKeyword" type="text" onkeyup="$.ajaxCall('feed.AdvSearch','searchKeyword='+$('#advSearchKeyword').val());" value="Neighborhood or City or Zip Code or Address" class="search_field" onclick="this.value='';"/>
					 <input type="button" name="SearchButton" id="SearchButton" onclick="$.ajaxCall('feed.AdvSearch','searchKeyword='+$('#advSearchKeyword').val());" value="Search" class="search_btn" />
					 </div>
					 <div class="advance_search" id="advSearchBtn" onclick="$.ajaxCall('feed.showAdvSearchOption');">Advanced Search:<img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}advance_img.png" border="0" alt="" /></div>
					 <div class="advance_search" style="display: none;" id="advSearchBtnClose" onclick="$.ajaxCall('feed.hideAdvSearchOption');">Hide Options<img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}advance_img.png" border="0" alt="" /></div>
					 <div class="clear"></div>
					 <div class="">
					 	<div id="map-container"><div id="SearchMap"></div></div>
					 </div>
					 <div id="AdvSearchOption" class="" style="display: none;">Options will come soon...</div>
					 <div class="clear"></div>

					 <div class="" style="display: none;" id="advSearchResult">
					 	Result
					 </div>
					 <div class="clear"></div>


				 </div>
			 </div>
			<div class="clear"></div>
			<!--  <div class="base_box">

			 </div> -->
			 <div class="clear"></div>
		</div>
	</div>
<!--
Activity Point: {php} echo Phpfox::getUserBy('activity_points'){/php}<br/>{$adiTotalActivityPoints}
View Point: {php} echo Phpfox::getUserBy('total_view'){/php}<br/>{$adiTotalProfileViews}
User URL: {$adiUserProfileUrl}
User Group: {$adiUserGroupFullName}
 -->

</div>
<!-- Advanced serch area Ends -->

<div class="activity_feed_form_share">
	<div class="activity_feed_form_share_process">{img theme='ajax/add.gif' class='v_middle'}</div>
	<ul class="activity_feed_form_attach">
		{if !Phpfox::isMobile()}
		<li class="share">{phrase var='feed.share'}:</li>
		{/if}
		{if isset($aFeedCallback.module)}
		<li><a href="#" style="background:url('{img theme='misc/comment_add.png' return_url=true}') no-repeat center left;" rel="global_attachment_status" class="active"><div>{phrase var='feed.post'}<span class="activity_feed_link_form_ajax">{$aFeedCallback.ajax_request}</span></div><div class="drop"></div></a></li>
		{elseif !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))}
		<li><a href="#" style="background:url('{img theme='misc/application_add.png' return_url=true}') no-repeat center left;" rel="global_attachment_status" class="active"><div>{phrase var='feed.status'}<span class="activity_feed_link_form_ajax">user.updateStatus</span></div><div class="drop"></div></a></li>
		{else}
		<li><a href="#" style="background:url('{img theme='misc/comment_add.png' return_url=true}') no-repeat center left;" rel="global_attachment_status" class="active"><div>{phrase var='feed.post'}<span class="activity_feed_link_form_ajax">feed.addComment</span></div><div class="drop"></div></a></li>
		{/if}

		{foreach from=$aFeedStatusLinks item=aFeedStatusLink}
		{if isset($aFeedCallback.module) && $aFeedStatusLink.no_profile}
		{else}
		{if ($aFeedStatusLink.no_profile && !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))) || !$aFeedStatusLink.no_profile}
		<li>
			<a href="#" style="background:url('{img theme='feed/'$aFeedStatusLink.icon'' return_url=true}') no-repeat center left;" rel="global_attachment_{$aFeedStatusLink.module_id}"{if $aFeedStatusLink.no_input} class="no_text_input"{/if}>
				<div>
					{$aFeedStatusLink.title|convert}
					{if $aFeedStatusLink.is_frame}
					<span class="activity_feed_link_form">{url link=''$aFeedStatusLink.module_id'.frame'}</span>
					{else}
					<span class="activity_feed_link_form_ajax">{$aFeedStatusLink.module_id}.{$aFeedStatusLink.ajax_request}</span>
					{/if}
					<span class="activity_feed_extra_info">{$aFeedStatusLink.description|convert}</span>
				</div>
				<div class="drop"></div>
			</a>
		</li>
		{/if}
		{/if}
		{/foreach}
	</ul>
	<div class="clear"></div>
</div>

<div class="activity_feed_form">
	<form method="post" action="#" id="js_activity_feed_form" enctype="multipart/form-data">
	{if isset($aFeedCallback.module)}
		<div><input type="hidden" name="val[callback_item_id]" value="{$aFeedCallback.item_id}" /></div>
		<div><input type="hidden" name="val[callback_module]" value="{$aFeedCallback.module}" /></div>
		<div><input type="hidden" name="val[parent_user_id]" value="{$aFeedCallback.item_id}" /></div>
	{/if}
	{if isset($bFeedIsParentItem)}
		<div><input type="hidden" name="val[parent_table_change]" value="{$sFeedIsParentItemModule}" /></div>
	{/if}
		{if defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id != Phpfox::getUserId()}
		<div><input type="hidden" name="val[parent_user_id]" value="{$aUser.user_id}" /></div>
		{/if}
		<div class="activity_feed_form_holder">

			<div id="activity_feed_upload_error" style="display:none;"><div class="error_message" id="activity_feed_upload_error_message"></div></div>

			<div class="global_attachment_holder_section" id="global_attachment_status" style="display:block;">
				<div id="global_attachment_status_value" style="display:none;">{if isset($aFeedCallback.module) || defined('PHPFOX_IS_USER_PROFILE')}{phrase var='feed.write_something'}{else}{phrase var='feed.what_s_on_your_mind'}{/if}</div>
				<textarea cols="60" rows="8" name="val[user_status]">{if isset($aFeedCallback.module) || defined('PHPFOX_IS_USER_PROFILE')}{phrase var='feed.write_something'}{else}{phrase var='feed.what_s_on_your_mind'}{/if}</textarea>
			</div>

			{foreach from=$aFeedStatusLinks item=aFeedStatusLink}
			{if !empty($aFeedStatusLink.module_block)}
			{module name=$aFeedStatusLink.module_block}
			{/if}
			{/foreach}
			{if Phpfox::isModule('egift')}
			{module name='egift.display'}
			{/if}
		</div>
		<div class="activity_feed_form_button">
			<div class="activity_feed_form_button_status_info">
				<textarea cols="60" rows="8" name="val[status_info]"></textarea>
			</div>
			<div class="activity_feed_form_button_position">

				{if defined('PHPFOX_IS_PAGES_VIEW') && $aPage.is_admin && $aPage.page_id != Phpfox::getUserBy('profile_page_id')}
				<div class="activity_feed_pages_post_as_page">
					{phrase var='feed.post_as'}:
					<select name="custom_pages_post_as_page">
						<option value="{$aPage.page_id}">{$aPage.full_name|clean|shorten:20:'...'}</option>
						<option value="0">{$sGlobalUserFullName}</option>
					</select>
				</div>
				{else}
				{if Phpfox::isModule('share') && !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW') && !defined('PHPFOX_IS_EVENT_VIEW') && (Phpfox::getParam('share.share_on_facebook') || Phpfox::getParam('share.share_on_twitter'))}
				<div id="activity_feed_share_this_one">
					<a href="#" id="activity_feed_share_this_one_link">{phrase var='feed.share_this_on'}</a>
					<div class="feed_share_on_holder">
						{if Phpfox::getParam('share.share_on_facebook')}
						<div class="feed_share_on_item"><a href="#" onclick="$(this).toggleClass('active'); $.ajaxCall('share.connect', 'connect-id=facebook', 'GET'); return false;">{img theme='layout/facebook.png' class='v_middle'} {phrase var='feed.facebook'}</a></div>
						{/if}
						{if Phpfox::getParam('share.share_on_twitter')}
						<div class="feed_share_on_item"><a href="#" onclick="$(this).toggleClass('active'); $.ajaxCall('share.connect', 'connect-id=twitter', 'GET'); return false;">{img theme='layout/twitter.png' class='v_middle'} {phrase var='feed.twitter'}</a></div>
						{/if}
						<div><input type="hidden" name="val[connection][facebook]" value="0" id="js_share_connection_facebook" class="js_share_connection" /></div>
						<div><input type="hidden" name="val[connection][twitter]" value="0" id="js_share_connection_twitter" class="js_share_connection" /></div>
					</div>
				</div>
				{/if}
				{/if}

				<div class="activity_feed_form_button_position_button">
					<input type="submit" value="{phrase var='feed.share'}" class="button" />
				</div>
				{if isset($aFeedCallback.module)}
				{else}
				{if !isset($bFeedIsParentItem) && (!defined('PHPFOX_IS_USER_PROFILE') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId()))}
				{module name='privacy.form' privacy_name='privacy' privacy_type='mini'}
				{/if}
				{/if}
				<div class="clear"></div>
			</div>
		</div>
	</form>
	<div class="activity_feed_form_iframe"></div>
</div>
{/if}
{/if}

{if Phpfox::getParam('feed.refresh_activity_feed') > 0 && Phpfox::getLib('module')->getFullControllerName() == 'core.index-member'}
<div id="activity_feed_updates_link_holder">
    <a href="#" id="activity_feed_updates_link_single" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();">{phrase var='feed.1_new_update'}</a>
    <a href="#" id="activity_feed_updates_link_plural" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();">{phrase var='feed.span_id_js_new_update_view_span_new_updates'}</a>
</div>
{/if}

<div id="feed"><a name="feed"></a></div>
<div id="js_feed_content">
	{if $sCustomViewType !== null}
	<h2>{$sCustomViewType}</h2>
	{/if}
	<div id="js_new_feed_comment"></div>
	<div id="js_new_feed_update"></div>
	{foreach from=$aFeeds name=iFeed item=aFeed}

	{if isset($aFeed.feed_mini) && !isset($bHasRecentShow)}
	{if $bHasRecentShow = true}{/if}
	<div class="activity_recent_holder">
	<div class="activity_recent_title">
		{phrase var='feed.recent_activity'}
	</div>
	{/if}
	{if !isset($aFeed.feed_mini) && isset($bHasRecentShow)}
	</div>
	{unset var=$bHasRecentShow}
	{/if}

	<div class="js_feed_view_more_entry_holder">
		{template file='feed.block.entry'}
		{if isset($aFeed.more_feed_rows) && is_array($aFeed.more_feed_rows) && count($aFeed.more_feed_rows)}
		{foreach from=$aFeed.more_feed_rows item=aFeed}
		{if $bChildFeed = true}{/if}
		<div class="js_feed_view_more_entry" style="display:none;">
			{template file='feed.block.entry'}
		</div>
		{/foreach}
		{unset var=$bChildFeed}
		{/if}
	</div>
	{/foreach}

	{if isset($bHasRecentShow)}
	</div>
	{/if}
	{if $sCustomViewType === null}
	{if defined('PHPFOX_IN_DESIGN_MODE')}

	{else}
	{if count($aFeeds)}
	<div id="feed_view_more">
		<div id="js_feed_pass_info" style="display:none;">page={$iFeedNextPage}{if defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id)}&profile_user_id={$aUser.user_id}{/if}{if isset($aFeedCallback.module)}&callback_module_id={$aFeedCallback.module}&callback_item_id={$aFeedCallback.item_id}{/if}</div>
		<div id="feed_view_more_loader">{img theme='ajax/add.gif'}</div>
		<a href="{if Phpfox::getLib('module')->getFullControllerName() == 'core.index-visitor'}{url link='core.index-visitor' page=$iFeedNextPage}{else}{url link='current' page=$iFeedNextPage}{/if}" onclick="$(this).hide(); $('#feed_view_more_loader').show(); $.ajaxCall('feed.viewMore', 'page={$iFeedNextPage}{if defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id)}&profile_user_id={$aUser.user_id}{/if}{if isset($aFeedCallback.module)}&callback_module_id={$aFeedCallback.module}&callback_item_id={$aFeedCallback.item_id}{/if}', 'GET'); return false;" class="global_view_more no_ajax_link">{phrase var='feed.view_more'}</a>
	</div>
	{else}
	<br />
	<div class="message js_no_feed_to_show">{phrase var='feed.there_are_no_new_feeds_to_view_at_this_time'}</div>
	{/if}
	{/if}
	{/if}
{if !PHPFOX_IS_AJAX || (PHPFOX_IS_AJAX && count($aFeedVals))}
</div>
{/if}
{if Phpfox::getParam('feed.refresh_activity_feed') > 0 && Phpfox::getLib('module')->getFullControllerName() == 'core.index-member'}
<script type="text/javascript">
	$Core.reloadActivityFeed();
</script>
{/if}


{/if}