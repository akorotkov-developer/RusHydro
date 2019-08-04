<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="gallery teams-leader teams-list">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="item">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
					<?if ($arItem["PREVIEW_PICTURE"]["SRC"]){?>
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="120" />
					<?}else{?>
						<div class="no-photo">Нет фотографии</div>
					<?}?>
				</a>
			</div>
		<?endforeach;?>
		<div class="clear"></div>
	</div>
<?endif?>
