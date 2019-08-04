<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Архив участников первых корпоративных соревнований оперативного персонала ТЭС");
?>
<script type="text/javascript">
	voteUrl = '/like.php';
</script>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	".default",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "26",
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
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
