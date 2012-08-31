<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 *
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: list.class.php 1604 2010-05-31 06:42:26Z Raymond_Benc $
 */
class Realestate_Component_Controller_Index extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		//error_reporting(1);
		$logged_user_id = Phpfox::getUserBy('user_id');

		if(isset($_POST["hiddenEmail"]))
		{

			$from = $_POST["name"];
			$to = $_POST["email"];
			$message = $_POST["message"];
			mail($to, $from, $message);
		}

		if(isset($_POST["addToFav"]))
		{
			Phpfox::getService('realestate.realestate')->addToFavourite($_POST);
		}

		//Phpfox::isUser(true);
		$this->template()-> assign('foo','bar');

		function getSimilarProperties()
		{

			$idReal = Phpfox::getLib('request')->getInt('id');
			$qSimilar = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate WHERE realestate_id !='.$idReal);
			$i = 0;
			while($resultSimilar = mysql_fetch_array($qSimilar))
			{
				$dataSimilar[$i]["id"] = $resultSimilar["realestate_id"];
				$dataSimilar[$i]["title"] = $resultSimilar["realestate_title"];
				$dataSimilar[$i]["desc"] = $resultSimilar["realestate_desc"];
				$dataSimilar[$i]["no_of_rooms"] = $resultSimilar["no_of_rooms"];
				$dataSimilar[$i]["no_of_bathrooms"] = $resultSimilar["no_of_bathrooms"];
				$dataSimilar[$i]["image_path"] = $resultSimilar["image_path"];
				$dataSimilar[$i]["total_square_foot"] = $resultSimilar["total_square_foot"];
				$dataSimilar[$i]["is_rent"] = $resultSimilar["is_rent"];
				$dataSimilar[$i]["is_sale"] = $resultSimilar["is_sale"];
				$dataSimilar[$i]["price_per_month"] = $resultSimilar["price_per_month"];
				$dataSimilar[$i]["total_price"] = $resultSimilar["total_price"];

				// extra details
				$dataSimilar[$i]["address"] = $resultSimilar["address"];
				$dataSimilar[$i]["server_id"] = $resultSimilar["server_id"];
				$dataSimilar[$i]["realestate_type"] = $resultSimilar["realestate_type"];
				$dataSimilar[$i]["date_added"] = $resultSimilar["date_added"];
				$dataSimilar[$i]["year_build"] = $resultSimilar["year_build"];
				$dataSimilar[$i]["last_sold"] = $resultSimilar["last_sold"];
				$dataSimilar[$i]["parking"] = $resultSimilar["parking"];
				$dataSimilar[$i]["cooling"] = $resultSimilar["cooling"];
				$dataSimilar[$i]["heating"] = $resultSimilar["heating"];
				$dataSimilar[$i]["fireplace"] = $resultSimilar["fireplace"];
				$dataSimilar[$i]["exterior_material"] = $resultSimilar["exterior_material"];
				$dataSimilar[$i]["fenced_yard"] = $resultSimilar["fenced_yard"];
				$dataSimilar[$i]["legal_desc"] = $resultSimilar["legal_desc"];
				$dataSimilar[$i]["parcel_no"] = $resultSimilar["parcel_no"];
				$dataSimilar[$i]["per_floor_sqft"] = $resultSimilar["per_floor_sqft"];
				$dataSimilar[$i]["lat"] = $resultSimilar["lat"];
				$dataSimilar[$i]["lng"] = $resultSimilar["lng"];
				$dataSimilar[$i]["agent_id"] = $resultSimilar["agent_id"];

				$i++;
			}

			//$this->template()-> assign('similarData',$dataSimilar);
/*			echo '<pre>'.print_r($dataSimilar,true).'</pre>';
			exit;
*/			return $dataSimilar;

		}
		/**
		 * @author Aditya jyoti Saha
		 * @method adiGetPropDetails()
		 *
		 */

		// Get data
		function adiGetPropDetails($PropId) {
		$adiPropData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_realestate WHERE realestate_id='.$PropId );

		$adiPropDet = mysql_fetch_array($adiPropData);
		return $adiPropDet;

		/*$i = 0;
		while($adiPropRow = mysql_fetch_array($adiPropData)) {

			$adiPropDet[$i]["id"] = $adiPropRow["realestate_id"];
			$adiPropDet[$i]["title"] = $adiPropRow["realestate_title"];
			$adiPropDet[$i]["desc"] = $adiPropRow["realestate_desc"];
			$adiPropDet[$i]["no_of_rooms"] = $adiPropRow["no_of_rooms"];
			$adiPropDet[$i]["no_of_bathrooms"] = $adiPropRow["no_of_bathrooms"];
			$adiPropDet[$i]["image_path"] = $adiPropRow["image_path"];
			$adiPropDet[$i]["total_square_foot"] = $$adiPropRow["total_square_foot"];
			$adiPropDet[$i]["is_rent"] = $adiPropRow["is_rent"];
			$adiPropDet[$i]["is_sale"] = $adiPropRow["is_sale"];
			$adiPropDet[$i]["price_per_month"] = $adiPropRow["price_per_month"];
			$adiPropDet[$i]["total_price"] = $adiPropRow["total_price"];

			// extra details
			$adiPropDet[$i]["address"] = $adiPropRow["address"];
			$adiPropDet[$i]["server_id"] = $adiPropRow["server_id"];
			$adiPropDet[$i]["realestate_type"] = $adiPropRow["realestate_type"];
			$adiPropDet[$i]["date_added"] = $adiPropRow["date_added"];
			$adiPropDet[$i]["year_build"] = $adiPropRow["year_build"];
			$adiPropDet[$i]["last_sold"] = $adiPropRow["last_sold"];
			$adiPropDet[$i]["parking"] = $adiPropRow["parking"];
			$adiPropDet[$i]["cooling"] = $adiPropRow["cooling"];
			$adiPropDet[$i]["heating"] = $adiPropRow["heating"];
			$adiPropDet[$i]["fireplace"] = $adiPropRow["fireplace"];
			$adiPropDet[$i]["exterior_material"] = $adiPropRow["exterior_material"];
			$adiPropDet[$i]["fenced_yard"] = $adiPropRow["fenced_yard"];
			$adiPropDet[$i]["legal_desc"] = $adiPropRow["legal_desc"];
			$adiPropDet[$i]["parcel_no"] = $adiPropRow["parcel_no"];
			$adiPropDet[$i]["per_floor_sqft"] = $adiPropRow["per_floor_sqft"];
			$adiPropDet[$i]["lat"] = $adiPropRow["lat"];
			$adiPropDet[$i]["lng"] = $adiPropRow["lng"];
			$adiPropDet[$i]["agent_id"] = $adiPropRow["agent_id"];

			$i++;

		} */


		}

		// Assign template vars
		//$this->template()->assign('adiGetPropDetails()',adiGetPropDetails());
		//$adiPropDet1 = adiGetPropDetails(5);
		//var_dump($adiPropDet1);


		/**
		 * @author Aditya Jyoti Saha
		 * @name adiDateDiffFormated()
		 */

		function adiDateDiffFormated($startDate) {
			$date1 = $startDate;
			$date2 = date("Y-m-d H:i:s");	//2012-04-05 06:45:19

			$diff = abs(strtotime($date2) - strtotime($date1));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			return printf("%d years, %d months, %d days\n", $years, $months, $days);
		}

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiGetUser()
		 */

		function adiGetUser($userId) {
			$adiUserData = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_user WHERE user_id='.$userId );
			return $adiUserDet = mysql_fetch_array($adiUserData);
		}

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiExcerpt()
		 */

		function adiExcerpt($text, $toChars) {

			$text = strip_tags($text);

			if ($toChars == "" || $toChars == 0) $toChars = 300;

			if (strlen($text) > $toChars) {
			  $text = substr($text, 0, $toChars);
			  $text = substr($text,0,strrpos($text," "));
			  $etc = " ...";
			  $excerptedText = $text.$etc;
			  }
			return $excerptedText;
		}

		/**
		 * @author Aditya Jyoti Saha
		 * @name adiGetMap()
		 */

		function adiGetMap($lat, $lng, $markerText, $height, $width) {

			if ($height == "" || $width == "") {
				$height = 311;
				$width = 470;
			}
			//echo $lat.'-----'.$lng;
			//$this->template()->setHeader('markerclusterer.js', 'module_realestate');
			echo '<style type="text/css">
				      #map-container {
				        padding: 6px;
				        border-width: 1px;
				        border-style: solid;
				        border-color: #ccc #ccc #999 #ccc;
				        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
				        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
				        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
				        width: '.$width.'px;
				      }

				      #map1 {
				        width: '.$width.'px;
				        height: '.$height.'px;
				      }

				    </style>

				    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

				    <script type="text/javascript">
				      var script = \'<script type="text/javascript" src="../../../static/jscript/markerclusterer\';
				      if (document.location.search.indexOf(\'compiled\') !== -1) {
				        script += \'_compiled\';
				      }
				      script += \'.js"><\' + \'/script>\';
				      document.write(script);
				    </script>

				    <script type="text/javascript">
				      function initialize() {

				        var center = new google.maps.LatLng(37.4419, -122.1419);

				        var map = new google.maps.Map(document.getElementById(\'map1\'), {
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

				        var howrah = new google.maps.LatLng('.$lat.', '.$lng.');
				        var marker = new google.maps.Marker({
				            position: howrah
				          });
				          markers.push(marker);

				        var markerCluster = new MarkerClusterer(map, markers);
				      }
				      google.maps.event.addDomListener(window, \'load\', initialize);
				    </script>

				    <div id="map-container"><div id="map1"></div></div>
				    ';



		}



		/**
		 * @author Aditya Jyoti Saha
		 * @name adiGetPriceHistory()
		 */
		function adiGetPriceHistory($realestate_id) {
			$realestate_id = Phpfox::getLib('request')->getInt('id');

			$qHistory = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_price_history WHERE realestate_id ='.$realestate_id);
			$i = 0;
			while($historyData = mysql_fetch_array($qHistory))
			{
				$dataPriceHistory[$i]["price_history_id"] = $historyData["price_history_id"];
				$dataPriceHistory[$i]["realestate_id"] = $historyData["realestate_id"];
				$dataPriceHistory[$i]["type"] = $historyData["type"];
				$dataPriceHistory[$i]["price"] = $historyData["price"];
				$dataPriceHistory[$i]["change"] = $historyData["change"];
				$dataPriceHistory[$i]["date"] = $historyData["date"];
				$dataPriceHistory[$i]["price_per_sqft"] = $historyData["price_per_sqft"];
				$dataPriceHistory[$i]["source"] = $historyData["source"];
				$dataPriceHistory[$i]["status"] = $historyData["status"];

				$i++;
			}

			//$this->template()->assign('dataPriceHistory', $dataPriceHistory);

			foreach ($dataPriceHistory as $value) {
				echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" class="historybg">
			            <tr>
			              <td width="98">'.date('m/d/Y',strtotime($value[date])).'</td>
			              <td width="102">'.$value[type].'</td>
			              <td width="55">$'.number_format($value[price],2).'</td>
			              <td width="78" '.($value[change]<0?'style="color:#097f41;"':'').'>'.$value[change].'</td>
			              <td width="16">&nbsp;</td>
			              <td width="17">&nbsp;</td>
			              <td width="81">$'.$value[price_per_sqft].'</td>
			              <td width="203"><a href="#"><strong>'.$value[source].'</strong></a></td>
			            </tr>
			          </table>';
			}


			//return $dataPriceHistory;
			//var_dump($dataPriceHistory);

		}


		/**
		 * Custom methods and template vars assignment.
		 * @author Aditya Jyoti Saha
		 */
		function adiGetUserImage($userId) {

		// User profile detail
		$qImage = Phpfox::getLib('database')->query('SELECT * FROM keylinkz_user WHERE user_id ='.$userId);
		$imageData = mysql_fetch_array($qImage);

			if ($imageData[user_image] == NULL) {
				return Phpfox::getLib('url')->getDomain()."theme/frontend/default/style/default/image/noimage/profile.png";
			}
			else {

				$image = explode('.', $imageData['user_image']);
				$imageName = explode('%', $image[0]);
				$finalImage = $imageName[0].'.'.$image[1];

				return Phpfox::getLib('url')->getDomain().'file/pic/user/'.$finalImage;
			}

		}


		/**
		 *
		 * See if user is rated or not by the logged in user
		 * @author Aditya Jyoti Saha
		 * @param $toBeRate
		 */
		function isUserRated($toBeRate) {
			//echo $toBeRate;
			$logged_user_id = $loginUser = Phpfox::getUserBy('user_id');
			$rateSql = "SELECT * FROM keylinkz_user_review WHERE user_id = $toBeRate AND by_user = $logged_user_id AND rated = 'yes'";
			$rateRes = mysql_query($rateSql);
			$rateRowCount = mysql_num_rows($rateRes);
			if ($rateRowCount > 0) {
				return FALSE;
			} else {
				return TRUE;
			}


		}


		/********************************************************************************/
		/*	Getting the images for gallery
		/********************************************************************************/
		$id = Phpfox::getLib('request')->getInt('id');
		$images_sql = 'SELECT images FROM keylinkz_realestate WHERE realestate_id='.$id;
		$images_db = Phpfox::getLib('database')->query($images_sql);
		$images_row = mysql_fetch_array($images_db);
		unset($images_row[0]);
		$image_arr = explode(',',$images_row[images]);



		$userArr = adiGetPropDetails($id);
		$agent_id = $userArr['agent_id'];
		$str = Phpfox::getService('realestate')->getReviewRates($agent_id);
		$arr = explode('|',$str);
		$rate = $arr[0];
		$count_review = $arr[1];

		/**************************************************/
			#get user name
		/**************************************************/
		$user_name = Phpfox::getService('realestate')->getUserName($agent_id);
		$info_url = Phpfox::getLib('url')->makeUrl($user_name.'/info');
		$agent_profile_url = Phpfox::getLib('url')->makeUrl($user_name);


		$logged_user_id = Phpfox::getUserBy('user_id');
		$display_user_name = Phpfox::getLib('phpfox.url')->getUrl();
		$display_user_id = Phpfox::getService('profile')->getUserIdByname($display_user_name);
		if($display_user_id ==0)
		{
			$display_user_id = $logged_user_id;
			$this->template()->assign('display_user_id', $display_user_id);
		}

		$this->template()->assign('rate', $user_rate);
		$this->template()->assign('info_url', $info_url);
		$this->template()->assign('agent_profile_url', $agent_profile_url);

		$this->template()->assign('logged_user_id', $logged_user_id);
		$this->template()->assign('agent_id', $agent_id);
		$property_id = Phpfox::getLib('request')->getInt('id');
		$this->template()->assign('property_id', $property_id);
		$this->template()->assign('arrGallery', $image_arr);
		$this->template()->assign('rate', $rate);
		$this->template()->assign('count_review', $count_review);
		/*$this->template()->setHeader('<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>');*/

		$this->template()->setHeader('style.css', 'module_realestate');

		/****************************** adiV3searchmap script call ********************************/

		$this->template()->setHeader('<link href="http://www.google.com/uds/css/gsearch.css" rel="stylesheet" type="text/css"/>');
		//$this->template()->setHeader('<link href="./places.css" rel="stylesheet" type="text/css"/>');
		$this->template()->setHeader('<script src="http://maps.google.com/maps/api/js?sensor=false"></script>');
		$this->template()->setHeader('<script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0&amp;key=ABQIAAAAjU0EJWnWPMv7oQ-jjS7dYxQ82LsCgTSsdpNEnBsExtoeJv4cdBSUkiLH6ntmAr_5O4EfjDwOa0oZBQ" type="text/javascript"></script>');
		$this->template()->setHeader('adiv3searchmap.js', 'module_realestate');
		$this->template()->setHeader('places.css', 'module_realestate');


		/******************* IMAGE GALLERY *******************************************/

		/*$this->template()->setHeader('my_image_gallery.css', 'module_realestate');*/
		//$this->template()->setHeader('script.js', 'module_realestate');
		$this->template()->setHeader('jquery.ad-gallery.css', 'module_realestate');
		/*$this->template()->setHeader('jquery-1.3.2.js', 'module_realestate');*/
		$this->template()->setHeader('jquery.ad-gallery.js', 'module_realestate');
		$this->template()->setHeader('jquery.ad-gallery.pack.js', 'module_realestate');

		/******************* IMAGE GALLERY *******************************************/

		/******************* LIGHTBOX *******************************************/
		//$this->template()->setHeader('jquery.lightbox-0.5.css', 'module_realestate');
		//$this->template()->setHeader('jquery.lightbox-0.5.js', 'module_realestate');
		//$this->template()->setHeader('jquery.lightbox-0.5.min.js', 'module_realestate');
		//$this->template()->setHeader('jquery.lightbox-0.5.pack.js', 'module_realestate');
		/******************* LIGHTBOX *******************************************/

		$this->template()->setHeader('jRating.jquery.css', 'module_realestate');
		$this->template()->setHeader('jRating.jquery.js', 'module_realestate');
		$this->template()->setHeader('sample.js', 'module_realestate');
		$this->template()->setHeader('jrating-sample.js', 'module_realestate');












	}

	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.

	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('realestate.component_controller_list_clean')) ? eval($sPlugin) : false);
	}*/
}

?>