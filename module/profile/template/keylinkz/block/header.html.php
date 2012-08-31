<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: header.html.php 3626 2011-12-01 06:07:55Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{* $adiUserGroupFullName *}

<?php
//$adiGroup = Phpfox::getService('user.group')->getGroup(Phpfox::getUserBy('user_group_id'));
//echo adiGetDisplayedUserGroupId();
//adiGetProfileBadge(adiGetDisplayedUserGroupId());
//echo $userGroup = Phpfox::getLib('locale')->convert($adiGroup['title']);
//adiGetProfileBadge($userGroup);
//echo Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'));
//echo $userName = reset(explode('/', end(explode('=/', Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'))))));
//echo Phpfox::getUserBy('activity_points');
//adiGetDisplayedUserId();
//echo Phpfox::getLib('url')->getUrl(Phpfox::getUserBy('user_name'))
?>

<div class="profile_header" style="height:60px; border:0px;">


	{if Phpfox::getUserBy('profile_page_id') <= 0}

	<div id="section_menu" style="height:60px;  width:200px; float:right;">
		{if defined('PHPFOX_IS_USER_PROFILE_INDEX') || defined('PHPFOX_PROFILE_PRIVACY') || Phpfox::getLib('module')->getFullControllerName() == 'profile.info'}
		<ul>
			{if Phpfox::getUserId() == $aUser.user_id}

            <li><a href="{url link='realestate.add'}">{phrase var='admincp.realestate_add_link'}</a></li>

			<li><a href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a></li>

			{if Phpfox::getUserParam('profile.can_custom_design_own_profile')}
			<!-- <li><a href="{url link='profile.designer'}" class="no_ajax_link">{phrase var='profile.design_profile'}</a></li> -->
			{/if}
			{else}
				{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
					<li><a href="#" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;">{phrase var='profile.send_message'}</a></li>
				{/if}
				{if Phpfox::isModule('friend') && (!$aUser.is_friend || $aUser.is_friend === 3)}
					<li id="js_add_friend_on_profile"{if $aUser.is_friend === 3} class="js_profile_online_friend_request"{/if}>
						<a href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">
							{if $aUser.is_friend === 3}{phrase var='profile.confirm_friend_request'}{else}{phrase var='profile.add_to_friends'}{/if}
						</a>
					</li>
				{/if}
				{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
					<li id="liPoke">
						<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;">{phrase var='poke.poke' full_name=''}</a>
					</li>
				{/if}
				{plugin call='profile.template_block_menu_more'}
				{if (Phpfox::getUserParam('user.can_block_other_members') && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others'))
					|| (isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1)
					|| (Phpfox::getUserParam('user.can_feature'))
					|| (isset($bPassMenuMore))
				}
				<li><a href="#" id="section_menu_more" class="js_hover_title"><span class="section_menu_more_image"></span><span class="js_hover_info">{phrase var='profile.more'}</span></a></li>
				{/if}
			{/if}
		</ul>
		{elseif Phpfox::getLib('module')->getFullControllerName() == 'friend.profile'}
		{if Phpfox::getUserId() == $aUser.user_id}
		<ul>
			<li><a href="{url link='friend'}">{phrase var='profile.edit_friends'}</a></li>
		</ul>
		{/if}
		{else}
		<ul>
			{foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
			<li><a href="{url link=$aSubMenu.url)}" class="ajax_link">{if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -8) == '.compose'}{img theme='layout/section_menu_add.png' class='v_middle'}{/if}{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}</a></li>
			{/foreach}
		</ul>
		{/if}
	</div>

	<div id="section_menu_drop">
		<ul>
			{if Phpfox::getUserParam('user.can_block_other_members') && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others')}
			<li><a href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" class="inlinePopup js_block_this_user" title="{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}">{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}</a></li>
			{/if}

			{if isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1}
			<li><a href="#" onclick="$.ajaxCall('im.chat', 'user_id={$aUser.user_id}'); console.log('im.chat from profile.template.block.header');return false;">{phrase var='profile.instant_chat'}</a></li>
			{/if}

			{if Phpfox::getUserParam('user.can_feature')}
			<li {if !$aUser.is_featured} style="display:none;" {/if} class="user_unfeature_member"><a href="#" title="{phrase var='profile.un_feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=0&amp;type=1'); return false;">{phrase var='profile.unfeature'}</a></li>
			<li {if $aUser.is_featured} style="display:none;" {/if} class="user_feature_member"><a href="#" title="{phrase var='profile.feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=1&amp;type=1'); return false;">{phrase var='profile.feature'}</a></li>
			{/if}

			{plugin call='profile.template_block_menu'}


		</ul>

	</div>
	{/if}
    {*
	{if $aUser.is_online || $aUser.is_friend === 2 || $aUser.is_friend === 3}
		<span class="profile_online_status">
			{if $aUser.is_friend === 2}
			<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_confirmation'}{if $aUser.is_online} &middot; {/if}</span>
			{elseif $aUser.is_friend === 3}
			<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_request'}{if $aUser.is_online} &middot; {/if}</span>
			{/if}
			({phrase var='profile.online'})
		</span>
	{/if}
    *}

        <div style="width:450px; float:left;">
            <h1 style="border:1px solid #fff;">
                <span style="float:left;"><a href="{url link=$aUser.user_name}"><strong>{$aUser.full_name|clean|split:50}</strong></a>
                	{php} echo adiGetProfileBadge(adiGetDisplayedUserGroupId()); {/php}<!-- <img alt="" src="{php} echo adiGetProfileBadge(adiGetDisplayedUserGroupId()); {/php}"> -->
                	{foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}{if $phpfox.iteration.link == 1}<span class="profile_breadcrumb">&#187;</span><a href="{$sLink}">{$sCrumb}</a>{/if}{/foreach}
                </span>

                {if $aUser.is_online || $aUser.is_friend === 2 || $aUser.is_friend === 3}
                <span class="profile_online_status" style="border:1px solid #fff; float:left; margin:7px 0 0 5px; position:relative;">

                {if $aUser.is_friend === 2}
                <span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_confirmation'}{if $aUser.is_online} &middot; {/if}</span>

                {elseif $aUser.is_friend === 3}
                <span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_request'}{if $aUser.is_online} &middot; {/if}</span>
                {/if}
                ({phrase var='profile.online'})
                </span>
            {/if}
            </h1>

           <div class="clear"></div>


          <!-- PROFILE RATING SECTION -->
          <div style="padding-left:3px;">


              <div style="height:21px;">
                  <div style="width:50px;float:left;margin-top:2px;">Rating</div>


                  <div class="basic" id="{$rate}_1" style="width:100px; float:left; margin-top:4px;"></div>
                  <div class="basic" id="{$rate}_1" style="float:left; margin-left:6px;margin-top:2px; padding-bottom:5px;"><a href="#">[{$count_rate} Reviews]</a></div>


                  <div class="clear"></div>
              </div>



              <div style="height:21px;">
                  <div style="width:100px;float:left;margin-top:0px;">Contributions :</div>
                  <div style="float:left; margin-left:16px;"><a href="#">[{php} echo adiGetDisplayedUserActPoint(); {/php}]</a></div>
              </div>


            <div class="clear"></div>
          </div>

          <!-- PROFILE RATING SECTION -->

            <div class="clear"></div>

        </div>
     <div class="clear"></div>
</div>


<div class="profile_info" style="margin:0px 0 0 0;padding-left:10px; border-top:1px solid #DFDFDF; background:#ECECEC; line-height:30px;">
    {if Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_location') && !empty($aUser.city_location)}
    {phrase var='profile.lives_in'} {if !empty($aUser.city_location)}<font style="color:#039;font-weight:bold;">{$aUser.city_location}</font>, {/if}{$aUser.country_child_id|location_child} {if !empty($aUser.location)}{$aUser.location}{/if} &middot;
    {/if}
    {if is_array($aUser.birthdate_display) && count($aUser.birthdate_display)}
    {foreach from=$aUser.birthdate_display key=sAgeType item=sBirthDisplay}
    {if $aUser.dob_setting == '2'}
    {phrase var='profile.age_years_old' age=$sBirthDisplay}
    {else}
    {phrase var='profile.born_on_birthday' birthday=$sBirthDisplay}
    {/if}
    {/foreach}
    {/if}
    {if Phpfox::getParam('user.enable_relationship_status') && $sRelationship != ''}&middot; {$sRelationship} {/if}
    <img alt="" src="<?php echo PHPFOX_DIR_DEFAULT_THEME_ICON; ?>icon04.gif"> <a href="{url link='user.profile'}">{phrase var='profile.edit_profile'}</a>
</div>
