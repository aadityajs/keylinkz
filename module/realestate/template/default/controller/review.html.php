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


	<style type="text/css">
		.datasSent, .serverResponse{margin-top:20px;width:470px;height:73px;border:1px solid #F0F0F0;background-color:#F8F8F8;padding:10px;float:left;margin-right:10px}
		.datasSent{width:200px;position:fixed;left:680px;top:0}
		.serverResponse{position:fixed;left:680px;top:100px}
		.datasSent p, .serverResponse p {font-style:italic;font-size:12px}
		.exemple{margin-top:15px;}
		.clr{clear:both}
		pre {margin:0;padding:0}
		.notice {background-color:#F4F4F4;color:#666;border:1px solid #CECECE;padding:10px;font-weight:bold;width:600px;font-size:12px;margin-top:10px}
	</style>

	<!-- EXEMPLE 1 : BASIC -->
	<!--<div class="exemple">
		Overall Rating: <div class="basic" id="12_1"></div>
	</div>

	 <br>
	<div class="exemple">
		Local knowledge: <div class="basic" id="12_2"></div>
	</div>

	<br>
	<div class="exemple">
		Process expertise: <div class="basic" id="12_3"></div>
	</div>

	<br>
	<div class="exemple">
		Responsiveness: <div class="basic" id="12_4"></div>
	</div>

	<br>
	<div class="exemple">
		Negotiation skills: <div class="basic" id="12_5"></div>
	</div>-->




	<!--<div class="notice">
	 <pre>
	<?php
	echo htmlentities('<!-- JS to add -->
	<script type="text/javascript">
	  $(document).ready(function(){
	    $(".bacic").jRating();
	  });
	</script>
	');
	?>
	</pre>
	</div>-->



	<div class="price_history" style="background: none;">
	<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>
	<div class="contact_agent">
      <h1>Write a review</h1>
	  <div class="small_profile19" style="font:bold 13px/21px Arial, Helvetica, sans-serif; color:#333333;">
          How likely are you to recommend {php} echo $adiUserDetails[full_name]; {/php}
	    </div>
     <div class="clear"></div>

     <input type="hidden" name="{php} echo Phpfox::getUserId(); {/php}" id="byuser" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="review">
      <tr>
        <td>
        	<div class="exemple">
				<div class="mainRate" id="0_1" name="{php} echo $AgentId {/php}"></div>
			</div>
        </td>
      </tr>
      <tr>
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="width: auto;">
              <tr>
                <td width="190"><b>Local knowledge</b></td>
                <td>
                	<div class="exemple">
						<div class="localRate" id="0_2" name="{php} echo $AgentId; {/php}"></div>
					</div>
                </td>
              </tr>
              <tr>
                <td><b>Process expertise </b></td>
                <td>
                	<div class="exemple">
						<div class="processRate" id="0_3" name="{php} echo $AgentId; {/php}"></div>
					</div>
                </td>
              </tr>
              <tr>
                <td><b>Responsiveness </b></td>
                <td>
					<div class="exemple">
						<div class="responseRate" id="0_4" name="{php} echo $AgentId;{/php}"></div>
					</div>
				</td>
              </tr>
              <tr>
                <td><b>Negotiation skills </b></td>
                <td>
                	<div class="exemple">
						<div class="negoRate" id="0_5" name="{php} echo $AgentId; {/php}"></div>
					</div>
                </td>
              </tr>
            </table>         </td>
      </tr>

      <form action="" method="post" name="" >

      	<tr>
        <td>
          <b>Describe in detail your experience with {php} echo $adiUserDetails[full_name]; {/php}</b>        </td>
      </tr>
      <tr>
        <td>
        	<textarea name="review" class="textarea_agent19" id="review" cols="60" rows="5" style="width:600px; height:160px;"></textarea>        </td>
      </tr>
       <tr>
        <td><input type="checkbox" name="promise" id="promise" />           I promise this review is honest and respectful. I understand Keylinkz's Review Guidelines          </td>
      </tr>
       <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><b>Service provided</b></td>
            <td>
	            <select name="selService" id="selService">
	              <option value="">Choose one</option>
	              <option value="Listed and sold a home or lot/land">Listed and sold a home or lot/land</option>
	              <option value="Listed home or lot/land, but didn't sell">Listed home or lot/land, but didn't sell</option>
	              <option value="Helped me buy a home or lot/land">Helped me buy a home or lot/land</option>
	              <option value="Showed me homes or lots">Showed me homes or lots</option>
	              <option value="Helped me buy and sell homes">Helped me buy and sell homes</option>
	              <option value="Helped me find tenant for rental">Helped me find tenant for rental</option>
	              <option value="Helped me find a home to rent">Helped me find a home to rent</option>
	              <option value="1None. We connected, but it did not work out">None. We connected, but it did not work out</option>
	              <option value="Never responded to my inquiry">Never responded to my inquiry</option>
	              <option value="Property manage a home I own">Property manage a home I own</option>
	            </select>
            </td>
          </tr>
          <tr>
            <td><b>Year of service</b></td>
            <td><input type="text" name="yrservice" id="yrservice" /></td>
          </tr>
          <tr>
            <td><b>Complete address</b></td>
            <td><input type="text" name="address" id="address" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td style="font-size: 11px;">Will not be published. Please include city, state and zip code.</td>
          </tr>
        </table></td>
      </tr>

       <tr>
         <td><span style="margin: 0 8px;">
           <input type="submit" name="subReview" id="subReview" value="Submit Message" class="search_btn_global" />
         </span></td>
       </tr>


      </form>




      </table>
	  </div>

	 {php}
		if ($_POST['subReview'] && $_POST['subReview'] == "Submit Message") {

			$review = strip_tags(addslashes($_POST['review']));
			$selService = addslashes($_POST['selService']);
			$yrservice = $_POST['yrservice'];
			$address = $_POST['address'];
			$by_user = Phpfox::getUserId();
			$agent_id = Phpfox::getLib('request')->getInt('id');
			$time = $today = date("m/d/Y");

			echo $insertReviewSql = "insert into `keylinkz_user_review` (review_id, user_id, by_user, review, service, service_yr, address, timestamp, rated, status) values
																   (null, '$agent_id', '$by_user', '$review', '$selService', $yrservice, '$address', '$time', 'yes', '1')";
			mysql_query($insertReviewSql);
			//header('location:'.Phpfox::getLib('url')->makeUrl('realestate').'id_'.$_SESSION[referrar_id]);

			// http://aditya/keylinkz/index.php?do=/realestate/id_3

		}
	{/php}

	  <div class="clear"></div>

	</div>



<!-- -->	<br><br><br><br>
	<div class="datasSent">
		Datas sent to the server :
		<p></p>
	</div>
	<div class="serverResponse">
		Server response :
		<p></p>
	</div>




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

