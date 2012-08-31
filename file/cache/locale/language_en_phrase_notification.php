<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'module_notification' => 'Notification',
  'setting_always_display_notification_box' => '<title>Display Notification Box</title><info>Select <b>True</b> if you would like to display the notifications (eg. new messages) block on the sites index page even when a user has no notifications.</info>',
  'setting_notify_on_new_request' => '<title>Site Wide Notification</title><info>If enabled users will be notified when a new request or notification is available.

<b>Notice:</b> This feature will include two (2) extra SQL queries on every page the user visits.</info>',
  'setting_notify_ajax_refresh' => '<title>Site Wide Notification AJAX Refresh (Minutes)</title><info>If enabled this will update the AJAX request to check if a user has any new notifications every X minutes where X is the numerical value of this setting.

<b>Notice:</b> This setting will only be enabled if the parent setting "<setting>notification.notify_on_new_request</setting>" is enabled.</info>',
  'notifications' => 'Notifications',
  'view' => 'View',
  'hide' => 'Hide',
  'no_new_notifications' => 'No new notifications.',
  'unable_to_find_the_page_you_are_looking_for' => 'Unable to find the page you are looking for.',
  'setting_total_notification_title_length' => '<title>Notification Title Length</title><info>When users receive a notification certain items include a title. This setting controls the length of the title.</info>',
  'see_all_notifications' => 'See All Notifications',
  'delete_all_notifications' => 'Delete All Notifications',
  'delete_this_notification' => 'Delete this notification',
  'reset_notification_count' => 'Reset Notification Count',
  'today' => 'Today',
  'yesterday' => 'Yesterday',
  'you' => 'You',
  'and' => 'and',
  'other' => 'other',
  'others' => 'others',
  'get_the_total_number_of_unseen_notifications_if_you_do_not_pass_the_user_id_we_will_return_information_about_the_user_that_is_currently_logged_in' => 'Get the total number of unseen notifications. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
  'get_all_of_the_users_notifications_if_you_do_not_pass_the_user_id_we_will_return_information_about_the_user_that_is_currently_logged_in' => 'Get all of the users notifications. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
); ?>