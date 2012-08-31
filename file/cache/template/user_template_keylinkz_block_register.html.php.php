<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: register.html.php 303 2009-03-22 20:08:08Z Raymond_Benc $
 */
 
 

?>

<?php /* Cached: July 10, 2012, 12:13 pm */ 
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: register.html.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */



?>
<?php echo '
<script type="text/javascript">
$Behavior.termsAndPrivacy = function()
{
	$(\'#js_terms_of_use\').click(function()
	{
		'; ?>

		tb_show('<?php echo Phpfox::getPhrase('user.terms_of_use', array('phpfox_squote' => true)); ?>', $.ajaxBox('page.view', 'height=410&width=600&title=terms'));
		<?php echo '
		return false;
	});

	$(\'#js_privacy_policy\').click(function()
	{
		'; ?>

		tb_show('<?php echo Phpfox::getPhrase('user.privacy_policy', array('phpfox_squote' => true)); ?>', $.ajaxBox('page.view', 'height=410&width=600&title=policy'));
		<?php echo '
		return false;
	});
}
</script>
'; ?>


<?php if (Phpfox ::getLib('module')->getFullControllerName() == 'user.register' && Phpfox ::isModule('invite')): ?>
<div id="main_registration_form">

	<h1><?php echo Phpfox::getPhrase('user.sign_up_for_ssitetitle', array('sSiteTitle' => $this->_aVars['sSiteTitle'])); ?></h1>
	<div class="extra_info">
<?php echo Phpfox::getPhrase('user.join_ssitetitle_to_connect_with_friends_share_photos_and_create_your_own_profile', array('sSiteTitle' => $this->_aVars['sSiteTitle'])); ?>
	</div>
	<div id="main_registration_form_holder">
<?php if (( ( Phpfox ::isModule('facebook') && Phpfox ::getParam('facebook.enable_facebook_connect')) || ( Phpfox ::isModule('janrain') && Phpfox ::getParam('janrain.enable_janrain_login'))) && ! Phpfox ::getService('invite')->isInviteOnly()): ?>
		<div id="main_registration_custom">
<?php echo Phpfox::getPhrase('user.or_sign_up_with'); ?>:
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
		</div>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::getLib('module')->getFullControllerName() != 'user.register'): ?>
<div class="user_register_holder">
	<div class="holder">
		<div class="user_register_intro">
<?php Phpfox::getBlock('user.welcome', array()); ?>
		</div>
		<div class="user_register_form">

<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>
			<div class="user_register_title">
<?php echo Phpfox::getPhrase('user.sign_up'); ?>
				<div class="extra_info">
				</div>
			</div>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('invite') && Phpfox ::getService('invite')->isInviteOnly()): ?>
		<div class="main_break">
			<div class="extra_info">
<?php echo Phpfox::getPhrase('user.ssitetitle_is_an_invite_only_community_enter_your_email_below_if_you_have_received_an_invitation', array('sSiteTitle' => $this->_aVars['sSiteTitle'])); ?>
			</div>
			<div class="main_break">
				<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div class="table">
						<div class="table_left">
<?php echo Phpfox::getPhrase('user.email'); ?>:
						</div>
						<div class="table_right">
							<input type="text" name="val[invite_email]" value="<?php if (! empty ( $this->_aVars['sUserEmailCookie'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['sUserEmailCookie']);  endif; ?>" />
						</div>
					</div>
					<div class="table_clear">
						<input type="submit" value="<?php echo Phpfox::getPhrase('user.submit'); ?>" class="button_register" />
					</div>
				
</form>

			</div>
		</div>
<?php else: ?>
<?php if (isset ( $this->_aVars['sCreateJs'] )): ?>
<?php echo $this->_aVars['sCreateJs']; ?>
<?php endif; ?>
		<div id="js_registration_process" class="t_center" style="display:none;">
			<div class="p_top_8">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','alt' => '')); ?>
			</div>
		</div>
		<div id="js_signup_error_message" style="width:350px;"></div>
<?php if (Phpfox ::getParam('user.allow_user_registration')): ?>


      <div id="register_box">
            <h1>New to KeyLinkz? Join Today!<br />
				One step signup.</h1>
        <div class="rounded_box">
        	<div class="top"></div>
			<div class="middle" id="js_registration_holder">
<?php if (Phpfox ::getParam('user.multi_step_registration_form') && ! isset ( $this->_aVars['bIsPosted'] )): ?>
				<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>" id="js_form" enctype="multipart/form-data">
<?php else: ?>
				<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.register'); ?>" id="js_form"<?php if (isset ( $this->_aVars['sGetJsForm'] )): ?> onsubmit="<?php echo $this->_aVars['sGetJsForm']; ?>"<?php endif; ?> enctype="multipart/form-data">
<?php endif; ?>
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>

					<div id="js_signup_block">
<?php if (isset ( $this->_aVars['bIsPosted'] ) || ! Phpfox ::getParam('user.multi_step_registration_form')): ?>
						<div>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
	<div id="js_register_step1">
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_3')) ? eval($sPlugin) : false); ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="full_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.full_name'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[full_name]" id="full_name" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['full_name']) : (isset($this->_aVars['aForms']['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['full_name']) : '')); ?>
" size="30" />
			</div>
		</div>
<?php if (! Phpfox ::getParam('user.profile_use_id') && ! Phpfox ::getParam('user.disable_username_on_sign_up')): ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="user_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.choose_a_username'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[user_name]" id="user_name" onkeyup="$('.bt-wrapper').remove(); $(this).ajaxCall('user.showUserName');" <?php if (Phpfox ::getParam('user.suggest_usernames_on_registration')): ?>onfocus="$('#btn_verify_username').slideDown()"<?php endif; ?> title="<?php echo Phpfox::getPhrase('user.your_username_is_used_to_easily_connect_to_your_profile'); ?>" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['user_name']) : (isset($this->_aVars['aForms']['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['user_name']) : '')); ?>
" size="30" autocomplete="off" />
				<div class="p_4">
<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?><strong id="js_signup_user_name"><?php echo Phpfox::getPhrase('user.your_user_name'); ?></strong>/
				</div>
				<div id="js_user_name_error_message"></div>
				<div style="display:none;" id="js_verify_username"></div>
<?php if (Phpfox ::getParam('user.suggest_usernames_on_registration')): ?>
				<div class="p_4" style="display:none;" id="btn_verify_username">
					<a href="#" onclick="$(this).ajaxCall('user.verifyUserName', 'user_name='+$('#user_name').val(), 'GET'); return false;"><?php echo Phpfox::getPhrase('user.check_availability'); ?></a>
				</div>
<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="email"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.email'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[email]" id="email" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['email']) : (isset($this->_aVars['aForms']['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['email']) : '')); ?>
" size="30" />
			</div>
		</div>

<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_5')) ? eval($sPlugin) : false); ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="password"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.password'); ?>:</label>
			</div>
			<div class="table_right">
<?php if (isset ( $this->_aVars['bIsPosted'] )): ?>
				<input type="password" name="val[password]" id="password" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['password']) : (isset($this->_aVars['aForms']['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['password']) : '')); ?>
" size="30" />
<?php else: ?>
				<input type="password" name="val[password]" id="password" value="" size="30" />
<?php endif; ?>
			</div>
		</div>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_4')) ? eval($sPlugin) : false); ?>
	</div>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
	<div id="js_register_step2">
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step2_6')) ? eval($sPlugin) : false); ?>
<?php if (! isset ( $this->_aVars['bIsPosted'] ) && Phpfox ::getParam('user.multi_step_registration_form')): ?>
		<div class="p_bottom_10"><?php echo Phpfox::getPhrase('user.complete_this_step_to_setup_your_personal_profile'); ?></div>
<?php endif; ?>
<?php if (Phpfox ::getParam('core.registration_enable_dob')): ?>
		<div class="table">
			<div class="table_left white_label">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.birthday'); ?>:
			</div>
			<div class="table_right" style="margin-left:98px;">
				<select name="val[month]" id="month" class="js_datepicker_month">
		<option value=""><?php echo Phpfox::getPhrase('core.month'); ?>:</option>
			<option value="1"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '1')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '1')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'January' : Phpfox::getPhrase('core.january')); ?></option>
			<option value="2"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '2')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '2')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'February' : Phpfox::getPhrase('core.february')); ?></option>
			<option value="3"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '3')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '3')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'March' : Phpfox::getPhrase('core.march')); ?></option>
			<option value="4"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '4')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '4')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'April' : Phpfox::getPhrase('core.april')); ?></option>
			<option value="5"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '5')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '5')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'May' : Phpfox::getPhrase('core.may')); ?></option>
			<option value="6"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '6')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '6')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'June' : Phpfox::getPhrase('core.june')); ?></option>
			<option value="7"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '7')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '7')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'July' : Phpfox::getPhrase('core.july')); ?></option>
			<option value="8"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '8')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '8')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'August' : Phpfox::getPhrase('core.august')); ?></option>
			<option value="9"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '9')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '9')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'September' : Phpfox::getPhrase('core.september')); ?></option>
			<option value="10"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '10')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '10')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'October' : Phpfox::getPhrase('core.october')); ?></option>
			<option value="11"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '11')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '11')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'November' : Phpfox::getPhrase('core.november')); ?></option>
			<option value="12"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('month') && in_array('month', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['month'])
								&& $aParams['month'] == '12')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['month'])
									&& !isset($aParams['month'])
									&& $this->_aVars['aForms']['month'] == '12')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (defined('PHPFOX_INSTALLER') ? 'December' : Phpfox::getPhrase('core.december')); ?></option>
		</select>
 / 		<select name="val[day]" id="day" class="js_datepicker_day">
		<option value=""><?php echo Phpfox::getPhrase('core.day'); ?>:</option>
			<option value="1"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '1')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '1')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>1</option>
			<option value="2"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '2')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '2')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>2</option>
			<option value="3"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '3')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '3')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>3</option>
			<option value="4"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '4')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '4')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>4</option>
			<option value="5"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '5')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '5')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>5</option>
			<option value="6"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '6')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '6')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>6</option>
			<option value="7"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '7')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '7')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>7</option>
			<option value="8"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '8')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '8')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>8</option>
			<option value="9"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '9')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '9')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>9</option>
			<option value="10"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '10')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '10')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>10</option>
			<option value="11"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '11')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '11')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>11</option>
			<option value="12"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '12')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '12')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>12</option>
			<option value="13"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '13')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '13')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>13</option>
			<option value="14"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '14')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '14')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>14</option>
			<option value="15"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '15')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '15')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>15</option>
			<option value="16"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '16')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '16')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>16</option>
			<option value="17"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '17')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '17')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>17</option>
			<option value="18"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '18')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '18')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>18</option>
			<option value="19"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '19')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '19')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>19</option>
			<option value="20"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '20')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '20')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>20</option>
			<option value="21"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '21')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '21')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>21</option>
			<option value="22"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '22')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '22')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>22</option>
			<option value="23"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '23')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '23')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>23</option>
			<option value="24"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '24')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '24')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>24</option>
			<option value="25"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '25')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '25')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>25</option>
			<option value="26"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '26')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '26')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>26</option>
			<option value="27"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '27')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '27')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>27</option>
			<option value="28"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '28')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '28')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>28</option>
			<option value="29"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '29')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '29')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>29</option>
			<option value="30"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '30')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '30')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>30</option>
			<option value="31"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('day') && in_array('day', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['day'])
								&& $aParams['day'] == '31')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['day'])
									&& !isset($aParams['day'])
									&& $this->_aVars['aForms']['day'] == '31')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
