<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
IncludeTemplateLangFile(__FILE__);
?>
<?if(!$is404): ?>
</div>

<hr class="col-md-12">
<div class="banners-container col-md-12 col-sm-12 col-xs-12">
    <a class="banners-container__item col-md-6 col-sm-6 col-xs-12" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_LINK_BANNER_FIRST" ) ?>"
            style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/banner-1.png)">
        <p class="banners-container__text">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer_description_banners_name_1.php"
                ),
                false
            );
            ?></p>
        <div class="banners-container__shadow banners-container__shadow--danger"></div>
    </a>
    <a class="banners-container__item col-md-6 col-sm-6 col-xs-12" href="<?=COption::GetOptionString( "runetsoft.settings", "UF_LINK_BANNER_SECON" ) ?>"
           style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/banner-1.png)">
        <p class="banners-container__text">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "EDIT_TEMPLATE" => "",
                    "COMPONENT_TEMPLATE" => ".default",
                    "PATH" => SITE_TEMPLATE_PATH . "/include/footer_description_banners_name_2.php"
                ),
                false
            );
            ?></p>
        <div class="banners-container__shadow banners-container__shadow--primary"></div>
    </a>
</div>
<div class="about-container col-md-12 col-sm-12 col-xs-12">
    <div class="about-container__content col-md-8 col-sm-8 col-xs-12">
        <div class="text-container text-container--title">
            <p><? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/footer_description_name.php"
                    ),
                    false
                );
                ?></p>
        </div>
        <div class="text-container">
            <p><? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/footer_description.php"
                    ),
                    false
                );
                ?></p>
        </div>
    </div>
    <div class="about-container__logo-wrapper col-md-4 col-sm-4 col-xs-12">
        <img class="about-container__logo" src="<?= SITE_TEMPLATE_PATH ?>/images/logo.png">
    </div>
</div>
</div>
<?endif; ?>
</main>
<footer class="footer">
    <div class="container">

        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "bottom",
            array(
                "COMPONENT_TEMPLATE" => "bottom",
                "ROOT_MENU_TYPE" => "bottom",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "MENU_CACHE_GET_VARS" => array(),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "Y"
            ),
            false
        ); ?>
        <div class="copyright">
            <div class="pull-left footer__navigation-item">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/copyright.php"
                    ),
                    false
                );
                ?>
                </div>
            <div class="pull-right">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "EDIT_TEMPLATE" => "",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/rns.php"
                    ),
                    false
                );
                ?>
            </div>
        </div>

    </div>
</footer>
</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(55420120, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/55420120" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>