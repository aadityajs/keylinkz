<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Core
 * @version 		$Id: welcome.html.php 3901 2012-01-27 10:59:03Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="welcome">
	<div class="welcome_profile_right">
	</div>
	<div class="welcome_profile_image">
		{$sUserProfileImage}
	</div>
	<div class="welcome_profile_name">
		<div class="user_display_name"><a href="{$sUserProfileUrl}">{$sCurrentUserName}</a></div>
		<div class="welcome_quick_link">
			<ul>				
				<li><a href="#core.info">{phrase var='core.account_info'}</a><span>&middot;</span></li>
				<li><a href="#core.activity">{phrase var='core.activity_points'}<span id="js_global_total_activity_points">({$iTotalActivityPoints|number_format})</span></a><span>&middot;</span></li>
				{if Phpfox::isModule('subscribe') && Phpfox::getParam('subscribe.enable_subscription_packages')}
				<li><a href="#subscribe.listUpgrades" rel="welcome_info_holder_custom">{phrase var='subscribe.membership_membership_name' membership_name=$sUserGroupFullName}</a><span>&middot;</span></li>				
				{/if}
				<li><a href="{url link='user.profile'}">{phrase var='core.edit_profile'}</a><span>&middot;</span></li>
				<li><a href="{url link='profile'}">{phrase var='core.profile_views'}<span>({$iTotalProfileViews|number_format})</span></a></li>
			</ul>
			<div class="clear"></div>
		</div>		
	</div>
</div>