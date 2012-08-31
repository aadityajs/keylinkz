<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-menu.html.php 3409 2011-11-02 09:17:19Z Miguel_Espinoza $
 */



?>
<?php if (Phpfox ::getUserBy('profile_page_id') <= 0): ?>
<ul>
<?php if (count((array)$this->_aVars['aMenus'])):  $this->_aPhpfoxVars['iteration']['menu'] = 0;  foreach ((array) $this->_aVars['aMenus'] as $this->_aVars['iKey'] => $this->_aVars['aMenu']):  $this->_aPhpfoxVars['iteration']['menu']++; ?>



	<li
		style="line-height: 30px;"
<?php if (( $this->_aVars['aMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] ) ) || ( isset ( $this->_aVars['aMenu']['children'] ) && count ( $this->_aVars['aMenu']['children'] ) )): ?>class="explore"<?php endif; ?>>



		<a
		href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aMenu']['url']); ?>"
		style="float: left; line-height: 30px;"
		class="<?php if (isset ( $this->_aVars['aMenu']['external'] ) && $this->_aVars['aMenu']['external'] == true): ?>no_ajax_link <?php endif; ?>ajax_link">
<?php echo Phpfox::getPhrase($this->_aVars['aMenu']['module'].'.'.$this->_aVars['aMenu']['var_name']);  if (isset ( $this->_aVars['aMenu']['suffix'] )):  echo $this->_aVars['aMenu']['suffix'];  endif; ?> </a>| <?php if (isset ( $this->_aVars['aMenu']['children'] ) && count ( $this->_aVars['aMenu']['children'] )): ?>


		<ul>
<?php if (count((array)$this->_aVars['aMenu']['children'])):  $this->_aPhpfoxVars['iteration']['child_menu'] = 0;  foreach ((array) $this->_aVars['aMenu']['children'] as $this->_aVars['aChild']):  $this->_aPhpfoxVars['iteration']['child_menu']++; ?>

			<li
<?php if ($this->_aPhpfoxVars['iteration']['child_menu'] == 1): ?> class="first"<?php endif; ?>><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aChild']['url']); ?>"><?php echo Phpfox::getPhrase($this->_aVars['aChild']['module'].'.'.$this->_aVars['aChild']['var_name']); ?></a></li> <?php endforeach; endif; ?>

		</ul> <?php else: ?> <?php if ($this->_aVars['aMenu']['url'] == 'apps' && count ( $this->_aVars['aInstalledApps'] )): ?>


		<ul>
<?php if (count((array)$this->_aVars['aInstalledApps'])):  foreach ((array) $this->_aVars['aInstalledApps'] as $this->_aVars['aInstalledApp']): ?>
			<li><a
				href="<?php echo Phpfox::permalink('apps', $this->_aVars['aInstalledApp']['app_id'], $this->_aVars['aInstalledApp']['app_title'], false, null, (array) array (
)); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => 0,'path' => 'app.url_image','file' => $this->_aVars['aInstalledApp']['image_path'],'suffix' => '_square','max_width' => 16,'max_height' => 16,'title' => $this->_aVars['aInstalledApp']['app_title'],'class' => 'v_middle')); ?>
<?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aInstalledApp']['app_title']); ?></a></li> <?php endforeach; endif; ?>
		</ul> <?php endif; ?> <?php endif; ?></li> <?php endforeach; endif; ?> <?php unset($this->_aVars['aMenu']); ?> <?php if (count ( $this->_aVars['aAppMenus'] )): ?>
	<li class="explore"><a
		href="#"
		onclick="return false;"><?php echo Phpfox::getPhrase('core.explore'); ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/header_menu_explore_drop.png','class' => 'v_middle')); ?></a>
		<ul>
<?php if (count((array)$this->_aVars['aAppMenus'])):  $this->_aPhpfoxVars['iteration']['app_menu'] = 0;  foreach ((array) $this->_aVars['aAppMenus'] as $this->_aVars['iAppKey'] => $this->_aVars['aAppMenu']):  $this->_aPhpfoxVars['iteration']['app_menu']++; ?>

			<li><a
				href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aAppMenu']['url']); ?>"
				class="ajax_link"><?php echo Phpfox::getPhrase($this->_aVars['aAppMenu']['module'].'.'.$this->_aVars['aAppMenu']['var_name']); ?></a>
			</li> <?php endforeach; endif; ?>
		</ul>
	</li> <?php endif; ?> <?php unset($this->_aVars['aAppMenus']); ?>
</ul>
<?php endif; ?>

