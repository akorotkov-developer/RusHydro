<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
  ?>

<div class="news-container__item col-md-12 col-xs-12 col-sm-12">
    <div class="news-container__slider col-md-12 col-sm-12 col-xs-12">
        <div class="slider"
             data-slick="{&quot;slidesToShow&quot;: 1, &quot;slidesToScroll&quot;: 1, &quot;arrows&quot;: false, &quot;autoplay&quot;: true, &quot;dots&quot;: true}">
            <? foreach ($arResult['ITEMS'] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="slider__element" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?=$arItem['PROPERTIES']['URL']['VALUE'] ?>">
                        <img class="slider__image" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"/>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
