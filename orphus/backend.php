<?php
$fields = array('ref', 'c_pre', 'c_sel', 'c_suf', 'comment');
if (array_diff($fields, array_keys($_POST))) die();

$pre_ref = reset(explode('#', $_POST['ref']));
if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] !== $pre_ref) die();

$data = array_map('strip_tags', $_POST);
$data = array_map('trim', $data);
$data = array_map('htmlspecialchars', $data);

//$emails = array('svl@rushydro.ru', 'support.rushydro@client.runetsoft.ru',);
$emails = array('svl@rushydro.ru', 'mrsk_alex@mail.ru');

$subject =
    '=?UTF-8?B?'.base64_encode('Найдена ошибка на сайте: '.$data['c_sel']).'?=';

$headers =
    'Content-Transfer-Encoding: base64'."\r\n"
    .'Content-Type: text/html; charset=UTF-8'."\r\n"
    .'From: orphus@rushydro.ru';

$body = base64_encode(
    '<b>Дата:</b> '.date('d.m.Y H:i:s').'<br/>'
    .'<b>IP:</b> '.(isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : $_SERVER['REMOTE_ADDR']).'<br/>'
    .'<b>User-Agent:</b> '.(empty($_SERVER['HTTP_USER_AGENT']) ? 'нет' : htmlspecialchars($_SERVER['HTTP_USER_AGENT'])).'<br/><br/>'
    .'<b>URL: </b>'.$data['ref'].'<br/>'
    .'<b>Комментарий:</b> '.$data['comment'].'<br/>'
    .'<b>Текст опечатки:</b>'
    .'<p>'.$data['c_pre'].' <b>'.$data['c_sel'].'</b> '.$data['c_suf'].'</p>'
);

foreach ($emails as $email) {
    mail($email, $subject, $body, $headers);
}
