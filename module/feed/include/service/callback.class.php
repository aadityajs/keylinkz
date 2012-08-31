<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Callbacks
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: callback.class.php 8 2009-01-05 04:52:08Z Raymond_Benc $
 */
class Feed_Service_Callback extends Phpfox_Service
{
	public function  __construct()
	{
		$this->_sTable = Phpfox::getT('feed');
	}
	
	public function mobileMenu()
	{
		return array(
			'phrase' => Phpfox::getPhrase('feed.news_feed'),
			'link' => Phpfox::getLib('url')->makeUrl('feed'),
			'icon' => Phpfox::getLib('image.helper')->display(array('theme' => 'mobile/small_activity-feed.png'))
		);
	}
	
	public function massAdmincpModuleDelete($iModule)
	{
		$this->database()->delete($this->_sTable, "type_id = '" . $this->database()->escape($iModule) . "'");
	}	
	
	public function getCommentNewsFeed($aRow)
	{
		return false;
		
		if ($aRow['owner_user_id'] == $aRow['viewer_user_id'])
		{
			$aRow['text'] = Phpfox::getPhrase('feed.a_href_owner_link_owner_full_name_a_commented_on_their_own_a_href_link_feed_a', array(
					'owner_link' => Phpfox::getLib('url')->makeUrl($aRow['owner_user_name']),
					'owner_full_name' => $this->preParse()->clean($aRow['owner_full_name']),
					'link' => Phpfox::getLib('url')->makeUrl($aRow['viewer_user_name'], array('feed' => $aRow['item_id'], '#feed'))			
				)
			);
		}
		else 
		{
			$aRow['text'] = Phpfox::getPhrase('feed.owner_full_name_commented_on_full_names_feed', array(
					'owner_link' => Phpfox::getLib('url')->makeUrl($aRow['owner_user_name']),
					'owner_full_name' => $this->preParse()->clean($aRow['owner_full_name']),
					'viewer_link' => Phpfox::getLib('url')->makeUrl($aRow['viewer_user_name']),
					'viewer_full_name' => $this->preParse()->clean($aRow['viewer_full_name']),
					'link' => Phpfox::getLib('url')->makeUrl($aRow['viewer_user_name'], array('feed' => $aRow['item_id'], '#feed'))
				)
			);
		}
		
		$aRow['text'] .= Phpfox::getService('feed')->quote($aRow['content']);
		
		return $aRow;
	}
	
	public function getItemName($iId, $sName)
	{
		return '<a href="' . Phpfox::getLib('url')->makeUrl('comment.view', array('id' => $iId)) . '">' . Phpfox::getPhrase('feed.on_name_s_feed', array('name' => $sName)) . '</a>';
	}	
	
	public function deleteComment($iId)
	{
		
	}
	
	public function hideBlockDisplay($sTypeId)
	{		
		return array(
			'table' => ($sTypeId == 'profile' ? 'user_design_order' : 'user_dashboard')
		);
	}
	
	public function getBlockDetailsDisplay($sTypeId)
	{
		switch ($sTypeId)
		{
			case 'dashboard':
				if (!Phpfox::getUserParam('feed.can_remove_feeds_from_dashboard'))
				{
					return false;
				}
				break;
			case 'profile':	
				if (!Phpfox::getUserParam('feed.can_remove_feeds_from_profile'))
				{
					return false;
				}
				break;
			default:
				
				break;
		}
		
		return array(
			'title' => Phpfox::getPhrase('feed.updates')
		);
	}
	
	public function onDeleteUser($iUser)
	{
	    $this->database()->delete($this->_sTable, 'user_id = ' . (int)$iUser);
	}

	public function getProfileSettings()
	{
		return array(
			'feed.share_on_wall' => array(
				'phrase' => Phpfox::getPhrase('user.share_on_your_wall'),
				'default' => '1',
				'anyone' => false
			),
			'feed.view_wall' => array(
				'phrase' => Phpfox::getPhrase('user.view_your_wall'),
				'default' => '0'				
			)
		);			
	}

