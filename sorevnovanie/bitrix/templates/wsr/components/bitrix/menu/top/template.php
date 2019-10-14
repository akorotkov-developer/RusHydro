<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (empty($arResult)) return false; ?>
    <div class="header__bottom">
        <div class="container">
            <nav class="navigation">
                <ul class="navigation__list">

                    <?
                    $previousLevel = 0;
                    foreach ($arResult

                    as $arItem): ?>

                    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                    <? endif ?>

                    <? if ($arItem["IS_PARENT"]): ?>

                    <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <li class="navigation__item">
                        <div class="dropdown">
                        <a  href="<?= $arItem["LINK"] ?>"

                            class="navigation__link navigation__link<?=$arItem["SELECTED"] ? '--active' : '' ?> navigation__link--dropdown dropdown-toggle dropbtn"><?= $arItem["TEXT"] ?></a>

                        <ul class="dropdown-content navigation__submenu">
                            <? else: ?>
                            <li class="navigation__subitem">
                                <a href="<?= $arItem["LINK"] ?>"  class="navigation__link <?=$arItem['SELECTED'] ? 'navigation__sublink--active' : ''?>" ><?= $arItem["TEXT"] ?></a>
                                <ul>
                                    <? endif ?>

                                    <? else:?>

                                        <? if ($arItem["DEPTH_LEVEL"] == 1):?>
                                            <li class="navigation__item">
                                                <a href="<?=$arItem['LINK']?>"
                                                   class="navigation__link dropdown-toggle <?=$arItem['SELECTED'] ? 'navigation__link--active' : ''?>"
                                                   title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
                                            </li>
                                        <? else:?>
                                            <li class="navigation__subitem"><a href="<?=$arItem['LINK']?>" class="navigation__sublink dropdown-toggle <?=$arItem['SELECTED'] ? 'navigation__sublink--active' : ''?>"
                                                   title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a>
                                            </li>
                                        <? endif ?>

                                    <? endif ?>

                                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                                    <? endforeach ?>

                                    <? if ($previousLevel > 1)://close last item tags?>
                                        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                                    <? endif ?>


                                </ul>
                        </div>
            </nav>
        </div>
    </div>



