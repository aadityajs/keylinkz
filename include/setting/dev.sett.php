<?php

	#Log error messages to XML flat file within the cache folder
   // define('PHPFOX_LOG_ERROR', true);

    #Enable debug
   // define('PHPFOX_DEBUG', true);

    #Debug level
   // define('PHPFOX_DEBUG_LEVEL', 3);

    #Force browsers to re-cache static files on each page refresh
	/*
    define('PHPFOX_NO_CSS_CACHE', true);
    define('PHPFOX_DEBUG_EXIT', true);
    define('PHPFOX_NO_TEMPLATE_CACHE', true); 
	*/
	
	
	// Debug level
	define('PHPFOX_DEBUG_LEVEL', 1);
	 
	// Force templates re-cache on each page refresh
	define('PHPFOX_NO_TEMPLATE_CACHE', true);
	 
	// Force browsers to re-cache static files on each page refresh
	define('PHPFOX_NO_CSS_CACHE', true);
	 
	// Override default email
	define('PHPFOX_DEFAULT_OUT_EMAIL', 'your_email@email.com');
	 
	// Skip sending out of emails
	define('PHPFOX_SKIP_MAIL', true);
	 
	// Use live templates and not those from the database
	define('PHPFOX_LIVE_TEMPLATES', true);
	 
	// Add user_name in the title of each page. Great for when working with many browsers open
	define('PHPFOX_ADD_USER_TITLE', true);
	 
	// Cache emails to flat files
	define('PHPFOX_CACHE_MAIL', true);
	 
	// Log error messages to XML flat file within the cache folder
	define('PHPFOX_LOG_ERROR', true);
	 
	// Skip the storing of cache files in the DB
	define('PHPFOX_CACHE_SKIP_DB_STORE', true); 	
	
?>