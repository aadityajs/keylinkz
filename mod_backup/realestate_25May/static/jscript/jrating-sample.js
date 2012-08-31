// JavaScript Document
		$(document).ready(function(){
			$('.mainRate').jRating({
								bigStarsPath : 'module/realestate/static/image/icons/stars.png', // path of the icon stars.png
								smallStarsPath : 'module/realestate/static/image/icons/small.png', // path of the icon small.png
								/*phpPath : 'module/realestate/include/component/ajax/ajax.class.php'*/ // path of the php file jRating.php
								phpPath : 'module/realestate/include/component/ajax/jRating.php',
								type : 'big', // can be set to 'small' or 'big'
					 			
					 			/** Boolean vars **/
					 			step:true, // if true,  mouseover binded star by star,
					 			isDisabled:false,
					 			showRateInfo: true,
					 			
					 			/** Integer vars **/
					 			length:5, // number of star to display
					 			decimalLength : 0, // number of decimals.. Max 3, but you can complete the function 'getNote'
					 			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					 			rateInfosX : -45, // relative position in X axis of the info box when mouseover
					 			rateInfosY : 5 // relative position in Y axis of the info box when mouseover
								});
			
			
		});

		$(document).ready(function(){
			$('.localRate').jRating({
								bigStarsPath : 'module/realestate/static/image/icons/stars.png', // path of the icon stars.png
								smallStarsPath : 'module/realestate/static/image/icons/small.png', // path of the icon small.png
								/*phpPath : 'module/realestate/include/component/ajax/ajax.class.php'*/ // path of the php file jRating.php
								phpPath : 'module/realestate/include/component/ajax/jRating.php',
								type : 'small', // can be set to 'small' or 'big'
					 			
					 			/** Boolean vars **/
					 			step:false, // if true,  mouseover binded star by star,
					 			isDisabled:false,
					 			showRateInfo: true,
					 			
					 			/** Integer vars **/
					 			length:5, // number of star to display
					 			decimalLength : 0, // number of decimals.. Max 3, but you can complete the function 'getNote'
					 			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					 			rateInfosX : -45, // relative position in X axis of the info box when mouseover
					 			rateInfosY : 5 // relative position in Y axis of the info box when mouseover
								});
			
			
		});
		
		$(document).ready(function(){
			$('.processRate').jRating({
								bigStarsPath : 'module/realestate/static/image/icons/stars.png', // path of the icon stars.png
								smallStarsPath : 'module/realestate/static/image/icons/small.png', // path of the icon small.png
								/*phpPath : 'module/realestate/include/component/ajax/ajax.class.php'*/ // path of the php file jRating.php
								phpPath : 'module/realestate/include/component/ajax/jRating.php',
								type : 'small', // can be set to 'small' or 'big'
					 			
					 			/** Boolean vars **/
					 			step:false, // if true,  mouseover binded star by star,
					 			isDisabled:false,
					 			showRateInfo: true,
					 			
					 			/** Integer vars **/
					 			length:5, // number of star to display
					 			decimalLength : 0, // number of decimals.. Max 3, but you can complete the function 'getNote'
					 			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					 			rateInfosX : -45, // relative position in X axis of the info box when mouseover
					 			rateInfosY : 5 // relative position in Y axis of the info box when mouseover
								});
			
			
		});
		
		$(document).ready(function(){
			$('.responseRate').jRating({
								bigStarsPath : 'module/realestate/static/image/icons/stars.png', // path of the icon stars.png
								smallStarsPath : 'module/realestate/static/image/icons/small.png', // path of the icon small.png
								/*phpPath : 'module/realestate/include/component/ajax/ajax.class.php'*/ // path of the php file jRating.php
								phpPath : 'module/realestate/include/component/ajax/jRating.php',
								type : 'small', // can be set to 'small' or 'big'
					 			
					 			/** Boolean vars **/
					 			step:false, // if true,  mouseover binded star by star,
					 			isDisabled:false,
					 			showRateInfo: true,
					 			
					 			/** Integer vars **/
					 			length:5, // number of star to display
					 			decimalLength : 0, // number of decimals.. Max 3, but you can complete the function 'getNote'
					 			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					 			rateInfosX : -45, // relative position in X axis of the info box when mouseover
					 			rateInfosY : 5 // relative position in Y axis of the info box when mouseover
								});
			
			
		});
		
		$(document).ready(function(){
			$('.negoRate').jRating({
								bigStarsPath : 'module/realestate/static/image/icons/stars.png', // path of the icon stars.png
								smallStarsPath : 'module/realestate/static/image/icons/small.png', // path of the icon small.png
								/*phpPath : 'module/realestate/include/component/ajax/ajax.class.php'*/ // path of the php file jRating.php
								phpPath : 'module/realestate/include/component/ajax/jRating.php',
								type : 'small', // can be set to 'small' or 'big'
					 			
					 			/** Boolean vars **/
					 			step:false, // if true,  mouseover binded star by star,
					 			isDisabled:false,
					 			showRateInfo: true,
					 			
					 			/** Integer vars **/
					 			length:5, // number of star to display
					 			decimalLength : 0, // number of decimals.. Max 3, but you can complete the function 'getNote'
					 			rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
					 			rateInfosX : -45, // relative position in X axis of the info box when mouseover
					 			rateInfosY : 5 // relative position in Y axis of the info box when mouseover
								});
			
			
		});