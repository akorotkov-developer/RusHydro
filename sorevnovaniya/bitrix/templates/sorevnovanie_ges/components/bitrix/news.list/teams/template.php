<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if (!empty($arResult)):?>
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
				<?/* Для возобновления/остановки голосования поменять значение константы VOTING_ENABLED в init.php и поменять класс btn-no-like/btn-like */?>
				<?if($arItem['IBLOCK_SECTION_ID']!='26'){ /*Для финалистов голосования нет*/?> 
					<div data-id="<?=$arItem['ID']?>" data-region-id="<?=$arItem['IBLOCK_SECTION_ID']?>" class="btn-like ajax-like" <?php if (!VOTING_ENABLED): ?>data-closed="1"<?php endif; ?>><div class="btn-like-cout"></div><div class="btn-like-wrap"><div class="btn-like-ico"><i></i>Мы за вас болеем</div></div></div>
				<?}?>

			</div>
		<?if ($i == 4) {echo '<div class="clear"></div>'; $i = 0;}?>
		<?endforeach;?>
		<?if ($i < 4) {echo '<div class="clear"></div>';}?>
	</div>
<?endif?>