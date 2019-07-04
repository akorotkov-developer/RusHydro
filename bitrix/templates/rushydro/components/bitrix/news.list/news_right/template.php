<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="rht_links_news">
	
	<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
		<a href="<?=$arItem["~PREVIEW_TEXT"]?>" style="background:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) 4px center no-repeat;">
			<?=html_entity_decode($arItem["NAME"])?>
		</a>
	<?endforeach;?>
	
	
</div>