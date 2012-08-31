<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'module_installer' => 'Core Installer',
  'phpfox_installer' => 'Installer',
  'setting_group_cookie' => '<title>Cookies</title><info>Cookie Information</info>',
  'setting_cookie_path' => '<title>Path to Save Cookies</title><info>The path to which the cookie is saved. If you run more than one site on the same domain, it will be necessary to set this to the individual directories of your site. Otherwise, just leave it as / .

Please note that your path should always end in a forward-slash; for example \'/community/\', \'/site/\' etc.

<b>Entering an invalid setting can leave you unable to login to your site.</b></info>',
  'setting_cookie_domain' => '<title>Cookie Domain</title><info>This option sets the domain on which the cookie is active. The most common reason to change this setting is that you have two different urls to your site, i.e. example.com and community.example.com. To allow users to stay logged into the site if they visit via either url, you would set this to .example.com (note the domain begins with a dot.

You most likely want to leave this setting blank as entering an invalid setting can leave you unable to login to your site.</info>',
  'setting_group_development' => '<title>Development</title><info>Sample Information</info>',
  'setting_log_missing_images' => '<title>Log Missing Image</title><info>Find and log any missing images into a log file. This could be used during the development of a new module or plug-in. 

If you are running a live site make sure this setting is disabled.

Note the relative location of the log file is: /file/cache/missing-images.txt</info>',
  'setting_attachment_valid_images' => '<title>Create Thumbnails</title><info>Define what file extensions we should create thumbnails for when a user uploads an image attachment.</info>',
  'setting_attachment_max_thumbnail' => '<title>Thumbnail Width/Height</title><info>Define the width and height of the thumbnail that will be created after a user uploads an image. If the image uploaded is smaller then the specified width/height it will not create a thumbnail for the image.</info>',
  'setting_attachment_max_medium' => '<title>Medium Thumbnail Width/Height</title><info>Define the width and height of the medium thumbnail that will be created after a user uploads an image. If the image uploaded is smaller then the specified width/height it will not create a medium thumbnail for the image.

Note that the medium thumbnail is displayed on the website instead of the original image to save bandwidth.</info>',
  'setting_attachment_upload_bars' => '<title>Upload Inputs</title><info>Define how many upload inputs should be displayed when a user is uploading attachments for an item.</info>',
  'setting_group_content_formatting' => '<title>Content Formatting</title><info>Format Info</info>',
  'setting_wysiwyg' => '<title>WYSIWYG Editor</title><info>Select a default WYSIWYG editor.

WYSIWYG (What You See Is What You Get)</info>',
  'setting_allow_html' => '<title>Allow HTML</title><info>Set this to <b>True</b> if you would like to allow HTML on your site. Note that even with this setting enabled by default we only allow certain HTML tags we feel that will not harm your site. You can add more HTML tags by modifying the setting <b>sAllowedHtmlTags</b> which can be found in this setting group.</info>',
  'setting_allowed_html' => '<title>Allowed HTML Tags</title><info>We provide a set of HTML tags we feel will give your users the ability to format their content without harming your site. 

You are free to add more HTML tags you deem necessary. If you do add more tags note that we have taken steps to prevent injections from JavaScript for example so adding more tags should not cause a security risk, it can however alter the way your site looks.

To add more tags simply add the tag you wish either to the end or front of the provided tags.</info>',
  'setting_xhtml_valid' => '<title>XHTML Valid</title><info>Set this to <b>True</b> if you would like us to try to clean up the content being added by your users and attempt to make the site XHTML valid.

Note that enabling this feature will use extra resources in order to parse all the data being added and remove or fix any unwanted HTML errors. Keeping this feature disabled on large sites would be best unless you really desire your site to be XHTML valid.</info>',
  'setting_wysiwyg_comments' => '<title>Enable WYSIWYG</title><info>Set this to <b>True</b> if you would like to enable the usage of a WYSIWYG editor when users add a comment on an item or another users profile. 

Note that in order for this setting to take affect you must be using a WYSIWYG editor other then the <b>default</b> editor.</info>',
  'setting_comment_page_limit' => '<title>Page Limit</title><info>Define how many comments will be displayed on a page before we add a pagination so users can continue to browse to other pages to view the rest of the comments.</info>',
  'setting_keep_active_posts' => '<title>Active Posts</title><info>Define how long we should keep posts active in minutes. 

Note that if a post passes this limit it will be displayed on the site normally, however if a post is active there will be some form of letting the user know that they have not viewed the specific thread or forum. Depending on the theme you are using this is usually identified by images and formating the title of the thread or forum to be bold.</info>',
  'setting_use_hot_threads' => '<title>Display Hot Threads</title><info>Set this to <b>True</b> if you would like to display <b>Hot Threads</b> in your forums. 

Hot Threads are defined by the setting <setting>iHotThreadPosts</setting> or <setting>iHotThreadViews</setting>. 

Depending on those settings it will consider if a thread is popular by how many posts or views a thread has and if it surpassed the settings mentioned earlier it will be considered a <b>Hot Thread</b>.</info>',
  'setting_hot_thread_posts' => '<title>Hot Thread Limit (Posts)</title><info>Define how many threads must be added before a thread can be considered to be a <b>Hot Thread</b>.

Note that if the setting <setting>bUseHotThreads</setting> is disabled this setting will have no affect on your site.</info>',
  'setting_hot_thread_views' => '<title>Hot Thread Limit (Views)</title><info>Define how many thread views must be added before a thread can be considered to be a <b>Hot Thread</b>.

Note that if the setting <setting>bUseHotThreads</setting> is disabled this setting will have no affect on your site.</info>',
  'setting_login_module' => '<title>User Login Method</title><info>Login method used when a user logs into a site.

<b>Cookies</b> will store the information we need to keep a user logged in on their end, while a <b>Session</b> will store this information on your server.

Note that if a user logs into the site with the "Remember Me" box ticked it will automatically use a <b>Cookie</b> to set the users session.</info>',
  'setting_active_session' => '<title>Active Session</title><info>Define how long a user is displayed as active on the site in minutes. 

If a user is inactive longer then the specified setting they will be removed from the online session table. When this is done they will no longer appear to be online when other members view their profile. If the user suddenly becomes active after their session expired a new session will automatically be created.</info>',
  'setting_tag_min_display' => '<title>Minimum Display</title><info>Define how many tags must be added before they can be displayed to the public.

Higher this setting if you do want to display a tag cloud with only a few tags.</info>',
  'setting_tag_max_font_size' => '<title>Maximum Font Size</title><info>Define the font size for the most added/used tags on the site.</info>',
  'setting_tag_min_font_size' => '<title>Minimum Font Size</title><info>Define the font size for the least used tags on the site.</info>',
  'setting_tag_cache_tag_cloud' => '<title>Cache</title><info>Define how long we should cache tag clouds that are displayed on sections that use them.

Note that this setting must be defined in minutes.

It is important to cache tag clouds as this removes a query to the database that can be rather memory extensive.</info>',
  'setting_top_bloggers_display_limit' => '<title>Top Bloggers Limit</title><info>Define the limit of how many <b>Top Bloggers</b> can be displayed when viewing the blog section.</info>',
  'setting_top_bloggers_min_post' => '<title>Blog Count for Top Bloggers</title><info>Before a user can be considered to be a <b>Top Blogger</b> they must enter X amount of blog(s) where X is the value of this setting.</info>',
  'setting_cache_top_bloggers' => '<title>Cache Top Bloggers</title><info>Set this to <b>True</b> if we should cache the <b>Top Bloggers</b>. It always a good idea to cache such things as there is no need to run an extra query to the database to find out which users are the <b>Top Bloggers</b> as this requires counting all of the blogs added.

