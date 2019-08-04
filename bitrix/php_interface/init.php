<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

function mailSecurityAgent(){
	$arDate = localtime(time());
	$date1 = ConvertTimeStamp(mktime($arDate[2], $arDate[1]-15, $arDate[0], $arDate[4]+1, $arDate[3], 1900+$arDate[5]), "FULL");
	$date2 =ConvertTimeStamp( mktime($arDate[2], $arDate[1], $arDate[0], $arDate[4]+1, $arDate[3], 1900+$arDate[5]), "FULL");
	$arEvent = array();
	$arRes = CEventLog::GetList(
		array("ID" => "ASC"),
		array(
			"MODULE_ID" => "security",
			"TIMESTAMP_X_1" => $date1,
			"TIMESTAMP_X_2" => $date2,
		));

	while($od = $arRes->Fetch()){
		$arEvent = $od;
	}

	if (count($arEvent) > 0){
		$mes = "";
		foreach($arEvent as $k => $v){
			$mes .= "[".$k."] => ".$v."\r\n";
		}
		mail("editor@smhost.ru", "warning security rushydro.ru", $mes);
	}
	unset($arEvent);
	return "mailSecurityAgent();";
}

require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/ero.php");

/*ero::me()->
	withLimits()->
	setMemoryLimit(32 * 1024 * 1024)->
	setTimeLimit(5)->
	
	withProfiling()->
	
	run();
*/
require_once 'mobile-check.php';

if (IS_MOBILE) {
	if ($_SERVER['HTTP_HOST'] === 'www.rushydro.ru' && $_SERVER['REQUEST_URI'] === '/') {
		if (empty($_COOKIE['force']) || $_COOKIE['force'] !== 'desktop') {
			header('Location: http://m.rushydro.ru/');
		}
	}
	else {
		setcookie('force', 'desktop');
	}
}

require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/su.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/letter.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/interfaces.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/exceptions.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/util.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdMemcache.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdPath.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdHandler.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdIBElement.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdIBSection.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdSiteNews.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/rhdTag.class.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/fileArchive.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/email2img/email2img.class.php"); 
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/lib/events.php"); 

if (!defined('ALL_YOUR_BASE_ARE_BELONG_TO_US')) { // not inside site-importer
	AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'onIBElementUpdate');
	AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', 'onIBElementUpdate');
	
	AddEventHandler('iblock', 'OnAfterIBlockElementAdd', 'afterIBElementUpdate');
	AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', 'afterIBElementUpdate');
	
	AddEventHandler('iblock', 'OnBeforeIBlockSectionAdd', 'onIBSectionUpdate');
	AddEventHandler('iblock', 'OnBeforeIBlockSectionUpdate', 'onIBSectionUpdate');
	
	AddEventHandler('iblock', 'OnAfterIBlockSectionAdd', 'afterIBSectionUpdate');
	AddEventHandler('iblock', 'OnAfterIBlockSectionUpdate', 'afterIBSectionUpdate');

	AddEventHandler("search", "BeforeIndex", "beforeIndexHandler");

	AddEventHandler("subscribe", "BeforePostingSendMail", 'beforePostingMail');

	AddEventHandler("main", "OnBeforeEventAdd", 'RnsOnBeforeEventAdd');

	function filterOldPort(&$content) {
		$content = str_replace('rushydro.ru', 'rushydro.ru', $content);
	}

	AddEventHandler('main', 'OnEndBufferContent', 'filterOldPort');
}

AddEventHandler("main", "OnAfterUserAdd", "OnAfterUserAddHandler");


function OnAfterUserAddHandler(&$arFields){


	if($arFields['UF_AGREE'] == 1 && $arFields['RESULT']) {

		$arGroup = CGroup::GetList($by,$order,array("STRING_ID"=>"READ_FORUM"))->Fetch();

		$user = new CUser();

		$user->Update($arFields['RESULT'], array("ACTIVE"=>"N","GROUP_ID"=>array("5",$arGroup['ID'])));

		CEvent::Send("REGISTERED_USER_TO_AUCTION_FORUM", SITE_ID, $arFields);

    }

}


function RnsOnBeforeEventAdd(&$event, &$lid, &$arFields)
{
    if(($event == "SUBSCRIBE_CONFIRM") && RhdHandler::isEnglish()){
        $event = "SUBSCRIBE_CONFIRM_EN";
	}

	if ($event == "FORM_FILLING_SIMPLE_FORM_3_VD4PF"){
		$lid = "s1";
		$arFields["FORM_TITLE"] = $_POST["FORM_TITLE"];
	}

}
//error_reporting(E_ALL);




?>
