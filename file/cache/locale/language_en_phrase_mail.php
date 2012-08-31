<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'user_setting_total_folders' => 'Total amount folders a user can add to their mail box. 

To add an unlimited number add "0" (without quotes).',
  'menu_compose' => 'Compose',
  'module_mail' => 'Mail',
  'user_wrote_time' => '<a href="{link}">{user}</a> wrote on {time}',
  'add_new_folder' => 'Add new Folder...',
  'adding_new_folder' => 'Adding new folder',
  'invalid_message' => 'Invalid message.',
  'add_reply' => 'Add a reply.',
  'message' => 'Message',
  'adding_message' => 'Adding message.',
  'reply' => 'Reply',
  'send' => 'Send',
  'folders' => 'Folders',
  'edit_folders' => 'Edit Folders',
  'inbox' => 'Inbox',
  'sent_messages' => 'Sent Messages',
  'trash' => 'Trash',
  'add' => 'Add',
  'update' => 'Update',
  'cancel' => 'Cancel',
  'delete' => 'Delete',
  'view_folders' => 'View Folders',
  'move_folder' => 'Move to folder',
  'or_cancel' => 'or <a href="#" onclick="$(\'#js_action_selector\').val(\'\'); $(\'#js_folders\').hide(); $(\'#js_select_info\').show(\'slow\'); return false;">cancel</a>.',
  'default' => 'Default',
  'custom' => 'Custom',
  'select' => 'Select',
  'undelete' => 'Undelete',
  'mark_read' => 'Mark as Read',
  'mark_unread' => 'Mark as Unread',
  'none' => 'None',
  'read' => 'Read',
  'unread' => 'Unread',
  'all' => 'All',
  'to' => 'To',
  're' => 'Re',
  'messages' => 'No messages.',
  'messages_updated' => 'Message(s) updated.',
  'messages_deleted' => 'Message(s) deleted.',
  'search_inbox' => 'Search Inbox',
  'invalid_box' => 'Invalid box.',
  'message_successfully_deleted' => 'Message successfully deleted.',
  'messages_successfully_moved' => 'Message(s) successfully moved.',
  'folder_error' => 'Folders can only contain alphanumeric characters, limit of 255 characters and the following symbols: _-',
  'folder_already_use' => 'Folder is already in use.',
  'compose_new_message' => 'Compose New Message',
  'subject' => 'Subject',
  'provide_user_email' => 'Provide a user or email.',
  'provide_subject_for_your_message' => 'Provide a subject for your message.',
  'provide_message' => 'Provide a message.',
  'message_was_successfully_users' => 'Your message was successfully sent to the following users',
  'not_member' => 'Not a member.',
  'cannot_send_message_yourself' => 'Cannot send a message to yourself.',
  'and' => 'and',
  'user_setting_can_compose_message' => 'Can compose messages to another users?',
  'user_setting_can_add_folders' => 'Can add custom folders?',
  'setting_show_core_mail_folders_item_count' => '<title>Show inbox, sentbox and deletebox item count</title><info>If enabled will display the mail count totals in each folder, i.e.:

inbox (2)
sentbox (6)
delete (10)</info>',
  'user_setting_show_core_mail_folders_item_count' => 'When enabled shows how many messages are in the inbox, sentbox and deletebox of every profile. 

Note that this adds extra queries to your database.',
  'setting_display_total_mail_count' => '<title>Display Total Mail Count</title><info>Set to <b>True</b> if you would like to display the number of new messages a user has beside the main "Mail" link found in the main menu by default.

<b>Notice:</b> This will add an extra SQL query.</info>',
  'user_setting_can_add_attachment_on_mail' => 'Can add attachments?',
  'user_setting_mail_box_limit' => 'This setting tells how many messages can be stored based on the user group. It is complemented by the setting override_mail_box_limit to allow administrators and staff members to store any number of messages.',
  'user_setting_override_mail_box_limit' => 'This setting tells if members of this user group can overcome the limit imposed by the setting mail_box_limit.

By default only administrators and staff members can have unlimited messages stored.',
  'user_setting_restrict_message_to_friends' => 'This setting tells if the user can only send messages to people in his/her friends list.',
  'user_setting_can_message_self' => 'This setting controls if members of this user group can send messages to themselves.',
  'user_setting_override_restrict_message_to_friends' => 'Members allowed to override the "restrict_message_to_friends" will be able to receive messages regardless if they are friends of the sender or not.',
  'user_setting_mail_box_warning' => 'When users are about to use all their allowed mail space a warning will be shown. 

This setting tells what percentage of their mail capacity must be used before showing this warning.

Set it to zero to never show a warning.',
  'setting_enable_mail_box_warning' => '<title>Show Warning When Approaching Maibox Limit</title><info>This setting overrides the user group setting \'mail.mail_box_warning\'. If this setting is disabled no warning will be shown regardless of whats set in mail.mail_box_warning.</info>',
  'user_setting_allow_delete_every_message' => 'When enabled this setting allows users to delete all the messages from the current folder without having to delete several times or going through the pager.

A new option will be shown in the mail selector with the count of messages to delete next in parenthesis.

