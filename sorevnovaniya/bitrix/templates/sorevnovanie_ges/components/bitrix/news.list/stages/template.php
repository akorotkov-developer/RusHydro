<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<table class="tbl-stages">
		<? if ($arParams["IBLOCK_ID"] == '3') : ?>	
		<colgroup> 			
			<col width="397"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 			
			<col width="82"></col> 		
		</colgroup> 
		<? elseif ($arParams["IBLOCK_ID"] == '16') : ?>		
		<colgroup> 			
			<col width="296"> 			 		
		  	<col width="69"> 			 			
		  	<col width="68"> 			 			
		  	<col width="68"> 			 			
		  	<col width="69"> 			 			
		  	<col width="68">		 			
		  	<col width="69"> 		 			
		  	<col width="86"> 	 			
		  	<col width="71"> 			 			
		  	<col width="69">		
		</colgroup>
		<? else : ?>		
		<colgroup> 			
			<col width="296"> 			 		
		  	<col width="69"> 			 			
		  	<col width="68"> 			 			
		  	<col width="68"> 			 			
		  	<col width="69"> 			 			
		  	<col width="68">		 			
		  	<col width="69"> 		 			
		  	<col width="86"> 	 			
		  	<col width="71"> 			 			
		  	<col width="69">		
		</colgroup>
		<?endif;?>		
<?php 
$points = array(); 
$places = array();

foreach($arResult["ITEMS"] as $key => $arItem) {
    if (!$arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"] && (
            isset($arItem["DISPLAY_PROPERTIES"]["STAGE_1_1"]["VALUE"])
            || isset($arItem["DISPLAY_PROPERTIES"]["STAGE_1_2"]["VALUE"])
            || isset($arItem["DISPLAY_PROPERTIES"]["STAGE_1_3"]["VALUE"])
        )) {
        $arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"] = $arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"] =
            floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_1_1"]["VALUE"])
            + floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_1_2"]["VALUE"])
            + floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_1_3"]["VALUE"]);
    }
    if (!$arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"] && (
            isset($arItem["DISPLAY_PROPERTIES"]["STAGE_5_1"]["VALUE"])
            || isset($arItem["DISPLAY_PROPERTIES"]["STAGE_5_2"]["VALUE"])
        )) {
        $arResult["ITEMS"][$key]["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"] = $arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"] =
            floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_5_1"]["VALUE"])
            + floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_5_2"]["VALUE"]);
    }
	$sum = (floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_1"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_2"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_3"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_4"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_5"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["STAGE_6"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["BONUS_POINTS"]["VALUE"])+floatval($arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"]));
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
		  	<? if ($arItem["PROPERTIES"]["STAGE_6"]){ ?>	
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["STAGE_6"]["VALUE"])?></td>
		  	<?}?>
		  	<? if ($arItem["PROPERTIES"]["COMISSION"]){ ?>	
			<td><?=str_replace('.', ',', $arItem["DISPLAY_PROPERTIES"]["COMISSION"]["VALUE"])?></td>
		  	<?}?>	
			<td><?=$hasPoints ? str_replace('.', ',', $arItem['DISPLAY_PROPERTIES']['POINTS']) : '&nbsp;'?></td>
			<td><?=$hasPoints ? $places[$arItem['ID']] : '&nbsp;'?></td>
		</tr>
	<?endforeach;?>
	</table>
<?endif?>
