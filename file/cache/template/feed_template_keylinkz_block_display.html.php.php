<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: block.html.php 3342 2011-10-21 12:59:32Z Raymond_Benc $
 */
 
 

 if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
<div class="block<?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?> js_sortable<?php endif;  if (isset ( $this->_aVars['sCustomClassName'] )): ?> <?php echo $this->_aVars['sCustomClassName'];  endif; ?>"<?php if (isset ( $this->_aVars['sBlockBorderJsId'] )): ?> id="js_block_border_<?php echo $this->_aVars['sBlockBorderJsId']; ?>"<?php endif;  if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) && Phpfox ::getLib('module')->blockIsHidden('js_block_border_' . $this->_aVars['sBlockBorderJsId'] . '' )): ?> style="display:none;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['sHeader'] ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
		<div class="title <?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?>js_sortable_header<?php endif; ?>">		
<?php if (isset ( $this->_aVars['sBlockTitleBar'] )): ?>
<?php echo $this->_aVars['sBlockTitleBar']; ?>
<?php endif; ?>
<?php if (( isset ( $this->_aVars['aEditBar'] ) && Phpfox ::isUser())): ?>
			<div class="js_edit_header_bar">
				<a href="#" title="<?php echo Phpfox::getPhrase('core.edit_this_block'); ?>" onclick="$.ajaxCall('<?php echo $this->_aVars['aEditBar']['ajax_call']; ?>', 'block_id=<?php echo $this->_aVars['sBlockBorderJsId'];  if (isset ( $this->_aVars['aEditBar']['params'] )):  echo $this->_aVars['aEditBar']['params'];  endif; ?>'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_edit.png','alt' => '','class' => 'v_middle')); ?></a>				
			</div>
<?php endif; ?>
<?php if (true || isset ( $this->_aVars['sDeleteBlock'] )): ?>
			<div class="js_edit_header_bar js_edit_header_hover" style="display:none;">
<?php if (Phpfox ::getService('theme')->isInDnDMode()): ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')){
					$(this).parents('.block:first').remove(); $.ajaxCall('core.removeBlockDnD', 'sController=' + oParams['sController'] 
					+ '&amp;block_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>');} return false;"title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>
<?php else: ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')) { $(this).parents('.block:first').remove();
					$.ajaxCall('core.hideBlock', 'sController=' + oParams['sController'] + '&amp;type_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>&amp;block_id=' + $(this).parents('.block:first').attr('id')); } return false;" title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>				
<?php endif; ?>
			</div>
			
<?php endif; ?>
<?php if (empty ( $this->_aVars['sHeader'] )): ?>
<?php echo $this->_aVars['sBlockShowName']; ?>
<?php else: ?>
<?php echo $this->_aVars['sHeader']; ?>
<?php endif; ?>
		</div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aEditBar'] )): ?>
	<div id="js_edit_block_<?php echo $this->_aVars['sBlockBorderJsId']; ?>" class="edit_bar" style="display:none;"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aMenu'] ) && count ( $this->_aVars['aMenu'] )): ?>
	<div class="menu">
	<ul>
<?php if (count((array)$this->_aVars['aMenu'])):  $this->_aPhpfoxVars['iteration']['content'] = 0;  foreach ((array) $this->_aVars['aMenu'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['content']++; ?>
 
		<li class="<?php if (count ( $this->_aVars['aMenu'] ) == $this->_aPhpfoxVars['iteration']['content']): ?> last<?php endif;  if ($this->_aPhpfoxVars['iteration']['content'] == 1): ?> first active<?php endif; ?>"><a href="<?php echo $this->_aVars['sLink']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
	</div>
<?php unset($this->_aVars['aMenu']); ?>
<?php endif; ?>
	<div class="content"<?php if (isset ( $this->_aVars['sBlockJsId'] )): ?> id="js_block_content_<?php echo $this->_aVars['sBlockJsId']; ?>"<?php endif; ?>>
<?php endif; ?>
		<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 3773 2011-12-13 12:02:32Z Raymond_Benc $
 */



?>
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && defined ( 'PHPFOX_IS_AJAX' ) && Phpfox ::getLib('request')->get('type') == ( 'rent' || 'sale' ) && Phpfox ::isUser(true)): ?>
<!-- <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options(); </script> -->

<!-- <?php if (empty ( $this->_aVars['aSearchTool'] ) && ! is_array ( $this->_aVars['aSearchTool'] )): ?>
		<div class="header_bar_menu">
<?php if (isset ( $this->_aVars['aSearchTool']['search'] )): ?>
			<div class="header_bar_search">
				<form method="post" action="<?php echo $this->_aVars['aSearchTool']['search']['action']; ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div><input type="hidden" name="search[submit]" value="1" /></div>
					<div class="header_bar_search_holder">
						<div class="header_bar_search_default"><?php echo $this->_aVars['aSearchTool']['search']['default_value']; ?></div>
						<input type="text" name="search[<?php echo $this->_aVars['aSearchTool']['search']['name']; ?>]" value="<?php if (isset ( $this->_aVars['aSearchTool']['search']['actual_value'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSearchTool']['search']['actual_value']);  else:  echo $this->_aVars['aSearchTool']['search']['default_value'];  endif; ?>"<?php if (isset ( $this->_aVars['aSearchTool']['search']['actual_value'] )): ?>class="input_focus" <?php endif; ?>/>
						<div class="header_bar_search_input"></div>
					</div>
				
</form>

			</div>
<?php endif; ?>

<?php if (! Phpfox ::isMobile() && isset ( $this->_aVars['aSearchTool']['filters'] ) && count ( $this->_aVars['aSearchTool']['filters'] )): ?>
			<div class="header_filter_holder">
<?php if (count((array)$this->_aVars['aSearchTool']['filters'])):  foreach ((array) $this->_aVars['aSearchTool']['filters'] as $this->_aVars['sSearchFilterName'] => $this->_aVars['aSearchFilters']): ?>
				<div class="header_bar_float">
					<div class="header_bar_drop_holder">
						<ul class="header_bar_drop">
							<li><span><?php echo $this->_aVars['sSearchFilterName']; ?>:</span></li>
							<li><a href="#" class="header_bar_drop"><?php if (isset ( $this->_aVars['aSearchFilters']['active_phrase'] )):  echo $this->_aVars['aSearchFilters']['active_phrase'];  else:  echo $this->_aVars['aSearchFilters']['default_phrase'];  endif; ?></a></li>
						</ul>
						<div class="clear"></div>
						<div class="action_drop_holder">
							<ul class="action_drop"<?php if (isset ( $this->_aVars['aSearchFilters']['height'] )): ?> style="height:<?php echo $this->_aVars['aSearchFilters']['height']; ?>; overflow:auto;"<?php endif; ?>>
<?php if (count((array)$this->_aVars['aSearchFilters']['data'])):  foreach ((array) $this->_aVars['aSearchFilters']['data'] as $this->_aVars['aSearchFilter']): ?>
								<li><a href="<?php echo $this->_aVars['aSearchFilter']['link']; ?>" class="ajax_link <?php if (isset ( $this->_aVars['aSearchFilter']['is_active'] )): ?>active<?php endif; ?>"<?php if (isset ( $this->_aVars['aSearchFilters']['width'] )): ?> style="width:<?php echo $this->_aVars['aSearchFilters']['width']; ?>;"<?php endif; ?>><?php echo $this->_aVars['aSearchFilter']['phrase']; ?></a></li>
<?php endforeach; endif; ?>
							</ul>
						</div>
					</div>
				</div>
<?php endforeach; endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
		</div>
<?php endif; ?> -->


<div class="listing_box">
				<div class="listing_left">
				<div class="search_bg3">
				<div class="search_left2">
				<!-- <ul>
				<li><input type="text" class="search2" value="Search..." name="textfield2"/></li>
				<li><input type="submit" name="Submit" class="search_btn2" value=""/></li>
				</ul> -->
				<div class="header_bar_search">


                    <form method="post" action="">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
                        <div><input type="hidden" name="search[submit]" value="1" /></div>
                        <div class="header_bar_search_holder">
                            <div class="header_bar_search_default"><?php echo $this->_aVars['aSearchTool']['search']['default_value']; ?></div>
                            <input type="text" name="search[<?php echo $this->_aVars['aSearchTool']['search']['name']; ?>]" value="<?php if (isset ( $this->_aVars['aSearchTool']['search']['actual_value'] )):  echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aSearchTool']['search']['actual_value']);  else:  echo $this->_aVars['aSearchTool']['search']['default_value'];  endif; ?>"<?php if (isset ( $this->_aVars['aSearchTool']['search']['actual_value'] )): ?>class="input_focus" <?php endif; ?>/>
                            <div class="header_bar_search_input"></div>
                        </div>
                    
</form>



				</div>
				</div>
				<!-- <div style="float:right; margin: 7px auto;">
				<ul>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="4" height="1" /></li>
				<li><select name="select" class="styled">
					  <option value="1">Sort By</option>
					  <option value="1">Sort By 1</option>
					  <option value="1">Sort By 2</option>
					  <option value="1">Sort By 3</option>
					  <option value="1">Sort By 4</option>
		          </select></li>
				  <li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="4" height="1" /></li>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>view.gif" alt="" width="20" height="22" hspace="3" /></li>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="4" height="1" /></li>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>view1.gif" alt="" width="20" height="22" hspace="3" /></li>
				</ul>
				</div> -->
				</div>
				<div class="clear"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="1" height="10" /></div>

<?php if (count((array)$this->_aVars['adiPropList'])):  foreach ((array) $this->_aVars['adiPropList'] as $this->_aVars['listProp']): ?>
				<div class="listing_bg">
				<div class="listing_bgl">
                    <a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['listProp']['id']; ?>"><img src="<?php  echo PHPFOX_REALESTAE_IMAGE_UPLOAD;   echo $this->_aVars['listProp']['image']; ?>" alt="" width="97" height="68" class="border1"/></a>
                </div>
				<div class="listing_bgm">
				<div>
				<p><a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['listProp']['id']; ?>"><?php echo $this->_aVars['listProp']['title']; ?></a></p>
				</div>
				<div>
				  <table width="390" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="49%"><table width="100" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
<?php if ($this->_aVars['listProp']['is_rent'] == 'Y'): ?>
                                <span>Home For Rent:$<?php echo $this->_aVars['listProp']['price_per_month']; ?>/month</span>
<?php else: ?>
                                <span>Home For Sale:$<?php echo $this->_aVars['listProp']['total_price']; ?></span>
<?php endif; ?>
                          </td>
                        </tr>
                        <tr>
                          <td><p>See current rates</p></td>
                        </tr>
                        <tr>
                          <td><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="1" height="7" /></td>
                        </tr>
                        <tr>
                          <td><table width="180" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="80" valign="top"><span>Share Listing:</span></td>
                              <td width="21" colspan="3"><!--<img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon4.gif" alt="" width="11" height="11" /></td>
                              <td width="19"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon5.gif" alt="" width="11" height="11" hspace="4" /></td>
                              <td width="19"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon6.gif" alt="" width="11" height="11" hspace="4" /></td>
                              <td width="41">
                              	 <a href="#"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>more.gif" alt="" width="41" height="18" border="0" /></a>
								<span class='st_sharethis_large' displayText='ShareThis'></span>
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_twitter_large' displayText='Tweet'></span>
								<span class='st_linkedin_large' displayText='LinkedIn'></span>
								<span class='st_email_large' displayText='Email'></span>
								<span class='st_pinterest_large' displayText='Pinterest'></span>
								<span class='st_bebo_large' displayText='Bebo'></span>
								<span class='st_blogger_large' displayText='Blogger'></span>
								<span class='st_tumblr_large' displayText='Tumblr'></span>
								<span class='st_technorati_large' displayText='Technorati'></span>
								<span class='st_reddit_large' displayText='Reddit'></span>
								<span class='st_googleplus_large' displayText='Google +1'></span>
								<span class='st_digg_large' displayText='Digg'></span>
								<span class='st_delicious_large' displayText='Delicious'></span>-->

								<!-- AddThis Button BEGIN -->
								<script type="text/javascript">
									/*
									var addthis_config =
																		*/
								</script>
                                <!--
 								<meta property="og:title" content="AddThis Tour" />
								<meta property="og:description" content="Watch the AddThis Tour video." />
								<meta property="og:image" content="http://i2.ytimg.com/vi/1F7DKyFt5pY/default.jpg" />
								<meta property="og:video" content="http://www.youtube.com/v/1F7DKyFt5pY&fs=1" />
								<meta property="og:video:width" content="560" />
								<meta property="og:video:height" content="340" />
								<meta property="og:video:type" content="application/x-shockwave-flash" />

								<div class="addthis_toolbox addthis_default_style " addthis:url="<?php  echo Phpfox::getLib('url')->makeUrl('realestate');  ?>add/id_<?php echo $this->_aVars['listProp']['id']; ?>">
								<a class="addthis_button_facebook"></a>
								<a class="addthis_button_twitter"></a>
								<a class="addthis_button_linkedin"></a>
								<a class="addthis_button_compact"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>more.gif" alt="" width="35" height="18" border="0" /></a>
								<!--<a href="http://www.addthis.com/bookmark.php" class="addthis_button_email">
						        <img src="http://s7.addthis.com/button1-email.gif" width="54" height="16" border="0" alt="Email" /></a>
								<a class="addthis_counter addthis_bubble_style"></a> -->
                                <!--</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8bcbfd70c726e4"></script>
								<!-- AddThis Button END -->
								<img src="module/feed/static/image/facebook_16.png" />
                                <img src="module/feed/static/image/share-twitter.png" />
                                <img src="module/feed/static/image/google-plus.png" width="16" height="16"/>
                                <a class="addthis_button_compact"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>more.gif" alt="" width="35" height="18" border="0" /></a>
                              </td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                      <td width="22%"><table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><span>Beds: <?php echo $this->_aVars['listProp']['no_of_rooms']; ?></span></td>
                        </tr>
                        <tr>
                          <td><span>Baths: <?php echo $this->_aVars['listProp']['no_of_bathrooms']; ?></span></td>
                        </tr>
                        <tr>
                          <td><span>Sqft: <?php echo $this->_aVars['listProp']['total_square_foot']; ?></span></td>
                        </tr>
                        <tr>
                          <td><span>Lot: 12,000</span></td>
                        </tr>
                      </table></td>
                      <td width="29%"><table width="130" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><span>Days on KeyLinkz: 22</span></td>
                        </tr>
                        <tr>
                          <td><span>Built: 1941</span></td>
                        </tr>
                        <tr>
                          <td><span>Multi Family</span></td>
                        </tr>
                        <tr>
                          <td><span>Price/sqft: --</span></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
				</div>
				</div>
				<div class="listing_bgr">
				<ul>



<?php if ($this->_aVars['userID'] == $this->_aVars['listProp']['agent_id']): ?>
                <li><a href="<?php  echo Phpfox::getLib('url')->makeUrl('realestate');  ?>add/id_<?php echo $this->_aVars['listProp']['id']; ?>"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon7.gif" alt="" width="19" height="19" /></a></li>
<?php else: ?>
                <li><br /></li>
<?php endif; ?>





				<li><a target="_blank" href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>print/id_<?php echo $this->_aVars['listProp']['id']; ?>"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon8.gif" alt="" width="19" height="19" /></a></li>
				<li><a href="javascript: void(0);" onclick="$.ajaxCall('feed.popDetails', 'propId=<?php echo $this->_aVars['listProp']['id']; ?>::<?php echo $this->_aVars['listProp']['title']; ?>');"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon9.gif" title="View Details" width="19" height="19" /></a></li>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME_ICON;  ?>icon10.gif" alt="" width="19" height="19" /></li>
				</ul>
				</div>
				</div>
<?php endforeach; endif; ?>
<a href="javascript: void(0);" onClick="$.ajaxCall('feed.test');">aaa</a>
        </div>
<!-- && Phpfox::getLib('url')->getUrl().'type_rent' == Phpfox::getLib('url')->getUrl().'/type_rent' -->
<?php if ($this->bIsSample):  if (defined('PHPFOX_NO_WINDOW_CLICK')):  if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 3)); endif;  else: ?><div class="sample"<?php echo (!defined('PHPFOX_NO_WINDOW_CLICK') ? " onclick=\"window.parent.$('#location').val('3'); window.parent.tb_remove();\"" : ' style="cursor:default;"'); ?>><?php echo Phpfox::getPhrase('core.block') ; ?> 3<?php if (defined('PHPFOX_IS_AD_SAMPLE')): Phpfox::getBlock('ad.sample', array('block_id' => 3)); endif; ?></div><?php endif;  else:  $aBlocks = Phpfox::getLib('phpfox.module')->getModuleBlocks('3');  $aUrl = Phpfox::getLib('url')->getParams();  $bDesigning = Phpfox::getService("theme")->isInDnDMode();  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?> <div class="js_can_move_blocks js_sortable_empty" id="js_can_move_blocks_3"> <div class="block js_sortable dnd_block_info">Position '3'</div></div><?php endif;  foreach ((array)$aBlocks as $sBlock):  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?><div class="js_can_move_blocks" id="js_can_move_blocks_3"><?php endif;  if (is_array($sBlock) && (!defined('PHPFOX_CAN_MOVE_BLOCKS') || !in_array('3', array(1, 2, 3, 4)))):  eval(' ?>' . $sBlock[0] . '<?php ');  else:  Phpfox::getBlock($sBlock);  endif;  if (!Phpfox::isAdminPanel() && (PHPFOX_DESIGN_DND || $bDesigning || (defined("PHPFOX_IN_DESIGN_MODE") && PHPFOX_IN_DESIGN_MODE && in_array('3', array(1, 2, 3))))):?></div><?php endif;  endforeach;  if (!Phpfox::isAdminPanel()):  Phpfox::getBlock('ad.display', array('block_id' => 3));  endif;  endif; ?>

                <!-- LATEST LISTING
				<div class="listing_right">
				<div class="listing_righttop">
				<ul>
				<li>Latest Listings</li>
				<li><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="19" height="1"/></li>
				<li><a href="#">See all</a></li>
				</ul>
				</div>
				<div class="clear"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="1" height="10"/></div>


