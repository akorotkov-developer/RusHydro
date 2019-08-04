<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="menu-sub">
	<?foreach($arResult as $arItem):?><?if ($arItem["PERMISSION"] > "D"):?><?if ($arItem["SELECTED"]):?><a href="<?=$arItem["LINK"]?>" class="act"><?=$arItem["TEXT"]?></a><?else:?><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><?endif?><?endif?><?endforeach?>
	</div>
<?endif?>