>31</option>
		</select>
 / <?php $aYears = range($this->_aVars['sDobEnd'], $this->_aVars['sDobStart']);   $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); ?>		<select name="val[year]" id="year" class="js_datepicker_year">
		<option value=""><?php echo Phpfox::getPhrase('core.year'); ?>:</option>
<?php foreach ($aYears as $iYear): ?>			<option value="<?php echo $iYear; ?>"<?php echo ((isset($aParams['year']) && $aParams['year'] == $iYear) ? ' selected="selected"' : (!isset($this->_aVars['aForms']['year']) ? ($iYear == Phpfox::getTime('Y') ? ' selected="selected"' : '') : ($this->_aVars['aForms']['year'] == $iYear ? ' selected="selected"' : ''))); ?>><?php echo $iYear; ?></option>
<?php endforeach; ?>		</select>

			</div>
		</div>
<?php endif; ?>
<?php if (Phpfox ::getParam('core.registration_enable_gender')): ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="gender"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.i_am'); ?>:</label>
			</div>
			<div class="table_right" style="margin-left:98px;">
				<select name="val[gender]" id="gender">
		<option value=""><?php echo Phpfox::getPhrase('core.select'); ?>:</option>
			<option value="1"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('gender') && in_array('gender', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['gender'])
								&& $aParams['gender'] == '1')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['gender'])
									&& !isset($aParams['gender'])
									&& $this->_aVars['aForms']['gender'] == '1')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getPhrase('profile.male'); ?></option>
			<option value="2"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('gender') && in_array('gender', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['gender'])
								&& $aParams['gender'] == '2')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['gender'])
									&& !isset($aParams['gender'])
									&& $this->_aVars['aForms']['gender'] == '2')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getPhrase('profile.female'); ?></option>
		</select>
			</div>
		</div>
