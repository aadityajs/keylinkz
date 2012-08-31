<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: template.html.php 3784 2011-12-13 17:43:19Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>
		{header}
	</head>
	<body>
	{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
		<div id="homeBody">
	{/if}
		{body}
		{block location='9'}
		<div id="header">
			<div class="holder">
				{block location='10'}
				<div id="header_holder" {if !Phpfox::isUser()} class="header_logo"{/if}>
					<div id="header_left">
						{logo}
					</div>
					<div id="header_right">
						<div id="header_top">
							{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
							<div id="holder_notify">
								{notification}
								<div class="clear"></div>
							</div>
							{/if}
							<div id="header_menu_holder">
								{if Phpfox::isUser()}
								{menu_account}
								<div class="clear"></div>
								{else}
								{module name='user.login-header'}
								{/if}
							</div>
							{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
							<div id="header_search">
								<div id="header_menu_space">
									<div id="header_sub_menu_search">
										<form method="post" id='header_search_form' action="{url link='search'}">
											<input type="text" name="q" value="{phrase var='core.search_dot'}" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />
											<div id="header_sub_menu_search_input"></div>
											<a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button">{phrase var='core.search'}</a>
										</form>
									</div>
								</div>
							</div>
							{/if}
						</div>
					</div>
					{block location='6'}
				</div>
			</div>

			<!--navigation div start-->
			{if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}

			{else}

			<div id="header_menu_page_holder">
				<div class="holder">
					<div id="header_menu">
						<!-- {menu} -->{menu}
						{if !Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
						<div class="nav_right"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>login_option.jpg" alt="" width="119" height="25" /></div>
						{/if}
						<div class="clear"></div>
					</div>
				</div>
			</div>
			{/if}
			<!--navigation div end-->
		</div>

		<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}">

			{block location='11'}

			<div id="main_content_holder">
			{/if}

			{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}

				<div {holder_name}>
					<div {is_page_view} class="holder">
						<div id="content_holder">

							{block location='7'}
							{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
							{breadcrumb}
							{/if}

							{if !$bUseFullSite && (count($aBlocks1) || count($aAdBlocks1)) || (isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus))}
							<div id="left">
								{menu_sub}
								{block location='1'}
							</div>
							{/if}

							<div id="main_content">
								{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
								{search}
								{/if}
								<div id="main_content_padding">

									{if defined('PHPFOX_IS_USER_PROFILE')}
									{module name='profile.header'}
									{/if}
									{if defined('PHPFOX_IS_PAGES_VIEW')}
									{module name='pages.header'}
									{/if}

									<div id="content_load_data">
										{if isset($bIsAjaxLoader) || defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW')}
										{search}
										{/if}

										{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle)}
										<h1><a href="{$aBreadCrumbTitle[1]}">{$aBreadCrumbTitle[0]|clean|split:30}</a></h1>
										{/if}

										<div id="content" {content_class}>
											{error}
											{block location='2'}
											{content}
											{block location='4'}
										</div>

										{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
										<div id="right">
											{block location='3'}
										</div>
										{/if}

										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						{block location='8'}
					</div>
				</div>
				{/if}


			{if !PHPFOX_IS_AJAX_PAGE}
			</div>

			<!-- footer listing starts -->
			{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
				<div style="margin-top: 4px;" class="holder">
        	<div class="front_content_list">
            	<div class="topc"></div>
                <div class="clear"></div>
                <div style="margin-top: 17px;">
                	<div class="left_col">
                    	<div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div style="border:none;" class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
					</div>
                    <div class="right_col">
                    	<div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="clear"></div>
                        <div style="border:none;" class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>photo.jpg" alt="" width="81" height="53" class="imageborder" /></div>
                            <div class="rightpart">
                            <h1>155 Main St, Boston, MA</h1>
                            <p>House For Sale:$699,000<br />
<span class="green_txt">Days on KeyLinkz: 12</span> <br />
Listed by: <span class="blue_txt">Linda C. [Broker]</span></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">3</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">2.5</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">1,164</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">4,167</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>
					</div>
                </div>
            </div>
		</div>
		{/if}
			<!-- footer listing ends -->


			<!--footer div start-->


			<div id="main_footer_holder" class="footer_bg">
				<div class="holder">
				{if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
				<div id="roommate"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>roommatefinder.png" alt="" width="188" height="108" /></div>
				{/if}
					<div id="footer" class="footer">
						{menu_footer}
						<div id="copyright" class="copyright_custom">
							<!-- {copyright} -->{copyright}
						</div>
						<div class="clear"></div>
						{block location='5'}
					</div>
				</div>
			</div>
			<!--footer div end-->
			{footer}
		</div>
	{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
	</div>	<!-- main body -->
	{/if}
	</body>
</html>
{/if}