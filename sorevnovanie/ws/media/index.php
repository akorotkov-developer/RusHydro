<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Медиа");
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photo",
	array(
		"COMPONENT_TEMPLATE" => "photo",
		"IBLOCK_TYPE" => "media",
		"IBLOCK_ID" => "36",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "FILE",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Фото",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>

<div class="video-content">
	<?
    \CModule::IncludeModule('iblock');

    $rs = CIBlockElement::GetList(
        array("SORT"=>"ASC"), //Сортировка
        array("IBLOCK_ID" => 35, "ACTIVE" => "Y"), //Фильтр значению полей
        false, //Массив полей группировка
        false, //Параметр для постраничной навигации
        array("ACTIVE_FROM") //Массив возвращаемых полей
    );

    $arRes = array();
    while($ar = $rs->GetNext()) {
        $date = new DateTime($ar["ACTIVE_FROM"]);
        $tempDate = $date->format("Y");
        $arRes[] = $tempDate;
    }

    $arRes = array_unique($arRes);

    if ($_GET["videoYear"]) {
        if ($_GET["videoYear"] != 'all') {
            $yearStart = (int)$_GET["videoYear"];
            $yearEnd = (int)$_GET["videoYear"] + 1;
            $filter_ex = array(">=DATE_ACTIVE_FROM" => "01.01." . $yearStart, '<=DATE_ACTIVE_FROM' => "01.01." . $yearEnd);
        }
    }
    ?>
    <select name="video_years">
        <option disabled selected>Выберите год</option>
        <?
        $page = $APPLICATION->GetCurPageParam("videoYear=all", array("videoYear"));
        if ($_GET["videoYear"] == "all") {
            $selected = "selected";
        }
        ?>
        <option value="all" data-href="<?=$page?>" <?=$selected?>>Все года</option>
        <?
        foreach ($arRes as $item) {
            $page = $APPLICATION->GetCurPageParam("videoYear=" . $item, array("videoYear"));
            if ($_GET["videoYear"] == $item) {$selected = "selected";} else {$selected = "";}
            ?>
            <option value="<?=$item?>" data-href="<?=$page?>" <?=$selected?>><?=$item?></option>
            <?
        }
        ?>
    </select>

	<script>
		$( "select[name=video_years]" ).change(function() {
			var url = $('select[name=video_years] option[value="' + $(this).val() + '"]').attr('data-href');
			$(location).attr('href',url);
		});
		<?
		if ($_GET["videoYear"]) {
		?>
			$( document ).ready(function() {
				function scroll() {
					var scrollTop = $('select[name=video_years]').offset().top;

					// скроллим страницу на значение равное позиции элемента
					$(document).scrollTop(scrollTop - 200);
				}

				setTimeout(scroll, 100);
			});
		<?
		}
		?>
	</script>

	<? $APPLICATION->IncludeComponent("bitrix:news.list", "video", array(
		"IBLOCK_TYPE" => "-",
		"IBLOCK_ID" => "35",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "NAME",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "filter_ex",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "FILE",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Видео",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
		),
		false
	);?>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>