<?php endif; ?>
<?php if (Phpfox ::getParam('core.registration_enable_location')): ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="country_iso"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.location'); ?>:</label>
			</div>
			<div class="table_right">
				<select name="val[country_iso]" id="country_iso">
		<option value=""><?php echo Phpfox::getPhrase('core.select'); ?>:</option>
			<option id="js_country_iso_option_AF" value="AF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_af') ? Phpfox::getPhrase('core.translate_country_iso_af') : 'Afghanistan'); ?></option>
			<option id="js_country_iso_option_AX" value="AX"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AX')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AX')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ax') ? Phpfox::getPhrase('core.translate_country_iso_ax') : 'Aland Islands'); ?></option>
			<option id="js_country_iso_option_AL" value="AL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_al') ? Phpfox::getPhrase('core.translate_country_iso_al') : 'Albania'); ?></option>
			<option id="js_country_iso_option_DZ" value="DZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_dz') ? Phpfox::getPhrase('core.translate_country_iso_dz') : 'Algeria'); ?></option>
			<option id="js_country_iso_option_AS" value="AS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_as') ? Phpfox::getPhrase('core.translate_country_iso_as') : 'American Samoa'); ?></option>
			<option id="js_country_iso_option_AD" value="AD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ad') ? Phpfox::getPhrase('core.translate_country_iso_ad') : 'Andorra'); ?></option>
			<option id="js_country_iso_option_AO" value="AO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ao') ? Phpfox::getPhrase('core.translate_country_iso_ao') : 'Angola'); ?></option>
			<option id="js_country_iso_option_AI" value="AI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ai') ? Phpfox::getPhrase('core.translate_country_iso_ai') : 'Anguilla'); ?></option>
			<option id="js_country_iso_option_AQ" value="AQ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AQ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AQ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_aq') ? Phpfox::getPhrase('core.translate_country_iso_aq') : 'Antarctica'); ?></option>
			<option id="js_country_iso_option_AG" value="AG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ag') ? Phpfox::getPhrase('core.translate_country_iso_ag') : 'Antigua and Barbuda'); ?></option>
			<option id="js_country_iso_option_AR" value="AR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ar') ? Phpfox::getPhrase('core.translate_country_iso_ar') : 'Argentina'); ?></option>
			<option id="js_country_iso_option_AM" value="AM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_am') ? Phpfox::getPhrase('core.translate_country_iso_am') : 'Armenia'); ?></option>
			<option id="js_country_iso_option_AW" value="AW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_aw') ? Phpfox::getPhrase('core.translate_country_iso_aw') : 'Aruba'); ?></option>
			<option id="js_country_iso_option_AU" value="AU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_au') ? Phpfox::getPhrase('core.translate_country_iso_au') : 'Australia'); ?></option>
			<option id="js_country_iso_option_AT" value="AT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_at') ? Phpfox::getPhrase('core.translate_country_iso_at') : 'Austria'); ?></option>
			<option id="js_country_iso_option_AZ" value="AZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_az') ? Phpfox::getPhrase('core.translate_country_iso_az') : 'Azerbaijan'); ?></option>
			<option id="js_country_iso_option_BS" value="BS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bs') ? Phpfox::getPhrase('core.translate_country_iso_bs') : 'Bahamas'); ?></option>
			<option id="js_country_iso_option_BH" value="BH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bh') ? Phpfox::getPhrase('core.translate_country_iso_bh') : 'Bahrain'); ?></option>
			<option id="js_country_iso_option_BD" value="BD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bd') ? Phpfox::getPhrase('core.translate_country_iso_bd') : 'Bangladesh'); ?></option>
			<option id="js_country_iso_option_BB" value="BB"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BB')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BB')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bb') ? Phpfox::getPhrase('core.translate_country_iso_bb') : 'Barbados'); ?></option>
			<option id="js_country_iso_option_BY" value="BY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_by') ? Phpfox::getPhrase('core.translate_country_iso_by') : 'Belarus'); ?></option>
			<option id="js_country_iso_option_BE" value="BE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_be') ? Phpfox::getPhrase('core.translate_country_iso_be') : 'Belgium'); ?></option>
			<option id="js_country_iso_option_BZ" value="BZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bz') ? Phpfox::getPhrase('core.translate_country_iso_bz') : 'Belize'); ?></option>
			<option id="js_country_iso_option_BJ" value="BJ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BJ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BJ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bj') ? Phpfox::getPhrase('core.translate_country_iso_bj') : 'Benin'); ?></option>
			<option id="js_country_iso_option_BM" value="BM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bm') ? Phpfox::getPhrase('core.translate_country_iso_bm') : 'Bermuda'); ?></option>
			<option id="js_country_iso_option_BT" value="BT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bt') ? Phpfox::getPhrase('core.translate_country_iso_bt') : 'Bhutan'); ?></option>
			<option id="js_country_iso_option_BO" value="BO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bo') ? Phpfox::getPhrase('core.translate_country_iso_bo') : 'Bolivia'); ?></option>
			<option id="js_country_iso_option_BA" value="BA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ba') ? Phpfox::getPhrase('core.translate_country_iso_ba') : 'Bosnia and Herzegovina'); ?></option>
			<option id="js_country_iso_option_BW" value="BW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bw') ? Phpfox::getPhrase('core.translate_country_iso_bw') : 'Botswana'); ?></option>
			<option id="js_country_iso_option_BV" value="BV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bv') ? Phpfox::getPhrase('core.translate_country_iso_bv') : 'Bouvet Island'); ?></option>
			<option id="js_country_iso_option_BR" value="BR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_br') ? Phpfox::getPhrase('core.translate_country_iso_br') : 'Brazil'); ?></option>
			<option id="js_country_iso_option_IO" value="IO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_io') ? Phpfox::getPhrase('core.translate_country_iso_io') : 'British Indian Ocean Territory'); ?></option>
			<option id="js_country_iso_option_BN" value="BN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bn') ? Phpfox::getPhrase('core.translate_country_iso_bn') : 'Brunei Darussalam'); ?></option>
			<option id="js_country_iso_option_BG" value="BG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bg') ? Phpfox::getPhrase('core.translate_country_iso_bg') : 'Bulgaria'); ?></option>
			<option id="js_country_iso_option_BF" value="BF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bf') ? Phpfox::getPhrase('core.translate_country_iso_bf') : 'Burkina Faso'); ?></option>
			<option id="js_country_iso_option_BI" value="BI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bi') ? Phpfox::getPhrase('core.translate_country_iso_bi') : 'Burundi'); ?></option>
			<option id="js_country_iso_option_KH" value="KH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kh') ? Phpfox::getPhrase('core.translate_country_iso_kh') : 'Cambodia'); ?></option>
			<option id="js_country_iso_option_CM" value="CM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cm') ? Phpfox::getPhrase('core.translate_country_iso_cm') : 'Cameroon'); ?></option>
			<option id="js_country_iso_option_CA" value="CA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ca') ? Phpfox::getPhrase('core.translate_country_iso_ca') : 'Canada'); ?></option>
			<option id="js_country_iso_option_CV" value="CV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cv') ? Phpfox::getPhrase('core.translate_country_iso_cv') : 'Cape Verde'); ?></option>
			<option id="js_country_iso_option_KY" value="KY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ky') ? Phpfox::getPhrase('core.translate_country_iso_ky') : 'Cayman Islands'); ?></option>
			<option id="js_country_iso_option_CF" value="CF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cf') ? Phpfox::getPhrase('core.translate_country_iso_cf') : 'Central African Republic'); ?></option>
			<option id="js_country_iso_option_TD" value="TD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_td') ? Phpfox::getPhrase('core.translate_country_iso_td') : 'Chad'); ?></option>
			<option id="js_country_iso_option_CL" value="CL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cl') ? Phpfox::getPhrase('core.translate_country_iso_cl') : 'Chile'); ?></option>
			<option id="js_country_iso_option_CN" value="CN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cn') ? Phpfox::getPhrase('core.translate_country_iso_cn') : 'China'); ?></option>
			<option id="js_country_iso_option_CX" value="CX"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CX')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CX')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cx') ? Phpfox::getPhrase('core.translate_country_iso_cx') : 'Christmas Island'); ?></option>
			<option id="js_country_iso_option_CC" value="CC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cc') ? Phpfox::getPhrase('core.translate_country_iso_cc') : 'Cocos (Keeling) Islands'); ?></option>
			<option id="js_country_iso_option_CO" value="CO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_co') ? Phpfox::getPhrase('core.translate_country_iso_co') : 'Colombia'); ?></option>
			<option id="js_country_iso_option_KM" value="KM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_km') ? Phpfox::getPhrase('core.translate_country_iso_km') : 'Comoros'); ?></option>
			<option id="js_country_iso_option_CG" value="CG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cg') ? Phpfox::getPhrase('core.translate_country_iso_cg') : 'Congo'); ?></option>
			<option id="js_country_iso_option_CD" value="CD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cd') ? Phpfox::getPhrase('core.translate_country_iso_cd') : 'Congo, the Democratic Republic of the'); ?></option>
			<option id="js_country_iso_option_CK" value="CK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ck') ? Phpfox::getPhrase('core.translate_country_iso_ck') : 'Cook Islands'); ?></option>
			<option id="js_country_iso_option_CR" value="CR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cr') ? Phpfox::getPhrase('core.translate_country_iso_cr') : 'Costa Rica'); ?></option>
			<option id="js_country_iso_option_CI" value="CI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ci') ? Phpfox::getPhrase('core.translate_country_iso_ci') : 'Cote D\'Ivoire'); ?></option>
			<option id="js_country_iso_option_HR" value="HR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_hr') ? Phpfox::getPhrase('core.translate_country_iso_hr') : 'Croatia'); ?></option>
			<option id="js_country_iso_option_CU" value="CU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cu') ? Phpfox::getPhrase('core.translate_country_iso_cu') : 'Cuba'); ?></option>
			<option id="js_country_iso_option_CY" value="CY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cy') ? Phpfox::getPhrase('core.translate_country_iso_cy') : 'Cyprus'); ?></option>
			<option id="js_country_iso_option_CZ" value="CZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_cz') ? Phpfox::getPhrase('core.translate_country_iso_cz') : 'Czech Republic'); ?></option>
			<option id="js_country_iso_option_DK" value="DK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_dk') ? Phpfox::getPhrase('core.translate_country_iso_dk') : 'Denmark'); ?></option>
			<option id="js_country_iso_option_DJ" value="DJ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DJ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DJ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_dj') ? Phpfox::getPhrase('core.translate_country_iso_dj') : 'Djibouti'); ?></option>
			<option id="js_country_iso_option_DM" value="DM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_dm') ? Phpfox::getPhrase('core.translate_country_iso_dm') : 'Dominica'); ?></option>
			<option id="js_country_iso_option_DO" value="DO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_do') ? Phpfox::getPhrase('core.translate_country_iso_do') : 'Dominican Republic'); ?></option>
			<option id="js_country_iso_option_EC" value="EC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'EC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'EC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ec') ? Phpfox::getPhrase('core.translate_country_iso_ec') : 'Ecuador'); ?></option>
			<option id="js_country_iso_option_EG" value="EG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'EG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'EG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_eg') ? Phpfox::getPhrase('core.translate_country_iso_eg') : 'Egypt'); ?></option>
			<option id="js_country_iso_option_SV" value="SV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sv') ? Phpfox::getPhrase('core.translate_country_iso_sv') : 'El Salvador'); ?></option>
			<option id="js_country_iso_option_GQ" value="GQ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GQ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GQ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gq') ? Phpfox::getPhrase('core.translate_country_iso_gq') : 'Equatorial Guinea'); ?></option>
			<option id="js_country_iso_option_ER" value="ER"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ER')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ER')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_er') ? Phpfox::getPhrase('core.translate_country_iso_er') : 'Eritrea'); ?></option>
			<option id="js_country_iso_option_EE" value="EE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'EE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'EE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ee') ? Phpfox::getPhrase('core.translate_country_iso_ee') : 'Estonia'); ?></option>
			<option id="js_country_iso_option_ET" value="ET"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ET')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ET')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_et') ? Phpfox::getPhrase('core.translate_country_iso_et') : 'Ethiopia'); ?></option>
			<option id="js_country_iso_option_FK" value="FK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fk') ? Phpfox::getPhrase('core.translate_country_iso_fk') : 'Falkland Islands (Malvinas)'); ?></option>
			<option id="js_country_iso_option_FO" value="FO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fo') ? Phpfox::getPhrase('core.translate_country_iso_fo') : 'Faroe Islands'); ?></option>
			<option id="js_country_iso_option_FJ" value="FJ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FJ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FJ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fj') ? Phpfox::getPhrase('core.translate_country_iso_fj') : 'Fiji'); ?></option>
			<option id="js_country_iso_option_FI" value="FI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fi') ? Phpfox::getPhrase('core.translate_country_iso_fi') : 'Finland'); ?></option>
			<option id="js_country_iso_option_FR" value="FR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fr') ? Phpfox::getPhrase('core.translate_country_iso_fr') : 'France'); ?></option>
			<option id="js_country_iso_option_GF" value="GF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gf') ? Phpfox::getPhrase('core.translate_country_iso_gf') : 'French Guiana'); ?></option>
			<option id="js_country_iso_option_PF" value="PF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pf') ? Phpfox::getPhrase('core.translate_country_iso_pf') : 'French Polynesia'); ?></option>
			<option id="js_country_iso_option_TF" value="TF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tf') ? Phpfox::getPhrase('core.translate_country_iso_tf') : 'French Southern Territories'); ?></option>
			<option id="js_country_iso_option_GA" value="GA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ga') ? Phpfox::getPhrase('core.translate_country_iso_ga') : 'Gabon'); ?></option>
			<option id="js_country_iso_option_GM" value="GM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gm') ? Phpfox::getPhrase('core.translate_country_iso_gm') : 'Gambia'); ?></option>
			<option id="js_country_iso_option_GE" value="GE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ge') ? Phpfox::getPhrase('core.translate_country_iso_ge') : 'Georgia'); ?></option>
			<option id="js_country_iso_option_DE" value="DE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'DE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'DE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_de') ? Phpfox::getPhrase('core.translate_country_iso_de') : 'Germany'); ?></option>
			<option id="js_country_iso_option_GH" value="GH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gh') ? Phpfox::getPhrase('core.translate_country_iso_gh') : 'Ghana'); ?></option>
			<option id="js_country_iso_option_GI" value="GI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gi') ? Phpfox::getPhrase('core.translate_country_iso_gi') : 'Gibraltar'); ?></option>
			<option id="js_country_iso_option_GR" value="GR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gr') ? Phpfox::getPhrase('core.translate_country_iso_gr') : 'Greece'); ?></option>
			<option id="js_country_iso_option_GL" value="GL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gl') ? Phpfox::getPhrase('core.translate_country_iso_gl') : 'Greenland'); ?></option>
			<option id="js_country_iso_option_GD" value="GD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gd') ? Phpfox::getPhrase('core.translate_country_iso_gd') : 'Grenada'); ?></option>
			<option id="js_country_iso_option_GP" value="GP"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GP')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GP')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gp') ? Phpfox::getPhrase('core.translate_country_iso_gp') : 'Guadeloupe'); ?></option>
			<option id="js_country_iso_option_GU" value="GU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gu') ? Phpfox::getPhrase('core.translate_country_iso_gu') : 'Guam'); ?></option>
			<option id="js_country_iso_option_GT" value="GT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gt') ? Phpfox::getPhrase('core.translate_country_iso_gt') : 'Guatemala'); ?></option>
			<option id="js_country_iso_option_GG" value="GG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gg') ? Phpfox::getPhrase('core.translate_country_iso_gg') : 'Guernsey'); ?></option>
			<option id="js_country_iso_option_GN" value="GN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gn') ? Phpfox::getPhrase('core.translate_country_iso_gn') : 'Guinea'); ?></option>
			<option id="js_country_iso_option_GW" value="GW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gw') ? Phpfox::getPhrase('core.translate_country_iso_gw') : 'Guinea-Bissau'); ?></option>
			<option id="js_country_iso_option_GY" value="GY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gy') ? Phpfox::getPhrase('core.translate_country_iso_gy') : 'Guyana'); ?></option>
			<option id="js_country_iso_option_HT" value="HT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ht') ? Phpfox::getPhrase('core.translate_country_iso_ht') : 'Haiti'); ?></option>
			<option id="js_country_iso_option_HM" value="HM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_hm') ? Phpfox::getPhrase('core.translate_country_iso_hm') : 'Heard Island and Mcdonald Islands'); ?></option>
			<option id="js_country_iso_option_VA" value="VA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_va') ? Phpfox::getPhrase('core.translate_country_iso_va') : 'Holy See (Vatican City State)'); ?></option>
			<option id="js_country_iso_option_HN" value="HN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_hn') ? Phpfox::getPhrase('core.translate_country_iso_hn') : 'Honduras'); ?></option>
			<option id="js_country_iso_option_HK" value="HK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_hk') ? Phpfox::getPhrase('core.translate_country_iso_hk') : 'Hong Kong'); ?></option>
			<option id="js_country_iso_option_HU" value="HU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'HU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'HU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_hu') ? Phpfox::getPhrase('core.translate_country_iso_hu') : 'Hungary'); ?></option>
			<option id="js_country_iso_option_IS" value="IS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_is') ? Phpfox::getPhrase('core.translate_country_iso_is') : 'Iceland'); ?></option>
			<option id="js_country_iso_option_IN" value="IN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_in') ? Phpfox::getPhrase('core.translate_country_iso_in') : 'India'); ?></option>
			<option id="js_country_iso_option_ID" value="ID"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ID')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ID')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_id') ? Phpfox::getPhrase('core.translate_country_iso_id') : 'Indonesia'); ?></option>
			<option id="js_country_iso_option_IR" value="IR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ir') ? Phpfox::getPhrase('core.translate_country_iso_ir') : 'Iran, Islamic Republic of'); ?></option>
			<option id="js_country_iso_option_IQ" value="IQ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IQ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IQ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_iq') ? Phpfox::getPhrase('core.translate_country_iso_iq') : 'Iraq'); ?></option>
			<option id="js_country_iso_option_IE" value="IE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ie') ? Phpfox::getPhrase('core.translate_country_iso_ie') : 'Ireland'); ?></option>
			<option id="js_country_iso_option_IM" value="IM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_im') ? Phpfox::getPhrase('core.translate_country_iso_im') : 'Isle of Man'); ?></option>
			<option id="js_country_iso_option_IL" value="IL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_il') ? Phpfox::getPhrase('core.translate_country_iso_il') : 'Israel'); ?></option>
			<option id="js_country_iso_option_IT" value="IT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'IT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'IT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_it') ? Phpfox::getPhrase('core.translate_country_iso_it') : 'Italy'); ?></option>
			<option id="js_country_iso_option_JM" value="JM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'JM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'JM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_jm') ? Phpfox::getPhrase('core.translate_country_iso_jm') : 'Jamaica'); ?></option>
			<option id="js_country_iso_option_JP" value="JP"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'JP')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'JP')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_jp') ? Phpfox::getPhrase('core.translate_country_iso_jp') : 'Japan'); ?></option>
			<option id="js_country_iso_option_JO" value="JO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'JO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'JO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_jo') ? Phpfox::getPhrase('core.translate_country_iso_jo') : 'Jordan'); ?></option>
			<option id="js_country_iso_option_KZ" value="KZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kz') ? Phpfox::getPhrase('core.translate_country_iso_kz') : 'Kazakhstan'); ?></option>
			<option id="js_country_iso_option_KE" value="KE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ke') ? Phpfox::getPhrase('core.translate_country_iso_ke') : 'Kenya'); ?></option>
			<option id="js_country_iso_option_KI" value="KI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ki') ? Phpfox::getPhrase('core.translate_country_iso_ki') : 'Kiribati'); ?></option>
			<option id="js_country_iso_option_KP" value="KP"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KP')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KP')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kp') ? Phpfox::getPhrase('core.translate_country_iso_kp') : 'Korea, Democratic People\'s Republic of'); ?></option>
			<option id="js_country_iso_option_KR" value="KR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kr') ? Phpfox::getPhrase('core.translate_country_iso_kr') : 'Korea, Republic of'); ?></option>
			<option id="js_country_iso_option_KW" value="KW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kw') ? Phpfox::getPhrase('core.translate_country_iso_kw') : 'Kuwait'); ?></option>
			<option id="js_country_iso_option_KG" value="KG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kg') ? Phpfox::getPhrase('core.translate_country_iso_kg') : 'Kyrgyzstan'); ?></option>
			<option id="js_country_iso_option_LA" value="LA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_la') ? Phpfox::getPhrase('core.translate_country_iso_la') : 'Lao People\'s Democratic Republic'); ?></option>
			<option id="js_country_iso_option_LV" value="LV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lv') ? Phpfox::getPhrase('core.translate_country_iso_lv') : 'Latvia'); ?></option>
			<option id="js_country_iso_option_LB" value="LB"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LB')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LB')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lb') ? Phpfox::getPhrase('core.translate_country_iso_lb') : 'Lebanon'); ?></option>
			<option id="js_country_iso_option_LS" value="LS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ls') ? Phpfox::getPhrase('core.translate_country_iso_ls') : 'Lesotho'); ?></option>
			<option id="js_country_iso_option_LR" value="LR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lr') ? Phpfox::getPhrase('core.translate_country_iso_lr') : 'Liberia'); ?></option>
			<option id="js_country_iso_option_LY" value="LY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ly') ? Phpfox::getPhrase('core.translate_country_iso_ly') : 'Libyan Arab Jamahiriya'); ?></option>
			<option id="js_country_iso_option_LI" value="LI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_li') ? Phpfox::getPhrase('core.translate_country_iso_li') : 'Liechtenstein'); ?></option>
			<option id="js_country_iso_option_LT" value="LT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lt') ? Phpfox::getPhrase('core.translate_country_iso_lt') : 'Lithuania'); ?></option>
			<option id="js_country_iso_option_LU" value="LU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lu') ? Phpfox::getPhrase('core.translate_country_iso_lu') : 'Luxembourg'); ?></option>
			<option id="js_country_iso_option_MO" value="MO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mo') ? Phpfox::getPhrase('core.translate_country_iso_mo') : 'Macao'); ?></option>
			<option id="js_country_iso_option_MK" value="MK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mk') ? Phpfox::getPhrase('core.translate_country_iso_mk') : 'Macedonia, the Former Yugoslav Republic of'); ?></option>
			<option id="js_country_iso_option_MG" value="MG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mg') ? Phpfox::getPhrase('core.translate_country_iso_mg') : 'Madagascar'); ?></option>
			<option id="js_country_iso_option_MW" value="MW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mw') ? Phpfox::getPhrase('core.translate_country_iso_mw') : 'Malawi'); ?></option>
			<option id="js_country_iso_option_MY" value="MY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_my') ? Phpfox::getPhrase('core.translate_country_iso_my') : 'Malaysia'); ?></option>
			<option id="js_country_iso_option_MV" value="MV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mv') ? Phpfox::getPhrase('core.translate_country_iso_mv') : 'Maldives'); ?></option>
			<option id="js_country_iso_option_ML" value="ML"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ML')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ML')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ml') ? Phpfox::getPhrase('core.translate_country_iso_ml') : 'Mali'); ?></option>
			<option id="js_country_iso_option_MT" value="MT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mt') ? Phpfox::getPhrase('core.translate_country_iso_mt') : 'Malta'); ?></option>
			<option id="js_country_iso_option_MH" value="MH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mh') ? Phpfox::getPhrase('core.translate_country_iso_mh') : 'Marshall Islands'); ?></option>
			<option id="js_country_iso_option_MQ" value="MQ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MQ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MQ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mq') ? Phpfox::getPhrase('core.translate_country_iso_mq') : 'Martinique'); ?></option>
			<option id="js_country_iso_option_MR" value="MR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mr') ? Phpfox::getPhrase('core.translate_country_iso_mr') : 'Mauritania'); ?></option>
			<option id="js_country_iso_option_MU" value="MU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mu') ? Phpfox::getPhrase('core.translate_country_iso_mu') : 'Mauritius'); ?></option>
			<option id="js_country_iso_option_YT" value="YT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'YT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'YT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_yt') ? Phpfox::getPhrase('core.translate_country_iso_yt') : 'Mayotte'); ?></option>
			<option id="js_country_iso_option_MX" value="MX"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MX')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MX')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mx') ? Phpfox::getPhrase('core.translate_country_iso_mx') : 'Mexico'); ?></option>
			<option id="js_country_iso_option_FM" value="FM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'FM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'FM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_fm') ? Phpfox::getPhrase('core.translate_country_iso_fm') : 'Micronesia, Federated States of'); ?></option>
			<option id="js_country_iso_option_MD" value="MD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_md') ? Phpfox::getPhrase('core.translate_country_iso_md') : 'Moldova, Republic of'); ?></option>
			<option id="js_country_iso_option_MC" value="MC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mc') ? Phpfox::getPhrase('core.translate_country_iso_mc') : 'Monaco'); ?></option>
			<option id="js_country_iso_option_MN" value="MN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mn') ? Phpfox::getPhrase('core.translate_country_iso_mn') : 'Mongolia'); ?></option>
			<option id="js_country_iso_option_ME" value="ME"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ME')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ME')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_me') ? Phpfox::getPhrase('core.translate_country_iso_me') : 'Montenegro'); ?></option>
			<option id="js_country_iso_option_MS" value="MS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ms') ? Phpfox::getPhrase('core.translate_country_iso_ms') : 'Montserrat'); ?></option>
			<option id="js_country_iso_option_MA" value="MA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ma') ? Phpfox::getPhrase('core.translate_country_iso_ma') : 'Morocco'); ?></option>
			<option id="js_country_iso_option_MZ" value="MZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mz') ? Phpfox::getPhrase('core.translate_country_iso_mz') : 'Mozambique'); ?></option>
			<option id="js_country_iso_option_MM" value="MM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mm') ? Phpfox::getPhrase('core.translate_country_iso_mm') : 'Myanmar'); ?></option>
			<option id="js_country_iso_option_NA" value="NA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_na') ? Phpfox::getPhrase('core.translate_country_iso_na') : 'Namibia'); ?></option>
			<option id="js_country_iso_option_NR" value="NR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nr') ? Phpfox::getPhrase('core.translate_country_iso_nr') : 'Nauru'); ?></option>
			<option id="js_country_iso_option_NP" value="NP"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NP')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NP')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_np') ? Phpfox::getPhrase('core.translate_country_iso_np') : 'Nepal'); ?></option>
			<option id="js_country_iso_option_NL" value="NL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nl') ? Phpfox::getPhrase('core.translate_country_iso_nl') : 'Netherlands'); ?></option>
			<option id="js_country_iso_option_AN" value="AN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_an') ? Phpfox::getPhrase('core.translate_country_iso_an') : 'Netherlands Antilles'); ?></option>
			<option id="js_country_iso_option_NC" value="NC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nc') ? Phpfox::getPhrase('core.translate_country_iso_nc') : 'New Caledonia'); ?></option>
			<option id="js_country_iso_option_NZ" value="NZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nz') ? Phpfox::getPhrase('core.translate_country_iso_nz') : 'New Zealand'); ?></option>
			<option id="js_country_iso_option_NI" value="NI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ni') ? Phpfox::getPhrase('core.translate_country_iso_ni') : 'Nicaragua'); ?></option>
			<option id="js_country_iso_option_NE" value="NE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ne') ? Phpfox::getPhrase('core.translate_country_iso_ne') : 'Niger'); ?></option>
			<option id="js_country_iso_option_NG" value="NG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ng') ? Phpfox::getPhrase('core.translate_country_iso_ng') : 'Nigeria'); ?></option>
			<option id="js_country_iso_option_NU" value="NU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nu') ? Phpfox::getPhrase('core.translate_country_iso_nu') : 'Niue'); ?></option>
			<option id="js_country_iso_option_NF" value="NF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_nf') ? Phpfox::getPhrase('core.translate_country_iso_nf') : 'Norfolk Island'); ?></option>
			<option id="js_country_iso_option_MP" value="MP"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'MP')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'MP')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_mp') ? Phpfox::getPhrase('core.translate_country_iso_mp') : 'Northern Mariana Islands'); ?></option>
			<option id="js_country_iso_option_NO" value="NO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'NO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'NO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_no') ? Phpfox::getPhrase('core.translate_country_iso_no') : 'Norway'); ?></option>
			<option id="js_country_iso_option_OM" value="OM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'OM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'OM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_om') ? Phpfox::getPhrase('core.translate_country_iso_om') : 'Oman'); ?></option>
			<option id="js_country_iso_option_PK" value="PK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pk') ? Phpfox::getPhrase('core.translate_country_iso_pk') : 'Pakistan'); ?></option>
			<option id="js_country_iso_option_PW" value="PW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pw') ? Phpfox::getPhrase('core.translate_country_iso_pw') : 'Palau'); ?></option>
			<option id="js_country_iso_option_PS" value="PS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ps') ? Phpfox::getPhrase('core.translate_country_iso_ps') : 'Palestinian Territory, Occupied'); ?></option>
			<option id="js_country_iso_option_PA" value="PA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pa') ? Phpfox::getPhrase('core.translate_country_iso_pa') : 'Panama'); ?></option>
			<option id="js_country_iso_option_PG" value="PG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pg') ? Phpfox::getPhrase('core.translate_country_iso_pg') : 'Papua New Guinea'); ?></option>
			<option id="js_country_iso_option_PY" value="PY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_py') ? Phpfox::getPhrase('core.translate_country_iso_py') : 'Paraguay'); ?></option>
			<option id="js_country_iso_option_PE" value="PE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pe') ? Phpfox::getPhrase('core.translate_country_iso_pe') : 'Peru'); ?></option>
			<option id="js_country_iso_option_PH" value="PH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ph') ? Phpfox::getPhrase('core.translate_country_iso_ph') : 'Philippines'); ?></option>
			<option id="js_country_iso_option_PN" value="PN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pn') ? Phpfox::getPhrase('core.translate_country_iso_pn') : 'Pitcairn'); ?></option>
			<option id="js_country_iso_option_PL" value="PL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pl') ? Phpfox::getPhrase('core.translate_country_iso_pl') : 'Poland'); ?></option>
			<option id="js_country_iso_option_PT" value="PT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pt') ? Phpfox::getPhrase('core.translate_country_iso_pt') : 'Portugal'); ?></option>
			<option id="js_country_iso_option_PR" value="PR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pr') ? Phpfox::getPhrase('core.translate_country_iso_pr') : 'Puerto Rico'); ?></option>
			<option id="js_country_iso_option_QA" value="QA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'QA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'QA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_qa') ? Phpfox::getPhrase('core.translate_country_iso_qa') : 'Qatar'); ?></option>
			<option id="js_country_iso_option_RE" value="RE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'RE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'RE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_re') ? Phpfox::getPhrase('core.translate_country_iso_re') : 'Reunion'); ?></option>
			<option id="js_country_iso_option_RO" value="RO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'RO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'RO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ro') ? Phpfox::getPhrase('core.translate_country_iso_ro') : 'Romania'); ?></option>
			<option id="js_country_iso_option_RU" value="RU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'RU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'RU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ru') ? Phpfox::getPhrase('core.translate_country_iso_ru') : 'Russian Federation'); ?></option>
			<option id="js_country_iso_option_RW" value="RW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'RW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'RW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_rw') ? Phpfox::getPhrase('core.translate_country_iso_rw') : 'Rwanda'); ?></option>
			<option id="js_country_iso_option_BL" value="BL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'BL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'BL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_bl') ? Phpfox::getPhrase('core.translate_country_iso_bl') : 'Saint Barthelemy'); ?></option>
			<option id="js_country_iso_option_SH" value="SH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sh') ? Phpfox::getPhrase('core.translate_country_iso_sh') : 'Saint Helena'); ?></option>
			<option id="js_country_iso_option_KN" value="KN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'KN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'KN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_kn') ? Phpfox::getPhrase('core.translate_country_iso_kn') : 'Saint Kitts and Nevis'); ?></option>
			<option id="js_country_iso_option_LC" value="LC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lc') ? Phpfox::getPhrase('core.translate_country_iso_lc') : 'Saint Lucia'); ?></option>
			<option id="js_country_iso_option_PM" value="PM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'PM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'PM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_pm') ? Phpfox::getPhrase('core.translate_country_iso_pm') : 'Saint Pierre and Miquelon'); ?></option>
			<option id="js_country_iso_option_VC" value="VC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_vc') ? Phpfox::getPhrase('core.translate_country_iso_vc') : 'Saint Vincent and the Grenadines'); ?></option>
			<option id="js_country_iso_option_WS" value="WS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'WS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'WS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ws') ? Phpfox::getPhrase('core.translate_country_iso_ws') : 'Samoa'); ?></option>
			<option id="js_country_iso_option_SM" value="SM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sm') ? Phpfox::getPhrase('core.translate_country_iso_sm') : 'San Marino'); ?></option>
			<option id="js_country_iso_option_ST" value="ST"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ST')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ST')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_st') ? Phpfox::getPhrase('core.translate_country_iso_st') : 'Sao Tome and Principe'); ?></option>
			<option id="js_country_iso_option_SA" value="SA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sa') ? Phpfox::getPhrase('core.translate_country_iso_sa') : 'Saudi Arabia'); ?></option>
			<option id="js_country_iso_option_SN" value="SN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sn') ? Phpfox::getPhrase('core.translate_country_iso_sn') : 'Senegal'); ?></option>
			<option id="js_country_iso_option_RS" value="RS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'RS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'RS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_rs') ? Phpfox::getPhrase('core.translate_country_iso_rs') : 'Serbia'); ?></option>
			<option id="js_country_iso_option_SC" value="SC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sc') ? Phpfox::getPhrase('core.translate_country_iso_sc') : 'Seychelles'); ?></option>
			<option id="js_country_iso_option_SL" value="SL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sl') ? Phpfox::getPhrase('core.translate_country_iso_sl') : 'Sierra Leone'); ?></option>
			<option id="js_country_iso_option_SG" value="SG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sg') ? Phpfox::getPhrase('core.translate_country_iso_sg') : 'Singapore'); ?></option>
			<option id="js_country_iso_option_SK" value="SK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sk') ? Phpfox::getPhrase('core.translate_country_iso_sk') : 'Slovakia'); ?></option>
			<option id="js_country_iso_option_SI" value="SI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_si') ? Phpfox::getPhrase('core.translate_country_iso_si') : 'Slovenia'); ?></option>
			<option id="js_country_iso_option_SB" value="SB"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SB')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SB')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sb') ? Phpfox::getPhrase('core.translate_country_iso_sb') : 'Solomon Islands'); ?></option>
			<option id="js_country_iso_option_SO" value="SO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_so') ? Phpfox::getPhrase('core.translate_country_iso_so') : 'Somalia'); ?></option>
			<option id="js_country_iso_option_ZA" value="ZA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ZA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ZA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_za') ? Phpfox::getPhrase('core.translate_country_iso_za') : 'South Africa'); ?></option>
			<option id="js_country_iso_option_GS" value="GS"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GS')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GS')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gs') ? Phpfox::getPhrase('core.translate_country_iso_gs') : 'South Georgia and the South Sandwich Islands'); ?></option>
			<option id="js_country_iso_option_ES" value="ES"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ES')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ES')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_es') ? Phpfox::getPhrase('core.translate_country_iso_es') : 'Spain'); ?></option>
			<option id="js_country_iso_option_LK" value="LK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'LK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'LK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_lk') ? Phpfox::getPhrase('core.translate_country_iso_lk') : 'Sri Lanka'); ?></option>
			<option id="js_country_iso_option_SD" value="SD"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SD')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SD')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sd') ? Phpfox::getPhrase('core.translate_country_iso_sd') : 'Sudan'); ?></option>
			<option id="js_country_iso_option_SR" value="SR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sr') ? Phpfox::getPhrase('core.translate_country_iso_sr') : 'Suriname'); ?></option>
			<option id="js_country_iso_option_SJ" value="SJ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SJ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SJ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sj') ? Phpfox::getPhrase('core.translate_country_iso_sj') : 'Svalbard and Jan Mayen'); ?></option>
			<option id="js_country_iso_option_SZ" value="SZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sz') ? Phpfox::getPhrase('core.translate_country_iso_sz') : 'Swaziland'); ?></option>
			<option id="js_country_iso_option_SE" value="SE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_se') ? Phpfox::getPhrase('core.translate_country_iso_se') : 'Sweden'); ?></option>
			<option id="js_country_iso_option_CH" value="CH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'CH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'CH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ch') ? Phpfox::getPhrase('core.translate_country_iso_ch') : 'Switzerland'); ?></option>
			<option id="js_country_iso_option_SY" value="SY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'SY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'SY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_sy') ? Phpfox::getPhrase('core.translate_country_iso_sy') : 'Syrian Arab Republic'); ?></option>
			<option id="js_country_iso_option_TW" value="TW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tw') ? Phpfox::getPhrase('core.translate_country_iso_tw') : 'Taiwan, Province of China'); ?></option>
			<option id="js_country_iso_option_TJ" value="TJ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TJ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TJ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tj') ? Phpfox::getPhrase('core.translate_country_iso_tj') : 'Tajikistan'); ?></option>
			<option id="js_country_iso_option_TZ" value="TZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tz') ? Phpfox::getPhrase('core.translate_country_iso_tz') : 'Tanzania, United Republic of'); ?></option>
			<option id="js_country_iso_option_TH" value="TH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_th') ? Phpfox::getPhrase('core.translate_country_iso_th') : 'Thailand'); ?></option>
			<option id="js_country_iso_option_TL" value="TL"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TL')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TL')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tl') ? Phpfox::getPhrase('core.translate_country_iso_tl') : 'Timor-Leste'); ?></option>
			<option id="js_country_iso_option_TG" value="TG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tg') ? Phpfox::getPhrase('core.translate_country_iso_tg') : 'Togo'); ?></option>
			<option id="js_country_iso_option_TK" value="TK"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TK')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TK')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tk') ? Phpfox::getPhrase('core.translate_country_iso_tk') : 'Tokelau'); ?></option>
			<option id="js_country_iso_option_TO" value="TO"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TO')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TO')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_to') ? Phpfox::getPhrase('core.translate_country_iso_to') : 'Tonga'); ?></option>
			<option id="js_country_iso_option_TT" value="TT"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TT')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TT')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tt') ? Phpfox::getPhrase('core.translate_country_iso_tt') : 'Trinidad and Tobago'); ?></option>
			<option id="js_country_iso_option_TN" value="TN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tn') ? Phpfox::getPhrase('core.translate_country_iso_tn') : 'Tunisia'); ?></option>
			<option id="js_country_iso_option_TR" value="TR"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TR')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TR')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tr') ? Phpfox::getPhrase('core.translate_country_iso_tr') : 'Turkey'); ?></option>
			<option id="js_country_iso_option_TM" value="TM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tm') ? Phpfox::getPhrase('core.translate_country_iso_tm') : 'Turkmenistan'); ?></option>
			<option id="js_country_iso_option_TC" value="TC"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TC')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TC')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tc') ? Phpfox::getPhrase('core.translate_country_iso_tc') : 'Turks and Caicos Islands'); ?></option>
			<option id="js_country_iso_option_TV" value="TV"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'TV')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'TV')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_tv') ? Phpfox::getPhrase('core.translate_country_iso_tv') : 'Tuvalu'); ?></option>
			<option id="js_country_iso_option_UG" value="UG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'UG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'UG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ug') ? Phpfox::getPhrase('core.translate_country_iso_ug') : 'Uganda'); ?></option>
			<option id="js_country_iso_option_UA" value="UA"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'UA')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'UA')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ua') ? Phpfox::getPhrase('core.translate_country_iso_ua') : 'Ukraine'); ?></option>
			<option id="js_country_iso_option_AE" value="AE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'AE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'AE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ae') ? Phpfox::getPhrase('core.translate_country_iso_ae') : 'United Arab Emirates'); ?></option>
			<option id="js_country_iso_option_GB" value="GB"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'GB')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'GB')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_gb') ? Phpfox::getPhrase('core.translate_country_iso_gb') : 'United Kingdom'); ?></option>
			<option id="js_country_iso_option_US" value="US"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'US')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'US')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_us') ? Phpfox::getPhrase('core.translate_country_iso_us') : 'United States'); ?></option>
			<option id="js_country_iso_option_UM" value="UM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'UM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'UM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_um') ? Phpfox::getPhrase('core.translate_country_iso_um') : 'United States Minor Outlying Islands'); ?></option>
			<option id="js_country_iso_option_UY" value="UY"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'UY')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'UY')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_uy') ? Phpfox::getPhrase('core.translate_country_iso_uy') : 'Uruguay'); ?></option>
			<option id="js_country_iso_option_UZ" value="UZ"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'UZ')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'UZ')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_uz') ? Phpfox::getPhrase('core.translate_country_iso_uz') : 'Uzbekistan'); ?></option>
			<option id="js_country_iso_option_VU" value="VU"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VU')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VU')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_vu') ? Phpfox::getPhrase('core.translate_country_iso_vu') : 'Vanuatu'); ?></option>
			<option id="js_country_iso_option_VE" value="VE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ve') ? Phpfox::getPhrase('core.translate_country_iso_ve') : 'Venezuela'); ?></option>
			<option id="js_country_iso_option_VN" value="VN"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VN')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VN')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_vn') ? Phpfox::getPhrase('core.translate_country_iso_vn') : 'Viet Nam'); ?></option>
			<option id="js_country_iso_option_VG" value="VG"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VG')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VG')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_vg') ? Phpfox::getPhrase('core.translate_country_iso_vg') : 'Virgin Islands, British'); ?></option>
			<option id="js_country_iso_option_VI" value="VI"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'VI')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'VI')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_vi') ? Phpfox::getPhrase('core.translate_country_iso_vi') : 'Virgin Islands, U.s.'); ?></option>
			<option id="js_country_iso_option_WF" value="WF"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'WF')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'WF')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_wf') ? Phpfox::getPhrase('core.translate_country_iso_wf') : 'Wallis and Futuna'); ?></option>
			<option id="js_country_iso_option_EH" value="EH"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'EH')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'EH')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_eh') ? Phpfox::getPhrase('core.translate_country_iso_eh') : 'Western Sahara'); ?></option>
			<option id="js_country_iso_option_YE" value="YE"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'YE')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'YE')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_ye') ? Phpfox::getPhrase('core.translate_country_iso_ye') : 'Yemen'); ?></option>
			<option id="js_country_iso_option_ZM" value="ZM"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ZM')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ZM')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_zm') ? Phpfox::getPhrase('core.translate_country_iso_zm') : 'Zambia'); ?></option>
			<option id="js_country_iso_option_ZW" value="ZW"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('country_iso') && in_array('country_iso', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['country_iso'])
								&& $aParams['country_iso'] == 'ZW')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['country_iso'])
									&& !isset($aParams['country_iso'])
									&& $this->_aVars['aForms']['country_iso'] == 'ZW')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo (Phpfox::getLib('locale')->isPhrase('core.translate_country_iso_zw') ? Phpfox::getPhrase('core.translate_country_iso_zw') : 'Zimbabwe'); ?></option>
		</select>
