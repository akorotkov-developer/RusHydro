<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();  ; ?>


<div class="news-container__news-list col-md-6 col-sm-6 col-xs-12">
    <div class="title-container">
        <h2 class="title-container__title"><?=GetMessage("NEWS_AND_EVENTS") ?></h2>
        <a class="news-list__instagram" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_NEWS_LINK" ); ?>"></a>
    </div>

    <div class="news-list">

        <ul class="news-list__list">

            <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

                <li class="news-list__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a class="news-list__wrapper" href="<?=$arItem['DETAIL_PAGE_URL'] ?>">
                        <h3 class="news__title"><?=$arItem['NAME'] ?></h3>
                        <p class="news__desc"><?=TruncateText($arItem['PREVIEW_TEXT'],450) ?></p>
                        <p class="news__date"><?=$arItem['DATE_ACTIVE_FROM'] ?></p>
                    </a>
                </li>
            <?endforeach; ?>

        </ul>
    </div>


</div>

