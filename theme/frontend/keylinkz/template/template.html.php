<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Aditya Jyoti Saha
 * @package 		Phpfox
 * @version 		$Id: template.html.php 3784 2011-12-13 17:43:19Z Aditya Jyoti Saha $
 */

defined('PHPFOX') or exit('NO DICE!');
//$request = Phpfox::getLib('request')->getRequests();
//echo '<pre>'.print_r($request,true).'</pre>';
//exit;
//echo Phpfox::getLib('server')->getServerUrl();
//echo Phpfox::isPublicView();
//exit;
//echo $url = Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'));
?>{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">

	<head>
		<title>{title}</title>
		{header}
	</head>
	<body>{foo}
	{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
		<div id="homeBody">
	{/if}
		{body}
		{block location='9'}


		{if Phpfox::getLib('url')->getUrl() neq 'realestate/print'}
		<div id="header">
			<div class="holder">
				{block location='10'}
				<div id="header_holder" {if !Phpfox::isUser()} class="header_logo"{/if}>
					<div id="header_left">
						{logo}<?php //echo Phpfox::getLib('url')->getUrl(); ?>
					</div>
					<div id="header_right">
						<div id="header_top">
                        <!--
							 {if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
								<div id="holder_notify">
									{notification}
									<div class="clear"></div>
								</div>
							{/if}
						-->

							<div id="header_menu_holder">
								{if Phpfox::isUser()}
								{menu_account}
								<div class="clear"></div>
								{else}
								{module name='user.login-header'}
								{/if}

								{if Phpfox::isUser()}
								<div class="welcome_text">
		                        <div class="welcome">{$adiUserProfileImage}</div>
		                            <div style="padding: 5px 30px;"  class="link_white"><a href="{$adiUserProfileUrl}">{phrase var='realestate.greet_welcome'} {$adiCurrentUserName}</a>
		                            </div>
		                        </div>
		                        {/if}
							</div>



							{if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
							<div id="header_search">
								<div id="header_menu_space">
									<div id="header_sub_menu_search">
										<form method="post" id='header_search_form' action="{url link='search'}">
											<input type="text" name="q" value="{phrase var='core.search_dot'}" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />
											<div id="header_sub_menu_search_input"></div>

											<span class="gray_text">ie: 123 Main Street, Boston, MA 11111 </span>

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
					<div id="header_menu" {if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')} style="margin-top: 40px; padding-bottom: 25px;" {/if}>
						<!-- {menu} -->

                         {menu}


						{if !Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
						<div class="nav_right"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>login_option.jpg" alt="" width="119" height="25" /></div>
						{else}

                            {if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
								<div id="holder_notify" class="option_right">

									{notification}


									<ul>
									<li style="margin-left: 20px;">Options</li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>icon3.png" alt="" width="16" height="15"/></li>
									</ul>

                                    <div class="clear"></div>

								</div>


						<!--	 {if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
								<div id="holder_notify">
									{notification}
									<div class="clear"></div>
								</div>
							{/if} -->

								<!-- <div class="option_right">
									<ul>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>home.png" alt="" width="13" height="13"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li class="no_bg"><p>2</p></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>icon1.png" alt="" width="14" height="15"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li class="no_bg"><p>4</p></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>icon2.png" alt="" width="17" height="15"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li class="no_bg"><p>6</p></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li>Options</li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>icon3.png" alt="" width="16" height="15"/></li>
									</ul>
								  </div> -->

							{/if}
						{/if}
						<div class="clear"></div>
					</div>
				</div>
			</div>
			{/if}
			<!--navigation div end-->
		</div>
		{/if}





		<!--Professionals header start-->
		{if Phpfox::getLib('url')->getUrl() == 'pages/add'}
	        <div class="proff_register">
				<div class="banner_inner"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>map_banner.jpg" alt="" width="972" height="273" /></div>
	        </div>
		{/if}
		<!--Professionals header end-->

		<div id="{if Phpfox::isUser()}main_core_body_holder{else}main_core_body_holder_guest{/if}">

			{block location='11'}

			<div id="main_content_holder">
			{/if}

			{* {if Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')} *}

				<div {holder_name}>
					<div {is_page_view} class="holder">
						<div id="content_holder">



							{block location='7'}
							{if Phpfox::isUser()}
								{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
								{breadcrumb}
								{/if}
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
								<div id="main_content_padding content_padding">

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

										<div id="content" {content_class} >
											{error}
											{block location='2'}
											{content}
											{block location='4'}
										</div>

										{if (!Phpfox::getLib('url')->getUrl() == 'realestate')}
											{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}
											<div id="right">
												{block location='3'}
											</div>
											{/if}
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
			{* {/if} *}


			{if !PHPFOX_IS_AJAX_PAGE}
			</div>



			{if Phpfox::getLib('url')->getUrl() == ''}
			<!-- footer listing starts -->
			{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
            <div style="margin-top: 4px;" class="holder">
        	<div class="front_content_list">
            	<div class="topc"></div>
                <div class="clear"></div>
                <div style="margin-top: 17px;">


                	<div class="left_col">



                     {*{foreach from=$real_estate_left item=left name=foo} *}
                     {section name=foo loop=$real_estate_left}
                     {assign var=i value=$smarty.section.foo.iteration|intval}

                    	<div class="list">
                            <div class="leftbox">
                                <div class="leftpart"><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD; ?>{$real_estate_left[foo].image}" alt="" width="81" height="72" class="imageborder" /></div>
                                <div class="rightpart">
                                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$real_estate_left[foo].id}"><h1>{$real_estate_left[foo].title}</h1></a>
                                    {if $real_estate_left[foo].is_rent eq 'Y'}
                                    <p>House For Rent : ${$real_estate_left[foo].price_per_month}<br />
                                    {else}
                                    <p>House For Sale : ${$real_estate_left[foo].total_price}<br />
                                    {/if}

									{assign var="on_keylinkz" value=" "|explode:$real_estate_left[foo].on_keylinkz}
                                    <span class="green_txt">On KeyLinkz: [{$on_keylinkz[0]} Days]</span> <br />
                                    <!-- Listed by: <span class="blue_txt">Linda C. [Broker]</span> --></p>
                                </div>
                            </div>
                            <div class="rightbox">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="28%">Beds:</td>
                                  <td width="40%" align="center">{$real_estate_left[foo].no_of_rooms}</td>
                                  <td width="32%"><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$real_estate_left[foo].id}"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Baths:</td>
                                  <td width="40%" align="center">{$real_estate_left[foo].no_of_bathrooms}</td>
                                  <td width="32%"><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.addToFavourite' , 'param={php}echo $real_estate_left[foo].id;{/php}')"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Sqft:</td>
                                  <td width="40%" align="center">{$real_estate_left[foo].total_square_foot}</td>
                                  <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Lot:</td>
                                  <td width="40%" align="center">{$i}<!-- =={$real_estate_left|@count}== --></td>
                                  <td width="32%"><a href="#"></td>
                                </tr>
                              </table>
                            </div>
                        </div>
                        <div class="clear"></div>
                     {*{/foreach}   *}
                     {/section}


					</div>


                    <div class="right_col">
                    {foreach from=$real_estate_right item=right}
                    	<div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD; ?>{$real_estate_right[foo].image}" alt="" width="81" height="72" class="imageborder" /></div>
                            <div class="rightpart">
                                <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$right.id}"><h1>{$right.title}</h1></a>
                                {if $right.is_rent eq 'Y'}
                                <p>House For Rent : ${$right.price_per_month}<br />
                                {else}
                                <p>House For Sale : ${$right.total_price}<br />
                                {/if}

								{assign var="on_keylinkz" value=" "|explode:$right.on_keylinkz}
                                <span class="green_txt">On KeyLinkz: [{$on_keylinkz[0]} Days]<?php //adiDateDiff(); ?> </span> <br />
                                <!-- Listed by: <span class="blue_txt">Linda C. [Broker]</span> --></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center">{$right.no_of_rooms}</td>
                              <td width="32%"><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{$right.id}"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center">{$right.no_of_bathrooms}</td>
                              <td width="32%"><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.addToFavourite' , 'param={php}echo $right.id;{/php}')"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center">{$right.total_square_foot}</td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center">{$real_estate_count}</td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>

                        <div class="clear"></div>
  						{/foreach}


					</div>
                </div>
            </div>
		</div>
		{/if}
        {/if}
			<!-- footer listing ends -->


			<!--footer div start-->

            {if Phpfox::getLib('url')->getUrl() neq 'realestate/print'}
            <div id="main_footer_holder" class="footer_bg">
                <div class="holder">
                {if Phpfox::getLib('url')->getUrl() == ''}
                {if !Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}
                <div id="roommate"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>roommatefinder.png" alt="" width="188" height="108" /></div>
                {/if}
                {/if}
                    <div id="footer" class="footer">
                        {menu_footer}
                        <div id="copyright" class="copyright_custom">
                            {copyright}
                        </div>
                        <div class="clear"></div>
                        {block location='5'}
                    </div>
                </div>
            </div>
            {/if}

			<!--footer div end-->
			{footer}
		</div>
	{if !Phpfox::isUser() && !Phpfox::getUserBy('profile_page_id')}
	</div>	<!-- main body -->
	{/if}

    <?php
	$id = Phpfox::getLib('request')->getInt('id');
	?>
            <div id="light" class="white_content" style="display: none;">
                <iframe src="http://aditya/keylinkz/theme/frontend/keylinkz/template/lightbox.html.php?id=<?php echo $id; ?>" width="750" height="560" frameBorder="0" scrolling="no"></iframe>
                <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none';$('body').css('overflow', 'auto');">Close</a>
            </div>
            <div id="fade" class="black_overlay"></div>

	</body>
</html>
{/if}