<?php if (count((array)$this->_aVars['propertyData'])):  foreach ((array) $this->_aVars['propertyData'] as $this->_aVars['latest']): ?>

				<div class="listing_rightbot">
				<div class="listing_leftbg">
                    <a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['latest']['id']; ?>"><img src="<?php  echo PHPFOX_REALESTAE_IMAGE_UPLOAD;   echo $this->_aVars['latest']['image']; ?>" alt="" width="70" height="55" /></a>
                </div>
				<div class="listing_rightbg">
				<p><a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['latest']['id']; ?>"><?php echo $this->_aVars['latest']['title']; ?></a></p>
				<p><span><?php echo $this->_aVars['latest']['realestate_desc']; ?>....</span></p>
				<p style="text-align:right; padding-right: 4px;"><a href="<?php echo Phpfox::getLib('url')->makeUrl('realestate'); ?>id_<?php echo $this->_aVars['latest']['id']; ?>">View</a></p>
				</div>
				</div>

<?php endforeach; endif; ?>



				<div class="clear"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>spacer.gif" alt="" width="1" height="10"/></div>
				<div><a href="#"><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>perl.jpg" alt="" width="206" height="197" border="0" /></a></div>
				</div>-->
                <!-- LATEST LISTING -->



				</div>



<?php else: ?>

<?php if (Phpfox ::isUser() && ! PHPFOX_IS_AJAX && $this->_aVars['sCustomViewType'] === null): ?>
<?php if (( Phpfox ::getUserBy('profile_page_id') >= 0 && defined ( 'PHPFOX_IS_USER_PROFILE' ) ) || ( isset ( $this->_aVars['aFeedCallback']['disable_share'] ) && $this->_aVars['aFeedCallback']['disable_share'] ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && ! Phpfox ::getService('user.privacy')->hasAccess('' . $this->_aVars['aUser']['user_id'] . '' , 'feed.share_on_wall' ) )): ?>

<?php else: ?>

<!-- Advanced serch area Starts -->

<?php echo '

<style type="text/css">

      #map-container {
        padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
        width: 475px;
      }

      #SearchMap {
        width: 470px;
        height: 300px;
      }

</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="/keylinkz/module/feed/static/jscript/markerclusterer.js"></script>
<script type="text/javascript" src="/keylinkz/module/feed/static/jscript/data.json"></script>

<script type="text/javascript">
      function initialize() {
        var center = new google.maps.LatLng(41.850033, -87.6500523);
        var map = new google.maps.Map(document.getElementById(\'SearchMap\'), {
          zoom: 3,
          zoomControl: true,
          zoomControlOptions: {
              style: google.maps.ZoomControlStyle.LARGE,
              position: google.maps.ControlPosition.TOP_RIGHT
          },
          center: center,
          streetViewControl: false,
          mapTypeControl: false,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });

        var markers = [];
        for (var i = 0; i < 100; i++) {
          var dataPhoto = data.photos[i];
          var latLng = new google.maps.LatLng(dataPhoto.latitude,
              dataPhoto.longitude);
          var marker = new google.maps.Marker({
            position: latLng
          });
          markers.push(marker);
        }

        var markerCluster = new MarkerClusterer(map, markers);
      }
     google.maps.event.addDomListener(window, \'load\', initialize);

    </script>


'; ?>


<div class="fr" id="showAdvSearchDiv" onclick="$.ajaxCall('feed.showAdvSearch');" style="display: none; height: 20px; cursor: pointer;"><span style="line-height: 20px;">Advance Search</span><img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>arrow_down_black.png" height="20px" width="20px" style="margin-top: -0px;"/> </div>
<div class="clear"></div>

<div class="" id="advSearchDiv">
	<div id="maincontainer">
		<span class="fr"><div style="position:absolute; right:0px;" class="delete_btn" onclick="$.ajaxCall('feed.hideAdvSearch');">&nbsp;</div></span>
		<div class="tab_base">
			<div class="tab">
			             <ul>
			                <li><a href="#">Sales</a></li>
			                <li><a href="#">Rentals</a></li>
			                <li><a href="#">Forclosure</a></li>
			                <li><a href="#">Rooms/Shares</a></li>
			      </ul>
				</div>
			<div class="clear"></div>

			 <div class="base_box">
	             <div class="content_box">
					 <div>
					 <input name="advSearchKeyword" id="advSearchKeyword" type="text" onkeyup="$.ajaxCall('feed.AdvSearch','searchKeyword='+$('#advSearchKeyword').val());" value="Neighborhood or City or Zip Code or Address" class="search_field" onclick="this.value='';"/>
					 <input type="button" name="SearchButton" id="SearchButton" onclick="$.ajaxCall('feed.AdvSearch','searchKeyword='+$('#advSearchKeyword').val());" value="Search" class="search_btn" />
					 </div>
					 <div class="advance_search" id="advSearchBtn" onclick="$.ajaxCall('feed.showAdvSearchOption');">Advanced Search:<img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>advance_img.png" border="0" alt="" /></div>
					 <div class="advance_search" style="display: none;" id="advSearchBtnClose" onclick="$.ajaxCall('feed.hideAdvSearchOption');">Hide Options<img src="<?php  echo PHPFOX_DIR_DEFAULT_THEME;  ?>advance_img.png" border="0" alt="" /></div>
					 <div class="clear"></div>
					 <div class="">
					 	<div id="map-container"><div id="SearchMap"></div></div>
					 </div>
					 <div id="AdvSearchOption" class="" style="display: none;">Options will come soon...</div>
					 <div class="clear"></div>

					 <div class="" style="display: none;" id="advSearchResult">
					 	Result
					 </div>
					 <div class="clear"></div>


				 </div>
			 </div>
			<div class="clear"></div>
			<!--  <div class="base_box">

			 </div> -->
			 <div class="clear"></div>
		</div>
	</div>
<!--
Activity Point: <?php  echo Phpfox::getUserBy('activity_points') ?><br/><?php echo $this->_aVars['adiTotalActivityPoints']; ?>
View Point: <?php  echo Phpfox::getUserBy('total_view') ?><br/><?php echo $this->_aVars['adiTotalProfileViews']; ?>
User URL: <?php echo $this->_aVars['adiUserProfileUrl']; ?>
User Group: <?php echo $this->_aVars['adiUserGroupFullName']; ?>
 -->

</div>
<!-- Advanced serch area Ends -->

<div class="activity_feed_form_share">
	<div class="activity_feed_form_share_process"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'v_middle')); ?></div>
	<ul class="activity_feed_form_attach">
