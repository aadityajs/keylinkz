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

{literal}
<style type="text/css">

.black_overlay{
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
.white_content {
	display: none;
	position: absolute;
	top: 0%;
	left: 15%;
	width: auto;
	height: auto;
	padding: 16px;
	margin-top: 20px;
	margin-bottom: 30px;
	margin-left: 120px;
	/*border: 16px solid orange;*/
	background-color: white;
	z-index:1002;
}

</style>

<script type="text/javascript">

function openLightBox()
{
	$("body").css("overflow", "hidden");
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block'
}

</script>

{/literal}



{php}
$PropId = Phpfox::getLib('request')->getInt('id');
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

<?php //echo Phpfox::getLib('url')->makeUrl(Phpfox::getUserBy('user_name')); //$this->hide('#foo')->show('#bar')->html('Test Content')->call('init();');?>
<?php //var_dump(adiGetUser(2)); ?>
<?php //echo Phpfox::getUserBy('profile_page_id'); ?>



<!-- <body onLoad="initialize({php}echo $adiPropDetails[lat];{/php},{php}echo $adiPropDetails[lng];{/php})"></body> -->
<body onLoad="GSearch.setOnLoadCallback(OnLoad({php}echo $adiPropDetails[lat];{/php},{php}echo $adiPropDetails[lng];{/php}))"></body>
<!--body content start-->
        <div style="margin-top: -1px;" class="holder">
        <!-- <div style="margin-top: 15px;" id="container"> -->
   <div><a href="#" style="padding: 4px 0;">Home</a> > <a href="#" style="padding: 4px 0;">Member</a> > <a href="#">Profiles</a></div>


    <div class="clear"></div>
	<div class="leftcol">
	<div class="leftbox">
    <div class="listbox_top">
      <table width="656" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="46%"><table width="280" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="border-bottom: 1px dotted #d6dce2; margin: 4px 0;">
              <h1>{php}echo $adiPropDetails[realestate_title];{/php}</h1>
              </td>
            </tr>
            <tr>
              <td><table width="280" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px dashed #d6dce2;">
                <tr>
                  <td><h2>{php}if ($adiPropDetails[is_rent] == 'Y') { {/php}
	                                    House For Rent</br> Price: ${php} echo number_format($adiPropDetails[price_per_month]); {/php} per month<br />
	                                    {php} } else { {/php}
	                                    House For Sale</br> Price: ${php} echo number_format($adiPropDetails[total_price]); {/php}<br />
                                    {php} } {/php}
                       </h2></td>
                </tr>
                <tr>
                  <td><a href="#">Mortgage Calculator</a><br/><a href="#">Check your credit</a></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><table width="280" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table width="280" border="0" cellspacing="0" cellpadding="0" style="margin: 7px 10px;">
                    <tr>
                     <td width="85" style="color: #4e4e4e; font: normal 12px/17px Verdana, Arial, Helvetica, sans-serif; "> Beds:<br />
                        Baths:<br/>
                        Sqft:<br />
                        Lot:<br />
                        Type:<br />
                        Year built:<br />
                        Last sold:<br />
                        Parking:<br />
                        Cooling:<br />
                        Heating:<br />
                        Fireplace:<br />
                        On KeyLinkz:</td>
                      <td width="215" style="text-align: center; color: #4e4e4e; font: normal 12px/17px Verdana, Arial, Helvetica, sans-serif; ">3<br />
                        {php}echo $adiPropDetails[no_of_bathrooms];{/php}<br />
                        {php}echo $adiPropDetails[total_square_foot];{/php}<br />
                        {php}echo $adiPropDetails[total_square_foot];{/php}<br />
                        {php}echo $adiPropDetails[realestate_type];{/php}<br />
                        {php}echo $adiPropDetails[year_build];{/php}<br />
                        {php}echo $adiPropDetails[last_sold];{/php}<br />
                        {php}echo $adiPropDetails[parking];{/php}<br />
                        {php}echo $adiPropDetails[cooling];{/php}<br />
                        {php}echo $adiPropDetails[heating];{/php}<br />
                        {php}echo $adiPropDetails[fireplace];{/php}<br />
                        {php}adiDateDiffFormated($adiPropDetails[date_added]);{/php}</td>
                    </tr>
                    <tr>

                      <td colspan="2" style="padding: 10px 0; border-bottom: 1px solid #CCCCCC;"><div class="fact"><a href="#" onClick="$.ajaxCall('realestate.moreFacts');">More Facts</a></div></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="280" border="0"  cellspacing="0" cellpadding="0" style="margin: 0 10px 2px 10px;">
                       <tr>
                         <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}option.gif" alt="" width="241" height="36" /></td>
                       </tr>
                       <tr>
                         <td>
						 <div class="lease_link">
						<ul>
						<li><a href="{php} echo Phpfox::getLib('url')->makeUrl('realestate/applylease'); {/php}id_{php} echo $PropId; {/php}">Apply for Lease</a></li>
						<li><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.mortgageCalc');">Mortgage Calculator</a></li>
						<li><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.roommatesWanted');">Roommates Wanted</a></li>
						<li><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.scheduleViewing');">Schedule a Viewing</a></li>
						</ul>
						 </div>
						 </td>
                       </tr>
                       <tr>
                         <td><a href="#" style="color:#717171; padding:0;">Learn about this feature</a></td>
                       </tr>
                     </table>
					</td>
                </tr>
              </table></td>
            </tr>
          </table></td>




