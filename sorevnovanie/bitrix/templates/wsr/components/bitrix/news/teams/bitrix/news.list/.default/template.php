<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();; ?>

<?$voting = $arResult['VOTING'] ?>

<ul class="fans-card__list col-md-12" data-pager-id="<?=$arResult['NAV_RESULT']->NavNum?>">
    <? $ids = array(); ?>
    <? foreach ($arResult['ITEMS'] as $arItem): ?>
        <? $ids[] = $arItem['ID'] ?>
        <li class="fans-card__item col-md-4 col-sm-6 col-xs-12" id="<?= $arItem['ID'] ?>">

            <a class="fans-card__wrapper" href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
               style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ? $arItem['PREVIEW_PICTURE']['SRC'] : CFile::GetPath(\COption::GetOptionString("runetsoft.settings", "UF_NO_PHOTO")) ?>)">
                <p class="fans-card__title"><?= $arItem['NAME'] ?></p>
                <p class="fans-card__factory"><?= $arItem['PROPERTIES']['ORGANIZATION']['VALUE'] ?> </p>
            </a>
            <div class="fans-card__system-text">

                <?if($voting): ?>
                    <p class="fans-card__likes-text" data-toggle="modal" data-target="#modalVote"><?= GetMessage("ADD") ?></p>
                <?else:?>
                    <p class="fans-card-text"><?= GetMessage("RESULT") ?></p>
                <?endif;?>

                <p class="fans-card__likes-count"><?= $arResult['VOTE'][$arItem['ID']] ? $arResult['VOTE'][$arItem['ID']] : '0' ?></p>
            </div>
        </li>
    <? endforeach; ?>
</ul>
<?=$arResult["NAV_STRING"]?>

<?if($voting): ?>
<div class="modal fade" id="modalVote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><?= GetMessage("VOTING") ?></h4>
            </div>
            <form id="vote" method="post" name="form" action="/vote/add-ws.php">
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <input type="hidden" id="name" name="id" value="">
                    <input type="hidden" name="addVote" value="true">
                    <div class="g-recaptcha col-lg-offset-3"
                         data-sitekey="6Le4_nMUAAAAAG_oXVd6pXUOyMpr2zPm0PCGkVqz"></div>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" id="send" class="btn btn-default"><?= GetMessage("SEND") ?></button>
            </div>
            </form>
        </div>
    </div>
</div>
<?endif; ?>