<?php if (! Phpfox ::isMobile()): ?>
		<li class="share"><?php echo Phpfox::getPhrase('feed.share'); ?>:</li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
		<li><a href="#" style="background:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment_add.png','return_url' => true)); ?>') no-repeat center left;" rel="global_attachment_status" class="active"><div><?php echo Phpfox::getPhrase('feed.post'); ?><span class="activity_feed_link_form_ajax"><?php echo $this->_aVars['aFeedCallback']['ajax_request']; ?></span></div><div class="drop"></div></a></li>
<?php elseif (! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))): ?>
		<li><a href="#" style="background:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_add.png','return_url' => true)); ?>') no-repeat center left;" rel="global_attachment_status" class="active"><div><?php echo Phpfox::getPhrase('feed.status'); ?><span class="activity_feed_link_form_ajax">user.updateStatus</span></div><div class="drop"></div></a></li>
<?php else: ?>
		<li><a href="#" style="background:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment_add.png','return_url' => true)); ?>') no-repeat center left;" rel="global_attachment_status" class="active"><div><?php echo Phpfox::getPhrase('feed.post'); ?><span class="activity_feed_link_form_ajax">feed.addComment</span></div><div class="drop"></div></a></li>
<?php endif; ?>

<?php if (count((array)$this->_aVars['aFeedStatusLinks'])):  foreach ((array) $this->_aVars['aFeedStatusLinks'] as $this->_aVars['aFeedStatusLink']): ?>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] ) && $this->_aVars['aFeedStatusLink']['no_profile']): ?>
<?php else: ?>
<?php if (( $this->_aVars['aFeedStatusLink']['no_profile'] && ! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))) || ! $this->_aVars['aFeedStatusLink']['no_profile']): ?>
		<li>
			<a href="#" style="background:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'feed/'.$this->_aVars['aFeedStatusLink']['icon'].'','return_url' => true)); ?>') no-repeat center left;" rel="global_attachment_<?php echo $this->_aVars['aFeedStatusLink']['module_id']; ?>"<?php if ($this->_aVars['aFeedStatusLink']['no_input']): ?> class="no_text_input"<?php endif; ?>>
				<div>
<?php echo Phpfox::getLib('locale')->convert($this->_aVars['aFeedStatusLink']['title']); ?>
<?php if ($this->_aVars['aFeedStatusLink']['is_frame']): ?>
					<span class="activity_feed_link_form"><?php echo Phpfox::getLib('phpfox.url')->makeUrl(''.$this->_aVars['aFeedStatusLink']['module_id'].'.frame'); ?></span>
<?php else: ?>
					<span class="activity_feed_link_form_ajax"><?php echo $this->_aVars['aFeedStatusLink']['module_id']; ?>.<?php echo $this->_aVars['aFeedStatusLink']['ajax_request']; ?></span>
<?php endif; ?>
					<span class="activity_feed_extra_info"><?php echo Phpfox::getLib('locale')->convert($this->_aVars['aFeedStatusLink']['description']); ?></span>
				</div>
				<div class="drop"></div>
			</a>
		</li>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
</div>

<div class="activity_feed_form">
	<form method="post" action="#" id="js_activity_feed_form" enctype="multipart/form-data">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
		<div><input type="hidden" name="val[callback_item_id]" value="<?php echo $this->_aVars['aFeedCallback']['item_id']; ?>" /></div>
		<div><input type="hidden" name="val[callback_module]" value="<?php echo $this->_aVars['aFeedCallback']['module']; ?>" /></div>
		<div><input type="hidden" name="val[parent_user_id]" value="<?php echo $this->_aVars['aFeedCallback']['item_id']; ?>" /></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['bFeedIsParentItem'] )): ?>
		<div><input type="hidden" name="val[parent_table_change]" value="<?php echo $this->_aVars['sFeedIsParentItemModule']; ?>" /></div>
<?php endif; ?>
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] != Phpfox ::getUserId()): ?>
		<div><input type="hidden" name="val[parent_user_id]" value="<?php echo $this->_aVars['aUser']['user_id']; ?>" /></div>
<?php endif; ?>
		<div class="activity_feed_form_holder">

			<div id="activity_feed_upload_error" style="display:none;"><div class="error_message" id="activity_feed_upload_error_message"></div></div>

			<div class="global_attachment_holder_section" id="global_attachment_status" style="display:block;">
				<div id="global_attachment_status_value" style="display:none;"><?php if (isset ( $this->_aVars['aFeedCallback']['module'] ) || defined ( 'PHPFOX_IS_USER_PROFILE' )):  echo Phpfox::getPhrase('feed.write_something');  else:  echo Phpfox::getPhrase('feed.what_s_on_your_mind');  endif; ?></div>
				<textarea cols="60" rows="8" name="val[user_status]"><?php if (isset ( $this->_aVars['aFeedCallback']['module'] ) || defined ( 'PHPFOX_IS_USER_PROFILE' )):  echo Phpfox::getPhrase('feed.write_something');  else:  echo Phpfox::getPhrase('feed.what_s_on_your_mind');  endif; ?></textarea>
			</div>

<?php if (count((array)$this->_aVars['aFeedStatusLinks'])):  foreach ((array) $this->_aVars['aFeedStatusLinks'] as $this->_aVars['aFeedStatusLink']): ?>
<?php if (! empty ( $this->_aVars['aFeedStatusLink']['module_block'] )): ?>
<?php Phpfox::getBlock($this->_aVars['aFeedStatusLink']['module_block'], array()); ?>
<?php endif; ?>
<?php endforeach; endif; ?>
<?php if (Phpfox ::isModule('egift')): ?>
<?php Phpfox::getBlock('egift.display', array()); ?>
<?php endif; ?>
		</div>
		<div class="activity_feed_form_button">
			<div class="activity_feed_form_button_status_info">
				<textarea cols="60" rows="8" name="val[status_info]"></textarea>
			</div>
			<div class="activity_feed_form_button_position">

<?php if (defined ( 'PHPFOX_IS_PAGES_VIEW' ) && $this->_aVars['aPage']['is_admin'] && $this->_aVars['aPage']['page_id'] != Phpfox ::getUserBy('profile_page_id')): ?>
				<div class="activity_feed_pages_post_as_page">
<?php echo Phpfox::getPhrase('feed.post_as'); ?>:
					<select name="custom_pages_post_as_page">
						<option value="<?php echo $this->_aVars['aPage']['page_id']; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aPage']['full_name']), 20, '...'); ?></option>
						<option value="0"><?php echo $this->_aVars['sGlobalUserFullName']; ?></option>
					</select>
				</div>
<?php else: ?>
<?php if (Phpfox ::isModule('share') && ! defined ( 'PHPFOX_IS_USER_PROFILE' ) && ! defined ( 'PHPFOX_IS_PAGES_VIEW' ) && ! defined ( 'PHPFOX_IS_EVENT_VIEW' ) && ( Phpfox ::getParam('share.share_on_facebook') || Phpfox ::getParam('share.share_on_twitter'))): ?>
				<div id="activity_feed_share_this_one">
					<a href="#" id="activity_feed_share_this_one_link"><?php echo Phpfox::getPhrase('feed.share_this_on'); ?></a>
					<div class="feed_share_on_holder">
<?php if (Phpfox ::getParam('share.share_on_facebook')): ?>
						<div class="feed_share_on_item"><a href="#" onclick="$(this).toggleClass('active'); $.ajaxCall('share.connect', 'connect-id=facebook', 'GET'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/facebook.png','class' => 'v_middle')); ?> <?php echo Phpfox::getPhrase('feed.facebook'); ?></a></div>
<?php endif; ?>
<?php if (Phpfox ::getParam('share.share_on_twitter')): ?>
						<div class="feed_share_on_item"><a href="#" onclick="$(this).toggleClass('active'); $.ajaxCall('share.connect', 'connect-id=twitter', 'GET'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/twitter.png','class' => 'v_middle')); ?> <?php echo Phpfox::getPhrase('feed.twitter'); ?></a></div>
<?php endif; ?>
						<div><input type="hidden" name="val[connection][facebook]" value="0" id="js_share_connection_facebook" class="js_share_connection" /></div>
						<div><input type="hidden" name="val[connection][twitter]" value="0" id="js_share_connection_twitter" class="js_share_connection" /></div>
					</div>
				</div>
<?php endif; ?>
<?php endif; ?>

				<div class="activity_feed_form_button_position_button">
					<input type="submit" value="<?php echo Phpfox::getPhrase('feed.share'); ?>" class="button" />
				</div>
<?php if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>
<?php else: ?>
<?php if (! isset ( $this->_aVars['bFeedIsParentItem'] ) && ( ! defined ( 'PHPFOX_IS_USER_PROFILE' ) || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()))): ?>
<?php Phpfox::getBlock('privacy.form', array('privacy_name' => 'privacy','privacy_type' => 'mini')); ?>
<?php endif; ?>
<?php endif; ?>
				<div class="clear"></div>
			</div>
		</div>
	
</form>

	<div class="activity_feed_form_iframe"></div>
</div>
<?php endif; ?>
<?php endif; ?>

<?php if (Phpfox ::getParam('feed.refresh_activity_feed') > 0 && Phpfox ::getLib('module')->getFullControllerName() == 'core.index-member'): ?>
<div id="activity_feed_updates_link_holder">
    <a href="#" id="activity_feed_updates_link_single" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();"><?php echo Phpfox::getPhrase('feed.1_new_update'); ?></a>
    <a href="#" id="activity_feed_updates_link_plural" class="activity_feed_updates_link" onclick="return $Core.loadMoreFeeds();"><?php echo Phpfox::getPhrase('feed.span_id_js_new_update_view_span_new_updates'); ?></a>
</div>
<?php endif; ?>

<div id="feed"><a name="feed"></a></div>
<div id="js_feed_content">
<?php if ($this->_aVars['sCustomViewType'] !== null): ?>
	<h2><?php echo $this->_aVars['sCustomViewType']; ?></h2>
<?php endif; ?>
	<div id="js_new_feed_comment"></div>
	<div id="js_new_feed_update"></div>
<?php if (count((array)$this->_aVars['aFeeds'])):  $this->_aPhpfoxVars['iteration']['iFeed'] = 0;  foreach ((array) $this->_aVars['aFeeds'] as $this->_aVars['aFeed']):  $this->_aPhpfoxVars['iteration']['iFeed']++; ?>


<?php if (isset ( $this->_aVars['aFeed']['feed_mini'] ) && ! isset ( $this->_aVars['bHasRecentShow'] )): ?>
<?php if ($this->_aVars['bHasRecentShow'] = true):  endif; ?>
	<div class="activity_recent_holder">
	<div class="activity_recent_title">
<?php echo Phpfox::getPhrase('feed.recent_activity'); ?>
	</div>
<?php endif; ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] ) && isset ( $this->_aVars['bHasRecentShow'] )): ?>
	</div>
<?php unset($this->_aVars['bHasRecentShow']); ?>
<?php endif; ?>

	<div class="js_feed_view_more_entry_holder">
		<?php /* Cached: July 30, 2012, 9:12 am */  
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: entry.html.php 3700 2011-12-07 07:53:15Z Raymond_Benc $
 */
 
 

