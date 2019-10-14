<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
 ;

if (empty($arResult['ITEMS']))
    return false;

?>

<div class="media-item">
    <h4><?= GetMessage("VIDEO") ?></h4>
    <div class="row js-lightgallery" id="list_video" data-pager-id="<?=$arResult['NAV_RESULT']->NavNum?>">


        <? foreach ($arResult['ITEMS'] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <div class="col-md-4">
                <div class="media-item__sm"
                     id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="media-item__img media-item__img--video lightgallery-item"
                         data-poster="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" data-html="#video<?= $arItem['ID'] ?>">
                        <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="<?= $arItem['NAME'] ?>">
                        <div class="media-item__title media-item__title--sm">
                            <p><?= $arItem['NAME'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="video<?= $arItem['ID'] ?>" style="display: none">
                <video class="lg-video-object vjs-default-skin lg-html5" controls="controls" preload="none">
                    <source src="<?= CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE']) ?>" type="video/mp4">
                </video>
            </div>

        <? endforeach; ?>

    </div>

    <?= $arResult["NAV_STRING"] ?>
</div>






