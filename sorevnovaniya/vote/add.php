<?
//exit;
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$status = Vote::addVote($_POST);

switch ($status) {
    case Vote::STATUS_NEED_CAPTCHA:
        $APPLICATION->IncludeFile('/include/voteCaptcha.php', $_POST);
        break;

    case Vote::STATUS_ALREADY_VOTED:
    case Vote::STATUS_VOTE_ACCEPTED:
    case Vote::STATUS_VOTE_REJECTED:
        echo Vote::getVoteCount($_POST['id']);
        exit();
        break;
}
