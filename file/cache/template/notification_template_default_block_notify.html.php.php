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
	<span class="holder_notify_count" id="js_total_new_notifications">0</span>
	<a href="#" title="<?php echo Phpfox::getPhrase('notification.notifications'); ?>" class="notification notify_drop_link" rel="notification.getAll"><?php echo Phpfox::getPhrase('notification.notifications'); ?></a>
	<div class="holder_notify_drop">
		<div class="holder_notify_drop_content">
			<div class="holder_notify_drop_title"><?php echo Phpfox::getPhrase('notification.notifications'); ?></div>
			<div class="holder_notify_drop_data">
				<div class="holder_notify_drop_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>													
			</div>
		</div>											
	</div>
</li>	