<?php Phpfox::getBlock('core.country-child', array('country_force_div' => true)); ?>
			</div>
		</div>
<?php endif; ?>
<?php if (Phpfox ::getParam('core.registration_enable_timezone')): ?>
		<div class="table">
			<div class="table_left">
<?php echo Phpfox::getPhrase('user.time_zone'); ?>:
			</div>
			<div class="table_right">
				<select name="val[time_zone]">
<?php if (count((array)$this->_aVars['aTimeZones'])):  foreach ((array) $this->_aVars['aTimeZones'] as $this->_aVars['sTimeZoneKey'] => $this->_aVars['sTimeZone']): ?>
					<option value="<?php echo $this->_aVars['sTimeZoneKey']; ?>"<?php if (( Phpfox ::getTimeZone() == $this->_aVars['sTimeZoneKey'] && ! isset ( $this->_aVars['iTimeZonePosted'] ) ) || ( isset ( $this->_aVars['iTimeZonePosted'] ) && $this->_aVars['iTimeZonePosted'] == $this->_aVars['sTimeZoneKey'] )): ?> selected="selected"<?php endif; ?>><?php echo $this->_aVars['sTimeZone']; ?></option>
<?php endforeach; endif; ?>
				</select>
			</div>
			<div class="clear"></div>
		</div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step2_7')) ? eval($sPlugin) : false); ?>
		<?php /* Cached: July 10, 2012, 12:13 pm */ 
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */



