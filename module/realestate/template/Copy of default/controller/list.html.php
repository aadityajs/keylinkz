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
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-b77f1f2d-df-251-4a4c-c94a81b0c043"}); </script>

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
                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$listProp.id}"><img src="module/realestate/static/image/upload/{$listProp.image_path}" alt="" width="97" height="68" class="border1"/></a>
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
				<li><a href="javascript: void(0);" onclick="$.ajaxCall('feed.popDetails', 'propId={$listProp.id}::{$listProp.title}');" ><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon9.gif" title="View Details" width="19" height="19" /></a></li>
				<li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}icon10.gif" alt="" width="19" height="19" /></li>
				</ul>
				</div>
				</div>
			{/foreach}

        </div>

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




