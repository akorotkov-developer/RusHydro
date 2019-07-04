<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true ) {
	die();
} ?>

<div id="banners" class="newdesign newdesign1">

    <i></i>
	<? $i = 0; ?>

    <div id="b_nav">
		<? foreach ( $arResult["ITEMS"] as $arItem ): $i ++; ?>
            <a href="" <? if ($i == 1){ ?>class="act"<? } ?>><?= $i; ?></a>
		<? endforeach; ?>
    </div>

	<? $j = 0; ?>

	<? foreach ( $arResult["ITEMS"] as $arItem ): $j ++; ?>
        <div id="slide<?= $arItem['ID'] ?>" class="slide<? if ( $j == 1 ) { ?> act<? } ?>" style="background-image: url(<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>); <? if ( $j == 1 ) { ?><? } ?>">
			<? if ( ! isset($arItem["PROPERTY_IS_PHOTO_VALUE"]) ) : ?>
                <div class="text">
                    <div class="date"><span><?= FormatDate("j F Y", MakeTimeStamp($arItem["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS")); ?></span></div>
                    <div class="title">
                        <a href="<?= $arItem['PROPERTIES']['HREF']['VALUE'] ?>">
							<?= $arItem["NAME"] ?>
                        </a>
                    </div>
                </div>
			<? endif; ?>
        </div>
	<? endforeach; ?>

</div>