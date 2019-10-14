<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (empty($arResult)) return false; ?>

    <nav class="footer__navigation">
        <ul class="footer__navigation-list">
            <li class="footer__navigation-item">
                <span class="footer__title"><?=GetMessage("LINK") ?></span>
            </li>
            <? foreach ($arResult as $arItem): ?>
                <li class="footer__navigation-item">
                    <a class="footer__navigation-link" href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a>
                </li>
            <? endforeach; ?>
        </ul>
    </nav>
