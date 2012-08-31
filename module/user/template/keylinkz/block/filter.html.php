<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: filter.html.php 3826 2011-12-16 12:30:19Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
<!-- <form method="post" action="{if isset($aCallback.url_home)}{url link=$aCallback.url_home view=$sView}{else}{url link='user.browse' view=$sView}{/if}">

<?php
//error_reporting(1);
//var_dump($_POST);

?>

<div class="p_top_4">
	<span>Search Term</span>:
		<input type="text" name="search[keyword]" value="" size="15"><br>
	<span>Location</span>:<br>
		<input type="text" name="search[city]" value="" size="15">

		<select name="search[group]">
		<option value="">Any</option>
		<option value="2">Professional - Agent</option>
		<option value="3">Professional - Member</option>
		<option value="4">General User</option>
		</select>
</div>
<input type="submit" value="{phrase var='user.browse_filter_submit'}" class="button" name="search[submit]" />

</form> -->


<form method="post" action="{if isset($aCallback.url_home)}{url link=$aCallback.url_home view=$sView}{else}{url link='user.browse' view=$sView}{/if}">
{if isset($aCallback.url_home)}
	<div><input type="hidden" name="url_home" value="{$aCallback.url_home}" /></div>
{/if}
<div class="p_top_4">
<!-- {phrase var='user.user_group'} --><span class="user_browse_title">Member Type:</span>
	<div class="p_4">
		<!-- {filter key='group'} -->
		<select name="search[group]">
		<option value="">Any</option>
		<option value="2">Professional - Agent</option>
		<option value="3">Professional - Member</option>
		<option value="4">General User</option>
		</select>
	</div>
</div>
<!--{if Phpfox::getUserParam('user.can_search_user_gender')}
	<div class="p_top_4">
		<span class="user_browse_title">{phrase var='user.browse_for'}</span>:
		<div class="p_4">
			{filter key='gender'}
		</div>
	</div>
{/if}
 {if Phpfox::getUserParam('user.can_search_user_age')}
	<div class="p_top_4">
		<span class="user_browse_title">{phrase var='user.between_ages'}</span>:
		<div class="p_4">
			{filter key='from'} - {filter key='to'}
		</div>
	</div>
{/if} -->
	<!--<div class="p_top_4">
		<span class="user_browse_title">{phrase var='user.located_within'}</span>:
		<div class="p_4">
			{filter key='country'}
			{module name='core.country-child' country_child_filter=true country_child_type='browse'}
		</div>
	</div>-->

	<div class="p_top_4">
		<span class="user_browse_title"><!--{phrase var='user.city'}-->Location</span>:
		<div class="p_4">
			{filter key='city'}
		</div>
	</div>

	<!--<div class="p_top_4">
		<span class="user_browse_title">{phrase var='user.zip_postal_code'}</span>:
		<div class="p_4">
			{filter key='zip'}
		</div>
	</div>-->

	<div class="p_top_4">
		<span class="user_browse_title"><!-- {phrase var='user.keywords'} --> Search Term</span>:
		<div class="p_4">
			{filter key='keyword'}
			<div class="extra_info">
				<!--{phrase var='user.within'}: {filter key='type'}-->
			</div>
		</div>
	</div>

	<div class="p_top_8">
		<input type="submit" value="{phrase var='user.browse_filter_submit'}" class="button" name="search[submit]" />
	</div>

	<ul id="js_user_browse_advanced_link">
		{if isset($bIsInSearchMode) && $bIsInSearchMode}
		<li><a href="#"><a href="{url link='user.browse'}">{phrase var='user.reset_browse_criteria'}</a></a></li>
		{/if}
		<li><a href="#" onclick="$('#js_user_browse_advanced').show(); return false;">{phrase var='user.advanced_filters'}</a></li>
	</ul>
<br/>
	<div id="js_user_browse_advanced">
		<div class="user_browse_content">


	<div id="browse_custom_fields_popup_holder">
	    {foreach from=$aCustomFields name=customfield item=aCustomField}
	    <div class="go_left">

		{if isset($aCustomField.fields)}
		<br />
		<div class="title">
			{phrase var=$aCustomField.phrase_var_name}
		</div>
		<br />
			{template file='custom.block.foreachcustom'}
		{/if}
	    </div>
	     {if is_int($phpfox.iteration.customfield / 3)}
		<div class="clear"> </div>
	     {/if}
	    {/foreach}

	    <div class="clear"></div>
	</div>
	{if count($aForms)}
	{literal}
	<script type="text/javascript">
		$(function()
		{
			var iBrowseCnt = 0;
			$('#js_block_border_user_filter .menu li').each(function()
			{
				iBrowseCnt++;
				if (iBrowseCnt == 1)
				{
					$(this).removeClass('active');
				}
				else
				{
					$(this).addClass('active');
				}
			});
		});
	</script>
	{/literal}
	{/if}

	<div class="p_top_4" style="border-top: 1px #DFDFDF solid;">
	    <span class="user_browse_title">{phrase var='user.sort_results_by'}</span>:
	    <div class="p_top_4">
		{filter key='sort'} {filter key='sort_by'}
	    </div>
	</div>

	<div class="p_top_15">
	    <a href="#" id="js_user_browse_advanced_link_close" onclick="$('#js_user_browse_advanced').hide(); return false;">{phrase var='user.close_advanced_filters'}</a>
	    <input type="submit" value="{phrase var='user.browse_filter_submit'}" class="button" name="search[submit]" />
	</div>

		</div>
	</div>


</form>