<?php

require_once dirname(__FILE__).'/lib/excelReader.class.php';

$fields = array(
    'npu' => 2,
    'fpu' => 3,
    'uvb' => 4,
    'polemk' => 9,
    'pritok' => 11,
    'rashod' => 13,
    'sbros' => 15,
);

$reader = new ExcelReader('informer2.xls');
$lines = $reader->read();
unset($reader);

$data = array();
foreach ($lines as $line) {
    if (
        count($line) < 16 
        || !$line[1] 
        || isset($data[$line[1]])
    ) {
        continue;
    }

    $parsedLine = array();
    $fail = false;
    foreach ($fields as $field => $index) {
        if (!is_numeric($line[$index])) {
            $fail = true;
            break;
        }

        $parsedLine[$field] = (float) $line[$index];
    }

    if ($fail) continue;

    $data[$line[1]] = $parsedLine;
}

var_dump($data);