example:
   None
   Read
   Unread
   All
-> All(24)',
  'setting_enable_cron_delete_old_mail' => '<title>Auto Delete Old Mail</title><info>This setting enables or disables the auto deletion of old messages.

You can set how old a message should be to be deleted in the setting <setting>mail.message_age_to_delete</setting>.

You can set how often to run this job in the setting <setting>mail.cron_delete_messages_delay</setting>.</info>',
  'setting_cron_delete_messages_delay' => '<title>Auto Delete Messages Delay</title><info>This setting tells how often (in days) will the auto deleter remove old messages.</info>',
  'setting_message_age_to_delete' => '<title>An Old Message Is...</title><info>This setting tells how old a message must be in (in days) order to be auto deleted.

This setting is directly dependent on <setting>mail.enable_cron_delete_old_mail</setting>.</info>',
  'setting_delete_sent_when_account_cancel' => '<title>Delete Sent Mail</title><info>When a user cancels their account should the system delete the sent messages?

This affects the other user\'s received messages list and is enabled by default.</info>',
  'user_setting_can_read_private_messages' => 'Can members of this user group read private messages in your site?',
  'user_setting_can_delete_others_messages' => 'Can members of this user group delete other people\'s messages?',
  'user_setting_enable_captcha_on_mail' => 'Enable Captcha when composing messages.',
  'setting_spam_check_messages' => '<title>Spam Check Internal PM</title><info>Spam Check Internal PM</info>',
  'setting_mail_hash_check' => '<title>PM Hash Check</title><info>If enabled this will check if the last X messages sent in the last Y minutes are identical to the message being set.

Notice: X & Y are settings that can be changed.</info>',
  'setting_total_mail_messages_to_check' => '<title>PM Messages to Check</title><info>If the setting to check if PM\'s are identical you can see here how many messages in the past should be checked.</info>',
  'setting_total_minutes_to_wait_for_pm' => '<title>PM Minutes to Wait Unilt Next Check</title><info>If the setting to check if PM\'s are identical you can set here how far back we should check in minutes.</info>',
  'setting_show_preview_message' => '<title>Show Preview Message</title><info>If enabled, users will see a short version of their messages.</info>',
  'user_setting_send_message_to_max_users_each_time' => 'This value restricts sending private messages.
It sets the maximum number of recipients when sending private messages, avoiding users to select way too many users and potentially spamming.

Set to 0 for unlimited.',
  'read_private_message' => 'Read Private Message',
  'subject_amp_text' => 'Subject &amp; Text',
  'text' => 'Text',
  'all_members' => 'All Members',
  'featured_members' => 'Featured Members',
  'online' => 'Online',
  'updated' => 'Updated',
  'name_and_photo_only' => 'Name and Photo Only',
  'name_photo_and_users_details' => 'Name, Photo and Users Details',
  'private_messages' => 'Private Messages',
  'view_private_messages' => 'View Private Messages',
  'currently_your_account_is_marked_as_a_spammer' => 'Currently your account is marked as a "spammer". This specific feature is not enabled for your account at the moment.',
  'unable_to_send_a_private_message_to_this_user_at_the_moment' => 'Unable to send a private message to this user at the moment.',
  'select_a_member_to_send_a_message_to' => 'Select a member to send a message to.',
  'this_message_feels_like_spam_try_again' => 'This message feels like SPAM. Try again.',
  'mail' => 'Mail',
  'no_mail_specified' => 'No mail specified.',
  'mail_deleted_successfully' => 'Mail deleted successfully.',
  'mail_could_not_be_deleted' => 'Mail could not be deleted.',
  'error_you_did_not_select_any_message' => 'Error you did not select any message.',
  'mail_folder_does_not_exist' => 'Mail folder does not exist.',
  'new_messages' => 'New Messages',
  'compose_message' => 'Compose Message',
  '1_new_message' => '1 new message',
  'total_new_messages' => '{total} new messages',
  'user_link_sent_you_a_message' => '{user_link} sent you a message.',
  'mail_text' => 'Mail Text',
  'too_many_users_this_message_was_sent_to_the_first_total_users' => 'Too many users, this message was sent to the first {total} users.',
  'unable_to_send_a_private_message_to_full_name_as_they_have_disabled_this_option_for_the_moment' => 'Unable to send a private message to "{full_name}" as they have disabled this option for the moment.',
  'user_has_reached_their_inbox_limit' => 'User has reached their inbox limit.',
  'you_cannot_message_yourself' => 'You cannot message yourself.',
  'you_can_only_message_your_friends' => 'You can only message your friends.',
  'not_a_valid_message' => 'Not a valid message.',
  'full_name_sent_you_a_message_on_site_title' => '{full_name} sent you a message on {site_title}.',
  'full_name_sent_you_a_message_subject_subject' => '{full_name} sent you a message.

--------------------
Subject: {subject}

{message}
--------------------