?>
<?php if (count((array)$this->_aVars['aSettings'])):  foreach ((array) $this->_aVars['aSettings'] as $this->_aVars['aSetting']): ?>
		<div class="table js_custom_groups<?php if (isset ( $this->_aVars['aSetting']['group_id'] )): ?> js_custom_group_<?php echo $this->_aVars['aSetting']['group_id'];  endif; ?>">
			<div class="table_left white_text">
<?php if ($this->_aVars['aSetting']['is_required'] && ! Phpfox ::isAdminPanel()):  if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  endif;  echo Phpfox::getPhrase($this->_aVars['aSetting']['phrase_var_name']); ?>:
			</div>
			<div class="table_right">
				<?php /* Cached: July 10, 2012, 12:13 pm */ 
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: form.html.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */



?>
		<div class="custom_block_form mar8pxleft">
<?php if ($this->_aVars['aSetting']['var_type'] == 'textarea'): ?>
				<textarea class="custom_textarea" cols="60" style="width:90%;" rows="8" name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>]"><?php if (isset ( $this->_aVars['aSetting']['value'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSetting']['value']);  endif; ?></textarea>
<?php elseif ($this->_aVars['aSetting']['var_type'] == 'text'): ?>
				<input type="text" name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>]" value="<?php if (isset ( $this->_aVars['aSetting']['value'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSetting']['value']);  endif; ?>" size="30" maxlength="255"<?php if (PHPFOX_IS_AJAX): ?> style="width:90%;"<?php endif; ?> />
<?php elseif ($this->_aVars['aSetting']['var_type'] == 'select'): ?>
				<select name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>]" id="custom_field_<?php echo $this->_aVars['aSetting']['field_id']; ?>">
<?php if (! $this->_aVars['aSetting']['is_required'] && ! isset ( $this->_aVars['aSetting']['value'] )): ?>
<?php if (! isset ( $this->_aVars['aSetting']['value'] )): ?>
							<option value=""><?php echo Phpfox::getPhrase('custom.select'); ?>:</option>
<?php endif; ?>
<?php else: ?>
<?php if (! $this->_aVars['aSetting']['is_required']): ?>
						<option value=""><?php echo Phpfox::getPhrase('custom.no_answer'); ?></option>
<?php else: ?>
<?php if (! isset ( $this->_aVars['aSetting']['value'] )): ?>
						<option value=""><?php echo Phpfox::getPhrase('custom.select'); ?>:</option>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php if (count((array)$this->_aVars['aSetting']['options'])):  foreach ((array) $this->_aVars['aSetting']['options'] as $this->_aVars['iKey'] => $this->_aVars['sOption']): ?>
						<option value="<?php echo $this->_aVars['iKey']; ?>"<?php if (isset ( $this->_aVars['sOption']['selected'] ) && ( $this->_aVars['sOption']['selected'] == true || $this->_aVars['sOption']['selected'] == 1 )): ?> selected="selected"<?php endif; ?>><?php echo $this->_aVars['sOption']['value']; ?></option>
<?php endforeach; endif; ?>
				</select>
<?php elseif ($this->_aVars['aSetting']['var_type'] == 'multiselect'): ?>
				<select name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>][]" multiple="multiple" id="custom_field_<?php echo $this->_aVars['aSetting']['field_id']; ?>">
					
<?php if (count((array)$this->_aVars['aSetting']['options'])):  foreach ((array) $this->_aVars['aSetting']['options'] as $this->_aVars['iKey'] => $this->_aVars['aOption']): ?>
						<option value="<?php echo $this->_aVars['iKey']; ?>"<?php if (isset ( $this->_aVars['aOption']['value'] ) && isset ( $this->_aVars['aOption']['selected'] ) && $this->_aVars['aOption']['selected'] == true): ?> selected="selected"<?php endif; ?>><?php echo $this->_aVars['aOption']['value']; ?></option>
<?php endforeach; endif; ?>
				</select>
<?php elseif ($this->_aVars['aSetting']['var_type'] == 'radio'): ?>
<?php if (! $this->_aVars['aSetting']['is_required']): ?>
					<div class="custom_block_form_radio">
						<input id="radio_no_answer" type="radio" name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>]" value="0" checked="checked" />
						<label for="radio_no_answer"> <?php echo Phpfox::getPhrase('custom.no_answer'); ?> </label>
					</div>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aSetting']['options'])):  foreach ((array) $this->_aVars['aSetting']['options'] as $this->_aVars['iKey'] => $this->_aVars['aOption']): ?>
					<div class="custom_block_form_radio">
						<input id="radio_<?php echo $this->_aVars['aSetting']['field_id']; ?>_<?php echo $this->_aVars['iKey']; ?>" type="radio" name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>]" value="<?php echo $this->_aVars['iKey']; ?>" <?php if (isset ( $this->_aVars['aOption']['selected'] ) && $this->_aVars['aOption']['selected'] == true): ?>checked="checked"<?php endif; ?>>
						<label for="radio_<?php echo $this->_aVars['aSetting']['field_id']; ?>_<?php echo $this->_aVars['iKey']; ?>"> <?php echo $this->_aVars['aOption']['value']; ?> </label>
					</div>
