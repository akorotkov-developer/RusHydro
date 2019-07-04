<div class="news_date">
	<strong><?=substr($element['DATE_CREATE'], 0, 10)?></strong><br/>
	<a href="" class="news_print">версия для печати</a><br/>
	<a href="" class="news_rss">RSS лента</a>
</div>
<h1 class="header_doc"><?=$element['NAME']?></h1>
<div class="clear"></div>
<div class="news_cont">
	<?php 
		//$disclaimerPos = mb_strpos($element['DETAIL_TEXT'], '&lt;p style=&quot;text-align: justify&quot; mce_style=&quot;text-align: justify&quot;&gt;&lt;i&gt;&lt;font color=&quot;#888888&quot;&gt;'); 
		//$text = $disclaimerPos === false ? $element['DETAIL_TEXT'] : mb_substr($element['DETAIL_TEXT'], 0, $disclaimerPos);
		
		//$text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	?>
	<?=$element['DETAIL_TEXT']?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#gallery ul').jcarousel();							
			$("#gallery .jcarousel-next").mousedown(function(){
				if (!$("#gallery .jcarousel-next").hasClass("jcarousel-next-disabled"))
					$(this).addClass("btnClick-next");
			});
			$("#gallery .jcarousel-next").mouseup(function(){$(this).removeClass("btnClick-next")});
			$("#gallery .jcarousel-next").mouseleave(function(){$(this).removeClass("btnClick-next")});
			
			$("#gallery .jcarousel-prev").mousedown(function(){
				if (!$("#gallery .jcarousel-prev").hasClass("jcarousel-prev-disabled"))
					$(this).addClass("btnClick-prev");
			});
			$("#gallery .jcarousel-prev").mouseup(function(){$(this).removeClass("btnClick-prev")});
			$("#gallery .jcarousel-prev").mouseleave(function(){$(this).removeClass("btnClick-prev")});
		});
	</script>
	<?php if ($gallery) { ?>
		<div id="gallery">
			<ul>
				<?php foreach ($gallery as $image) { ?>
					<li><?=$image?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	<?php if ($showDisclaimer) {?>
		<div class="note">Информация в данном пресс-релизе может содержать оценочные или предполагаемые показатели или другие опережающие заявления, относящиеся к будущим событиям или будущей хозяйственной и финансовой деятельности ОАО «РусГидро» и/или ее дочерних и зависимых компаний.  Некоторые заявления носят исключительно оценочный или прогнозный характер, и действительные события или результаты могут существенно от них отличаться.  ОАО «РусГидро» не берет на себя обязательств пересматривать эти заявления с целью соотнесения их с реальными событиями и обстоятельствами, которые могут возникнуть после даты настоящего сообщения, а также отражать события, появление которых в настоящий момент разумно не ожидается.</div>
	<?php }?>
	<?php if (RhdHandler::getJustPath() === 'press/news/') { ?>
	  <div class="nav_news">
		  <div class="prev_news" id="prev_news">
			  <div class="n_wrap">
				  <?php if ($prevElement) { ?>
					  <div class="n_date"><?=substr($prevElement['DATE_CREATE'], 0, 10)?></div>
					  <?=$prevElement['NAME']?>
				  <?php } ?>
			  </div>
			  <div class="n_arr"></div>
		  </div>
		  <div class="next_news" id="next_news">
			  <div class="n_wrap">
				  <?php if ($nextElement) { ?>
					  <div class="n_date"><?=substr($nextElement['DATE_CREATE'], 0, 10)?></div>
					  <?=$nextElement['NAME']?>
				  <?php } ?>
			  </div>
			  <div class="n_arr"></div>
		  </div>
		  <div class="rht"><?php if ($nextElement) { ?><span class="arr">&rarr;</span><a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), RhdHandler::getJustPath(), $nextElement);?>" id="next_news_arr">следующая новость</a><?php } ?></div>
		  <div class="lft"><?php if ($prevElement) { ?><span class="arr">&larr;</span> <a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), RhdHandler::getJustPath(), $prevElement);?>" id="prev_news_arr">предыдущая новость</a><?php } ?></div>
		  <div class="cnt"><a href="<?=RhdHandler::getCurrentPath()?>">все новости</a></div>
		  <div class="clear"></div>
	  </div>
	<?php } ?>
</div>