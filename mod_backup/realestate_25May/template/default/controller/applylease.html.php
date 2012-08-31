<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: list.html.php 671 2009-06-12 17:12:28Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
{*
{php}
$AgentId = Phpfox::getLib('request')->getInt('id');
$adiPropDetails = adiGetPropDetails($PropId);
$adiUserDetails = adiGetUser($adiPropDetails[agent_id]);
$dataSimilar = getSimilarProperties();

//var_dump($adiPropDetails);
//var_dump($adiUserDetails);


//echo $adiPropDetails[realestate_title];
//echo $adiPropDetails[agent_id];
//echo Phpfox::getUserId();
//echo '---->'.adiGetUserImage($adiPropDetails[agent_id]);
{/php}
*}

{php}
$AgentId = Phpfox::getLib('request')->getInt('id');
$adiUserDetails = adiGetUser($AgentId);
$_SESSION[referrar_id] = end(explode('id_', $_SERVER[HTTP_REFERER]));

{/php}
<?php //$this->hide('#foo')->show('#bar')->html('Test Content')->call('init();'); ?>
<?php //var_dump(adiGetUser(2)); ?>
<?php //echo Phpfox::getUserBy('profile_page_id'); ?>

<!--body content start-->
        <div style="margin-top: -1px;" class="holder">

        <!-- <div style="margin-top: 15px;" id="container"> -->
   <div><a href="#" style="padding: 4px 0;">Home</a> > <a href="#" style="padding: 4px 0;">Member</a> > <a href="#">Review</a></div>


    <div class="clear"></div>
	<div class="leftcol" style="border: 0px solid red;">



	</div>
	<div class="rightcol" style="border: 0px solid red; margin: 28px 0 0 0;	">


	<div class="agentbox">
		<h1>Mortage Services</h1>
        <div class="small_profilebg"  style="border:0;">
        	<div style="width:48; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}fha.gif" alt="" width="46" height="46" class="border3" /></div>
            <div class="rating_bg1">
            <h2>Mortgaga Rates</h2>
			<p>2.9% Fixed Rates <br/>
Http://www.fha.com</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:48; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}save.gif" alt="" width="46" height="46" class="border3" /></div>
            <div class="rating_bg1">
            <h2>Mortgaga Rates</h2>
			<p>2.9% Fixed Rates <br/>
Http://www.fha.com</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:48; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}n.gif" alt="" width="46" height="46" class="border3" /></div>
            <div class="rating_bg1">
            <h2>Mortgaga Rates</h2>
			<p>2.9% Fixed Rates <br/>
Http://www.fha.com</p>
            </div>
          </div>
         <div>
        </div>
		</div>



		<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>
		<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}cubic_feet.jpg" alt="" width="305" height="83" /></div>
		<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>
		<div class="agentbox">
		<h1>Mortage Services</h1>
        <div class="small_profilebg"  style="border:0;">
        	<div style="width:30; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}mob.gif" alt="" width="30" height="30"/></div>
            <div class="rating_bg2">
            <h2>Download KeyLinkz Mobile</h2>
			<p>FREE APPS - CLICK HERE</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:30; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}bank.gif" alt="" width="30" height="30"/></div>
            <div class="rating_bg2">
            <h2>Bank Of America</h2>
			<p>$50.00 When you open new account</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:30; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}car.gif" alt="" width="30" height="30"/></div>
            <div class="rating_bg2">
            <h2>Rent a car</h2>
			<p>$27.00 per day, unlimited milege</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:30; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}brik.gif" alt="" width="30" height="30"/></div>
            <div class="rating_bg2">
            <h2>Fast Movers</h2>
			<p>Free moving boxes - Click here</p>
            </div>
          </div>
		  <div class="small_profilebg"  style="border:0;">
        	<div style="width:30; margin: 0 0 0 10px; float: left;"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}store.gif" alt="" width="30" height="30"/></div>
            <div class="rating_bg2">
            <h2>Need Storage?</h2>
			<p>2 Months FREE</p>
            </div>
          </div>
         <div>
        </div>
		</div>

    </div>
       <!-- </div> -->
   <!--body content end-->
<div class="clear"></div>