<?php endforeach; endif; ?>
<?php elseif ($this->_aVars['aSetting']['var_type'] == 'checkbox'): ?>
<?php if (count((array)$this->_aVars['aSetting']['options'])):  foreach ((array) $this->_aVars['aSetting']['options'] as $this->_aVars['iKey'] => $this->_aVars['aOption']): ?>
					<div class="custom_block_form_checkbox">
						<input id="checkbox_<?php echo $this->_aVars['aSetting']['field_id']; ?>_<?php echo $this->_aVars['iKey']; ?>" type="checkbox" name="custom[<?php echo $this->_aVars['aSetting']['field_id']; ?>][]" value="<?php echo $this->_aVars['iKey']; ?>" <?php if (isset ( $this->_aVars['aOption']['selected'] ) && $this->_aVars['aOption']['selected'] == true): ?>checked="checked"<?php endif; ?>>
						<label for="checkbox_<?php echo $this->_aVars['aSetting']['field_id']; ?>_<?php echo $this->_aVars['iKey']; ?>"><?php echo $this->_aVars['aOption']['value']; ?> </label>
					</div>
<?php endforeach; endif; ?>
<?php endif; ?>
		</div>
			</div>
		</div>
<?php endforeach; endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_controller_profile_form')) ? eval($sPlugin) : false); ?>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step2_8')) ? eval($sPlugin) : false); ?>
<?php if (Phpfox ::isModule('subscribe') && Phpfox ::getParam('subscribe.enable_subscription_packages') && count ( $this->_aVars['aPackages'] )): ?>
		<div class="separate"></div>
		<div class="table">
			<div class="table_left">