?>
<div class="row_feed_loop js_parent_feed_entry <?php if (isset ( $this->_aVars['aFeed']['feed_mini'] )): ?> row_mini <?php else:  if (isset ( $this->_aVars['bChildFeed'] )): ?> row1<?php else:  if (isset ( $this->_aPhpfoxVars['iteration']['iFeed'] )):  if (is_int ( $this->_aPhpfoxVars['iteration']['iFeed'] / 2 )): ?>row1<?php else: ?>row2<?php endif;  if ($this->_aPhpfoxVars['iteration']['iFeed'] == 1 && ! PHPFOX_IS_AJAX): ?> row_first<?php endif;  else: ?>row1<?php endif;  endif;  endif; ?> js_user_feed" id="js_item_feed_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (! Phpfox ::isMobile() && ( ( defined ( 'PHPFOX_FEED_CAN_DELETE' ) ) || ( Phpfox ::getUserParam('feed.can_delete_own_feed') && $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('feed.can_delete_other_feeds'))): ?>
	<div class="feed_delete_link"><a href="#" class="action_delete js_hover_title" onclick="$.ajaxCall('feed.delete', 'id=<?php echo $this->_aVars['aFeed']['feed_id'];  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&amp;module=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&amp;item=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>', 'GET'); return false;"><span class="js_hover_info"><?php echo Phpfox::getPhrase('feed.delete_this_feed'); ?></span></a></div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_1')) ? eval($sPlugin) : false); ?>
	<div class="activity_feed_image">	
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['is_custom_app'] ) && $this->_aVars['aFeed']['is_custom_app']): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => 0,'path' => 'app.url_image','file' => $this->_aVars['aFeed']['app_image_path'],'suffix' => '_square','max_width' => 50,'max_height' => 50)); ?>
<?php else: ?>
<?php if (isset ( $this->_aVars['aFeed']['user_name'] ) && ! empty ( $this->_aVars['aFeed']['user_name'] )): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFeed'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50)); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFeed'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50,'href' => '')); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
	</div><!-- // .activity_feed_image -->
	<div class="activity_feed_content">
		<div class="activity_feed_content_text">						
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
			<div class="activity_feed_content_info"><?php echo Phpfox::getLib('phpfox.parse.output')->split('<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['user_name'], ((empty($this->_aVars['aFeed']['user_name']) && isset($this->_aVars['aFeed']['profile_page_id'])) ? $this->_aVars['aFeed']['profile_page_id'] : null))) . '">' . $this->_aVars['aFeed']['full_name'] . '</a></span>', 50);  if (isset ( $this->_aVars['aFeed']['parent_user'] )): ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/arrow.png','class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['parent_user']['parent_user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['parent_user']['parent_user_name'], ((empty($this->_aVars['aFeed']['parent_user']['parent_user_name']) && isset($this->_aVars['aFeed']['parent_user']['parent_profile_page_id'])) ? $this->_aVars['aFeed']['parent_user']['parent_profile_page_id'] : null))) . '">' . $this->_aVars['aFeed']['parent_user']['parent_full_name'] . '</a></span>'; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_info'] )): ?> <?php echo $this->_aVars['aFeed']['feed_info'];  endif; ?></div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_mini_content'] )): ?>
			<div class="activity_feed_content_status">
				<div class="activity_feed_content_status_left">
					<img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" class="v_middle" /> <?php echo $this->_aVars['aFeed']['feed_mini_content']; ?> 
				</div>
				<div class="activity_feed_content_status_right">
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
			<div class="feed_share_custom">	
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_facebook_like')): ?>
				<div class="feed_share_custom_block">
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href=<?php echo $this->_aVars['aFeed']['feed_link']; ?>&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>					
				</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_twitter_link')): ?>
				<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" data-count="horizontal" data-via="<?php echo Phpfox::getParam('feed.twitter_share_via'); ?>"><?php echo Phpfox::getPhrase('feed.tweet'); ?></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_google_plus_one')): ?>
				<div class="feed_share_custom_block">
					<g:plusone href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" size="medium"></g:plusone>
					<?php echo '
					<script type="text/javascript">
					  (function() {
						var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
						po.src = \'https://apis.google.com/js/plusone.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					'; ?>

				</div>
<?php endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
			
			<ul>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_icon'] )): ?>
				<li><img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" /></li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['time_stamp'] )): ?>
				<li class="feed_entry_time_stamp">				
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a><?php if (! empty ( $this->_aVars['aFeed']['app_link'] )): ?> via <?php echo $this->_aVars['aFeed']['app_link'];  endif; ?>
				</li>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if ($this->_aVars['aFeed']['privacy'] > 0 && ( $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId() || Phpfox ::getUserParam('core.can_view_private_items'))): ?>
				<li><div class="js_hover_title"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/privacy_icon.png','alt' => $this->_aVars['aFeed']['privacy'])); ?><span class="js_hover_info"><?php echo Phpfox::getService('privacy')->getPhrase($this->_aVars['aFeed']['privacy']); ?></span></div></li>	
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::isUser() && Phpfox ::isModule('like') && isset ( $this->_aVars['aFeed']['like_type_id'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>add-comment/" class="<?php if (( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )):  else: ?>js_feed_entry_add_comment no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase('feed.comment'); ?></a>
				</li>				
<?php if (( Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) ) || ( isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] ) )): ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] )): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] )): ?>
				<li><span>&middot;</span></li>
				<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo Phpfox::getPhrase('feed.report'); ?></a></li>				
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>
			</ul>
			<div class="clear"></div>		
				</div>
				<div class="clear"></div>
			</div>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['aFeed']['feed_status'] )): ?>
			<div class="activity_feed_content_status">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_status']), 200, 'feed.view_more', true), 55); ?>
			</div>
<?php endif; ?>
			
			<div class="activity_feed_content_link">
				
<?php if ($this->_aVars['aFeed']['type_id'] == 'friend' && isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aFeed']['more_feed_rows'] as $this->_aVars['aFriends']): ?>
<?php echo $this->_aVars['aFriends']['feed_image']; ?>
<?php endforeach; endif; ?>
<?php echo $this->_aVars['aFeed']['feed_image']; ?>
<?php else: ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
				<div class="activity_feed_content_image"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="width:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (is_array ( $this->_aVars['aFeed']['feed_image'] )): ?>
						<ul class="activity_feed_multiple_image">
<?php if (count((array)$this->_aVars['aFeed']['feed_image'])):  foreach ((array) $this->_aVars['aFeed']['feed_image'] as $this->_aVars['sFeedImage']): ?>
								<li><?php echo $this->_aVars['sFeedImage']; ?></li>
<?php endforeach; endif; ?>
						</ul>
						<div class="clear"></div>
<?php else: ?>
						<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="<?php if (isset ( $this->_aVars['aFeed']['custom_css'] )): ?> <?php echo $this->_aVars['aFeed']['custom_css']; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?>play_link <?php endif; ?> no_ajax_link<?php endif; ?>"<?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )): ?> onclick="<?php echo $this->_aVars['aFeed']['feed_image_onclick']; ?>"<?php endif;  if (! empty ( $this->_aVars['aFeed']['custom_rel'] )): ?> rel="<?php echo $this->_aVars['aFeed']['custom_rel']; ?>"<?php endif;  if (isset ( $this->_aVars['aFeed']['custom_js'] )): ?> <?php echo $this->_aVars['aFeed']['custom_js']; ?> <?php endif; ?>><?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?><span class="play_link_img"><?php echo Phpfox::getPhrase('feed.play'); ?></span><?php endif;  endif;  echo $this->_aVars['aFeed']['feed_image']; ?></a>
<?php endif; ?>
				</div>
<?php endif; ?>
				<div class="<?php if (( ! empty ( $this->_aVars['aFeed']['feed_content'] ) || ! empty ( $this->_aVars['aFeed']['feed_custom_html'] ) ) && empty ( $this->_aVars['aFeed']['feed_image'] )): ?> activity_feed_content_no_image<?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?> activity_feed_content_float<?php endif; ?>"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="margin-left:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title'] )): ?>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="activity_feed_content_link_title"<?php if (isset ( $this->_aVars['aFeed']['feed_title_extra_link'] )): ?> target="_blank"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title']), 30); ?></a>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title_extra'] )): ?>
					<div class="activity_feed_content_link_title_link">
						<a href="<?php echo $this->_aVars['aFeed']['feed_title_extra_link']; ?>" target="_blank"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title_extra']); ?></a>
					</div>
<?php endif; ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_content'] )): ?>
					<div class="activity_feed_content_display">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_content']), 200, '...'), 55); ?>
					</div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_custom_html'] )): ?>
					<div class="activity_feed_content_display_custom">
<?php echo $this->_aVars['aFeed']['feed_custom_html']; ?>
					</div>
<?php endif; ?>
				</div>	
<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
				<div class="clear"></div>
<?php endif; ?>
<?php endif; ?>
			</div>
		</div><!-- // .activity_feed_content_text -->		

<?php if (isset ( $this->_aVars['aFeed']['feed_view_comment'] )): ?>
<?php Phpfox::getBlock('feed.comment', array()); ?>
<?php else: ?>
<?php /* Cached: July 30, 2012, 9:12 am */  if (isset ( $this->_aVars['bIsViewingComments'] ) && $this->_aVars['bIsViewingComments']): ?>
<div id="comment-view"><a name="#comment-view"></a></div>
<div class="message js_feed_comment_border">
<?php echo Phpfox::getPhrase('comment.viewing_a_single_comment'); ?> <a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>"><?php echo Phpfox::getPhrase('comment.view_all_comments'); ?></a>
</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['sFeedType'] )): ?>
<div class="js_parent_feed_entry parent_item_feed">
<?php endif; ?>

<div class="js_feed_comment_border">
	

<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_border')) ? eval($sPlugin) : false); ?>
<?php (($sPlugin = Phpfox_Plugin::get('core.template_block_comment_border_new')) ? eval($sPlugin) : false); ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
			<div class="feed_share_custom">	
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_facebook_like')): ?>
				<div class="feed_share_custom_block">
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href=<?php echo $this->_aVars['aFeed']['feed_link']; ?>&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>					
				</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_twitter_link')): ?>
				<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" data-count="horizontal" data-via="<?php echo Phpfox::getParam('feed.twitter_share_via'); ?>"><?php echo Phpfox::getPhrase('feed.tweet'); ?></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_google_plus_one')): ?>
				<div class="feed_share_custom_block">
					<g:plusone href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" size="medium"></g:plusone>
					<?php echo '
					<script type="text/javascript">
					  (function() {
						var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
						po.src = \'https://apis.google.com/js/plusone.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					'; ?>

				</div>
<?php endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
			
			<ul>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_icon'] )): ?>
				<li><img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" /></li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['time_stamp'] )): ?>
				<li class="feed_entry_time_stamp">				
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a><?php if (! empty ( $this->_aVars['aFeed']['app_link'] )): ?> via <?php echo $this->_aVars['aFeed']['app_link'];  endif; ?>
				</li>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if ($this->_aVars['aFeed']['privacy'] > 0 && ( $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId() || Phpfox ::getUserParam('core.can_view_private_items'))): ?>
				<li><div class="js_hover_title"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/privacy_icon.png','alt' => $this->_aVars['aFeed']['privacy'])); ?><span class="js_hover_info"><?php echo Phpfox::getService('privacy')->getPhrase($this->_aVars['aFeed']['privacy']); ?></span></div></li>	
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::isUser() && Phpfox ::isModule('like') && isset ( $this->_aVars['aFeed']['like_type_id'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>add-comment/" class="<?php if (( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )):  else: ?>js_feed_entry_add_comment no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase('feed.comment'); ?></a>
				</li>				
<?php if (( Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) ) || ( isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] ) )): ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] )): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] )): ?>
				<li><span>&middot;</span></li>
				<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo Phpfox::getPhrase('feed.report'); ?></a></li>				
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>
			</ul>
			<div class="clear"></div>		
<?php endif; ?>

