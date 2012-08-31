<?php

	$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/keylinkz/module/realestate/static/image/upload/'; 
	if($_REQUEST['file'])
	{
		$filename=$_REQUEST['file'];
		
		$file = $uploaddir.$filename; 
		if(is_file($file))
		{
			unlink($file);
			echo 'success';
		}
		else
		{
			echo "";
		}
	}

?>
