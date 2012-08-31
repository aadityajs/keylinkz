<?php
/**
 * [PHPFOX_HEADER]
 *
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 2771 2011-07-30 19:34:11Z Raymond_Benc $
 */

defined('PHPFOX') or exit('NO DICE!');

?>
						<div id="mobile_main_menu">
							{foreach from=$aMobileMenus key=iKey item=aMenu name=menu}
							{if ($aMenu.phrase) <> Apps}
							<div class="mobile_main_menu">
										<a href="{$aMenu.link}">
											{if isset($aMenu.total) && $aMenu.total > 0}
											<span class="new">{$aMenu.total}</span>
											{/if}
											{$aMenu.icon}
											<div>{$aMenu.phrase}</div>
										</a>
							</div>
							{/if}
									{if is_int($phpfox.iteration.menu/3)}
									<div class="clear"></div>
									{/if}

							{/foreach}
						</div>
						<div class="clear"></div>