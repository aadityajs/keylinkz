<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'core.wysiwyg\') == \'tiny_mce\')
{
	echo \' $(\\\'#text\\\').val(tinyMCE.activeEditor.getContent()); \';
} '; ?>