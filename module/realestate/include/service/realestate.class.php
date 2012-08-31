<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 *
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Priyam Ghosh
 * @package 		Phpfox_Service
 * @version 		$Id: process.class.php 1496 2010-03-05 17:15:05Z
 */
class Realestate_Service_Realestate extends Phpfox_Service
{
	/**
	 * Class constructor
	 */
	public function __construct()
	{
		$this->_sTable = Phpfox::getT('realestate');
		$this->_rTable = Phpfox::getT('realestate_favourite_list');
		$this->_uTable = Phpfox::getT('user_rating');
		$this->_usTable = Phpfox::getT('user');
	}

	public function add($aVals, $allVals)
	{
	

		
		$aForms = array(
			'realestate_title' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_title'),
				'type' => array('string:required')
			),
			'text' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_desc'),
				'type' => 'string:required'
			),
			'address' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_address'),
				'type' => 'string:address'
			),
			'realestate_type' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_realestate_type'),
				'type' => 'string:required'
			),
			'year_build' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_year_build'),
				'type' => 'string:required'
			),
			'legal_desc' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_legal_desc'),
				'type' => 'string:required'
			),
			'no_of_rooms' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_no_of_rooms'),
				'type' => 'int:required'
			),
			'no_of_bathrooms' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_no_of_bathrooms'),
				'type' => 'int:required'
			),
			'total_square_foot' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_total_sqfoot'),
				'type' => 'int:required'
			),
			'lat' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_map_loc'),
				'type' => 'string:required'
			),
			
			'image_path' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_image'),
				'type' => 'string:required'
			),
			
		);
		
		
		if(isset($aVals['is_rent']))
		{
			$aForms["is_rent"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'string:required'
			);
			
			$aForms["price_per_month"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'int:required'
			);

			$aVals["is_rent"] = 'Y';
			$aVals["is_sale"] = 'N';
		}
		

		if((isset($aVals['is_sale']) or $aVals['is_sale']=='N') and !isset($aVals['is_rent']))
		{
			$aForms["is_sale"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'string:required'
			);
			
			$aForms["total_price"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'int:required'
			);
			
			$aVals["is_rent"] = 'N';
			$aVals["is_sale"] = 'Y';
		}
		
		//$aVals["realestate_desc"] = strip_tags($aVals["text"]);
		$aVals["date_added"] = date('Y-m-d H:i:s');
		$aVals["agent_id"] = Phpfox::getUserBy('user_id');
		
		unset($aVals["text"]);
		
		
		/*---------------------------------------------------------
			Not required fields
		 ----------------------------------------------------------*/
		if($allVals["val"]["last_sold"] == '')
		$aVals["last_sold"] = '--';
		else
		$aVals["last_sold"] = $allVals["val"]["last_sold"];
		
		if($allVals["val"]["parking"] == '')
		$aVals["parking"] = '--';
		else
		$aVals["parking"] = $allVals["val"]["parking"];
		
		if($allVals["val"]["cooling"] == '')
		$aVals["cooling"] = '--';
		else
		$aVals["cooling"] = $allVals["val"]["cooling"];
		
		if($allVals["val"]["heating"] == '')
		$aVals["heating"] = '--';
		else
		$aVals["heating"] = $allVals["val"]["heating"];
		
		if($allVals["val"]["fireplace"] == '')
		$aVals["fireplace"] = '--';
		else
		$aVals["fireplace"] = $allVals["val"]["fireplace"];
		
		if($allVals["val"]["exterior_material"] == '')
		$aVals["exterior_material"] = '--';
		else
		$aVals["exterior_material"] = $allVals["val"]["exterior_material"];
		
		if($allVals["val"]["fenced_yard"] == '')
		$aVals["fenced_yard"] = '--';
		else
		$aVals["fenced_yard"] = $allVals["val"]["fenced_yard"];
		
		
		if($allVals["val"]["parcel_no"] == '')
		$aVals["parcel_no"] = '--';
		else
		$aVals["parcel_no"] = $allVals["val"]["parcel_no"];
		
		
		if($allVals["val"]["image_path"] == '')
		$aVals["image_path"] = '';
		else
		$aVals["image_path"] = $allVals["val"]["image_path"];
		
		/*=====================================*/
		if($allVals["val"]["lat"] == '')
		$aVals["lat"] = '';
		else
		$aVals["lat"] = $allVals["val"]["lat"];

		if($allVals["val"]["lng"] == '')
		$aVals["lng"] = '';
		else
		$aVals["lng"] = $allVals["val"]["lng"];
		/*=====================================*/
		
		if($allVals["val"]["images"] == '')
		$aVals["images"] = '';
		else
		$aVals["images"] = $allVals["val"]["images"];
		
		if (!Phpfox_Error::isPassed())
		{
			return false;
		}
		$iId = $this->database()->insert($this->_sTable, $aVals);
		
		move_uploaded_file($_FILES["image_path"]["tmp_name"],"module/realestate/static/image/upload/" . $_FILES["image_path"]["name"]);

	}
	
	
	
	
	public function get($id='')
	{
		if($id=='')
			$result = Phpfox::getLib('database')->query('SELECT * FROM '.$this->_sTable);
		else
			$result = Phpfox::getLib('database')->query('SELECT * FROM '.$this->_sTable.' WHERE realestate_id='.$id);
		
		$i =0;
		while($row = mysql_fetch_array($result))
		{
			$data[$i]["id"] = $row["realestate_id"];
			$data[$i]["title"] = $row["realestate_title"]; 	
			$data[$i]["desc"] = $row["realestate_desc"];
			$data[$i]["no_of_rooms"] = $row["no_of_rooms"];
			$data[$i]["no_of_bathrooms"] = $row["no_of_bathrooms"];
			$data[$i]["total_square_foot"] = $row["total_square_foot"];
			$data[$i]["is_rent"] = $row["is_rent"];
			$data[$i]["is_sale"] = $row["is_sale"];
			$data[$i]["price_per_month"] = $row["price_per_month"];
			$data[$i]["total_price"] = $row["total_price"];
			$data[$i]["image"] = $row["image_path"];
			$data[$i]["realestate_type"] = $row["realestate_type"];
			$data[$i]["date_added"] = $row["date_added"];
			$data[$i]["year_build"] = $row["year_build"];
			$data[$i]["last_sold"] = $row["last_sold"];
			$data[$i]["parking"] = $row["parking"];
			$data[$i]["cooling"] = $row["cooling"];
			$data[$i]["heating"] = $row["heating"];
			$data[$i]["fireplace"] = $row["fireplace"];
			$data[$i]["exterior_material"] = $row["exterior_material"];
			$data[$i]["fenced_yard"] = $row["fenced_yard"];
			$data[$i]["legal_desc"] = $row["legal_desc"];
			$i++;
		}
		return $data;
	}
	
	public function update($aVals ,$allVals, $realestate_id)
	{
		$aForms = array(
			'realestate_title' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_title'),
				'type' => array('string:required')
			),
			'text' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_desc'),
				'type' => 'string:required'
			),
			'realestate_type' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_realestate_type'),
				'type' => 'string:required'
			),
			'year_build' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_year_build'),
				'type' => 'string:required'
			),
			'legal_desc' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_legal_desc'),
				'type' => 'string:required'
			),
			'no_of_rooms' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_no_of_rooms'),
				'type' => 'int:required'
			),
			'no_of_bathrooms' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_no_of_bathrooms'),
				'type' => 'int:required'
			),
			'total_square_foot' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_total_sqfoot'),
				'type' => 'int:required'
			),
			'lat' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_map_loc'),
				'type' => 'string:required'
			),
			/*
			'image_path' => array(
				'message' => Phpfox::getPhrase('admincp.realestate_form_insert_image'),
				'type' => 'string:required'
			),
			*/
		);
		
		
		if(isset($aVals['is_rent']))
		{
			
			$aForms["is_rent"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'string:required'
			);
			
			$aForms["price_per_month"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'int:required'
			);

			$aVals["is_rent"] = 'Y';
			$aVals["is_sale"] = 'N';
		}
		

		if((isset($aVals['is_sale']) or $aVals['is_sale']=='N') and !isset($aVals['is_rent']))
		{
			
			$aForms["is_sale"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'string:required'
			);
			
			$aForms["total_price"] = array(
					'message' => Phpfox::getPhrase('admincp.realestate_form_price_per_month'),
					'type' => 'int:required'
			);
			
			$aVals["is_rent"] = 'N';
			$aVals["is_sale"] = 'Y';
		}
		
		$aVals = $this->validator()->process($aForms, $aVals);
