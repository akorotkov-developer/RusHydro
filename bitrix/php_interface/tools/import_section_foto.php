<?php

define("LANG", "ru"); 
define("DIR","/imagesToImport/");
define("NO_KEEP_STATISTIC", true); 
define("NOT_CHECK_PERMISSIONS", true); 
define("DB_HOST", "localhost");
define("DB_NAME","boges_db");
define("DB_USER","boges_user");
define("DB_PASSWORD", "ZzEir345af");
define("IBLOCK_ID", 132);


$counterDir = $counterImg = 0;
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../../../');
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
CModule::IncludeModule("iblock");
//die('Заглушка от "дураков"');
/*$count = CIBlockElement::GetList(array(),array(
	'IBLOCK_ID' => 132,
));*/
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
function saveImage($path,$sectionId){
	global $counterDir;
	global $counterImg;
	$ib = new CIBlockElement;
	$paths = array();
	$imgType = array('_orig','_detail','_preview');
	preg_match("/\/([a-zA-Z\p{Cyrillic}0-9.,()№\s_-]+)\/*$/u", str_replace(' ', '_', $path), $output_array);
	preg_match("/(.*)\..*$/u",$output_array[1],$out);
	if($out[1] == 'Thumbs.db') break;
	for($i=0; $i<3; $i++){
		$desc = preg_replace("/(\/.*)(\..*)$/m", "$1".$imgType[$i]."$2", $path);
		$paths[] = copy($path, preg_replace("/(\/.*)(\..*)$/m", "$1".$imgType[$i]."$2", $path)) ? $desc : '';
	}	

	$fileName = $out[1];
	$now = date("d.m.Y H:i:s",time());
	
	$arFields = array(
		"IBLOCK_ID" => IBLOCK_ID,
		"ACTIVE" => "Y",
		"CODE" => translit($fileName),
		"NAME" => $fileName,
		"DETAIL_PICTURE" => CFile::MakeFileArray($paths[1]),
		"PREVIEW_PICTURE" => CFile::MakeFileArray($paths[2]),
		"PROPERTY_VALUES" => array(
			"1152" => CFile::MakeFileArray($paths[0]),
		),
		"IBLOCK_SECTION_ID" => $sectionId ? : false,
		'DATE_CREATE'		=> $now,
		'DATE_ACTIVE_FROM' 	=> $now,
	);
	$ID = $ib->Add($arFields,false,true,true);
  	if(!($ID>0)){
  		echo '
  		';
  		echo $ib->LAST_ERROR;
  		echo '
  		'.$path.'
  		';
  	}

	$counterImg++;
	for($i=0; $i<3; $i++){
		unlink($paths[$i]);//preg_replace("/(\/.*)(\..*)$/m", "$1".$imgType[$i]."$2", $path));
	}
	//var_dump($fileName,$ID,$ib->LAST_ERROR);
}

function addSection($dirName){
	global $counterDir;
	global $counterImg;
	$bs = new CIBlockSection;
	$arFields = array(
		"ACTIVE" => "Y",
		"IBLOCK_ID" => IBLOCK_ID,
		"CODE" => translit($dirName),
		"NAME" => $dirName,
		"DESCRIPTION_TYPE" => 'html',
	);

	$ID = $bs->Add($arFields);
	$counterDir++;
	if(!($ID>0))
  		echo $bs->LAST_ERROR;
	return $ID;
}

function recursiveAddPhoto($dir,$sectionId){
	$scanList = scandir($dir);
	$isRoot = $sectionId == 'root'; 
	for ($j = 0; $j < count($scanList);$j++) {
		if(in_array($scanList[$j],array(".",".."))) continue;
		$path = $dir.$scanList[$j];
		if(is_dir($path)){
			$path .= '/';
			if($isRoot){
				$sectionId = addSection($scanList[$j]);
			}
			recursiveAddPhoto($path,$sectionId);
		} else {
			saveImage($path,$sectionId);
		}
	}
}

$mainDir = $_SERVER['DOCUMENT_ROOT'].DIR;
$sectionId = 'root';
$dirList = array(

);
$
for ($i = 0; $i < count($dirList); $i++) {
	if(in_array($dirList[$i],array(".",".."))) continue;
	$path = $mainDir.$dirList[$i];
	if(is_dir($path)){
		$path .= '/';
		$sectionId = addSection($dirList[$i]);
		recursiveAddPhoto($path,$sectionId);
	} else {
		saveImage($path,$sectionId);
	}
}

echo 'Перенесено:
		'.$counterDir.' директорий;
		'.$counterImg.' фотографий;
';
*/
$fotoSections = CIBlockSection::GetList(array(),array(
	'IBLOCK_ID' => 132
));

while($fotoSection = $fotoSections->GetNext()){
	$section = new CIBlockSection;
	$fields = array(
		"ACTIVE" => "Y",
		"IBLOCK_ID" => 53,
		"CODE" => translit($fotoSection['NAME']),
		"NAME" => $fotoSection['NAME'],
		"DESCRIPTION_TYPE" => 'html',
		'IBLOCK_SECTION_ID'=> '9462',
		'UF_PHOTOBANK' => $fotoSection['ID'],
	);
	$id = $section->Add($fields);
}

//mysqli_close($db);