<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="list-material"> 					 
	<?foreach($arResult["ITEMS"] as $arItem):?>	
		<?if ($arItem["DISPLAY_PROPERTIES"]["NEW_STAGE"]) {?>
			<h2 style="font-size: 1.5em; font-weight: bold;"><?echo $arItem["NAME"]?></h2>
		<? } else { ?>		 
			<div class="item"> 	
				<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="m-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
				<?endif?>
				<?if ($arItem["DISPLAY_PROPERTIES"]["LINK"]){?>
					<a href="<?echo $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" class="m-name"<?if ($arItem["DISPLAY_PROPERTIES"]["SELECT"]){?> style="color:#da0303;"<?}?>><?echo $arItem["NAME"]?></a>
				<?}else{?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="m-name"<?if ($arItem["DISPLAY_PROPERTIES"]["SELECT"]){?> style="color:#da0303;"<?}?>><?echo $arItem["NAME"]?></a>
				<?}?>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="m-desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
				<?endif;?>
			</div>
		<? } ?>
	<?endforeach;?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
