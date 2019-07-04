<?php
function printPre($data) {
    if ($_COOKIE["dev"] == "Y") {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

if (!RhdHandler::isEnglish()){
    $IBLOCK_ID = 53;
    $SECTION_ID = 4315;
} else {
    $IBLOCK_ID = 111;
    $SECTION_ID = 7471;
}

    $arSelect = array(
        "ID", "NAME", "ACTIVE_FROM", "PROPERTY_SLIDE", "PROPERTY_SLIDER_TEXT", "PROPERTY_SLIDE_PHOTO", "PROPERTY_IS_PHOTO","PROPERTY_MAIN_SLIDER");
    $arFilter = array(
        "IBLOCK_ID" => $IBLOCK_ID,
        "ACTIVE" => "Y",
        "SECTION_ID" => $SECTION_ID,
        array(
            "LOGIC" => "OR",
            array("!PROPERTY_SLIDE" => false),
            array("!PROPERTY_SLIDE_PHOTO" => false)
        ),
    );
    if($IBLOCK_ID == 53):
        $res = CIBlockElement::GetList(array("ACTIVE_FROM" => "DESC"), $arFilter + array("PROPERTY_MAIN_SLIDER_VALUE" => "1"), false, array("nPageSize" => 1), $arSelect);
        while ($ob = $res->Fetch()) {
            $arLastSlide[] = $ob;
        }
        if(!$arLastSlide[0]["PROPERTY_MAIN_SLIDER_VALUE"]){
            unset($arLastSlide);
        }
    endif;


    $res = CIBlockElement::GetList(array("ACTIVE_FROM" => "DESC"), $arFilter, false, array("nPageSize" => 10 -count($arLastSlide) ), $arSelect);
    while ($ob = $res->Fetch()) {
        $arSlide[] = $ob;
    }
    if(count($arLastSlide)){
        $arSlide[] = end($arLastSlide);
    }


    foreach ($arSlide as $key => &$value) {
        if ($value["PROPERTY_SLIDE_VALUE"]) {
            $arSelect = array("PROPERTY_IMAGES");
            $arFilter = array("IBLOCK_ID" => 139, "ACTIVE" => "Y", "ID" => $value["PROPERTY_SLIDE_VALUE"]);
            $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
            if ($ob = $res->Fetch()) {
                $value["SLIDE_PATH"] = CFile::GetPath($ob["PROPERTY_IMAGES_VALUE"]);
            }
        } else {

            $value["SLIDE_PATH"] = CFile::GetPath($value["PROPERTY_SLIDE_PHOTO_VALUE"]);
        }
    }
    $arResult["NEWS_SLIDER"] = $arSlide;

?>
