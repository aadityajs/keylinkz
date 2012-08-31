<?php
$id = $_GET["id"];
$con = mysql_connect("localhost","root","");
$db =mysql_select_db("keylinkz",$con);
$sql = "SELECT images from keylinkz_realestate where realestate_id=".$id;
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$image_str = $row["images"];
$image_arr = explode(',',$image_str);
?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Galleriffic | Insert an image into the gallery after initialization</title>
        
            <link rel="stylesheet" href="css/basic.css" type="text/css" />
            <link rel="stylesheet" href="css/galleriffic-4.css" type="text/css" />
            <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
            <script type="text/javascript" src="js/jquery.history.js"></script>
            <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
            <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
            <!-- We only want the thunbnails to display when javascript is disabled -->
            <script type="text/javascript">
                document.write('<style>.noscript { display: none; }</style>');
            </script>
        
	</head>
	<body>
		<div id="page" style="width:770px;">
		  <div id="container" style="width:770px;">
            
            <div style="width:160px; float: left; padding:17px 0 0 15px;">
              <div id="thumbs" class="navigation">
                    <ul class="thumbs noscript">
                    
					<?php
                    for($i=0; $i<count($image_arr); $i++)
                    {
						$image = 'http://aditya/keylinkz/module/realestate/static/image/upload/'.$image_arr[$i];
                    ?>
                    <li>
                        <a class="thumb" name="leaf" href="<?php echo $image; ?>" title="Title #0">
                            <img src="<?php echo $image; ?>" width="30" height=" 35"/>
                        </a>
                        <div class="caption">
                            <div class="download">
                                <a href="<?php echo $image; ?>"></a>
                            </div>
                        </div>
                    </li>
                    <?php
					}
					?>

<!--                        <li>
                            <a class="thumb" name="drop" href="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9.jpg" title="Title #1">
                                <img src="http://farm3.static.flickr.com/2404/2538171134_2f77bc00d9_s.jpg" alt="Title #1" width="30" height=" 35"/>
                            </a>
                            <div class="caption">
                                Any html can be placed here ...
                            </div>
                        </li>

                        <li>
                            <a class="thumb" name="bigleaf" href="http://farm3.static.flickr.com/2093/2538168854_f75e408156.jpg" title="Title #2">
                                <img src="http://farm3.static.flickr.com/2093/2538168854_f75e408156_s.jpg" alt="Title #2" width="30" height=" 35"/>
                            </a>
                            <div class="caption">
                                <div class="download">
                                    <a href="http://farm3.static.flickr.com/2093/2538168854_f75e408156_b.jpg">Download Original</a>
                                </div>
                                <div class="image-title">Title #2</div>
                                <div class="image-desc">Description</div>
                            </div>
                        </li>

                        <li>
                            <a class="thumb" name="lizard" href="http://farm4.static.flickr.com/3153/2538167690_c812461b7b.jpg" title="Title #3">
                                <img src="http://farm4.static.flickr.com/3153/2538167690_c812461b7b_s.jpg" alt="Title #3" width="30" height=" 35"/>
                            </a>
                            <div class="caption">
                                <div class="download">
                                    <a href="http://farm4.static.flickr.com/3153/2538167690_c812461b7b_b.jpg">Download Original</a>
                                </div>
                                <div class="image-title">Title #3</div>
                                <div class="image-desc">Description</div>
                            </div>
                        </li>

                        <li>
                            <a class="thumb" href="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18.jpg" title="Title #4">
                                <img src="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18_s.jpg" alt="Title #4" width="30" height=" 35"/>
                            </a>
                            <div class="caption">
                                <div class="download">
                                    <a href="http://farm4.static.flickr.com/3150/2538167224_0a6075dd18_b.jpg">Download Original</a>
                                </div>
                                <div class="image-title">Title #4</div>
                                <div class="image-desc">Description</div>
                            </div>
                        </li>
-->
                    </ul>
                </div>
             </div>   
             
             <div style="width:570px; float: left; padding:0 0 10px 20px;">
				<div id="gallery" class="content">
					
					<div class="slideshow-container">
						<div id="loading" class="loader"></div>
						<div id="slideshow" class="slideshow">
                        
                        </div>
					</div>
				</div>
             <!-- <div style="clear: both;"></div>
              <div style="text-align:right; padding:10px 20px 0 0;"><strong><a href="#">Close</a></strong></div>  -->
            </div>   
                
                
				<!-- End Advanced Gallery Html Containers -->
                </div>
            <div style="clear: both;"></div>
		</div>
        
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '300px', 'float' : 'left'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});

				// Enable toggling of the caption
				var captionOpacity = 0.0;
				$('#captionToggle a').click(function(e) {
					var link = $(this);
					
					var isOff = link.hasClass('off');
					var removeClass = isOff ? 'off' : 'on';
					var addClass = isOff ? 'on' : 'off';
					var linkText = isOff ? 'Hide Caption' : 'Show Caption';
					captionOpacity = isOff ? 0.7 : 0.0;

					link.removeClass(removeClass).addClass(addClass).text(linkText).attr('title', linkText);
					$('#caption span.image-caption').fadeTo(1000, captionOpacity);
					
					e.preventDefault();
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             true,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onTransitionOut:           function(slide, caption, isSync, callback) {
						slide.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0, callback);
						caption.fadeTo(this.getDefaultTransitionDuration(isSync), 0.0);
					},
					onTransitionIn:            function(slide, caption, isSync) {
						var duration = this.getDefaultTransitionDuration(isSync);
						slide.fadeTo(duration, 1.0);
						
						// Position the caption at the bottom of the image and set its opacity
						var slideImage = slide.find('img');
						caption.width(slideImage.width())
							.css({
								'bottom' : Math.floor((slide.height() - slideImage.outerHeight()) / 2),
								'left' : Math.floor((slide.width() - slideImage.width()) / 2) + slideImage.outerWidth() - slideImage.width()
							})
							.fadeTo(duration, captionOpacity);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					},
					onImageAdded:              function(imageData, $li) {
						$li.opacityrollover({
							mouseOutOpacity:   onMouseOutOpacity,
							mouseOverOpacity:  1.0,
							fadeSpeed:         'fast',
							exemptionSelector: '.selected'
						});
					}
				});

				/**** Functions to support integration of galleriffic with the jquery.history plugin ****/

				// PageLoad function
				// This function is called when:
				// 1. after calling $.historyInit();
				// 2. after calling $.historyLoad();
				// 3. after pushing "Go Back" button of a browser
				function pageload(hash) {
					// alert("pageload: " + hash);
					// hash doesn't contain the first # character.
					if(hash) {
						$.galleriffic.gotoImage(hash);
					} else {
						gallery.gotoIndex(0);
					}
				}

				// Initialize history plugin.
				// The callback is called at once by present location.hash. 
				$.historyInit(pageload, "advanced.html");

				// set onlick event for buttons using the jQuery 1.3 live method
				
			});
		</script>
        
	</body>
</html>