<?php if (Phpfox ::getParam('subscribe.subscribe_is_required_on_sign_up')):  if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  endif;  echo Phpfox::getPhrase('user.membership'); ?>:
			</div>
			<div class="table_right">
				<select name="val[package_id]" id="js_subscribe_package_id">
<?php if (Phpfox ::getParam('subscribe.subscribe_is_required_on_sign_up')): ?>
					<option value=""<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('package_id') && in_array('package_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['package_id'])
								&& $aParams['package_id'] == '0')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['package_id'])
									&& !isset($aParams['package_id'])
									&& $this->_aVars['aForms']['package_id'] == '0')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getPhrase('user.select'); ?>:</option>
<?php else: ?>
					<option value=""<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('package_id') && in_array('package_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['package_id'])
								&& $aParams['package_id'] == '0')

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['package_id'])
									&& !isset($aParams['package_id'])
									&& $this->_aVars['aForms']['package_id'] == '0')
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo Phpfox::getPhrase('user.free_normal'); ?></option>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aPackages'])):  foreach ((array) $this->_aVars['aPackages'] as $this->_aVars['aPackage']): ?>
					<option value="<?php echo $this->_aVars['aPackage']['package_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('package_id') && in_array('package_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['package_id'])
								&& $aParams['package_id'] == $this->_aVars['aPackage']['package_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['package_id'])
									&& !isset($aParams['package_id'])
									&& $this->_aVars['aForms']['package_id'] == $this->_aVars['aPackage']['package_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php if ($this->_aVars['aPackage']['show_price']): ?>(<?php if ($this->_aVars['aPackage']['default_cost'] == '0.00'):  echo Phpfox::getPhrase('subscribe.free');  else:  echo Phpfox::getService('core.currency')->getSymbol($this->_aVars['aPackage']['default_currency_id']);  echo $this->_aVars['aPackage']['default_cost'];  endif; ?>) <?php endif;  echo Phpfox::getLib('phpfox.parse.output')->clean(Phpfox::getLib('locale')->convert($this->_aVars['aPackage']['title'])); ?></option>
<?php endforeach; endif; ?>
				</select>
				<div class="extra_info">
					<a href="#" onclick="tb_show('<?php echo Phpfox::getPhrase('user.membership_upgrades', array('phpfox_squote' => true)); ?>', $.ajaxBox('subscribe.listUpgradesOnSignup', 'height=400&width=500')); return false;"><?php echo Phpfox::getPhrase('user.click_here_to_learn_more_about_our_membership_upgrades'); ?></a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php endif; ?>
	</div>



<?php if (Phpfox ::getParam('user.force_user_to_upload_on_sign_up')): ?>
		<div class="separate"></div>
		<div class="table">
			<div class="table_left">
<?php echo Phpfox::getPhrase('user.profile_image'); ?>:
			</div>
			<div class="table_right">
				<input type="file" name="image" />
				<div class="extra_info">
<?php echo Phpfox::getPhrase('user.you_can_upload_a_jpg_gif_or_png_file'); ?>
				</div>
			</div>
		</div>
<?php endif; ?>
						</div>
<?php else: ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
	<div id="js_register_step1">
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_3')) ? eval($sPlugin) : false); ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="full_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.full_name'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[full_name]" id="full_name" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['full_name']) : (isset($this->_aVars['aForms']['full_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['full_name']) : '')); ?>
" size="30" />
			</div>
		</div>
<?php if (! Phpfox ::getParam('user.profile_use_id') && ! Phpfox ::getParam('user.disable_username_on_sign_up')): ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="user_name"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.choose_a_username'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[user_name]" id="user_name" onkeyup="$('.bt-wrapper').remove(); $(this).ajaxCall('user.showUserName');" <?php if (Phpfox ::getParam('user.suggest_usernames_on_registration')): ?>onfocus="$('#btn_verify_username').slideDown()"<?php endif; ?> title="<?php echo Phpfox::getPhrase('user.your_username_is_used_to_easily_connect_to_your_profile'); ?>" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['user_name']) : (isset($this->_aVars['aForms']['user_name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['user_name']) : '')); ?>
" size="30" autocomplete="off" />
				<div class="p_4">
<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?><strong id="js_signup_user_name"><?php echo Phpfox::getPhrase('user.your_user_name'); ?></strong>/
				</div>
				<div id="js_user_name_error_message"></div>
				<div style="display:none;" id="js_verify_username"></div>
<?php if (Phpfox ::getParam('user.suggest_usernames_on_registration')): ?>
				<div class="p_4" style="display:none;" id="btn_verify_username">
					<a href="#" onclick="$(this).ajaxCall('user.verifyUserName', 'user_name='+$('#user_name').val(), 'GET'); return false;"><?php echo Phpfox::getPhrase('user.check_availability'); ?></a>
				</div>
<?php endif; ?>
			</div>
		</div>
<?php endif; ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="email"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.email'); ?>:</label>
			</div>
			<div class="table_right">
				<input type="text" name="val[email]" id="email" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['email']) : (isset($this->_aVars['aForms']['email']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['email']) : '')); ?>
