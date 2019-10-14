<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
  ?>



    <div class="title-container">
        <h2 class="title-container__title"><?= $arParams['PAGER_TITLE'] ?></h2>
        <a class="title-container__link"
           href="<?= $arResult['LIST_PAGE_URL'] ?>"><?= GetMessage("ALL") ?> <?= strtolower($arParams['PAGER_TITLE']) ?></a>
    </div>




    <div class="media-container__list col-md-8 col-sm-8 col-xs-12">


        <? $first = true; ?>

        <? foreach ($arResult['ITEMS'] as $key => $arItem): ?>

            <? $type = $first ? 'media-container__item--xl' : '' ?>

            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>

            <a class="<?= $first ? 'media-item__img media-item__img--big' : 'media-container__media-wrapper media-container__media-wrapper--horizontal col-md-6 col-xs-6' ?> "
               id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
               href="<?= $arItem['DETAIL_PAGE_URL'] ?>">


                <div class="<?= $first ? 'media-item__img media-item__img--big' : 'media-item__img' ?> ">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString( "runetsoft.settings", "UF_NO_PHOTO" )) ?>" alt="">
                    <div class="media-item__title media-item__title--sm">
                        <p><?= $arItem['NAME'] ?></p>
                    </div>
                </div>
            </a>
            <? $first = false; ?>
        <? endforeach; ?>
    </div>


