<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: notify.html.php 3335 2011-10-20 17:26:57Z Raymond_Benc $
 */
 
 

?>
<li>	
	<span class="holder_notify_count" id="js_total_new_friend_requests">0</span>
	<a href="#" title="<?php echo Phpfox::getPhrase('friend.friend_requests'); ?>" class="friend_notification notify_drop_link" rel="friend.getRequests"><?php echo Phpfox::getPhrase('friend.friend_requests'); ?></a>
	<div class="holder_notify_drop">
		<div class="holder_notify_drop_content">
			<div class="holder_notify_drop_title"><?php echo Phpfox::getPhrase('friend.friend_requests'); ?></div>
			<div class="holder_notify_drop_data">
				<div class="holder_notify_drop_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>													
			</div>
		</div>											
	</div>									
</li>
