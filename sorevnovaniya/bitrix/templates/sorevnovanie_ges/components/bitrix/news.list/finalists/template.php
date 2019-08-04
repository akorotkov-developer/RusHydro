<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="gallery teams-list">
		<?$i = 0;?>
		<?foreach($arResult["ITEMS"] as $arItem):$i++;?>

			<div class="item<?if ($i == 1){?> first<?}?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
					<?if ($arItem["PREVIEW_PICTURE"]["SRC"]){?>
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" />
					<?}else{?>
						<div class="no-photo">Нет фотографии</div>
					<?}?>
				</a>
				<span><?=$arItem["NAME"]?></span>
				<div data-id="<?=$arItem['ID']?>" data-region-id="<?=$arItem['IBLOCK_SECTION_ID']?>" data-closed="1" class="btn-no-like ajax-like"><div class="btn-like-cout"></div><div class="btn-like-wrap"><div class="btn-like-ico"><i></i>Мы за вас болеем</div></div></div>
			</div>
		<?if ($i == 4) {echo '<div class="clear"></div>'; $i = 0;}?>
		<?endforeach;?>
		<?if ($i < 4) {echo '<div class="clear"></div>';}?>
	</div>
<?endif?>
