<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: albums.html.php 3533 2011-11-21 14:07:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aAlbums)}
{foreach from=$aAlbums item=aAlbum name=albums}
	{template file='photo.block.album-entry'}
{/foreach}
<div class="clear"></div>
{pager}
{else}
<div class="extra_info">
	{phrase var='photo.no_albums_found_here'}
</div>
{/if}