<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="vkk-faq_line"></div>
<?if (!empty($arResult["ITEMS"])){?>
	<div class="vkk-faq-list">
		<div style="display:none"><pre><?print_r($arResult)?></pre></div>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<div class="vkk-faq-item">
			<div class="vkk-faq-quest"><?=$arItem['PROPERTIES']['QUESTION']['VALUE']['TEXT'];?></div>
			<?if (!empty($arItem['DISPLAY_PROPERTIES']['ANSWER'])){?>
				<div class="vkk-faq-answer"><?=$arItem['DISPLAY_PROPERTIES']['ANSWER']['DISPLAY_VALUE'];?></div>
			<?}?>
		</div>
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
		<div class="clear"></div>
	<?endif;?>
	</div>
<?}else{?>
	<p class="vkk-faq-empty">В данном разделе вопросов нет.</p>
<?}?>