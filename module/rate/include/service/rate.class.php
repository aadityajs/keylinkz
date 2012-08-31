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
 * @package 		Phpfox_Service
 * @version 		$Id: service.class.php 67 2009-01-20 11:32:45Z Raymond_Benc $
 */
class Rate_Service_Rate extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_rTable = Phpfox::getT('user_review');
		$this->_uTable = Phpfox::getT('user'); 
		$this->_urTable = Phpfox::getT('user_rating');
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
		if ($sPlugin = Phpfox_Plugin::get('rate.service_rate__call'))
		{
			return eval($sPlugin);
		}
			
		/**
		 * No method or plug-in found we must throw a error.
		 */
		Phpfox_Error::trigger('Call to undefined method ' . __CLASS__ . '::' . $sMethod . '()', E_USER_ERROR);
	}	
	
	
	/**************************************************
	Author : Priyam Ghosh
	***************************************************/
	public function getReview($user_id)
	{
		$data =array();
		$i=0;
		$sql = 'SELECT * FROM '.$this->_rTable.' WHERE user_id='.$user_id;
		$result = Phpfox::getLib('database')->query($sql);
		while($row = mysql_fetch_array($result))
		{
			$data[$i]["by_user_id"] = $row["by_user"];
			$data[$i]["by_user_name"] = $this->getUserName($data[$i]["by_user_id"]);
			$data[$i]["review"] = $row["review"];
			$data[$i]["service"] = $row["service"];
			$data[$i]["date"] = date('d-m-Y',strtotime($row["timestamp"]));
			
			$rate = array();
			$rate = $this->getRate($user_id,$data[$i]["by_user_id"]);
			$data[$i]["main_rate"] = intval($rate["main_rate"]);
			$data[$i]["local_rate"] = intval($rate["local_rate"]);
			$data[$i]["process_rate"] = intval($rate["process_rate"]);
			$data[$i]["responsive_rate"] = intval($rate["responsive_rate"]);
			$data[$i]["negotiation_rate"] = intval($rate["negotiation_rate"]);
			$i++;
		}
		
		return $data;
	}
		
	public function getUserName($user_id)
	{
		$sql = 'SELECT * FROM '.$this->_uTable.' WHERE user_id='.$user_id;
		$result = Phpfox::getLib('database')->query($sql);
		$row = mysql_fetch_array($result);
		$user_name = $row["user_name"];
		return $user_name;
	}
	
	public function getRate($user_id,$by_user_id)
	{
		$data =array();
		$sql = 'SELECT * FROM '.$this->_urTable.' WHERE user_id='.$user_id.' AND by_user='.$by_user_id;
		$result = Phpfox::getLib('database')->query($sql);
		while($row = mysql_fetch_array($result))
		{
			$rating = $row["rating"];
			$item_id = $row["item_id"];
			
			if($item_id==1)
			$data["main_rate"] = $rating;
			if($item_id==2)
			$data["local_rate"] = $rating;
			if($item_id==3)
			$data["process_rate"] = $rating;
			if($item_id==4)
			$data["responsive_rate"] = $rating;
			if($item_id==5)
			$data["negotiation_rate"] = $rating;
		}
		
		return $data;
	}
	

	
	/*************************************************************
	****************************************************************/
}

?>