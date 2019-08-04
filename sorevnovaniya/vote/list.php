<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');

$count = array();

$rsTeams = CIBlockElement::GetList(array(), array('ID' => $_POST['ids']));
while ($team = $rsTeams->GetNextElement()) {
	$fields = $team->GetFields();
	$props = $team->GetProperties();

	$count[$fields['ID']] = intval($props['VOTES']['VALUE']);
}
unset($rsTeams);

echo json_encode(compact('count'));
