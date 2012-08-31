<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'facebook.enable_facebook_connect\'))
{
	$this->database()->select(\'fbconnect.fb_user_id, fbconnect.share_feed AS fb_share_feed, fbconnect.send_email AS fb_send_email, \')->leftJoin(Phpfox::getT(\'fbconnect\'), \'fbconnect\', \'fbconnect.user_id = u.user_id\');
} $bLoadUserField = true;
$sUserFieldSelect = \'uf.subscribe_id, \'; '; ?>