<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: entry.html.php 3586 2011-11-28 07:11:18Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="js_blog_entry{$aItem.blog_id}"{if !isset($bBlogView)} class="js_blog_parent {if is_int($phpfox.iteration.blog/2)}row1{else}row2{/if}{if $phpfox.iteration.blog == 1 && !PHPFOX_IS_AJAX} row_first{/if}{if $aItem.is_approved != 1} {/if}"{/if}>	
	{if !isset($bBlogView)}
	<div class="row_title">	
		<div class="row_title_image">
			{img user=$aItem suffix='_50_square' max_width=50 max_height=50}
			{if Phpfox::getUserParam('blog.can_approve_blogs')
				|| (Phpfox::getUserParam('blog.edit_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.edit_user_blog')
				|| (Phpfox::getUserParam('blog.delete_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.delete_user_blog')
			}	
			<div class="row_edit_bar_parent">
				<div class="row_edit_bar_holder">
					<ul>
						{template file='blog.block.link'}
					</ul>			
				</div>
				<div class="row_edit_bar">				
						<a href="#" class="row_edit_bar_action"><span>{phrase var='blog.actions'}</span></a>							
				</div>
			</div>
			{/if}				
			{if Phpfox::getUserParam('blog.can_approve_blogs') || Phpfox::getUserParam('blog.delete_user_blog')}<a href="#{$aItem.blog_id}" class="moderate_link" rel="blog">Moderate</a>{/if}			
			
		{if !Phpfox::isMobile() && !Phpfox::isAdminPanel() && Phpfox::getParam('blog.digg_integration')}
	 	<script type="text/javascript">
			digg_url = '{permalink module='blog' id=$aItem.blog_id title=$aItem.title}';
			digg_window = 'new';
			digg_skin = 'medium';
		</script>
		<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>
		{/if}	
		
		</div>
		<div class="row_title_info">
			{if $aItem.post_status == 2}
			{phrase var='blog.draft_info'}
			{/if}		
			<span id="js_blog_edit_title{$aItem.blog_id}">
				<a href="{permalink module='blog' id=$aItem.blog_id title=$aItem.title}" id="js_blog_edit_inner_title{$aItem.blog_id}" class="link ajax_link">{$aItem.title|clean|shorten:55:'...'|split:20}</a>
			</span>
			
			<div class="extra_info">
				{phrase var='blog.by_full_name' full_name=$aItem|user}
				{plugin call='blog.template_block_entry_date_end'}
			</div>
		
	{/if}	
		<div class="blog_content">
			<div id="js_blog_edit_text{$aItem.blog_id}">	
				<div class="item_content item_view_content">
				{if isset($bBlogView)}
					{$aItem.text|parse|highlight:'search'|split:55}
					{else}
					<div class="extra_info">
						{$aItem.text|strip_tags|highlight:'search'|split:55|shorten:$iShorten'...'}
					</div>
				{/if}
				</div>			
			</div>	
			
			{if isset($bBlogView) && $aItem.total_attachment}
			{module name='attachment.list' sType=blog iItemId=$aItem.blog_id}
			{/if}			
			{if isset($aItem.tag_list)}
			{module name='tag.item' sType=$sTagType sTags=$aItem.tag_list iItemId=$aItem.blog_id iUserId=$aItem.user_id}
			{/if}
			
			{if !isset($bBlogView)}
			{module name='feed.comment' aFeed=$aItem.aFeed}
			{/if}
			
			{plugin call='blog.template_block_entry_text_end'}			
		</div>
	
	{plugin call='blog.template_block_entry_end'}	
	{if !isset($bBlogView)}
		</div>					
	</div>
	{/if}
</div>