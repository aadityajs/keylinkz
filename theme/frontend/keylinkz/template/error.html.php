{if isset($aPageSectionMenu) && count($aPageSectionMenu)}
<div class="page_section_menu{if !isset($aPageExtraLink.no_header_border)} page_section_menu_header{/if}">
	{if $aPageExtraLink !== null}
	<a href="{$aPageExtraLink.link}" class="page_section_menu_link">{$aPageExtraLink.phrase}</a>
	{/if}
	<ul>
	{foreach from=$aPageSectionMenu key=sPageSectionKey item=sPageSectionMenu name=pagesectionmenu}
		<li {if $phpfox.iteration.pagesectionmenu == 1} class="active"{/if}><a href="#" rel="{$sPageSectionMenuName}_{$sPageSectionKey}">{$sPageSectionMenu}</a></li>
	{/foreach}
	</ul>
	<div class="clear"></div>
</div>
{/if}
{section_menu_js}

{if $sPublicMessage}
<div class="public_message" id="public_message">
	{$sPublicMessage}
</div>
<script type="text/javascript">
	$('#public_message').show();
</script>
{/if}
{if !Phpfox::getParam('core.disable_ie_warning')}
<div id="js_update_internet_explorer" style="display:none;">
	{if Phpfox::getParam('core.display_older_ie_error')}
	<div class="update_internet_explorer">
		{phrase var='core.ie8_or_higher_warning'}
	</div>
	{/if}
</div>
{/if}
<div id="pem"><a name="pem"></a></div>
<div id="core_js_messages">
{if count($aErrors)}
{foreach from=$aErrors item=sErrorMessage}
	<div class="error_message">{$sErrorMessage}</div>
{/foreach}
{unset var=$sErrorMessage var2=$sample}
{/if}
</div>