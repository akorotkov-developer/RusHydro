
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<table class="tbl-stages">	
<colgroup>
			<col width="338">
			<col width="81">
			<col width="81">
			<col width="88">
			<col width="82">
			<col width="83">
			<col width="69">
			<col width="57">
			<col width="60">
			<col width="">
		</colgroup>
<?php 
$points = array(); 
$places = array();

foreach($arResult["ITEMS"] as $key => $arItem) {
	$arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["STAGE_2"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["STAGE_2"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["STAGE_3"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["STAGE_3"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["STAGE_4"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["STAGE_4"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["BONUS_POINTS"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["BONUS_POINTS"]["VALUE"]);
	$arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"] = str_replace(',', '.', $arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"]);

	$sum = (floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"])+
			/*floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_ERRORS"]["VALUE"])+*/
			floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_2"]["VALUE"])+
			floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_3"]["VALUE"])+
			floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_4"]["VALUE"])+
			floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"])+
			floatval($arItem["DISPLAY_PROPERTIES"]["BONUS_POINTS"]["VALUE"])+
			floatval($arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"]));
	$sum = round($sum);

	$arResult["ITEMS"][$key]['DISPLAY_PROPERTIES']['POINTS'] = $sum;
	$points[$arItem['ID']] = $sum;
	
}

$hasPoints = (max($points) !== 0.0 || min($points) !== 0.0);

arsort($points);
$place = 0;
foreach ($points as $team => $count) {
	$places[$team] = ++$place;
}
?>

	<?foreach($arResult["ITEMS"] as $arItem):?>
		<tr>
			<td style="text-align:left;"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>"><?=$arItem["NAME"]?></a></td>
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"])?></td>
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_2"]["VALUE"])?></td>
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_3"]["VALUE"])?></td>
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_4"]["VALUE"])?></td>
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"])?></td>
		  	<? if ($arItem["PROPERTIES"]["COMISSION"]){ ?>	
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"])?></td>
		  	<?}?>	
			<td><?=$hasPoints ? str_replace('.', ',', $arItem['DISPLAY_PROPERTIES']['POINTS']) : '&nbsp;'?></td>
			<td><?=$hasPoints ? $places[$arItem['ID']] : '&nbsp;'?></td>
		</tr>
	<?endforeach;?>
	</table>
<?endif?>
