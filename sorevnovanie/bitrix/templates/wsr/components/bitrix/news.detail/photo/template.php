<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();   ?>

    <div class="media-item">
        <div class="row js-lightgallery">
            <?foreach ($arResult['GALLERY']['ITEMS'] as $key=>$file): ?>
                <div class="col-md-4">
                    <a class="media-item__sm lightgallery-item" href="<?=$file['SRC']?>">
                        <div class="media-item__img">
                            <img src="<?=$file['SRC_RESIZE']?>" alt="<?=$arResult['GALLERY']['DESCRIPTION'][$key] ?>"/>
                        </div>
                    </a>
                </div>
            <?endforeach;?>
        </div>
        <div class="row">
            <div class="col-md-12 media-item__back"><a class="back-label" href="<?=$arResult['LIST_PAGE_URL'] ?>"><?=GetMessage('GO_BACK')?></a></div>
        </div>
    </div>

