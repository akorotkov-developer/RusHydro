<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');

$count = null;
	
if (
	isset($_POST['id']) 
	&& is_numeric($_POST['id'])
) {
	$count = 0;

	$id = intval($_POST['id']);

	$cookie = isset($_COOKIE[SALT_COOKIE]) ? $_COOKIE[SALT_COOKIE] : null;
	if ($cookie === null && isset($_POST['c'])) {
		preg_match('/'.SALT_COOKIE.'=([\d\-]+);/', $_POST['c'], $m);
		$cookie = $m ? $m[1] : null;
	}

	$correctCookie = get_like_salt($_SERVER['HTTP_X_REAL_IP']);

	$accepted = false;
	if ($team = CIBlockElement::GetByID($id)) {
		$team = $team->GetNextElement();
		$fields = $team->GetFields();
		$props = $team->GetProperties();
		
		$count = intval($props['VOTES']['VALUE']);

		$sessionKey = 'vote_region_'.$fields['IBLOCK_SECTION_ID'];
		if (
			//false &&// голосование закрыто, голосуем только за финалистов в likeFinal.php
			/*&& $count
			&&*/ isset($props['VOTES']) 
			//&& !$props['IS_FINALIST']['VALUE']	
			&& !empty($_SERVER['HTTP_REFERER'])
			&& isset($_POST['c']) 
			&& ($cookie === $correctCookie)
			&& !isset($_COOKIE[$sessionKey])
			&& (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'comodo') === false)
			//&& !in_array($_SERVER['HTTP_X_REAL_IP'], array('46.16.230.68', '91.221.176.114', '82.208.65.101', '90.189.110.204', '90.189.111.184', '109.70.184.42', '217.150.49.217'))
		) {
			$count++;
			//CIBlockElement::SetPropertyValuesEx($id, 3, array('VOTES' => $count));
			CIBlockElement::SetPropertyValueCode($id, 'VOTES', $count);

			setcookie($sessionKey, 1, time() + 60*60*24*365*5);
			$accepted = true;
		}
	}

	$fh = @fopen(dirname(__FILE__).DIRECTORY_SEPARATOR.'vote.log', 'a+');
	if ($fh) {
		fwrite($fh,
			date('d.m.Y H:i:s')."\t"
			.$_SERVER['HTTP_X_REAL_IP']."\t"
			.$_POST['id']."\t"
			.$count."\t"
			.$correctCookie."\t"
			.($cookie !== null ? $cookie : '[missing]')."\t"
			.($accepted ? '[accepted]' : '[rejected]')."\t"
			.(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '[no user agent]')
			."\n"
		);
		fclose($fh);
	}
}
elseif (isset($_POST['ids']) && is_array($_POST['ids'])) {
	$count = array();

	$rsTeams = CIBlockElement::GetList(array(), array('ID' => $_POST['ids']));
	while ($team = $rsTeams->GetNextElement()) {
		$fields = $team->GetFields();
		$props = $team->GetProperties();

		$count[$fields['ID']] = intval($props['VOTES']['VALUE']);
	}
	unset($rsTeams);
}

echo json_encode(compact('count'));