/*		
		echo '<pre>'.print_r($aVals,true).'</pre>';
		
		echo "===================================";
		
		echo '<pre>'.print_r($allVals,true).'</pre>';
		exit;
		
*/		$aVals["realestate_desc"] = strip_tags($aVals["text"]);
		$aVals["date_added"] = date('Y-m-d H:i:s');
		$aVals["agent_id"] = Phpfox::getUserBy('user_id');
		
		unset($aVals["text"]);
		
		/*---------------------------------------------------------
			Not required fields
		 ----------------------------------------------------------*/
		if($allVals["val"]["last_sold"] == '')
		$aVals["last_sold"] = '--';
		else
		$aVals["last_sold"] = $allVals["val"]["last_sold"];
		
		if($allVals["val"]["parking"] == '')
		$aVals["parking"] = '--';
		else
		$aVals["parking"] = $allVals["val"]["parking"];
		
		if($allVals["val"]["cooling"] == '')
		$aVals["cooling"] = '--';
		else
		$aVals["cooling"] = $allVals["val"]["cooling"];
		
		if($allVals["val"]["heating"] == '')
		$aVals["heating"] = '--';
		else
		$aVals["heating"] = $allVals["val"]["heating"];
		
		if($allVals["val"]["fireplace"] == '')
		$aVals["fireplace"] = '--';
		else
		$aVals["fireplace"] = $allVals["val"]["fireplace"];
		
		if($allVals["val"]["exterior_material"] == '')
		$aVals["exterior_material"] = '--';
		else
		$aVals["exterior_material"] = $allVals["val"]["exterior_material"];
		
		if($allVals["val"]["fenced_yard"] == '')
		$aVals["fenced_yard"] = '--';
		else
		$aVals["fenced_yard"] = $allVals["val"]["fenced_yard"];
		
		
		if($allVals["val"]["parcel_no"] == '')
		$aVals["parcel_no"] = '--';
		else
		$aVals["parcel_no"] = $allVals["val"]["parcel_no"];
		
		if (!Phpfox_Error::isPassed())
		{
			return false;
		}
		
		Phpfox::getLib('database')->update($this->_sTable, $aVals, 'realestate_id = '.$realestate_id);
		header('location:index.php?do=/admincp/realestate/list/');
														 
	}
	
	public function delete($id)
	{
		Phpfox::getLib('database')->query('DELETE FROM '.$this->_sTable.' WHERE realestate_id='.$id);
		header('location:index.php?do=/admincp/realestate/list/');
	}
	
	public function addToFavourite($data)
	{
		unset($data["addToFav"]);
		unset($data["sumbit"]);
		$iId = $this->database()->insert($this->_rTable, $data);
	}
	
	public function checkFavouriteListExists($data)
	{
		$result = Phpfox::getLib('database')->query('SELECT * FROM '.$this->_rTable.' WHERE user_id='.$data["user_id"].' AND property_id='.$data["property_id"]);
		$count = mysql_num_rows($result);
		return $count;
	}
	
	public function getReviewRates($user_id)
	{
		$sql = 'SELECT * FROM '.$this->_uTable.' WHERE user_id='.$user_id.' and item_id=1';
		$result = Phpfox::getLib('database')->query($sql);
		$count_no = mysql_num_rows($result);
		$rating =0;
		while($row = mysql_fetch_array($result))
		{
			$rating = $rating + $row["rating"];
		}
		
		$rate = $rating/$count_no;
		$return = $rate.'|'.$count_no;
		return $return;
	}
	
	public function getUserName($user_id)
	{
		$sql = 'SELECT * FROM '.$this->_usTable.' WHERE user_id='.$user_id;
		$result = Phpfox::getLib('database')->query($sql);
		$row = mysql_fetch_array($result);
		$user_name = $row["user_name"];
		return $user_name;
	}
	
	/*
	public function getUserIdByname($user_name)
	{
		$sql_user = "Select user_id From ".$this->_usTable." Where user_name='".$user_name."'";
		
		$result = Phpfox::getLib('database')->query($sql_user);
		echo "================".mysql_num_rows($result);
		if(mysql_num_rows($result)==0)
			return 0;
			
		$row = mysql_fetch_array($result);
		return $row['user_id'];
	}
	*/
	
	public function getPropretyListing($property_type)
	{
		if($property_type == 'rent')
		{
			$sql = 'SELECT * FROM '.$this->_sTable.' WHERE is_rent =\'Y\' and is_sale=\'N\'';
			$arrRent = Phpfox::getLib('database')->getRows($sql,true);
			return $arrRent;
		}
		
		if($property_type == 'sale')
		{
			$sql = 'SELECT * FROM '.$this->_sTable.' WHERE is_rent =\'N\' and is_sale=\'Y\'';
			$arrProperty = Phpfox::getLib('database')->getRows($sql,true);
			return $arrProperty;
		}
	}

}

?>