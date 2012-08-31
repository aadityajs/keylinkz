<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'module_im' => 'Instant Messenger',
  'setting_im_time_stamp' => '<title>Messenger Time Stamp</title><info>Messenger Time Stamp</info>',
  'setting_enable_im_in_footer_bar' => '<title>Enable IM (Footer Bar)</title><info>Set to <b>True</b> to enable the Instant Messenger to be part of the site wide footer bar.</info>',
  'setting_group_total_friends_to_display_in_im' => '<title>total friends to display in im</title><info>Define how many friends should be displayed within the IM list.</info>',
  'setting_total_friends_to_display_in_im' => '<title>Total Friends in IM List</title><info>Define how many friends should be displayed within the IM list.</info>',
  'online' => 'Online',
  'away' => 'Away',
  'appear_offline' => 'Appear Offline',
  'not_a_valid_chat_room' => 'Not a valid chat room.',
  'unable_to_send_this_user_an_offline_message' => 'Unable to send this user an offline message.',
  'report' => 'Report',
  'report_this_user' => 'Report this User',
  'instant_messenger' => 'Instant Messenger',
  'chat' => 'Chat',
  'offline' => 'Offline',
  'close' => 'Close',
  'find_your_friends' => 'Find your friends...',
  'no_friends_online' => 'No friends online.',
  'member_is_offline' => 'Member is offline.',
  'go_offline' => 'Go Offline',
  'edit_block_list' => 'Edit Block List',
  'status' => 'Status',
  'play_sound_on_new_message' => 'Play sound on new message',
  'yes' => 'Yes',
  'no' => 'No',
  'options' => 'Options',
  'block' => 'Block',
  'more_conversations' => 'More Conversations...',
  'conversations' => 'Conversations',
  'setting_im_time_stamp_past' => '<title>IM Time Stamp (Past)</title><info>IM Time Stamp (Past)</info>',
  'are_you_sure' => 'Are you sure?',
  'setting_im_php_sleep' => '<title>Server Sleep Timeout</title><info>When the IM requests an update from the server, the server will check for new messages and other information, if nothing new is found it will wait to check again, this value sets how long (in seconds) should the server wait.

The lower the value the more real time the IM will look, but it will use more server resources. 

Too low a value and your server may not be able to handle it, use carefully.</info>',
  'setting_im_php_loops' => '<title>Server Number Of Checks</title><info>When the IM requests an update from the server, the server will check for new messages and other information, if nothing new is found it will wait to check again, this happens in the same ajax call. This setting tells how many times should the same process check for new updates before closing the connection.

Some servers limit how long can a PHP process run (for example 30 seconds), you can use this value and "Server Sleep Timeout" to schedule the updates for the IM.

The default combination allows the checks to run for 30 seconds before returning control to the web browser for another run.</info>',
  'setting_js_interval_value' => '<title>JS Ajax Interval Check Timeout</title><info>This setting controls how often will the IM check on the state of an Ajax call. The value is in milliseconds, so it defaults to 3 seconds.

If the value is too low the web browser may become unresponsive. It is advised to keep it in the thousands range.</info>',
  'setting_server_for_ajax_calls' => '<title>Server For Ajax Calls</title><info>To improve performance you can distribute the load from the IM to a different server.
This setting tells to which server should the IM query for updates.

Keep in mind that the server must still be under the same domain.

If you leave it blank the IM will query the main server.
Acceptable values are in the form of a domain or an IP address, for example:
http://im.domain.com/
http://67.15.104.63/

are valid examples. Also dont forget the http:// and the ending /</info>',
  'block_this_user' => 'Block This User',
  'unable_to_block_this_user' => 'Unable to block this user.',
); ?>