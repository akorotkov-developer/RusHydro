<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="nojs" xmlns:og="http://ogp.me/ns#">
<head>
	<title><?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала гидроэлектростанций. ОАО «РусГидро»</title>
	<script>document.documentElement.id = "js"</script>
	<?$APPLICATION->ShowHead()?>
	<meta property="og:title" content="<?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала гидроэлектростанций. ОАО «РусГидро»" />
	<meta property="og:description" content="Всероссийские соревнования оперативного персонала гидроэлектростанций организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала гидроэлектростанций, распространения передовых и новых методов работы." />
	<meta property="og:image" content="http://sorevnovanie.rushydro.ru/bitrix/templates/sorevnovanie_ges/i/logo-rushydro.jpg" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/prettyPhoto.css?1" />
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/ie7.css" />
	<![endif]-->
	<link rel="alternate" type="application/rss+xml" title="РусГидро | Всероссийские соревнования оперативного персонала гидроэлектростанций" href="http://sorevnovanie.rushydro.ru/ges/news/rss/" />
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scripts.js?6"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.prettyPhoto.js?1"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/swfobject.js?1"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=explicit&hl=ru"></script>
	<?$dir = $APPLICATION->GetCurDir();?>
	<script type="text/javascript">
		$(function(){
			$('a[rel="prettyPhoto[gallery]"]').prettyPhoto({
				social_tools: false,
				theme: 'dark_rounded',
				deeplinking: false
			});
		})
	</script>
</head>

<body>
	<!--LiveInternet counter-->
	<script type="text/javascript"><!--
	new Image().src = "//counter.yadro.ru/hit?r"+
	escape(document.referrer)+((typeof(screen)=="undefined")?"":
	";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
	screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
	";"+Math.random();//--></script>
	<!--/LiveInternet-->
	<?$APPLICATION->ShowPanel();?>
	<div id="wrapper">
		<div id="header">
			<a href="mailto:sorevnovanie@rushydro.ru" id="mail-to">Присылайте нам свои мнения,<br/> комментарии и интересные истории</a>
			<div class="instagramm">
				<a href="https://www.instagram.com/rushydro_activities/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/i/inst_logo.png" alt="" /><span>Следите за соревнованиями!</span></a>
			</div>
			
			<a href="/ges/about/best_in_profession.php"><img src="<?=SITE_TEMPLATE_PATH?>/img/mintrud_logo.png" width="108" class="mintrud_logo" alt="" /></a>
			<a href="/ges/" id="h-logo">Восьмые всероссийские соревнования оперативного персонала ГЭС</a>
			<?/*div class="b-header_logo__profmaster"></div*/?>
		</div>
		<div id="menu">
			<div id="search-form">
				<?$APPLICATION->IncludeComponent(
					"bitrix:search.form",
					"",
					Array("PAGE"=>"/ges/search/index.php"),
					false
				);?>
			</div>
		  <?$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"top",
			Array(
				"ROOT_MENU_TYPE" => "top",
				"MAX_LEVEL" => "2",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
				"MENU_CACHE_TYPE" => "Y",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array()
			),
			false
			);?>
		</div>
		<div id="content">
			<?if ($dir != "/ges/" || ERROR_404 == "Y"){?>
				<?if (ERROR_404 != "Y"){?>
					<div class="breadcrumb">
						<?$APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"",
						Array(),
						false
						);?>
					</div>
				<?}?>
				<h1><?$APPLICATION->ShowTitle(false)?></h1>
				<?$APPLICATION->IncludeComponent(
				"bitrix:menu",
				"sub",
				Array(
					"ROOT_MENU_TYPE" => "left",
					"MAX_LEVEL" => "1",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "N",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N",
					"MENU_CACHE_TYPE" => "Y",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array()
				),
				false
				);?>
			<?}?>
