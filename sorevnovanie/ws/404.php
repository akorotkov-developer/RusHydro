<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>


    <div class="not-found col-md-12">
        <div class="not-found__greeting-container col-md-8">
            <p class="not-found__greeting">Добро пожаловать на страницу 404!</p>
            <p class="not-found__desc">Вы находитесь здесь, потому что ввели адрес страницы, которая уже не существует или была перемещена по другому адресу.</p>
        </div><a class="not-found__link btn btn--danger" href="/">На главную</a>
    </div>
    <img class="img-responsive" src="<?=SITE_TEMPLATE_PATH ?>/images/404.jpg">

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>