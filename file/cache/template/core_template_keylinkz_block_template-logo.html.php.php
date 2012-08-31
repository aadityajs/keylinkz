<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-logo.html.php 2818 2011-08-09 12:01:57Z Raymond_Benc $
 */



?>
<?php if (! empty ( $this->_aVars['sStyleLogo'] )): ?>
						<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?>" id="logo"><img src="<?php echo $this->_aVars['sStyleLogo']; ?>" class="v_middle" /></a>
<?php else: ?>
						<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''); ?>" id="logo"><?php echo Phpfox::getParam('core.site_title'); ?></a>
<?php endif; ?>