" size="30" />
			</div>
		</div>

<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_5')) ? eval($sPlugin) : false); ?>
		<div class="table">
			<div class="table_left">
				<label class="white_label" for="password"><?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.password'); ?>:</label>
			</div>
			<div class="table_right">
<?php if (isset ( $this->_aVars['bIsPosted'] )): ?>
				<input type="password" name="val[password]" id="password" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['password']) : (isset($this->_aVars['aForms']['password']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['password']) : '')); ?>
" size="30" />
<?php else: ?>
				<input type="password" name="val[password]" id="password" value="" size="30" />
<?php endif; ?>
			</div>
		</div>
<?php (($sPlugin = Phpfox_Plugin::get('user.template_default_block_register_step1_4')) ? eval($sPlugin) : false); ?>
	</div>
<?php endif; ?>
					</div>

<?php if (Phpfox ::isModule('captcha') && Phpfox ::getParam('user.captcha_on_signup')): ?>
					<div id="js_register_capthca_image"<?php if (Phpfox ::getParam('user.multi_step_registration_form') && ! isset ( $this->_aVars['bIsPosted'] )): ?> style="display:none;"<?php endif; ?>>
<?php Phpfox::getBlock('captcha.form', array()); ?>
					</div>
<?php endif; ?>

					<!-- <?php if (Phpfox ::getParam('user.new_user_terms_confirmation')): ?>
					<div id="js_register_accept">
						<div class="table">
							<div class="table_clear" style="color:#FFF;">
								<input type="checkbox" name="val[agree]" id="agree" value="1" class="checkbox v_middle" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('agree') && in_array('agree', $this->_aVars['aForms']))
							
{
								echo ' checked="checked" ';
							}

							if (isset($aParams['agree'])
								&& $aParams['agree'] == '1')

							{

								echo ' checked="checked" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['agree'])
									&& !isset($aParams['agree'])
									&& $this->_aVars['aForms']['agree'] == '1')
								{
								 echo ' checked="checked" ';
								}
								else
								{
									echo "";
								}
							}
							?>
/> <?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.i_have_read_and_agree_to_the_a_href_id_js_terms_of_use_terms_of_use_a_and_a_href_id_js_privacy_policy_privacy_policy_a'); ?>
							</div>
						</div>
					</div>
<?php endif; ?> -->




					<div class="agreebox">
						<div class="table_clear" id="custom_register">
<?php if (isset ( $this->_aVars['bIsPosted'] ) || ! Phpfox ::getParam('user.multi_step_registration_form')): ?>
						<input type="submit" value="<?php echo Phpfox::getPhrase('user.sign_up'); ?>" class="r_btn" id="js_registration_submit" />
<?php else: ?>
							<input type="button" value="<?php echo Phpfox::getPhrase('user.sign_up'); ?>" class="r_btn" id="js_registration_submit" onclick="$Core.registration.submitForm();" />
<?php endif; ?>
						</div>
                        
						
<?php if (Phpfox ::getParam('user.new_user_terms_confirmation')): ?>
						<div id="js_register_accept" class="terms">
						<input type="checkbox" name="val[agree]" id="agree" value="1" class="checkbox v_middle" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('agree') && in_array('agree', $this->_aVars['aForms']))
							
{
								echo ' checked="checked" ';
							}

							if (isset($aParams['agree'])
								&& $aParams['agree'] == '1')

							{

								echo ' checked="checked" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['agree'])
									&& !isset($aParams['agree'])
									&& $this->_aVars['aForms']['agree'] == '1')
								{
								 echo ' checked="checked" ';
								}
								else
								{
									echo "";
								}
							}
							?>
/> <?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.i_have_read_and_agree_to_the_a_href_id_js_terms_of_use_terms_of_use_a_and_a_href_id_js_privacy_policy_privacy_policy_a'); ?>
                    	</div>
<?php endif; ?>
                        
                        <!--
<?php if (Phpfox ::getParam('user.terms_and_cond')): ?>
						<div id="js_register_accept" class="terms">
						<input type="checkbox" name="val[agree]" id="agree" value="1" class="checkbox v_middle" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('agree') && in_array('agree', $this->_aVars['aForms']))
							
{
								echo ' checked="checked" ';
							}

							if (isset($aParams['agree'])
								&& $aParams['agree'] == '1')

							{

								echo ' checked="checked" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['agree'])
									&& !isset($aParams['agree'])
									&& $this->_aVars['aForms']['agree'] == '1')
								{
								 echo ' checked="checked" ';
								}
								else
								{
									echo "";
								}
							}
							?>
/> <?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('user.terms_and_cond'); ?>
                    	</div>
<?php endif; ?>
						-->
                  	</div>
                    
					<div class="professionals">Professionals and Owners.<br />
					<span class="bold">Create a <a class="pagelink" href="index.php?do=/pages/add/">Professional</a>, <a class="pagelink" href="index.php?do=/pages/add/">Broker</a> or <a class="pagelink" href="index.php?do=/pages/add/">Property Owner</a> Profile</span>
					</div>


					<div class="table_clear">

					<!-- <?php if (isset ( $this->_aVars['bIsPosted'] ) || ! Phpfox ::getParam('user.multi_step_registration_form')): ?>
						<input type="submit" value="<?php echo Phpfox::getPhrase('user.sign_up'); ?>" class="r_btn" id="js_registration_submit" />
<?php else: ?>
						<input type="button" value="<?php echo Phpfox::getPhrase('user.sign_up'); ?>" class="r_btn" id="js_registration_submit" onclick="$Core.registration.submitForm();" />
<?php endif; ?> -->


					</div>
				
</form>

			</div>
            <div class="bottom"></div>
           </div>

          </div>



<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::getLib('module')->getFullControllerName() != 'user.register'): ?>
		</div>
		<div class="clear"></div>
	</div>
<?php Phpfox::getBlock('user.images', array()); ?>
</div>
<?php endif; ?>
<?php if (Phpfox ::getLib('module')->getFullControllerName() == 'user.register'): ?>
	</div>
</div>
<?php endif; ?>
