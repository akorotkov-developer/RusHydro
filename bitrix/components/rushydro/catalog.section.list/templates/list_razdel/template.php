<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php if ($arResult['SECTIONS']) { ?>
<div class="list_sect_outer">
	<i class="l_t"></i>
	<i class="r"></i>
	<div class="list_sect_inner">
		<?
        global $USER;
		foreach($arResult["SECTIONS"] as $arSection):
			$arSection['NAME'] = parseText($arSection['NAME']);
		    //if ($arSection['NAME'] == "Благотворительность и волонтерство" and !$USER->IsAuthorized()) continue;
		?>
			<a href="<?=grabLinkFromTitle($arSection['NAME']) ?: $arParams['CURRENT_PATH'].$arSection["CODE"].'/'?>"><?=parseTitle($arSection["NAME"])?></a>
		<?endforeach?>
	</div>
	<i class="r r_b"></i>
	<i class="l_b"></i>
</div>
<?php } ?>
