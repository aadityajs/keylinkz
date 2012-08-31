<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Service
 * @version 		$Id: callback.class.php 3893 2012-01-25 08:33:35Z Raymond_Benc $
 */
class Link_Service_Callback extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('link');	
	}
	
	public function getActivityFeed($aItem)
	{		
		$aRow = $this->database()->select('link.*, l.like_id AS is_liked, ' . Phpfox::getUserField('u', 'parent_'))
			->from($this->_sTable, 'link')
			->leftJoin(Phpfox::getT('user'), 'u', 'u.user_id = link.parent_user_id')
			->leftJoin(Phpfox::getT('like'), 'l', 'l.type_id = \'link\' AND l.item_id = link.link_id AND l.user_id = ' . Phpfox::getUserId())
			->where('link.link_id = ' . (int) $aItem['item_id'])
			->execute('getSlaveRow');
		
		if (!isset($aRow['link_id']))
		{
			return false;
		}
		
		if ((defined('PHPFOX_IS_PAGES_VIEW') && !Phpfox::getService('pages')->hasPerm(null, 'link.view_browse_links'))
			|| (!defined('PHPFOX_IS_PAGES_VIEW') && $aRow['module_id'] == 'pages' && !Phpfox::getService('pages')->hasPerm($aRow['item_id'], 'link.view_browse_links'))
		)
		{
			return false;
		}		
		
		if (substr($aRow['link'], 0, 7) != 'http://')
		{
			$aRow['link'] = 'http://' . $aRow['link'];
		}
		
		$aParts = parse_url($aRow['link']);		
		
		$sLink = Phpfox::getLib('url')->makeUrl($aRow['parent_user_name']);
		
		$aReturn = array(
			'feed_title' => $aRow['title'],			
			'feed_status' => $aRow['status_info'],
			'feed_link' => strip_tags($aRow['link']),
			'feed_content' => $aRow['description'],
			'total_comment' => $aRow['total_comment'],
			'feed_total_like' => $aRow['total_like'],
			'feed_is_liked' => $aRow['is_liked'],
			'feed_icon' => Phpfox::getLib('image.helper')->display(array('theme' => 'feed/link.png', 'return_url' => true)),
			'time_stamp' => $aRow['time_stamp'],			
			'enable_like' => true,			
			'comment_type_id' => 'link',
			'like_type_id' => 'link',
			'feed_title_extra' => $aParts['host'],
			'feed_title_extra_link' => $aParts['scheme'] . '://' . $aParts['host']			
		);
		
		if (Phpfox::getParam('core.warn_on_external_links'))
		{
			if (!preg_match('/' . preg_quote(Phpfox::getParam('core.host')) . '/i', $aReturn['feed_link']))
			{
				$aReturn['feed_link'] = Phpfox::getLib('url')->makeUrl('core.redirect', array('url' => Phpfox::getLib('url')->encode($aReturn['feed_link'])));
				$aReturn['feed_title_extra_link'] = Phpfox::getLib('url')->makeUrl('core.redirect', array('url' => Phpfox::getLib('url')->encode($aReturn['feed_title_extra_link'])));
			}						
		}
		
		if (!empty($aRow['image']))
		{
			$aReturn['feed_image'] = '<img src="' . $aRow['image'] . '" alt="" />';
		}
		
		if ($aRow['module_id'] == 'pages')
		{
			$aRow['parent_user_id'] = '';
			$aRow['parent_user_name'] = '';
		}			
		
		if (empty($aRow['module_id']) && !empty($aRow['parent_user_name']) && !defined('PHPFOX_IS_USER_PROFILE') && empty($_POST))
		{
			$aReturn['parent_user'] = Phpfox::getService('user')->getUserFields(true, $aRow, 'parent_');
		}			
		
		if (!PHPFOX_IS_AJAX && defined('PHPFOX_IS_USER_PROFILE') && !empty($aRow['parent_user_name']) && $aRow['parent_user_id'] != Phpfox::getService('profile')->getProfileUserId())
		{
			$aReturn['feed_mini'] = true;
			$aReturn['no_share'] = true;
			$aReturn['feed_mini_content'] = Phpfox::getPhrase('friend.full_name_posted_a_href_link_a_link_a_on_a_href_parent_user_name', array('full_name' => Phpfox::getService('user')->getFirstName($aItem['full_name']), 'link' => $sLink, 'parent_user_name' => Phpfox::getLib('url')->makeUrl($aRow['parent_user_name']), 'parent_full_name' => $aRow['parent_full_name']));
			
			unset($aReturn['feed_status'], $aReturn['feed_image'], $aReturn['feed_title'], $aReturn['feed_content']);
		}		
		else 
		{			
			if ($aRow['has_embed'])
			{
				$aReturn['feed_image_onclick'] = '$Core.box(\'link.play\', 700, \'id=' . $aRow['link_id'] . '&amp;feed_id=' . $aItem['feed_id'] . '&amp;popup=true\', \'GET\'); return false;';
			}
		}
		
		return $aReturn;
	}
	
	public function addLike($iItemId, $bDoNotSendEmail = false)
	{
		$aRow = $this->database()->select('link_id, title, user_id')
			->from(Phpfox::getT('link'))
			->where('link_id = ' . (int) $iItemId)
			->execute('getSlaveRow');		
			
		if (!isset($aRow['link_id']))
		{
			return false;
		}
		
		$this->database()->updateCount('like', 'type_id = \'link\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'link', 'link_id = ' . (int) $iItemId);	
		
		if (!$bDoNotSendEmail)
		{
			$sLink = Phpfox::permalink('link', $aRow['link_id'], $aRow['title']);
			
			Phpfox::getLib('mail')->to($aRow['user_id'])
				->subject(Phpfox::getPhrase('link.full_name_liked_your_link_title', array('full_name' => Phpfox::getUserBy('full_name'), 'title' => $aRow['title'])))
				->message(Phpfox::getPhrase('link.full_name_liked_your_link_title_message', array('full_name' => Phpfox::getUserBy('full_name'), 'link' => $sLink, 'title' => $aRow['title'])))
				->notification('like.new_like')
				->send();
				
			Phpfox::getService('notification.process')->add('link_like', $aRow['link_id'], $aRow['user_id']);				
		}		
	}	
	
	public function getNotificationLike($aNotification)
	{
		$aRow = $this->database()->select('l.link_id, l.title, l.user_id, u.gender, u.full_name')	
			->from(Phpfox::getT('link'), 'l')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = l.user_id')
			->where('l.link_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');
		
		$sUsers = Phpfox::getService('notification')->getUsers($aNotification);
		$sTitle = Phpfox::getLib('parse.output')->shorten($aRow['title'], Phpfox::getParam('notification.total_notification_title_length'), '...');
			
		$sPhrase = '';
		if ($aNotification['user_id'] == $aRow['user_id'])
		{
			$sPhrase = Phpfox::getPhrase('link.users_liked_gender_own_link_title', array('users' => $sUsers, 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1), 'title' => $sTitle));	
		}
		elseif ($aRow['user_id'] == Phpfox::getUserId())		
		{
			$sPhrase = Phpfox::getPhrase('link.users_liked_your_link_title', array('users' => $sUsers, 'title' => $sTitle));
		}
		else 
		{
			$sPhrase = Phpfox::getPhrase('link.users_liked_span_class_drop_data_user_row_full_name_s_span_link_title', array('users' => $sUsers, 'row_full_name' => $aRow['full_name'], 'title' => $sTitle));
		}
			
		return array(
			'link' => Phpfox::getLib('url')->permalink('link', $aRow['link_id'], $aRow['title']),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);	
	}	
	
	public function deleteLike($iItemId)
	{
		$this->database()->updateCount('like', 'type_id = \'link\' AND item_id = ' . (int) $iItemId . '', 'total_like', 'link', 'link_id = ' . (int) $iItemId);	
	}		
	
	public function getAjaxCommentVar()
	{
		return null;
	}	
	
	public function addComment($aVals, $iUserId = null, $sUserName = null)
	{		
		$aRow = $this->database()->select('l.link_id, l.title, u.full_name, u.user_id, u.user_name, u.gender')
			->from(Phpfox::getT('link'), 'l')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = l.user_id')
			->where('l.link_id = ' . (int) $aVals['item_id'])
			->execute('getSlaveRow');
			
		// Update the post counter if its not a comment put under moderation or if the person posting the comment is the owner of the item.
		if (empty($aVals['parent_id']))
		{
			$this->database()->updateCounter('link', 'total_comment', 'link_id', $aRow['link_id']);		
		}
		
		// Send the user an email
		$sLink = Phpfox::getLib('url')->permalink('link', $aRow['link_id'], $aRow['title']);
		
		Phpfox::getService('comment.process')->notify(array(
				'user_id' => $aRow['user_id'],
				'item_id' => $aRow['link_id'],
				'owner_subject' => Phpfox::getPhrase('link.full_name_commented_on_your_link_title', array('full_name' => Phpfox::getUserBy('full_name'), 'title' => $this->preParse()->clean($aRow['title'], 100))),
				'owner_message' => Phpfox::getPhrase('link.full_name_commented_on_your_link_a_href_link_title_a', array('full_name' => Phpfox::getUserBy('full_name'), 'link' => $sLink, 'title' => $aRow['title'])),
				'owner_notification' => 'comment.add_new_comment',
				'notify_id' => 'comment_link',
				'mass_id' => 'link',
				'mass_subject' => (Phpfox::getUserId() == $aRow['user_id'] ? Phpfox::getPhrase('link.full_name_commented_on_gender_link', array('full_name' => Phpfox::getUserBy('full_name'), 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1))) : Phpfox::getPhrase('link.full_name_commented_on_row_full_name_s_link', array('full_name' => Phpfox::getUserBy('full_name'), 'row_full_name' => $aRow['full_name']))),
				'mass_message' => (Phpfox::getUserId() == $aRow['user_id'] ? Phpfox::getPhrase('link.full_name_commented_on_gender_link_a_href_link_title_a', array('full_name' => Phpfox::getUserBy('full_name'), 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1), 'link' => $sLink, 'title' => $aRow['title'])) : Phpfox::getPhrase('link.full_name_commented_on_row_full_name_s_link_a_href_link_title_a_message', array('full_name' => Phpfox::getUserBy('full_name'), 'row_full_name' => $aRow['full_name'], 'link' => $sLink, 'title' => $aRow['title'])))
			)
		);		
	}		
	
	public function getCommentItem($iId)
	{
		$aRow = $this->database()->select('link_id AS comment_item_id, privacy_comment, user_id AS comment_user_id')
			->from(Phpfox::getT('link'))
			->where('link_id = ' . (int) $iId)
			->execute('getSlaveRow');		
			
		$aRow['comment_view_id'] = '0';
		
		if (!Phpfox::getService('comment')->canPostComment($aRow['comment_user_id'], $aRow['privacy_comment']))
		{
			Phpfox_Error::set(Phpfox::getPhrase('link.unable_to_post_a_comment_on_this_item_due_to_privacy_settings'));
			
			unset($aRow['comment_item_id']);
		}
			
		return $aRow;
	}	
	
	public function getCommentNotification($aNotification)
	{
		$aRow = $this->database()->select('l.link_id, l.title, u.user_id, u.gender, u.user_name, u.full_name')	
			->from(Phpfox::getT('link'), 'l')
			->join(Phpfox::getT('user'), 'u', 'u.user_id = l.user_id')
			->where('l.link_id = ' . (int) $aNotification['item_id'])
			->execute('getSlaveRow');
			
		$sUsers = Phpfox::getService('notification')->getUsers($aNotification);
		$sTitle = Phpfox::getLib('parse.output')->shorten($aRow['title'], Phpfox::getParam('notification.total_notification_title_length'), '...');
		
		$sPhrase = '';
		if ($aNotification['user_id'] == $aRow['user_id'] && !isset($aNotification['extra_users']))
		{
			$sPhrase = Phpfox::getPhrase('link.users_commented_on_gender_link_title', array('users' => $sUsers, 'gender' => Phpfox::getService('user')->gender($aRow['gender'], 1), 'title' => $sTitle));	
		}
		elseif ($aRow['user_id'] == Phpfox::getUserId())
		{
			$sPhrase = Phpfox::getPhrase('link.users_commented_on_your_link_title', array('users' => $sUsers, 'title' => $sTitle));
		}
		else 
		{
			$sPhrase = Phpfox::getPhrase('link.users_commented_on_span_class_drop_data_user_row_full_name_s_span_link_title', array('users' => $sUsers, 'row_full_name' => $aRow['full_name'], 'title' =>  $sTitle));
		}
			
		return array(
			'link' => Phpfox::getLib('url')->permalink('link', $aRow['link_id'], $aRow['title']),
			'message' => $sPhrase,
			'icon' => Phpfox::getLib('template')->getStyle('image', 'activity.png', 'blog')
		);
	}
	
	public function getPagePerms()
	{
		$aPerms = array();
		
		$aPerms['link.share_links'] = Phpfox::getPhrase('link.who_can_share_a_link');
		$aPerms['link.view_browse_links'] = Phpfox::getPhrase('link.who_can_view_browse_links');
		
		return $aPerms;
	}
	
	public function canViewPageSection($iPage)
	{
		if (!Phpfox::getService('pages')->hasPerm($iPage, 'link.view_browse_links'))
		{
			return false;
		}
		
		return true;
	}
	
	public function checkFeedShareLink()
	{
		if (defined('PHPFOX_IS_PAGES_VIEW') && !Phpfox::getService('pages')->hasPerm(null, 'link.share_links'))
		{
			return false;
		}
	}	
	
	/**
	 * If a call is made to an unknown method attempt to connect
	 * it to a specific plug-in with the same name thus allowing 
	 * plug-in developers the ability to extend classes.
	 *
	 * @param string $sMethod is the name of the method
	 * @param array $aArguments is the array of arguments of being passed
	 */
	public function __call($sMethod, $aArguments)
	{
		/**
		 * Check if such a plug-in exists and if it does call it.
		 */
		if ($sPlugin = Phpfox_Plugin::get('link.service_callback__call'))
		{
			eval($sPlugin);
			return;
		}
			
		/**
		 * No method or plug-in found we must throw a error.
		 */
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
}

?>