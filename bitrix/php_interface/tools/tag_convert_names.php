<?php 
function loadPeopleTags() {
                $people = file(dirname(__FILE__).'/../lib/tags-people.txt');
		$tags = array();
                foreach ($people as $person) {
                        $person =
                                trim(
                                        str_replace(
                                                array("\r",     "\n"),
                                                array('',       ''),
                                                $person
                                        )
                                );

                        if (!$person) continue;

                        $surname = preg_replace('/^([^\s]+).+$/ui', '\\1', $person);
                        //$person = mb_strtolower($person);

                        $tags[$surname] = $person;
                }

                return array_unique($tags);
        }


$tags = loadPeopleTags();

echo "SET NAMES utf8;\n";
foreach ($tags as $surname => $tag) {
    $lowerTag = mb_strtolower($tag);
    if ($lowerTag === $tag) continue;
    echo "UPDATE b_iblock_element SET TAGS = REPLACE(TAGS, '$surname', '$tag');\n";
}
