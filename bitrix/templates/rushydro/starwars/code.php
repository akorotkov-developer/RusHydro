	<?php
		if ( RhdHandler::isMainSite() && !RhdHandler::isEnglish() && RhdHandler::isAtRoot() && !$_COOKIE["showed-starWars"] && date('dm') == '0104' ) { 
	?>
		<!--[if gt IE 7]><!-->
			<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.easing.1.3.js"></script>
			<script src="<?=SITE_TEMPLATE_PATH?>/starwars/soundmanager2-nodebug-jsmin.js?2"></script>
			<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cookie.js"></script>
			<script>
				var homeDirSW =  "<?=SITE_TEMPLATE_PATH?>/starwars/";
				var isMobile =  <?php echo json_encode(IS_MOBILE); ?>;
			</script>
			<script src="<?=SITE_TEMPLATE_PATH?>/starwars/starWars.js?3"></script>
			<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/starwars/starwars.css" />
			<div class="b-overlay_starwars"></div>
			<div class="b-logo_rushydro__wrap">
				<div class="b-logo_rushydro"></div>
			</div>
			<div class="b-banner_starwars__wrap">
				<div class="b-banner_starwars__close"></div>
				<div class="b-banner_starwars__volume"></div>
				<div class="b-banner_starwars__news-wrap">
					<div class="b-banner_starwars__news b-banner_starwars__news-begin">
						<?php $APPLICATION->IncludeComponent("bitrix:news.list", "starwars", array(
							"IBLOCK_TYPE" => "site",
							"IBLOCK_ID" => "53",
							'PARENT_SECTION' => '4315',
							"NEWS_COUNT" => "30",
							"SORT_BY1" => "ACTIVE_FROM",
							"SORT_ORDER1" => "DESC",
							"SORT_BY2" => "SORT",
							"SORT_ORDER2" => "ASC",
							"FILTER_NAME" => "",
							"FIELD_CODE" => array(
								"NAME",
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
							"CACHE_GROUPS" => "N",
							"PREVIEW_TRUNCATE_LEN" => "",
							"ACTIVE_DATE_FORMAT" => "d.m",
							"SET_TITLE" => "N",
							"SET_STATUS_404" => "N",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"ADD_SECTIONS_CHAIN" => "N",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"DISPLAY_TOP_PAGER" => "N",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"PAGER_TITLE" => "Новости",
							"PAGER_SHOW_ALWAYS" => "N",
							"PAGER_TEMPLATE" => "",
							"PAGER_DESC_NUMBERING" => "N",
							"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
							"PAGER_SHOW_ALL" => "N",
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "N",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"AJAX_OPTION_ADDITIONAL" => ""
							),
							false
						) ;?>
					</div>
				</div>
				<img src="<?=SITE_TEMPLATE_PATH?>/starwars/i/logo.png" alt="" class="b-banner_starwars__logo">
				<div class="b-banner_starwars__repeat"></div>
			</div>
		<!--<![endif]-->
	<?php } ?>