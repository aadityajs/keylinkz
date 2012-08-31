<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menufooter.html.php 3335 2011-10-20 17:26:57Z Raymond_Benc $
 */
 
 

?>
<?php if (! Phpfox ::getUserBy('profile_page_id')): ?>
						<ul id="footer_menu">
<?php if (count((array)$this->_aVars['aFooterMenu'])):  $this->_aPhpfoxVars['iteration']['footer'] = 0;  foreach ((array) $this->_aVars['aFooterMenu'] as $this->_aVars['iKey'] => $this->_aVars['aMenu']):  $this->_aPhpfoxVars['iteration']['footer']++; ?>

							<li<?php if ($this->_aPhpfoxVars['iteration']['footer'] == 1): ?> class="first"<?php endif; ?>><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['aMenu']['url'].''); ?>" class="ajax_link"><?php echo Phpfox::getPhrase($this->_aVars['aMenu']['module'].'.'.$this->_aVars['aMenu']['var_name']); ?></a></li>
<?php endforeach; endif; ?>
<?php if (Phpfox ::getUserParam('core.can_design_dnd')): ?>
							<li>
<?php if (! Phpfox ::getService('theme')->isInDnDMode()): ?>
									<a href="#" onclick="$.ajaxCall('core.designdnd', 'enable=1&amp;inline=1'); return false;">
<?php echo Phpfox::getPhrase('core.enable_dnd_mode'); ?>
									</a>
<?php else: ?>
									<a href="#" onclick="$.ajaxCall('core.designdnd', 'enable=2&amp;inline=1'); return false;">
<?php echo Phpfox::getPhrase('core.disable_dnd_mode'); ?>
									</a>
<?php endif; ?>
							</li>
<?php endif; ?>
						</ul>
<?php endif; ?>
