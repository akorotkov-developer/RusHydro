<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Турнирные таблицы VI Всероссийских соревнований оперативного персонала гидроэлектростанций");
?> 
<h3>Турнирная таблица</h3>
 
<h3>Финал</h3>
 
<h3>Регион Юг</h3>
 
<div class="tbl-stages-head"> 	 
  <table> 	<colgroup> 	 	<col width="295"></col> 			 		 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="65"></col> 			 			 	 	<col width="71"></col> 			 			 	 	<col width="67"></col> 		 		 	 </colgroup>		 
    <tbody> 
      <tr> 	 	<td style="text-align: left; background-image: none; border-image: none;">Название команды</td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td>	 <td style="border-image: none;"><a href="/about/stages/stage-second/" title="Производство оперативных переключений" >Этап 2</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-third/" title="Противоаварийная тренировка" >Этап 3</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fifth/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 5</a></td> 	 	<td style="border-image: none;"><a href="/about/stages/stage-six/" title="Проверка умения выявлять отступления от НТД с использованием ПЭВМ и специализированного программного обеспечения" >Этап 6</a></td> 	<td style="border-image: none;">Мандатная комиссия</td> 			 	 	<td style="border-image: none;">Итого</td> 			 	 	<td style="border-image: none;">Место</td>	 	 	 </tr>
     </tbody>
   </table>
 	<i></i> 	<i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "25",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"STAGE_1",1=>"STAGE_2",2=>"STAGE_3",3=>"STAGE_4",4=>"STAGE_5",5=>"STAGE_6",6=>"BONUS_POINTS",7=>"RANG",8=>"COMISSION",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "10",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 
<br />
 
<h3>Регион Центр</h3>
 
<div class="tbl-stages-head"> 
  <table> 	 	<colgroup> 	 	<col width="295"></col> 			 		 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="65"></col> 			 			 	 	<col width="71"></col> 			 			 	 	<col width="67"></col> 		 		 	 </colgroup>		 
    <tbody> 
      <tr> 	 	<td style="text-align: left; background-image: none; border-image: none;">Название команды</td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td>	 <td style="border-image: none;"><a href="/about/stages/stage-second/" title="Производство оперативных переключений" >Этап 2</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-third/" title="Противоаварийная тренировка" >Этап 3</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fifth/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 5</a></td> 	 	<td style="border-image: none;"><a href="/about/stages/stage-six/" title="Проверка умения выявлять отступления от НТД с использованием ПЭВМ и специализированного программного обеспечения" >Этап 6</a></td> 	<td style="border-image: none;">Мандатная комиссия</td> 			 	 	<td style="border-image: none;">Итого</td> 			 	 	<td style="border-image: none;">Место</td>	 	 	 </tr>
     </tbody>
   </table>
 	<i></i> 	<i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "25",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"STAGE_1",1=>"STAGE_2",2=>"STAGE_3",3=>"STAGE_4",4=>"STAGE_5",5=>"STAGE_6",6=>"BONUS_POINTS",7=>"RANG",8=>"COMISSION",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "12",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 
<br />
 
<h3>Регион Восток</h3>
 
<div class="tbl-stages-head"> 
  <table> 	 	<colgroup> 	 	<col width="295"></col> 			 		 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="68"></col> 			 			 	 	<col width="69"></col> 			 			 	 	<col width="65"></col> 			 			 	 	<col width="71"></col> 			 			 	 	<col width="67"></col> 		 		 	 </colgroup>	 
    <tbody> 
      <tr> 	 	<td style="text-align: left; background-image: none; border-image: none;">Название команды</td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td>	 <td style="border-image: none;"><a href="/about/stages/stage-second/" title="Производство оперативных переключений" >Этап 2</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-third/" title="Противоаварийная тренировка" >Этап 3</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> 			 	 	<td style="border-image: none;"><a href="/about/stages/stage-fifth/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 5</a></td> 	 	<td style="border-image: none;"><a href="/about/stages/stage-six/" title="Проверка умения выявлять отступления от НТД с использованием ПЭВМ и специализированного программного обеспечения" >Этап 6</a></td> 	<td style="border-image: none;">Мандатная комиссия</td> 			 	 	<td style="border-image: none;">Итого</td> 			 	 	<td style="border-image: none;">Место</td>	 	 	 </tr>
     </tbody>
   </table>
 	<i></i> 	<i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "25",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"STAGE_1",1=>"STAGE_2",2=>"STAGE_3",3=>"STAGE_4",4=>"STAGE_5",5=>"STAGE_6",6=>"BONUS_POINTS",7=>"RANG",8=>"COMISSION",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "11",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 
<br />
 
<br />
 <a href="/tes/stages/5_games/" class="link-back" style="padding-left:14px;" >Турнирные таблицы V Всероссийских соревнований оперативного персонала гидроэлектростанций</a> 
<div id="dc_vk_code" style="display: none;"></div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>