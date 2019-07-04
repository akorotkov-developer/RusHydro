<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="btn_sbmt" style="float:right; left:0; margin:-54px 0 0 0;"><i></i><a href="#faq">Задать вопрос</a></div>
<div class="main_new news_list" style="margin:-15px 0 25px 0;">
	<div class="m_news">
		<?php if ($_REQUEST['topic']):?>
			<div class="item no_date"><a href="./">Все вопросы</a></div>
		<?php else:?>
			<div class="item no_date"><strong style="color:#E66A25;">Все вопросы</strong></div>
		<?php endif?>
		<?
		foreach($arResult["SECTIONS"] as $arSection):
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
			<?php if ($_REQUEST['topic'] == $arSection['ID']):?>
				<div class="item no_date"><strong style="color:#E66A25;"><?=$arSection["NAME"]?></strong></div>
			<?php else:?>
				<div class="item no_date"><a href="./?topic=<?=$arSection["ID"]?>"><?=$arSection["NAME"]?></a></div>
			<?php endif?>
		<?endforeach?>
	</div>
</div>