<div class="comment_mini_content_holder"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && $this->_aVars['aFeed']['can_post_comment']):  else:  if (isset ( $this->_aVars['aFeed']['likes'] ) || ( isset ( $this->_aVars['aFeed']['total_comment'] ) && $this->_aVars['aFeed']['total_comment'] > 0 )):  else:  if (( ( isset ( $this->_aVars['aFeed']['comments'] ) && ! count ( $this->_aVars['aFeed']['comments'] ) ) || ! isset ( $this->_aVars['aFeed']['comments'] ) )): ?> style="display:none;"<?php endif;  endif;  endif; ?>>	
	<div class="comment_mini_content_holder_icon"></div>
	<div class="comment_mini_content_border">						
		<div class="js_comment_like_holder" id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
			<div id="js_like_body_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (isset ( $this->_aVars['aFeed']['likes'] ) && is_array ( $this->_aVars['aFeed']['likes'] )): ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<div class="activity_like_holder comment_mini"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/like.png','class' => 'v_middle')); ?>&nbsp;<?php if ($this->_aVars['aFeed']['feed_is_liked']): ?> <?php if (! count ( $this->_aVars['aFeed']['likes'] ) == 1):  echo Phpfox::getPhrase('like.you');  elseif (count ( $this->_aVars['aFeed']['likes'] ) == 1):  echo Phpfox::getPhrase('like.you_and'); ?>&nbsp;<?php else:  echo Phpfox::getPhrase('like.you_comma'); ?> <?php endif;  else:  echo Phpfox::getPhrase('like.article_to_upper');  endif;  if (count((array)$this->_aVars['aFeed']['likes'])):  $this->_aPhpfoxVars['iteration']['likes'] = 0;  foreach ((array) $this->_aVars['aFeed']['likes'] as $this->_aVars['aLikeRow']):  $this->_aPhpfoxVars['iteration']['likes']++;  if ($this->_aVars['aFeed']['feed_is_liked'] || $this->_aPhpfoxVars['iteration']['likes'] > 1):  echo Phpfox::getPhrase('like.article_to_lower');  endif;  echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aLikeRow']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aLikeRow']['user_name'], ((empty($this->_aVars['aLikeRow']['user_name']) && isset($this->_aVars['aLikeRow']['profile_page_id'])) ? $this->_aVars['aLikeRow']['profile_page_id'] : null))) . '">' . $this->_aVars['aLikeRow']['full_name'] . '</a></span>';  if ($this->_aPhpfoxVars['iteration']['likes'] == ( count ( $this->_aVars['aFeed']['likes'] ) - 1 ) && $this->_aVars['aFeed']['feed_total_like'] <= Phpfox ::getParam('feed.total_likes_to_display')): ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php elseif ($this->_aPhpfoxVars['iteration']['likes'] != count ( $this->_aVars['aFeed']['likes'] )): ?>,&nbsp;<?php endif;  endforeach; endif;  if ($this->_aVars['aFeed']['feed_total_like'] > Phpfox ::getParam('feed.total_likes_to_display')): ?><a href="#" onclick="return $Core.box('like.browse', 400, 'type_id=<?php echo $this->_aVars['aFeed']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aFeed']['item_id']; ?>');"><?php if ($this->_aVars['iTotalLeftShow'] = ( $this->_aVars['aFeed']['feed_total_like'] - Phpfox ::getParam('feed.total_likes_to_display'))):  endif;  if ($this->_aVars['iTotalLeftShow'] == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php echo Phpfox::getPhrase('like.1_other_person'); ?>&nbsp;<?php else: ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php echo number_format($this->_aVars['iTotalLeftShow']); ?>&nbsp;<?php echo Phpfox::getPhrase('like.others'); ?>&nbsp;<?php endif; ?></a><?php echo Phpfox::getPhrase('like.likes_this');  else:  if (( count ( $this->_aVars['aFeed']['likes'] ) > 1 )): ?>&nbsp;<?php echo Phpfox::getPhrase('like.like_this');  else:  if ($this->_aVars['aFeed']['feed_is_liked']):  if (count ( $this->_aVars['aFeed']['likes'] ) == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.like_this');  else:  if (count ( $this->_aVars['aFeed']['likes'] ) == 0): ?>&nbsp;<?php echo Phpfox::getPhrase('like.you_like');  else:  echo Phpfox::getPhrase('like.likes_this');  endif;  endif;  else:  if (count ( $this->_aVars['aFeed']['likes'] ) == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.likes_this');  else:  echo Phpfox::getPhrase('like.like_this');  endif;  endif;  endif;  endif; ?></div>
<?php endif; ?>
			</div>
		</div><!-- // #js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
					
<?php if (Phpfox ::isModule('comment') && Phpfox ::getParam('feed.allow_comments_on_feeds')): ?>
		<div id="js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
		
<?php else: ?>
<?php if (isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) && ( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ? $this->_aVars['aFeed']['total_comment'] > 0 : $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.total_comments_in_activity_feed'))): ?>
			<div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				<div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				</div>
				<div class="comment_mini_link_loader" id="js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" style="display:none;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'v_middle')); ?></div>
				<div class="comment_mini_link">
					<a href="#" class="comment_mini_link_block comment_mini_link_block_hidden" style="display:none;" onclick="return false;"><?php echo Phpfox::getPhrase('feed.loading'); ?></a>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>comment/"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'):  else:  if (Phpfox ::getParam('comment.total_amount_of_comments_to_load') > $this->_aVars['aFeed']['total_comment']): ?>onclick="$('#js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>').show(); $(this).parent().find('.comment_mini_link_block_hidden').show(); $(this).hide(); $.ajaxCall('comment.viewMoreFeed', 'comment_type_id=<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aFeed']['item_id']; ?>&amp;feed_id=<?php echo $this->_aVars['aFeed']['feed_id']; ?>', 'GET'); return false;"<?php endif;  endif; ?> class="comment_mini_link_block no_ajax_link"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				</div>
			</div><!-- // #js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['total_comment'] ) && ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['total_comment'] > 0): ?>
			<div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				<div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				</div>	
				<div class="comment_mini_link">	
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>comment/" class="comment_mini_link_block"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				</div>
			</div>
<?php endif; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['comments'] ) && count ( $this->_aVars['aFeed']['comments'] )): ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.comment_page_limit')): ?>
			<div class="comment_mini" id="js_feed_comment_pager_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
			</div>
<?php endif; ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php Phpfox::getLib('parse.output')->setImageParser(array('width' => 200,'height' => 200)); ?>
<?php if (count((array)$this->_aVars['aFeed']['comments'])):  $this->_aPhpfoxVars['iteration']['comments'] = 0;  foreach ((array) $this->_aVars['aFeed']['comments'] as $this->_aVars['aComment']):  $this->_aPhpfoxVars['iteration']['comments']++; ?>

				<?php /* Cached: July 30, 2012, 9:12 am */  
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: mini.html.php 3738 2011-12-09 08:24:32Z Raymond_Benc $
 */
 
 

?>
	<div id="js_comment_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="js_mini_feed_comment comment_mini js_mini_comment_item_<?php echo $this->_aVars['aComment']['item_id']; ?>">
<?php if (( Phpfox ::getUserParam('comment.delete_own_comment') && Phpfox ::getUserId() == $this->_aVars['aComment']['user_id'] ) || Phpfox ::getUserParam('comment.delete_user_comment') || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('comment.can_delete_comments_posted_on_own_profile')) || ( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getService('pages')->isAdmin('' . $this->_aVars['aPage']['page_id'] . '' ) )): ?>
		<div class="feed_comment_delete_link"><a href="#" class="action_delete js_hover_title" onclick="$.ajaxCall('comment.InlineDelete', 'type_id=<?php echo $this->_aVars['aComment']['type_id']; ?>&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>', 'GET'); return false;"><span class="js_hover_info"><?php echo Phpfox::getPhrase('comment.delete_this_comment'); ?></span></a></div>
<?php endif; ?>
		<div class="comment_mini_image">
<?php if (Phpfox ::isMobile()): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aComment'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32)); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aComment'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32)); ?>
<?php endif; ?>
		</div>
		<div class="comment_mini_content">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aComment']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aComment']['user_name'], ((empty($this->_aVars['aComment']['user_name']) && isset($this->_aVars['aComment']['profile_page_id'])) ? $this->_aVars['aComment']['profile_page_id'] : null))) . '">' . $this->_aVars['aComment']['full_name'] . '</a></span>'; ?><div id="js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="comment_mini_text <?php if ($this->_aVars['aComment']['view_id'] == '1'): ?>row_moderate<?php endif; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aComment']['text']), '300', 'comment.view_more', true), 30); ?></div>
			<div class="comment_mini_action">
				<ul>
					<li class="comment_mini_entry_time_stamp"><?php echo $this->_aVars['aComment']['post_convert_time']; ?></li>
					<li><span>&middot;</span></li>
<?php if (! Phpfox ::isMobile()): ?>
<?php if (( Phpfox ::getUserParam('comment.edit_own_comment') && Phpfox ::getUserId() == $this->_aVars['aComment']['user_id'] ) || Phpfox ::getUserParam('comment.edit_user_comment')): ?>
					<li>
						<a href="inline#?type=text&amp;&amp;simple=true&amp;id=js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;call=comment.updateText&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;data=comment.getText" class="quickEdit"><?php echo Phpfox::getPhrase('comment.edit'); ?></a>
					</li>
					<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::getParam('comment.comment_is_threaded')): ?>
<?php if (( isset ( $this->_aVars['aComment']['iteration'] ) && $this->_aVars['aComment']['iteration'] >= Phpfox ::getParam('comment.total_child_comments')) || isset ( $this->_aVars['bForceNoReply'] )): ?>
					
<?php else: ?>
					<li><a href="#" class="js_comment_feed_new_reply" rel="<?php echo $this->_aVars['aComment']['comment_id']; ?>"><?php echo Phpfox::getPhrase('comment.reply'); ?></a></li>
					<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php Phpfox::getBlock('like.link', array('like_type_id' => 'feed_mini','like_item_id' => $this->_aVars['aComment']['comment_id'],'like_is_liked' => $this->_aVars['aComment']['is_liked'],'like_is_custom' => true)); ?>
					<li class="js_like_link_holder"<?php if ($this->_aVars['aComment']['total_like'] == 0): ?> style="display:none;"<?php endif; ?>><span>&middot;</span></li>
					<li class="js_like_link_holder"<?php if ($this->_aVars['aComment']['total_like'] == 0): ?> style="display:none;"<?php endif; ?>><a href="#" onclick="return $Core.box('like.browse', 400, 'type_id=feed_mini&amp;item_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>');"><span class="js_like_link_holder_info"><?php if ($this->_aVars['aComment']['total_like'] == 1):  echo Phpfox::getPhrase('comment.1_person');  else:  echo Phpfox::getPhrase('comment.total_people', array('total' => number_format($this->_aVars['aComment']['total_like'])));  endif; ?></span></a></li>
					
<?php if (Phpfox ::getUserParam('comment.can_moderate_comments') && $this->_aVars['aComment']['view_id'] == '1'): ?>
					<li>
						<a href="#" onclick="$('#js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>').removeClass('row_moderate'); $(this).remove(); $.ajaxCall('comment.moderateSpam', 'id=<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;action=approve&amp;inacp=0'); return false;"><?php echo Phpfox::getPhrase('comment.approve'); ?></a>					
					</li>					
<?php endif; ?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		
		<div id="js_comment_form_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="js_comment_form_holder"></div>

		<div class="comment_mini_child_holder<?php if (isset ( $this->_aVars['aComment']['children'] ) && $this->_aVars['aComment']['children']['total'] > 0): ?> comment_mini_child_holder_padding<?php endif; ?>">
<?php if (isset ( $this->_aVars['aComment']['children'] ) && $this->_aVars['aComment']['children']['total'] > 0): ?>
			<div class="comment_mini_child_view_holder" id="comment_mini_child_view_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>">
				<a href="#" onclick="$.ajaxCall('comment.viewAllComments', 'comment_type_id=<?php echo $this->_aVars['aComment']['type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aComment']['item_id']; ?>&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('comment.view_total_more', array('total' => number_format($this->_aVars['aComment']['children']['total']))); ?></a>
			</div>
<?php endif; ?>

			<div id="js_comment_children_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="comment_mini_child_content">
<?php if (isset ( $this->_aVars['aComment']['children'] ) && count ( $this->_aVars['aComment']['children']['comments'] )): ?>
<?php if (count((array)$this->_aVars['aComment']['children']['comments'])):  foreach ((array) $this->_aVars['aComment']['children']['comments'] as $this->_aVars['aCommentChild']): ?>
<?php Phpfox::getBlock('comment.mini', array('comment_custom' => $this->_aVars['aCommentChild'])); ?>
<?php endforeach; endif; ?>
<?php endif; ?>
			</div>
		</div>		
		
	</div>
<?php endforeach; endif; ?>
<?php Phpfox::getLib('parse.output')->setImageParser(array('clear' => true)); ?>
			</div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php else: ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"></div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
		</div><!-- // #js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php endif; ?>
		
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'): ?>
		
<?php else: ?>
<?php if (Phpfox ::isModule('comment') && isset ( $this->_aVars['aFeed']['comment_type_id'] ) && Phpfox ::getParam('feed.allow_comments_on_feeds') && Phpfox ::isUser() && $this->_aVars['aFeed']['can_post_comment']): ?>
		<div class="js_feed_comment_form" <?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> id="js_feed_comment_form_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"<?php endif; ?>>
			<div class="js_comment_feed_textarea_browse"></div>
			<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> feed_item_view<?php endif; ?> comment_mini comment_mini_end">
				<form method="post" action="#" class="js_comment_feed_form">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div><input type="hidden" name="val[type]" value="<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>" /></div>			
					<div><input type="hidden" name="val[item_id]" value="<?php echo $this->_aVars['aFeed']['item_id']; ?>" /></div>
					<div><input type="hidden" name="val[parent_id]" value="0" class="js_feed_comment_parent_id" /></div>
					<div><input type="hidden" name="val[is_via_feed]" value="<?php echo $this->_aVars['aFeed']['feed_id']; ?>" /></div>
