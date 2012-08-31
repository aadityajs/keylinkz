{php}

$PropId = Phpfox::getLib('request')->getInt('id');
$adiPropDetails = adiGetPropDetails($PropId);
$adiUserDetails = adiGetUser($adiPropDetails[agent_id]);

{/php}


<body onload="window.print();">
<div class="leftcol" style="margin-left:180px;">
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
                        {php}adiDateDiff($adiPropDetails[date_added]);{/php}</td>
                    </tr>
                    <tr>

                      <td colspan="2" style="padding: 10px 0; border-bottom: 1px solid #CCCCCC;"><div class="fact"><a href="#" onclick="$.ajaxCall('realestate.moreFacts');">More Facts</a></div></td>
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
						<li><a href="javascript:void(0);" class="here" onclick="$.ajaxCall('realestate.applyLease');">Apply for Lease</a></li>
						<li><a href="javascript:void(0);" onclick="$.ajaxCall('realestate.mortgageCalc');">Mortgage Calculator</a></li>
						<li><a href="javascript:void(0);" onclick="$.ajaxCall('realestate.roommatesWanted');">Roommates Wanted</a></li>
						<li><a href="javascript:void(0);" onclick="$.ajaxCall('realestate.scheduleViewing');">Schedule a Viewing</a></li>
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
          <td width="54%"><table width="350" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>

              <table width="350" border="2" cellspacing="0" cellpadding="0">
				<tr>
				 <td style="padding: 11px 0;">
                  <img src="{php} echo PHPFOX_REALESTAE_IMAGE_UPLOAD; {/php}{php}echo $adiPropDetails[image_path];{/php}" alt="" width="350" height="263"/>
                  </td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" style="padding: 8px 0;">
                    <tr>


                      <td width="7%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}left.gif" alt="" width="23" height="48" /></td>
                      <td width="14%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img.gif" alt="" width="46" height="46" /></td>
                      <td width="13%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img1.gif" alt="" width="46" height="46" /></td>
                      <td width="13%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img2.gif" alt="" width="46" height="46" /></td>
                      <td width="13%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img3.gif" alt="" width="46" height="46" /></td>
                      <td width="13%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img4.gif" alt="" width="46" height="46" /></td>
                      <td width="13%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}img5.gif" alt="" width="46" height="46" /></td>
                      <td width="14%"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}right.gif" alt="" width="23" height="48" /></td>


                    </tr>
                  </table></td>
                </tr>
                <tr>
     <td><table width="24" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: center; margin: 0 0 0 160px;">
                    <tr>
                      <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}circle.gif" alt="" width="8" height="11" /></td>
                      <td><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}circle1.gif" alt="" width="8" height="11" /></td>
                    </tr>
                  </table></td>
                </tr>

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
              <td><span style="color:#535354; line-height: 18px; font-size: 12px; padding: 0 10px 0 0;">
						 {php}echo adiExcerpt($adiPropDetails[realestate_desc]);{/php}
              	  <a href="#" style="text-decoration: underline;">Read more</a></span></td>
            </tr>
          </table></td>
        </tr>
      </table>
     </div>
	 <div class="clear"></div>
	 <div class="listbox_bot">
	 <ul>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon.gif" alt="" width="16" height="13" /><a href="javascript:void(0);" onclick="$.ajaxCall('realestate.emailListing');">Email Listing</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon1.gif" alt="" width="16" height="13" /><a href="javascript:void(0);" onclick="$.ajaxCall('realestate.addToFavourite' , 'param={php}echo $adiPropDetails[realestate_id];{/php}')">Add to favorites</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon2.gif" alt="" width="16" height="13" /><a href="#">Contact Lister</a></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon3.gif" alt="" width="16" height="13" /></li>
         <li>
         	<!-- <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon6.gif" alt="" width="16" height="16" /> <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon5.gif" alt="" width="16" height="16" hspace="3" /> <img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon4.gif" alt="" width="16" height="16" hspace="3" /> -->
         	<!-- AddThis Button BEGIN -->
			<script type="text/javascript">
				var addthis_config = {
				      ui_cobrand: "Joystiq"
				}
			</script>
			<div class="addthis_toolbox addthis_default_style " addthis:url="{php} echo Phpfox::getLib('url')->makeUrl('realestate'); {/php}add/id_{$listProp.id}">
			<a class="addthis_button">Share</a>
			<a class="addthis_button_facebook"></a>
			<a class="addthis_button_twitter"></a>
			<a class="addthis_button_compact"></a>

			<!--<a href="http://www.addthis.com/bookmark.php" class="addthis_button_email">
	        <img src="http://s7.addthis.com/button1-email.gif" width="54" height="16" border="0" alt="Email" /></a>
			<a class="addthis_counter addthis_bubble_style"></a> -->
			</div>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f8bcbfd70c726e4"></script>
			<!-- AddThis Button END -->

         </li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="10" height="1"/></li>
         <li><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon7.gif" alt="" width="16" height="16"/> Map</li>
         <li><a href="{php}echo Phpfox::getLib('url')->makeUrl('realestate');{/php}print/"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME_ICON; {/php}list_icon8.gif" alt="" width="16" height="16"/> Print</a></li>
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
	<li><a href="#" class="here">Schools</a></li>
	<li><a href="#">Trasnportation	Shops</a></li>
	<li><a href="#">Mall</a></li>
	<li><a href="#">Theatres</a></li>
	<li><a href="#">Restaurants</a></li>
	<li><a href="#">Parks</a></li>
	<li><a href="#">Museums</a></li>
	</ul>
	</div>
	<div class="clear"></div>
	<div class="Linkz_area">
	<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}linkz_area.png" alt="" width="162" height="19" /></div>
	<div class="clear"></div>
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
	</div>
	</div>
	<div class="maps_right">
	<div><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="30" /></div>
	<div class="clear"></div>
	<div style="margin: 10px auto;">

		<!-- <script src="http://maps.google.com/maps?file=api&v=1&key=AIzaSyDp23vKVBtMiJa6jVO18OyRX8AN_8-Pt7M" type="text/javascript"></script>

		<script type="text/javascript">
		var map = new GMap(document.getElementById("getmap"));
		var point = new GPoint(<?php echo $longitude; ?>,<?php echo $latitude; ?>);
		var address = 'Maharajas College | Cochin';
		var mark = createInfoMarker(point, address);
		map.addOverlay(mark);
		function createInfoMarker(point, address) {
		 var marker = new GMarker(point);
		 map.centerAndZoom(point, 1);

		 GEvent.addListener(marker, "click",
		 function() {
		 marker.openInfoWindowHtml(address);
		 }
		 );
		 return marker;
		}
		</script>
		<div id="getmap" style="width: 480px; height: 311px"></div>-->

		<img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}map.jpg" alt="" width="480" height="311"/>
		<?php //adiGetMap($adiPropDetails[lat], $adiPropDetails[lng]); ?>


	     <style type="text/css">
      #map-container {
        padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
        width: 600px;
      }

      #map1 {
        width: 600px;
        height: 400px;
      }

    </style>


	<!-- http://aditya/keylinkz/module/realestate/static/jscript/g.js
	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">google.load("jquery", "1.4.2");</script>
	<script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0a1/jquery.mobile-1.0a1.min.js"></script>-->


    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://aditya/keylinkz/module/realestate/static/jscript/markerclusterer.js"></script>

    <script type="text/javascript">
    function initialize() {
        var center = new google.maps.LatLng(37.4419, -122.1419);

        var map = new google.maps.Map(document.getElementById('map1'), {
          zoom: 3,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var markers = [];
        /* for (var i = 0; i < 10; i++) {
          var dataPhoto = data.photos[i];
          var latLng = new google.maps.LatLng(dataPhoto.latitude,
              dataPhoto.longitude);
          var marker = new google.maps.Marker({
            position: latLng
          });
          markers.push(marker);
        } */
        var latLng = new google.maps.LatLng(22.583585, 88.363037);
        var marker = new google.maps.Marker({
            position: latLng
          });
          markers.push(marker);

        var howrah = new google.maps.LatLng(22.583582, 88.363037);
        var marker = new google.maps.Marker({
            position: howrah
          });
          markers.push(marker);

        var markerCluster = new MarkerClusterer(map, markers);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	 <div id="map-container"><div id="map1"></div></div>









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

		  </td>
        </tr>
      </table>
	</div>
	<div class="clear"><img src="{php} echo PHPFOX_DIR_DEFAULT_THEME; {/php}spacer.gif" alt="" width="1" height="20"/></div>

	
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
    
</body>