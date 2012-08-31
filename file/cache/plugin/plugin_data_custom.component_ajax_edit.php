<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = '/*
if (Phpfox::getParam(\'core.wysiwyg\') == \'tiny_mce\')
{
	$this->call(\'customTinyMCE_init(\\\'js_custom_field_post_\' . $this->get(\'field_id\') . \'\\\');\');
}
* 
*/ '; ?>