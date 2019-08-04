<?define('USE_SALT', true);require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Участники");?> 
<script type="text/javascript">
	voteUrl = '/like.php';
</script>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	".default",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "41",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"ADD_SECTIONS_CHAIN" => "N"
	)
);?> 
<br />
 <a href="http://sorevnovanie.rushydro.ru/tes/teams/arkhiv_uchastnikov_pervykh_korporativnykh_sorevnovaniy_operativnogo_personala_tes/" class="link-back" style="background:rgb(230,106,37); padding-left:14px;" > Участники Первых корпоративных соревнований оперативного персонала ТЭС с поперечными связями </a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>