<td width="40%">
    <table width="200" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table width="350" border="2" cellspacing="0" cellpadding="0">



                    <tr style="padding: 11px 0;">
                        <td>

                        <div id="gallery1" class="ad-gallery" style="width:340px;height:320px;">


                            <div class="ad-image-wrapper" id="galleryLightbox" onClick="openLightBox();" style="cursor:pointer;">
                            </div>

                            <!--
                            <div class="ad-controls"></div>
                            -->

                            <div class="ad-nav">
                            <div class="ad-thumbs">
                              <ul class="ad-thumb-list">
                                {foreach from=$arrGallery item=img}
                                <li>
                                  <a href="module/realestate/static/image/upload/{$img}" onClick="javascript:url_link='http://aditya/keylinkz/module/realestate/static/image/upload/{$img}'">
                                    <img src="module/realestate/static/image/upload/{$img}" width="95" height="55" class="image0">
                                  </a>
                                </li>
                                {/foreach}


                                <!--
                                <li>
                                  <a href="module/realestate/template/default/controller/images/10.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t10.jpg" class="image1">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/11.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t11.jpg" class="image2">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/12.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t12.jpg" class="image3">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/13.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t13.jpg" class="image4">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/14.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t14.jpg" class="image5">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/2.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t2.jpg" class="image6">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/3.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t3.jpg" class="image7">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/4.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t4.jpg" class="image8">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/5.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t5.jpg" class="image9">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/6.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t6.jpg" class="image10">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/7.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t7.jpg" class="image11">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/8.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t8.jpg" class="image12">
                                  </a>
                                </li>
                                <li>
                                  <a href="module/realestate/template/default/controller/images/9.jpg">
                                    <img src="module/realestate/template/default/controller/images/thumbs/t9.jpg" class="image13">
                                  </a>
                                </li>
                                -->


                              </ul>
                            </div>
                            </div>
                            </div>
<!--
                        <ul id="slideshow" style="width:340px;height:320px;">
                            {foreach from=$arrGallery item=img}
                                <li>
                                    <h3>TinySlideshow v.2</h3>
                                    <span>module/realestate/static/image/upload/{$img}</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut urna. Mauris nulla. Donec nec mauris. Proin nulla dolor, bibendum et, dapibus in, euismod ut, felis.</p>
                                    <a href="#"><img src="module/realestate/static/image/upload/{$img}" alt="Yellow Fish" width="95" height="55" /></a>
                                </li>
                            {/foreach}
                        </ul>
                        <div style="clear:both"></div>
                        <div id="wrapper">
                            <div id="fullsize" onClick="callAlert();">
                                <div id="imgprev" class="imgnav" title="Previous Image"></div>
                                <div id="imgnext" class="imgnav" title="Next Image"></div>
                                <div id="image"></div>
                                <div id="information"></div>
                            </div>
                            <div style="clear:both"></div>
                            <div id="thumbnails">
                                <div id="slideleft" title="Slide Left"></div>
                                <div id="slidearea">
                                    <div id="slider"></div>
                                </div>
                                <div id="slideright" title="Slide Right"></div>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <div style="clear:both"></div>
                        {literal}
							<script type="text/javascript" src="module/realestate/static/jscript/script.js"></script>
                            <script type="text/javascript">
                                $('slideshow').style.display='none';
                                $('wrapper').style.display='block';
                                var slideshow=new TINY.slideshow("slideshow");
                                window.onload=function(){
                                    slideshow.auto=false;
                                    slideshow.speed=5;
                                    slideshow.link="linkhover";
                                    slideshow.info="information";
                                    slideshow.thumbs="slider";
                                    slideshow.left="slideleft";
                                    slideshow.right="slideright";
                                    slideshow.scrollSpeed=4;
                                    slideshow.spacing=5;
                                    slideshow.active="#fff";
                                    slideshow.init("slideshow","image","imgprev","imgnext","imglink");
                                }

                                function callAlert()
                                {
									alert("test");
                                    //document.getElementById('light').style.display='block';
                                   // document.getElementById('fade').style.display='block'
                                }
                            </script>
                        {/literal}

                        </td>
                    </tr>

