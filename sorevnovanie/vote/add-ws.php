<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?

if($_POST['addVote'] && $_POST['id']) {

    CModule::IncludeModule('runetsoft.settings');

    $vote = new \Runetsoft\VoteTable;

    //mail("89065267799@mail.ru", "Тема письма", print_r($_POST['id'], true));
    $vote->addVote($_POST['id']);
}

LocalRedirect("/ws/teams/");

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");