Note that the setting <setting>cache_top_bloggers_limit</setting> controls how long to keep the cache.</info>',
  'setting_cache_top_bloggers_limit' => '<title>Top Bloggers Cache Time</title><info>Define how long we should keep the cache for the <b>Top Bloggers</b>.

Note this setting will have not affect if the setting <setting>cache_top_bloggers</setting> is disabled.</info>',
  'setting_display_post_count_in_top_bloggers' => '<title>Display Post Count for Top Bloggers</title><info>Set this to <b>True</b> if you would like to display the post count besides the names of each of the <b>Top Bloggers</b>.

Note that this feature relies on the theme you are using and if the theme is not the default theme provided this might not be displayed.</info>',
  'setting_group_archive_handler' => '<title>Archive Handler</title><info>Control how the Archive class handles archives that need to be either extracted or created.</info>',
  'setting_unzip_path' => '<title>Unzip Path</title><info>Full path to where the binary for <b>unzip</b> is located. 

If you are unsure you can try to add the following:
[code]
unzip
[/code]

If the above does not work you will need to ask your host or run the following command via command line:
[code]
whereis unzip
[/code]</info>',
  'setting_lang_pack_helper' => '<title>Language Package Helper</title><info>If enabled this option will add brackets surrounding a phrase, which can be used to identify which phrases have not been added into the core language package. Hard coded phrases will not have brackets.



If a phrase is hard coded in the source the site will be unable to translate that specific phrase.

It is best to use this feature during development or creating of a new language package. 

Example of how a phrase will look once this setting is enabled:
[quote]
{This is a sample}
[/quote]</info>',
  'setting_group_cron' => '<title>Cron</title><info>Control the time-based scheduling service provided.</info>',
  'setting_cron' => '<title>Cron Jobs</title><info>Set to <b>True</b> to enable <b>Cron Jobs</b> to actively run in the background of your site.

If you have access to setup a crontab this method is preferred but will require access to your server. Once a crontab is setup you can disable this feature.</info>',
  'setting_feed_time_layout' => '<title>Time Layout</title><info>Control how old feeds can be by getting feeds that are <b>X</b> minutes, hours, days or months old.

<b>X</b> is defined by the setting <setting>display_feeds_from</setting>.</info>',
  'setting_display_feeds_from' => '<title>Time Limit</title><info>This setting is used in conjunction with the setting <setting>feed_time_layout</setting>.

Here you must define a number which will control how old a news feed can be.</info>',
  'setting_feed_only_friends' => '<title>Friends Only</title><info>Set to <b>True</b> if you would like news feed to only be displayed to the user and their friends.</info>',
  'setting_feed_display_limit' => '<title>Display Limit</title><info>Limit how many feeds should be displayed within the main news feed.</info>',
  'setting_captcha_code' => '<title>Captcha String</title><info>Alphanumeric characters that will be part of the Captcha routine.</info>',
  'setting_captcha_limit' => '<title>Character Limit</title><info>Limit how many characters will be displayed in the Captcha image.</info>',
  'setting_captcha_use_font' => '<title>Use Font (TTF)</title><info>If enabled and if your server supports the PHP function [link=http://se.php.net/imagettftext]imagettftext[/link] the Captcha routine will use a TTF (True Type Font) to create the text instead of using the default image processing string function.

The font that will be used is controlled by the setting <setting>captcha_font</setting>:</info>',
  'setting_captcha_font' => '<title>True Type Font</title><info>Select which TTF (True Type Font) you would like to use for your Captcha image.

Note the setting <setting>captcha_font</setting> must be enabled in order to use this option.</info>',
  'setting_default_lang_id' => '<title>Default Language ID</title><info>Control the default language ID for the site. Note this setting is handled within the script and in most cases should <b>not</b> be modified.</info>',
  'setting_default_theme_name' => '<title>Default Theme Name</title><info>Default Theme Name</info>',
  'setting_default_style_name' => '<title>Default Style Name</title><info>Default Style Name</info>',
  'setting_default_style_id' => '<title>Default Style ID</title><info>Default Style ID</info>',
  'setting_module_forum' => '<title>Default forum module URL</title><info>If the forum module name is different this setting must be updated.</info>',
  'setting_group_admin_control_panel' => '<title>Admin Control Panel</title><info>Manage settings for the Admin CP.</info>',
  'setting_admin_cp' => '<title>Admin CP Location</title><info>Location of the Admin CP. Change this to secure your Admin CP.

By default the setting is <b>admincp</b> so the final URL will be:
[quote]
http://www.yoursite.com/admincp/
[/quote]

Note the above example is when short URL\'s is enabled.</info>',
  'setting_group_general' => '<title>General</title><info>Manage general settings.</info>',
  'setting_global_update_time' => '<title>Global Time Stamp</title><info>Each module has items that are displayed and use our time stamp settings to display the date the way we would like.

If a module does not specify a time stamp setting it will use the default time stamp layout which is controlled with this setting.

