<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'core.wysiwyg\') == \'tiny_mce\')
{
	foreach ($this->_aEvilEvents as $sKey => $sValue)
	{
		if ($sValue == \'style\')
		{
			unset($this->_aEvilEvents[$sKey]);
		}
	}
} '; ?>