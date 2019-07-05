<?php
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__)."/../../../";
require_once dirname(__FILE__).'/../../modules/main/include/prolog_before.php';



function listFiles() {
    $img = array();
    $news = array();

    $dir = opendir('img');
    while($filename = readdir($dir)) {
        $img[] = '/img/'.$filename; 
    }
    $img = array_slice($img, 2);
    $dir = opendir('news');
    while($filename = readdir($dir)) {
        $news[] = '/news/'.$filename;    
    }
    $news = array_slice($news, 2);

    return array_merge($img, $news);
}



function parseXml($file_name, $fileNames) {
    $xml = simplexml_load_file($file_name);

    $out = array();
    
    foreach($xml->{'Каталог'}->{'Товары'}->{'Товар'} as $products) {
        $product = array();
        $product['id'] = (string) $products->{'Ид'};
        $product['name'] = (string) $products->{'Наименование'};
        $product['tags'] = (string) $products->{'БитриксТеги'};
        $product['picture'] = (string) $products->{'Картинка'};

        foreach($products->{'Группы'}->{'Ид'} as $group_id) {
            $product['groups'][] = (string)$group_id;
        }   

        foreach($products->{'ЗначенияСвойств'}->{'ЗначенияСвойства'} as $params) {
            $product['params'][(string)$params->{'Ид'}] = (string)$params->{'Значение'};
        }
        /*foreach($fileNames as $fileName) {
            if(strpos($product['params']['CML2_DETAIL_TEXT'], $fileName) !== false) 
                $product['attachments'][] = $fileName;
        }*/

        $product['images'] = array();
        $product['files'] = array();

        $product['params']['CML2_DETAIL_TEXT'] = preg_replace('/style="[^"]+"/i', '', $product['params']['CML2_DETAIL_TEXT']);
        $product['params']['CML2_DETAIL_TEXT'] = preg_replace('/<[\s\/]*font[^>]*>/', '', $product['params']['CML2_DETAIL_TEXT']);

        $product['params']['CML2_DETAIL_TEXT'] = str_replace('/download.php?filename=', '', $product['params']['CML2_DETAIL_TEXT']);

        $product['params']['CML2_DETAIL_TEXT'] = preg_replace_callback('/<a[^>]+href="([^"]+)"[^>]*>(.+)<\s*\/\s*a>/imsU', function($matches) use (&$product, $fileNames) {
            list($s, $href, $inner) = $matches; 
            $href = urldecode($href);

            $m = null;
            if (preg_match('/<img[^>]+src="([^"]+)"[^>]*>/imsU', $inner, $m)) {
                // thumb wrapped with link to fullsized image
                if (in_array(strtolower(pathinfo($href, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'gif', 'png'))) {
                    // save fullsized image path
                    if (in_array($href, $fileNames)) {
                        $product['images'][] = $href;
                        return '';
                    }
                    else {
                        return $s;
                    }
                }
                // file with img inside link
                else {
                    $m[1] = urldecode($m[1]);
                    if (in_array($href, $fileNames)) $product['files'][] = $href;
                    if (in_array($m[1], $fileNames)) $product['images'][] = $m[1];

                    return $s;
                }
            }

            // external link or link to file
            if (in_array($href, $fileNames)) $product['files'][] = $href;
            return $s;
        }, $product['params']['CML2_DETAIL_TEXT']);

        $product['params']['CML2_DETAIL_TEXT'] = preg_replace_callback('/<img[^>]+src="([^"]+)"[^>]*>/imsU', function($matches) use (&$product, $fileNames) {
            list($s, $src) = $matches;
            $src = urldecode($src);

            if (in_array($src, $fileNames)) {
                $product['images'][] = $src;
                return '';
            }
            else {
                return $s;
            }
        }, $product['params']['CML2_DETAIL_TEXT']);

        

        $out[] =  $product;
    }
    return $out;
}

function escapePath($path) {
    return implode('/', array_map('urlencode', explode('/', $path)));
}



CModule::IncludeModule('main');
CModule::IncludeModule('iblock');

$fileNames = listFiles();
$items = parseXml('news.xml', $fileNames);
$ob = new CIBlockElement;

foreach ($items as $item) {
    $isNews = empty($item['groups']);

    echo $item['params']['CML2_ACTIVE_FROM'].' '.$item['name'].' ';

    $date = preg_replace('/(\d+)\-(\d+)\-(\d+)(.+)/', '\\3.\\2.\\1\\4', $item['params']['CML2_ACTIVE_FROM']);

    $props = array(
        'IBLOCK_ID' => 128,
        'IBLOCK_SECTION_ID' => $isNews ? 8539 : 8540,
        'NAME' => $item['name'],
        'ACTIVE' => $item['params']['CML2_ACTIVE'] === 'true' ? 'Y' : 'N',
        'DATE_ACTIVE_FROM' => $date,
        'PREVIEW_TEXT_TYPE' => 'html',
        'DETAIL_TEXT_TYPE' => 'html',
        'DETAIL_TEXT' => $item['params']['CML2_DETAIL_TEXT'],
        /*'PROPERTY_VALUES' => array(
            'SHOW_DATE' => $isNews ? 23209 : '',
        ),*/
    );

    $cacheKey = 'hp_______'.$item['id'];
    $currentId = RhdMemcache::get($cacheKey);
    if (!$currentId) {
        $res = $ob->Add($props);
        $currentId = $res;

        //if ($res) RhdMemcache::set($cacheKey, $res);
    }
    else {
        $res = $ob->Update($currentId, $props);
    }

    if ($res) {
        $gallery = array();
        $files = array();

        foreach ($item['images'] as $f) {
            $gallery[] = array(
                'VALUE' => CFile::MakeFileArray(dirname(__FILE__).$f),
                'DESCRIPTION' => ''
            );
        }

        foreach ($item['files'] as $f) {
            $files[] = array(
                'VALUE' => CFile::MakeFileArray(dirname(__FILE__).$f),
                'DESCRIPTION' => ''
            );
        }

        $ob->SetPropertyValuesEx($currentId, 128, array(
            'SHOW_DATE' => $isNews ? 23209 : '',
            'GALLERY' => $gallery,
            'FILES' => $files,
        ));

        if ($item['images'] || $item['files']) {
            $filePaths = array();
            $galleryPaths = array();

            $resProp = $ob->GetProperty(128, $currentId, "sort", "asc", array("CODE" => "FILES"));
            while ($f = $resProp->GetNext()) {
                $filePaths[] = CFile::GetPath($f['VALUE']);
            }
            $resProp = $ob->GetProperty(128, $currentId, "sort", "asc", array("CODE" => "GALLERY"));
            while ($f = $resProp->GetNext()) {
                $galleryPaths[] = CFile::GetPath($f['VALUE']);
            }

            $text = $props['DETAIL_TEXT'];

            $escapedImages = array_map('escapePath', $item['images']);
            $escapedFiles = array_map('escapePath', $item['files']);

            $text = str_replace($escapedImages, $galleryPaths, $text);
            $text = str_replace($escapedFiles, $filePaths, $text);

            $ob->Update($currentId, array('DETAIL_TEXT' => $text));
        }
    }  

    echo $res ? 'SUCCESS' : 'FAIL';

    echo "\n";
}   