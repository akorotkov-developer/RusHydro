<div class="m_wrap">
    <?php $itemCount=0; foreach (RhdHandler::getMenu() as $menuCode => $menuData) {++$itemCount; ?>
        <div class="item<?if ($itemCount === 7 && RhdHandler::isMainSite()){?> last-item<?}?><?=($itemCount > 7 ? ' last-item' : '')?><?=RhdHandler::getTopSectionCode() === $menuCode ? ' act' : ''?>">
            <i class="corn"></i>
            <i class="corn r"></i>
            <?=strpos($menuData['name'], 'href') !== false ? html_entity_decode($menuData['name']) : '<a href="'.(isset($menuData['isUrl']) && $menuData['isUrl'] ? $menuData['code'] : RhdHandler::getSiteRoot().$menuCode.'/').'" class="m_link" ' . ($menuData['blank'] ? ' target="_blank" ' : '') . '>'.$menuData['name'].'</a>' ?>
            <?php if ($menuData['children']) { ?>
                <div class="sub_menu">
                    <div class="sub_shw_r">
                        <div class="sub_wrap">
                            <?php $isExtended = $menuCode === 'press'; ?>
                            <?php/* if (
										  !RhdHandler::isEnglish()
										  && $menuCode === 'press'
										  && !isset($menuData['children']['vestnik'])
										  && RhdHandler::getSiteCode() !== 'sshges'
										  && !isset($menuData['children']['news-materials']['children']['vestnik'])) {
										$menuData['children'] =
											array_merge(
												array_slice($menuData['children'], 0, 1),
												array('vestnik' => array('name' => 'Вестник Русгидро', 'children' => array())),
												array_slice($menuData['children'], 1)
											);
								}*/ ?>
                            <table cellspacing="0" cellpadding="0">
                                <tr>
                                    <?php if ($isExtended && RhdHandler::isMainSite() && !RhdHandler::isEnglish()) { ?>
                                        <td style="border-right:1px solid #d7d7d7;">
                                            <?$APPLICATION->IncludeComponent("bitrix:news.list", "link_press", array(
                                                "IBLOCK_TYPE" => "content",
                                                "IBLOCK_ID" => 118,
                                                "NEWS_COUNT" => 4,
                                                "SORT_BY1" => "SORT",
                                                "SORT_ORDER1" => "DESC",
                                                "SORT_BY2" => "ACTIVE_FROM",
                                                "SORT_ORDER2" => "DESC",
                                                "FILTER_NAME" => "",
                                                "FIELD_CODE" => array(
                                                    0 => "",
                                                    1 => "",
                                                ),
                                                "PROPERTY_CODE" => array(
                                                    0 => "LINK",
                                                    1 => "",
                                                ),
                                                "CHECK_DATES" => "Y",
                                                "DETAIL_URL" => "",
                                                "AJAX_MODE" => "N",
                                                "AJAX_OPTION_SHADOW" => "Y",
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
                                                "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                                                "ADD_SECTIONS_CHAIN" => "Y",
                                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                                "PARENT_SECTION" => "",
                                                "PARENT_SECTION_CODE" => "",
                                                "DISPLAY_TOP_PAGER" => "N",
                                                "DISPLAY_BOTTOM_PAGER" => "N",
                                                "PAGER_TITLE" => "",
                                                "PAGER_SHOW_ALWAYS" => "N",
                                                "PAGER_TEMPLATE" => "",
                                                "PAGER_DESC_NUMBERING" => "N",
                                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                                "PAGER_SHOW_ALL" => "N",
                                                "DISPLAY_DATE" => "N",
                                                "DISPLAY_NAME" => "Y",
                                                "DISPLAY_PICTURE" => "Y",
                                                "DISPLAY_PREVIEW_TEXT" => "Y",
                                                "AJAX_OPTION_ADDITIONAL" => ""
                                            ),
                                                false
                                            );?>
                                        </td>
                                    <?php } ?>
                                    <td<?php if ($isExtended && RhdHandler::isMainSite() && !RhdHandler::isEnglish()) { ?> style="padding-left:20px;"<?}?>>
                                        <div class="s_sub_wrap">
                                            <?php foreach ($menuData['children'] as $submenuCode => $submenuData) { ?>
                                                <?php $submenuActive = (RhdHandler::getTopSectionCode() === $menuCode) && (RhdHandler::getSecondSectionCode() === $submenuCode); ?>
                                                <div class="s_sub_menu<?php if ($isExtended && !$submenuData['children'] && !RhdHandler::isEnglish()) { ?> sub_pad<? } ?><?php if($submenuData['children']) { echo ' sub_link_parent'; } ?>">
                                                    <?=strpos($submenuData['name'], 'href') !== false ? html_entity_decode($submenuData['name']) : '<a class="sub_link" href="'.RhdHandler::getSiteRoot().$menuCode.'/'.$submenuCode.'/">'.$submenuData['name'].'</a>' ?>
                                                    <?php if ($submenuData['children']) { ?>
                                                        <div class="menu_lvl_last">
                                                            <div class="menu_lvl_last_wrap">
                                                                <?php foreach ($submenuData['children'] as $thirdmenuCode => $thirdmenuData) { ?>
                                                                    <?=strpos($thirdmenuData['name'], 'href') !== false ? html_entity_decode($thirdmenuData['name']) : '<a href="'.RhdHandler::getSiteRoot().$menuCode.'/'.$submenuCode.'/'.$thirdmenuCode.'/">'.$thirdmenuData['name'].'</a>' ?>
                                                                <?php } ?>
                                                                <?php if (RhdHandler::getSiteCode() === 'sshges' && $menuCode === 'press' && $submenuCode === 'video') { ?>
                                                                    <a href="<?=RhdHandler::getSiteRoot().$menuCode.'/'.$submenuCode.'/videoarchive/'?>">Видеожурналы</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!RhdHandler::isEnglish()) { ?>
        <?if(!RhdHandler::isFilial()){?>
            <div class="item nomargin">
                <i class="corn"></i>
                <i class="corn r"></i>
                <a href="#" class="m_link">Филиалы и по</a>
                <div class="sub_menu wide-sub_menu">
                    <div class="sub_shw_r">
                        <div class="sub_wrap">
                            <div class="filial-menu-list">
                                <div class="filial-menu-list_left">
                                    <div class="filial-menu-list_title">Филиалы</div>
                                    <div class="filial-menu-list_item"><a href="http://www.burges.rushydro.ru/" >Бурейская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.volges.rushydro.ru/" >Волжская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.votges.rushydro.ru/" >Воткинская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.dagestan.rushydro.ru/" >Дагестанский филиал</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.zhiges.rushydro.ru/" >Жигулевская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.zagaes.rushydro.ru/" >Загорская ГАЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.zges.rushydro.ru/" >Зейская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.kbf.rushydro.ru/" >Кабардино-Балкарский филиал</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.kamges.rushydro.ru/" >Камская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.kchf.rushydro.ru/" >Карачаево-Черкесский филиал</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.kvvges.rushydro.ru/" >Каскад Верхневолжских ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.kkges.rushydro.ru/" >Каскад Кубанских ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.korung.rushydro.ru/" >Корпоративный университет гидроэнергетики</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.nizhges.rushydro.ru/" >Нижегородская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.nges.rushydro.ru/" >Новосибирская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.sarges.rushydro.ru/" >Саратовская ГЭС</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.sshges.rushydro.ru/" >Саяно-Шушенская ГЭС им. П.С.Непорожнего</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.osetia.rushydro.ru/" >Северо-Осетинский филиал</a></div>
                                    <div class="filial-menu-list_item"><a href="http://www.cheges.rushydro.ru/" >Чебоксарская ГЭС</a></div>

                                </div>
                                <div class="filial-menu-list_right">
                                    <div class="filial-menu-list_title">Дочерние общества</div>
                                    <div class="filial-menu-list_col">
                                        <div class="filial-menu-list_item"><a href="http://www.vb-mges.rushydro.ru/">ООО «Верхнебалкарская МГЭС»</a></div>
                                        <div class="filial-menu-list_item"><a href="http://www.vniig.rushydro.ru/">АО «ВНИИГ им. Б.Е.Веденеева»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.geotherm.rushydro.ru/">АО «Геотерм»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.hydroinvest.rushydro.ru/">АО «Гидроинвест»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.gis.rushydro.ru/" >АО «ГидроИнжиниринг Сибирь»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.hvkk.rushydro.ru/">АО «Гидроремонт-ВКК»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.fewind.rushydro.ru/">АО «Дальневосточная ВЭС»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.dvgk.ru" target="_blank">АО «ДГК»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.drsk.ru" target="_blank">АО «ДРСК»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.dvec.ru" target="_blank">ПАО «ДЭК»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.zagaes2.rushydro.ru/">АО «Загорская ГАЭС-2»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.zaramag.rushydro.ru/">АО «Зарамагские ГЭС»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.reec.rushydro.ru/" >АО «Инженерный центр возобновляемой энергетики»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.mhp.rushydro.ru/">АО «Институт Гидропроект»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.international.rushydro.ru/rus/" >РусГидро Интернэшнл</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.kamgek.ru/index.php?cominfo" target="_blank">ПАО «Камчатский газоэнергетический комплекс»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.kamenergo.ru" target="_blank">ПАО «Камчатскэнерго»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.kchggk.rushydro.ru/" >АО «Карачаево-Черкесская ГГК»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.krsk-sbit.ru/" target="_blank">ПАО «Красноярскэнергосбыт»</a> </div><div class="filial-menu-list_item"><a href="http://www.kolymaenergo.rushydro.ru/">ПАО «Колымаэнерго»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.lengaes.rushydro.ru/">АО «Ленинградская ГАЭС»</a> </div><div class="filial-menu-list_item"><a href="http://www.lhp.rushydro.ru/">АО «Ленгидропроект»</a> </div></div>
                                    <div class="filial-menu-list_col">



                                        <div class="filial-menu-list_item"><a href="http://www.magadanenergo.ru" target="_blank">ПАО «Магаданэнерго»</a></div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.mges-altai.rushydro.ru/" >АО «Малые ГЭС Алтая»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.mges-stavr.rushydro.ru/">ООО «Малые ГЭС Ставрополья и КЧР»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.mges-kbr.rushydro.ru/">АО «МГЭС КБР»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.mek.am/" target="_blank">ЗАО «Международная Энергетическая Корпорация»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.hydroproject.rushydro.ru/">АО «Мособлгидропроект»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.nbges.rushydro.ru/">АО «Нижне-Бурейская ГЭС»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.nzges.rushydro.ru/">АО «Нижне-Зейская ГЭС»</a></div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.niies.rushydro.ru/">АО «НИИЭС»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.vmgeopp.rushydro.ru/">АО «ОП Верхне-Мутновская ГеоЭС»</a> </div>-->
                                         <!--<div class="filial-menu-list_item"><a href="http://www.pauzhet.rushydro.ru/">АО «Паужетская ГеоЭС»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://передвижная-энергетика.рф" target="_blank">ПАО «Передвижная энергетика»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.rao-esv.ru/" target="_blank">АО «РАО Энергетические системы Востока»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.rgits.rushydro.ru/">ООО «РусГидро ИТ сервис»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.resk.ru/" target="_blank">ПАО «Рязанская энергетическая сбытовая компания»</a> </div>

                                        <div class="filial-menu-list_item"><a href="http://sgres2.ru/" target="_blank">АО «Сахалинская ГРЭС-2»</a> </div><div class="filial-menu-list_item"><a href="http://www.sakh.rao-esv.ru/" target="_blank">ПАО «Сахалинэнерго»</a> </div></div>
                                    <div class="filial-menu-list_col">


                                        <div class="filial-menu-list_item"><a href="http://snrg.rushydro.ru/" target="_blank">ООО «СервисНедвижимость РусГидро»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.sulak.rushydro.ru/">АО «Сулакский ГидроКаскад»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.tk.rushydro.ru/">АО «Транспортная компания РусГидро»</a></div>
                                        <div class="filial-menu-list_item"><a href="http://tec-sovgavan.ru/" target="_blank">АО «ТЭЦ в г. Советская Гавань»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.mc.rushydro.ru/">АО «УК ГидроОГК»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.usgesstroy.rushydro.ru/">АО «Усть-СреднеканГЭСстрой»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.usges.rushydro.ru/">АО «Усть-Среднеканская ГЭС им. А.Ф. Дьякова»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.cso-sges.rushydro.ru/">АО «ЦСО СШГЭС»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.chges.ru/" target="_blank">АО «ЧиркейГЭСстрой»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.ch-sk.ru/" target="_blank">АО «Чувашская энергосбытовая компания»</a> </div>
                                        <div class="filial-menu-list_item"><a href="http://www.chukotenergo.ru/" target="_blank">АО «Чукотэнерго»</a> </div>
                                         <!--<div class="filial-menu-list_item"><a href="http://www.enecs.rushydro.ru/">ООО «ЭнергоКонсалтингСервис»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="https://esc-rushydro.ru/">АО «ЭСК РусГидро»</a> </div>
                                        <!--<div class="filial-menu-list_item"><a href="http://www.esko-ees.rushydro.ru/" >АО «ЭСКО ЕЭС»</a> </div>-->
                                        <!--<div class="filial-menu-list_item"><a href="http://www.yakutia.rushydro.ru/">АО «Южно-Якутский ГЭК»</a> </div>-->
                                        <div class="filial-menu-list_item"><a href="http://www.yakutskenergo.ru" target="_blank">ПАО «Якутскэнерго»</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?}?>
    <?}?>








    <div class="clear"></div>
</div>