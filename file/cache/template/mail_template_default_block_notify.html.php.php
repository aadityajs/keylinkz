<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: notify.html.php 3761 2011-12-12 12:43:35Z Raymond_Benc $
 */
 
 

?>
<li>
	<span class="holder_notify_count" id="js_total_new_messages">0</span>
	<a href="#" title="<?php echo Phpfox::getPhrase('mail.messages_notify'); ?>" class="message notify_drop_link" rel="mail.getLatest"><?php echo Phpfox::getPhrase('mail.messages_notify'); ?></a>
	<div class="holder_notify_drop">
		<div class="holder_notify_drop_content">
        
        
        
        
			<div class="holder_notify_drop_title">
<?php if (Phpfox ::isModule('friend')): ?>
                    <div class="holder_notify_drop_title_link">
                        <a href="#" onclick="$Core.composeMessage(); return false;"><?php echo Phpfox::getPhrase('mail.send_a_new_message'); ?></a>
                    </div>
<?php endif; ?>
<?php echo Phpfox::getPhrase('mail.messages_notify'); ?>
			</div>
            
            
            
            
            
            
			<div class="holder_notify_drop_data">
				<div class="holder_notify_drop_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>													
			</div>
            
		</div>											
	</div>
</li>
