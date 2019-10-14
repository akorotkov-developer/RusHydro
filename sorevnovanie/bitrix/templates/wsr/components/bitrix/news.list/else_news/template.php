<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
 ; ?>

<?if(empty($arResult['ITEMS'])) return false; ?>
<hr class="news-detail-hr"/>
<div class="news-sm row">
    <div class="col-md-12">
        <h3 class="news-sm-title"><?=GetMessage("ELSE_NEWS") ?></h3>
    </div>


    <? foreach ($arResult['ITEMS'] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="col-md-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="news-sm__img">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt=""/>
                <span class="date-label date-label--on-img"><?=$arItem['ACTIVE_FROM'] ?></span>
            </div>
            <h3 class="news-title">
                <a href="<?=$arItem['DETAIL_PAGE_URL'] ?>"><?=$arItem['NAME'] ?></a>
            </h3>
            <div class="news-sm__desc">
                <p><?=TruncateText($arItem['PREVIEW_TEXT'],200)?></p>
            </div>
        </div>

    <? endforeach; ?>

</div>
