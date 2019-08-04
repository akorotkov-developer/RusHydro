<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> 
<?$dir = $APPLICATION->GetCurDir();?>
			<div class="clear"></div>
			<?if ($dir != "/tes/"){?>
				<div class="share-btn">
					Поделиться:
					<a title="Поделиться в Facebook" rel="nofollow" href="http://www.facebook.com/" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'facebook','width=600,height=600');return false;"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/fb-ico.png" alt="Facebook" /></a>
					<a title="Опубликовать в Twitter" onclick="window.open('http://twitter.com/home?status='+encodeURIComponent(document.title)+': '+encodeURIComponent(location.href),'twitter','width=600,height=600');return false;" rel="nofollow" href="http://twitter.com/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/tw-ico.png" alt="Twitter" /></a>
					<a title="Поделиться ВКонтакте" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href),'vkontakte','width=600,height=600');return false;" rel="nofollow" href="http://vkontakte.ru/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/vk-ico.png" alt="Vkontakte" /></a>
					<form target="_blank" method="post" action="http://www.livejournal.com/update.bml">
						<input type="hidden" value="Пятые Всероссийские соревнования оперативного персонала ГЭС. Поддержи любимую команду!" name="subject">
						<textarea style="display:none;" name="event">&lt;img src=&quot;http://sorevnovanie.rushydro.ru/bitrix/templates/rushydro/i/logo-rushydro.jpg&quot; align=&quot;left&quot; hspace=&quot;10&quot; /&gt;Всероссийские соревнования оперативного персонала ГЭС организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала гидроэлектростанций, распространения передовых и новых методов работы. &lt;a href=&quot;"http://sorevnovanie.rushydro.ru/&quot; target=&quot;_blank&quot;&gt;Перейти на сайт соревнований&lt;/a&gt;</textarea>
						<input type="image" src="<?=SITE_TEMPLATE_PATH?>/i/share/lj-ico.png">
					</form>
					<a rel="nofollow" onclick="window.open('http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl='+encodeURIComponent(location.href), 'odkl', 'width=600, height=600'); return false;" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl='+encodeURIComponent(location.href)" title="Поделиться с друзьями в Одноклассниках"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/odnkl-ico.png" alt="Odnoklassniki" /></a>
					<a title="Поделиться В Моем Мире" onclick="window.open('http://connect.mail.ru/share?share_url='+encodeURIComponent(location.href),'mail','width=600,height=600');return false;" rel="nofollow" href="http://connect.mail.ru/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/mail-ico.png" alt="Mail" /></a>
				</div>
			<?}?>
		</div>
		
		<div class="intersite-navi">
            <div class="intersite-navi_link" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/tmp/topblock2.png)"><a href="/ws"><span>Корпоративный Чемпионат <br> Группы РусГидро <br> по стандартам Worldskills</span></a></div>
            <div class="intersite-navi_link" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/tmp/topblock1.jpg)"><a href="/ges"><span>Всероссийские соревнования<br>оперативного персонала гэс</span></a></div>
		</div>
		
		<div id="footer">
			<a href="http://rushydro.ru/" title="РусГидро"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo-rushydro.jpg" id="f-logo" alt="РусГидро" /></a>
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("include_areas/footer.php"),
				Array(),
				Array("MODE"=>"html")
			);?>
			<div class="f-links">
				<!--LiveInternet logo-->
					<a href="http://www.liveinternet.ru/click" target="_blank"><img src="//counter.yadro.ru/logo?45.1" title="LiveInternet" alt="" border="0" width="18" height="18" /></a>
				<!--/LiveInternet-->
				Ссылки:
                <a href="http://hydroschool.ru/" target="_blank">hydroschool.ru</a>
				<a href="http://vestnik-rushydro.ru/" target="_blank">vestnik-rushydro.ru</a>
                <a href="http://ludi-sveta.ru/" target="_blank">ludi-sveta.ru</a>
				<a href="http://blog.rushydro.ru/" target="_blank">blog.rushydro.ru</a>
				<a href="http://rushydro.livejournal.com/" target="_blank">rushydro.livejournal.com</a>
				<a href="http://oberegai.rushydro.ru/" target="_blank">oberegai.rushydro.ru</a>
				<!--<a href="http://otmetka68.ru/" target="_blank">otmetka68.ru</a>-->
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="overlay-fixed"></div>
	<div class="popup-captcha"></div>
</body>
</html>
