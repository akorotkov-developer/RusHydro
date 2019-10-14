<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();; ?>
<div class="champ-table-wrapper">
    <table class="champ-table">


        <tbody class="champ-table__body">

        <? $head = true; ?>
        <? foreach ($arResult['ITEMS'] as $arItem): ?>

        <? if ($head): ?>
        <? $head = false; ?>
        <thead class="champ-table__head">
        <tr class="champ-table__head-row">
            <td class="champ-table__head-title champ-table__head-title--md"><?= GetMessage("FIO") ?></td>
            <td class="champ-table__head-title champ-table__head-title--md"><?= $arItem['PROPERTIES']['ORGANIZATION']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xs"><?= $arItem['PROPERTIES']['MODULE_1']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xs"><?= $arItem['PROPERTIES']['MODULE_2']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xs"><?= $arItem['PROPERTIES']['MODULE_3']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xs"><?= $arItem['PROPERTIES']['MODULE_4']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xs"><?= $arItem['PROPERTIES']['MODULE_5']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xl champ-table__head-title--filled"><?= $arItem['PROPERTIES']['RESULT_100']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xl champ-table__head-title--filled"><?= $arItem['PROPERTIES']['RESULT_500']['NAME'] ?></td>
            <td class="champ-table__head-title champ-table__head-title--xl champ-table__head-title--filled"><?= $arItem['PROPERTIES']['POSITION']['NAME'] ?></td>
        </tr>
        </thead>
        <? endif; ?>

        <tr class="champ-table__item">
            <td class="champ-table__property"><?= $arItem['NAME'] ?></td>
            <td class="champ-table__property"><?= $arItem['PROPERTIES']['ORGANIZATION']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--center"><?= $arItem['PROPERTIES']['MODULE_1']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--center"><?= $arItem['PROPERTIES']['MODULE_2']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--center"><?= $arItem['PROPERTIES']['MODULE_3']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--center"><?= $arItem['PROPERTIES']['MODULE_4']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--center"><?= $arItem['PROPERTIES']['MODULE_5']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--bold champ-table__property--center champ-table__property--filled"><?= $arItem['PROPERTIES']['RESULT_100']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--bold champ-table__property--center champ-table__property--filled"><?= $arItem['PROPERTIES']['RESULT_500']['VALUE'] ?></td>
            <td class="champ-table__property champ-table__property--bold champ-table__property--center champ-table__property--filled"><?= $arItem['PROPERTIES']['POSITION']['VALUE'] ?></td>
        </tr>

        <? endforeach; ?>

        </tbody>
    </table>
</div>