<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$i=0;?>
<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
	<a class="link_bg<?if($i==1){?> link_first<?}?>" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><?=html_entity_decode($arItem["NAME"])?></a>
<?endforeach;?>