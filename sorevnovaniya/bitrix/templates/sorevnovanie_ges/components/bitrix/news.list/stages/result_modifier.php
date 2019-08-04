<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["ITEMS"]) {
    foreach($arResult["ITEMS"] as $key => &$arItem) {
        foreach($arItem["DISPLAY_PROPERTIES"] as $pkey => &$pItem) {
            if (strpos($pkey, "STAGE_") !== false) {
                $pItem["VALUE"] = str_replace(',', '.', $pItem["VALUE"]);
            }
        }
    }
}
