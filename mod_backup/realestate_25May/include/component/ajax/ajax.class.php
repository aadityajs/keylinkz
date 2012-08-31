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
class Realestate_Component_Ajax_Ajax extends Phpfox_Ajax
{
//, 'email='+$('#email').val(), 'phno='+$('#phno').val(), 'message='+$('#message').val()
	public function contactAgent() {

		if (Phpfox::isUser(true)) {
			//$this->alert('So you said "'.$this->get('message').'", "'.$this->get('name').'", "'.$this->get('email').'", "'.$this->get('phno').'"', 'Your Message sent successfully!', 500, 400);
			//$this->alert('So you said "'.$this->get('name').'"', 'Your Message sent successfully!', 500, 400);


			$param = explode('::', $this->get('param'));
			$name = $param[0];
			$email = $param[1];
			$phno = $param[2];
			$message = $param[3];

			if ($name == "" || $email == "" || $phno == "" || $message == "") {
				/*
				 * $this->call('$("#name_err").html("Please enter your name");');
				$this->call('$("#email_err").html("Please enter your email address");');
				$this->call('$("#phno_err").html("Please enter your phone noumber");');
				$this->call('$("#message_err").html("Provide your message.");');
				 */
				$this->alert("Please enter your name <br/> Please enter your email address <br/> Please enter your phone number <br/> Please provide your message", "Error");
				return false;
			}
			else {
				$to = $param[4];
				$subject = "Keylinkz Property request";
				//$this->alert($this->get('param'));
				$this->softNotice("Your Message sent successfully!");
				mail($to, $subject, $message);
			}
		}

	}

	public function applyLease() {
		$this->alert("Apply for Lease");
	}

	public function mortgageCalc() {
		$this->alert("Mortgage Calculator");
	}

	public function roommatesWanted() {
		$this->alert("Roommates Wanted");
	}

	public function scheduleViewing() {
		$this->alert("Schedule a viewing");
	}

	public function moreFacts() {
		$this->alert("More Facts");
	}

	public function emailListing()
	{


/*		$html = '
					<form id="form1" name="form1" method="post" action="">
					<label>Name
					<input type="text" name="name" id="name" />
					</label>
					</form>
				';
*/

/*		$str = '<script type="text/javascript">';
		$str .= 'function emailMessage() {';
		$str .= 'var name = document.getElementById("name").value;';
		$str .= 'var email = document.getElementById("email").value;';
		$str .= 'var message = document.getElementById("message").value;';
		$str .= '}';
		$str .='</script>';
*/

		$str .= '<form action="" method="post">';
		$str .= '<input type="hidden" name="hiddenEmail" id="hiddenEmail" value="yes"/>';
		$str .= '<label>Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$str .= '<input type="text" name="name" id="name" style="width:390px;"/><br /><br />';

		$str .= '<label>Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$str .= '<input type="text" name="email" id="email" style="width:390px;"/><br /><br />';

		$str .= '<label>Message</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$str .= '<textarea name="message" id="message" rows="6" style="width:390px;"></textarea><br /><br />';

		//$str .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		$str .= '<input type="submit" name="sumbit" id="submit" value="Submit" class="button" style="margin-left:200px;"/>';
		$str .= '</form>';

		$this->alert($str, 'Email Listing', 500, 300);
	}

	public function addToFavourite()
	{
		if (Phpfox::isUser(true)) {
		$str = '';
		$param = $this->get('param');
		$user_id = Phpfox::getUserBy('user_id');
		$add_date = date('Y-m-d');

		$data["property_id"] = $property_id = $param;
		$data["user_id"] = $user_id = Phpfox::getUserBy('user_id');
		$count = Phpfox::getService('realestate.realestate')->checkFavouriteListExists($data);
		if($count>0)
		{
			$this->alert("Already added to the list");
		}
		else
		{
			$str .= '<form action="" method="post">';
			$str .= '<input type="hidden" name="addToFav" id="addToFav" value="yes"/>';
			$str .= '<input type="hidden" name="property_id" id="property_id" value="'.$param.'"/>';
			$str .= '<input type="hidden" name="user_id" id="user_id" value="'.$user_id.'"/>';
			$str .= '<input type="hidden" name="add_date" id="add_date" value="'.$add_date.'"/>';

			$str .= '<label>Note</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			$str .= '<br />';
			$str .= '<textarea name="note" id="note" rows="4" style="width:270px;"></textarea><br /><br />';

			$str .= '<input type="submit" name="sumbit" id="submit" value="Submit" class="button" style="margin-left:100px;"/>';
			$str .= '</form>';

			$this->alert($str);
			//$data["add_date"] = $add_date = date('Y-m-d');
			//Phpfox::getService('realestate.realestate')->addToFavourite($data);
			//$this->alert("Successfully added to favourite list");
		}


		//$this->softNotice("Your Message sent successfully!");
		}
	}


	public function rate() {
		$this->alert('hi');
	}

}

?>