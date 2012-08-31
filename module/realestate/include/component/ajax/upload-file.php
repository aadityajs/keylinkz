<?php
//require_once("../../../../../include/setting/constant.sett.php");
//$uploaddir = 'static/image/upload/'; 
//$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
//echo $file;
//exit;
//move_uploaded_file($_FILES["image_path"]["tmp_name"],"module/realestate/static/image/upload/" . $_FILES["image_path"]["name"]);
//if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],"D:/xampp/htdocs/keylinkz/module/realestate/static/image/upload/" . $_FILES["uploadfile"]["name"]))
//if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],PHPFOX_REALESTAE_IMAGE_UPLOAD. $_FILES["uploadfile"]["name"]))
if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$_SERVER['DOCUMENT_ROOT']."/keylinkz/module/realestate/static/image/upload/" . $_FILES["uploadfile"]["name"]))
{ 
	echo "success"; 
} 
else 
{
	echo "error";
}





//Phpfox::getLib('url')->makeUrl()
?>