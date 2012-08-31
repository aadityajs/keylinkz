<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php if (isset ( $this->_aVars['aPageSectionMenu'] ) && count ( $this->_aVars['aPageSectionMenu'] )): ?>
<div class="page_section_menu<?php if (! isset ( $this->_aVars['aPageExtraLink']['no_header_border'] )): ?> page_section_menu_header<?php endif; ?>">
<?php if ($this->_aVars['aPageExtraLink'] !== null): ?>
	<a href="<?php echo $this->_aVars['aPageExtraLink']['link']; ?>" class="page_section_menu_link"><?php echo $this->_aVars['aPageExtraLink']['phrase']; ?></a>
<?php endif; ?>
	<ul>
<?php if (count((array)$this->_aVars['aPageSectionMenu'])):  $this->_aPhpfoxVars['iteration']['pagesectionmenu'] = 0;  foreach ((array) $this->_aVars['aPageSectionMenu'] as $this->_aVars['sPageSectionKey'] => $this->_aVars['sPageSectionMenu']):  $this->_aPhpfoxVars['iteration']['pagesectionmenu']++; ?>

		<li <?php if ($this->_aPhpfoxVars['iteration']['pagesectionmenu'] == 1): ?> class="active"<?php endif; ?>><a href="#" rel="<?php echo $this->_aVars['sPageSectionMenuName']; ?>_<?php echo $this->_aVars['sPageSectionKey']; ?>"><?php echo $this->_aVars['sPageSectionMenu']; ?></a></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
</div>
<?php endif;  echo Phpfox::getLib('template')->getSectionMenuJavaScript(); ?>

<?php if ($this->_aVars['sPublicMessage']): ?>
<div class="public_message" id="public_message">
<?php echo $this->_aVars['sPublicMessage']; ?>
</div>
<script type="text/javascript">
	$('#public_message').show();
</script>
<?php endif;  if (! Phpfox ::getParam('core.disable_ie_warning')): ?>
<div id="js_update_internet_explorer" style="display:none;">
<?php if (Phpfox ::getParam('core.display_older_ie_error')): ?>
	<div class="update_internet_explorer">
<?php echo Phpfox::getPhrase('core.ie8_or_higher_warning'); ?>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
<div id="pem"><a name="pem"></a></div>
<div id="core_js_messages">
<?php if (count ( $this->_aVars['aErrors'] )):  if (count((array)$this->_aVars['aErrors'])):  foreach ((array) $this->_aVars['aErrors'] as $this->_aVars['sErrorMessage']): ?>
	<div class="error_message"><?php echo $this->_aVars['sErrorMessage']; ?></div>
<?php endforeach; endif;  unset($this->_aVars['sErrorMessage'], $this->_aVars['sample']);  endif; ?>
</div>
