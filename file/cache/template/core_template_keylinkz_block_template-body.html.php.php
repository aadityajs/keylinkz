<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-body.html.php 3335 2011-10-20 17:26:57Z Raymond_Benc $
 */



?>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_body__start')) ? eval($sPlugin) : false); ?>
<?php if (Phpfox ::getParam('core.site_is_offline') && ! Phpfox ::getParam('core.site_offline_no_template')): ?>
		<div id="site_offline">
			<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.setting.edit.group-id_site_offline_online'); ?>"><?php echo Phpfox::getPhrase('core.the_site_is_currently_in_offline_mode'); ?></a>
		</div>
<?php endif; ?>
<?php Phpfox::getBlock('theme.design', array()); ?>
<?php if (PHPFOX_DESIGN_DND): ?>
		<div id="designDnD">
			<div class="holder">
				<div id="designDnDLink">
					<ul>
						<li><a href="#" onclick="$Core.box('theme.addBlockDnD', 300); return false;"><?php echo Phpfox::getPhrase('core.add_new_block'); ?></a></li>
						<li><a href="#" onclick="$.ajaxCall('core.designdnd'); return false;"><?php echo Phpfox::getPhrase('core.disable_dnd'); ?></a></li>
					</ul>
					<div class="clear"></div>
				</div>
<?php echo Phpfox::getPhrase('core.dnd_mode'); ?>
			</div>
		</div>
<?php endif; ?>
