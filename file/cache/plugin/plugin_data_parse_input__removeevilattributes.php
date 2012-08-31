<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'core.wysiwyg\') == \'tiny_mce\')
{
	$aHtmlTags[\'ul\'] = true;
	$aHtmlTags[\'li\'] = true;
	$aHtmlTags[\'ol\'] = true;
} '; ?>