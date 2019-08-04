<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="gallery" style="padding-top:0px;">
		<?$i = 0;?>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			if ($arItem["DISPLAY_PROPERTIES"]["PHOTO"]){
				$arItem["PROPERTIES"]["PHOTO"]["VALUE"] = is_array($arItem["PROPERTIES"]["PHOTO"]["VALUE"]) ? $arItem["PROPERTIES"]["PHOTO"]["VALUE"] : array($arItem["PROPERTIES"]["PHOTO"]["VALUE"]);
				foreach($arItem["PROPERTIES"]["PHOTO"]["VALUE"] as $idPhoto){$i++;?>
				<div class="item<?if ($i == 1){?> first<?}?>">
				<?
					$rsFile = CFile::GetByID($idPhoto);
					$arFile = $rsFile->Fetch();
					$arrImages = $arFile;	
					$fileBig = CFile::ResizeImageGet($idPhoto, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					$file = CFile::ResizeImageGet($idPhoto, array('width'=>200, 'height'=>350), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
					echo '<a href="'.$fileBig["src"].'" rel="prettyPhoto[gallery]" title="'.$arrImages["DESCRIPTION"].'"><img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" /></a>';
					echo '<span>'.$arItem["NAME"];
					if (!empty($arrImages["DESCRIPTION"]))
						echo ' - '.$arrImages["DESCRIPTION"];
					echo '</span>';
				?>
				</div>
				<?
					if ($i == 4) {echo '<div class="clear"></div>'; $i = 0;}
				}
			}
			?>
		<?endforeach;?>
		<?if ($i < 4) {echo '<div class="clear"></div>';}?>
	</div>
<?endif?>
