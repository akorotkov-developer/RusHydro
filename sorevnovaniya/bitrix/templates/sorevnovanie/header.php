<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала. ОАО «РусГидро»</title>
	
	<?$APPLICATION->ShowHead()?>
	
	<meta property="og:title" content="<?$APPLICATION->ShowTitle()?> - Всероссийские соревнования оперативного персонала. ОАО «РусГидро»" />
	<meta property="og:description" content="Всероссийские соревнования оперативного персонала организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала, распространения передовых и новых методов работы." />
	<meta property="og:image" content="http://sorevnovanie.rushydro.ru/bitrix/templates/sorevnovanie/i/logo-rushydro.jpg" />	
	<meta name="cmsmagazine" content="023fede1cd00d7f15a0ae19646d80a72" />

	<link rel="alternate" type="application/rss+xml" title="РусГидро | Всероссийские соревнования оперативного персонала" href="http://sorevnovanie.rushydro.ru/ges/news/rss/" />
	
	<link href="<?=SITE_TEMPLATE_PATH?>/styles/style.css" rel="stylesheet" type="text/css">

	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/jquery-v1.12.js" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/assets/jquery-ui/jquery-ui.min-v1.12.js" type="text/javascript"></script>

	<script src="<?=SITE_TEMPLATE_PATH?>/assets/fancybox/jquery.fancybox.js" type="text/javascript"></script>
	<link href="<?=SITE_TEMPLATE_PATH?>/assets/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">

	<script src="<?=SITE_TEMPLATE_PATH?>/assets/validate/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/assets/maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>

	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/scripts.js" type="text/javascript"></script>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">	
	
	
	<?$dir = $APPLICATION->GetCurDir();?>
	
	
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
	
	
	<div class="container">	
	
	
	
	<img src="<?=SITE_TEMPLATE_PATH?>/styles/img/logo.png" alt="" class="site-logo" />
	
	<div class="socnets">
		<a class="facebook" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'facebook','width=600,height=600');return false;"></a>
		<a class="twitter" onclick="window.open('http://twitter.com/home?status='+encodeURIComponent(document.title)+': '+encodeURIComponent(location.href),'twitter','width=600,height=600');return false;"></a>
		<a class="vk" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href),'vkontakte','width=600,height=600');return false;"></a>		
		<a class="odnokl" onclick="window.open('http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl='+encodeURIComponent(location.href), 'odkl', 'width=600, height=600'); return false;"></a>
		<a class="mailru" onclick="window.open('http://connect.mail.ru/share?share_url='+encodeURIComponent(location.href),'mail','width=600,height=600');return false;"></a>
		<a class="livej" onclick="$('#ljupdate_form').submit()"></a>		
		<form target="_blank" method="post" action="http://www.livejournal.com/update.bml" id="ljupdate_form">
			<input value="Пятые Всероссийские соревнования оперативного персонала ГЭС. Поддержи любимую команду!" name="subject" type="hidden">
			<textarea style="display:none;" name="event">&lt;img src="http://sorevnovanie.rushydro.ru/bitrix/templates/rushydro/i/logo-rushydro.jpg" align="left" hspace="10" /&gt;Всероссийские соревнования оперативного персонала ГЭС организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала гидроэлектростанций, распространения передовых и новых методов работы. &lt;a href=""http://sorevnovanie.rushydro.ru/" target="_blank"&gt;Перейти на сайт соревнований&lt;/a&gt;</textarea>			
		</form>
	</div>
	
	<!--<div class="to-scroll"></div>-->
	
	
	