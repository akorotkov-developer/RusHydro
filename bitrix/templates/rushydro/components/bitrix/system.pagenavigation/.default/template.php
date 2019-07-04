<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

//echo "<pre>"; print_r($arResult);echo "</pre>";

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
$ClientID = 'navigation_'.$arResult['NavNum'];
?>

<ul class="pager">
	<li class="pager_corner"></li>
	<?if ($arResult["NavPageNomer"] > 1):?>
		<li class="pager_arr">
		<?if($arResult["bSavePage"]):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" id="<?=$ClientID?>_previous_page"><?=GetMessage("nav_prev")?></a>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" id="<?=$ClientID?>_previous_page"><?=GetMessage("nav_prev")?></a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" id="<?=$ClientID?>_previous_page"><?=GetMessage("nav_prev")?></a>
			<?endif?>
		<?endif?>
		</li>
	<?endif?>

	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
		<li>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<i class="pager_act"></i>
			<span><?=$arResult["nStartPage"]?></span>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
		<?else:?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
		</li>
	<?endwhile?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<li class="pager_arr arr_rht"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" id="<?=$ClientID?>_next_page"><?=GetMessage("nav_next")?></a></li>
	<?endif?>
	<li class="pager_corner pager_corner_r"></li>
</ul>
<div class="clear"></div>
<script type="text/javascript">
document.onkeydown = function(event)
{
   if (window.event)
      event = window.event;

   if (event.ctrlKey)
   {
      var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
      if (!key)
         return;

      var link = null;
      if (key == 39)
         link = document.getElementById('<?=$ClientID?>_next_page');
      else if (key == 37)
         link = document.getElementById('<?=$ClientID?>_previous_page');

      if (link && link.href)
         document.location = link.href;
   }
}
</script>