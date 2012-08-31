<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Captcha
 * @version 		$Id: form.html.php 3533 2011-11-21 14:07:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="table_clear">
	<div class="captcha_holder">
		<div class="captcha_title">{phrase var='captcha.captcha_challenge'}</div>
		{if Phpfox::getParam('captcha.recaptcha')}
			<div id="js_recaptcha_holder" style="direction:ltr;">
				{$sCaptchaData}
			</div>
		{else}
			<div class="go_left">
				<a href="#" onclick="$('#js_captcha_process').html($.ajaxProcess('{phrase var='captcha.refreshing_image' phpfox_squote=true}')); $('#js_captcha_image').ajaxCall('captcha.reload', 'sId=js_captcha_image&amp;sInput=image_verification'); return false;"><img src="{$sImage}" alt="{phrase var='captcha.reload_image'}" id="js_captcha_image" class="captcha" title="{phrase var='captcha.click_refresh_image'}" /></a>
			</div>
			<a href="#" onclick="$('#js_captcha_process').html($.ajaxProcess('{phrase var='captcha.refreshing_image' phpfox_squote=true}')); $('#js_captcha_image').ajaxCall('captcha.reload', 'sId=js_captcha_image&amp;sInput=image_verification'); return false;" title="{phrase var='captcha.click_refresh_image' phpfox_squote=true}">{img theme='misc/reload.gif' alt='Reload'}</a>		
			<span id="js_captcha_process"></span>
			<div class="clear"></div>
			<div class="captcha_form">
				<input type="text" name="val[image_verification]" size="10" id="image_verification" />
				<div class="extra_info">
					{phrase var='captcha.type_verification_code_above'}
				</div>
			</div>
			<script type="text/javascript">
				$('#image_verification').attr('autocomplete','off');
			</script>
		{/if}
	</div>
</div>