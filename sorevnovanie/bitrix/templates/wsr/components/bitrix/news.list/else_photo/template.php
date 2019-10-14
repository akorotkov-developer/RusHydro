<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
 ; ?>

<?if(empty($arResult['ITEMS'])) return false; ?>


<div class="media-item">
    <h4><?= GetMessage("ALL_PHOTO") ?></h4>
    <div class="row">

    <? foreach ($arResult['ITEMS'] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="col-md-4" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a class="media-item__sm" href="<?=$arItem['DETAIL_PAGE_URL'] ?>">
                <div class="media-item__img">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="<?=$arItem['NAME'] ?>"/>
                    <div class="media-item__title media-item__title--sm">
                        <p><?=$arItem['PREVIEW_TEXT'] ?></p>
                    </div>
                </div>
            </a>
        </div>
    <? endforeach; ?>
    </div>
</div>