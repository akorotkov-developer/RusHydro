<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="list-material"> 					 
	<?foreach($arResult["ITEMS"] as $arItem):?>					 
		<div class="item"> 	
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
				<div class="m-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
			<?endif?>
			<a href="/ges/letters/" class="m-name">Народная журналистика</a>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="m-desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
		</div>
	<?endforeach;?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
