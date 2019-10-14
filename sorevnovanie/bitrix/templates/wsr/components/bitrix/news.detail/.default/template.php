<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="news-detail">
    <div class="row">

        <? if ($arResult['GALLERY']): ?>
            <div class="col-md-6 pull-right">

                <div class="news-slider">

                    <div class="double-slider-for js-lightgallery">

                        <? foreach ($arResult['GALLERY']['ITEMS'] as $key => $item): ?>

                            <? if ($item['TYPE'] == 'IMAGE'): ?>

                                <div class="double-slider-for__item">
                                    <a class="lightgallery-item" href="<?= $item['SRC'] ?>">
                                        <img src="<?= $item['SRC_RESIZE'] ?>"
                                             alt="<?= $arResult['GALLERY']['DESCRIPTION'][$key] ?>"/>
                                    </a>
                                </div>

                            <? else: ?>
                            
                                <div class="double-slider-for__item">
                                    <div id="video<?= $key ?>" style="display: none">

                                        <video class="lg-video-object vjs-default-skin lg-html5" controls="controls"
                                               preload="none">

                                            <source src="<?= $item['SRC'] ?>" type="video/mp4"/>

                                        </video>

                                    </div>
                                    <div class="lightgallery-item lightgallery-item--video"
                                         data-poster="<?= CFile::GetPath(\COption::GetOptionString("runetsoft.settings", "UF_NO_PHOTO")) ?>"
                                         data-html="#video<?= $key ?>">
                                        <img src="<?= CFile::GetPath(\COption::GetOptionString("runetsoft.settings", "UF_NO_PHOTO")) ?>"
                                             alt="<?= $arResult['PROPERTIES']['FILE']['DESCRIPTION'][$key] ?>"/>
                                    </div>
                                </div>

                            <? endif; ?>


                        <? endforeach; ?>

                    </div>

                    <? if (count($arResult['GALLERY']['ITEMS']) > 1): ?>

                        <div class="double-slider-nav">

                            <? foreach ($arResult['GALLERY']['ITEMS'] as $key => $item): ?>

                                <? if ($item['TYPE'] == 'IMAGE'): ?>

                                    <div class="double-slider-nav__item">
                                        <img src="<?= $item['SRC_RESIZE'] ?>"
                                             alt="<?= $arResult['GALLERY']['DESCRIPTION'][$key] ?>"/>
                                    </div>

                                <? else: ?>

                                    <div class="double-slider-nav__item double-slider-nav__item--video">
                                        <img src="<?= CFile::GetPath(\COption::GetOptionString("runetsoft.settings", "UF_NO_PHOTO")) ?>"
                                             alt="<?= $arResult['PROPERTIES']['FILE']['DESCRIPTION'][$key] ?>"/>
                                    </div>

                                <? endif; ?>

                            <? endforeach; ?>

                        </div>

                    <? endif; ?>

                </div>

            </div>

        <? endif; ?>

        <? if ($arResult['ACTIVE_FROM']): ?>

            <span class="date-label date-label--orange"><?= $arResult['ACTIVE_FROM'] ?></span>

        <? endif; ?>

        <?= $arResult['DETAIL_TEXT'] ?>

    </div>

</div>

