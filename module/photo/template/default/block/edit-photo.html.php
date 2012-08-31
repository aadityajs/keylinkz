<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: edit-photo.html.php 3533 2011-11-21 14:07:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if isset($bSingleMode)}
<form method="post" action="#" onsubmit="$(this).ajaxCall('photo.updatePhoto'); return false;">
	<div><input type="hidden" name="photo_id" value="{$aForms.photo_id}" /></div>
	<div><input type="hidden" name="val{if isset($aForms.photo_id)}[{$aForms.photo_id}]{/if}[photo_id]" value="{$aForms.photo_id}" /></div>
	<div><input type="hidden" name="val{if isset($aForms.photo_id)}[{$aForms.photo_id}]{/if}[album_id]" value="{$aForms.album_id}" /></div>
	<div id="js_custom_privacy_input_holder">
		{module name='privacy.build' privacy_item_id=$aForms.photo_id privacy_module_id='photo'}
	</div>	
	{if $bIsInline}
	<div><input type="hidden" name="inline" value="1" /></div>
	{/if}
{/if}
<div id="photo_edit_item_id_{$aForms.photo_id}" class="{if !isset($bSingleMode)}row1 {/if}photo_edit_row">
	<div class="photo_edit_holder">
		<div class="t_center">
			{img server_id=$aForms.server_id path='photo.url_photo' file=$aForms.destination suffix='_150' max_width=150 max_height=150 title=$aForms.title class='js_mp_fix_width photo_holder' thickbox=true}
		</div>
		<div class="p_4">
			{if !isset($bIsEditMode) && $aForms.album_id > 0}
			<div class="photo_edit_input"><label><input type="radio" name="val[set_album_cover]" value="{$aForms.photo_id}" class="v_middle"{if $aForms.is_cover} checked="checked"{/if} /> {phrase var='photo.set_as_the_album_cover'}</label></div>
			{/if}
			{if !isset($bSingleMode)}
			<div class="photo_edit_input"><label><input type="checkbox" name="val[{$aForms.photo_id}][delete_photo]" value="{$aForms.photo_id}" class="v_middle" /> {phrase var='photo.delete_this_photo_lowercase'}</label></div>
			{/if}
			
			{if $aForms.album_id == '0' && $aForms.group_id == '0'}
			<div class="photo_edit_input">				
				<div class="table">
					<div class="table_left">
						{phrase var='photo.privacy'}:
					</div>
					<div class="table_right">
					<div id="js_custom_privacy_input_holder_{$aForms.photo_id}">
						{if isset($bIsEditMode)}
						{module name='privacy.build' privacy_item_id=$aForms.photo_id privacy_module_id='photo' privacy_array=$aForms.photo_id}
						{else}
						{module name='privacy.build' privacy_item_id=$aForms.photo_id privacy_module_id='photo'}
						{/if}
					</div>						
						{if isset($bIsEditMode)}
						{module name='privacy.form' privacy_name='privacy' privacy_info='photo.control_who_can_see_this_photo' privacy_array=$aForms.photo_id privacy_custom_id='js_custom_privacy_input_holder_'$aForms.photo_id''}
						{else}
						{module name='privacy.form' privacy_name='privacy' privacy_info='photo.control_who_can_see_this_photo'}
						{/if}
					</div>			
				</div>
				<div class="table">
					<div class="table_left">
						{phrase var='photo.comment_privacy'}:
					</div>
					<div class="table_right">
						{if isset($bIsEditMode)}
						{module name='privacy.form' privacy_name='privacy_comment' privacy_info='photo.control_who_can_comment_on_this_photo' privacy_no_custom=true privacy_array=$aForms.photo_id}
						{else}	
						{module name='privacy.form' privacy_name='privacy_comment' privacy_info='photo.control_who_can_comment_on_this_photo' privacy_no_custom=true}
						{/if}
					</div>			
				</div>						
			</div>
			{/if}			
			
			{if count($aAlbums)}
			<div class="photo_edit_input">
				{phrase var='photo.move_to'}:
				<div class="p_top_4">
					<select name="val[{$aForms.photo_id}][move_to]" style="width:180px;">	
						<option value="">{phrase var='photo.select'}:</option>
					{foreach from=$aAlbums item=aAlbum}
						<option value="{$aAlbum.album_id}">{$aAlbum.name|clean}</option>
					{/foreach}
					</select>
				</div>
			</div>			
			{/if} 
			
		</div>
	</div>
	{template file='photo.block.form'}
	{if isset($bSingleMode)}
		<div class="table_clear">
			<input type="submit" value="{phrase var='photo.update'}" class="button" />
		</div>
	{/if}
</div>
{if isset($bSingleMode)}
</form>
{/if}