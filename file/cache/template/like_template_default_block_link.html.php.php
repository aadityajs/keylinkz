<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: link.html.php 3604 2011-11-29 09:10:05Z Raymond_Benc $
 */
 
 

?>
<li>
	<a href="#" onclick="$(this).parents('div:first').find('.js_like_link_unlike:first').show(); $(this).hide(); $.ajaxCall('like.add', 'type_id=<?php echo $this->_aVars['aLike']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aLike']['like_item_id']; ?>&amp;parent_id=<?php if (isset ( $this->_aVars['aFeed']['feed_id'] )):  echo $this->_aVars['aFeed']['feed_id'];  else:  endif;  if ($this->_aVars['aLike']['like_is_custom']): ?>&amp;custom_inline=1<?php endif; ?>', 'GET'); return false;" class="js_like_link_like"<?php if ($this->_aVars['aLike']['like_is_liked']): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('feed.like'); ?></a>
	<a href="#" onclick="$(this).parents('div:first').find('.js_like_link_like:first').show(); $(this).hide(); $.ajaxCall('like.delete', 'type_id=<?php echo $this->_aVars['aLike']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aLike']['like_item_id']; ?>&amp;parent_id=<?php if (isset ( $this->_aVars['aFeed']['feed_id'] )):  echo $this->_aVars['aFeed']['feed_id'];  else:  endif;  if ($this->_aVars['aLike']['like_is_custom']): ?>&amp;custom_inline=1<?php endif; ?>', 'GET'); return false;" class="js_like_link_unlike"<?php if ($this->_aVars['aLike']['like_is_liked']):  else: ?>style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('feed.unlike'); ?></a>						
</li>