<?php if (Phpfox ::isUser()): ?>
					<div class="comment_mini_image"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> <?php else: ?>style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => '32','max_height' => '32')); ?>
					</div>				
<?php endif; ?>
					<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>comment_mini_content <?php endif; ?>comment_mini_textarea_holder">						
						<div class="js_comment_feed_value"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></div>
						<textarea cols="60" rows="4" name="val[text]" class="js_comment_feed_textarea" id="js_feed_comment_form_textarea_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></textarea>
						<div class="js_feed_comment_process_form"><?php echo Phpfox::getPhrase('feed.adding_your_comment');  echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>
					</div>
					<div class="feed_comment_buttons_wrap">
						<div class="js_feed_add_comment_button t_right">
							<input type="submit" value="<?php echo Phpfox::getPhrase('feed.comment'); ?>" class="button" />									
						</div>								
					</div>			
				
</form>

			</div>
		</div>
<?php endif; ?>
<?php endif; ?>
		
	</div><!-- // .comment_mini_content_border -->
</div><!-- // .comment_mini_content_holder -->

</div>
<?php if (Phpfox ::isModule('report') && isset ( $this->_aVars['aFeed']['report_module'] ) && $this->_aVars['sFeedType'] != 'mini'): ?>
<div class="report_this_item">
	<a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="item_bar_flag inlinePopup" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo $this->_aVars['aFeed']['report_phrase']; ?></a>
</div>
<?php endif;  if (isset ( $this->_aVars['sFeedType'] )): ?>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_aVars['aFeed']['type_id'] != 'friend'): ?>
<?php if (isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if ($this->_aVars['iTotalExtraFeedsToShow'] = count ( $this->_aVars['aFeed']['more_feed_rows'] )):  endif; ?>
		<a href="#" class="activity_feed_content_view_more" onclick="$(this).parents('.js_feed_view_more_entry_holder:first').find('.js_feed_view_more_entry').show(); $(this).remove(); return false;"><?php echo Phpfox::getPhrase('feed.see_total_more_posts_from_full_name', array('total' => $this->_aVars['iTotalExtraFeedsToShow'],'full_name' => Phpfox::getService('user')->getFirstname($this->_aVars['aFeed']['full_name']))); ?></a>			
<?php endif; ?>
<?php endif; ?>
	</div><!-- // .activity_feed_content -->
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_3')) ? eval($sPlugin) : false); ?>
</div><!-- // #js_item_feed_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php if (isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aFeed']['more_feed_rows'] as $this->_aVars['aFeed']): ?>
<?php if ($this->_aVars['bChildFeed'] = true):  endif; ?>
		<div class="js_feed_view_more_entry" style="display:none;">
			<?php /* Cached: July 30, 2012, 9:12 am */  
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: entry.html.php 3700 2011-12-07 07:53:15Z Raymond_Benc $
 */
 
 

?>
<div class="row_feed_loop js_parent_feed_entry <?php if (isset ( $this->_aVars['aFeed']['feed_mini'] )): ?> row_mini <?php else:  if (isset ( $this->_aVars['bChildFeed'] )): ?> row1<?php else:  if (isset ( $this->_aPhpfoxVars['iteration']['iFeed'] )):  if (is_int ( $this->_aPhpfoxVars['iteration']['iFeed'] / 2 )): ?>row1<?php else: ?>row2<?php endif;  if ($this->_aPhpfoxVars['iteration']['iFeed'] == 1 && ! PHPFOX_IS_AJAX): ?> row_first<?php endif;  else: ?>row1<?php endif;  endif;  endif; ?> js_user_feed" id="js_item_feed_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (! Phpfox ::isMobile() && ( ( defined ( 'PHPFOX_FEED_CAN_DELETE' ) ) || ( Phpfox ::getUserParam('feed.can_delete_own_feed') && $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('feed.can_delete_other_feeds'))): ?>
	<div class="feed_delete_link"><a href="#" class="action_delete js_hover_title" onclick="$.ajaxCall('feed.delete', 'id=<?php echo $this->_aVars['aFeed']['feed_id'];  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&amp;module=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&amp;item=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>', 'GET'); return false;"><span class="js_hover_info"><?php echo Phpfox::getPhrase('feed.delete_this_feed'); ?></span></a></div>
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_1')) ? eval($sPlugin) : false); ?>
	<div class="activity_feed_image">	
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['is_custom_app'] ) && $this->_aVars['aFeed']['is_custom_app']): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('server_id' => 0,'path' => 'app.url_image','file' => $this->_aVars['aFeed']['app_image_path'],'suffix' => '_square','max_width' => 50,'max_height' => 50)); ?>
<?php else: ?>
<?php if (isset ( $this->_aVars['aFeed']['user_name'] ) && ! empty ( $this->_aVars['aFeed']['user_name'] )): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFeed'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50)); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFeed'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50,'href' => '')); ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
	</div><!-- // .activity_feed_image -->
	<div class="activity_feed_content">
		<div class="activity_feed_content_text">						
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
			<div class="activity_feed_content_info"><?php echo Phpfox::getLib('phpfox.parse.output')->split('<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['user_name'], ((empty($this->_aVars['aFeed']['user_name']) && isset($this->_aVars['aFeed']['profile_page_id'])) ? $this->_aVars['aFeed']['profile_page_id'] : null))) . '">' . $this->_aVars['aFeed']['full_name'] . '</a></span>', 50);  if (isset ( $this->_aVars['aFeed']['parent_user'] )): ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/arrow.png','class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFeed']['parent_user']['parent_user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFeed']['parent_user']['parent_user_name'], ((empty($this->_aVars['aFeed']['parent_user']['parent_user_name']) && isset($this->_aVars['aFeed']['parent_user']['parent_profile_page_id'])) ? $this->_aVars['aFeed']['parent_user']['parent_profile_page_id'] : null))) . '">' . $this->_aVars['aFeed']['parent_user']['parent_full_name'] . '</a></span>'; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_info'] )): ?> <?php echo $this->_aVars['aFeed']['feed_info'];  endif; ?></div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_mini_content'] )): ?>
			<div class="activity_feed_content_status">
				<div class="activity_feed_content_status_left">
					<img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" class="v_middle" /> <?php echo $this->_aVars['aFeed']['feed_mini_content']; ?> 
				</div>
				<div class="activity_feed_content_status_right">
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
			<div class="feed_share_custom">	
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_facebook_like')): ?>
				<div class="feed_share_custom_block">
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href=<?php echo $this->_aVars['aFeed']['feed_link']; ?>&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>					
				</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_twitter_link')): ?>
				<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" data-count="horizontal" data-via="<?php echo Phpfox::getParam('feed.twitter_share_via'); ?>"><?php echo Phpfox::getPhrase('feed.tweet'); ?></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_google_plus_one')): ?>
				<div class="feed_share_custom_block">
					<g:plusone href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" size="medium"></g:plusone>
					<?php echo '
					<script type="text/javascript">
					  (function() {
						var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
						po.src = \'https://apis.google.com/js/plusone.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					'; ?>

				</div>
<?php endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
			
			<ul>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_icon'] )): ?>
				<li><img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" /></li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['time_stamp'] )): ?>
				<li class="feed_entry_time_stamp">				
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a><?php if (! empty ( $this->_aVars['aFeed']['app_link'] )): ?> via <?php echo $this->_aVars['aFeed']['app_link'];  endif; ?>
				</li>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if ($this->_aVars['aFeed']['privacy'] > 0 && ( $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId() || Phpfox ::getUserParam('core.can_view_private_items'))): ?>
				<li><div class="js_hover_title"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/privacy_icon.png','alt' => $this->_aVars['aFeed']['privacy'])); ?><span class="js_hover_info"><?php echo Phpfox::getService('privacy')->getPhrase($this->_aVars['aFeed']['privacy']); ?></span></div></li>	
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::isUser() && Phpfox ::isModule('like') && isset ( $this->_aVars['aFeed']['like_type_id'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>add-comment/" class="<?php if (( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )):  else: ?>js_feed_entry_add_comment no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase('feed.comment'); ?></a>
				</li>				
<?php if (( Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) ) || ( isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] ) )): ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] )): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] )): ?>
				<li><span>&middot;</span></li>
				<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo Phpfox::getPhrase('feed.report'); ?></a></li>				
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>
			</ul>
			<div class="clear"></div>		
				</div>
				<div class="clear"></div>
			</div>
<?php endif; ?>

<?php if (! empty ( $this->_aVars['aFeed']['feed_status'] )): ?>
			<div class="activity_feed_content_status">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_status']), 200, 'feed.view_more', true), 55); ?>
			</div>
<?php endif; ?>
			
			<div class="activity_feed_content_link">
				
<?php if ($this->_aVars['aFeed']['type_id'] == 'friend' && isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aFeed']['more_feed_rows'] as $this->_aVars['aFriends']): ?>
<?php echo $this->_aVars['aFriends']['feed_image']; ?>
<?php endforeach; endif; ?>
<?php echo $this->_aVars['aFeed']['feed_image']; ?>
<?php else: ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
				<div class="activity_feed_content_image"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="width:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (is_array ( $this->_aVars['aFeed']['feed_image'] )): ?>
						<ul class="activity_feed_multiple_image">
<?php if (count((array)$this->_aVars['aFeed']['feed_image'])):  foreach ((array) $this->_aVars['aFeed']['feed_image'] as $this->_aVars['sFeedImage']): ?>
								<li><?php echo $this->_aVars['sFeedImage']; ?></li>
<?php endforeach; endif; ?>
						</ul>
						<div class="clear"></div>
<?php else: ?>
						<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="<?php if (isset ( $this->_aVars['aFeed']['custom_css'] )): ?> <?php echo $this->_aVars['aFeed']['custom_css']; ?> <?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?>play_link <?php endif; ?> no_ajax_link<?php endif; ?>"<?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )): ?> onclick="<?php echo $this->_aVars['aFeed']['feed_image_onclick']; ?>"<?php endif;  if (! empty ( $this->_aVars['aFeed']['custom_rel'] )): ?> rel="<?php echo $this->_aVars['aFeed']['custom_rel']; ?>"<?php endif;  if (isset ( $this->_aVars['aFeed']['custom_js'] )): ?> <?php echo $this->_aVars['aFeed']['custom_js']; ?> <?php endif; ?>><?php if (! empty ( $this->_aVars['aFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aFeed']['feed_image_onclick_no_image'] )): ?><span class="play_link_img"><?php echo Phpfox::getPhrase('feed.play'); ?></span><?php endif;  endif;  echo $this->_aVars['aFeed']['feed_image']; ?></a>
<?php endif; ?>
				</div>
<?php endif; ?>
				<div class="<?php if (( ! empty ( $this->_aVars['aFeed']['feed_content'] ) || ! empty ( $this->_aVars['aFeed']['feed_custom_html'] ) ) && empty ( $this->_aVars['aFeed']['feed_image'] )): ?> activity_feed_content_no_image<?php endif;  if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?> activity_feed_content_float<?php endif; ?>"<?php if (isset ( $this->_aVars['aFeed']['feed_custom_width'] )): ?> style="margin-left:<?php echo $this->_aVars['aFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title'] )): ?>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="activity_feed_content_link_title"<?php if (isset ( $this->_aVars['aFeed']['feed_title_extra_link'] )): ?> target="_blank"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title']), 30); ?></a>
<?php if (! empty ( $this->_aVars['aFeed']['feed_title_extra'] )): ?>
					<div class="activity_feed_content_link_title_link">
						<a href="<?php echo $this->_aVars['aFeed']['feed_title_extra_link']; ?>" target="_blank"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aFeed']['feed_title_extra']); ?></a>
					</div>
<?php endif; ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_content'] )): ?>
					<div class="activity_feed_content_display">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aFeed']['feed_content']), 200, '...'), 55); ?>
					</div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_custom_html'] )): ?>
					<div class="activity_feed_content_display_custom">
