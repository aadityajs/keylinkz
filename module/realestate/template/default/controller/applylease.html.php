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

{php}
$PropId = Phpfox::getLib('request')->getInt('id');
$adiPropDetails = adiGetPropDetails($PropId);
$adiUserDetails = adiGetUser($adiPropDetails[agent_id]);
//$dataSimilar = getSimilarProperties();

//var_dump($adiPropDetails);
//var_dump($adiUserDetails);

//echo $adiPropDetails[realestate_title];
//echo $adiPropDetails[agent_id];
//echo Phpfox::getUserId();
//echo '---->'.adiGetUserImage($adiPropDetails[agent_id]);
{/php}

{php}
$AgentId = Phpfox::getLib('request')->getInt('id');
$adiUserDetails = adiGetUser($AgentId);
$_SESSION[referrar_id] = end(explode('id_', $_SERVER[HTTP_REFERER]));

{/php}
<?php //$this->hide('#foo')->show('#bar')->html('Test Content')->call('init();'); ?>
<?php //var_dump(adiGetUser(2)); ?>
<?php //echo Phpfox::getUserBy('profile_page_id'); ?>

<!--body content start-->
        <div style="margin-top: 0px;" class="holder">


<br/><br/>
<div class="container_box">
		<div class="apply_base">
       <div class="apply">Apply for Lease </div>
	   <div class="apply_bot">
	   	<div class="apply_bot_left"><span>Property ID:</span> {php} echo $PropId; {/php}<br />
			{php} echo $adiPropDetails[address]; {/php}
		 </div>
			<div class="apply_bot_right"><p>Easy, Fast and Secure lease Application</p>
		    <a href="#"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}page_down.png" border="0" /></a>
			</div>
		  </div>
		<div class="clear"></div>
		</div>

		<div class="application">
		<div>
		<p><span style="padding:0 0 0 68px;"></span>Application is made to lease premises known as <b>{php} echo $adiPropDetails[address]; {/php} </b>for
		<span style="width:80px;" class="drop4">
			<select name="forMonths" class="styled4" style="width: 80px;">
				{php} for ($i=1; $i<=36; $i++) { {/php}
				<option value="{php} echo $i; {/php}">{php} echo $i; {/php}</option>
				{php} } {/php}
			</select>
		</span>
		months, beginning on the
		<span style="width:100px;" class="drop4">
			<select name="fromDay" class="styled4" style="width: 80px;">
				{php} for ($i=1; $i<=31; $i++) { {/php}
				<option value="{php} echo $i; {/php}">{php} echo $i; {/php}</option>
				{php} } {/php}
			</select>
		</span>
		day of
		 <span style="width:110px;" class="drop4">
		 	<select name="fromMonth" class="styled4" style="width: 100px;">
				{php} for ($i=1; $i<=12; $i++) { {/php}
				<option value="{php} echo date('F', mktime(0,0,0,$i)); {/php}">{php} echo date('F', mktime(0,0,0,$i)); {/php}</option>
				{php} } {/php}
			</select>
		 </span>
		  for the monthly rent of <b>${php} echo number_format($adiPropDetails[price_per_month],2); {/php}</b> payable in advance on the first day of each month. Rent is to begin on the
		  <span style="width:100px;" class="drop4">
		  	<select name="beginFromDay" class="styled4" style="width: 80px;">
				{php} for ($i=1; $i<=31; $i++) { {/php}
				<option value="{php} echo $i; {/php}">{php} echo $i; {/php}</option>
				{php} } {/php}
			</select>
		  </span>
		   day of
		   <span style="width:140px;" class="drop4">
		   	<select name="beginFromMonth" class="styled4" style="width: 100px;">
				{php} for ($i=1; $i<=12; $i++) { {/php}
				<option value="{php} echo date('F', mktime(0,0,0,$i)); {/php}">{php} echo date('F', mktime(0,0,0,$i)); {/php}</option>
				{php} } {/php}
			</select>
		   </span>
		    ,
			<span style="width:100px;" class="drop4">
			<select name="beginFromYear" class="styled4" style="width: 100px;">
				{php} for ($i=date('Y'); $i<=date('Y')+10; $i++) { {/php}
				<option value="{php} echo $i; {/php}">{php} echo $i; {/php}</option>
				{php} } {/php}
			</select>
			</span>
			 . </p>
		</div>
		<div class="clear"></div>
		</div>

		<div class="application">
		<p><span style="padding:0 0 0 68px;"></span>It is understood the premises are to be used as a family residence occupied by not more than
		<span style="width:80px;" class="drop4">
			<select name="familyMember" class="styled4" style="width: 80px;">
				{php} for ($i=1; $i<=20; $i++) { {/php}
				<option value="{php} echo $i; {/php}">{php} echo $i; {/php}</option>
				{php} } {/php}
			</select>
		</span>
		 parsons; and that occupancy is contin-gent upon property being vacated by the present occupant. Occupancy of all residences shall conform with applicable zoning laws; and additionally, in the case of condominiums, with applicable by-laws, rules, and regulations. All parsonal property placed in said premises shall be at the Tenant's risk. I /We agree to apply for all utilities' services before taking occupancy of the leased premises and agree to pay for all applicable utilities' services before taking occupancy of the leased premises and agree to pay for all applicable utilities and all necessary deposits.
  </p>
	 <div class="clear"></div>
		</div>
		<div class="application">
		<p><span style="padding:0 0 0 68px;"></span>A Deposit, which will be applied as the first month's rent in the sum of <b>${php} echo number_format($adiPropDetails[price_per_month],2); {/php}</b> is made herewith to be held by <b>{php} echo $adiUserDetails[full_name]; {/php},</b> with clear understanding that this application, including each prospective occupant, is subject to approval and acceptance.
		</p>
		<div class="clear"></div>
		</div>
	   <div class="application">
		<p><span style="padding:0 0 0 68px;"></span> If this application is not approved and accepted by the Landlord or Landlord's Agent, the deposit will be refunded within seven days from rejection date, the applicant herehy waiving addition, a separate application processing  fee of in the amount of <b>$35.00</b> will accompany this application. These fees are refundable only if the Landlord or Landlord's Agent elects not to process the application. The credit check may take up to five working days to complete after it is received by the Listing Agent. A Security Deposit (which will include any applicable pet deposit) in the amount of <b>$900.00 </b>is due and payable to <b>{php} echo $adiUserDetails[full_name]; {/php}</b> prior to occupancy. </p>
		<div class="clear"></div>
		</div>
			<div class="application">
		<p><span style="padding:0 0 0 68px;"></span> After approval and acceptance of the application by Landlord or Landlord's Agent, the applicant agrees to execute a lease in accordance with the terms of the application. The deposit shall be deposited by the Landlord or Landlord's Agent. If the applicant should fail to execute a lease and/or occupy the
