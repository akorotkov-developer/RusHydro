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