<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" id="nojs" xmlns:og="http://ogp.me/ns#">
<head>
	<title><?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала. ОАО «РусГидро»</title>
	<script>document.documentElement.id = "js"</script>
	<?$APPLICATION->ShowHead()?>
	<meta property="og:title" content="<?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала. ОАО «РусГидро»" />
	<meta property="og:description" content="Всероссийские соревнования оперативного персонала организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала, распространения передовых и новых методов работы." />
	<meta property="og:image" content="http://sorevnovanie.rushydro.ru/bitrix/templates/sorevnovanie/i/logo-rushydro.jpg" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/prettyPhoto.css?1" />
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/ie7.css" />
	<![endif]-->
	<link rel="alternate" type="application/rss+xml" title="РусГидро | Всероссийские соревнования оперативного персонала" href="http://sorevnovanie.rushydro.ru/ges/news/rss/" />
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
			<a href="/" id="h-logo" style="background: url('<?=SITE_TEMPLATE_PATH;?>/i/logo-rushydro.jpg') no-repeat 0 15px;">Корпоративные соревнования профессионального мастерства</a>
		</div>
		<div id="content">

