<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-footer.html.php 3244 2011-10-07 11:42:15Z Raymond_Benc $
 */
 
 

?>
<?php if (! defined ( 'PHPFOX_SKIP_IM' )): ?>
<?php Phpfox::getBlock('im.footer', array()); ?>
<?php echo $this->_aVars['sDebugInfo']; ?>
<?php endif; ?>
		<script type="text/javascript">
			$Core.init();
		</script>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_body__end')) ? eval($sPlugin) : false); ?>
