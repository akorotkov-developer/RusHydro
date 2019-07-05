<?php
/*
define("LANG", "ru"); 
define("DIR","/imagesToImport/images/kaskad/");
define("NO_KEEP_STATISTIC", true); 
define("NOT_CHECK_PERMISSIONS", true); 
define("DB_HOST", "localhost");
define("DB_NAME","boges_db");
define("DB_USER","boges_user");
define("DB_PASSWORD", "ZzEir345af");
define("IBLOCK_ID", 132);*/


$counterDir = $counterImg = 0;
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../../../');
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
CModule::IncludeModule("iblock");

//var_dump($count->SelectedRowsCount());die();
function translit($str){
	$arParams = array(
	   "max_len" => 255,
	   "replace_space" => '-',   //Символ замены пробела
	   "replace_other" => '-',   //Символ замены остальных символов
	);

	return  CUtil::translit($str, "ru", $arParams);
}
/*
import
 - file name
  -photo
  -photo
  ...
  -photos
 -file name
  -photo
  ...
  -photos
*/

$days = CIBlockElement::GetList(array(), array(
	'IBLOCK_ID' => 53,
	'SECTION_ID' => 7532,
),false, false, array(
	'ID',
	'IBLOCK_ID',
	'NAME',
	'PROPERTY_GALLERY',
));

mkdir($_SERVER['DOCUMENT_ROOT'] . '/imports/');
$i = 1;

while($day = $days->GetNext()){
	$curDir = $_SERVER['DOCUMENT_ROOT'] . '/imports/' . $day['NAME'] . '/';
	mkdir($curDir);

	$gallery = CIBlockElement::GetProperty(53, $day['ID'], array(), array('ID' => 61));

	while($photo = $gallery->GetNext()){
		$file = CFile::GetById($photo['VALUE'])->Fetch();
		$path = $curDir . (!empty($file['DESCRIPTION']) ? $file['DESCRIPTION'] . ' && ' : '') . $file['FILE_NAME'];
		copy($_SERVER['DOCUMENT_ROOT']. CFile::GetPath($photo['VALUE']), $path);
		//var_dump($file['DESCRIPTION']);
	}
	//$file = CFile::GetById($day['PROPERTY_GALLERY_VALUE'])->Fetch();
	//var_dump(/*$day,*/ CFile::GetPath($day['PROPERTY_GALLERY_VALUE']));
	$i++;
	//if($i>10) break;
}