To reply to this message, follow the link below:
<a href="{link}">{link}</a>',
  'you_will_delete_every_message_in_this_folder' => 'You will delete every message in this folder.',
  'member_search' => 'Member Search',
  'search' => 'Search',
  'within' => 'within',
  'user_group' => 'User Group',
  'show_members' => 'Show Members',
  'messages_title' => 'Messages',
  'from' => 'From',
  'sent' => 'Sent',
  'read_message' => 'Read Message',
  'delete_message' => 'Delete Message',
  'message_sender' => 'Message Sender',
  'message_user' => 'Message User',
  'message_receiver' => 'Message Receiver',
  'are_you_sure' => 'Are you sure?',
  'no_messages_to_show' => 'No messages to show.',
  'send_a_copy_to_myself' => 'Send a copy to myself.',
  'you_can_only_send_this_message_to_total_users' => 'You can only send this message to {total} users.',
  'messages_total_days_old_will_be_auto_deleted' => 'Messages {total} days old will be auto deleted.',
  'you_have_reached_your_mail_box_capacity_and_wont_be_able' => 'You have reached your mail box capacity and wont be able to receive any more mail until you free some space.',
  'you_are_approaching_your_mail_box_limit' => 'You are approaching your mail box limit, currently at {total}%. When you reach 100% you wont be able to receive more mail.',
  'view_attachments' => 'View Attachments',
  'you_wrote_to_yourself_at_time_stamp' => 'You wrote to yourself at {time_stamp}.',
  'preview' => 'Preview',
  'you_wrote_to_user_name_at_time_stamp' => 'You wrote to {user_name} at {time_stamp}.',
  'user_name_wrote_at_time_stamp' => '{user_name} wrote at {time_stamp}.',
  'site_sent_you_a_message' => '{site} sent you a message.',
  'mass_message_to' => 'Mass message to',
  'previous' => 'Previous',
  'newer_message' => 'Newer Message',
  'next' => 'Next',
  'older_message' => 'Older Message',
  'provide_a_name_for_your_folder' => 'Provide a name for your folder.',
  'you_have_reached_your_limit' => 'You have reached your limit.',
  'mesages_sent' => 'Messages',
  'viewing_private_message' => 'Viewing Private Message',
  'private_message_from_timestamp' => 'Private message from {time_stamp} between {owner} and {viewer}.',
  'message_not_found' => 'Message not found.',
  'report' => 'Report',
  'report_this_message' => 'Report this message.',
  'mobile_messages' => 'Messages',
  'compose' => 'Compose',
  'no_messages' => 'No messages',
  'unable_to_find_any_messages' => 'Unable to find any messages',
  'select_recipient' => 'Select Recipient',
  'select_a_recipient_below' => 'Select a recipient below',
  'update_mail_count' => 'Update Mail Count',
  'updating' => 'Updating',
  'setting_disallow_select_of_recipients' => '<title>Disallow Selecting Not Allowed Recipients</title><info>When this setting is enabled the script will run an extra check on each target user when selecting who will receive an internal mail.

This helps the user selector to be more user friendly by not allowing to choose and write a message to someone who cannot receive it but at the same time it uses more resources and could slow down your site.</info>',
  'processing_batch_number' => 'Processing batch {number}',
  'batch_number_completed_percentage' => 'Batch {page_number} completed ({percentage}%)',
  'use_the_exact_user_name' => 'Use the exact user name',
  'send_from_my_own_address_semail' => 'Send from my own address ({sEmail})',
  'messages_notify' => 'Messages',
  'send_a_new_message' => 'Send a New Message',
  'no_new_messages' => 'No new messages.',
  'see_all_messages' => 'See All Messages',
  'new_folder' => 'New Folder',
  'new_message' => 'New Message',
  'select_folder' => 'Select Folder',
  'folder_successfully_created' => 'Folder successfully created.',
  'create_new_folder' => 'Create New Folder',
  'delete_this_list' => 'Delete This List',
  'moderate' => 'Moderate',
  'mark_as_read' => 'Mark as Read',
  'mark_as_unread' => 'Mark as Unread',
  'you' => 'You',
  'no_messages_found_here' => 'No messages found here.',
  'create_a_new_folder' => 'Create a New Folder',
  'search_messages' => 'Search Messages...',
  'latest' => 'Latest',
  'unread_first' => 'Unread First',
  'move' => 'Move',
  'this_message_was_sent_from_full_name' => 'This message was sent from {full_name}',
  'actions' => 'Actions',
  'search_friends_by_their_name' => 'Search friends by their name...',
  'enter_the_name_of_your_custom_folder' => 'Enter the name of your custom folder.',
  'submit' => 'Submit',
  'your_message_was_successfully_sent' => 'Your message was successfully sent',
  'li_a_href_link_email_image_new_messages_messages_number_a_li' => '<li><a href="{link}">{email_image} New Messages( {messages_number})</a><li>',
  'get_the_total_number_of_unseen_messages_if_you_do_not_pass_the_user_id_we_will_return_information_about_the_user_that_is_currently_logged_in' => 'Get the total number of unseen messages. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
  'folder_successfully_deleted' => 'Folder successfully deleted.',
  'message_s_successfully_deleted' => 'Message(s) successfully deleted.',
); ?>