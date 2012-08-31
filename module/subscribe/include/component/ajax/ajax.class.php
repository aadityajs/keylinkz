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
 * @package  		Module_Subscribe
 * @version 		$Id: ajax.class.php 3644 2011-12-02 11:25:30Z Raymond_Benc $
 */
class Subscribe_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function message()
	{
		Phpfox::getBlock('subscribe.message');
	}

	public function upgrade()
	{
		$this->error(false);

		Phpfox::getBlock('subscribe.upgrade');

		if (!Phpfox_Error::isPassed())
		{
			echo '<div class="error_message">' . implode('<br />', Phpfox_Error::get()) . '</div>';
		}
	}

	public function listUpgrades()
	{
		Phpfox::getBlock('subscribe.list');

		$this->html('#' . $this->get('temp_id') . '', $this->getContent(false));
		$this->call('$(\'#' . $this->get('temp_id') . '\').parent().show();');
	}

	public function listUpgradesOnSignup()
	{
		Phpfox::getBlock('subscribe.list', array('on_signup' => true));
	}

	public function ordering()
	{
		if (Phpfox::getService('subscribe.process')->updateOrder($this->get('val')))
		{

		}
	}

	public function updateActivity()
	{
		if (Phpfox::getService('subscribe.process')->updateActivity($this->get('package_id'), $this->get('active')))
		{

		}
	}

	public function deleteImage()
	{
		Phpfox::getService('subscribe.process')->deleteImage($this->get('package_id'));
	}

	public function updatePurchase()
	{
		if (Phpfox::getService('subscribe.purchase.process')->updatePurchase($this->get('purchase_id'), $this->get('status')))
		{

		}
	}
}

?>