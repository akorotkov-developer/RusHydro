<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(empty($arResult['ITEMS'])) return false;
  ?>



<div class="media-container__list <?=$arResult['PHOTO'] ? 'col-md-4 col-sm-4 col-xs-12 video-and-photo' : 'row only-video'?> js-lightgallery ">
    <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <div class="media-container__media-wrapper <?=$arResult['PHOTO'] ? '' : 'col-sm-4'?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="media-item__sm media-item__sm--bottom-offset">
                <div class="media-item__img media-item__img--video lightgallery-item"
                     data-poster="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" data-html="#video<?= $arItem['ID'] ?>">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="<?= $arItem['NAME'] ?>">
                    <div class="media-item__title media-item__title--sm">
                        <p><?= $arItem['NAME'] ?></p>
                    </div>
                </div>
            </div>
        </div>


    <? endforeach; ?>

</div>


<? foreach ($arResult['ITEMS'] as $key => $arItem): ?>
    <div id="video<?= $arItem['ID'] ?>" style="display: none">
        <video class="lg-video-object vjs-default-skin lg-html5" controls="controls" preload="none">
            <source src="<?= CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE']) ?>" type="video/mp4">
        </video>
    </div>
<? endforeach; ?>
