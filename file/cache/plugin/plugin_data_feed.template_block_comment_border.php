<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getLib(\'module\')->getFullControllerName() == \'event.index\')
{
	Phpfox::getBlock(\'event.rsvp-entry\');
} if ((Phpfox::getLib(\'module\')->getFullControllerName() == \'photo.view\' || (PHPFOX_IS_AJAX && Phpfox::getLib(\'request\')->get(\'theater\') == \'true\')) && Phpfox::isUser() && !Phpfox::isMobile())
{
	if (($this->_aVars[\'aForms\'][\'user_id\'] == Phpfox::getUserId() && Phpfox::getUserParam(\'photo.can_tag_own_photo\')) || ($this->_aVars[\'aForms\'][\'user_id\'] != Phpfox::getUserId() && Phpfox::getUserParam(\'photo.can_tag_other_photos\')))
	{
		echo \'<div class="feed_comment_extra"><a href="#" id="js_tag_photo">\' . Phpfox::getPhrase(\'photo.tag_this_photo\') . \'</a></div>\';
	}
} '; ?>