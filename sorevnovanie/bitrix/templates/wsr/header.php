<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
IncludeTemplateLangFile(__FILE__);
?>

<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>


    <?

    CJSCore::Init(array("jquery"));


    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/lib/modernizr.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/lib/bootstrap.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/lib/slick.min.js');
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/lib/tooltip.min.js');

    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/polyfill.js');

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/bootstrap.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/bootstrap-theme.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/css/slick.css');


    $APPLICATION->AddHeadString('<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>');
    $APPLICATION->AddHeadString('<meta name="viewport" content="width=device-width, initial-scale=1"/>');
    $APPLICATION->AddHeadString('<link rel="apple-touch-icon" sizes="180x180" href="/ws/apple-touch-icon.png">');
    $APPLICATION->AddHeadString('<link rel="icon" type="image/png" sizes="32x32" href="/ws/favicon-32x32.png">');
    $APPLICATION->AddHeadString('<link rel="icon" type="image/png" sizes="16x16" href="/ws/favicon-16x16.png">');

    $APPLICATION->ShowHead();
    ?>

    <? if ($APPLICATION->GetCurDir() == '/ws/') $isIndex = true ?>
    <? if (ERROR_404 == "Y") $is404 = true ?>


    <title><? $APPLICATION->ShowTitle() ?></title>

</head>
<body>
<? $APPLICATION->ShowPanel(); ?>

<div class="wrapper">
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="header__wrapper">
                    <div class="header__logo-container col-md-11 col-sm-11 col-xs-12">
                        <div class="header__logo-wrapper col-md-4 col-sm-4 col-xs-12">
                            <a class="header__logo header__logo--main" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_LINK_CORP_CHEMP" ) ?>">
                                <img class="header__logo-image" src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png">
                            </a>
                        </div>
                        <div class="header__logo-wrapper col-md-4 col-sm-4 col-xs-12">
                            <a class="header__logo header__logo--skills" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_WORLD_SKILLS_LINK" ) ?>">
                                <img class="header__logo-image" src="<?= SITE_TEMPLATE_PATH ?>/images/world-skills.png">
                            </a>
                        </div>
                        <div class="header__logo-wrapper col-md-4 col-sm-4 col-xs-12">
                            <a class="header__logo header__logo--second" href="/ws/">
                                <img class="header__logo-image" src="<?= SITE_TEMPLATE_PATH ?>/images/logo-second.png">
                            </a>
                        </div>
                    </div>
                    <div class="header__logo-wrapper header__logo-wrapper--find col-md-1 col-sm-1 col-xs-12">
                        <a class="header__link header__link--find" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_SEARCH_LINK" ) ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "top",
            array(
                "COMPONENT_TEMPLATE" => "top",
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(),
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y"
            ),
            false
        ); ?>


    </header>

    <? if (!$isIndex && !$is404): ?>
        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", array(
	"START_FROM" => "1",
	"PATH" => "",
	"SITE_ID" => "-"
	),
	false
); ?>
    <? endif; ?>


    <main>
        <?if(!$is404): ?>
            <div class="container">
                <?endif; ?>
            <? if (!$isIndex && !$is404): ?>

                <div class="title-container">
                    <h1 class="title-container__title"><? $APPLICATION->ShowTitle() ?></h1>


                    <?$APPLICATION->IncludeComponent("api:yashare", "", array(
	"DATA_DESCRIPTION" => "",
	"DATA_IMAGE" => "",
	"DATA_TITLE" => "",
	"DATA_URL" => "",
	"LANG" => "ru",
	"QUICKSERVICES" => array(
		0 => "vkontakte",
		1 => "facebook",
		2 => "gplus",
	),
	"SHARE_SERVICES" => "",
	"SIZE" => "m",
	"TYPE" => "icon",
	"UNUSED_CSS" => "N",
	"twitter_hashtags" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>

                </div>


                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "second",
                    array(
                        "COMPONENT_TEMPLATE" => "second",
                        "ROOT_MENU_TYPE" => "left",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y"
                    ),
                    false
                ); ?>

            <? endif; ?>
            <?if(!$is404): ?>
                <div class="content col-md-12">
            <?endif; ?>










