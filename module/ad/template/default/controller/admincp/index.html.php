<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1565 2010-05-04 22:14:22Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<form method="post" action="{url link='admincp.ad'}">
	<div class="table_header">
		{phrase var='ad.ad_filter'}
	</div>	
	<div class="table">
		<div class="table_left">
			{phrase var='ad.type'}: 
		</div>
		<div class="table_right">
			{$aFilters.status}
		</div>
		<div class="clear"></div>
	</div>	
	<div class="table">
		<div class="table_left">
			{phrase var='ad.display'}: 
		</div>
		<div class="table_right">
			{$aFilters.display}
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
			{phrase var='ad.sort_by'}: 
		</div>
		<div class="table_right">
			{$aFilters.sort} {$aFilters.sort_by}
		</div>
		<div class="clear"></div>
	</div>
	<div class="table_clear">
		<input type="submit" name="search[submit]" value="{phrase var='core.submit'}" class="button" />
		<input type="submit" name="search[reset]" value="{phrase var='core.reset'}" class="button" />	
	</div>
</form>

<br />

{pager}

{if $iPendingCount > 0 && $sView != 'pending'}
<div class="message">
	{phrase var='ad.there_are_pending_ads_that_require_your_attention_view_all_pending_ads_a_href_link_here_a' link=$sPendingLink}
</div>
{/if}
{if count($aAds)}
<div class="table_header">
	{phrase var='ad.ads'}
</div>
<form method="post" action="{url link='admincp.ad'}">	
	<table>
	<tr>
		<th style="width:20px;"></th>
		<th style="width:30px;">{phrase var='ad.id'}</th>
		<th>{phrase var='ad.name'}</th>
		<th>{phrase var='ad.status'}</th>		
		<th>{phrase var='ad.views'}</th>
		<th>{phrase var='ad.clicks'}</th>
		<th style="width:50px;">{phrase var='ad.active'}</th>
	</tr>	
	{foreach from=$aAds key=iKey item=aAd}
	<tr class="{if is_int($iKey/2)} tr{else}{/if}{if $aAd.is_custom && $aAd.is_custom == '2'} is_checked{/if}">
		<td class="t_center">
			<a href="#" class="js_drop_down_link" title="{phrase var='ad.manage'}">{img theme='misc/bullet_arrow_down.png' alt=''}</a>
			<div class="link_menu">
				<ul>
					{if $aAd.is_custom == '2'}
					<li><a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{phrase var='ad.view_edit'}</a></li>		
					<li><a href="{url link='admincp.ad' approve=$aAd.ad_id}">{phrase var='ad.approve'}</a></li>
					<li><a href="{url link='admincp.ad' deny=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');">{phrase var='ad.deny'}</a></li>					
					<li><a href="{url link='admincp.ad' delete=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');">{phrase var='ad.delete'}</a></li>					
					{else}
					<li><a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{phrase var='ad.edit'}</a></li>		
					<li><a href="{url link='admincp.ad' delete=$aAd.ad_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');">{phrase var='ad.delete'}</a></li>					
					{/if}
				</ul>
			</div>		
		</td>		
		<td class="t_center"><a href="{url link='admincp.ad.add' id=$aAd.ad_id}">{$aAd.ad_id}</a></td>
		<td>{$aAd.name|clean}</td>
		<td>{$aAd.status}</td>
		<td class="t_center">{if $aAd.is_custom == '2' || $aAd.is_custom == '1'}N/A{else}{$aAd.count_view}{/if}</td>
		<td class="t_center">{if $aAd.is_custom == '2' || $aAd.is_custom == '1'}N/A{else}{$aAd.count_click}{/if}</td>
		<td class="t_center">
			{if $aAd.is_custom == '2' || $aAd.is_custom == '1'}
			{phrase var='ad.n_a'}
			{else}		
			<div class="js_item_is_active"{if !$aAd.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdActivity&amp;id={$aAd.ad_id}&amp;active=0" class="js_item_active_link" title="{phrase var='rss.deactivate'}">{img theme='misc/bullet_green.png' alt=''}</a>
			</div>
			<div class="js_item_is_not_active"{if $aAd.is_active} style="display:none;"{/if}>
				<a href="#?call=ad.updateAdActivity&amp;id={$aAd.ad_id}&amp;active=1" class="js_item_active_link" title="{phrase var='rss.activate'}">{img theme='misc/bullet_red.png' alt=''}</a>
			</div>
			{/if}		
		</td>			
	</tr>
	{/foreach}
	</table>
	<div class="table_clear"></div>
</form>
{else}
<div class="extra_info">
{if $bIsSearch}
	{phrase var='ad.no_search_results_were_found'}
{else}
	{phrase var='ad.no_ads_have_been_created'}
	<ul class="action">
		<li><a href="{url link='admincp.ad.add'}">{phrase var='ad.add_a_new_add'}</a></li>
	</ul>
{/if}
</div>
{/if}

{pager}