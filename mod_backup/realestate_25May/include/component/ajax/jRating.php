<?php
mysql_connect('localhost','root','');
mysql_select_db('keylinkz');

//var_dump($_POST);
$aResponse['error'] = false;
$aResponse['message'] = '';

// ONLY FOR THE DEMO, YOU CAN REMOVE THIS VAR
	$aResponse['server'] = '';
// END ONLY FOR DEMO

if(isset($_POST['action']))
{
	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
	{
		/*
		* vars
		*/
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);
		$user_id = $_POST['nameBox'];
		$byUser = $_POST['byUser'];
		$time = time();

		// YOUR MYSQL REQUEST HERE or other thing :)
		/*
		*
		*/

		//$u_id = end(explode('id_', $_SERVER[REQUEST_URI]));
		$q = mysql_query("insert into `keylinkz_user_rating` (rate_id, item_id, user_id, by_user, rating, time_stamp) values (null, $_POST[idBox], $user_id, $byUser, $_POST[rate], $time)");
		//echo $q;

		// if request successful
		$success = true;
		// else $success = false;


		// json datas send to the js file
		if($success)
		{


			$aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';

			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				$aResponse['server'] = '<strong>Success answer :</strong> Success : Adi, Your rate has been recorded. Thanks for your rate :)<br />';
				$aResponse['server'] .= '<strong>Rate received :</strong> '.$rate.'<br />';
				$aResponse['server'] .= '<strong>ID to update :</strong> '.$id;


			// END ONLY FOR DEMO

			echo json_encode($aResponse);

			//$q = mysql_query("insert into `keylinkz_user_rating` (rate_id, item_id, user_id, rating, time_stamp) values (null, $id, 6, $rate, 1112)");
			//echo $q;

			//var_dump(json_encode($aResponse));
		}
		else
		{
			$aResponse['error'] = true;
			$aResponse['message'] = 'An error occured during the request. Please retry';

			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
				$aResponse['server'] = '<strong>ERROR :</strong> Your error if the request crash !';
			// END ONLY FOR DEMO


			echo json_encode($aResponse);
		}
	}
	else
	{
		$aResponse['error'] = true;
		$aResponse['message'] = '"action" post data not equal to \'rating\'';

		// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
			$aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';
		// END ONLY FOR DEMO


		echo json_encode($aResponse);
	}
}
else
{
	$aResponse['error'] = true;
	$aResponse['message'] = '$_POST[\'action\'] not found';

	// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
		$aResponse['server'] = '<strong>ERROR :</strong> $_POST[\'action\'] not found';
	// END ONLY FOR DEMO


	echo json_encode($aResponse);
}