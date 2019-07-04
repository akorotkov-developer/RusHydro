<script>
	$(function() {
		$("#bar").draggable({containment:'parent', axis:'x'});
	});
</script>
<div id="archive">
	<div class="wrapScroll">
		<div id="yearL"></div>
		<div id="yearR"></div>
		<div class="shw"></div>
		<div class="items">
			<?php foreach ($dates as $year => $monthes) { ?>
				<a href="" class="year <?=($currentDate['year'] === $year ? 'act' : '')?>"><?=$year?></a>
				<div class="month">
					<?php foreach ($monthes as $month) { ?>
						<a class="<?=($currentDate['year'] === $year && $currentDate['month'] === $month ? 'act' : '')?>" href="<?=RhdHandler::getCurrentPath().'?archive='.$year.'-'.$month?>"><?=$monthNames[$month]?></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="barscroll">
		<div class="bar" id="bar"></div>
	</div>
	<div class="wrapBar">
		<div class="line"></div>
	</div>
</div>
<div class="main_new news_list">
	<div class="m_news">
		<?php foreach ($items as $item) { ?>
			<div class="item">
				<span><?=mb_substr($item['DATE_CREATE'], 0, 5)?></span>
				<a href="<?=$item['URL']?>"><?=$item['NAME']?></a>
			</div>
		<?php } ?>
	</div>
</div>