<?php echo $this->_aVars['aFeed']['feed_custom_html']; ?>
					</div>
<?php endif; ?>
				</div>	
<?php if (! empty ( $this->_aVars['aFeed']['feed_image'] )): ?>
				<div class="clear"></div>
<?php endif; ?>
<?php endif; ?>
			</div>
		</div><!-- // .activity_feed_content_text -->		

<?php if (isset ( $this->_aVars['aFeed']['feed_view_comment'] )): ?>
<?php Phpfox::getBlock('feed.comment', array()); ?>
<?php else: ?>
<?php /* Cached: July 30, 2012, 9:12 am */  if (isset ( $this->_aVars['bIsViewingComments'] ) && $this->_aVars['bIsViewingComments']): ?>
<div id="comment-view"><a name="#comment-view"></a></div>
<div class="message js_feed_comment_border">
<?php echo Phpfox::getPhrase('comment.viewing_a_single_comment'); ?> <a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>"><?php echo Phpfox::getPhrase('comment.view_all_comments'); ?></a>
</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['sFeedType'] )): ?>
<div class="js_parent_feed_entry parent_item_feed">
<?php endif; ?>

<div class="js_feed_comment_border">
	

<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_border')) ? eval($sPlugin) : false); ?>
<?php (($sPlugin = Phpfox_Plugin::get('core.template_block_comment_border_new')) ? eval($sPlugin) : false); ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
			<div class="feed_share_custom">	
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_facebook_like')): ?>
				<div class="feed_share_custom_block">
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href=<?php echo $this->_aVars['aFeed']['feed_link']; ?>&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>					
				</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_twitter_link')): ?>
				<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" data-count="horizontal" data-via="<?php echo Phpfox::getParam('feed.twitter_share_via'); ?>"><?php echo Phpfox::getPhrase('feed.tweet'); ?></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_google_plus_one')): ?>
				<div class="feed_share_custom_block">
					<g:plusone href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" size="medium"></g:plusone>
					<?php echo '
					<script type="text/javascript">
					  (function() {
						var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
						po.src = \'https://apis.google.com/js/plusone.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					'; ?>

				</div>
<?php endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
			
			<ul>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_icon'] )): ?>
				<li><img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" /></li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['time_stamp'] )): ?>
				<li class="feed_entry_time_stamp">				
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a><?php if (! empty ( $this->_aVars['aFeed']['app_link'] )): ?> via <?php echo $this->_aVars['aFeed']['app_link'];  endif; ?>
				</li>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if ($this->_aVars['aFeed']['privacy'] > 0 && ( $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId() || Phpfox ::getUserParam('core.can_view_private_items'))): ?>
				<li><div class="js_hover_title"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/privacy_icon.png','alt' => $this->_aVars['aFeed']['privacy'])); ?><span class="js_hover_info"><?php echo Phpfox::getService('privacy')->getPhrase($this->_aVars['aFeed']['privacy']); ?></span></div></li>	
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::isUser() && Phpfox ::isModule('like') && isset ( $this->_aVars['aFeed']['like_type_id'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>add-comment/" class="<?php if (( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )):  else: ?>js_feed_entry_add_comment no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase('feed.comment'); ?></a>
				</li>				
<?php if (( Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) ) || ( isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] ) )): ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] )): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] )): ?>
				<li><span>&middot;</span></li>
				<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo Phpfox::getPhrase('feed.report'); ?></a></li>				
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>
			</ul>
			<div class="clear"></div>		
<?php endif; ?>

<div class="comment_mini_content_holder"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && $this->_aVars['aFeed']['can_post_comment']):  else:  if (isset ( $this->_aVars['aFeed']['likes'] ) || ( isset ( $this->_aVars['aFeed']['total_comment'] ) && $this->_aVars['aFeed']['total_comment'] > 0 )):  else:  if (( ( isset ( $this->_aVars['aFeed']['comments'] ) && ! count ( $this->_aVars['aFeed']['comments'] ) ) || ! isset ( $this->_aVars['aFeed']['comments'] ) )): ?> style="display:none;"<?php endif;  endif;  endif; ?>>	
	<div class="comment_mini_content_holder_icon"></div>
	<div class="comment_mini_content_border">						
		<div class="js_comment_like_holder" id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
			<div id="js_like_body_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (isset ( $this->_aVars['aFeed']['likes'] ) && is_array ( $this->_aVars['aFeed']['likes'] )): ?>
<?php /* Cached: July 30, 2012, 9:12 am */ ?>
<div class="activity_like_holder comment_mini"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/like.png','class' => 'v_middle')); ?>&nbsp;<?php if ($this->_aVars['aFeed']['feed_is_liked']): ?> <?php if (! count ( $this->_aVars['aFeed']['likes'] ) == 1):  echo Phpfox::getPhrase('like.you');  elseif (count ( $this->_aVars['aFeed']['likes'] ) == 1):  echo Phpfox::getPhrase('like.you_and'); ?>&nbsp;<?php else:  echo Phpfox::getPhrase('like.you_comma'); ?> <?php endif;  else:  echo Phpfox::getPhrase('like.article_to_upper');  endif;  if (count((array)$this->_aVars['aFeed']['likes'])):  $this->_aPhpfoxVars['iteration']['likes'] = 0;  foreach ((array) $this->_aVars['aFeed']['likes'] as $this->_aVars['aLikeRow']):  $this->_aPhpfoxVars['iteration']['likes']++;  if ($this->_aVars['aFeed']['feed_is_liked'] || $this->_aPhpfoxVars['iteration']['likes'] > 1):  echo Phpfox::getPhrase('like.article_to_lower');  endif;  echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aLikeRow']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aLikeRow']['user_name'], ((empty($this->_aVars['aLikeRow']['user_name']) && isset($this->_aVars['aLikeRow']['profile_page_id'])) ? $this->_aVars['aLikeRow']['profile_page_id'] : null))) . '">' . $this->_aVars['aLikeRow']['full_name'] . '</a></span>';  if ($this->_aPhpfoxVars['iteration']['likes'] == ( count ( $this->_aVars['aFeed']['likes'] ) - 1 ) && $this->_aVars['aFeed']['feed_total_like'] <= Phpfox ::getParam('feed.total_likes_to_display')): ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php elseif ($this->_aPhpfoxVars['iteration']['likes'] != count ( $this->_aVars['aFeed']['likes'] )): ?>,&nbsp;<?php endif;  endforeach; endif;  if ($this->_aVars['aFeed']['feed_total_like'] > Phpfox ::getParam('feed.total_likes_to_display')): ?><a href="#" onclick="return $Core.box('like.browse', 400, 'type_id=<?php echo $this->_aVars['aFeed']['like_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aFeed']['item_id']; ?>');"><?php if ($this->_aVars['iTotalLeftShow'] = ( $this->_aVars['aFeed']['feed_total_like'] - Phpfox ::getParam('feed.total_likes_to_display'))):  endif;  if ($this->_aVars['iTotalLeftShow'] == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php echo Phpfox::getPhrase('like.1_other_person'); ?>&nbsp;<?php else: ?>&nbsp;<?php echo Phpfox::getPhrase('like.and'); ?>&nbsp;<?php echo number_format($this->_aVars['iTotalLeftShow']); ?>&nbsp;<?php echo Phpfox::getPhrase('like.others'); ?>&nbsp;<?php endif; ?></a><?php echo Phpfox::getPhrase('like.likes_this');  else:  if (( count ( $this->_aVars['aFeed']['likes'] ) > 1 )): ?>&nbsp;<?php echo Phpfox::getPhrase('like.like_this');  else:  if ($this->_aVars['aFeed']['feed_is_liked']):  if (count ( $this->_aVars['aFeed']['likes'] ) == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.like_this');  else:  if (count ( $this->_aVars['aFeed']['likes'] ) == 0): ?>&nbsp;<?php echo Phpfox::getPhrase('like.you_like');  else:  echo Phpfox::getPhrase('like.likes_this');  endif;  endif;  else:  if (count ( $this->_aVars['aFeed']['likes'] ) == 1): ?>&nbsp;<?php echo Phpfox::getPhrase('like.likes_this');  else:  echo Phpfox::getPhrase('like.like_this');  endif;  endif;  endif;  endif; ?></div>
<?php endif; ?>
			</div>
		</div><!-- // #js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
					
<?php if (Phpfox ::isModule('comment') && Phpfox ::getParam('feed.allow_comments_on_feeds')): ?>
		<div id="js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
		
<?php else: ?>
<?php if (isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) && ( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ? $this->_aVars['aFeed']['total_comment'] > 0 : $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.total_comments_in_activity_feed'))): ?>
			<div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				<div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				</div>
				<div class="comment_mini_link_loader" id="js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" style="display:none;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'v_middle')); ?></div>
				<div class="comment_mini_link">
					<a href="#" class="comment_mini_link_block comment_mini_link_block_hidden" style="display:none;" onclick="return false;"><?php echo Phpfox::getPhrase('feed.loading'); ?></a>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>comment/"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'):  else:  if (Phpfox ::getParam('comment.total_amount_of_comments_to_load') > $this->_aVars['aFeed']['total_comment']): ?>onclick="$('#js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>').show(); $(this).parent().find('.comment_mini_link_block_hidden').show(); $(this).hide(); $.ajaxCall('comment.viewMoreFeed', 'comment_type_id=<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aFeed']['item_id']; ?>&amp;feed_id=<?php echo $this->_aVars['aFeed']['feed_id']; ?>', 'GET'); return false;"<?php endif;  endif; ?> class="comment_mini_link_block no_ajax_link"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				</div>
			</div><!-- // #js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['total_comment'] ) && ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['total_comment'] > 0): ?>
			<div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				<div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				</div>	
				<div class="comment_mini_link">	
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>comment/" class="comment_mini_link_block"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				</div>
			</div>
<?php endif; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['comments'] ) && count ( $this->_aVars['aFeed']['comments'] )): ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.comment_page_limit')): ?>
			<div class="comment_mini" id="js_feed_comment_pager_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
			</div>
<?php endif; ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php Phpfox::getLib('parse.output')->setImageParser(array('width' => 200,'height' => 200)); ?>
<?php if (count((array)$this->_aVars['aFeed']['comments'])):  $this->_aPhpfoxVars['iteration']['comments'] = 0;  foreach ((array) $this->_aVars['aFeed']['comments'] as $this->_aVars['aComment']):  $this->_aPhpfoxVars['iteration']['comments']++; ?>

				<?php /* Cached: July 30, 2012, 9:12 am */  
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: mini.html.php 3738 2011-12-09 08:24:32Z Raymond_Benc $
 */
 
 

?>
	<div id="js_comment_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="js_mini_feed_comment comment_mini js_mini_comment_item_<?php echo $this->_aVars['aComment']['item_id']; ?>">
<?php if (( Phpfox ::getUserParam('comment.delete_own_comment') && Phpfox ::getUserId() == $this->_aVars['aComment']['user_id'] ) || Phpfox ::getUserParam('comment.delete_user_comment') || ( defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId() && Phpfox ::getUserParam('comment.can_delete_comments_posted_on_own_profile')) || ( defined ( 'PHPFOX_IS_PAGES_VIEW' ) && Phpfox ::getService('pages')->isAdmin('' . $this->_aVars['aPage']['page_id'] . '' ) )): ?>
		<div class="feed_comment_delete_link"><a href="#" class="action_delete js_hover_title" onclick="$.ajaxCall('comment.InlineDelete', 'type_id=<?php echo $this->_aVars['aComment']['type_id']; ?>&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>', 'GET'); return false;"><span class="js_hover_info"><?php echo Phpfox::getPhrase('comment.delete_this_comment'); ?></span></a></div>
<?php endif; ?>
		<div class="comment_mini_image">
<?php if (Phpfox ::isMobile()): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aComment'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32)); ?>
<?php else: ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aComment'],'suffix' => '_50_square','max_width' => 32,'max_height' => 32)); ?>
<?php endif; ?>
		</div>
		<div class="comment_mini_content">
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aComment']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aComment']['user_name'], ((empty($this->_aVars['aComment']['user_name']) && isset($this->_aVars['aComment']['profile_page_id'])) ? $this->_aVars['aComment']['profile_page_id'] : null))) . '">' . $this->_aVars['aComment']['full_name'] . '</a></span>'; ?><div id="js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="comment_mini_text <?php if ($this->_aVars['aComment']['view_id'] == '1'): ?>row_moderate<?php endif; ?>"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aComment']['text']), '300', 'comment.view_more', true), 30); ?></div>
			<div class="comment_mini_action">
				<ul>
					<li class="comment_mini_entry_time_stamp"><?php echo $this->_aVars['aComment']['post_convert_time']; ?></li>
					<li><span>&middot;</span></li>
