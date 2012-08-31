<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Share
 * @version 		$Id: link.html.php 2665 2011-06-13 14:00:25Z Raymond_Benc $
 */
 
 

 if ($this->_aVars['sBookmarkDisplay'] == 'menu'): ?>
<li class="sub_menu_bar_li"><a href="#" onclick="tb_show('<?php echo Phpfox::getPhrase('share.share', array('phpfox_squote' => true)); ?>', $.ajaxBox('share.popup', 'height=300&amp;width=550&amp;type=<?php echo $this->_aVars['sBookmarkType']; ?>&amp;url=<?php echo $this->_aVars['sBookmarkUrl']; ?>&amp;title=<?php echo $this->_aVars['sBookmarkTitle']; ?>')); return false;"<?php if ($this->_aVars['bIsFirstLink']): ?> class="first"<?php endif; ?>><?php echo Phpfox::getPhrase('share.share'); ?></a></li>
<?php elseif ($this->_aVars['sBookmarkDisplay'] == 'menu_link'): ?>
<li><a href="#" onclick="tb_show('<?php echo Phpfox::getPhrase('share.share', array('phpfox_squote' => true)); ?>', $.ajaxBox('share.popup', 'height=300&amp;width=550&amp;type=<?php echo $this->_aVars['sBookmarkType']; ?>&amp;url=<?php echo $this->_aVars['sBookmarkUrl']; ?>&amp;title=<?php echo $this->_aVars['sBookmarkTitle']; ?>')); return false;"<?php if ($this->_aVars['bIsFirstLink']): ?> class="first"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'icon/share.png','class' => 'item_bar_image')); ?> <?php echo Phpfox::getPhrase('share.share'); ?></a></li>
<?php elseif ($this->_aVars['sBookmarkDisplay'] == 'image'): ?>
<a href="#" onclick="tb_show('<?php echo Phpfox::getPhrase('share.share', array('phpfox_squote' => true)); ?>', $.ajaxBox('share.popup', 'height=300&amp;width=350&amp;type=<?php echo $this->_aVars['sBookmarkType']; ?>&amp;url=<?php echo $this->_aVars['sBookmarkUrl']; ?>&amp;title=<?php echo $this->_aVars['sBookmarkTitle']; ?>')); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/icn_share.png','class' => 'v_middle')); ?> <?php echo Phpfox::getPhrase('share.share'); ?></a>
<?php else: ?>
<a href="#"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/add.png','alt' => '','style' => 'vertical-align:middle;')); ?></a> <a href="#" onclick="tb_show('<?php echo Phpfox::getPhrase('share.share', array('phpfox_squote' => true)); ?>', $.ajaxBox('share.popup', 'height=300&amp;width=350&amp;type=<?php echo $this->_aVars['sBookmarkType']; ?>&amp;url=<?php echo $this->_aVars['sBookmarkUrl']; ?>&amp;title=<?php echo $this->_aVars['sBookmarkTitle']; ?>')); return false;"><?php echo Phpfox::getPhrase('share.share'); ?></a>
<?php endif; ?>
