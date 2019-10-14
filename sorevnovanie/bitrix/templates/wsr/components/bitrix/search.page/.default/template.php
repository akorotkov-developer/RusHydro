<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
<div class="search-results__form-container col-md-12">
    <form class="search-results__form col-md-12">
        <input class="search-results__request form-container__input col-md-9" type="text" name="q" value="<?=$arResult['REQUEST']['QUERY'] ?>" placeholder="Введите текст для поиска">
        <button class="search-results__send form-container__button form-container__submit btn btn--danger col-md-2" type="submit" ><?=GetMessage("FIND") ?></button>
    </form>
</div>


<div class="search-results col-md-12">
    <ul class="search-results__list col-md-12">
        <?foreach ($arResult['SEARCH'] as $arItem): ?>
            <li class="search-results__item col-md-12">
                <a class="search-results__link" href="<?=$arItem['URL'] ?>"><?=$arItem['TITLE'] ?></a>
                <p class="search-results__desc"><?=$arResult['PREVIEW_TEXT'][$arItem['ITEM_ID']] ?></p>
                <?=$arItem['CHAIN_PATH'] ?>
            </li>
        <?endforeach; ?>
    </ul>
</div>


<?if(!empty($arResult['REQUEST']['QUERY'] )): ?>
    <div class="search__request-container">

        <?if(empty($arResult['SEARCH'])):?>
            <p><?= GetMessage("NO_FIND") ?></p>
        <?endif; ?>
        <?if($arResult['ERROR_TEXT']): ?>

            <p><?=$arResult['ERROR_TEXT'] ?></p>

        <?endif; ?>
    </div>
<?endif; ?>
<?if($arResult['ERROR_TEXT'] && $arResult['REQUEST']['QUERY'] === ''): ?>

    <p><?=$arResult['ERROR_TEXT'] ?></p>

<?endif; ?>