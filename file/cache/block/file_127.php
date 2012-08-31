<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'block_id' => '127',
  'type_id' => '1',
  'ordering' => '2',
  'm_connection' => NULL,
  'component' => NULL,
  'location' => '3',
  'disallow_access' => NULL,
  'can_move' => '0',
  'module_id' => 'core',
  'source_parsed' => '<?php if ( (Phpfox::getLib(\'url\')->getUrl() != \'realestate\') && (Phpfox::isUser()) && (!Phpfox::isAdminPanel()) ) { ?>
<?php //echo Phpfox::getLib(\'url\')->makeUrl(Phpfox::getUserBy(\'user_name\')); ?>
<!-- LATEST LISTING-->
				<div class="listing_right" <?php if (Phpfox::getLib(\'url\')->getUrl() == \'\') { echo \'style="width: 100%;"\'; }?> >
				<div class="listing_righttop" <?php if (Phpfox::getLib(\'url\')->getUrl() == \'\') { echo \'style="width: 100%;"\'; }?> >
				<ul>
				<li>Latest Listings</li>
				<li><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="19" height="1"/></li>
				<li><a href="#">See all</a></li>
				</ul>
				</div>
				<div class="clear"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="1" height="10"/></div>


               <?php
$result = Phpfox::getLib(\'database\')->query(\'SELECT * FROM keylinkz_realestate ORDER BY date_added DESC LIMIT 0,4\');	
		$i=0;
		while($row = mysql_fetch_array($result))
		{
?>

<div class="listing_rightbot"  <?php if (Phpfox::getLib(\'url\')->getUrl() == \'\') { echo \'style="width: 230px;"\'; }?>>
				<div class="listing_leftbg">

                    <a href="<?php echo Phpfox::getLib(\'url\')->makeUrl(\'realestate\'); ?>id_<?php echo $row["realestate_id"]; ?>"><img src="<?php echo PHPFOX_REALESTAE_IMAGE_UPLOAD; ?><?php echo $row["image_path"]; ?>" alt="" width="70" height="55" /></a>
                </div>
				<div class="listing_rightbg" <?php if (Phpfox::getLib(\'url\')->getUrl() == \'\') { echo \'style="width: 150px;"\'; }?>>

				<p><a href="<?php echo Phpfox::getLib(\'url\')->makeUrl(\'realestate\'); ?>id_<?php echo $row["realestate_id"]; ?>"><?php echo substr($row["realestate_title"],0,20); ?>...</a></p>
				<p><span><?php echo substr($row["realestate_desc"],0,30); ?>...</span></p>
				<p style="text-align:right; padding-right: 4px;"><a href="<?php echo Phpfox::getLib(\'url\')->makeUrl(\'realestate\'); ?>id_<?php echo $row["realestate_id"]; ?>">View</a></p>
				</div>
				</div>

<?php
			//$dataProperty[$i]["id"] = $row["realestate_id"];
			//echo $dataProperty[$i]["title"] = $row["realestate_title"];
			//$dataProperty[$i]["realestate_desc"] = substr($row["realestate_desc"],0,60);
			//$dataProperty[$i]["image"] = $row["image_path"];
			$i++;
		
               }   // end while
?>



				<div class="clear"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>spacer.gif" alt="" width="1" height="10"/></div>
				<div><a href="#"><img src="<?php echo PHPFOX_DIR_DEFAULT_THEME; ?>perl.jpg" alt="" width="206" height="197" border="0" /></a></div>   
				</div>
                <!-- LATEST LISTING -->
<?php } ?>',
); ?>