<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="datepicker"></div>

<?php $items = array(); if ($arResult['ITEMS']): ?>
    <?php 
    foreach ($arResult['ITEMS'] as $arItem):
        $from = 
            (int) date_create($arItem['ACTIVE_FROM'])->
                setTime(0, 0, 0)->
                format('U');

        if ($arItem['ACTIVE_TO']) {
            $to = (int) date_create($arItem['ACTIVE_TO'])->
                setTime(23, 59, 59)->
                format('U');
        }
        else {
            $to = $from + 23 * 60 * 60 + 59 * 60 + 59;
        }

        $items[] = array(
            'name' => $arItem['NAME'],
            'description' => $arItem['PREVIEW_TEXT'],
            'period' => array($from, $to),
        );
    endforeach; ?>
<?php endif; ?>

<script type="text/javascript">
    window.calendarEvents = <?php echo json_encode($items); ?>;
</script>