<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Архив Хода соревнований ТЭС 2017");
?> 
<br />
 
<div> 
  <br />
 
  <div class="tbl-stages-head"> 
    <table width="100%"> <colgroup> <col width="220"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="69"></col> <col width="75"></col> <col width="69"></col> </colgroup> 
      <tbody> 
        <tr> <td style="text-align: left; border-image: initial; background-image: none;" align="center">Название команды</td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-second/" title="Проверка уровня подготовки персонала котельного и турбинного цехов" >Этап 2</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-third/" title="Управление электротехническим оборудованием" >Этап 3</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-fourth/" title="Ведение водно-химического режима" >Этап 4</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-fifth/" title="Эксплуатация систем автоматического управления и контроля" >Этап 5</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-six/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 6</a></td> <td style="border-image: initial;"><a href="/tes/about/stages/stage-seven/" title="Оказание доврачебной помощи пострадавшему" >Этап 7</a></td> <td style="border-image: initial;" align="center">Мандатная комиссия</td> <td style="border-image: initial;" align="center">Итого</td> <td style="border-image: initial;" align="center">Место</td> </tr>
       </tbody>
     </table>
   <i></i> <i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "26",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("STAGE_1","STAGE_2","STAGE_3","STAGE_4","STAGE_5","STAGE_6","STAGE_7","BONUS_POINTS","RANG","COMISSION"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "32",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
  <br />
 
  <br />
 
  <div id="dc_vk_code" style="display: none;"></div>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>