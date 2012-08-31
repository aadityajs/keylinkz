<?php

if(isset($_POST['action']))
{

	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
	{
		/*
		* vars
		*/
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);


		$myFile = "log.txt";
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $id.'=='.$rate;
		fwrite($fh, $stringData);
		fclose($fh);

		$rFriend = new Friend_Component_Rate_Ajax();
		$rFriend->addToRate();

	}
	
}
class Friend_Component_Rate_Ajax extends Phpfox_Ajax{

	public function addToRate()
	{
		$con = mysql_connect("localhost","root","");
		$db = mysql_select_db('keylinkz');

		$sql = 'INSERT INTO keylinkz_friend_rate_list(user_id,friend_id,rating) VALUES(2,3,4)';
		mysql_query($sql);
	}
}


