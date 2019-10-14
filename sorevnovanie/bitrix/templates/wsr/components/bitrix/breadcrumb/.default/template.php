<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
 if (empty($arResult)) return false;

$strReturn = '<div class="container">
        <div class="pagination">
            <ul class="pagination__list">';



$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $strReturn .= '<li class="pagination__item"><a class="pagination__link" href="'.$arResult[$index]["LINK"].'">'.$arResult[$index]["TITLE"].'</a></li>';
}

$strReturn .= '</ul>
        </div>
    </div>';

return $strReturn;
