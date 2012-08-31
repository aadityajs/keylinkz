<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Core
 * @version 		$Id: welcome.html.php 3901 2012-01-27 10:59:03Z Raymond_Benc $
 */



?>
<div id="welcome">
	<div class="welcome_profile_right">
	</div>
	<div class="welcome_profile_image">
<?php echo $this->_aVars['sUserProfileImage']; ?>
	</div>
	<div class="welcome_profile_name">
		<div class="user_display_name"><a href="<?php echo $this->_aVars['sUserProfileUrl']; ?>"><?php echo $this->_aVars['sCurrentUserName']; ?></a></div>
		<div class="welcome_quick_link">
			<ul>
				<li><a href="#core.info"><?php echo Phpfox::getPhrase('core.account_info'); ?></a><span>&middot;</span></li>
				<!-- <li><a href="#core.activity"><?php echo Phpfox::getPhrase('core.activity_points'); ?><span id="js_global_total_activity_points">(<?php echo number_format($this->_aVars['iTotalActivityPoints']); ?>)</span></a><span>&middot;</span></li> -->
<?php if (Phpfox ::isModule('subscribe') && Phpfox ::getParam('subscribe.enable_subscription_packages')): ?>
				<li><a href="#subscribe.listUpgrades" rel="welcome_info_holder_custom"><?php echo Phpfox::getPhrase('subscribe.membership_membership_name', array('membership_name' => $this->_aVars['sUserGroupFullName'])); ?></a><span>&middot;</span></li>
<?php endif; ?>
				<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.profile'); ?>"><?php echo Phpfox::getPhrase('core.edit_profile'); ?></a><span>&middot;</span></li>
				<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('profile'); ?>"><?php echo Phpfox::getPhrase('core.profile_views'); ?><span>(<?php echo number_format($this->_aVars['iTotalProfileViews']); ?>)</span></a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
</div>
