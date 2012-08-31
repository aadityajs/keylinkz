<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Photo
 * @version 		$Id: new-image.html.php 1356 2009-12-23 12:23:28Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{foreach from=$aNewImages name=new_image item=aNewImage}
<div class="row1 js_uploaded_image" id="js_photo_{$aNewImage.photo_id}">
	<div class="go_left">
		<div style="position:relative;">
			<a href="#" title="{phrase var='photo.delete_this_image'}" onclick="return deleteNewPhoto('{$aNewImage.photo_id}');">{img theme='misc/delete.gif' class='delete_hover' style='position:absolute;'}</a>
			{img server_id=$aNewImage.server_id path='photo.url_photo' file=$aNewImage.destination suffix='_75' max_width='75' max_height='75'}
		</div>
	</div>
	<div class="extra_info">
		{$aNewImage.name|shorten:75:'...'}<br />
		{$aNewImage.ext|strtoupper}, {$aNewImage.size|filesize}<br />
		({$aNewImage.width}x{$aNewImage.height})
	</div>
	<div class="clear"></div>
</div>
{/foreach}