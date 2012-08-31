<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: header.html.php 3626 2011-12-01 06:07:55Z Raymond_Benc $
 */



?>


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


<?php if (Phpfox ::getUserBy('profile_page_id') <= 0): ?>

	<div id="section_menu" style="height:60px;  width:200px; float:right;">
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE_INDEX' ) || defined ( 'PHPFOX_PROFILE_PRIVACY' ) || Phpfox ::getLib('module')->getFullControllerName() == 'profile.info'): ?>
		<ul>
<?php if (Phpfox ::getUserId() == $this->_aVars['aUser']['user_id']): ?>

            <li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('realestate.add'); ?>"><?php echo Phpfox::getPhrase('admincp.realestate_add_link'); ?></a></li>

			<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.profile'); ?>"><?php echo Phpfox::getPhrase('profile.edit_profile'); ?></a></li>

<?php if (Phpfox ::getUserParam('profile.can_custom_design_own_profile')): ?>
			<!-- <li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('profile.designer'); ?>" class="no_ajax_link"><?php echo Phpfox::getPhrase('profile.design_profile'); ?></a></li> -->
<?php endif; ?>
<?php else: ?>
<?php if (Phpfox ::isModule('mail') && Phpfox ::getService('user.privacy')->hasAccess('' . $this->_aVars['aUser']['user_id'] . '' , 'mail.send_message' )): ?>
					<li><a href="#" onclick="$Core.composeMessage({user_id: <?php echo $this->_aVars['aUser']['user_id']; ?>}); return false;"><?php echo Phpfox::getPhrase('profile.send_message'); ?></a></li>
<?php endif; ?>
<?php if (Phpfox ::isModule('friend') && ( ! $this->_aVars['aUser']['is_friend'] || $this->_aVars['aUser']['is_friend'] === 3 )): ?>
					<li id="js_add_friend_on_profile"<?php if ($this->_aVars['aUser']['is_friend'] === 3): ?> class="js_profile_online_friend_request"<?php endif; ?>>
						<a href="#" onclick="return $Core.addAsFriend('<?php echo $this->_aVars['aUser']['user_id']; ?>');" title="<?php echo Phpfox::getPhrase('profile.add_to_friends'); ?>">
<?php if ($this->_aVars['aUser']['is_friend'] === 3):  echo Phpfox::getPhrase('profile.confirm_friend_request');  else:  echo Phpfox::getPhrase('profile.add_to_friends');  endif; ?>
						</a>
					</li>
<?php endif; ?>
<?php if ($this->_aVars['bCanPoke'] && Phpfox ::getService('user.privacy')->hasAccess('' . $this->_aVars['aUser']['user_id'] . '' , 'poke.can_send_poke' )): ?>
					<li id="liPoke">
						<a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>'); return false;"><?php echo Phpfox::getPhrase('poke.poke', array('full_name' => '')); ?></a>
					</li>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('profile.template_block_menu_more')) ? eval($sPlugin) : false); ?>
<?php if (( Phpfox ::getUserParam('user.can_block_other_members') && Phpfox ::getUserGroupParam('' . $this->_aVars['aUser']['user_group_id'] . '' , 'user.can_be_blocked_by_others' ) ) || ( isset ( $this->_aVars['aUser']['is_online'] ) && $this->_aVars['aUser']['is_online'] && Phpfox ::isModule('im') && Phpfox ::getParam('im.enable_im_in_footer_bar') && $this->_aVars['aUser']['is_friend'] == 1 ) || ( Phpfox ::getUserParam('user.can_feature')) || ( isset ( $this->_aVars['bPassMenuMore'] ) )): ?>
				<li><a href="#" id="section_menu_more" class="js_hover_title"><span class="section_menu_more_image"></span><span class="js_hover_info"><?php echo Phpfox::getPhrase('profile.more'); ?></span></a></li>
<?php endif; ?>
<?php endif; ?>
		</ul>
<?php elseif (Phpfox ::getLib('module')->getFullControllerName() == 'friend.profile'): ?>
<?php if (Phpfox ::getUserId() == $this->_aVars['aUser']['user_id']): ?>
		<ul>
			<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('friend'); ?>"><?php echo Phpfox::getPhrase('profile.edit_friends'); ?></a></li>
		</ul>
<?php endif; ?>
<?php else: ?>
		<ul>
