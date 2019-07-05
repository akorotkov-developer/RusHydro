<?php

//$tags = file(__DIR__.'/broken_tags.txt');
$tags = array('Саяно-Шушенский филиал');
echo "SET NAMES utf8;\n";

foreach ($tags as $tag) {
    $tag = trim(
        str_replace(
                array("\r",     "\n"),
                array('',       ''),
                $tag
        )
    );

    echo "UPDATE b_iblock_element SET TAGS = REPLACE(TAGS, ', $tag, ', ', ') WHERE TAGS LIKE '%, $tag, %';\n";
}
