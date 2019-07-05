<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
CModule::IncludeModule("iblock");
?><?
if ($_GET["ID"] == '' || !isset($_GET["ID"]))
{
if(CModule::IncludeModule("iblock"))
{
$res = CIBlockSection::GetByID($_GET["SECTION_ID"]);
if($ar_res = $res->GetNext())  
{
$APPLICATION->SetTitle($ar_res['NAME']);
echo '<h1>'.$ar_res['NAME'].'</h1>';
}
else { echo '<h1>Новости</h1>'; $APPLICATION->SetTitle("Новости"); }
}
}
?>
<?
if (!isset($_GET["SECTION_ID"]) && ($_GET["ID"] == '' || !isset($_GET["ID"])))
{
if(CModule::IncludeModule("iblock"))
{
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "DETAIL_PICTURE", "DETAIL_TEXT", "PREVIEW_TEXT_TYPE", "DETAIL_TEXT_TYPE");
$arFilter = Array("IBLOCK_ID"=>3, "SECTION_ID"=>0,"ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"DESC", "DATE_ACTIVE_FROM"=>"DESC"), $arFilter, false, Array("nPageSize"=>6), $arSelect);
while($ob = $res->GetNext())
{
?>
<div style="float: left; margin-right: 10px;">
<?echo CFile::ShowImage($ob['PREVIEW_PICTURE'], 356, 700, "border=0", "/news/index.php?ID=".$ob['ID'], false);?>
</div>
<?=$ob["DATE_ACTIVE_FROM"]?> <a href="/news/index.php?ID=<?=$ob["ID"]?>"><b><?=$ob["NAME"]?></b></a>
<br />
<?=$ob["PREVIEW_TEXT"]?>
<br /><br />
<?
}
echo $res->NavPrint('Новости');
}
}

if (($_GET["SECTION_ID"] == '16' || $_GET["SECTION_ID"] == '17' || $_GET["SECTION_ID"] == '19' || $_GET["SECTION_ID"] == '20' || $_GET["SECTION_ID"] == '21') && ($_GET["ID"] == '' || !isset($_GET["ID"])))
{
if(CModule::IncludeModule("iblock"))
{
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "DETAIL_PICTURE", "DETAIL_TEXT", "PREVIEW_TEXT_TYPE", "DETAIL_TEXT_TYPE");
$arFilter = Array("IBLOCK_ID"=>3, "SECTION_ID"=>$_GET["SECTION_ID"],"ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"DESC", "DATE_ACTIVE_FROM"=>"DESC"), $arFilter, false, Array("nPageSize"=>6), $arSelect);
while($ob = $res->GetNext())
{
?>
<div style="float: left; margin-right: 10px;">
<?echo CFile::ShowImage($ob['PREVIEW_PICTURE'], 356, 700, "border=0", "/news/index.php?SECTION_ID=".$_GET["SECTION_ID"]."&ID=".$ob['ID'], false);?>
</div>
<?=$ob["DATE_ACTIVE_FROM"]?> <a href="/news/index.php?SECTION_ID=<?=$_GET["SECTION_ID"]?>&ID=<?=$ob["ID"]?>"><b><?=$ob["NAME"]?></b></a>
<br />
<?=$ob["PREVIEW_TEXT"]?>
<br /><br />
<?
}
if ($_GET["SECTION_ID"] == '16')
echo $res->NavPrint('Новости');
elseif ($_GET["SECTION_ID"] == '17')
echo $res->NavPrint('События');
elseif ($_GET["SECTION_ID"] == '20' || $_GET["SECTION_ID"] == '20' || $_GET["SECTION_ID"] == '21')
echo $res->NavPrint('Наши Публикации');
}
}
elseif (($_GET["SECTION_ID"] == '18') && ($_GET["ID"] == '' || !isset($_GET["ID"])))
{
LocalRedirect("/news/index.php?SECTION_ID=20");
}
elseif ($_GET["ID"] != '')
{
$res = CIBlockElement::GetByID($_GET["ID"]);
$ar_res = $res->GetNext(); 
$APPLICATION->SetTitle($ar_res["NAME"]);
echo "<h1>".$ar_res["NAME"]."</h1><div class='novost'>";

	$sPregPattern = "#\[VIDEO[ ]*width[ ]*=[ ]*[ ]*(\d+)[ ]*[ ]*height[ ]*=[ ]*[ ]*(\d+)[ ]*\](\S+)\[\/VIDEO\]#";
	preg_match_all($sPregPattern,$ar_res["DETAIL_TEXT"],$arMatches,PREG_SET_ORDER);
	foreach($arMatches as $arVideo)
	{

        ob_start();
		$APPLICATION->IncludeComponent(
			"bitrix:player",
			"",
			Array(
				"PLAYER_TYPE" => "auto",
				"USE_PLAYLIST" => "N",
				"PATH" => $arVideo[3],
				"PROVIDER" => "video",
				"STREAMER" => "",
				"WIDTH" => $arVideo[1],
				"HEIGHT" => $arVideo[2],
				"PREVIEW" => "",
				"FILE_TITLE" => "",
				"FILE_DURATION" => "",
				"FILE_AUTHOR" => "",
				"FILE_DATE" => "",
				"FILE_DESCRIPTION" => "",
				"SKIN_PATH" => "/bitrix/components/bitrix/player/mediaplayer/skins",
				"SKIN" => "",
				"CONTROLBAR" => "bottom",
				"WMODE" => "opaque",
				"LOGO" => "",
				"LOGO_LINK" => "",
				"LOGO_POSITION" => "none",
				"PLUGINS" => array(),
				"ADDITIONAL_FLASHVARS" => "",
				"AUTOSTART" => "N",
				"REPEAT" => "none",
				"VOLUME" => "90",
				"MUTE" => "N",
				"ADVANCED_MODE_SETTINGS" => "N",
				"PLAYER_ID" => "",
				"BUFFER_LENGTH" => "10",
				"ALLOW_SWF" => "N"
			)
		);
		$PLAYER_CODE = ob_get_contents();
		ob_clean();
		ob_end_clean();
		$ar_res["DETAIL_TEXT"] = str_replace($arVideo[0],$PLAYER_CODE,$ar_res["DETAIL_TEXT"]);
	}



echo $ar_res['DETAIL_TEXT']."</div>";
if (isset($_GET["SECTION_ID"]))
echo '<br /><br /><a href="/news/index.php?SECTION_ID='.$_GET["SECTION_ID"].'"><< Назад</a>';
else
echo '<br /><br /><a href="/news/index.php"><< Назад</a>';

}
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>