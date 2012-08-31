<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'facebook.enable_facebook_connect\') && empty($_REQUEST[\'facebook-process-login\']) && isset($aRow[\'user_id\']))
{
	$aFacebook = $this->database()->select(\'*\')
		->from(Phpfox::getT(\'fbconnect\'))
		->where(\'user_id = \' . (int) $aRow[\'user_id\'])
		->execute(\'getSlaveRow\');
	
	if (!empty($aFacebook[\'fb_user_id\']))
	{
		Phpfox::getLib(\'url\')->send(\'user.login\', array(\'fbconnect\' => \'1\'), Phpfox::getPhrase(\'facebook.your_account_is_synced_with_your_facebook_account\'));
	}
} '; ?>