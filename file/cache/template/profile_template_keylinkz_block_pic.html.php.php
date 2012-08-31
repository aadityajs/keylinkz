<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: July 10, 2012, 12:13 pm */ ?>
<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: pic.html.php 3405 2011-11-01 11:05:18Z Miguel_Espinoza $
 */



?>
<?php if (! empty ( $this->_aVars['sProfileImage'] )): ?>
<div class="profile_image">


    <div class="profile_image_holder">
<?php if (Phpfox ::isModule('photo')): ?>
			<a href="<?php echo Phpfox::permalink('photo.album.profile', $this->_aVars['aUser']['user_id'], $this->_aVars['aUser']['user_name'], false, null, (array) array (
)); ?>"><?php echo $this->_aVars['sProfileImage']; ?></a>
<?php else: ?>
<?php echo $this->_aVars['sProfileImage']; ?>
<?php endif; ?>
    </div>


<?php if (Phpfox ::getUserId() == $this->_aVars['aUser']['user_id']): ?>
	<div class="p_4">
		<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.photo'); ?>"><?php echo Phpfox::getPhrase('profile.change_picture'); ?></a>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
<div class="sub_section_menu">
    <b class="menu_line">LISTINGS</b>
		<ul class="" style="padding-left:12px;padding-top:5px;font-weight:500;">
        	<a href="<?php echo $this->_aVars['listing_url']; ?>type_rent" class="ajax_link"><li class="" style="margin:3px;">Rentals</li></a>
            <a href="<?php echo $this->_aVars['listing_url']; ?>type_sale" class="ajax_link"><li class="" style="margin:3px;">Sale</li></a>
        </ul>

   <!--  <b class="menu_line">MY LEADS</b>
		<ul class="" style="padding-left:12px;padding-top:5px;font-weight:500;margin-bottom:10px;">
        	<li class="" style="margin:3px;">Forclosure Leads</li>
            <li class="" style="margin:3px;">Lease Application</li>
            <li class="" style="margin:3px;">Property Requests</li>
            <li class="" style="margin:3px;">Rental Leads</li>
            <li class="" style="margin:3px;">Viewing Requests</li>
        </ul>

    <b class="menu_line">FAVORITES</b>
		<ul class="" style="padding-left:15px;padding-top:5px;font-weight:500;margin-bottom:10px; ">
        	<li class="" style="margin:3px;">News Feed</li>
        </ul>


    <b class="menu_line">APPS</b>
		<ul class="debug" style="padding-left:15px;padding-top:5px;font-weight:500;">
        	<li class="" style="margin:3px;">Credit Reports</li>
            <li class="" style="margin:3px;">Events</li>
            <li class="" style="margin:3px;">Find Connections</li>
            <li class="" style="margin:3px;">Links</li>
            <li class="" style="margin:3px;">Linkz NearBy</li>
        	<li class="" style="margin:3px;">Messages</li>
            <li class="" style="margin:3px;">Notes</li>
            <li class="" style="margin:3px;">Open Hoses</li>
            <li class="" style="margin:3px;">Photos</li>
            <li class="" style="margin:3px;">Questions</li>
            <li class="" style="margin:3px;">Reveiws</li>
            <li class="" style="margin:3px;">Virtua Tours</li>
        </ul>

    <b class="menu_line">PAGES</b>
		<ul class="" style="padding-left:15px;padding-top:5px;font-weight:500;">
        	<li class="" style="margin:3px;">Keylinkz Inc.</li>
            <li class="" style="margin:3px;">Keylinkz, INC</li>
            <li class="" style="margin:3px;">Find Connections</li>
        </ul>
     -->
	<ul>


<?php if (count((array)$this->_aVars['aProfileLinks'])):  foreach ((array) $this->_aVars['aProfileLinks'] as $this->_aVars['aProfileLink']): ?>
			<li class="<?php if (isset ( $this->_aVars['aProfileLink']['is_selected'] )): ?> active<?php endif; ?>">

				<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aProfileLink']['url']); ?>" class="ajax_link"<?php if (isset ( $this->_aVars['aProfileLink']['icon'] )): ?> style="background-image:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => $this->_aVars['aProfileLink']['icon'],'return_url' => true)); ?>');"<?php endif; ?>><?php echo $this->_aVars['aProfileLink']['phrase'];  if (isset ( $this->_aVars['aProfileLink']['total'] )): ?><span>(<?php echo number_format($this->_aVars['aProfileLink']['total']); ?>)</span><?php endif; ?></a>

                <!--
<?php if (isset ( $this->_aVars['aProfileLink']['sub_menu'] ) && is_array ( $this->_aVars['aProfileLink']['sub_menu'] ) && count ( $this->_aVars['aProfileLink']['sub_menu'] )): ?>

                <ul>
<?php if (count((array)$this->_aVars['aProfileLink']['sub_menu'])):  foreach ((array) $this->_aVars['aProfileLink']['sub_menu'] as $this->_aVars['aProfileLinkSub']): ?>
					<li class="<?php if (isset ( $this->_aVars['aProfileLinkSub']['is_selected'] )): ?> active<?php endif; ?>"><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl($this->_aVars['aProfileLinkSub']['url']); ?>"><?php echo $this->_aVars['aProfileLinkSub']['phrase'];  if (isset ( $this->_aVars['aProfileLinkSub']['total'] ) && $this->_aVars['aProfileLinkSub']['total'] > 0): ?><span class="pending"><?php echo number_format($this->_aVars['aProfileLinkSub']['total']); ?></span><?php endif; ?></a></li>
<?php endforeach; endif; ?>
				</ul>

<?php endif; ?>
                -->

			</li>
<?php endforeach; endif; ?>
			<li class="<?php if (isset ( $this->_aVars['aProfileLink']['is_selected'] )): ?> active<?php endif; ?>">

				<a href="<?php echo $this->_aVars['dynamic_user_url']; ?>fav_1" class="ajax_link"<?php if (isset ( $this->_aVars['aProfileLink']['icon'] )): ?> style="background-image:url('<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => $this->_aVars['aProfileLink']['icon'],'return_url' => true)); ?>');"<?php endif; ?>>Favourite Lists</a>

			</li>


	</ul>
    <div class="clear"></div>
    <div class="js_cache_check_on_content_block" style="display:none;"></div>
    <div class="js_cache_profile_id" style="display:none;"><?php echo $this->_aVars['aUser']['user_id']; ?></div>
    <div class="js_cache_profile_user_name" style="display:none;"><?php echo $this->_aVars['aUser']['user_name']; ?></div>
</div>
