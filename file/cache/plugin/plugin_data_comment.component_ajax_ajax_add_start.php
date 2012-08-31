<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'captcha.recaptcha\'))
{
	$bNoCaptcha = true;
	$bCaptchaFailed = false;	
	if ($aVals[\'type\'] != \'feed\' && Phpfox::isModule(\'captcha\') && Phpfox::getUserParam(\'captcha.captcha_on_comment\') && !Phpfox::getService(\'captcha\')->checkHash())
	{	
		$bCaptchaFailed = true;	
	}
} '; ?>