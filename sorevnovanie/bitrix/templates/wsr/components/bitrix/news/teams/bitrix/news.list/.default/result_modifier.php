<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?

CModule::IncludeModule('runetsoft.settings');

$vote = new \Runetsoft\VoteTable;

$cp = $this->__component;

foreach ($arResult['ITEMS'] as $arItem) {

    $arResult['LIST_ID'][] = $arItem['ID'];

}

//\COption::SetOptionString("runetsoft.settings","UF_VOTING","Y");
$arResult['VOTING'] = \COption::GetOptionString("runetsoft.settings", "UF_VOTING");
//$arResult['VOTING'] = "Y";

if (is_object($cp)) {
    $cp->arResult['VOTE'] = $vote->getCountByElementID($arResult['LIST_ID']);
    $cp->arResult['VOTING'] = $arResult['VOTING'];
    $cp->SetResultCacheKeys(array('VOTE','VOTING'));
}




?>
