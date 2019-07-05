<?php

$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../../../');
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

CModule::IncludeModule('search');

$similarTags = array(
    "благотворительный",
);

$similarTags = array_map(function($tag) {
    $tag = mb_strtolower($tag);
    $tag = trim($tag);
    $tag = preg_replace('/\s+/', ' ', $tag);
    return $tag;
}, $similarTags);

$query = implode(' OR ', $similarTags);

$search = new CSearch;
$search->Search(array(
    'MODULE_ID' => 'iblock',
    'QUERY' => $query,
));

echo "SET NAMES utf8;\n";
$count = 0;
while ($item = $search->Fetch()) {
    $m = null;
    if (!preg_match('/^(\d+)$/', $item['ITEM_ID'], $m)) continue;
    $id = $m[1];
    $count++;

    echo "UPDATE b_iblock_element SET TAGS = CONCAT(TAGS, ', благотворительность, социальная ответственность') WHERE ID = '$id';\n";  
}