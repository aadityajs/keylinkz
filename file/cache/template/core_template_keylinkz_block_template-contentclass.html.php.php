<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-contentclass.html.php 3067 2011-09-12 08:27:57Z Raymond_Benc $
 */



 if (! $this->_aVars['bUseFullSite']): ?>class="<?php if (count ( $this->_aVars['aBlocks3'] ) || count ( $this->_aVars['aBlocks1'] ) || count ( $this->_aVars['aAdBlocks3'] ) || count ( $this->_aVars['aAdBlocks1'] )): ?> content_float<?php endif; ?> <?php if (( count ( $this->_aVars['aBlocks1'] ) || count ( $this->_aVars['aAdBlocks1'] ) ) && ( count ( $this->_aVars['aBlocks3'] ) || count ( $this->_aVars['aAdBlocks3'] ) )): ?> content3<?php endif; ?> <?php if (count ( $this->_aVars['aBlocks1'] ) || count ( $this->_aVars['aBlocks3'] ) || count ( $this->_aVars['aAdBlocks3'] )): ?> <?php if (isset ( $this->_aVars['aFilterMenus'] ) && ( count ( $this->_aVars['aBlocks3'] ) || count ( $this->_aVars['aAdBlocks3'] ) ) && ! count ( $this->_aVars['aBlocks1'] )): ?>content3<?php else: ?>content2<?php endif;  endif; ?>"<?php endif; ?>
