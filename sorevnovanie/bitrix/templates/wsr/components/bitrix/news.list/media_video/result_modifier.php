<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$countPhoto = \CIBlockElement::GetList(array(),array("IBLOCK_CODE"=>'photo',"ACTIVE"=>"Y"))->SelectedRowsCount();
if($countPhoto>0){
    $arResult['PHOTO'] = true;
}
?>
