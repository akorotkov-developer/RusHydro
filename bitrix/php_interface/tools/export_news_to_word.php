<?php
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/../../../');
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

require __DIR__.'/../lib/PHPWord/src/PhpWord/Autoloader.php';
require __DIR__.'/../lib/HTMLtoOpenXML/HTMLtoOpenXML.php';
require_once __DIR__.'/../lib/htmlpurifier/library/HTMLPurifier.auto.php';

/*error_reporting(E_ALL);
ini_set('display_errors', true);*/

CModule::IncludeModule("iblock");
$el = new CIBlockElement;
$file = new CFile;
//\PhpOffice\PhpWord\Autoloader::register();

$rsElement = $el->GetList(
        array('DATE_ACTIVE_FROM' => 'asc'),
        array(
            'IBLOCK_ID' => '53',
            'SECTION_ID' => '4315',
            '><DATE_ACTIVE_FROM' =>
                array(
                    '01.01.2015 00:00:00',
                    '01.04.2015 00:00:00',
                )
        ),
        false,
        false,
        array('ID', 'DATE_ACTIVE_FROM', 'NAME', 'DETAIL_TEXT')
    );

$config = HTMLPurifier_Config::createDefault();
$config->set('AutoFormat.RemoveEmpty', true);
$config->set('HTML.Allowed', 'sub, sup, table, tr, td[colspan|rowspan|scope], p, ol, ul, li, h2, h3, h4, h5, b, i, img[src]');
$config->set('AutoFormat.AutoParagraph', true);
$config->set('Core.NormalizeNewlines', true);

$purifier = new HTMLPurifier($config);

\PhpOffice\PhpWord\Autoloader::register();
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addTitleStyle(1, array('size'=>20, 'bold'=>true));

$section = $phpWord->addSection();

$section->addTitle('Содержание', 1);
$section->addTOC();
$section->addPageBreak();

while ($element = $rsElement->GetNext()) {
    echo $element['DATE_ACTIVE_FROM'].' '.$element['NAME']."\n";
    $link = 'http://rushydro.ru/press/news/'.$element['ID'].'.html';
    $date = explode(' ', $element['DATE_ACTIVE_FROM']);
    $date = $date[0];
    $text = $element['DETAIL_TEXT'];
    $text = preg_replace('/<br\s*\/\s*>/', "\n", $text);
    $text = $purifier->purify($text);

    $section->addTitle($date.' '.$element['NAME'], 1);
    $section->addLink($link, htmlspecialchars($link));
    $section->addText($date);
    \PhpOffice\PhpWord\Shared\Html::addHtml($section, $text);

    $props = getElementProps(53, $element['ID']);
    if (!empty($props['GALLERY'])) {
        $table = $section->addTable(9000, array('borderSize' => 0));
        foreach ($props['GALLERY'] as $index => $prop) {
            if (!($index % 3)) {
                $table->addRow();
            }

            $imgProp = $file->GetByID($prop['VALUE'])->GetNext();

            $w = $imgProp['WIDTH'];
            $h = $imgProp['HEIGHT'];

            list($w, $h) =
                ($h > $w)
                    ? array(150, 150 * $h / $w)
                    : array(120 * $w / $h, 120);

            $img = $file->ResizeImageGet($prop['VALUE'], array('width' => $w, 'height' => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true);

            $table->addCell(3000)->addImage('http://rushydro.ru'.$img['src'], array(
                'width' => $w,
                'height' => $h,
                'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE,
                'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_CENTER,
                'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_COLUMN,
                'posVertical'      => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_TOP,
                'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_LINE,
            ));
        }
    }

    $section->addPageBreak();
}

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('news.docx');

echo "Done.\n";
