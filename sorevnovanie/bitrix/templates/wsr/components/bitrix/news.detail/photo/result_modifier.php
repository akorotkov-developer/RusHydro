<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
$arResult['GALLERY'] = array();
if(!empty($arResult['PROPERTIES']['FILE']['VALUE'])){
    if($arResult['DETAIL_PICTURE']['ID']) {
        $arResult['GALLERY']['ITEMS'] = array_merge(array($arResult['DETAIL_PICTURE']['ID']), $arResult['PROPERTIES']['FILE']['VALUE']);
        $arResult['GALLERY']['DESCRIPTION'] = array_merge(array($arResult['NAME']), $arResult['PROPERTIES']['FILE']['DESCRIPTION']);
    }else{
        $arResult['GALLERY']['ITEMS'] =  $arResult['PROPERTIES']['FILE']['VALUE'];
        $arResult['GALLERY']['DESCRIPTION'] =  $arResult['PROPERTIES']['FILE']['DESCRIPTION'];
    }
}else{
    $arResult['GALLERY']['ITEMS'] = array($arResult['DETAIL_PICTURE']['ID']);
    $arResult['GALLERY']['DESCRIPTION'] = array($arResult['NAME']);
}

$gallery = array();

foreach ($arResult['GALLERY']['ITEMS'] as &$itemId) {

    $gallery['ITEMS'][] = array(
        "SRC_RESIZE" => GetPathResizeImage($itemId),
        "SRC" => CFile::GetPath($itemId),
    );

}

function GetPathResizeImage($itemId){
    return CFile::ResizeImageGet($itemId, array('width' => 460, 'height' => 340), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
}


$arResult['GALLERY'] = $gallery;



?>