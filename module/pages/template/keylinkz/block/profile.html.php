<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: profile.html.php 3652 2011-12-05 07:38:47Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>

{foreach from=$aPages name=pages item=aPage}
<div class="pages_profile_block"{if $phpfox.iteration.pages > 6} style="display:none;"{/if}>
	<a href="{$aPage.url}" title="{$aPage.title|clean}">{img user=$aPage suffix='_75_square' max_width=75 max_height=75 no_link=true}</a>
	<div>
		<a href="{$aPage.url}" title="{$aPage.title|clean}">{$aPage.title|clean|split:10|shorten:20:'...'}</a>
	</div>
</div>
{if is_int($phpfox.iteration.pages/5)}
<div class="clear"></div>
{/if}
{/foreach}
<div class="clear"></div>
{if count($aPage)}
<a href="#" class="pages_profile_view_more" onclick="$('.pages_profile_block').show(); $(this).hide(); return false;">{phrase var='pages.more'}</a>
{/if}