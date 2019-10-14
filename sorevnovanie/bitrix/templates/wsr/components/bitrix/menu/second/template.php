<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();   ?>

<? if (empty($arResult)) return false; ?>


<div class="about-champ col-md-12">
    <ul class="about-champ__list col-md-12">
        <?foreach ($arResult as $arItem): ?>
            <li class="about-champ__tag">
                <a class="about-champ__link <?=$arItem['SELECTED'] ? 'about-champ__link--active' : '' ?>" href="<?=$arItem['LINK'] ?>"><?=$arItem['TEXT'] ?></a>
            </li>
        <?endforeach; ?>
    </ul>
</div>