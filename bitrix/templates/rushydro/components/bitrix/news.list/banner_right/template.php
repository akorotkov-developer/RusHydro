<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult["ITEMS"])) { ?>
    <div class="ban_rht">
        <i></i><i class="r"></i>
        <div class="ban_rht_wrap">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <? if ($arItem['PROPERTIES']['IFRAME']['VALUE'] && strtotime(date('d.m.Y H:i:s')) >= strtotime($arItem['PROPERTIES']['IFRAME_DATE_START']['VALUE'])): ?>

                    <div class="ban_rht_item">
                        <iframe src="<?= $arItem['PROPERTIES']['IFRAME']['VALUE'] ?>" width="325" height="160"
                                frameborder="0" marginheight="0" marginwidth="0" scrolling="no"
                                allowtransparency="" allowfullscreen="true"></iframe>
                    </div>


                <? else: ?>
                    <div class="ban_rht_item">
                        <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                            <?php if ($arItem['PREVIEW_TEXT']): ?><a href="<?php echo $arItem['PREVIEW_TEXT']; ?>"><?php endif; ?>
                            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                 width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                 height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["NAME"] ?>"/>
                            <?php if ($arItem['PREVIEW_TEXT']): ?></a><?php endif; ?>
                        <? endif ?>
                    </div>
                <? endif; ?>
            <? endforeach; ?>
        </div>
    </div>
<? } ?>