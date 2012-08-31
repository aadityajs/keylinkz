<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 *
 *
 * @copyright		[NO_COPYRIGHT]
 * @author  		Priyam Ghosh
 * @package 		Phpfox_Component
 * @version 		$Id: add.class.php 2000 2010-10-29 11:24:24Z Priyam Ghosh $
 */
class Realestate_Component_Controller_Admincp_Add extends Phpfox_Component
{
	public function process()
	{
		$idEdit = $this->request()->getInt('id');
		if(!empty($idEdit))
		$data = Phpfox::getService('realestate.realestate')->get($idEdit);


		$idDelete = $this->request()->getInt('delete');
		if(!empty($idDelete))
		Phpfox::getService('realestate.realestate')->delete($idDelete);

		if(strtolower($_SERVER['REQUEST_METHOD'])=='post' and !isset($_POST["frmEdit"]))
		{

			$arrImage = array_values(array_filter(explode(',',$_POST["val"]["images"])));
			$strImage = implode(',',$arrImage);
			$_POST["val"]["image_path"] = $arrImage[0];
			$_POST["val"]["images"] = $strImage;

			$aVals = $this->request()->getArray('val');

			$aVals["position"] = str_replace("<b>Locatinal position :</b> ","",$aVals["position"]);
			$aVals["position"] = str_replace("(","",$aVals["position"]);
			$aVals["position"] = str_replace(")","",$aVals["position"]);
			$arrVals = explode(',',$aVals["position"]);
			$aVals["lat"] = $arrVals[0];
			$aVals["lng"] = $arrVals[1];
			$aVals["image_path"] = $_FILES["image_path"]["name"];
			unset($aVals["position"]);
			Phpfox::getService('realestate.realestate')->add($aVals,$_POST);
		}

		if(strtolower($_SERVER['REQUEST_METHOD'])=='post' and isset($_POST["frmEdit"]))
		{

			$arrImage = array_values(array_filter(explode(',',$_POST["val"]["images"])));
			$strImage = implode(',',$arrImage);
			$_POST["val"]["image_path"] = $arrImage[0];
			$_POST["val"]["images"] = $strImage;

			$aVals = $this->request()->getArray('val');

			$aVals["position"] = str_replace("<b>Locatinal position :</b> ","",$aVals["position"]);
			$aVals["position"] = str_replace("(","",$aVals["position"]);
			$aVals["position"] = str_replace(")","",$aVals["position"]);
			$arrVals = explode(',',$aVals["position"]);
			$aVals["lat"] = $arrVals[0];
			$aVals["lng"] = $arrVals[1];
			unset($aVals["position"]);

			Phpfox::getService('realestate.realestate')->update($aVals,$_POST,$aVals["realestate_id"]);
		}

		//$this->template()->setEditor();
		$this->template()->assign('data', $data[0]);
		$this->template()->assign('idEdit', $idEdit);
		
		$this->template()->setHeader('style.css', 'module_realestate');
		$this->template()->setHeader('<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>');
		$this->template()->setHeader('lat-long-drag.js', 'module_realestate');
		$this->template()->setHeader('lat-long-drag_all.js', 'module_realestate');
		$this->template()->setHeader('jquery-1.3.2.js', 'module_realestate');
		$this->template()->setHeader('ajaxupload.3.5.js', 'module_realestate');
		$this->template()->setHeader('upload.js', 'module_realestate');
		/*$this->template()->setHeader('google-api.js', 'module_realestate');
		$this->template()->setHeader('richmarker-compiled.js', 'module_realestate');
		$this->template()->setHeader('richmarker.js', 'module_realestate');*/
		$this->template()->setHeader('sample.js', 'module_realestate');
	}
}

?>