premises, the applicant agree that the entire deposit herein provided will be forfeited to compensate the Landlord or Landlord's Agent for vacancy and/or damages suffered. In all instances, the disposition shall conform with the Landlord-Tenant Laws of the State of <b>MASSACHUSETTS. </b></p>
		<div class="clear"></div>
		</div>

	<div class="agree"><input name="" type="checkbox" value=""  style="vertical-align:middle; margin:0 5px 5px 10px;"/>I have read and agree to the <a href="#">Terms and Conditions</a> of this lease Application and the <a href="#">KeyLinkz User Policy.</a></div>
		</div>
	<div class="clear"></div>
	<div class="appli_box">
		<div class="print">
		<ul>
		<li><a href="javascript: window.print();">Print Application </a><span><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}print_img.png" border="0" alt="" style="margin:0 5px -6px 5px;"/></span></li>
		<li><a href="#">Email me a Copy </a><span><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}email_img.png" border="0" alt="" style="margin:0 0 -3px 7px;"/></span></li>
		</ul>
		</div>
		<div class="clear"></div>
		<div class="options">Select Options</div>
		<div class="options1">
		<div class="use_btn"><a href="#">Use My Profile Information</a></div>
		<span>or </span>
		<div class="use_btn"><a href="#">input New Information for this Lease Application</a></div>
		<span>or </span>
		<div class="use_btn" style="float: right;"><a href="#">Request  a printable format</a></div>
		</div>
		<div class="Continue_btn">Continue</div>
		</div>


    </div>
       <!-- </div> -->
   <!--body content end-->
<div class="clear"></div>

