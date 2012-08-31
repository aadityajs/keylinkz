<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getLib(\'request\')->get(\'module\') == \'event\')
{
	$aEvent = Phpfox::getService(\'event\')->getForEdit($aFeed[\'parent_user_id\'], true);
	if (isset($aEvent[\'event_id\']) && $aEvent[\'user_id\'] == Phpfox::getUserId())
	{
		define(\'PHPFOX_FEED_CAN_DELETE\', true);
	}
} if (Phpfox::getLib(\'request\')->get(\'module\') == \'pages\')
{
	$aPage = Phpfox::getService(\'pages\')->getPage($aFeed[\'parent_user_id\']);
	if (isset($aPage[\'page_id\']) && Phpfox::getService(\'pages\')->isAdmin($aPage))
	{
		define(\'PHPFOX_FEED_CAN_DELETE\', true);
	}
} if (Phpfox::getLib(\'request\')->get(\'module\') == \'\' && $aFeed[\'parent_user_id\'] == Phpfox::getUserId())
{
	define(\'PHPFOX_FEED_CAN_DELETE\', true);
} '; ?>