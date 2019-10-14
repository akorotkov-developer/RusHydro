<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

?>

<div class="news news--item" id="news_list" data-pager-id="<?=$arResult['NAV_RESULT']->NavNum?>">

    <?foreach ($arResult['ITEMS'] as $arItem): ?>

        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>


    <div class="news__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="news__img">
                    <a href="<?=$arItem['DETAIL_PAGE_URL'] ?>">
                        <img src="<?=$arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="<?=$arItem['NAME'] ?>"><span
                            class="date-label date-label--on-img"><?=$arItem['ACTIVE_FROM'] ?></span>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="news-title">
                    <a href="<?=$arItem['DETAIL_PAGE_URL'] ?>"><?=$arItem['NAME']?></a>
                </h3>
                <div class="news__desc">
                    <p><?=TruncateText($arItem['PREVIEW_TEXT'],700)?></p>
                </div>
            </div>
        </div>
    </div>

    <?endforeach; ?>

</div>
<?=$arResult["NAV_STRING"]?>