	public function getReportRedirect($iId)
	{
		$aFeed = $this->database()->select('f.*, ' . Phpfox::getUserField())
			->from(Phpfox::getT('feed_comment'), 'f')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = f.parent_user_id')
			->where('f.feed_comment_id = ' . (int) $iId)
			->execute('getRow');

		if (!isset($aFeed['feed_comment_id']))
		{
			return false;
		}
		
		return Phpfox::getLib('url')->makeUrl($aFeed['user_name'], array('comment-id' => $aFeed['feed_comment_id']));		
	}	
	
	public function getReportRedirectComment($iId)
	{
		$aFeed = $this->database()->select('c.comment_id, f.feed_id, ' . Phpfox::getUserField())
			->from(Phpfox::getT('comment'), 'c')
			->join(Phpfox::getT('feed'), 'f', 'f.feed_id = c.item_id')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = f.user_id')
			->where('c.comment_id = ' . (int) $iId)
			->execute('getRow');	
			
		if (empty($aFeed))
		{
			return false;
		}
		
		return Phpfox::getLib('url')->makeUrl($aFeed['user_name'], array('feed' => $aFeed['feed_id'], 'feed-comment' => $aFeed['comment_id'], '#feed'));
	}
	
	public function getRedirectComment($iId)
	{		
		return $this->getReportRedirect($iId);	
	}
	
	public function pendingApproval()
	{
		return array(
			'phrase' => Phpfox::getPhrase('feed.profile_comments'),
			// 'value' => $this->database()->select('COUNT(*)')->from(Phpfox::getT('feed'))->where('view_id = 1')->execute('getSlaveField'),
			'value' => 0,
			'link' => Phpfox::getLib('url')->makeUrl('admincp.feed', array('view' => 'approval'))
		);
	}

	public function getActivityFeedEgift($aItem)
	{
		/* Check if this egift is free or paid */
		// `phpfox_egift_invoice`.`birthday_id` = `phpfox_feed`.`feed_id`
		$aInvoice = $this->database()->select('e.file_path, g.price, g.status, fc.content, fc.feed_comment_id, fc.total_comment, f.time_stamp, fc.total_like, l.like_id as is_liked, ' . Phpfox::getUserField('u', 'parent_'))
				->from(Phpfox::getT('egift_invoice'), 'g')
				->join(Phpfox::getT('feed'), 'f', 'f.feed_id = g.birthday_id')
				->join(Phpfox::getT('egift'), 'e', 'e.egift_id = g.egift_id')
				->leftjoin(Phpfox::getT('feed_comment'), 'fc', 'fc.feed_comment_id = ' . $aItem['item_id'])
				->leftJoin(Phpfox::getT('user'), 'u', 'u.user_id = fc.parent_user_id')
				->leftjoin(Phpfox::getT('like'),'l', 'l.item_id = f.feed_id AND l.type_id = "feed_egift"')
				->where('g.birthday_id = ' . (int)$aItem['feed_id'])
				->execute('getSlaveRow');

		if ($aInvoice['price'] > 0 && $aInvoice['status'] != 'completed')
		{
			return false;
		}
		
		$aReturn = array(
			'no_share' => true,
			'feed_status' => $aInvoice['content'],
			'feed_link' => '',
			'total_comment' => $aInvoice['total_comment'],
			'feed_total_like' => $aInvoice['total_like'],
			'feed_is_liked' => $aInvoice['is_liked'],
			'feed_icon' => Phpfox::getLib('image.helper')->display(array('theme' => 'misc/comment.png', 'return_url' => true)),
			'time_stamp' => $aInvoice['time_stamp'],			
			'enable_like' => true,			
			'comment_type_id' => 'feed',
			'like_type_id' => 'feed_egift'			
		);
		
		if (!empty($aInvoice['file_path']))
		{
			$aReturn['feed_image'] = Phpfox::getLib('image.helper')->display(array(
					'server_id' => 0,
					'path' => 'egift.url_egift',
					'file' => $aInvoice['file_path'],
					'suffix' => '_120',
					'max_width' => 120,
					'max_height' => 120,
					'thickbox' => true
				)
			);			
		}		
		
		if (!empty($aInvoice['parent_user_name']) && !defined('PHPFOX_IS_USER_PROFILE') && empty($_POST))
		{
			$aReturn['parent_user'] = Phpfox::getService('user')->getUserFields(true, $aInvoice, 'parent_');
		}		
		
		if (!PHPFOX_IS_AJAX && defined('PHPFOX_IS_USER_PROFILE') && !empty($aInvoice['parent_user_name']) && $aInvoice['parent_user_id'] != Phpfox::getService('profile')->getProfileUserId())
		{
			$sLink = Phpfox::getLib('url')->makeUrl($aInvoice['parent_user_name'], array('comment-id' => $aInvoice['feed_comment_id']));
			$aReturn['feed_mini'] = true;
			$aReturn['feed_mini_content'] = Phpfox::getPhrase('feed.content_on_a_href_link_parent_full_name_a_s_a_href_wall_link_wall_a', array('content' => strip_tags($aInvoice['content']), 'link' => Phpfox::getLib('url')->makeUrl($aInvoice['parent_user_name']), 'parent_full_name' => $aInvoice['parent_full_name'], 'link' => $sLink));
			
			unset($aReturn['feed_status']);
		}		
		
		return $aReturn;
	}
	
