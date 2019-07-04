<?php foreach ($arResult['ITEMS'] as $arItem): ?>
    <a href="http://www.rushydro.ru/press/news/<?php echo $arItem['ID']; ?>.html"><span><?php echo $arItem['DISPLAY_ACTIVE_FROM']; ?></span> <?php echo $arItem['NAME']; ?></a>
<?php endforeach; ?>