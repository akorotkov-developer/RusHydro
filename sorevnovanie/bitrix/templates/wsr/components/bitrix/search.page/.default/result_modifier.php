<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?foreach ($arResult['SEARCH'] as $arItem): ?>

    <? $arItems[$arItem['IBLOCK_ID']] = $arItem['ID']  ?>

<?endforeach; ?>

<?foreach ($arItems as $key=> $arItem){

    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID"=>$key);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
    while($arElement = $res->GetNext())
    {
        $arResult['PREVIEW_TEXT'][$arElement['ID']] = $arElement['PREVIEW_TEXT'] ;
    }
}


if(!empty($arResult['PREVIEW_TEXT'])){

    $cp = $this->__component;

    if(is_object($cp)){
        $cp->arResult['PREVIEW_TEXT'] = $arResult['PREVIEW_TEXT'];
        $cp->setResultCacheKeys(array('PREVIEW_TEXT'));
    }
}
?>