For a better understanding on how to modify this setting and what the string values stand for you can follow up on the PHP date() function [link=http://se2.php.net/date]here[/link].</info>',
  'setting_group_time_stamps' => '<title>Time Stamps</title><info>Control global and module time stamps.</info>',
  'setting_group_server_settings' => '<title>Server Settings</title><info>Manage server settings and optimization options.</info>',
  'setting_use_gzip' => '<title>GZIP HTML Output</title><info>Selecting <b>True</b> will enable the option to GZIP compress the HTML output of pages, thus reducing bandwidth requirements. This will be only used on clients that support it, and are HTTP 1.1 compliant. There will be a small performance overhead.

This feature requires the ZLIB library.

If you are already using <b>mod_gzip</b> or <b>mod_deflate</b> on your server, do not enable this option.</info>',
  'setting_gzip_level' => '<title>GZIP Compression Level</title><info>Set the level of GZIP compression that will take place on the output. 0=none; 9=max.

We strongly recommend that you use level 1 for optimum results.</info>',
  'setting_title_delim' => '<title>Site Title Delimiter</title><info>This value will be used as the delimiter to separate titles being added for each page on the site.</info>',
  'setting_site_title' => '<title>Site Name</title><info>Name of your site. This will appear on every page.</info>',
  'setting_branding' => '<title>phpFox Branding Removal</title><info>Set to <b>True</b> to remove phpFox branding.</info>',
  'setting_ip_check' => '<title>Session IP Octet Length Check</title><info>Select the subnet mask which reflects the level of checking you wish to run against IP addresses when a session is being fetched.

This is useful if you have a large number of users who are behind transparent proxies and have an IP address that can change randomly between request such as AOL.

The more this is decreased the greater the security risk from session hijacking.</info>',
  'setting_session_prefix' => '<title>Cookie Prefix</title><info>Prefix for cookies and PHP sessions being set by the script. 

<b>Warning</b>: This value can only contain alphanumeric characters (eg. a-zA-Z0-9)

Note that everyone will be forced to login again for security reasons.</info>',
  'setting_keywords' => '<title>Meta Keywords</title><info>Enter the meta keywords for all pages. These are used by search engines to index your pages with more relevance.

Note that certain modules or pages have their own meta keyword settings and if those are set they will override this setting.</info>',
  'setting_description' => '<title>Meta Description</title><info>Enter the meta description for all pages. This is used by search engines to index your pages more relevantly.

Note that certain modules or pages have their own meta keyword settings and if those are set they will override this setting.</info>',
  'setting_tar_path' => '<title>Tar Path</title><info>Full path to where the binary for tar is located.

If you are unsure you can try to add the following:
[code]
tar
[/code]

If the above does not work you will need to ask your host or run the following command via command line:
[code]
whereis tar
[/code]</info>',
  'setting_csrf_protection_level' => '<title>CSRF Protection Level</title><info>Select the Cross Site Forgery Request (CSRF) prevention level you want on your site.

<b>Low</b>
Minimal prevention for CSRF attacks.

<b>Medium</b>
Each user will have a unique token ID which will be static as long as they use the same browser for that session. 

<b>High</b>
Each user will have a unique token ID which will be changed on each page they visit thus giving them a random ID on each page refresh. This method offers full protection against CSRF attacks, however since the token is random the user can only browse your site with one browser window. If they would for example use a browser that supports tabs and would use a 2nd tab and would then attempt to submit a form they might get a CSRF attack error message since their last token was from the previous tab they had open.</info>',
  'setting_is_personal_site' => '<title>Personal Site</title><info>If set to <b>Yes</b> the site will be treated as your personal web site and items such as blogs will only be viewable from the public area and not from personal profiles.

Only enable this feature if you do not plan on having a social networking community and only plan to add your personal items.</info>',
  'setting_module_core' => '<title>Core Module</title><info>Specify the core module. Changing this could cause severe problems on the site.</info>',
  'setting_build_file_dir' => '<title>Build Directories</title><info>If set to <b>True</b> and items are added to the <b>file/</b> directory they will be placed in separate folders for organization and security purposes. The <b>file/</b> folder is used to store cached data or items uploaded by users.

You can define how the directories will be built using the setting <setting>build_format</setting>.

By default directories will be built using the <b>Year/Month</b> format. If an image would be uploaded on January 1st 2008 it would be placed in the folder: file/pic/photo/2008/01/

<b>Notice:</b> If you have PHP [link="http://se.php.net/features.safe-mode"]Safe Mode[/link] enabled this feature might not work unless the <b>file/</b> folder belongs to the same UID (owner) as the script.</info>',
  'setting_build_format' => '<title>Build Format</title><info>This setting controls how the setting <setting>build_format</setting> functions.

This setting uses the PHP [link="http://se2.php.net/date"]date()[/link] function to control how directories are created within the <b>file/</b> folder.

By default we use <b>Y/m</b>. <b>Y</b> stands for a full numeric representation of a year, 4 digits (Eg. 2008). <b>m</b> stands for a numeric representation of a month, with leading zeros (Eg. 01).

For more information regarding this setting you may follow up on the PHP function [link="http://se2.php.net/date"]here[/link].</info>',
  'setting_blog_time_stamp' => '<title>Blog</title><info>Controls time stamps for blog entries.

If using the default setting and the default template the time stamp will appear under each blog title and will look similar to:
[quote]
Posted June 22, 2008 by Raymond Benc
[/quote]</info>',
  'setting_comment_time_stamp' => '<title>Comments</title><info>Controls time stamps for each comment being posted on the site.

If using the default setting and template the time stamp will appear under the posters user name
[quote]
Raymond Benc wrote
[/quote]
and will be similar to:
[quote]
June 22, 2008 
[/quote]</info>',
  'setting_forum_time_stamp' => '<title>Forum</title><info>More info coming...</info>',
  'setting_forum_post_time_stamp' => '<title>Forum Post</title><info>More info coming...</info>',
  'setting_forum_post_today_time_stamp' => '<title>Forum Post (Today)</title><info>More info coming...</info>',
  'setting_forum_post_yesterday_time_stamp' => '<title>Forum Post (Yesterday)</title><info>More info coming...</info>',
  'setting_forum_post_join_date' => '<title>Forum Post User Join</title><info>More info coming...</info>',
  'setting_zip_path' => '<title>Zip Path</title><info>Full path to where the binary for <b>zip</b> is located.

If you are unsure you can try to add the following:
[code]
zip
[/code]

If the above does not work you will need to ask your host or run the following command via command line:
[code]
whereis zip
[/code]</info>',
  'setting_cache_phrases' => '<title>Page Cache</title><info>If set to <b>Yes</b>, phrases from language packages will be cached based on the page being viewed instead of the conventional method which caches all phrases and splits them up into the modules they belong to. 

The module cache method is good during your development period, however once your site is live and you don\'t plan to make any changes to the language package enabling this setting to cache phrases on a per page basis is a good idea.

This will in return save the total memory consumption as phrases are cached into memory (depending on your cache method) and loading several modules on one page can be a waste when you may only need 20 phrases from 3 different modules.</info>',
  'setting_site_copyright' => '<title>Copyright</title><info>Add your sites copyright.</info>',
  'setting_comment_is_threaded' => '<title>Thread Display</title><info>If set to <b>True</b> comments will be displayed in a thread format allowing users to reply to specific comments instead of the general item they are commenting on.</info>',
  'setting_group_forms' => '<title>Forms</title><info>Manage settings for general forms being used on the site.</info>',
  'setting_display_required' => '<title>Display Required Fields</title><info>When set to <b>True</b> forms that have both optional and "required" fields will have a asterisk (depending on what is set for the setting <setting>required_symbol</setting>).</info>',
  'setting_required_symbol' => '<title>Required Field Symbol</title><info>On forms that have fields that are required we add a symbol to distinguish which fields are required and which are not. Change this setting will change that symbol which by default is an asterisk.</info>',
  'setting_blog_display_user_post_count' => '<title>Display Post Count for Categories (Personal)</title><info>If set to <b>True</b> we will display a users post count for a specific category. This will be displayed on their profile, blog and when browsing their own blogs.

Notice: This will add an extra strain to your server if set to <b>True</b>.</info>',
  'setting_default_time_zone_offset' => '<title>Default Time Zone</title><info>Select the default time zone for guests and new users.</info>',
  'setting_login_type' => '<title>User Login Method</title><info>Select the method you would like your users to use when logging into the site.

<b>user_name</b>
Must use their user name.

<b>email</b>
Must use their email.

<b>both</b>
Can use either email or user name.</info>',
  'setting_redirect_after_login' => '<title>URL Redirect After Login</title><info>After a user has logged in and they have not requested a page to visit you can set a default redirection URL, which will send them to this specific page right after they login. 

If you add an external link be sure to add "http://" (without quotes) otherwise the URL will be treated as an internal link.</info>',
  'setting_profile_time_stamps' => '<title>Profile</title><info>Profile time stamps</info>',
  'setting_user_pic_sizes' => '<title>User Pic Sizes</title><info>User Pic Sizes</info>',
  'setting_mail_time_stamp' => '<title>Mail</title><info>Mail</info>',
  'setting_profile_use_id' => '<title>Profile User ID Connection</title><info>Set to <b>True</b> if you would like to have user profiles connected via their user ID#. Set to <b>False</b> if you would like to have user profiles connected via their user name. 

Note if you connect via their user ID# you will allow your members the ability to use non-supported characters which are not allowed if connecting a profile with their user name.

<b>Warning:</b> This action cannot be reversed.
This setting may lock users out if you force log in by their user names
</info>',
  'setting_group_sample_2' => '<title>Sample 2</title><info>Sample 2</info>',
  'setting_bsample' => '<title>This is a test</title><info>Yet another test...</info>',
  'setting_captcha_on_signup' => '<title>Captcha on Registration</title><info>Enable this option to add a captcha routine to the registration process. This will help against spam.</info>',
  'menu_home' => 'Home',
  'submit' => 'Submit',
  'save' => 'Save',
  'delete' => 'Delete',
  'revert_to_default' => 'Revert to Default',
  'version' => 'Version {version}',
  'display_from_x_to_x_of_x' => 'Displaying <span id="js_pager_from">{from}</span> to <span id="js_pager_to">{to}</span> of <span id="js_pager_total">{total}</span>',
  'page_x_of_x' => 'Page {current} of {total}',
  'first' => 'First',
  'previous' => 'Previous',
  'next' => 'Next',
  'last' => 'Last',
  'edit' => 'Edit',
  'go' => 'Go',
  'are_you_sure' => 'Are you sure?',
  'yes' => 'Yes',
  'no' => 'No',
  'cancel' => 'Cancel',
  'go_advanced' => 'Go Advanced',
  'processing' => 'Processing',
  'admin' => 'No Admin',
  'select' => 'Select',
  'per_page' => '{total} per page',
  'time' => 'Time',
  'descending' => 'Descending',
  'ascending' => 'Ascending',
  'searching' => 'Searching',
  'reset' => 'Reset',
  'invalid_search_id' => 'Invalid search ID#',
  'search_results_found' => 'No search results found.',
  'menu_admincp' => 'AdminCP',
  'menu_log_out' => 'Logout',
  'copyright' => 'Copyright',
  'required_fields' => 'Required Fields',
  'search' => 'Search',
  'bold' => 'Bold',
  'italic' => 'Italic',
  'underline' => 'Underline',
  'toggle' => 'Toggle',
  'user_name' => 'User Name',
  'close' => 'Close',
  'quote' => 'Quote',
  'originally_posted' => 'Originally posted by',
  'code' => 'Code',
  'notice' => 'Notice',
  'setting_group_mail' => '<title>Mail</title><info>Mail Settings...</info>',
  'setting_method' => '<title>Send Mail Method</title><info>Select the method you would like your emails to be sent it, which is either using the default PHP mail() function or SMTP.</info>',
  'setting_mailsmtphost' => '<title>SMTP Host</title><info>If SMTP is enabled, set the SMTP server host here.</info>',
  'setting_mail_smtp_authentication' => '<title>SMTP Authentication</title><info>SMTP Authentication</info>',
  'setting_mail_smtp_username' => '<title>SMTP Username</title><info>SMTP Username</info>',
  'setting_mail_smtp_password' => '<title>SMTP Password</title><info>SMTP Password</info>',
  'setting_mail_from_name' => '<title>From</title><info>This is the name displayed when users receive emails from this site.</info>',
  'setting_email_from_email' => '<title>Email</title><info>This is the default email used when sending out emails and it will be the email users will see in their email.</info>',
  'setting_mail_signature' => '<title>Signature</title><info>This is the signature added to the bottom of each email that is sent from this site.</info>',
  'setting_log_site_activity' => '<title>Log Site Activity</title><info>Set to "true" to log all site activity, which can be used at a later time to create general site statistics or keep track of a specific users activity.</info>',
  'setting_cache_js_css' => '<title>Cache JavaScript & CSS</title><info>Set to <b>True</b> to cache all JavaScript and CSS into one file to speed up your site.</info>',
  'about' => 'About Us',
  'menu_about' => 'About',
  'privacy_policy' => 'Privacy Policy',
  'menu_privacy' => 'Privacy',
  'setting_cache_plugins' => '<title>Cache Plugins</title><info>Enable this setting if all plug-ins should be cached. It is advised to enable this on live sites.</info>',
  'setting_host' => '<title>FTP Host</title><info>FTP Host</info>',
  'setting_username' => '<title>FTP Username</title><info>FTP Username</info>',
  'setting_password' => '<title>FTP Password</title><info>FTP Password</info>',
  'setting_ftp_enabled' => '<title>Enable FTP Support</title><info>Enable FTP Support</info>',
  'terms_use' => 'Terms of Use',
  'setting_group_ftp' => '<title>FTP</title><info>Control your FTP (File Transport Protocol) details.</info>',
  'user_setting_can_view_update_info' => 'Can view "Update" information on items?

Note: This information usually displays the user name of the last person that modified an item and the time it took place.',
  'user_setting_can_view_private_items' => 'Can view private items posted on the site. 

Such items are created by a member and are marked as private so only that member can view the item and members that have this option enabled.',
  'user_setting_can_add_new_setting' => 'Can add new product settings.

Enable this feature only if development is in progress and changes are being made to the product.',
  'setting_group_cache' => '<title>Cache</title><info>All cache related variables</info>',
  'setting_crop_seo_url' => '<title>Crop URLs</title><info>Crop URL for SEO</info>',
  'setting_group_search_engine_optimization' => '<title>Search Engine Optimization</title><info>Search Engine Optimization</info>',
  'setting_meta_description_limit' => '<title>Meta Description Limit</title><info>Define the maximum number of characters that can be used in a meta description tag.</info>',
  'setting_meta_keyword_limit' => '<title>Meta Keyword Limit</title><info>Define the maximum number of characters that can be used in a meta keyword tag.</info>',
  'setting_description_time_stamp' => '<title>Meta Description Time Stamp</title><info>Meta Description Time Stamp</info>',
  'setting_use_dnscheck' => '<title>Use DNSCheck in email validation</title><info>http://php.net/checkdnsrr

This value tells if the script should validate the email addresses using checkdnsrr.

This function may not be available in some windows default installations. However even if this setting is enabled if the function does not exist the site will not fail, it will only skip that part of the validation.

There is some undocumented (but technically possible) slow down on using this feature, so while it adds extra security to your site it could also become a bottleneck. Use carefully.</info>',
  'setting_group_debug' => '<title>Debug</title><info>Debug Settings</info>',
  'setting_admin_debug_mode' => '<title>Debug Level</title><info>Control the debug output at the bottom for the site.

<b>Level Information</b>

<b>Level 0</b> = Debug is disabled.

<b>Level 1</b> = Enables PHP error reporting, page generation times and query count.

<b>Level 2</b> = Includes <i>Level 1</i>, server usage, session and cookie information.

<b>Level 3</b> = Includes <i>Level 1</i>, <i>Level 2</i> and SQL queries.</info>',
  'setting_replace_url_with_links' => '<title>Replace URL with Links</title><info>Set to <b>True</b> if you would like to automatically replace URL strings to anchor links.</info>',
  'setting_shorten_parsed_url_links' => '<title>Shorten Parsed URL Links</title><info>If the option to parse URL strings to links is enabled then you can control how long the URL string should be before you shorten it.

<b>Note:</b> Set to <b>0</b> to have no limit.</info>',
  'module_report' => 'Reports',
  'setting_default_music_player' => '<title>Default Music Player</title><info>Default Music Player</info>',
  'setting_footer_bar_site_name' => '<title>Footer Bar Site Name</title><info>The name defined here will be displayed on the sites footer bar.</info>',
  'setting_enable_footer_bar' => '<title>Enable Footer Bar</title><info>Set to <b>True</b> if you would like to enable the site wide footer bar.</info>',
  'setting_group_spam' => '<title>Spam</title><info>Spam</info>',
  'setting_site_is_offline' => '<title>Site is offline?</title><info>Select <b>True</b> to turn your site offline.</info>',
  'setting_site_offline_message' => '<title>Offline Message</title><info>Message that will be displayed to guests when the site is offline.</info>',
  'setting_site_offline_no_template' => '<title>Blank Template</title><info>Select <b>True</b> if you would like to use a blank template when displaying the site offline.</info>',
  'user_setting_can_view_site_offline' => 'Can view the site even when its set to offline?',
  'setting_group_site_offlineonline' => '<title>Site Offline/Online</title><info>Site Offline/Online</info>',
  'setting_group_site_statistics' => '<title>Site Statistics</title><info>Site Statistics</info>',
  'setting_cache_site_stats' => '<title>Cache Site Stats</title><info>Set to <b>True</b> if site stats should be cached.

<b>Notice:</b> It is highly advised to cache site stats as it requires a large set of queries to the database across numerous tables.</info>',
  'setting_site_stat_update_time' => '<title>Update Stats Cache (Minutes)</title><info>Define in minutes how long to wait until we need to re-cache the site statistics.</info>',
  'setting_display_site_stats' => '<title>Display Site Stats</title><info>Set to <b>True</b> to display the sites statistics publicly within the sites user dashboard.</info>',
  'setting_identify_dst' => '<title>DST</title><info>DST</info>',
  'user_cancellation_9' => 'I don\'t find this site useful',
  'user_cancellation_10' => 'I have a privacy concern',
  'user_cancellation_11' => 'I don\'t understand how to use this site.',
  'user_cancellation_12' => 'I\'m getting too much email from this site.',
  'user_cancellation_13' => 'I\'m getting too much spam or too many friend requests',
  'user_cancellation_14' => 'I\'m bored with this site.',
  'phpfox_branding_removal' => 'Branding Removal',
  'setting_item_view_area' => '<title>Item Location</title><info>Select <b>public</b> if you would like all items to be displayed within a public section or select <b>profile</b> to have items displayed on a users profile. 

It is advised to select this option once as this greatly effects how search engines pick up pages on the site.</info>',
  'setting_ftp_dir_path' => '<title>FTP Directory Path</title><info>Supply the full path to the scripts root directory.

If you are unsure on the full path, you can click <a href="#" onclick="tb_show(\'FTP Path Search\', $.ajaxBox(\'core.ftpPathSearch\', \'height=410&width=700\')); return false;">here</a> for help on finding the correct full path.</info>',
  'admincp_menu_country' => 'Countries',
  'admincp_menu_country_manager' => 'Country Manager',
  'admincp_menu_country_import' => 'Import',
  'admincp_menu_country_add' => 'Add Country',
  'admincp_menu_country_child_add' => 'Add State/Province',
  'user_setting_user_is_banned' => 'Group banned from logging into the site and interacting with other members. 

<b>Note:</b> This option is intended only for "Banned" usergroup.',
  'setting_banned_user_group_id' => '<title>Banned User Group ID</title><info>Banned User Group ID</info>',
  'setting_group_image_processing' => '<title>Image Processing</title><info>Image Processing</info>',
  'setting_watermark_option' => '<title>Image Watermark</title><info>Certain areas allow image watermarking. If such sections have image watermarking enabled this option must be enabled.

If you select "image", this will add a small watermark image to each image that is uploaded. If you select "text" this will add the text defined in this section.</info>',
  'setting_watermark_image' => '<title>Watermark Image Name</title><info>Watermark Image Name</info>',
  'setting_watermark_opacity' => '<title>Watermark Opacity</title><info>The opacity of an image can range from 1-100.</info>',
  'setting_watermark_image_position' => '<title>Watermark Position</title><info>Select a position to place the watermark.</info>',
  'setting_image_text_hex' => '<title>Watermark Text Color</title><info>(HEX COLORS Example: 000000)</info>',
  'setting_image_text' => '<title>Watermark Text</title><info>Watermark Text</info>',
  'setting_group_registration' => '<title>Registration</title><info>Registration</info>',
  'setting_registration_enable_dob' => '<title>Date of Birth</title><info>Enable this so users can register their date of birth when signing up for the site.</info>',
  'setting_registration_enable_gender' => '<title>Gender Field</title><info>Enable this so users can register their gender when signing up for the site. </info>',
  'setting_registration_enable_location' => '<title>Location</title><info>Enable this so users can register their location when signing up for the site. </info>',
  'setting_registration_enable_timezone' => '<title>Timezone</title><info>Enable this so users can register their timezone when signing up for the site. </info>',
  'kind_regards_phpfox' => 'Kind Regards,
Site Admins',
  'setting_global_admincp_note' => '<title>Global AdminCP Note</title><info>Global AdminCP Note</info>',
  'admincp_menu_online' => 'Online',
  'admincp_menu_online_members' => 'Members',
  'admincp_menu_online_guests' => 'Guests/Bots',
  'admincp_menu_system_overview' => 'System Overview',
  'setting_enable_spam_check' => '<title>Enable Spam Check</title><info>Enable Spam Check</info>',
  'setting_akismet_url' => '<title>Akismet URL</title><info><a href="http://akismet.com/">Akismet</a> URL. This is full path to your site.</info>',
  'setting_akismet_password' => '<title>Akismet API Key</title><info><a href="http://akismet.com/">Akismet</a>  API key is a private key Akismet provides when you register for an account with them.</info>',
  'user_setting_is_spam_free' => 'Set to <b>True</b> if this user group should never be checked for spamming.',
  'setting_auto_deny_items' => '<title>SPAM Count</title><info>Define how many items a user can attempt to SPAM before anything they add will not be checked as we will consider that it is SPAM.</info>',
  'setting_auto_ban_spammer' => '<title>Auto Ban Spammers</title><info>Define how many times a user can SPAM before they are automatically banned.

<b>Notice:</b> Set this to "0" (without quotes) to disable this setting.</info>',
  'setting_warn_on_external_links' => '<title>External Links Warning</title><info>Warn users when they have clicked on a link that will direct them to another site.</info>',
  'setting_disable_all_external_urls' => '<title>Disable All External URL\'s</title><info>Enable this feature to remove all external links from the site. 

<b>Notice:</b> Sites added to the "URL White List" will be allowed.</info>',
  'setting_url_spam_white_list' => '<title>URL White List</title><info>Add sites that you want to allow in external links.</info>',
  'setting_disable_all_external_emails' => '<title>Disable All External Emails</title><info>Enable this feature to remove all external emails from the site.

Notice: Sites added to the "Email White List" will be allowed.</info>',
  'setting_email_white_list' => '<title>Email White List</title><info>Add sites that you want to allow in external emails.</info>',
  'setting_phpfox_version' => '<title>Version</title><info>Version</info>',
  'user_setting_can_view_twitter_updates' => 'Can view corporate twitter updates?',
  'user_setting_can_view_news_updates' => 'Can view corporate news & updates?',
  'setting_redirect_guest_on_same_page' => '<title>Same Page Redirection After Login/Registration</title><info>Enable this option to redirect guests to the same page they were visiting after they have logged into or registered.</info>',
  'setting_meta_description_profile' => '<title>Meta Description Profile</title><info>This is the meta description provided on a users profile that is included with their personal information. It is advised for this to not be too long in order to leave room for the users personal information.</info>',
  'setting_words_remove_in_keywords' => '<title>Keyword String Removal</title><info>Define words here that should not show up within meta keywords. Each word should be comma separated.

<b>Notice:</b> The search is case insensitive.</info>',
  'update' => 'Update',
  'total_items' => 'Total Items',
  'activity_points' => 'Activity Points',
  'dashboard' => 'Dashboard',
  'membership' => 'Membership',
  'profile_views' => 'Profile Views',
  'space_used' => 'Space Used',
  'member_since' => 'Member Since',
  'what_s_new' => 'What\'s New',
  'site_stats' => 'Site Stats',
  'customize_dashboard' => 'Customize Dashboard',
  'quick_links' => 'Quick Links',
  'module_is_not_a_valid_module' => '{module} is not a valid module.',
  'state_province' => 'State/Province',
  'what_is_on_your_mind' => 'What is on your mind?',
  'click_to_change_profile_photo' => 'Click to change profile photo.',
  'last_login' => 'Last Login',
  'submit_links' => 'Submit Links',
  'manage_links' => 'Manage Links',
  'logout' => 'Logout',
  'click_to_view_your_profile' => 'Click to view your profile.',
  'click_to_change_your_profile_photo' => 'Click to change your profile photo.',
  'click_to_change_your_status' => 'Click to change your status.',
  'status' => 'Status',
  'link_save_or_cancel' => '<a href="#" onclick="$(\'#js_user_status_form\').ajaxCall(\'user.updateStatus\'); return false;">save</a> or <a href="#" class="js_update_status">cancel</a>',
  'start_search' => 'Start search...',
  'favorites' => 'Favorites',
  'hide_the_footer_bar' => 'Hide the Footer Bar',
  'show_the_footer_bar' => 'Show the Footer Bar',
  'ftp_path' => 'FTP path',
  'change_your_time_zone_preference' => 'Change your time zone preference.',
  'welcome_name' => 'Welcome, {name}!',
  'share' => 'Share',
  'setting_enable_getid3_check' => '<title>Use getID3 for Files Uploaded</title><info>getID3 is a 3rd party library that helps us verify the meta contents of a file that is uploaded to the server to confirm if the file that is being uploaded contains data that is related to what we are allowing to be uploaded (eg. photo, mp3\'s, videos etc...).</info>',
  'setting_extended_global_time_stamp' => '<title>Extended Global Time Stamp</title><info>Extended Global Time Stamp</info>',
  'setting_theme_session_prefix' => '<title>Theme Session Prefix</title><info>Theme Session Prefix</info>',
  'edit_this_block' => 'Edit this Block',
  'remove_this_block' => 'Remove this Block',
  'hello' => 'Hello',
  'hello_name' => 'Hello {name}',
  'the_site_is_currently_in_offline_mode' => 'The site is currently in "Offline Mode".',
  'explore' => 'Explore',
  'add_a_video' => 'Add a Video',
  'enter_the_url_of_your_link' => 'Enter the URL of your link',
  'enter_the_url_of_your_image' => 'Enter the URL of your image',
  'add_a_link' => 'Add a Link',
  'add_a_photo' => 'Add a Photo',
  'toggle_fullscreen' => 'Toggle Fullscreen',
  'full_screen_editor' => 'Full Screen Editor',
  'january' => 'January',
  'february' => 'February',
  'march' => 'March',
  'april' => 'April',
  'may' => 'May',
  'june' => 'June',
  'july' => 'July',
  'august' => 'August',
  'september' => 'September',
  'october' => 'October',
  'november' => 'November',
  'december' => 'December',
  'not_a_valid_file_extension_we_only_accept_support' => 'Not a valid file extension. We only accept: {support}',
  'not_a_valid_image_we_only_accept_the_following_file_extensions_support' => 'Not a valid image. We only accept the following file extensions: {support}',
  'unable_to_move_the_image' => 'Unable to move the image.',
  'unable_to_move_the_file' => 'Unable to move the file.',
  'unable_to_upload_the_image' => 'Unable to upload the image.',
  'upload_failed_server_cannot_handle_files_larger_then_file_size' => 'Upload failed. Server cannot handle files larger then: {file_size}',
  'upload_failed_server_cannot_handle_files_size_larger_then_file_size' => 'Upload failed. Server cannot handle files ({size}) larger then: {file_size}',
  'upload_failed_your_file_size_is_larger_then_our_limit_file_size' => 'Upload failed. Your file ({size}) is larger then our limit: {file_size}',
  'uploaded_file_is_not_valid' => 'Uploaded file is not valid.',
  'unable_to_connect_to_ftp_host' => 'Unable to connect to FTP host.',
  'ftp_password_hash_does_not_match_with_server_hash' => 'FTP password hash does not match with server hash.',
  'unable_to_login_to_ftp_server' => 'Unable to login to FTP server.',
  'unable_to_connect_to_ftp_base_directory_make_sure_the_setting_for_ftp_directory_path_has_the_correct_path' => 'Unable to connect to FTP base directory. Make sure the setting for "FTP Directory Path" has the correct path.',
  'paypal_email' => 'PayPal Email',
  'paypal_is_an_electronic_money_service_which_allows_you_to_make_payment_to_anyone_online' => 'PayPal is an electronic money service which allows you to make payment to anyone online. You can choose to pay using your credit card, debit card, bank account, or PayPal balance and make secure purchases without revealing your credit card number or financial information. All major credit and debit cards are accepted including Visa, Mastercard, American Express, Switch and Solo (plus many more).',
  'the_email_that_represents_your_paypal_account' => 'The email that represents your PayPal account.',
  '2checkout_vendor_id_number' => '2Checkout Vendor ID Number',
  '2checkout_secret_word' => '2Checkout Secret Word',
  'your_numerical_vendor_id' => 'Your numerical vendor ID.',
  'the_secret_word_as_set_within_the_look_and_feel_page_of_your_2checkout_account' => 'The secret word as set within the "Look and Feel" page of your 2Checkout account.',
  'unable_to_create_a_watermark_resource' => 'Unable to create a watermark resource.',
  'originally_posted_by' => 'Originally posted by',
  'search_results_for' => 'Search results for',
  'any' => 'Any',
  'upgrade_taking_place' => 'Upgrade Taking Place',
  'content_is_empty' => 'Content is empty.',
  'the_content_of_this_item_is_identical_to_something_you_have_added_before_please_try_again' => 'The content of this item is identical to something you have added before. Please try again.',
  'try_again_in_1_minute' => 'Try again in 1 minute.',
  'try_again_in_time_minutes' => 'Try again in {time} minutes.',
  'month' => 'Month',
  'day' => 'Day',
  'year' => 'Year',
  'am' => 'am',
  'pm' => 'pm',
  'language_packages' => 'Language Packages',
  'manage' => 'Manage',
  'profile' => 'Profile',
  '1_second_ago' => '1 second ago',
  'total_seconds_ago' => '{total} seconds ago',
  '1_minute_ago' => '1 minute ago',
  'total_minutes_ago' => '{total} minutes ago',
  '1_hour_ago' => '1 hour ago',
  'total_hours_ago' => '{total} hours ago',
  'today' => 'Today',
  'yesterday' => 'Yesterday',
  'move_this_block' => 'Move This Block',
  'online' => 'Online',
  'none' => '(none)',
  'cancel_lowercase' => 'cancel',
  'setting_can_move_on_a_y_and_x_axis' => '<title>Drag/Drop Blocks</title><info>Set this setting to <b>True</b> if you want to allow users to move blocks on a Y or X axis within areas where they can move blocks (eg. Their own profile). By default we only allow users to move blocks on a Y axis and allowing users to move blocks anywhere will give them the freedom but can cause your site design to be destroyed.</info>',
  'block' => 'Block',
  'full_name_is_online' => '{full_name} is online.',
  'setting_resize_images' => '<title>Resize Images</title><info>If you allow HTML on the site and users attempt to add images you can enable this option to set a maximum width/height in certain areas (eg. General Comments & News Feed).

<b>Note:</b> If enabled this will add an extra overhead to the script.</info>',
  'you_cannot_write_more_then_limit_characters' => 'You cannot write more then {limit} characters!',
  'you_have_limit_character_s_left' => 'You have {limit} character(s) left.',
  'welcome_email_content' => 'Thanks for joining our community!',
  'welcome_email_subject' => 'Welcome to {setting var=\'core.site_title\'}',
  'monday' => 'Monday',
  'tuesday' => 'Tuesday',
  'wednesday' => 'Wednesday',
  'thursday' => 'Thursday',
  'friday' => 'Friday',
  'saturday' => 'Saturday',
  'sunday' => 'Sunday',
  'view_less' => 'View Less',
  'select_a_file_to_upload' => 'Select a file to upload.',
  'clear' => 'Clear',
  'clear_your_current_status' => 'Clear your current status...',
  'not_a_valid_file_extension_we_only_allow_ext' => 'Not a valid file extension. We only allow: {ext}',
  'opps_something_went_wrong' => 'Oops! Something went wrong. We were not able to complete your request. We are looking into fixing the issue. Please refresh the page and try again.',
  'fill_in_a_proper_url' => 'Fill in a proper URL.',
  'url' => 'URL',
  'message' => 'Message',
  'image' => 'Image',
  'provide_a_proper_image_path' => 'Provide a proper image path.',
  'not_a_valid_password' => 'Not a valid password.',
  'invalid_url' => 'Invalid URL.',
  'provide_a_numerical_value' => 'Provide a numerical value.',
  'provide_a_valid_price' => 'Provide a valid price.',
  'provide_a_valid_year_eg_1982' => 'Provide a valid year. (eg. 1982)',
  'setting_mail_smtp_port' => '<title>SMTP Port</title><info>What port to use for sending mail with SMTP? Default is 25</info>',
  'setting_conver_time_to_string' => '<title>Time to String</title><info>Time to String</info>',
  'setting_global_welcome_time_stamp' => '<title>Global Welcome Time Stamp</title><info>Global Welcome Time Stamp</info>',
  'his' => 'his',
  'her' => 'her',
  'setting_no_more_ie6' => '<title>Detect IE6</title><info>With this feature enabled it will guide those using IE6 to upgrade to a supported browser.

This feature is powered by <a href="http://www.ie6nomore.com/" target="_blank">IE6 No More</a>

<b>Note:</b> The themes we provide by default require IE7 or higher, however other themes could work fine with IE6 as this comes down to the theme you have installed.</info>',
  'warning' => 'Warning!',
  'you_are_using_an_outdated_browser' => 'You are using an outdated browser',
  'for_a_better_experience_using_this_site_please_upgrade_to_a_modern_web_browser' => 'For a better experience using this site, please upgrade to a modern web browser.',
  'get_firefox' => 'Get Firefox',
  'get_internet_explorer' => 'Get Internet Explorer',
  'get_safari' => 'Get Safari',
  'get_google_chrome' => 'Get Google Chrome',
  'menu_core_new_sample' => 'New Sample',
  'menu_core_sub_menu' => 'Sub Menu',
  'setting_resize_embed_video' => '<title>Resize Embedded Videos</title><info>Enable this feature to resize embedded videos to fit your sites default theme in areas where it is designed to fix flash videos (eg. users profile).

Note that enabling this feature will be an extra overhead.

Use this feature with caution as it is  experimental.
</info>',
  'translate' => 'Translate',
  'setting_footer_watch_time_stamp' => '<title>Footer Bar Time Stamp</title><info>Footer Bar Time Stamp</info>',
  'setting_categories_to_show_at_first' => '<title>How many subcategories to show at first</title><info>This setting tells how many subcategories are to be shown at first. If the list of subcategories is longer than this value the extra ones will be hidden and a "View More" option will be shown instead, allowing the user to display the hidden subcategories.

a "View Less" option will be available to provide the full "accordion" effect.

If you set it to zero ("0" without quotes) it will hide every subcategory and a plus sign will show next to the category name, clicking the plus sign will show that category\'s subcategories.
</info>',
  'translating_name' => 'Translating: {name}',
  'sample_phrase' => 'Sample Phrase',
  'setting_global_site_title' => '<title>Site Title</title><info>This will displayed on each page as the title of your site.</info>',
  'uploading' => 'Uploading',
  'setting_css_edit_id' => '<title>CSS Edit ID#</title><info>CSS Edit ID#</info>',
  'setting_footer_bar_tool_tip_time_stamp' => '<title>Footerbar Tooltip Timestamp</title><info>This is the time stamp displayed when hovering over the mini time stamp on the footer bar.</info>',
  'what_s_on_your_mind' => 'What\'s on your mind?',
  'currency' => 'Currency',
  'currency_manager' => 'Currency Manager',
  'add_currency' => 'Add Currency',
  'u_s_dollars' => 'U.S. Dollars',
  'euros' => 'Euros',
  'pounds_sterling' => 'Pounds Sterling',
  'currencies' => 'Currencies',
  'custom_currency_sek' => 'Swedish Crown',
  'setting_group_currency' => '<title>Currency</title><info>Currency</info>',
  'setting_exchange_rate_api_key' => '<title>Exchange Rate API</title><info>In order to get the latest exchange rates for the currencies being used we need to connect to a 3rd party website. To sign up for a free API key go <a href="http://www.exchangerate-api.com/api-key">here</a>.</info>',
  'setting_group_cdn_content_delivery_network' => '<title>CDN (Content Delivery Network)</title><info>CDN (Content Delivery Network)</info>',
  'setting_amazon_access_key' => '<title>Amazon Access Key</title><info>Add your Amazon access key.</info>',
  'setting_amazon_secret_key' => '<title>Amazon Secret Key</title><info>Add your Amazon secret key.</info>',
  'setting_amazon_bucket' => '<title>Amazon Bucket Name</title><info>This will automatically be created by the script. Leave this setting unless you want to manually create a bucket on Amazon.</info>',
  'setting_amazon_bucket_created' => '<title>Amazon Bucket Created</title><info>This setting is automatically updated by the script. Only edit this setting for debugging purposes.</info>',
  'setting_allow_cdn' => '<title>Enable CDN (Beta)</title><info>Set this to "True" if you want to use CDN. Note that this feature is still in "Beta".</info>',
  'money_field_only_accepts_numbers_and_point' => 'The money fields can only have numbers and a point.
Valid examples:
12.43
15
0.65',
  'only_one_point_is_allowed' => 'In money fields only one point is allowed, valid examples:
23.12
19.54
30',
  'money_fields_are_required' => 'If a money field is set, the others are required. You can leave them all empty or none.',
  'setting_cdn_cname' => '<title>CDN URL (Optional)</title><info>If your CDN provider allows you to create a CNAME record you can add the domain here. Example: (http://cdn.yoursite.com/)</info>',
  'setting_force_https_secure_pages' => '<title>Secure Pages with HTTPS</title><info>If your server has support for HTTPS you can enable this feature to secure certain pages like the login, registration and account setting pages.</info>',
  'try_again_in_time_seconds' => 'Try again in {time} seconds.',
  'try_again_in_1_second' => 'Try again in 1 second.',
  'setting_global_genders' => '<title>Genders</title><info>This setting controls the genders used on this community. To add a new gender you need to populate it with 3 values separated by a pipe "|" (without quotes). Use the default Male and Female genders we provide as examples.
 The first value needs to be a unique numerical ID number. For Male and Female we use the numbers 1 and 2. We advice to go upwards from there. The 2nd field needs to be a phrase that you must first add using our language manager. Once you add a phrase it gives you several examples on how to use the phrase. We will be using the "Text" method, which is basically the variable name of the phrase and how we will connect to this specific word. So the 2nd value needs to be a phrase that identifies this gender. For Male and Female we used his and her. The 3rd value identifies the gender and must also be a phrase much like the 2nd value. For male and female we used Male and Female to populate this value.</info>',
  'all' => 'All',
  'time_separator' => '&nbsp;&nbsp;at&nbsp;&nbsp;',
  'setting_phpfox_total_users_online_mark' => '<title>Info on Total Users Online</title><info>Info on Total Users Online</info>',
  'setting_phpfox_total_users_online_history' => '<title>Info on Total Users Online History</title><info>Info on Total Users Online History</info>',
  'your_website_has_surpassed_its_limit_on_how_many_active' => 'Your website has surpassed its limit on how many active users you can have online at once. Below you will find a log of how many users you had and a time stamp of when it happened. We advice for you to upgrade your account so you do not encounter these interruptions in the future.',
  'limit_warning' => 'Limit Warning',
  'online_usage_log' => 'Online Usage Log',
  'timestamp' => 'Timestamp',
  'users' => 'Users',
  'setting_phpfox_is_hosted' => '<title>Hosted</title><info>Hosted</info>',
  'setting_phpfox_max_users_online' => '<title>Max Users Online</title><info>Max Users Online</info>',
  'saving' => 'Saving...',
  'loading_text_editor' => 'Loading text editor',
  'setting_enabled_edit_area' => '<title>Use Edit Area</title><info>Enable this to use <a href="http://www.cdolivet.com/index.php?page=editArea">EditArea</a> when editing code (HTML, PHP etc...) within the AdminCP. This feature transforms a conventional form into a code editor.</info>',
  'setting_group_ip_infodb' => '<title>IP InfoDB</title><info>Free IP address geolocation tools</info>',
  'setting_ip_infodb_api_key' => '<title>IP InfoDB API Key</title><info>IP InfoDB is a free IP address geolocation tools we use to find useful information about users based on their IP. Enter your free API key, which you can get <a href="http://ipinfodb.com/register.php">here</a>.</info>',
  'setting_load_jquery_from_google_cdn' => '<title>Load jQuery from Google CDN</title><info>Enabling this option will load jQuery related JavaScript files from Google CDN servers. More information can be found <a href="http://code.google.com/apis/libraries/devguide.html">here</a>.</info>',
  'setting_jquery_google_cdn_version' => '<title>jQuery Version on Google CDN</title><info>Define the version of jQuery that is available on <a href="http://code.google.com/apis/libraries/devguide.html#jquery">Google CDN</a> servers.</info>',
  'setting_jquery_ui_google_cdn_version' => '<title>jQuery UI Version on Google CDN</title><info>Define the version of jQuery UI that is available on <a href="http://code.google.com/apis/libraries/devguide.html#jqueryUI">Google CDN</a> servers.</info>',
  'setting_friends_only_community' => '<title>Friends Only Community</title><info>By enabling this option certain sections (eg. Blogs, Photos etc...), will by default only show items from the member and his or her friends list. <b>Note:</b> In order for this to work you must enable the option <b>Section Privacy Item Browsing
</b></info>',
  'setting_site_wide_ajax_browsing' => '<title>Site Wide AJAX Browsing</title><info>By enabling this option users will be able to browse certain areas on the site using AJAX. By using AJAX we only load the required data for the specific page to be displayed. This saves bandwidth and can greatly improve your servers overall performance due to the reduced number of requests to your servers.</info>',
  'setting_section_privacy_item_browsing' => '<title>Section Privacy Item Browsing</title><info>Enabling this option will allow users to browse certain sections that allow privacy settings. By default we only display public items in what we call sections (eg. Blogs, Polls, Albums etc...). With this option enabled we will display items to the user that is viewing it based on the items privacy setting. Note that this option requires a load balanced server and in many cases several SQL servers just to support this sort of query on an active community.</info>',
  'setting_date_field_order' => '<title>Calendar Date Format</title><info>The format for parsed and displayed dates. 
MDY = Month/Day/Year
DMY = Day/Month/Year
YMD = Year/Month/Day</info>',
  'setting_use_jquery_datepicker' => '<title>Use Datepicker</title><info>Set this to "TRUE" to use a Datepicker on all areas that require users to select a date.</info>',
  'name' => 'Name',
  'in_queue' => 'In queue',
  'more_queued_than_allowed' => 'Please only select {iQueueLimit} files',
  'stopped' => 'Stopped',
  'manage_activity_points' => 'Manage Activity Points',
  'multiple_selection' => 'Multiple Selection',
  'radio' => 'Radio',
  'checkbox' => 'Checkbox',
  'setting_cdn_amazon_https' => '<title>Enable HTTPS Support</title><info>Set this to TRUE if a user is on a secure page to use HTTPS with Amazon S3 items. Note you will need to create your own certificate to work with Amazon S3 as they do not provide support for this by default.</info>',
  'upload_problems' => 'Upload problems? Try the <a href="{link}">basic uploader</a> (works on older computers and web browsers).',
  'user_setting_can_design_dnd' => 'Can members of this user group enable the site designer to drag and drop blocks all around the site? (These changes affect the entire site and this feature is targeted to site administrators)',
  'menu_core_create_a_list_a441eadc1389cdf0ffe6c4f8babdd66e' => 'Create a List',
  'setting_twitter_consumer_key' => '<title>Consumer Key</title><info>Enter your Twitter consumer key.</info>',
  'setting_twitter_consumer_secret' => '<title>Consumer Secret</title><info>Enter your Twitter consumer secret.</info>',
  'setting_allow_html_in_activity_feed' => '<title>Allow HTML in Activity Feed</title><info>If you enable this option it will allow HTML in the activity feed and any comments connected to the feed.</info>',
  'setting_disable_hash_bang_support' => '<title>AJAX Browsing - Disable Hash-Bang URL</title><info>If you have "Site Wide AJAX Browsing" enabled we provide support for a function provided with HTML5 that allows the changing of the URL path without actually reloading the page. For browsers that do not have support for this function we use a fallback hash-bang URL. If you do not want to allow the usage of hash-bang URL\'s enable this option and for browsers that do not have HTML 5 support will not be able to use your sites AJAX browsing functionality. Currently all IE browsers do not have support for this HTML5 function so they by default use the fallback method.</info>',
  'search_dot' => 'Search...',
  'account_info' => 'Account Info',
  'edit_profile' => 'Edit Profile',
  'add_new_block' => 'Add New Block',
  'disable_dnd' => 'Disable DnD',
  'dnd_mode' => 'DnD Mode',
  'back' => 'Back',
  'home' => 'Home',
  'add' => 'Add',
  'log_back_in_as_global_full_name' => 'Log back in as {global_full_name}',
  'edit_page' => 'Edit Page',
  'login_as_page' => 'Login as Page',
  'enable_dnd_mode' => 'Enable DnD Mode',
  'disable_dnd_mode' => 'Disable DnD Mode',
  'view_more' => 'View More',
  'displaying_of_total' => '{displaying} of {total}',
  'select_all' => 'Select All',
  'un_select_all' => 'Un-Select All',
  'with_selected' => 'With Selected',
  'clear_all_selected' => 'Clear All Selected',
  'all_time' => 'All Time',
  'this_month' => 'This Month',
  'this_week' => 'This Week',
  'upcoming' => 'Upcoming',
  'sort' => 'Sort',
  'show' => 'Show',
  'when' => 'When',
  'align_left' => 'Align Left',
  'align_center' => 'Align Center',
  'align_right' => 'Align Right',
  'bullets' => 'Bullets',
  'ordered_list' => 'Ordered List',
  'setting_display_older_ie_error' => '<title>IE8 or Higher Requirement Check</title><info>By default the script requires IE8 or higher. We will show users a notice if they are using an older version and a link to upgrade their browser. Disable this if you do not want to show a warning.</info>',
  'ie8_or_higher_warning' => 'You seem to be using an older version of Internet Explorer. This site requires Internet Explorer 8 or higher. Update your browser <a href="http://www.microsoft.com/ie/" target="_blank">here</a> today to fully enjoy all the marvels of this site.',
  'himself' => 'himself',
  'herself' => 'herself',
  'said' => 'said...',
  'loading' => 'Loading',
  'setting_disable_ie_warning' => '<title>Disable IE Warning</title><info>We display a warning for those that use Internet Explorer 7 or lower. Enable this setting if you do not want to display this warning.</info>',
  'menu_core_fo_sale_fad58de7366495db4650cfefac2fcd61' => 'RENTALS',
  'menu_core_more_fad58de7366495db4650cfefac2fcd61' => 'MORE',
  'menu_core_rentals_fad58de7366495db4650cfefac2fcd61' => 'SALES',
  'menu_core_mortgage_rates_fad58de7366495db4650cfefac2fcd61' => 'PROPERTY OWNERS',
  'menu_core_advice_fad58de7366495db4650cfefac2fcd61' => 'ADVICE',
  'menu_core_blog_fad58de7366495db4650cfefac2fcd61' => 'BLOG',
  'menu_core_more_972c97bdc47dfc8def0e74c55da0bbfd' => 'MORE',
); ?>