-->



                    <tr>
                    <td>
                    <table width="24" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: center; margin: 0 0 0 160px;">
                    <tr>
                    <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}circle.gif" alt="" width="8" height="11" /></td>
                    <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}circle1.gif" alt="" width="8" height="11" /></td>
                    </tr>
                    </table>
                    </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td><div class="window"><a href="#">View Virtual Tour</a>  <span>(Opens in new window)</span></div></td>
        </tr>


        <tr>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td>
                <span style="color:#535354; line-height: 18px; font-size: 12px; padding: 0 10px 0 0;">
                    {php}echo adiExcerpt($adiPropDetails[realestate_desc]);{/php}
                    <a href="#" style="text-decoration: underline;">Read more</a>
                </span>
            </td>
        </tr>

    </table>
</td>




          </td>
        </tr>
      </table>
     </div>
	 <div class="clear"></div>
	 <div class="listbox_bot">
	 <ul>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon.gif" alt="" width="16" height="13" /><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.emailListing');">Email Listing</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon1.gif" alt="" width="16" height="13" /><a href="javascript:void(0);" onClick="$.ajaxCall('realestate.addToFavourite' , 'param={php}echo $adiPropDetails[realestate_id];{/php}')">Add to favorites</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon2.gif" alt="" width="16" height="13" /><a href="#">Contact Lister</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon3.gif" alt="" width="16" height="13" /></li>
         <li>
         	<!-- --><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon6.gif" alt="" width="16" height="16" /> <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon5.gif" alt="" width="16" height="16" hspace="3" /> <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon4.gif" alt="" width="16" height="16" hspace="3" />
			<div class="addthis_toolbox addthis_default_style " addthis:url="{php} echo Phpfox::getLib('url')->makeUrl('realestate'); {/php}add/id_{$listProp.id}">

         	<!-- AddThis Button BEGIN -->
			<!-- <script type="text/javascript">
				var addthis_config = {
				      ui_cobrand: "Joystiq"
				}
			</script>
			<div class="addthis_toolbox addthis_default_style " addthis:url="{php} echo Phpfox::getLib('url')->makeUrl('realestate'); {/php}add/id_{$listProp.id}">
			<a class="addthis_button">Share</a>
			<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_compact"></a> -->

			<!--<a href="http://www.addthis.com/bookmark.php" class="addthis_button_email">
	        <img src="http://s7.addthis.com/button1-email.gif" width="54" height="16" border="0" alt="Email" /></a>
			<a class="addthis_counter addthis_bubble_style"></a> -->
			</div>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8bcbfd70c726e4"></script>
			<!-- AddThis Button END -->

         </li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="10" height="1"/></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon7.gif" alt="" width="16" height="16"/> Map</li>
         <li><a target="_blank" href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}print/id_{$property_id}"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon8.gif" alt="" width="16" height="16"/> Print</a></li>
     </ul>
	 </div>
    </div>
	<div class="clear"></div>
	<div class="maps_views">
	<div><h1>Maps and Views</h1></div>
	<div class="maps_left">
	<div class="Linkz">
	<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}linkz.png" alt="" width="162" height="19" /></div>
	<ul>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('school')">Schools</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('transport')">Trasnportation Shops</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('mall')">Mall</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('theatre')">Theatres</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('restaurant')">Restaurants</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('park')">Parks</a></li>
	<li><a href="javascript: void(0);" onClick="adiDoSearch('museum')">Museums</a></li>
		<!-- <input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('school')"/>School<br/>
		<input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('hotel')"/>Hotel<br/>
		<input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('pub')"/>Pub<br/>
		<input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('mall')"/>Mall<br/>
		<input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('transport')"/>Transport<br/>
		<input type="radio" name="chkSearch" value="School" onclick="adiDoSearch('disco')"/>Disco<br/> -->
	</ul>
	</div>
	<div class="clear"></div>
	<div class="Linkz_area">
	<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}linkz_area.png" alt="" width="162" height="19" /></div>
	<div class="clear"></div>
	<div style="float: left; margin: 0px 0px 0 0; width: 170px;">
        <div id="searchwell"></div>
      </div>
