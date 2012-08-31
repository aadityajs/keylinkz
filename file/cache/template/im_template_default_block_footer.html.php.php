<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: footer.html.php 2871 2011-08-23 08:09:23Z Miguel_Espinoza $
 */
 
 

 if (Phpfox ::getParam('im.enable_im_in_footer_bar') && Phpfox ::isUser()): ?>
	<div id="im_footer_wrapper">
		<ul id="im_footer_bar">
			<li id="im_chats_lists">
<?php if (Phpfox ::getUserBy('im_hide') != '1'): ?>
<?php Phpfox::getBlock('im.user', array()); ?>
<?php endif; ?>
			</li>
			<li id="js_im_holder">
				<div id="main_messenger_holder"> </div>
				<div id="main_messenger_link" onclick="if (typeof $Core.im != 'undefined'){$Core.im.toggleMessengerLink();} return false;">
<?php if (Phpfox ::getUserBy('is_invisible')): ?>
					<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.privacy', array('enable' => 'chat')); ?>" title="<?php echo Phpfox::getPhrase('im.instant_messenger'); ?>">
<?php else: ?>
					<a href="#" title="<?php echo Phpfox::getPhrase('im.instant_messenger'); ?>" id="js_instant_messenger_link">
<?php endif; ?>
						<span id="js_im_status_offline" class="im_status_image"<?php if (Phpfox ::getUserBy('im_status') != '2' && Phpfox ::getUserBy('im_hide') != '1'): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/status_offline.png','class' => 'v_middle')); ?></span>		
						<span id="js_im_status_away" class="im_status_image"<?php if (Phpfox ::getUserBy('im_status') != '1' || Phpfox ::getUserBy('im_hide') == '1'): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/status_away.png','class' => 'v_middle')); ?></span>
						<span id="js_im_status_online" class="im_status_image"<?php if (Phpfox ::getUserBy('im_status') != '0' || Phpfox ::getUserBy('im_hide') == '1'): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/status_online.png','class' => 'v_middle')); ?></span>		

						<span id="js_im_display_offline" class="im_status_display"<?php if (Phpfox ::getUserBy('im_hide') != '1'): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('im.chat'); ?> (<?php echo Phpfox::getPhrase('im.offline'); ?>)</span>
						<span id="js_im_display_online" class="im_status_display"<?php if (Phpfox ::getUserBy('im_hide') == '1'): ?> style="display:none;"<?php endif; ?>><?php echo Phpfox::getPhrase('im.chat'); ?> (<span id="js_im_total_friend_count"><?php echo $this->_aVars['iTotalFriendsOnline']; ?></span>)</span>
					</a>
<?php if (Phpfox ::getUserBy('im_hide') != '1' && Phpfox ::getUserBy('footer_bar') != '1'): ?>
				<script type="text/javascript">
<?php if (PHPFOX_IS_AJAX): ?>
<?php if ($this->_aVars['sLastOpenWindow'] == 'messenger'): ?>
						$.ajaxCall('im.load','','GET');  
<?php elseif ($this->_aVars['sLastOpenWindow'] == 'chat'): ?>
						$.ajaxCall('im.open', 'id=<?php echo $this->_aVars['sLastWindowParam']; ?>');  
<?php else: ?>
						
<?php endif; ?>
<?php else: ?>
<?php if ($this->_aVars['sLastOpenWindow'] == 'messenger'): ?>
						setTimeout("$.ajaxCall('im.load','','GET');", 2000);  
<?php elseif ($this->_aVars['sLastOpenWindow'] == 'chat'): ?>
						setTimeout("$.ajaxCall('im.open', 'id=<?php echo $this->_aVars['sLastWindowParam']; ?>');", 2000);
<?php endif; ?>
<?php endif; ?>
				</script>
<?php endif; ?>
				</div>				
			</li>	
		</ul>
	</div>
<?php endif; ?>