<?php if (! Phpfox ::isMobile()): ?>
<?php if (( Phpfox ::getUserParam('comment.edit_own_comment') && Phpfox ::getUserId() == $this->_aVars['aComment']['user_id'] ) || Phpfox ::getUserParam('comment.edit_user_comment')): ?>
					<li>
						<a href="inline#?type=text&amp;&amp;simple=true&amp;id=js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;call=comment.updateText&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;data=comment.getText" class="quickEdit"><?php echo Phpfox::getPhrase('comment.edit'); ?></a>
					</li>
					<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::getParam('comment.comment_is_threaded')): ?>
<?php if (( isset ( $this->_aVars['aComment']['iteration'] ) && $this->_aVars['aComment']['iteration'] >= Phpfox ::getParam('comment.total_child_comments')) || isset ( $this->_aVars['bForceNoReply'] )): ?>
					
<?php else: ?>
					<li><a href="#" class="js_comment_feed_new_reply" rel="<?php echo $this->_aVars['aComment']['comment_id']; ?>"><?php echo Phpfox::getPhrase('comment.reply'); ?></a></li>
					<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
					
<?php Phpfox::getBlock('like.link', array('like_type_id' => 'feed_mini','like_item_id' => $this->_aVars['aComment']['comment_id'],'like_is_liked' => $this->_aVars['aComment']['is_liked'],'like_is_custom' => true)); ?>
					<li class="js_like_link_holder"<?php if ($this->_aVars['aComment']['total_like'] == 0): ?> style="display:none;"<?php endif; ?>><span>&middot;</span></li>
					<li class="js_like_link_holder"<?php if ($this->_aVars['aComment']['total_like'] == 0): ?> style="display:none;"<?php endif; ?>><a href="#" onclick="return $Core.box('like.browse', 400, 'type_id=feed_mini&amp;item_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>');"><span class="js_like_link_holder_info"><?php if ($this->_aVars['aComment']['total_like'] == 1):  echo Phpfox::getPhrase('comment.1_person');  else:  echo Phpfox::getPhrase('comment.total_people', array('total' => number_format($this->_aVars['aComment']['total_like'])));  endif; ?></span></a></li>
					
<?php if (Phpfox ::getUserParam('comment.can_moderate_comments') && $this->_aVars['aComment']['view_id'] == '1'): ?>
					<li>
						<a href="#" onclick="$('#js_comment_text_<?php echo $this->_aVars['aComment']['comment_id']; ?>').removeClass('row_moderate'); $(this).remove(); $.ajaxCall('comment.moderateSpam', 'id=<?php echo $this->_aVars['aComment']['comment_id']; ?>&amp;action=approve&amp;inacp=0'); return false;"><?php echo Phpfox::getPhrase('comment.approve'); ?></a>					
					</li>					
<?php endif; ?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		
		<div id="js_comment_form_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="js_comment_form_holder"></div>

		<div class="comment_mini_child_holder<?php if (isset ( $this->_aVars['aComment']['children'] ) && $this->_aVars['aComment']['children']['total'] > 0): ?> comment_mini_child_holder_padding<?php endif; ?>">
<?php if (isset ( $this->_aVars['aComment']['children'] ) && $this->_aVars['aComment']['children']['total'] > 0): ?>
			<div class="comment_mini_child_view_holder" id="comment_mini_child_view_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>">
				<a href="#" onclick="$.ajaxCall('comment.viewAllComments', 'comment_type_id=<?php echo $this->_aVars['aComment']['type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aComment']['item_id']; ?>&amp;comment_id=<?php echo $this->_aVars['aComment']['comment_id']; ?>', 'GET'); return false;"><?php echo Phpfox::getPhrase('comment.view_total_more', array('total' => number_format($this->_aVars['aComment']['children']['total']))); ?></a>
			</div>
<?php endif; ?>

			<div id="js_comment_children_holder_<?php echo $this->_aVars['aComment']['comment_id']; ?>" class="comment_mini_child_content">
<?php if (isset ( $this->_aVars['aComment']['children'] ) && count ( $this->_aVars['aComment']['children']['comments'] )): ?>
<?php if (count((array)$this->_aVars['aComment']['children']['comments'])):  foreach ((array) $this->_aVars['aComment']['children']['comments'] as $this->_aVars['aCommentChild']): ?>
<?php Phpfox::getBlock('comment.mini', array('comment_custom' => $this->_aVars['aCommentChild'])); ?>
<?php endforeach; endif; ?>
<?php endif; ?>
			</div>
		</div>		
		
	</div>
<?php endforeach; endif; ?>
<?php Phpfox::getLib('parse.output')->setImageParser(array('clear' => true)); ?>
			</div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php else: ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"></div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
		</div><!-- // #js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php endif; ?>
		
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'): ?>
		
<?php else: ?>
<?php if (Phpfox ::isModule('comment') && isset ( $this->_aVars['aFeed']['comment_type_id'] ) && Phpfox ::getParam('feed.allow_comments_on_feeds') && Phpfox ::isUser() && $this->_aVars['aFeed']['can_post_comment']): ?>
		<div class="js_feed_comment_form" <?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> id="js_feed_comment_form_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"<?php endif; ?>>
			<div class="js_comment_feed_textarea_browse"></div>
			<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> feed_item_view<?php endif; ?> comment_mini comment_mini_end">
				<form method="post" action="#" class="js_comment_feed_form">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div><input type="hidden" name="val[type]" value="<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>" /></div>			
					<div><input type="hidden" name="val[item_id]" value="<?php echo $this->_aVars['aFeed']['item_id']; ?>" /></div>
					<div><input type="hidden" name="val[parent_id]" value="0" class="js_feed_comment_parent_id" /></div>
					<div><input type="hidden" name="val[is_via_feed]" value="<?php echo $this->_aVars['aFeed']['feed_id']; ?>" /></div>
<?php if (Phpfox ::isUser()): ?>
					<div class="comment_mini_image"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> <?php else: ?>style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => '32','max_height' => '32')); ?>
					</div>				
<?php endif; ?>
					<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>comment_mini_content <?php endif; ?>comment_mini_textarea_holder">						
						<div class="js_comment_feed_value"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></div>
						<textarea cols="60" rows="4" name="val[text]" class="js_comment_feed_textarea" id="js_feed_comment_form_textarea_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></textarea>
						<div class="js_feed_comment_process_form"><?php echo Phpfox::getPhrase('feed.adding_your_comment');  echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>
					</div>
					<div class="feed_comment_buttons_wrap">
						<div class="js_feed_add_comment_button t_right">
							<input type="submit" value="<?php echo Phpfox::getPhrase('feed.comment'); ?>" class="button" />									
						</div>								
					</div>			
				
</form>

			</div>
		</div>
<?php endif; ?>
<?php endif; ?>
		
	</div><!-- // .comment_mini_content_border -->
</div><!-- // .comment_mini_content_holder -->

</div>
<?php if (Phpfox ::isModule('report') && isset ( $this->_aVars['aFeed']['report_module'] ) && $this->_aVars['sFeedType'] != 'mini'): ?>
<div class="report_this_item">
	<a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="item_bar_flag inlinePopup" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo $this->_aVars['aFeed']['report_phrase']; ?></a>
</div>
<?php endif;  if (isset ( $this->_aVars['sFeedType'] )): ?>
</div>
<?php endif; ?>
<?php endif; ?>
<?php if ($this->_aVars['aFeed']['type_id'] != 'friend'): ?>
<?php if (isset ( $this->_aVars['aFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aFeed']['more_feed_rows'] ) && count ( $this->_aVars['aFeed']['more_feed_rows'] )): ?>
<?php if ($this->_aVars['iTotalExtraFeedsToShow'] = count ( $this->_aVars['aFeed']['more_feed_rows'] )):  endif; ?>
		<a href="#" class="activity_feed_content_view_more" onclick="$(this).parents('.js_feed_view_more_entry_holder:first').find('.js_feed_view_more_entry').show(); $(this).remove(); return false;"><?php echo Phpfox::getPhrase('feed.see_total_more_posts_from_full_name', array('total' => $this->_aVars['iTotalExtraFeedsToShow'],'full_name' => Phpfox::getService('user')->getFirstname($this->_aVars['aFeed']['full_name']))); ?></a>			
<?php endif; ?>
<?php endif; ?>
	</div><!-- // .activity_feed_content -->
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_3')) ? eval($sPlugin) : false); ?>
</div><!-- // #js_item_feed_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
		</div>
<?php endforeach; endif; ?>
<?php unset($this->_aVars['bChildFeed']); ?>
<?php endif; ?>
	</div>
<?php endforeach; endif; ?>

<?php if (isset ( $this->_aVars['bHasRecentShow'] )): ?>
	</div>
<?php endif; ?>
<?php if ($this->_aVars['sCustomViewType'] === null): ?>
<?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' )): ?>

<?php else: ?>
<?php if (count ( $this->_aVars['aFeeds'] )): ?>
	<div id="feed_view_more">
		<div id="js_feed_pass_info" style="display:none;">page=<?php echo $this->_aVars['iFeedNextPage'];  if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] )): ?>&profile_user_id=<?php echo $this->_aVars['aUser']['user_id'];  endif;  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&callback_module_id=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&callback_item_id=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?></div>
		<div id="feed_view_more_loader"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>
		<a href="<?php if (Phpfox ::getLib('module')->getFullControllerName() == 'core.index-visitor'):  echo Phpfox::getLib('phpfox.url')->makeUrl('core.index-visitor', array('page' => $this->_aVars['iFeedNextPage']));  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('current', array('page' => $this->_aVars['iFeedNextPage']));  endif; ?>" onclick="$(this).hide(); $('#feed_view_more_loader').show(); $.ajaxCall('feed.viewMore', 'page=<?php echo $this->_aVars['iFeedNextPage'];  if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] )): ?>&profile_user_id=<?php echo $this->_aVars['aUser']['user_id'];  endif;  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&callback_module_id=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&callback_item_id=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>', 'GET'); return false;" class="global_view_more no_ajax_link"><?php echo Phpfox::getPhrase('feed.view_more'); ?></a>
	</div>
<?php else: ?>
	<br />
	<div class="message js_no_feed_to_show"><?php echo Phpfox::getPhrase('feed.there_are_no_new_feeds_to_view_at_this_time'); ?></div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php if (! PHPFOX_IS_AJAX || ( PHPFOX_IS_AJAX && count ( $this->_aVars['aFeedVals'] ) )): ?>
</div>
<?php endif; ?>
<?php if (Phpfox ::getParam('feed.refresh_activity_feed') > 0 && Phpfox ::getLib('module')->getFullControllerName() == 'core.index-member'): ?>
<script type="text/javascript">
	$Core.reloadActivityFeed();
</script>
<?php endif; ?>


<?php endif; ?>

		
		
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
	</div>
<?php if (isset ( $this->_aVars['aFooter'] ) && count ( $this->_aVars['aFooter'] )): ?>
	<div class="bottom">
		<ul>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

				<li id="js_block_bottom_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"<?php if ($this->_aPhpfoxVars['iteration']['block'] == 1): ?> class="first"<?php endif; ?>>
<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
					<a href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
				</li>
<?php endforeach; endif; ?>
		</ul>
	</div>
<?php endif; ?>
</div>
<?php unset($this->_aVars['sHeader'], $this->_aVars['sModule'], $this->_aVars['sComponent'], $this->_aVars['aFooter'], $this->_aVars['sBlockBorderJsId'], $this->_aVars['bBlockDisableSort'], $this->_aVars['bBlockCanMove'], $this->_aVars['aEditBar'], $this->_aVars['sDeleteBlock'], $this->_aVars['sBlockTitleBar'], $this->_aVars['sBlockJsId'], $this->_aVars['sCustomClassName']);  endif; ?>

<?php Phpfox::getBlock('ad.inner', array('sClass' => $this->_aVars['sClass'])); ?>
