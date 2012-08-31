<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'facebook.enable_facebook_connect\'))
{
	Phpfox::getLib(\'template\')->assign(\'bCustomLogin\', true);
} '; ?>