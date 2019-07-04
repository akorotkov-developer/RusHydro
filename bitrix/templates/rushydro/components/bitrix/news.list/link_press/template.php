<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="sub_m_news">
	<table cellspacing="0" cellpadding="0">
		<?$i=0;?>
		<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
			<tr<?if ($i==1){?> class="first"<?}?>>
				<td>
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="n_img"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a>
				</td>
				<td>
					<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="n_ttl"><?=$arItem["NAME"]?></a><div class="n_txt"><?=$arItem["PREVIEW_TEXT"]?></div>
				</td>
			</tr>
		<?endforeach;?>
	</table>
</div>