<?php if (count((array)$this->_aVars['aSubMenus'])):  $this->_aPhpfoxVars['iteration']['submenu'] = 0;  foreach ((array) $this->_aVars['aSubMenus'] as $this->_aVars['iKey'] => $this->_aVars['aSubMenu']):  $this->_aPhpfoxVars['iteration']['submenu']++; ?>

			<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aSubMenu']['url']); ?>" class="ajax_link"><?php if (substr ( $this->_aVars['aSubMenu']['url'] , -4 ) == '.add' || substr ( $this->_aVars['aSubMenu']['url'] , -7 ) == '.upload' || substr ( $this->_aVars['aSubMenu']['url'] , -8 ) == '.compose'):  echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/section_menu_add.png','class' => 'v_middle'));  endif;  echo Phpfox::getPhrase($this->_aVars['aSubMenu']['module'].'.'.$this->_aVars['aSubMenu']['var_name']); ?></a></li>
<?php endforeach; endif; ?>
		</ul>
<?php endif; ?>
	</div>

	<div id="section_menu_drop">
		<ul>
<?php if (Phpfox ::getUserParam('user.can_block_other_members') && Phpfox ::getUserGroupParam('' . $this->_aVars['aUser']['user_group_id'] . '' , 'user.can_be_blocked_by_others' )): ?>
			<li><a href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>" class="inlinePopup js_block_this_user" title="<?php if ($this->_aVars['bIsBlocked']):  echo Phpfox::getPhrase('profile.unblock_this_user');  else:  echo Phpfox::getPhrase('profile.block_this_user');  endif; ?>"><?php if ($this->_aVars['bIsBlocked']):  echo Phpfox::getPhrase('profile.unblock_this_user');  else:  echo Phpfox::getPhrase('profile.block_this_user');  endif; ?></a></li>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aUser']['is_online'] ) && $this->_aVars['aUser']['is_online'] && Phpfox ::isModule('im') && Phpfox ::getParam('im.enable_im_in_footer_bar') && $this->_aVars['aUser']['is_friend'] == 1): ?>
			<li><a href="#" onclick="$.ajaxCall('im.chat', 'user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>'); console.log('im.chat from profile.template.block.header');return false;"><?php echo Phpfox::getPhrase('profile.instant_chat'); ?></a></li>
<?php endif; ?>

<?php if (Phpfox ::getUserParam('user.can_feature')): ?>
			<li <?php if (! $this->_aVars['aUser']['is_featured']): ?> style="display:none;" <?php endif; ?> class="user_unfeature_member"><a href="#" title="<?php echo Phpfox::getPhrase('profile.un_feature_this_member'); ?>" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>&amp;feature=0&amp;type=1'); return false;"><?php echo Phpfox::getPhrase('profile.unfeature'); ?></a></li>
			<li <?php if ($this->_aVars['aUser']['is_featured']): ?> style="display:none;" <?php endif; ?> class="user_feature_member"><a href="#" title="<?php echo Phpfox::getPhrase('profile.feature_this_member'); ?>" onclick="$(this).parent().hide(); $(this).parents('#profile_nav_list:first').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>&amp;feature=1&amp;type=1'); return false;"><?php echo Phpfox::getPhrase('profile.feature'); ?></a></li>
<?php endif; ?>

<?php (($sPlugin = Phpfox_Plugin::get('profile.template_block_menu')) ? eval($sPlugin) : false); ?>


		</ul>

	</div>
<?php endif; ?>
    

        <div style="width:450px; float:left;">
            <h1 style="border:1px solid #fff;">
                <span style="float:left;"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aUser']['user_name']); ?>"><strong><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aUser']['full_name']), 50); ?></strong></a>
<?php  echo adiGetProfileBadge(adiGetDisplayedUserGroupId());  ?><!-- <img alt="" src="<?php  echo adiGetProfileBadge(adiGetDisplayedUserGroupId());  ?>"> -->
<?php if (count((array)$this->_aVars['aBreadCrumbs'])):  $this->_aPhpfoxVars['iteration']['link'] = 0;  foreach ((array) $this->_aVars['aBreadCrumbs'] as $this->_aVars['sLink'] => $this->_aVars['sCrumb']):  $this->_aPhpfoxVars['iteration']['link']++;  if ($this->_aPhpfoxVars['iteration']['link'] == 1): ?><span class="profile_breadcrumb">&#187;</span><a href="<?php echo $this->_aVars['sLink']; ?>"><?php echo $this->_aVars['sCrumb']; ?></a><?php endif;  endforeach; endif; ?>
                </span>

