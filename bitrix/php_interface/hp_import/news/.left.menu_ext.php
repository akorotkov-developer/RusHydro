<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt=$APPLICATION->IncludeComponent("my_components:menu.sections", "", array(
	"ID" => $_REQUEST["SECTION_ID"],
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "3",
	"SECTION_URL" => "/news/index.php?SECTION_ID=#ID#",
	"DEPTH_LEVEL" => "4",
	"CACHE_TIME" => "3600"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>