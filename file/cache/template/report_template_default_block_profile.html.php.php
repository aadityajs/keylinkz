<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: profile.html.php 3760 2011-12-12 12:28:08Z Raymond_Benc $
 */
 
 

 if (Phpfox ::isModule('report')): ?>
<div class="pages_view_sub_menu">
	<ul>
<?php if ($this->_aVars['aUser']['user_id'] != Phpfox ::getUserId()): ?><li><a href="#?call=report.add&amp;height=220&amp;width=400&amp;type=user&amp;id=<?php echo $this->_aVars['aUser']['user_id']; ?>" class="inlinePopup" title="<?php echo Phpfox::getPhrase('report.report_this_user'); ?>"><?php echo Phpfox::getPhrase('report.report_this_user'); ?></a></li><?php endif; ?>
<?php if (isset ( $this->_aVars['bShowRssFeedForUser'] )): ?>
		<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['aUser']['user_name'].'.rss'); ?>" class="no_ajax_link"><?php echo Phpfox::getPhrase('rss.subscribe_via_rss'); ?></a></li>
<?php endif; ?>
	</ul>
</div>
<?php endif; ?>
