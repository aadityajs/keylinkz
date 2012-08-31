<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: login-header.html.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */



?>
<?php if (Phpfox ::getLib('module')->getFullControllerName() != 'user.login'): ?>
<?php (($sPlugin = Phpfox_Plugin::get('user.template.login_header_set_var')) ? eval($sPlugin) : false); ?>
								<div id="header_menu_login">
<?php if (isset ( $this->_aVars['bCustomLogin'] )): ?>
									<div id="header_menu_login_holder">
<?php endif; ?>


                            <form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.login'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
                            <!-- <div class="lock">Lock</div> -->
                            <div class="header_menu_login_left">
                                <div class="header_menu_login_label"><?php if (Phpfox ::getParam('user.login_type') == 'user_name'):  echo Phpfox::getPhrase('user.user_name');  elseif (Phpfox ::getParam('user.login_type') == 'email'):  echo Phpfox::getPhrase('user.email');  else:  echo Phpfox::getPhrase('user.login');  endif; ?>:</div>
                                <div><input type="text" name="val[login]" value="" class="header_menu_login_input" tabindex="1" /></div>

                                <div class="header_menu_login_sub">
                                    <label><input type="checkbox" name="val[remember_me]" value="" checked="checked" tabindex="4" /> <?php echo Phpfox::getPhrase('user.keep_me_logged_in'); ?></label>
                                </div>
                            </div>
                            <div class="header_menu_login_right">
                                <div class="header_menu_login_label"><?php echo Phpfox::getPhrase('user.password'); ?>:</div>
                                <div><input type="password" name="val[password]" value="" class="header_menu_login_input" tabindex="2" /></div>
                                <div class="header_menu_login_sub">
                                    <a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.password.request'); ?>"><?php echo Phpfox::getPhrase('user.forgot_your_password'); ?></a>
                                </div>
                            </div>
                            <div class="header_menu_login_button">
                                <input type="submit" value="<?php echo Phpfox::getPhrase('user.login_singular'); ?>" tabindex="3" />
                            </div>
                            
</form>



<?php if (isset ( $this->_aVars['bCustomLogin'] )): ?>
									</div>
									<div id="header_menu_login_custom">
<?php echo Phpfox::getPhrase('user.or_login_with'); ?>:
<?php if (Phpfox ::isModule('facebook') && Phpfox ::getParam('facebook.enable_facebook_connect')): ?>
										<div class="header_login_block">
											<fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button>
										</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('janrain') && Phpfox ::getParam('janrain.enable_janrain_login')): ?>
										<div class="header_login_block">
											<a class="rpxnow" onclick="return false;" href="<?php echo $this->_aVars['sJanrainUrl']; ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/janrain-icons.png')); ?></a>
										</div>
<?php endif; ?>


<?php (($sPlugin = Phpfox_Plugin::get('user.template.login_header_custom')) ? eval($sPlugin) : false); ?>
									</div>
<?php endif; ?>
								</div>
								<script type="text/javascript">
								<?php echo '
									$Behavior.focusOnLogin = function()
									{
										$(\'.header_menu_login_input:first\').focus();
									}
								'; ?>

								</script>
<?php endif; ?>
