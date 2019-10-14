<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

    <table class="table-doc" cellspacing="0" cellpadding="0">
        <tbody>
        <? foreach ($arResult['ITEMS'] as $arItem): ?>
         <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

            <tr id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <td class="image">
                    <img alt="icon" src="<?= SITE_TEMPLATE_PATH ?>/images/icons/icon_pdf.gif">
                </td>
                <td class="name">
                    <div>
                        <a href="<?= CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE']) ?>"
                           target="_blank"><?= $arItem['NAME'] ?></a>
                    </div>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