<?php if ($this->_aVars['aUser']['is_online'] || $this->_aVars['aUser']['is_friend'] === 2 || $this->_aVars['aUser']['is_friend'] === 3): ?>
                <span class="profile_online_status" style="border:1px solid #fff; float:left; margin:7px 0 0 5px; position:relative;">

<?php if ($this->_aVars['aUser']['is_friend'] === 2): ?>
                <span class="js_profile_online_friend_request"><?php echo Phpfox::getPhrase('profile.pending_friend_confirmation');  if ($this->_aVars['aUser']['is_online']): ?> &middot; <?php endif; ?></span>

<?php elseif ($this->_aVars['aUser']['is_friend'] === 3): ?>
                <span class="js_profile_online_friend_request"><?php echo Phpfox::getPhrase('profile.pending_friend_request');  if ($this->_aVars['aUser']['is_online']): ?> &middot; <?php endif; ?></span>
<?php endif; ?>
                (<?php echo Phpfox::getPhrase('profile.online'); ?>)
                </span>
<?php endif; ?>
            </h1>

           <div class="clear"></div>


          <!-- PROFILE RATING SECTION -->
          <div style="padding-left:3px;">


              <div style="height:21px;">
                  <div style="width:50px;float:left;margin-top:2px;">Rating</div>


                  <div class="basic" id="<?php echo $this->_aVars['rate']; ?>_1" style="width:100px; float:left; margin-top:4px;"></div>
                  <div class="basic" id="<?php echo $this->_aVars['rate']; ?>_1" style="float:left; margin-left:6px;margin-top:2px; padding-bottom:5px;"><a href="#">[<?php echo $this->_aVars['count_rate']; ?> Reviews]</a></div>


                  <div class="clear"></div>
              </div>



              <div style="height:21px;">
                  <div style="width:100px;float:left;margin-top:0px;">Contributions :</div>
                  <div style="float:left; margin-left:16px;"><a href="#">[<?php  echo adiGetDisplayedUserActPoint();  ?>]</a></div>
              </div>


            <div class="clear"></div>
          </div>

          <!-- PROFILE RATING SECTION -->

            <div class="clear"></div>

        </div>
     <div class="clear"></div>
</div>


<div class="profile_info" style="margin:0px 0 0 0;padding-left:10px; border-top:1px solid #DFDFDF; background:#ECECEC; line-height:30px;">
<?php if (Phpfox ::getService('user.privacy')->hasAccess('' . $this->_aVars['aUser']['user_id'] . '' , 'profile.view_location' ) && ! empty ( $this->_aVars['aUser']['city_location'] )): ?>
<?php echo Phpfox::getPhrase('profile.lives_in'); ?> <?php if (! empty ( $this->_aVars['aUser']['city_location'] )): ?><font style="color:#039;font-weight:bold;"><?php echo $this->_aVars['aUser']['city_location']; ?></font>, <?php endif;  echo Phpfox::getService('core.country')->getChild($this->_aVars['aUser']['country_child_id']); ?> <?php if (! empty ( $this->_aVars['aUser']['location'] )):  echo $this->_aVars['aUser']['location'];  endif; ?> &middot;
<?php endif; ?>
<?php if (is_array ( $this->_aVars['aUser']['birthdate_display'] ) && count ( $this->_aVars['aUser']['birthdate_display'] )): ?>
<?php if (count((array)$this->_aVars['aUser']['birthdate_display'])):  foreach ((array) $this->_aVars['aUser']['birthdate_display'] as $this->_aVars['sAgeType'] => $this->_aVars['sBirthDisplay']): ?>
<?php if ($this->_aVars['aUser']['dob_setting'] == '2'): ?>
<?php echo Phpfox::getPhrase('profile.age_years_old', array('age' => $this->_aVars['sBirthDisplay'])); ?>
<?php else: ?>
<?php echo Phpfox::getPhrase('profile.born_on_birthday', array('birthday' => $this->_aVars['sBirthDisplay'])); ?>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php endif; ?>
<?php if (Phpfox ::getParam('user.enable_relationship_status') && $this->_aVars['sRelationship'] != ''): ?>&middot; <?php echo $this->_aVars['sRelationship']; ?> <?php endif; ?>
    <img alt="" src="<?php echo PHPFOX_DIR_DEFAULT_THEME_ICON; ?>icon04.gif"> <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.profile'); ?>"><?php echo Phpfox::getPhrase('profile.edit_profile'); ?></a>
</div>