<!--
	<div class="Linkz_box">
	<div class="Linkz_areal">
	<p>1</p>
	</div>
	<div class="Linkz_arear">
	<ul>
	<li>- Great area, love living here... <a href="#">read full review	</a></li>
	</ul>
	</div>
	</div>
	<div class="Linkz_box">
	<div class="Linkz_areal">
	<p>2</p>
	</div>
	<div class="Linkz_arear">
	<ul>
	<li>- Great area, love living here... <a href="#">read full review	</a></li>
	</ul>
	</div>
	</div>
	<div class="Linkz_box">
	<div class="Linkz_areal">
	<p>3</p>
	</div>
	<div class="Linkz_arear">
	<ul>
	<li>- Great area, love living here... <a href="#">read full review	</a></li>
	</ul>
	</div>
	</div>
	<div class="Linkz_box">
	<div class="Linkz_areal">
	<p>4</p>
	</div>
	<div class="Linkz_arear">
	<ul>
	<li>- Great area, love living here... <a href="#">read full review	</a></li>
	</ul>
	</div>
	</div>

  -->
	</div>
	</div>
	<div class="maps_right">
	<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="30" /></div>
	<div class="clear"></div>
	<div style="margin: 10px auto;">

		<!-- <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}map.jpg" alt="" width="480" height="311"/> -->
		<?php //adiGetMap($adiPropDetails[lat], $adiPropDetails[lng],'Hiiiiiii');?>



		<div style="width: 480px; border: 0px solid red;">
	      <div style="margin-bottom: 5px;">
	        <div>
	          <!-- <input type="text" id="queryInput" value="pizza" style="width: 150px;"/>
	          <input type="button" value="Find" onclick="doSearch()"/> -->
	        </div>
	      </div>

	      <div id="map" style="height: 350px; border: 1px solid #979797;"></div>
	    </div>
        <!-- <div id="map_canvas"></div> -->

	<!-- http://aditya/keylinkz/module/realestate/static/jscript/g.js
	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">google.load("jquery", "1.4.2");</script>
	<script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>-->


	</div>
	<div class="clear"></div>
	<div><a href="#">View larger map</a></div>
	</div>
	</div>
	<div class="clear"></div>
	<div class="price_history">
	<div><h1>Price History</h1></div>
	<div class="clear"></div>
	<div style="margin: 0 auto; float: left; width: 656px;">
	  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="history">
        <tr>
          <td>
            <table width="654" border="0" align="left" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #e1e1e1; margin: 0 auto;">
              <tr>
                <td width="96"><strong>Date</strong></td>
                <td width="104"><strong>Description</strong></td>
                <td width="54"><strong>Price</strong></td>
                <td width="81"><strong>% Chg</strong></td>
                <td width="14">&nbsp;</td>
                <td width="17">&nbsp;</td>
                <td width="80"><strong>$/sqft</strong></td>
                <td width="204"><strong>Source</strong></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>

			{php} adiGetPriceHistory(); {/php}

		  <!-- <table width="100%" border="0" cellspacing="0" cellpadding="0" class="historybg">
            <tr>
              <td width="98">09/14/2010</td>
              <td width="102">Price change</td>
              <td width="55">$169,900</td>
              <td width="78" style="color:#097f41;">-14.6%</td>
              <td width="16">&nbsp;</td>
              <td width="17">&nbsp;</td>
              <td width="81">$157</td>
              <td width="203"><a href="#"><strong>Charles Smith Agency, Inc.</strong></a></td>
            </tr>
          </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="historybg">
            <tr>
              <td width="98">09/14/2010</td>
              <td width="102">Price change</td>
              <td width="55">$169,900</td>
              <td width="78" style="color:#ce0606;">-14.6%</td>
              <td width="16">&nbsp;</td>
              <td width="17">&nbsp;</td>
              <td width="81">$157</td>
              <td width="203"><a href="#"><strong>Charles Smith Agency, Inc.</strong></a></td>
            </tr>
          </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="historybg">
            <tr>
              <td width="98">09/14/2010</td>
              <td width="102">Price change</td>
              <td width="55">$169,900</td>
              <td width="78" style="color:#097f41;">-14.6%</td>
              <td width="16">&nbsp;</td>
              <td width="17">&nbsp;</td>
              <td width="81">$157</td>
              <td width="203"><a href="#"><strong>Charles Smith Agency, Inc.</strong></a></td>
            </tr>
          </table>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="historybg">
            <tr>
              <td width="98">09/14/2010</td>
              <td width="102">Price change</td>
              <td width="55">$169,900</td>
              <td width="78" style="color:#ce0606;">-14.6%</td>
              <td width="16">&nbsp;</td>
              <td width="17">&nbsp;</td>
              <td width="81">$157</td>
              <td width="203"><a href="#"><strong>Charles Smith Agency, Inc.</strong></a></td>
            </tr>
          </table> -->
		  </td>
        </tr>
      </table>
	</div>
	<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="20"/></div>

	<div class="contact_agent">
      <h1>Contact Agent</h1>
	  <div class="small_profile19">
        <div class="pix"><img src="{php} echo adiGetUserImage($adiPropDetails[agent_id]); {/php}" alt="" width="72" height="70"/></div>
	    <div class="rating" style="width:350px;">
          <h2><a href="{$agent_profile_url}">{php}echo $adiUserDetails[full_name]; {/php}</a> {php} echo adiGetProfileBadge(adiGetDisplayedUserGroupId()); {/php}</h2>


          <div style="width:100%;">
          <p style="width:40px;height:15px; float:left;">Rating &nbsp;
              <div style="float:left; width:165px; margin:6px 0 0 6px;">
                  <div class="exemple2" id="{$rate}_5"></div>
                  <span style="float:right; margin-top:-15px;">&nbsp;<a href="{$info_url}">[{$count_review} Reviews]</a></span>
              </div>
          </p>
          </div>
          <div class="clear"></div>
	      <p><span style="width:145px;height:15px; float:left;">Contributions:</span><span style="float:left;">&nbsp;<a href="#">[106]</a></span></p>
          <div class="clear"></div>
            {if $agent_id neq $logged_user_id}
            <p>
                <span style="float:left;">
                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate/review').id_.$adiPropDetails[agent_id];{/php}">Write a Review</a>
                </span>
            </p>
            {/if}
	      </div>
	    </div>
	  <div class="clear"></div>
	  <div>
        <div class="agentform19">
          <ul>
            <li>
              <input name="name_bot" type="text" class="agenttxtfield19" id="name_bot" value="Your Name" />
              <span id="name_err" style="display: block; color: red;"></span>
            </li>
            <li>
              <input name="email_bot" type="text" class="agenttxtfield19" id="email_bot" value="Your Email" />
          	  <span id="email_err" style="display: block; color: red;"></span>
            </li>
            <li>
              <input name="phno_bot" type="text" class="agenttxtfield19" id="phno_bot" value="Your Phone no." />
              <span id="phno_err" style="display: block; color: red;"></span>
            </li>
            <li>
              <textarea name="message_bot" class="textarea_agent19" id="message_bot" cols="45" rows="5"></textarea>
			  <span id="message_err" style="display: block; color: red;"></span>
              <span style="margin: 0 8px;">
              <input type="submit" name="btnContactAgent_bot" id="btnContactAgent_bot" value="Send Message" class="search_btn_global" onClick="$.ajaxCall('realestate.contactAgent', 'param='+$('#name_bot').val()+'::'+$('#email_bot').val()+'::'+$('#phno_bot').val()+'::'+$('#message_bot').val()+'::'+$('#agentEmail').val())"/>
              </span>
            </li>
           <!-- <li style="text-align: right;">
              <input type="submit" name="button22" id="button22" value="Send Message" class="search_btn_global" />
            </li>-->
          </ul>
        </div>
	    </div>
	  </div>
	  <div class="clear"></div>


	{if !Phpfox::isUser()}
	  <div class="green_box">
	  <div class="green_boxl"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}signup_icon.png" alt="" width="105" height="105" /></div>
	  <div class="green_boxr">
	  <div>
	  <h1>Sign up for a KeyLinkz account</h1>
	  </div>
	  <div class="clear"></div>
	 <div class="yellow_text">One step sign up</div>
	 <div class="clear"></div>
	 <div>
	  connect, save to your favorits, ask questions, post feedback and much more...</div>
	  <div class="clear"></div>
	  <div style="float: right; margin: 9px auto; width: 90px;"><input type="submit" name="button22" id="button22" value="REGISTER" class="search_btn_global" /></div>
	</div>
	</div>
	{/if}
	</div>
	</div>
	<div class="rightcol">

    <div class="agentbox">
		<h1>Contact Agent</h1>
        <div class="small_profile">
        	<div class="pix"><img src="{php} echo adiGetUserImage($adiPropDetails[agent_id]); {/php}" alt="" width="72" height="70" /></div>
            <div class="rating">
            <h2><a href="{$agent_profile_url}">{php}echo $adiUserDetails[full_name]; {/php}</a>{php} echo adiGetProfileBadge(adiGetDisplayedUserGroupId()); {/php}</h2>

              <div>
              <p style="width:40px;height:15px; float:left;">Rating &nbsp;
                  <div style="float:left; width:150px; margin:6px 0 0 6px;">
                      <div class="exemple2" id="{$rate}_5"></div>
                      <span style="float:right; margin-top:-15px;">&nbsp;<a href="{$info_url}">[{$count_review} Reviews]</a></span>
                  </div>
              </p>
              </div>

            <div class="clear"></div>
            <p>Contributions:<span style="float:right;">&nbsp;<a href="#">[{php} echo adiGetDisplayedUserActPoint(); {/php}]</a></span></p>

            {if $agent_id neq $logged_user_id}
            <p>
                <span style="float:left;">
                {php} if (isUserRated($adiPropDetails[agent_id]) > 0) { {/php}
                    <a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate/review').id_.$adiPropDetails[agent_id];{/php}">Write a Review</a>
                {php} } else { {/php}
					You have rated this user
                {php} } {/php}
                </span>
            </p>

            {/if}
            </div>
        </div>
        <div class="clear"></div>
        <div>

		        <div class="agentform">
		        	<ul>
		            <li><input name="name" type="text" class="agenttxtfield" id="name" value="Your Name" onClick="this.value=''" /></li>
		            <li><input name="email" type="text" class="agenttxtfield" id="email" value="Your Email" onClick="this.value=''" /></li>
		            <li><input name="phno" type="text" class="agenttxtfield" id="phno" value="Your Phone No." onClick="this.value=''" /></li>
		            <li><textarea name="message" class="textarea_agent" id="message" cols="45" rows="5"></textarea></li>
		           	<input type="hidden" id="agentEmail" value="{php} echo $adiUserDetails[email]; {/php}">
		            <li style="text-align: right;">
		              <input type="submit" name="btnContactAgent" id="btnContactAgent" value="Send Message" class="search_btn_global" onClick="$.ajaxCall('realestate.contactAgent', 'param='+$('#name').val()+'::'+$('#email').val()+'::'+$('#phno').val()+'::'+$('#message').val()+'::'+$('#agentEmail').val())" />
		            </li>
		            </ul>
		        </div>

        </div>
		</div>

		<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>
		<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}right_banner.jpg" alt="" width="308" height="251" border="0" usemap="#Map" />
