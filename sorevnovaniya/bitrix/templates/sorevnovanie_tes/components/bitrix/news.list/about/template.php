<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="gallery">
		 <h3>Фотогалерея</h3>
		<?$i = 0;?>
		<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
			<div class="item<?if ($i == 1){?> first<?}?>">
				<a href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" rel="prettyPhoto[gallery]" title="<?=$arItem["NAME"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" <?if ($arItem["PREVIEW_PICTURE"]["WIDTH"] < $arItem["PREVIEW_PICTURE"]["HEIGHT"]){?>style="margin-top: -40px;"<?}?> /></a>
				<span><?=$arItem["NAME"]?></span>
			</div>
			<?
				if ($i == 4) {echo '<div class="clear"></div>'; $i = 0;}
		?>
		<?endforeach;?>
		<?if ($i < 4) {echo '<div class="clear"></div>';}?>
	</div>
<?endif?>
