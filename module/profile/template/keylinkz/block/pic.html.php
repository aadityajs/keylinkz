<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: pic.html.php 3405 2011-11-01 11:05:18Z Miguel_Espinoza $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{if !empty($sProfileImage)}
<div class="profile_image">


    <div class="profile_image_holder">
        {if Phpfox::isModule('photo')}
			<a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
			{$sProfileImage}
		{/if}
    </div>


	{if Phpfox::getUserId() == $aUser.user_id}
	<div class="p_4">
		<a href="{url link='user.photo'}">{phrase var='profile.change_picture'}</a>
	</div>
	{/if}
</div>
{/if}
<div class="sub_section_menu">
    <b class="menu_line">LISTINGS</b>
		<ul class="" style="padding-left:12px;padding-top:5px;font-weight:500;">
        	<a href="{$listing_url}type_rent" class="ajax_link"><li class="" style="margin:3px;">Rentals</li></a>
            <a href="{$listing_url}type_sale" class="ajax_link"><li class="" style="margin:3px;">Sale</li></a>
        </ul>

   <!--  <b class="menu_line">MY LEADS</b>
		<ul class="" style="padding-left:12px;padding-top:5px;font-weight:500;margin-bottom:10px;">
        	<li class="" style="margin:3px;">Forclosure Leads</li>
            <li class="" style="margin:3px;">Lease Application</li>
            <li class="" style="margin:3px;">Property Requests</li>
            <li class="" style="margin:3px;">Rental Leads</li>
            <li class="" style="margin:3px;">Viewing Requests</li>
        </ul>

    <b class="menu_line">FAVORITES</b>
		<ul class="" style="padding-left:15px;padding-top:5px;font-weight:500;margin-bottom:10px; ">
        	<li class="" style="margin:3px;">News Feed</li>
        </ul>


    <b class="menu_line">APPS</b>
		<ul class="debug" style="padding-left:15px;padding-top:5px;font-weight:500;">
        	<li class="" style="margin:3px;">Credit Reports</li>
            <li class="" style="margin:3px;">Events</li>
            <li class="" style="margin:3px;">Find Connections</li>
            <li class="" style="margin:3px;">Links</li>
            <li class="" style="margin:3px;">Linkz NearBy</li>
        	<li class="" style="margin:3px;">Messages</li>
            <li class="" style="margin:3px;">Notes</li>
            <li class="" style="margin:3px;">Open Hoses</li>
            <li class="" style="margin:3px;">Photos</li>
            <li class="" style="margin:3px;">Questions</li>
            <li class="" style="margin:3px;">Reveiws</li>
            <li class="" style="margin:3px;">Virtua Tours</li>
        </ul>

    <b class="menu_line">PAGES</b>
		<ul class="" style="padding-left:15px;padding-top:5px;font-weight:500;">
        	<li class="" style="margin:3px;">Keylinkz Inc.</li>
            <li class="" style="margin:3px;">Keylinkz, INC</li>
            <li class="" style="margin:3px;">Find Connections</li>
        </ul>
     -->
	<ul>


		{foreach from=$aProfileLinks item=aProfileLink}
			<li class="{if isset($aProfileLink.is_selected)} active{/if}">

				<a href="{url link=$aProfileLink.url}" class="ajax_link"{if isset($aProfileLink.icon)} style="background-image:url('{img theme=$aProfileLink.icon' return_url=true}');"{/if}>{$aProfileLink.phrase}{if isset($aProfileLink.total)}<span>({$aProfileLink.total|number_format})</span>{/if}</a>

                <!--
                {if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}

                <ul>
				{foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
				{/foreach}
				</ul>

				{/if}
                -->

			</li>
		{/foreach}
			<li class="{if isset($aProfileLink.is_selected)} active{/if}">

				<a href="{$dynamic_user_url}fav_1" class="ajax_link"{if isset($aProfileLink.icon)} style="background-image:url('{img theme=$aProfileLink.icon' return_url=true}');"{/if}>Favourite Lists</a>

			</li>


	</ul>
    <div class="clear"></div>
    <div class="js_cache_check_on_content_block" style="display:none;"></div>
    <div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
    <div class="js_cache_profile_user_name" style="display:none;">{$aUser.user_name}</div>
</div>