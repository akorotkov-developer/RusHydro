<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?

if(!empty($arResult['PROPERTIES']['FILE']['VALUE']) || !empty($arResult['DETAIL_PICTURE']['SRC'])) {

    $arResult['GALLERY'] = array();

    if (!empty($arResult['PROPERTIES']['FILE']['VALUE'])) {
        if($arResult['DETAIL_PICTURE']['ID']) {
            $arResult['GALLERY']['ITEMS'] = array_merge(array($arResult['DETAIL_PICTURE']['ID']), $arResult['PROPERTIES']['FILE']['VALUE']);
            $arResult['GALLERY']['DESCRIPTION'] = array_merge(array($arResult['NAME']), $arResult['PROPERTIES']['FILE']['DESCRIPTION']);
        }else{
            $arResult['GALLERY']['ITEMS'] = $arResult['PROPERTIES']['FILE']['VALUE'];
            $arResult['GALLERY']['DESCRIPTION'] = $arResult['PROPERTIES']['FILE']['DESCRIPTION'];
        }
    } else {
        $arResult['GALLERY']['ITEMS'] = array($arResult['DETAIL_PICTURE']['ID']);
        $arResult['GALLERY']['DESCRIPTION'] = array($arResult['NAME']);
    }

    $gallery = array();

    foreach ($arResult['GALLERY']['ITEMS'] as &$itemId) {

        $type = GetTypeById($itemId);

        $gallery['ITEMS'][] = array(
            "TYPE" => $type,
            "SRC_RESIZE" => GetPathResizeImage($itemId),
            "SRC" => CFile::GetPath($itemId),
        );

    }

    $arResult['GALLERY'] = $gallery;


}


function GetTypeById($itemId){
    if (CFile::IsImage(CFile::MakeFileArray($itemId)['name'])) {
        return "IMAGE";
    } else {
        return "VIDEO";
    }
}

function GetPathResizeImage($itemId){
    return CFile::ResizeImageGet($itemId, array('width' => 460, 'height' => 340), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
}

?>

