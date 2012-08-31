<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: display.html.php 3118 2011-09-16 10:51:04Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>

<div class="table">
			<div class="table_left">
				{phrase var='ad.location'}:
			</div>
			<div class="table_right">
				{select_location value_title='phrase var=core.any' name='country_iso_custom'}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.gender'}:
			</div>
			<div class="table_right">
				{select_gender value_title='phrase var=core.any'}
			</div>
			<div class="clear"></div>
		</div>	
		<div class="table">
			<div class="table_left">
				{phrase var='ad.age_group_between'}:
			</div>
			<div class="table_right">
				<select name="val[age_from]" id="age_from">
					<option value="">{phrase var='ad.any'}</option>
					{foreach from=$aAge item=iAge}
						<option value="{$iAge}"{value type='select' id='age_from' default=$iAge}>{$iAge}</option>
					{/foreach}
				</select>
				<span id="js_age_to">
					{phrase var='ad.and'}
					<select name="val[age_to]" id="age_to">
					<option value="">{phrase var='ad.any'}</option>
					{foreach from=$aAge item=iAge}
						<option value="{$iAge}"{value type='select' id='age_to' default=$iAge}>{$iAge}</option>
					{/foreach}
					</select>
				</span>
			</div>
			<div class="clear"></div>
		</div>		