<map name="Map" id="MapImageButton"><area shape="rect" coords="20,159,135,198" href="#" /></map></div>
       <div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>



       <div class="agentbox">
		<h1>Similar Properties</h1>


        {php}
		foreach ($dataSimilar as $similar)
        { {/php}
        <div class="small_profilebg">
        	<div class="pix_bg"><img src="{php} echo PHPFOX_REALESTAE_IMAGE_UPLOAD; {/php}{php} echo $similar['image_path']; {/php}" alt="" width="95" height="66" class="border3" /></div>
            <div class="rating_bg">
            <h2>{php} echo $similar['no_of_rooms']; {/php} Bedroom {php} echo $similar['no_of_bathrooms']; {/php} Bath</h2>
			<p>{php} echo $similar['address']; {/php}</p>
			<!-- <div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="25"/></div> -->
			<div style="text-align: right;"><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}id_{php} echo $similar['id']; {/php}">View Listing</a></div>
            </div>
        </div>
        <div class="clear"></div>
        {php}
        }
        {/php}


        <div class="clear"></div>
		<div class="see_all" style="text-align: right;"><a href="#">See all</a></div>
        <div>
        </div>
		</div>





		<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="6"/></div>


			{block location='3'}

		<!-- <div class="agentbox">
		<h1>Mortgage Services</h1>
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
		</div>-->
        </div>
        </div>
       <!-- </div> -->
   <!--body content end-->
<div class="clear"></div>



{literal}

<style type="text/css">
#main_content{
margin-left:0px;
}
</style>
{/literal}