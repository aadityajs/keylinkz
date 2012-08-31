<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Share
 * @version 		$Id: ajax.class.php 3335 2011-10-20 17:26:57Z Raymond_Benc $
 */
class Share_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function popup()
	{		
		Phpfox::getBlock('share.frame', array(
				'type' => $this->get('type'),
				'url' => $this->get('url'),
				'title' => $this->get('title')
			)
		);
	}
	
	public function bookmark()
	{
		Phpfox::getBlock('share.bookmark', array(
				'type' => $this->get('type'),
				'url' => $this->get('url'),
				'title' => $this->get('title')
			)
		);
		
		$this->html('#js_share_content', $this->getContent(false));
	}	
	
	public function post()
	{
		Phpfox::getBlock('share.post', array(
				'type' => $this->get('type'),
				'url' => $this->get('url'),
				'title' => $this->get('title')
			)
		);
		
		$this->html('#js_share_content', $this->getContent(false));
	}		
	
	public function send()
	{
		Phpfox::getBlock('share.send');
		
		$this->html('#js_share_content', $this->getContent(false));
	}		

	public function email()
	{
		Phpfox::getBlock('share.email');
		
		$this->html('#js_share_content', $this->getContent(false));
	}		
	
	public function friend()
	{
		Phpfox::getBlock('share.friend');
		
		$this->html('#js_share_content', $this->getContent(false));
	}			
	
	public function sendFriends()
	{
		Phpfox::isUser(true);
		
		if (Phpfox::getService('mail.process')->add($this->get('val')))
		{
			$this->setMessage(Phpfox::getPhrase('share.message_successfully_sent'));
		}
	}
	
	public function sendEmails()
	{
		if (Phpfox::getService('share.process')->sendEmails($this->get('val')))
		{
			$this->setMessage(Phpfox::getPhrase('share.message_successfully_sent'));	
		}
	}
	
	public function ordering()
	{
		$aVals = $this->get('val');
		Phpfox::getService('core.process')->updateOrdering(array(
				'table' => 'share_bookmark',
				'key' => 'site_id',
				'values' => $aVals['ordering']
			)		
		);
		Phpfox::getLib('cache')->remove('share', 'substr');
	}
	
	public function updateActivity()
	{
		Phpfox::getService('core.process')->updateActivity(array(
				'table' => 'share_bookmark',
				'key' => 'site_id',
				'value' => $this->get('id'),
				'active' => $this->get('active')
			)		
		);
		Phpfox::getLib('cache')->remove('share', 'substr');		
	}
	
	public function connect()
	{
		Phpfox::isUser(true);		
		
		$sConnect = $this->get('connect-id');
		if (Phpfox::getService('share')->hasConnection($sConnect))
		{
			$this->call('var sCurrentValue = $(\'#js_share_connection_' . $sConnect . '\').val(); if (sCurrentValue == \'1\') { $(\'#js_share_connection_' . $sConnect . '\').val(\'0\'); } else { $(\'#js_share_connection_' . $sConnect . '\').val(\'1\'); }');
		}
		else
		{
			$this->call('$Core.box(\'share.showConnectBox\', 400, \'connect-id=' . $sConnect . '\');');
		}
	}
	
	public function showConnectBox()
	{
		$this->setTitle(Phpfox::getPhrase('share.social_sharing'));
		Phpfox::getBlock('share.connect');
	}
}

?>