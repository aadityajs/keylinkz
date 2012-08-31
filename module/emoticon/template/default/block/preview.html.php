<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Emoticon
 * @version 		$Id: preview.html.php 3888 2012-01-24 16:56:35Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="label_flow" style="height:300px;">
	{foreach from=$aRows key=iKey item=aRow name=emoticons}
	<div class="emoticon_preview" onclick="Editor.insert({literal}{{/literal}type: 'emoticon', path: '{$sUrlEmoticon}{$aRow.package_path}/{$aRow.image}', text: '{$aRow.text}', editor_id: '{$sEditorId}'{literal}}{/literal}); return false;">
		<img src="{$sUrlEmoticon}{$aRow.package_path}/{$aRow.image}" alt="{$aRow.title}" style="vertical-align:middle;" /> {$aRow.text}
	</div>
	{if is_int($phpfox.iteration.emoticons/6)}
	<div class="clear"></div>
	{/if}
	{/foreach}
	<div class="clear"></div>
</div>