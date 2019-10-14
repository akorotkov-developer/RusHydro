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
 ;

if (empty($arResult['ITEMS']))
    return false;
?>

<div class="media-item">
    <h4><?= GetMessage("PHOTO") ?></h4>
    <div class="row" id="list_photo" data-pager-id="<?=$arResult['NAV_RESULT']->NavNum?>">

        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <div class="col-md-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <a class="media-item__sm" href="<?=$arItem['DETAIL_PAGE_URL'] ?>">
                    <div class="media-item__img"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="<?=$arItem['NAME'] ?>">
                        <div class="media-item__title">
                            <p><?=$arItem['NAME'] ?></p>
                        </div>
                    </div>
                </a>
            </div>

        <? endforeach; ?>

    </div>

    <?=$arResult["NAV_STRING"]?>
</div>

<hr>

