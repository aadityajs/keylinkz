<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: price.html.php 3533 2011-11-21 14:07:21Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="marketplace_price_holder">
	{$sListingPrice}
	{if $aListing.user_id != Phpfox::getUserId()}
	<a href="#" class="marketplace_contact_seller" onclick="$Core.composeMessage({l}user_id: {$aListing.user_id}{r}); return false;">{phrase var='marketplace.contact_seller'}</a>
	
	{if $aListing.is_sell && $aListing.view_id != '2' && $aListing.price != '0.00'}
	<div class="marketplace_price_holder_button">
		<form method="post" action="{url link='marketplace.purchase'}">
			<div><input type="hidden" name="id" value="{$aListing.listing_id}" /></div>
			<input type="submit" value="{phrase var='marketplace.buy_it_now'}" class="button" />			
		</form>
	</div>
	{/if}	
	{/if}
</div>