	public function getActivityFeedComment($aItem)
	{
		$aRow = $this->database()->select('fc.*, l.like_id AS is_liked, ' . Phpfox::getUserField('u', 'parent_'))
			->from(Phpfox::getT('feed_comment'), 'fc')			
			->leftJoin(Phpfox::getT('user'), 'u', 'u.user_id = fc.parent_user_id')
			->leftJoin(Phpfox::getT('like'), 'l', 'l.type_id = \'feed_comment\' AND l.item_id = fc.feed_comment_id AND l.user_id = ' . Phpfox::getUserId())			
			->where('fc.feed_comment_id = ' . (int) $aItem['item_id'])
			->execute('getSlaveRow');			

		$sLink = Phpfox::getLib('url')->makeUrl($aRow['parent_user_name'], array('comment-id' => $aRow['feed_comment_id']));
		
		$aReturn = array(
			'no_share' => true,
			'feed_status' => $aRow['content'],
			'feed_link' => $sLink,
			'total_comment' => $aRow['total_comment'],
			'feed_total_like' => $aRow['total_like'],
			'feed_is_liked' => $aRow['is_liked'],
			'feed_icon' => Phpfox::getLib('image.helper')->display(array('theme' => 'misc/comment.png', 'return_url' => true)),
			'time_stamp' => $aRow['time_stamp'],			
			'enable_like' => true,			
			'comment_type_id' => 'feed',
			'like_type_id' => 'feed_comment'			
		);
		
		if (!empty($aRow['parent_user_name']) && !defined('PHPFOX_IS_USER_PROFILE') && empty($_POST))
		{
			$aReturn['parent_user'] = Phpfox::getService('user')->getUserFields(true, $aRow, 'parent_');
		}		
		
		if (!PHPFOX_IS_AJAX && defined('PHPFOX_IS_USER_PROFILE') && !empty($aRow['parent_user_name']) && $aRow['parent_user_id'] != Phpfox::getService('profile')->getProfileUserId())
		{
			$aReturn['feed_mini'] = true;
			$aReturn['feed_mini_content'] = Phpfox::getPhrase('feed.content_on_a_href_link_parent_full_name_a_s_a_href_wall_link_wall_a', array('content' => strip_tags($aRow['content']), 'link' => Phpfox::getLib('url')->makeUrl($aRow['parent_user_name']), 'parent_full_name' => $aRow['parent_full_name'], 'wall_link' => $sLink));
			
			unset($aReturn['feed_status']);
		}
		
		return $aReturn;		
	}
	
