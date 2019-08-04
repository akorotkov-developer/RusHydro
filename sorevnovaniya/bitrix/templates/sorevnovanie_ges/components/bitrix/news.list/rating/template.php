<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<?php
		$votes = array(); 
		foreach ($arResult['ITEMS'] as $arItem) {
			$votes[] = intval($arItem['PROPERTIES']['VOTES']['VALUE']);
		}

		$maxVotes = max($votes);
		unset($votes);
	?>
	<table width="100%" class="tbl-stages">
		<colgroup>
			<col width="399">
			<col width="90">
		</colgroup>
		<?foreach($arResult["ITEMS"] as $arItem):?>
<?if($arItem['IBLOCK_SECTION_ID'] != 26){?>
			<tr>
				<td style="text-align:left;"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>"><?=$arItem["NAME"]?></a></td>
				<td><?=intval($arItem['PROPERTIES']['VOTES']['VALUE'])?></td>
				<td><div class="rating-bar" style="width: <?=round((intval($arItem['PROPERTIES']['VOTES']['VALUE']) / $maxVotes) * 430)?>px"></div></td>
			</tr>
<?}?>
		<?endforeach;?>
	</table>
<?endif?>
