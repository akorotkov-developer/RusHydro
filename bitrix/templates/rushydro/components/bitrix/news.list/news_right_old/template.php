<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
	$(function()
	{
		$('.hor_scroll').jScrollPane({showArrows:true, speed: 113, noFuckingMouseWheel:true});
	});
</script>
<div class="hor_scroll rht_news">
	<?$width = count($arResult["ITEMS"])*100 + (count($arResult["ITEMS"]) - 1)*13?>
	<div style="width:<?=$width?>px">
	<?$i=0;?>
	<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
		<div class="item"<?if ($i==1){?> style="margin-left:0px;"<?}?>>
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
			<div class="shw"></div>
			<a href="<?=$arItem["~PREVIEW_TEXT"]?>" class="n_txt">
				<div class="n_wrap">
					<p><strong><?=$arItem["NAME"]?></strong></p>
					<?=$arItem["DETAIL_TEXT"]?>
				</div>
			</a>
		</div>
	<?endforeach;?>
	</div>
</div>