	public function addLike($iItemId, $bDoNotSendEmail = false)
	{
		$this->database()->updateCount('like', 'type_id = \'feed_comment\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'feed_comment', 'feed_comment_id = ' . (int) $iItemId);	
	}	
	
	public function deleteLikeComment($iItemId)
	{
		$this->database()->updateCount('like', 'type_id = \'feed_comment\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'feed_comment', 'feed_comment_id = ' . (int) $iItemId);	
	}	
	
	public function getAjaxCommentVar()
	{
		return null;
	}	
	
	public function addComment($aVals, $iUserId = null, $sUserName = null)
	{		
		$aRow = $this->database()->select('fc.feed_comment_id, u.full_name, u.user_id, u.gender, u.user_name, u2.user_name AS parent_user_name, u2.full_name AS parent_full_name')
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.user_id')
			->join(Phpfox::getT('user'), 'u2', 'u2.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $aVals['item_id'])
			->execute('getSlaveRow');
			
		// Update the post counter if its not a comment put under moderation or if the person posting the comment is the owner of the item.
		if (empty($aVals['parent_id']))
		{
			$this->database()->updateCounter('feed_comment', 'total_comment', 'feed_comment_id', $aRow['feed_comment_id']);		
		}
		
		// Send the user an email
		$sLink = Phpfox::getLib('url')->makeUrl($aRow['parent_user_name'], array('comment-id' => $aRow['feed_comment_id']));
		
		Phpfox::getService('comment.process')->notify(array(
				'user_id' => $aRow['user_id'],
				'item_id' => $aRow['feed_comment_id'],
				'owner_subject' => Phpfox::getPhrase('feed.full_name_commented_on_one_of_your_wall_comments', array('full_name' => Phpfox::getUserBy('full_name'))),
				'owner_message' => Phpfox::getPhrase('feed.full_name_commented_on_one_of_your_wall_comments_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a', array('full_name' => Phpfox::getUserBy('full_name'), 'link' => $sLink)),
				'owner_notification' => 'comment.add_new_comment',
				'notify_id' => 'comment_feed',
				'mass_id' => 'feed',
				'mass_subject' => (Phpfox::getUserId() == $aRow['user_id'] ? Phpfox::getPhrase('feed.full_name_commented_on_one_of_gender_wall_comments', array('full_name' => Phpfox::getUserBy('full_name'), 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1))) : Phpfox::getPhrase('feed.full_name_commented_on_one_of_row_full_name_s_wall_comments', array('full_name' => Phpfox::getUserBy('full_name'), 'row_full_name' => $aRow['full_name']))),
				'mass_message' => (Phpfox::getUserId() == $aRow['user_id'] ? Phpfox::getPhrase('feed.full_name_commented_on_one_of_gender_wall_comments_message', array('full_name' => Phpfox::getUserBy('full_name'), 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1), 'link' => $sLink)) : Phpfox::getPhrase('feed.full_name_commented_on_one_of_row_full_name_s_wall_comments_message', array('full_name' => Phpfox::getUserBy('full_name'), 'row_full_name' => $aRow['full_name'], 'link' => $sLink)))
			)
		);		
	}		
	
	public function getCommentItem($iId)
	{
		$aRow = $this->database()->select('feed_comment_id AS comment_item_id, privacy_comment, user_id AS comment_user_id')
			->from(Phpfox::getT('feed_comment'))
			->where('feed_comment_id = ' . (int) $iId)
			->execute('getSlaveRow');		
			
		$aRow['comment_view_id'] = '0';
		
		if (!Phpfox::getService('comment')->canPostComment($aRow['comment_user_id'], $aRow['privacy_comment']))
		{
			Phpfox_Error::set(Phpfox::getPhrase('feed.unable_to_post_a_comment_on_this_item_due_to_privacy_settings'));
			
			unset($aRow['comment_item_id']);
		}
			
		return $aRow;
	}	
	
	public function getCommentNotificationFeed($aNotification)
	{
		$aRow = $this->database()->select('fc.feed_comment_id, u.user_id, u.gender, u.user_name, u.full_name, u2.user_name AS parent_user_name')	
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.user_id')
			->join(Phpfox::getT('user'), 'u2', 'u2.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');
			
		$sUsers = Phpfox::getService('notification')->getUsers($aNotification);
		
		$sPhrase = '';
		if ($aNotification['user_id'] == $aRow['user_id'])
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_one_of_gender_wall_comments', array('users' => $sUsers, 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1)));	
		}
		elseif ($aRow['user_id'] == Phpfox::getUserId())		
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_one_of_your_wall_comments', array('users' => $sUsers));
		}
		else 
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_one_of_span_class_drop_data_user_row_full_name_s_span_wall_comments', array('users' => $sUsers, 'row_full_name' => $aRow['full_name']));
		}
			
		return array(
			'link' => Phpfox::getLib('url')->makeUrl($aRow['parent_user_name'], array('comment-id' => $aRow['feed_comment_id'])),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);
	}		
	
	public function getNotificationComment_Profile($aNotification)
	{
		$aRow = $this->database()->select('fc.feed_comment_id, u.user_id, u.gender, u.user_name, u.full_name')
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');
			
		$sUsers = Phpfox::getService('notification')->getUsers($aNotification);
		
		$sPhrase = '';
		if ($aNotification['user_id'] == $aRow['user_id'])
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_gender_wall', array('users' => $sUsers, 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1)));	
		}
		elseif ($aRow['user_id'] == Phpfox::getUserId())		
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_your_wall', array('users' => $sUsers));
		}
		else 
		{
			$sPhrase = Phpfox::getPhrase('feed.users_commented_on_one_span_class_drop_data_user_row_full_name_span_wall', array('users' => $sUsers, 'row_full_name' => $aRow['full_name']));
		}
			
		return array(
			'link' => Phpfox::getLib('url')->makeUrl($aRow['user_name'], array('comment-id' => $aRow['feed_comment_id'])),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);
	}
	
	public function addLikeComment($iItemId, $bDoNotSendEmail = false)
	{
		$aRow = $this->database()->select('fc.feed_comment_id, fc.content, fc.user_id, u2.user_name, u2.full_name')
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.user_id')
			->join(Phpfox::getT('user'), 'u2', 'u2.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $iItemId)
			->execute('getSlaveRow');
			
		if (!isset($aRow['feed_comment_id']))
		{
			return false;
		}		
		
		$this->database()->updateCount('like', 'type_id = \'feed_comment\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'feed_comment', 'feed_comment_id = ' . (int) $iItemId);		
		
		if (!$bDoNotSendEmail)
		{
			$sLink = Phpfox::getLib('url')->makeUrl($aRow['user_name'], array('comment-id' => $aRow['feed_comment_id']));
			
			Phpfox::getLib('mail')->to($aRow['user_id'])
				->subject(Phpfox::getPhrase('user.full_name_liked_a_comment_you_posted_on_row_full_name_s_wall', array('full_name' => Phpfox::getUserBy('full_name'), 'row_full_name' => $aRow['full_name'])))
				->message(Phpfox::getPhrase('user.full_name_liked_your_comment_message', array('full_name' => Phpfox::getUserBy('full_name'), 'link' => $sLink, 'content' => Phpfox::getLib('parse.output')->shorten($aRow['content'], 50, '...'), 'row_full_name' => $aRow['full_name'])))
				->notification('like.new_like')
				->send();				
					
			Phpfox::getService('notification.process')->add('feed_comment_like', $aRow['feed_comment_id'], $aRow['user_id']);
		}		
	}	
	
	public function addLikeMini($iItemId, $bDoNotSendEmail = false)
	{
		$aRow = $this->database()->select('c.comment_id, c.user_id, ct.text_parsed AS text')
			->from(Phpfox::getT('comment'), 'c')
			->join(Phpfox::getT('comment_text'), 'ct', 'ct.comment_id = c.comment_id')
			->where('c.comment_id = ' . (int) $iItemId)
			->execute('getSlaveRow');
			
		if (!isset($aRow['comment_id']))
		{
			return false;
		}
		
		$this->database()->updateCount('like', 'type_id = \'feed_mini\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'comment', 'comment_id = ' . (int) $iItemId);

		if (!$bDoNotSendEmail)
		{
			$sLink = Phpfox::getLib('url')->makeUrl('comment.view', $iItemId);
			
			Phpfox::getLib('mail')->to($aRow['user_id'])
				->subject(Phpfox::getPhrase('user.full_name_liked_one_of_your_comments', array('full_name' => Phpfox::getUserBy('full_name'))))
				->message(Phpfox::getPhrase('user.full_name_liked_your_comment_message_mini', array('full_name' => Phpfox::getUserBy('full_name'), 'link' => $sLink, 'content' => Phpfox::getLib('parse.output')->shorten($aRow['text'], 50, '...'))))
				->notification('like.new_like')
				->send();
					
			Phpfox::getService('notification.process')->add('feed_mini_like', $aRow['comment_id'], $aRow['user_id']);
		}		
	}
	
	public function deleteLikeMini($iItemId, $bDoNotSendEmail = false)
	{
		$this->database()->updateCount('like', 'type_id = \'feed_mini\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'comment', 'comment_id = ' . (int) $iItemId);	
	}	
	
	public function getNotificationMini_Like($aNotification)
	{
		$aRow = $this->database()->select('c.comment_id, c.user_id, ct.text_parsed AS text')
			->from(Phpfox::getT('comment'), 'c')
			->join(Phpfox::getT('comment_text'), 'ct', 'ct.comment_id = c.comment_id')
			->where('c.comment_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');

		$sPhrase = Phpfox::getPhrase('feed.users_liked_your_comment_text_that_you_posted', array('users' => Phpfox::getService('notification')->getUsers($aNotification) , 'text' => Phpfox::getLib('parse.output')->shorten($aRow['text'], Phpfox::getParam('notification.total_notification_title_length'), '...')));	
			
		return array(
			'link' => Phpfox::getLib('url')->makeUrl('comment.view', $aRow['comment_id']),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);				
	}
	
	public function getNotificationComment_Like($aNotification)
	{
		$aRow = $this->database()->select('fc.feed_comment_id, fc.content, fc.user_id, u.gender, u.user_name, u.full_name, u2.user_name AS parent_user_name, u2.full_name AS parent_full_name, u2.gender AS parent_gender')	
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.user_id')
			->join(Phpfox::getT('user'), 'u2', 'u2.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');
		
		$sUsers = Phpfox::getService('notification')->getUsers($aNotification);
		$sContent = Phpfox::getLib('parse.output')->shorten($aRow['content'], Phpfox::getParam('notification.total_notification_title_length'), '...');
		
		$sPhrase = '';
		if ($aNotification['user_id'] == $aRow['user_id'])
		{
			$sPhrase = Phpfox::getPhrase('feed.users_liked_gender_own_comment_content', array('users' => $sUsers, 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1), 'content' => $sContent));	
		}
		elseif ($aRow['user_id'] == Phpfox::getUserId())		
		{
			$sPhrase = Phpfox::getPhrase('feed.users_liked_your_comment_content_that_you_posted_on_span_class_drop_data_user_parent_full_name_s_span_wall', array('users' => $sUsers, 'content' => $sContent, 'parent_full_name' => $aRow['parent_full_name']));
		}
		else 
		{
			$sPhrase = Phpfox::getPhrase('feed.users_liked_span_class_drop_data_user_full_name_s_span_comment_content', array('users' => $sUsers, 'full_name' => $aRow['full_name'], 'content' => $sContent));
		}
			
		return array(
			'link' => Phpfox::getLib('url')->makeUrl($aRow['parent_user_name'], array('comment-id' => $aRow['feed_comment_id'])),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);	
	}
	
	public function getParentItemCommentUrl($aComment)
	{
		$aFeedComment = $this->database()->select('u.user_name')
			->from(Phpfox::getT('feed_comment'), 'fc')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = fc.parent_user_id')
			->where('fc.feed_comment_id = ' . (int) $aComment['item_id'])
			->execute('getSlaveRow');
			
		return Phpfox::getLib('url')->makeUrl($aFeedComment['user_name'], array('comment-id' => $aComment['item_id']));
	}

	public function exportModule($sProductId, $sModule = null)
	{
		$aSql = array();
		$aSql[] = "product_id = '" . $sProductId . "'";
		if ($sModule !== null)
		{
			$aSql[] = "AND module_id = '" . $sModule . "'";
		} 
		
		$aRows = $this->database()->select('*')
			->from(Phpfox::getT('feed_share'))
			->where($aSql)
			->execute('getRows');
			
		if (!count($aRows))
		{
			return false;
		}
			
		$oXmlBuilder = Phpfox::getLib('xml.builder');
		$oXmlBuilder->addGroup('feed_share');

		foreach ($aRows as $aRow)
		{
			$oXmlBuilder->addTag('share', '', array(					
					'module_id' => $aRow['module_id'],
					'title' => $aRow['title'],
					'description' => $aRow['description'],
					'block_name' => $aRow['block_name'],
					'no_input' => $aRow['no_input'],
					'is_frame' => $aRow['is_frame'],
					'ajax_request' => $aRow['ajax_request'],
					'no_profile' => $aRow['no_profile'],
					'icon' => $aRow['icon'],
					'ordering' => $aRow['ordering']
				)
			);
		}
		$oXmlBuilder->closeGroup();

		return true;	
	}
	
	public function installModule($sProduct, $sModule, $aModule)
	{		
		if (isset($aModule['feed_share']))
		{
			// get all the existing feed_share
			$aShares = $this->database()->select('*')
				->from(Phpfox::getT('feed_share'))
				->where('module_id = "' . Phpfox::getLib('parse.input')->clean($sModule) .'" AND product_id = "' . Phpfox::getLib('parse.input')->clean($sProduct) .'"')
				->execute('getSlaveRows');
			$aRows = (isset($aModule['feed_share']['share'][1]) ? $aModule['feed_share']['share'] : array($aModule['feed_share']['share']));
			foreach ($aRows as $aRow)
			{
				foreach($aShares as $aShare)
				{
					if ($aShare['title'] == $aRow['title'])
					{
						break 2;
					}
				}
				$this->database()->insert(Phpfox::getT('feed_share'), array(
						'product_id' => $sProduct,
						'module_id' => ($sModule === null ? $aRow['module_id'] : $sModule),						
						'title' => $aRow['title'],
						'description' => $aRow['description'],
						'block_name' => $aRow['block_name'],
						'no_input' => (int) $aRow['no_input'],
						'is_frame' => (int) $aRow['is_frame'],
						'ajax_request' => (empty($aRow['ajax_request']) ? null : $aRow['ajax_request']),
						'no_profile' => (int) $aRow['no_profile'],
						'icon' => (empty($aRow['icon']) ? null : $aRow['icon']),
						'ordering' => (int) $aRow['ordering']
					)
				);
			}
		}
	}	
	
	public function updateCounterList()
	{
		$aList = array();		
		
		$aList[] =	array(
			'name' => Phpfox::getPhrase('feed.find_missing_share_buttons'),
			'id' => 'missing-share'
		);		

		return $aList;
	}	
	
	public function updateCounter($iId, $iPage, $iPageLimit)
	{	
		$aModules = Phpfox::getService('core')->getModulePager('feed_share', 0, 200);
		
		foreach ($aModules as $sModule => $aData)
		{
			$iCheck = $this->database()->select('COUNT(*)')
				->from(Phpfox::getT('feed_share'))
				->where('module_id = \'' . $this->database()->escape($aData['share']['module_id']) . '\' AND title = \'' . $this->database()->escape($aData['share']['title']) . '\'')
				->execute('getSlaveField');
			
			if (!$iCheck)
			{
				$aRow = $aData['share'];
				$this->database()->insert(Phpfox::getT('feed_share'), array(
						'product_id' => 'phpfox',
						'module_id' => $aData['share']['module_id'],						
						'title' => $aRow['title'],
						'description' => $aRow['description'],
						'block_name' => $aRow['block_name'],
						'no_input' => (int) $aRow['no_input'],
						'is_frame' => (int) $aRow['is_frame'],
						'ajax_request' => (empty($aRow['ajax_request']) ? null : $aRow['ajax_request']),
						'no_profile' => (int) $aRow['no_profile'],
						'icon' => (empty($aRow['icon']) ? null : $aRow['icon']),
						'ordering' => (int) $aRow['ordering']
					)
				);				
			}
		}
		
		return 0;
	}	
}

?>