<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: share.html.php 3335 2011-10-20 17:26:57Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
				<div class="global_attachment_holder_section" id="global_attachment_poll">	
					<div class="table">
						<div class="table_left">
							{phrase var='poll.question'}:
						</div>
						<div class="table_right">
							<input type="text" name="val[poll_question]" value="" style="width:90%;" onchange="if (empty(this.value)) {l} $bButtonSubmitActive = false; $('.activity_feed_form_button .button').addClass('button_not_active'); {r} else {l} $bButtonSubmitActive = true; $('.activity_feed_form_button .button').removeClass('button_not_active'); {r}" />
						</div>
					</div>
					<div class="table">
						<div class="table_left">
							{phrase var='poll.answers'}:
						</div>
						<div class="table_right">
							<ol class="js_poll_feed_answer poll_feed_answer">
							{for $i = 1; $i <= 2; $i++}
							<li>
								<input type="text" name="val[answer][][answer]" value="" size="30" class="js_feed_poll_answer v_middle" />
							</li>
							{/for}
							</ol>
							<a href="#" onclick="return $Core.addNewPollOption();" class="poll_feed_answer_add">{phrase var='poll.add_another_answer'}</a>
						</div>
					</div>					
				</div>