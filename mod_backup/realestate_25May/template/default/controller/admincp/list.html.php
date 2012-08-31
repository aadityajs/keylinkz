<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  
  	{if $data|@count gt 0}
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
          <tr style="background-color:#2D2E30;color:#FFF;">
            <td>Image</td>
            <td>Title</td>
            <td>Description</td>
            <td>No of rooms</td>
            <td>No of bathrooms</td>
            <td></td>
            <td></td>
          </tr>
        {foreach from=$data item=foo}
            <tr>
                <td><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD; ?>{$foo.image}" width="60" height="60" /></td>
                <td>{$foo.title}</td>
                <td>{$foo.desc}</td>
                <td>{$foo.no_of_rooms}</td>
                <td>{$foo.no_of_bathrooms}</td>
                <!-- <td><a href="?do=/admincp/realestate/add/id_{$foo.id}"><img src="module/realestate/template/default/controller/admincp/edit.png" width="30" height="30" style="cursor:pointer;" /></a></td>-->
                <td><a onclick="confirmDelete({$foo.id});"><img src="module/realestate/template/default/controller/admincp/DeleteRed.png" width="27" height="27" style="cursor:pointer;" /></a></td>
            </tr>
        {/foreach}
        </table>
    {else}
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td style="padding-left:300px;padding-top:10px;padding-bottom:10px;color:#333;font-weight:bold;">No data found</td>
        </tr>
        </table>
	{/if}
  
</body>
</html>