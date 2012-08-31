<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: controller.html.php 64 2009-01-19 15:05:54Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
<div id="js_rating_holder_{$aRatingCallback.type}">

<!--
	<form method="post" action="#">
		<div><input type="hidden" name="rating[type]" value="{$aRatingCallback.type}" /></div>
		<div><input type="hidden" name="rating[item_id]" value="{$aRatingCallback.item_id}" /></div>


		<div style="height:18px;">
			<div style="position:absolute;">
			{foreach from=$aRatingCallback.stars key=sKey item=sPhrase}
				<input type="radio" class="js_small" id="js_small_{$sKey}" name="rating[star]" value="{$sKey}|{$sPhrase}" title="{$sKey}{if $sPhrase != $sKey} ({$sPhrase}){/if}"{if $aRatingCallback.default_rating   >= $sKey} checked="checked"{/if} />
			{/foreach}
				<div class="clear"></div>
			</div>
		</div>


		{if isset($aRatingCallback.total_rating)}
		<div class="extra_info" style="padding:4px 0px 0px 4px;">
			<span class="js_rating_total">{$aRatingCallback.total_rating}</span>
		</div>
		{/if}
	</form>


	<form method="post" action="#">
		<div><input type="hidden" name="rating_1[type]" value="{$aRatingCallback.type}" /></div>
		<div><input type="hidden" name="rating_1[item_id]" value="{$aRatingCallback.item_id}" /></div>
		<div style="height:18px;">
			<div style="position:absolute;">
			{foreach from=$aRatingCallback.stars key=sKey item=sPhrase}
				<input type="radio" class="js_small" id="js_small1_{$sKey}" name="rating_1[star]" value="{$sKey}|{$sPhrase}" title="{$sKey}{if $sPhrase != $sKey} ({$sPhrase}){/if}"{if $aRatingCallback.default_rating >= $sKey} checked="checked"{/if} />
			{/foreach}
				<div class="clear"></div>
			</div>
		</div>
		{if isset($aRatingCallback.total_rating)}
		<div class="extra_info" style="padding:4px 0px 0px 4px;">
			<span class="js_rating_total">{$aRatingCallback.total_rating}</span>
		</div>
		{/if}
	</form>

 -->

 	{foreach from=$user item=u}
 	<div style="padding-left:0px;margin-left:0px;width:500px;border-bottom:solid 2px #EFEFEF;">

        <div id="exemple" style="margin-top:10px;">
        <!--
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" /><br />
         -->
            <div class="basic" id="{$u.main_rate}_1"></div><br />
            {$u.service}<br /><br />
        </div>
        <div id="rating_sec_2">
            <table width="100%" cellspacing="0" cellpadding="0" style="width: auto;">
              <tr>
                <td width="120"><b style="color:#666;">Local knowledge</b></td>
                <td><div class="exemple2" id="{$u.local_rate}_2"></div></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Process expertise </b></td>
                <td><div class="exemple2" id="{$u.process_rate}_3"></div></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Responsiveness </b></td>
                <td><div class="exemple2" id="{$u.responsive_rate}_4"></div></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Negotiation skills </b></td>
                <td><div class="exemple2" id="{$u.negotiation_rate}_5"></div></td>
              </tr>
            </table>
        </div>
        <br />
        <strong style="color:#666;">Summary</strong>: <br />
        {$u.review}
        <!--
        Jillian went above and beyond to assist us! She was very patient with me; it took me over a year to finally decide.
        Jillian NEVER rushed or pushed me to make a decsion. She understood that I was not in a rush and needed to be 100% with my decsion.
        -->
        <br /> <br/>

        <strong>Posted By :</strong> {$u.by_user_name}
        <br />
        <strong>Date posted :</strong> {$u.date}
         <br /> <br/>
    </div>
    <br /> <br/>
    {/foreach}

    <!--
 	<div style="padding-left:0px;margin-left:0px;width:500px;">

        <div id="rating_sec_2" style="margin-top:10px;">
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" />
            <img src="module/rate/static/image/icons/rating_star.png" alt="" width="18" height="17" /><br />
            Bought a Single Family home in 2011 in Sheep Mountain, Las Vegas, NV. <br /><br />
        </div>
        <div id="rating_sec_2">
            <table width="100%" cellspacing="0" cellpadding="0" style="width: auto;">
              <tr>
                <td width="120"><b style="color:#666;">Local knowledge</b></td>
                <td><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Process expertise </b></td>
                <td><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Responsiveness </b></td>
                <td><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /></td>
              </tr>
              <tr>
                <td><b style="color:#666;">Negotiation skills </b></td>
                <td><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /><img src="module/rate/static/image/icons/star.gif" alt="" width="18" height="17" /></td>
              </tr>
            </table>
        </div>
        <br />
        <strong style="color:#666;">Summary</strong>: <br />
        Jillian and James are amazing, talk about a dynamic duo! I initially looked for my first home on a very low budget and James
        took me to see more houses than I can remember. During the walk thrus he was able to take my needs as a single mother into consideration
        and point out the features and challenges in a non used car salesman way. When my search abruptly halted and then changed completely,
        the two never skipped a beat and within 24 hours not only did we find a house but my offer was accepted    </div>

    	-->

</div>


<div id="js_rating_holder_{$aRatingCallback.type}">


</div>
