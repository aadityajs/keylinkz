<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Aditya Jyoti Saha
 * @package 		Phpfox
 * @version 		$Id: template.html.php 3784 2011-12-13 17:43:19Z Aditya Jyoti Saha $
 */


//$request = Phpfox::getLib('request')->getRequests();
//echo '<pre>'.print_r($request,true).'</pre>';
//exit;
//echo Phpfox::getLib('server')->getServerUrl();
//echo Phpfox::isPublicView();
//exit;
//echo $url = Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name'));
 if (! PHPFOX_IS_AJAX_PAGE): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $this->_aVars['sLocaleDirection']; ?>" lang="<?php echo $this->_aVars['sLocaleCode']; ?>">

	<head>
		<title><?php echo $this->getTitle(); ?></title>
<?php echo $this->getHeader(); ?>
	</head>
	<body>	<?php if (! Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
		<div id="homeBody">
<?php endif; ?>
<?php Phpfox::getBlock('core.template-body'); ?>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 9)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('9'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 9<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 9)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('9');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('9', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_9"> <div class="block js_sortable dnd_block_info">Position '9'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('9', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_9"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('9', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('9', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 9));  endif;  endif; ?>


<?php if (Phpfox ::getLib('url')->getUrl() != 'realestate/print'): ?>
		<div id="header">
			<div class="holder">
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 10)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('10'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 10<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 10)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('10');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('10', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_10"> <div class="block js_sortable dnd_block_info">Position '10'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('10', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_10"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('10', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('10', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 10));  endif;  endif; ?>
				<div id="header_holder" <?php if (! Phpfox ::isUser()): ?> class="header_logo"<?php endif; ?>>
					<div id="header_left">
<?php Phpfox::getBlock('core.template-logo');  //echo Phpfox::getLib('url')->getUrl(); ?>
					</div>
					<div id="header_right">
						<div id="header_top">
                        <!--
<?php if (Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
								<div id="holder_notify">
<?php Phpfox::getBlock('core.template-notification'); ?>
									<div class="clear"></div>
								</div>
<?php endif; ?>
						-->

							<div id="header_menu_holder">
<?php if (Phpfox ::isUser()): ?>
<?php Phpfox::getBlock('core.template-menuaccount'); ?>
								<div class="clear"></div>
<?php else: ?>
<?php Phpfox::getBlock('user.login-header', array()); ?>
<?php endif; ?>

<?php if (Phpfox ::isUser()): ?>
								<div class="welcome_text">
		                        <div class="welcome"><?php echo $this->_aVars['adiUserProfileImage']; ?></div>
		                            <div style="padding: 5px 30px;"  class="link_white"><a href="<?php echo $this->_aVars['adiUserProfileUrl']; ?>"><?php echo Phpfox::getPhrase('realestate.greet_welcome'); ?> <?php echo $this->_aVars['adiCurrentUserName']; ?></a>
		                            </div>
		                        </div>
<?php endif; ?>
							</div>



<?php if (Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
							<div id="header_search">
								<div id="header_menu_space">
									<div id="header_sub_menu_search">
										<form method="post" id='header_search_form' action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('search'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
											<input type="text" name="q" value="<?php echo Phpfox::getPhrase('core.search_dot'); ?>" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />
											<div id="header_sub_menu_search_input"></div>

											<span class="gray_text">ie: 123 Main Street, Boston, MA 11111 </span>

											<a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button"><?php echo Phpfox::getPhrase('core.search'); ?></a>
										
</form>

									</div>
								</div>
							</div>
<?php endif; ?>
						</div>
					</div>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 6)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('6'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 6<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 6)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('6');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('6', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_6"> <div class="block js_sortable dnd_block_info">Position '6'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('6', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_6"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('6', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('6', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 6));  endif;  endif; ?>
				</div>
			</div>

			<!--navigation div start-->
<?php if (Phpfox ::getParam('user.hide_main_menu') && ! Phpfox ::isUser()): ?>

<?php else: ?>

			<div id="header_menu_page_holder">
				<div class="holder">
					<div id="header_menu" <?php if (Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?> style="margin-top: 40px; padding-bottom: 25px;" <?php endif; ?>>
						<!-- <?php Phpfox::getBlock('core.template-menu'); ?> -->

<?php Phpfox::getBlock('core.template-menu'); ?>


<?php if (! Phpfox ::getParam('user.hide_main_menu') && ! Phpfox ::isUser()): ?>
						<div class="nav_right"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>login_option.jpg" alt="" width="119" height="25" /></div>
<?php else: ?>

<?php if (Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
								<div id="holder_notify" class="option_right">

<?php Phpfox::getBlock('core.template-notification'); ?>


									<ul>
									<li style="margin-left: 20px;">Options</li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="6" height="1"/></li>
									<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>icon3.png" alt="" width="16" height="15"/></li>
									</ul>

                                    <div class="clear"></div>

								</div>


						<!--	 <?php if (Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
								<div id="holder_notify">
<?php Phpfox::getBlock('core.template-notification'); ?>
									<div class="clear"></div>
								</div>
<?php endif; ?> -->

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

<?php endif; ?>
<?php endif; ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
<?php endif; ?>
			<!--navigation div end-->
		</div>
<?php endif; ?>





		<!--Professionals header start-->
<?php if (Phpfox ::getLib('url')->getUrl() == 'pages/add'): ?>
	        <div class="proff_register">
				<div class="banner_inner"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>map_banner.jpg" alt="" width="972" height="273" /></div>
	        </div>
<?php endif; ?>
		<!--Professionals header end-->

		<div id="<?php if (Phpfox ::isUser()): ?>main_core_body_holder<?php else: ?>main_core_body_holder_guest<?php endif; ?>">

<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 11)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('11'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 11<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 11)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('11');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('11', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_11"> <div class="block js_sortable dnd_block_info">Position '11'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('11', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_11"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('11', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('11', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 11));  endif;  endif; ?>

			<div id="main_content_holder">
<?php endif; ?>

			

				<div <?php Phpfox::getBlock('core.template-holdername'); ?>>
					<div <?php echo (defined('PHPFOX_IS_PAGES_VIEW') ? 'id="js_is_page"' : ''); ?> class="holder">
						<div id="content_holder">



<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 7)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('7'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 7<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 7)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('7');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('7', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_7"> <div class="block js_sortable dnd_block_info">Position '7'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('7', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_7"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('7', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('7', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 7));  endif;  endif; ?>
<?php if (Phpfox ::isUser()): ?>
<?php if (! defined ( 'PHPFOX_IS_USER_PROFILE' ) && ! defined ( 'PHPFOX_IS_PAGES_VIEW' )): ?>
<?php if (!$this->bIsSample):  $this->getLayout('breadcrumb');  endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php if (! $this->_aVars['bUseFullSite'] && ( count ( $this->_aVars['aBlocks1'] ) || count ( $this->_aVars['aAdBlocks1'] ) ) || ( isset ( $this->_aVars['aFilterMenus'] ) && is_array ( $this->_aVars['aFilterMenus'] ) && count ( $this->_aVars['aFilterMenus'] ) )): ?>





                            <div id="left">
<?php Phpfox::getBlock('core.template-menusub'); ?>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 1)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('1'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 1<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 1)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('1');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('1', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_1"> <div class="block js_sortable dnd_block_info">Position '1'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('1', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_1"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('1', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('1', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 1));  endif;  endif; ?>
							</div>





<?php endif; ?>

							<div id="main_content">
<?php if (! defined ( 'PHPFOX_IS_USER_PROFILE' ) && ! defined ( 'PHPFOX_IS_PAGES_VIEW' )): ?>
<?php if (!$this->bIsSample):  $this->getLayout('search');  endif; ?>
<?php endif; ?>
								<div id="main_content_padding content_padding">

<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' )): ?>
<?php Phpfox::getBlock('profile.header', array()); ?>
<?php endif; ?>
<?php if (defined ( 'PHPFOX_IS_PAGES_VIEW' )): ?>
<?php Phpfox::getBlock('pages.header', array()); ?>
<?php endif; ?>

									<div id="content_load_data">
<?php if (isset ( $this->_aVars['bIsAjaxLoader'] ) || defined ( 'PHPFOX_IS_USER_PROFILE' ) || defined ( 'PHPFOX_IS_PAGES_VIEW' )): ?>
<?php if (!$this->bIsSample):  $this->getLayout('search');  endif; ?>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aBreadCrumbTitle'] ) && count ( $this->_aVars['aBreadCrumbTitle'] )): ?>
										<h1><a href="<?php echo $this->_aVars['aBreadCrumbTitle'][1]; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aBreadCrumbTitle'][0]), 30); ?></a></h1>
<?php endif; ?>

										<div id="content" <?php Phpfox::getBlock('core.template-contentclass'); ?> >
<?php if (!$this->bIsSample):  $this->getLayout('error');  endif; ?>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 2)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('2'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 2<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 2)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('2');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('2', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_2"> <div class="block js_sortable dnd_block_info">Position '2'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('2', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_2"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('2', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('2', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 2));  endif;  endif; ?>
<?php if (!$this->bIsSample): ?><div id="site_content"><?php if (isset($this->_aVars['bSearchFailed'])): ?><div class="message">Unable to find anything with your search criteria.</div><?php else:  Phpfox::getLib('phpfox.module')->getControllerTemplate();  endif; ?></div><?php endif; ?>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 4)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('4'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 4<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 4)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('4');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('4', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_4"> <div class="block js_sortable dnd_block_info">Position '4'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('4', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_4"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('4', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('4', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 4));  endif;  endif; ?>
										</div>

<?php if (( ! Phpfox ::getLib('url')->getUrl() == 'realestate' )): ?>
<?php if (! $this->_aVars['bUseFullSite'] && ( count ( $this->_aVars['aBlocks3'] ) || count ( $this->_aVars['aAdBlocks3'] ) )): ?>
											<div id="right">
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 3)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('3'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 3<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 3)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('3');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_3"> <div class="block js_sortable dnd_block_info">Position '3'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_3"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('3', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 3));  endif;  endif; ?>
											</div>
<?php endif; ?>
<?php endif; ?>

										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>



<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 8)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('8'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 8<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 8)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('8');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('8', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_8"> <div class="block js_sortable dnd_block_info">Position '8'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('8', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_8"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('8', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('8', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 8));  endif;  endif; ?>
					</div>
				</div>
			


<?php if (! PHPFOX_IS_AJAX_PAGE): ?>
			</div>



<?php if (Phpfox ::getLib('url')->getUrl() == ''): ?>
			<!-- footer listing starts -->
<?php if (! Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
            <div style="margin-top: 4px;" class="holder">
        	<div class="front_content_list">
            	<div class="topc"></div>
                <div class="clear"></div>
                <div style="margin-top: 17px;">


                	<div class="left_col">



                     
                     <?php if (isset($this->_aSections['foo'])) unset($this->_aSections['foo']);
$this->_aSections['foo']['name'] = 'foo';
$this->_aSections['foo']['loop'] = is_array($this->_aVars['real_estate_left']) ? count($this->_aVars['real_estate_left']) : max(0, (int)$this->_aVars['real_estate_left']);
$this->_aSections['foo']['show'] = true;
$this->_aSections['foo']['max'] = $this->_aSections['foo']['loop'];
$this->_aSections['foo']['step'] = 1;
$this->_aSections['foo']['start'] = $this->_aSections['foo']['step'] > 0 ? 0 : $this->_aSections['foo']['loop']-1;
if ($this->_aSections['foo']['show']) {
	$this->_aSections['foo']['total'] = $this->_aSections['foo']['loop'];
	if ($this->_aSections['foo']['total'] == 0)
		$this->_aSections['foo']['show'] = false;
} else
	$this->_aSections['foo']['total'] = 0;
if ($this->_aSections['foo']['show']):

			for ($this->_aSections['foo']['index'] = $this->_aSections['foo']['start'], $this->_aSections['foo']['iteration'] = 1;
				 $this->_aSections['foo']['iteration'] <= $this->_aSections['foo']['total'];
				 $this->_aSections['foo']['index'] += $this->_aSections['foo']['step'], $this->_aSections['foo']['iteration']++):
$this->_aSections['foo']['rownum'] = $this->_aSections['foo']['iteration'];
$this->_aSections['foo']['index_prev'] = $this->_aSections['foo']['index'] - $this->_aSections['foo']['step'];
$this->_aSections['foo']['index_next'] = $this->_aSections['foo']['index'] + $this->_aSections['foo']['step'];
$this->_aSections['foo']['first']	  = ($this->_aSections['foo']['iteration'] == 1);
$this->_aSections['foo']['last']	   = ($this->_aSections['foo']['iteration'] == $this->_aSections['foo']['total']);
?>
<?php $this->assign('i', intval($this->_aVars['smarty']['section']['foo']['iteration'])); ?>

                    	<div class="list">
                            <div class="leftbox">
                                <div class="leftpart"><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD;  echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['image']; ?>" alt="" width="81" height="72" class="imageborder" /></div>
                                <div class="rightpart">
                                    <a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['id']; ?>"><h1><?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['title']; ?></h1></a>
<?php if ($this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['is_rent'] == 'Y'): ?>
                                    <p>House For Rent : $<?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['price_per_month']; ?><br />
<?php else: ?>
                                    <p>House For Sale : $<?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['total_price']; ?><br />
<?php endif; ?>

<?php $this->assign('on_keylinkz', explode(" ", $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['on_keylinkz'])); ?>
                                    <span class="green_txt">On KeyLinkz: [<?php echo $this->_aVars['on_keylinkz'][0]; ?> Days]</span> <br />
                                    <!-- Listed by: <span class="blue_txt">Linda C. [Broker]</span> --></p>
                                </div>
                            </div>
                            <div class="rightbox">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="28%">Beds:</td>
                                  <td width="40%" align="center"><?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['no_of_rooms']; ?></td>
                                  <td width="32%"><a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['id']; ?>"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Baths:</td>
                                  <td width="40%" align="center"><?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['no_of_bathrooms']; ?></td>
                                  <td width="32%"><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.addToFavourite' , 'param=<?php echo $real_estate_left[foo].id; ?>')"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Sqft:</td>
                                  <td width="40%" align="center"><?php echo $this->_aVars['real_estate_left'][$this->_aSections['foo']['index']]['total_square_foot']; ?></td>
                                  <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                                </tr>
                                <tr>
                                  <td width="28%">Lot:</td>
                                  <td width="40%" align="center"><?php echo $this->_aVars['i']; ?><!-- ==<?php echo count($this->_aVars['real_estate_left']); ?>== --></td>
                                  <td width="32%"><a href="#"></td>
                                </tr>
                              </table>
                            </div>
                        </div>
                        <div class="clear"></div>
                     
<?php endfor; endif; ?>


					</div>


                    <div class="right_col">
<?php if (count((array)$this->_aVars['real_estate_right'])):  foreach ((array) $this->_aVars['real_estate_right'] as $this->_aVars['right']): ?>
                    	<div class="list">
                        <div class="leftbox">
                        	<div class="leftpart"><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD;  echo $this->_aVars['real_estate_right'][$this->_aSections['foo']['index']]['image']; ?>" alt="" width="81" height="72" class="imageborder" /></div>
                            <div class="rightpart">
                                <a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['right']['id']; ?>"><h1><?php echo $this->_aVars['right']['title']; ?></h1></a>
<?php if ($this->_aVars['right']['is_rent'] == 'Y'): ?>
                                <p>House For Rent : $<?php echo $this->_aVars['right']['price_per_month']; ?><br />
<?php else: ?>
                                <p>House For Sale : $<?php echo $this->_aVars['right']['total_price']; ?><br />
<?php endif; ?>

<?php $this->assign('on_keylinkz', explode(" ", $this->_aVars['right']['on_keylinkz'])); ?>
                                <span class="green_txt">On KeyLinkz: [<?php echo $this->_aVars['on_keylinkz'][0]; ?> Days]<?php //adiDateDiff(); ?> </span> <br />
                                <!-- Listed by: <span class="blue_txt">Linda C. [Broker]</span> --></p>
                            </div>
                        </div>
                        <div class="rightbox">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="28%">Beds:</td>
                              <td width="40%" align="center"><?php echo $this->_aVars['right']['no_of_rooms']; ?></td>
                              <td width="32%"><a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['right']['id']; ?>"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>detail.jpg" alt="" width="11" height="13" align="absmiddle" /><span class="blue_txt" style="padding-left:5px;">Details</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Baths:</td>
                              <td width="40%" align="center"><?php echo $this->_aVars['right']['no_of_bathrooms']; ?></td>
                              <td width="32%"><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.addToFavourite' , 'param=<?php echo $right.id; ?>')"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>save.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Save</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Sqft:</td>
                              <td width="40%" align="center"><?php echo $this->_aVars['right']['total_square_foot']; ?></td>
                              <td width="32%"><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>zoom.jpg" alt="" width="12" height="13" /><span style="padding-left:5px;" class="blue_txt">Map</span></a></td>
                            </tr>
                            <tr>
                              <td width="28%">Lot:</td>
                              <td width="40%" align="center"><?php echo $this->_aVars['real_estate_count']; ?></td>
                              <td width="32%"><a href="#"></td>
                            </tr>
                          </table>
                        </div>
                        </div>

                        <div class="clear"></div>
<?php endforeach; endif; ?>


					</div>
                </div>
            </div>
		</div>
<?php endif; ?>
<?php endif; ?>
			<!-- footer listing ends -->


			<!--footer div start-->

<?php if (Phpfox ::getLib('url')->getUrl() != 'realestate/print'): ?>
            <div id="main_footer_holder" class="footer_bg">
                <div class="holder">
<?php if (Phpfox ::getLib('url')->getUrl() == ''): ?>
<?php if (! Phpfox ::getParam('user.hide_main_menu') && ! Phpfox ::isUser()): ?>
                <div id="roommate"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>roommatefinder.png" alt="" width="188" height="108" /></div>
<?php endif; ?>
<?php endif; ?>
                    <div id="footer" class="footer">
<?php Phpfox::getBlock('core.template-menufooter'); ?>
                        <div id="copyright" class="copyright_custom">
<?php Phpfox::getBlock('core.template-copyright'); ?>
                        </div>
                        <div class="clear"></div>
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 5)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('5'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 5<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 5)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('5');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('5', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_5"> <div class="block js_sortable dnd_block_info">Position '5'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('5', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_5"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('5', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('5', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 5));  endif;  endif; ?>
                    </div>
                </div>
            </div>
<?php endif; ?>

			<!--footer div end-->
<?php Phpfox::getBlock('core.template-footer'); ?>
		</div>
<?php if (! Phpfox ::isUser() && ! Phpfox ::getUserBy('profile_page_id')): ?>
	</div>	<!-- main body -->
<?php endif; ?>

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
<?php endif; ?>
