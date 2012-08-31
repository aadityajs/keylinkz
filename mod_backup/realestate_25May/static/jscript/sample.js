// JavaScript Document

function showDiv(id)
{
	if(id=='is_rent')
	{
		document.getElementById("sale_div").style.display = 'none';
		document.getElementById("rent_div").style.display = 'block';
	}
	if(id=='is_sale')
	{
		document.getElementById("rent_div").style.display = 'none';
		document.getElementById("sale_div").style.display = 'block';
	}
}

function confirmDelete(id)
{
	var result = confirm("Do you really want to delete the entry?");	
	if(result==true)
		window.location="index.php?do=/admincp/realestate/add/delete_"+id;
	else
		return false;
}


/**
* Called on the intiial page load.
*/


/*
var map, map2;
var marker, marker2;
function init() {
var mapCenter = new google.maps.LatLng(0, 0);

  map = new google.maps.Map(document.getElementById('map'), {
  zoom: 2,
  center: mapCenter,
  mapTypeId: google.maps.MapTypeId.ROADMAP			//ROADMAP, HYBRID,SATELLITE,TERRAIN
});

 

marker = new RichMarker({
  position: mapCenter,
  map: map,
  draggable: true,
  flat: true,
  content: '<div class="my-marker"><img src="module/realestate/static/image/m3.png" height="40px" width="40px" style="margin:-15px 0px 0 10px;"></div>'
  });

google.maps.event.addListener(marker, 'position_changed', function() {
  log("<b>Locatinal position :</b> "+marker.getPosition());
});

}

function log(msg) {
	var log = document.getElementById('log');
	log.innerHTML = msg;
	document.getElementById('position').value = msg;
}
*/
/*
var map;
function initialize() 
{
	var myOptions = 
	{
	  zoom: 2,
	  center: new google.maps.LatLng(0, 0),
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);
*/


/*  CALL on BODY onload for property details page */


function initialize(lat,lng) 
{
	var myLatlng = new google.maps.LatLng(lat, lng);
	var myOptions = 
	{
		zoom: 2,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
	
	var marker = new google.maps.Marker({
		position: myLatlng, 
		map: map,
		title:"Hello World!"
	});   
}
/*
  $(function() {
			 
   
   var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
	
	
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
	
	
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
	
	
  });

    $(function() {
        $('#galleryLightbox a').lightBox({
			imageLoading:			'module/realestate/static/image/lightbox-ico-loading.gif',		// (string) Path and the name of the loading icon
			imageBtnPrev:			'module/realestate/static/image/lightbox-btn-prev.gif',			// (string) Path and the name of the prev button image
			imageBtnNext:			'module/realestate/static/image/lightbox-btn-next.gif',			// (string) Path and the name of the next button image
			imageBtnClose:			'module/realestate/static/image/lightbox-btn-close.gif',		// (string) Path and the name of the close btn
			imageBlank:				'module/realestate/static/image/lightbox-blank.gif',			// (string) Path and the name of a blank image (one pixel)
			});
    });


$(document).ready(function(){
		$('.basic').jRating({
			bigStarsPath : 'module/realestate/static/image/icons/stars.png',
			smallStarsPath : 'module/realestate/static/image/icons/small.png',
			isDisabled:true
		});
		
		$('.exemple2').jRating({
			type:'small',
			bigStarsPath : 'module/realestate/static/image/icons/stars.png',
			smallStarsPath : 'module/realestate/static/image/icons/small.png',
			isDisabled:true
		});
		
	});

*/








