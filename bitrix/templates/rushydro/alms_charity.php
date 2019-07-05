<?php
    // выборка только активных разделов из инфоблока $IBLOCK_ID, в которых есть элементы
    // со значением свойства SRC, начинающееся с https://
    $arFilter = Array('IBLOCK_ID'=>53, "=SECTION_ID"=>"12551");
    $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);

    $arItems = array();
    while($ar_result = $db_list->GetNext())
    {
        $arItems[] = $ar_result;
    }

    //Изменение размеров изображения
    foreach ($arItems as $key => $item) {
        $arFileTmp = CFile::ResizeImageGet(
            $item["PICTURE"],
            array("width" => 186, "height" => 186),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );

        $arItems[$key]["PREV_PICTURE"]["SRC"] = $arFileTmp["src"];
    }
    ?>
    <div class="volunteer_items">
        <?
        foreach ($arItems as $item) {
            ?>
            <div class="volunteer">
                <a href="<?=$item['CODE']?>">
                    <img src="<?=$item["PREV_PICTURE"]["SRC"]?>"  />
                    <p><?=$item["NAME"]?></p>
                </a>
            </div>
            <?
        }
        ?>
    </div>

<style>

    /*
        Галерея на странице волонтерство
    */
    .volunteer_items {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        align-content: flex-end;
    }

    div.volunteer {
        width: 30%;
        margin: 1.66%;
        padding-bottom: 30px;
    }

    div.volunteer img {
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
    }
    div.volunteer p {
        font-weight: bold;
        font-size: 14px;
    }
</style>
