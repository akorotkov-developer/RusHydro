<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<? if ($arResult['NavPageCount'] > $arResult['NavPageNomer']): ?>
    <div class="col-md-offset-6 loader_show_more" style="display:none">
        <div class="loader"></div>
    </div>

    <div class="news-more show_more" data-navNum="<?=$arResult['NavNum'] ?>" data-max-page="<?= $arResult['NavPageCount'] ?>"
               data-next-page="<?= $arResult['NavPageNomer'] + 1 ?>">
        <div class="col-12"><?= GetMessage("SHOW_MORE") ?> <?= strtolower($arResult['NavTitle']) ?></div>
    </div>
    <div class="news-more error" style="display:none">
        <div class="col-12"><?=GetMessage("ERROR") ?></div>
    </div>

<? endif; ?>

